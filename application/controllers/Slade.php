<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slade extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
        date_default_timezone_set("Africa/Nairobi");
        header('Access-Control-Allow-Origin: *');
    }

    public function index()
    {
        if (!isset($_GET['shop'])) {
            $this->load->view('home');
        } else {
            if (!isset($_GET['hmac'])) {
                echo '<script>window.location.href = "https://' . $_GET['shop'] . '/admin/apps";</script>';
            }

            $this_shop = str_replace(".myshopify.com", "", $_GET['shop']);

            if (!$this->db->table_exists('shops')) {
                echo '<script>window.location.href = "' . base_url() . 'install?shop=' . $this_shop . '";</script>';
            }

            if ($this->db->where('shop', $this_shop)->get('shops')->num_rows() == 0) {
                echo '<script>window.location.href = "' . base_url() . 'install?shop=' . $this_shop . '";</script>';
            }

            $shop_data = $this->db->where('shop', $this_shop)->get('shops')->row();

            if ($shop_data->type == '') {
                echo '<script>window.location.href = "' . base_url() . 'upgrade?' . $_SERVER['QUERY_STRING'] . '";</script>';
            }

            $requests = $_GET;
            $hmac = $_GET['hmac'];
            $serializeArray = serialize($requests);
            $requests = array_diff_key($requests, array('hmac' => ''));
            ksort($requests);

            $token = $shop_data->token;
            $shop = $shop_data->shop;
            $this_script = '/admin/api/2020-10/script_tags.json';
            $script_tags_url = "/admin/api/2020-10/script_tags.json";

            $script_exists = $this->Shopify->shopify_call($token, $this_shop, $this_script, array('fields' => 'id,src,event,created_at,updated_at,'), 'GET');
            $script_exists = json_decode($script_exists['response'], true);

            if (!isset($script_exists['script_tags'])) {
                echo '<script>window.location.href = "' . base_url() . 'install?shop=' . $this_shop . '";</script>';
            }
            // CREATE NEW SCRIPT TAG
            if (count($script_exists['script_tags']) == 0) {
                $script_array = array(
                    'script_tag' => array(
                        'event' => 'onload',
                        'src' => base_url() . 'assets/js/shopify.js',
                    ),
                );

                $scriptTag = $this->Shopify->shopify_call($token, $this_shop, $script_tags_url, $script_array, 'POST');
                $scriptTag = json_decode($scriptTag['response'], JSON_PRETTY_PRINT);
            } else {
                echo '<script>console.log(' . json_encode($script_exists) . ');</script>';
            }

            // REMOVE OLD SCRIPT TAGS
            if (count($script_exists['script_tags']) > 1) {
                foreach ($script_exists['script_tags'] as $key => $fetch) {
                    $delete_script = $this->Shopify->shopify_call($token, $this_shop, '/admin/api/2020-10/script_tags/' . $fetch['id'] . '.json', array('fields' => 'id,src,event,created_at,updated_at,'), 'DELETE');
                    $delete_script = json_decode($delete_script['response'], true);
                    echo '<script>console.log(' . json_encode($delete_script) . ');</script>';
                }

                $script_array = array(
                    'script_tag' => array(
                        'event' => 'onload',
                        'src' => base_url() . 'assets/js/shopify.js',
                    ),
                );

                $scriptTag = $this->Shopify->shopify_call($token, $this_shop, $script_tags_url, $script_array, 'POST');
                $scriptTag = json_decode($scriptTag['response'], JSON_PRETTY_PRINT);
            }


            $data['api_key'] = $this->config->item('shopify_api_key');
            $data['shop'] = $shop;
            $data['token'] = $token;
            $data['page_name'] = 'dashboard';
            $this->load->view('index', $data);
        }
    }

    public function generate_token()
    {
        $api_key = $this->config->item('shopify_api_key');
        $shared_secret = $this->config->item('shopify_secret');
        $params = $_GET; // Retrieve all request parameters
        $hmac = $_GET['hmac']; // Retrieve HMAC request parameter

        $params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
        ksort($params); // Sort params lexographically

        $computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

        // Use hmac data to check that the response is from Shopify or not
        if (hash_equals($hmac, $computed_hmac)) {

            // Set variables for our request
            $query = array(
                "client_id" => $api_key, // Your API key
                "client_secret" => $shared_secret, // Your app credentials (secret key)
                "code" => $params['code'], // Grab the access key from the URL
            );

            // Generate access token URL
            $access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

            // Configure curl client and execute request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $access_token_url);
            curl_setopt($ch, CURLOPT_POST, count($query));
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
            $result = curl_exec($ch);
            curl_close($ch);

            // Store the access token
            $result = json_decode($result, true);
            $access_token = $result['access_token'];

            // Show the access token (don't do this in production!)

            //echo $access_token;

            $shop = str_replace(".myshopify.com", "", $params['shop']);

            if ($this->db->table_exists('shops')) {
                if ($this->db->where('shop', $shop)->get('shops')->num_rows() == 0) {
                    $shop_data = array(
                        'shop_id' => $this->db->get('shops')->num_rows() + 1,
                        'shop' => $shop,
                        'token' => $access_token,
                        'date' => time(),
                    );
                    $this->db->insert('shops', $shop_data);
                } else {
                    $shop_data = array(
                        'shop_id' => '',
                        'shop' => $shop,
                        'token' => $access_token,
                        'updated_at' => time(),
                    );
                    $this->db->where('shop', $shop)->update('shops', array('token' => $access_token, 'updated_at' => time()));
                }
            } else {
                $shop_data = array(
                    'shop_id' => $this->db->get('shops')->num_rows() + 1,
                    'shop' => $shop,
                    'token' => $access_token,
                    'date' => time(),
                );
                $this->load->dbforge();
                $fields = array(
                    'shop_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => true,
                        'auto_increment' => true,
                    ),
                    'shop' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'unique' => true,
                    ),
                    'token' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'default' => '',
                    ),
                    'date' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'null' => true,
                    ),
                );
                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('shop_id', true);
                $this->dbforge->create_table('shops');

                $this->db->insert('shops', $shop_data);
            }
            echo '<script>window.location.href = "' . base_url() . 'upgrade?' . $_SERVER['QUERY_STRING'] . '";</script>';
        } else {
            // Someone is trying to be shady!
            header("Location: https://sleek-discount.herokuapp.com/");
            die('This request is NOT from Shopify!');
        }
    }

    public function api_call_write_products()
    {
        $shop = $this->session->userdata('shop');
        $token = $this->session->userdata('token');

        $query = array(
            "Content-type" => "application/json", // Tell Shopify that we're expecting a response in JSON format
        );

        // Run API call to get products
        $products = $this->Shopify->shopify_call($token, $shop, "/admin/products.json", array(), 'GET');

        // Convert product JSON information into an array
        $products = json_decode($products['response'], true);

        // Get the ID of the first product
        $product_id = $products['products'][0]['id'];

        // Modify product data
        $modify_data = array(
            "product" => array(
                "id" => $product_id,
                "title" => "My New Title",
            ),
        );

        // Run API call to modify the product
        $modified_product = $this->Shopify->shopify_call($token, $shop, "/admin/products/" . $product_id . ".json", $modify_data, 'PUT');

        // Storage response
        $modified_product_response = $modified_product['response'];
    }

    public function install()
    {
        if (isset($_GET['shop'])) :
            $shop = $_GET['shop'];
            $shop = str_replace(".myshopify.com", "", $shop);
            $shop = str_replace("https://", "", $shop);
            $shop = str_replace("http://", "", $shop);
            $shop = str_replace("/", "", $shop);
        elseif (isset($_POST['shop'])) :
            $shop = $_POST['shop'];
            $shop = str_replace(".myshopify.com", "", $shop);
            $shop = str_replace("https://", "", $shop);
            $shop = str_replace("http://", "", $shop);
            $shop = str_replace("/", "", $shop);
        endif;
        $api_key = $this->config->item('shopify_api_key');
        $scopes = "read_orders,read_draft_orders,read_products,read_product_listings,read_inventory,read_script_tags,write_script_tags,read_themes,read_checkouts,read_price_rules,read_discounts";
        $redirect_uri = base_url() . "generate_token";

        // Build install/approval URL to redirect to
        $install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);
        // Redirect
        header("Location: " . $install_url);
        die();
    }

    public function upgrade()
    {
        $requests = $_GET;
        $hmac = $_GET['hmac'];
        $serializeArray = serialize($requests);
        $requests = array_diff_key($requests, array('hmac' => ''));
        ksort($requests);

        $shop = str_replace(".myshopify.com", "", $_GET['shop']);
        $token = $this->db->where('shop', $shop)->get('shops')->row()->token;


        $s_data = $this->Shopify->shopify_call($token, $shop, '/admin/api/2020-10/shop.json', array(), 'GET');
        $s_data = json_decode($s_data['response'], true);
        $s_data = $s_data['shop'];

        $s_array = array(
            'plan_name' => $s_data['plan_name'],
            'shop_owner' => $s_data['shop_owner'],
            'plan_display_name' => $s_data['plan_display_name'],
            'customer_email' => $s_data['customer_email'],
            'domain' => $s_data['domain'],
            'partner' => $s_data['id']
        );

        $this->db->where('shop', $shop)->set($s_array)->update('shops');

        $now = time(); // or your date as well
        $your_date = $this->db->where('shop', $shop)->get('shops')->row()->updated_at;
        $datediff = $now - $your_date;

        $plan = $s_data['plan_display_name'];

        if ($plan == 'Developer Preview') {
            $array = array(
                'recurring_application_charge' => array(
                    'name' => 'Sleek',
                    'test' => true,
                    'price' => 19.99,
                    'trial_days' => 14,
                    'return_url' => 'https://' . $_GET['shop'] . '/admin/apps/sleek-discount/activate?t=true&hmac=' . $_GET['hmac'] . '&shop=' . $_GET['shop'],
                ),
            );
        } else {
            $array = array(
                'recurring_application_charge' => array(
                    'name' => 'Sleek',
                    'test' => false,
                    'price' => 19.99,
                    'trial_days' => 14,
                    'return_url' => 'https://' . $_GET['shop'] . '/admin/apps/sleek-discount/activate?t=false&hmac=' . $_GET['hmac'] . '&shop=' . $_GET['shop'],
                ),
            );
        }

        $charge = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/recurring_application_charges.json", $array, 'POST');
        $charge = json_decode($charge['response'], JSON_PRETTY_PRINT);
        // echo json_encode($charge);

        echo '<script>top.window.location="' . $charge['recurring_application_charge']['confirmation_url'] . '";</script>';
        exit();
    }

    public function activate()
    {
        $requests = $_GET;
        $hmac = $_GET['hmac'];
        $serializeArray = serialize($requests);
        $requests = array_diff_key($requests, array('hmac' => ''));
        ksort($requests);

        $shop = str_replace(".myshopify.com", "", $_GET['shop']);
        $token = $this->db->where('shop', $shop)->get('shops')->row()->token;

        if (isset($_GET['charge_id']) && $_GET['charge_id'] != '') {
            $charge_id = $_GET['charge_id'];

            $array = array(
                'recurring_application_charge' => array(
                    'id' => $charge_id,
                    'name' => 'Sleek',
                    'api_client_id' => time(),
                    'price' => '19.99',
                    'status' => 'accepted',
                    'return_url' => 'https://' . $_GET['shop'] . '/admin/apps/sleek-discount',
                    'billing_on' => null,
                    'test' => $_GET['t'],
                    'activated_on' => null,
                    'trial_ends_on' => null,
                    'cancelled_on' => null,
                    'trial_days' => 14,
                    'decorated_return_url' => 'https://' . $_GET['shop'] . '/admin/apps/sleek-discount?charge_id=' . $charge_id,
                ),
            );

            $activate = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/recurring_application_charges/" . $charge_id . "/activate.json", $array, 'POST');
            $activate = json_decode($activate['response'], JSON_PRETTY_PRINT);

            // print_r($activate);

            $active_shop = array(
                'type' => 'RECURRING',
                'name' => 'Sleek',
                'price' => 19.99,
                'bill_interval' => 'EVERY_30_DAYS',
                'capped_amount' => 19.99,
                'terms' => 'NO_TERMS',
                'trial_days' => '14',
                'test' => $_GET['t'],
                'on_install' => 1,
                'created_at' => '',
                'updated_at' => time(),

            );

            $this->db->where('shop', str_replace(".myshopify.com", "", $_GET['shop']))->set($active_shop)->update('shops');
            echo '<script>top.window.location="https://' . $_GET['shop'] . '/admin/apps/sleek-discount?' . $_SERVER['QUERY_STRING'] . '";</script>';
        }
    }

    public function get_app()
    {
        echo '<!DOCTYPE html><html lang="en"><head> <title>Sleek Discounts — Installation</title> <meta http-equiv="x-ua-compatible" content="ie=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <style>*{-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;}body{padding: 2.5em 0; color: #212b37; font-family: -apple-system,BlinkMacSystemFont,San Francisco,Roboto,Segoe UI,Helvetica Neue,sans-serif;}.container{width: 100%; text-align: center; margin-left: auto; margin-right: auto;}@media screen and (min-width: 510px){.container{width: 510px;}}.title{font-size: 1.5em; margin: 2em auto; display: flex; align-items: center; justify-content: center; word-break: break-all;}.subtitle{font-size: 0.8em; font-weight: 500; color: #64737f; line-height: 2em;}.error{line-height: 1em; padding: 0.5em; color: red;}input.marketing-input{width: 100%; height: 52px; padding: 0 15px; box-shadow: 0 0 0 1px #ddd; border: 0; border-radius: 5px; background-color: #fff; font-size: 1em; margin-bottom: 15px;}input.marketing-input:focus{color: #000; outline: 0; box-shadow: 0 0 0 2px #5e6ebf;}button.marketing-button{display: inline-block; width: 100%; padding: 1.0625em 1.875em; background-color: #5e6ebf; color: #fff; font-weight: 700; font-size: 1em; text-align: center; outline: none; border: 0 solid transparent; border-radius: 5px; cursor: pointer;}button.marketing-button:hover{background: linear-gradient(to bottom, #5c6ac4, #4959bd); border-color: #3f4eae;}button.marketing-button:focus{box-shadow: 0 0 0.1875em 0.1875em rgba(94,110,191,0.5); background-color: #223274; color: #fff;}</style></head><body> <main class="container" role="main"> <h3 class="title"> Sleek Discounts </h3> <p class="subtitle"> <label for="shop">Enter your shop domain to log in or install this app.</label> </p><form action="/install" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="' . sha1(md5('nehN7kwK9YR++yH5VIG2I0C2wMNMYReLqtJAuhRimoqM3wmzPwV24KDKaOy1aGnKPBYeWoiDOuldhtvdcA73Ww==')) . '"/> <input id="shop" name="shop" type="text" autofocus="autofocus" placeholder="example.myshopify.com" class="marketing-input"> <button type="submit" class="marketing-button">Install</button></form> </main></body></html>';
    }

    public function variants($product, $token, $shop)
    {
        $variants = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products/" . $product . "/variants.json", array('fields' => 'id,title'), 'GET');
        $variants = json_decode($variants['response'], JSON_PRETTY_PRINT);

        header('Content-Type: application/json');
        header('X-Shopify-Access-Token: ' . $token);
        echo json_encode($variants);
    }

    public function product_details($product, $token, $shop)
    {
        $product_url = '/admin/api/2020-10/products/' . $product . '.json';
        $product_data = $this->Shopify->shopify_call($token, $shop, $product_url, array('fields' => 'id,title,image,variants'), 'GET');
        $product_data = json_decode($product_data['response'], JSON_PRETTY_PRINT);
        $shop_url = '/admin/api/2020-10/shop.json';
        $shop_data = $this->Shopify->shopify_call($token, $shop, $shop_url, array(), 'GET');
        $shop_data = json_decode($shop_data['response'], JSON_PRETTY_PRINT);
        $product_data['shop'] = $shop_data['shop'];

        header('Content-Type: application/json');
        header('X-Shopify-Access-Token: ' . $token);
        echo json_encode($product_data);
    }

    public function shop_data($token, $shop)
    {
        $product_url = '/admin/api/2020-10/shop.json';
        $product_data = $this->Shopify->shopify_call($token, $shop, $product_url, array(), 'GET');
        $product_data = json_decode($product_data['response'], JSON_PRETTY_PRINT);

        header('Content-Type: application/json');
        header('X-Shopify-Access-Token: ' . $token);
        echo json_encode($product_data);
    }

    public function search_products()
    {
        $html = '';
        $search_term = $this->input->post('term');
        $shop = $this->input->post('shop');
        $token = $this->input->post('token'); //replace with your access token

        if ($search_term == "") {
            $products = $this->Shopify->shopify_call($token, $shop, '/admin/api/2020-10/products.json', array('limit' => '10'), 'GET');
            $products = json_decode($products['response'], JSON_PRETTY_PRINT);
        } else {
            $array = array(
                'limit' => '10',
                'fields' => 'id,title,variants',
            );
            $products = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products.json", $array, 'GET');
            $products = json_decode($products['response'], JSON_PRETTY_PRINT);
        }

        if (empty($products)) {
            $html = "<p>There's no product matching $search_term </p>";
        } else {
            foreach ($products as $product) {
                foreach ($product as $key => $value) {
                    if (stripos($value['title'], $search_term) !== false) {
                        $images = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products/" . $value['id'] . "/images.json", array(), 'GET');
                        $images = json_decode($images['response'], JSON_PRETTY_PRINT);
                        $item_default_image = $images['images'][0]['src'];

                        $html .= '<div class="col-xs-12" style="margin-top: 10px; padding-bottom: 5px; border-bottom: 1px solid #C0C0C0;">';
                        $html .= '<div class="col-xs-12"><span class="pull-left" style="font-weight: bold; font-size: 18px; color: #333333;">' . $value['title'] . '</span> <span class="pull-right btn btn-primary btn-sm btn-icon icon-right" onclick="addAll(\'' . $value['id'] . '\')"><i style="color: #fff;" class="entypo-plus"></i> Add All variants</span></div>';
                        $html .= '<div class="col-xs-4" style="vertical-align: middle;"><img src="' . $item_default_image . '" class="img-rounded img-responsive" /></div>';
                        $html .= '<div class="col-xs-8" style="vertical-align: middle;">';

                        foreach ($value['variants'] as $variant) {
                            $html .= '
                                        <div class="col-xs-12" style="padding-top: 5px; paddign-bottom: 5px;">
                                            <div class="col-xs-10">' . $value['title'] . '-' . $variant['title'] . '</div>
                                            <div class="col-xs-2">
                                                <span class="btn btn-info btn-xs entypo-plus" style="color: #fff;" onclick="addVariant(\'' . $value['id'] . '\', \'' . $variant['id'] . '\')"></span>
                                            </div>
                                        </div>';
                        }

                        $html .= '</div>';
                        $html .= '</div>';
                    }
                }
            }
        }

        echo $html;
    }

    public function replacers()
    {
        $html = '';
        $search_term = $this->input->post('term');
        $shop = $this->input->post('shop');
        $token = $this->input->post('token'); //replace with your access token

        if ($search_term == "") {
            $products = $this->Shopify->shopify_call($token, $shop, '/admin/api/2020-10/products.json', array('limit' => '10'), 'GET');
            $products = json_decode($products['response'], JSON_PRETTY_PRINT);
        } else {
            $array = array(
                'limit' => '10',
                'fields' => 'id,title,variants',
            );
            $products = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products.json", $array, 'GET');
            $products = json_decode($products['response'], JSON_PRETTY_PRINT);
        }

        if (empty($products)) {
            $html = "<p>There's no product matching $search_term </p>";
        } else {
            foreach ($products as $product) {
                foreach ($product as $key => $value) {
                    if (stripos($value['title'], $search_term) !== false) {
                        $images = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products/" . $value['id'] . "/images.json", array(), 'GET');
                        $images = json_decode($images['response'], JSON_PRETTY_PRINT);
                        $item_default_image = $images['images'][0]['src'];

                        $html .= '<div class="col-xs-12" style="padding-left: 0px !important; padding-right: 0px !important; margin-top: 10px; padding-bottom: 5px; border-bottom: 1px solid #C0C0C0;">';
                        $html .= '<div class="col-xs-12"><span class="pull-left" style="font-weight: bold; font-size: 18px; color: #333333;">' . $value['title'] . '</span> <span class="pull-right btn btn-primary btn-sm btn-icon icon-right" onclick="$(\'.replace_this\').val(\'' . $value['title'] . '\');$(\'.replacer\').html(\'\');products[$(\'.toplect\').val()][\'rp\']=' . $value['id'] . ';products[$(\'.toplect\').val()][\'rv\'] = \'\';"><i style="color: #fff;" class="entypo-plus"></i> Replace product</span></div>';
                        $html .= '<div class="col-xs-1" style="vertical-align: middle;"></div>';
                        $html .= '<div class="col-xs-11" style="vertical-align: middle;">';

                        foreach ($value['variants'] as $variant) {
                            $html .= '
                                        <div class="col-xs-12" style="padding-top: 5px; paddign-bottom: 5px;">
                                            <div class="col-xs-10">' . $value['title'] . '-' . $variant['title'] . '</div>
                                            <div class="col-xs-2">
                                                <span class="btn btn-info btn-xs entypo-plus" style="color: #fff;" onclick="$(\'.replace_this\').val(\'(' . $variant['title'] . ') ' . $value['title'] . '\');$(\'.replacer\').html(\'\');products[$(\'.toplect\').val()][\'rp\']=' . $value['id'] . ';products[$(\'.toplect\').val()][\'rv\'] = ' . $variant['id'] . ';"></span>
                                            </div>
                                        </div>';
                        }

                        $html .= '</div>';
                        $html .= '</div>';
                    }
                }
            }
        }

        echo $html;
    }

    public function search_condition()
    {
        $html = '';
        $type = $this->input->post('type');
        $search_term = $this->input->post('item');
        $shop = $this->input->post('shop');
        $token = $this->input->post('token'); //replace with your access token

        if ($search_term == "") {
        } else {
            $array = array(
                'limit' => '10',
                'fields' => 'id,title,variants',
            );
            if ($type == 'product') {
                $products = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products.json", $array, 'GET');
                $products = json_decode($products['response'], JSON_PRETTY_PRINT);
                if (empty($products)) {
                    $html = "<p>There's no product matching $search_term </p>";
                } else {
                    foreach ($products as $product) {
                        foreach ($product as $key => $value) {
                            if (stripos($value['title'], $search_term) !== false) {
                                $html .= '<div onclick="$(\'.occ\').val(\'' . $value['id'] . '\');$(\'.c_i\').html(\'\');$(\'#ocContent\').val(\'' . $value['title'] . '\');" class="col-xs-12" style="cursor: pointer; margin-top: 10px; padding-bottom: 5px; border-bottom: 1px solid #C0C0C0;"><span class="pull-left" style="color: #333333;">' . $value['title'] . '</span></div>';
                            }
                        }
                    }
                }
            }
            if ($type == 'variant') {
                $products = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/products.json", $array, 'GET');
                $products = json_decode($products['response'], JSON_PRETTY_PRINT);
                if (empty($products)) {
                    $html = "<p>There's no variant matching $search_term </p>";
                } else {
                    foreach ($products as $product) {
                        foreach ($product as $key => $value) {
                            if (stripos($value['title'], $search_term) !== false) {
                                foreach ($value['variants'] as $variant) {
                                    $html .= '<div onclick="$(\'.occ\').val(\'' . $variant['id'] . '\');$(\'.c_i\').html(\'\');$(\'#ocContent\').val(\'' . $value['title'] . ' ' . $variant['title'] . '\');" class="col-xs-12" style="cursor: pointer; margin-top: 10px; padding-bottom: 5px; border-bottom: 1px solid #C0C0C0;"><span class="pull-left" style="color: #333333;">' . $value['title'] . ' ' . $variant['title'] . '</span></div>';
                                }
                            }
                        }
                    }
                }
            }
            if ($type == 'collection') {
                $collections = $this->Shopify->shopify_call($token, $shop, "/admin/api/2020-10/custom_collections.json", $array, 'GET');
                $collections = json_decode($collections['response'], JSON_PRETTY_PRINT);
                if (empty($collections)) {
                    $html = "<p>There's no collection matching $search_term </p>";
                } else {
                    foreach ($collections as $collection) {
                        foreach ($collection as $key => $value) {
                            if (stripos($value['title'], $search_term) !== false) {
                                $html .= '<div onclick="$(\'.occ\').val(\'' . $value['id'] . '\');$(\'.c_i\').html(\'\');$(\'#ocContent\').val(\'' . $value['title'] . '\');" class="col-xs-12" style="cursor: pointer; margin-top: 10px; padding-bottom: 5px; border-bottom: 1px solid #C0C0C0;"><span class="pull-left" style="color: #333333;">' . $value['title'] . '</span></div>';
                            }
                        }
                    }
                }
            }
        }

        echo $html;
    }

    public function stats($shop)
    {
        if ($this->db->where('shop', $shop)->get('shops')->num_rows() == 0) {
            echo '<script>window.location.href = "' . base_url() . 'install?shop=' . $_GET['shop'] . '";</script>';
        }

        $shop_data = $this->db->where('shop', $shop)->get('shops')->row();

        $data['token'] = $shop_data->token;
        $data['shop'] = $shop_data->shop;

        $data['page_name'] = 'stats';
        $this->load->view('index', $data);
    }
    
    public function delstats($oid)
    {
        $this->db->where('offer', $oid)->delete('stats');
    }

    public function brgxczvy()
    {
        $_POST['stat_id'] = $this->db->get('stats')->num_rows() + 1;

        $this->db->insert('stats', $_POST);
        print_r("post <br />");
        print_r($_POST);
    }

    public function metadata()
    {
        $data['shop'] = 'sleek-apps';
        $data['page_name'] = 'metadata';
        $this->load->view('index', $data);
    }

    public function privacypolicy()
    {
        $data['shop'] = 'sleek-apps';
        $data['page_name'] = 'privacy-policy';
        $this->load->view('index', $data);
    }

    public function users($shop, $token)
    {
        if ($shop == 'berjis-tech-ltd' || $shop == 'sleek-apps') {
            if ($token != $this->db->where('shop', $shop)->get('shops')->row()->token) {
                header('location: https://' . $shop . '/admin/apps');
            }
        } else {
            header('location: https://' . $shop . '/admin/apps');
        }

        $data['user'] = $this->db->get('shops')->result_array();
        $data['api_key'] = $this->config->item('shopify_api_key');
        $data['shop'] = $shop;
        $data['token'] = $token;
        $data['page_name'] = 'admin_dashboard';
        $this->load->view('index', $data);
    }

    public function sombo($shop, $token)
    {
        $shop_data = $this->db->where('shop', $shop)->get('shops')->row();

        if ($this->db->where('shop', $shop)->get('offers')->num_rows() > 0) {
            $offers = $this->db->where('shop', $shop)->get('offers')->result_array();
            foreach ($offers as $key => $value) {
                $oid = $value['offer_id'];
                $data['offer'][$oid]['offer'] = $this->db->where('offer_id', $oid)->get('offers')->result_array();
                $data['offer'][$oid]['products'] = $this->db->where('offer', $oid)->get('products')->result_array();
                $data['offer'][$oid]['variants'] = $this->db->where('oid', $oid)->get('variants')->result_array();
                $data['offer'][$oid]['blocks'] = $this->db->where('oid', $oid)->get('cbs')->result_array();
                $data['offer'][$oid]['conditions'] = $this->db->where('oid', $oid)->get('ocs')->result_array();
                $data['offer'][$oid]['fields'] = $this->db->where('oid', $oid)->get('cfs')->result_array();
                $data['offer'][$oid]['choices'] = $this->db->where('oid', $oid)->get('choices')->result_array();
            }
        }

        $data['api_key'] = $this->config->item('shopify_api_key');
        $data['shop'] = $shop;
        $data['token'] = $token;
        $data['page_name'] = 'ad_dashboard';
        $this->load->view('index', $data);
    }

    public function refresh_store_data($shop, $token){

        $s_data = $this->Shopify->shopify_call($token, $shop, '/admin/api/2020-10/shop.json', array(), 'GET');
        $s_data = json_decode($s_data['response'], true);
        print_r($s_data);
        $s_data = $s_data['shop'];

        $s_array = array(
            'plan_name' => $s_data['plan_name'],
            'shop_owner' => $s_data['shop_owner'],
            'plan_display_name' => $s_data['plan_display_name'],
            'customer_email' => $s_data['customer_email'],
            'domain' => $s_data['domain'],
            'partner' => $s_data['id']
        );

        $this->db->where('shop', $shop)->set($s_array)->update('shops');
    }
}
