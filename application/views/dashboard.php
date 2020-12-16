<?php $duka = $shop . '.myshopify.com'; ?>
<style>
    pre {
        padding: 10px;
        border: 1px solid #3A3A3A;
        border-radius: 10px;
    }

    .dataTables_wrapper {
        background: #ffffff;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 10px;
    }

    .datatable *,
    .datatable,
    .dataTables_wrapper {
        border: none !important;
    }

    .datatable thead,
    .datatable tbody {
        display: table;
        border: none;
        width: 100%;
    }

    .datatable tr {
        display: flex;
        border: none;
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .datatable tbody tr {
        border-radius: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        box-shadow: 0px 0px 10px rgba(6, 6, 6, 0.2);
    }

    .whats,
    .whats span,
    .whats a {
        color: #ffffff;
        width: 100%;
        font-size: 18px;
    }

    .whole {
        display: block;
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0px;
        left: 0px;
    }

    .mwili {
        top: 0vh;
        display: flex;
        width: 100vw;
        height: 100vh;
        position: fixed;
        background: #ffffff;
    }
</style>
<div class="whole">
    <div class="mwili">
        <div style="width: 50px; height: 100vh; background: #003471; display: flex; flex-direction: column; justify-content: space-between; align-items: center; text-align: center;">
            <span class="whats">
                <a title="Settings" href="<?php echo base_url(); ?>settings/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><span class="btn btn-primary entypo-cog"></span></a>
                <a style="display: none;" title="Setup Wizard" target="_BLANK" href="https://<?php echo $shop; ?>.myshopify.com?s=<?php echo sha1($shop); ?>&t=<?php echo $token; ?>"><span class="btn btn-primary entypo-feather"></span></a>
                <a style="display: none;" title="Subscription" href="<?php echo base_url(); ?>settings/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><span class="btn btn-primary entypo-credit-card"></span></a>
                <span><a title="New Offer" href="<?php echo base_url(); ?>new_offer/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><span class="btn btn-primary btn-sm"><i class="entypo-plus"></i></span></a></span>
                <span><a title="Stats" href="<?php echo base_url(); ?>stats/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><span class="btn btn-primary btn-sm"><i class="entypo-chart-line"></i></span></a></span>
            </span>
            <?php if ($shop == 'berjis-tech-ltd' || $shop == 'sleek-apps') : ?>
                <span class="whats">
                    <span class="dropdown language-selector">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" class="btn btn-primary"><img src="https://demo.neontheme.com/assets/images/flags/flag-uk.png" width="16" height="16" /></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><img src="https://demo.neontheme.com/assets/images/flags/flag-de.png" width="16" height="16" /><span>Deutsch</span></a></li>
                            <li class="active"><a href="#"><img src="https://demo.neontheme.com/assets/images/flags/flag-uk.png" width="16" height="16" /><span>English</span></a></li>
                            <li><a href="#"><img src="https://demo.neontheme.com/assets/images/flags/flag-fr.png" width="16" height="16" /><span>François</span></a></li>
                            <li><a href="#"><img src="https://demo.neontheme.com/assets/images/flags/flag-al.png" width="16" height="16" /><span>Shqip</span></a></li>
                            <li><a href="#"><img src="https://demo.neontheme.com/assets/images/flags/flag-es.png" width="16" height="16" /><span>Español</span></a></li>
                        </ul>
                    </span>
                    <a href="#" data-toggle="chat" data-collapse-sidebar="1" class="btn btn-primary btn-sm"><i class="entypo-chat"></i><span class="badge badge-success chat-notifications-badge is-hidden">0</span></a>
                    <span> <i class="btn btn-primary btn-sm entypo-help"></i></span>
                    <span><a title="Users" href="<?php echo base_url(); ?>users/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>"><i class="btn btn-primary btn-sm entypo-users"></i></a></span>
                </span>
            <?php endif; ?>
        </div>
        <div style="height: 100vh; overflow-y: auto; flex-grow: 4; padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 0px; background: #F1F2F3;">

            <?php if ($this->db->where('shop', $shop)->get('discounts')->num_rows() == 0) : ?>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="tile-stats tile-white stat-tile" style="box-shadow: 0px 0px 5px rgba(2, 2, 2, 0.2); height: auto !important;">
                            <h1 style="width: 100%; text-align: center;">
                                <img src="https://sleek-upsell.com/logo.png" style="width: 50px;">
                                Sleek Upsell
                            </h1>
                            <hr />
                            <h3>Welcome to the world of Sleek Upsell</h3>
                            <p style="font-size: 18px !important; color: #8797A8 !important; margin-bottom: 0px !important;">Thank you for choosing Sleek Upsell to boost your sales! the app has veerything in-built. No need for complex settings to get you started. Use the links below to create offers and adjust the visual design.</p>

                            <p style="font-size: 18px !important; color: #8797A8 !important; margin-bottom: 0px !important;">Need help? Be sure to drop an email and we will repsond in less than 20 minutes. Our support team thrives on customer happiness</p>

                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 20px 50px 20px;">
                                <a href="<?php echo base_url(); ?>new_offer/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-lg btn-primary btn-icon icon-right"><i class="entypo-plus"></i>CREATE AN OFFER</a>
                                <a href="<?php echo base_url(); ?>settings/<?php echo $shop; ?>/<?php echo $token; ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-lg btn-primary btn-icon icon-right"><i class="entypo-cog"></i>GENERAL SETTINGS</a>
                                <span onclick="Beacon('open');" class="btn btn-lg btn-danger btn-icon icon-right"><i class="entypo-help"></i>SUPPORT</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->db->where('shop', $shop)->get('discount')->num_rows() > 0) : ?>

                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        var $table4 = jQuery("#table-4");
                        $table4.DataTable({
                            //'aLengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                            dom: 'Bfrtip',
                            buttons: [
                                'copyHtml5',
                                'excelHtml5',
                                'csvHtml5',
                                'pdfHtml5',
                                'print'
                            ]
                        });
                        $table4.closest('.dataTables_wrapper').find('select').select2({
                            minimumResultsForSearch: -1
                        });
                    });
                </script>
                
                <table class="datatable" id="table-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Offer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div style="display: none;">
                    <h2 style="width: 100%; height: auto; text-align: center;">What's new</h2>

                    <table style="width: 100%; height: auto; border: none; background: #FFFFFF; padding: 10px; margin-bottom: 20px;">
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">1</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Condition blocks:<br />Use both <strong>AND</strong> and <strong>OR</strong> clause in your trigger options</pre>
                            </td>
                        </tr>
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">2</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Multiple custom fields options<br />Dropdowns, textareas, text inputs, number inputs, colors swatchs, radio buttons, checkboxes</pre>
                            </td>
                        </tr>
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">3</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Removed MAX 3 limitation on custom fields</pre>
                            </td>
                        </tr>
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">4</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Better settings adjustments.</pre>
                            </td>
                        </tr>
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">5</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Product level settings. <br />Hide specific product titles, images, prices, etc<br />product specific offer text</pre>
                            </td>
                        </tr>
                        <tr style="border: none; background: #FFFFFF; padding: 10px;">
                            <td style="border: none; background: #FFFFFF; padding: 10px;">6</td>
                            <td style="border: none; background: #FFFFFF; padding: 10px;">
                                <pre>Stats page UI change</pre>
                            </td>
                        </tr>
                    </table>
                </div>
                <script>
                    $('.offer_status').change(function() {
                        let o = $(this).attr('data-oid');
                        if (this.checked) {
                            if (confirm('Are you sure you want to activate this offer?')) {
                                $.ajax({
                                    type: "POST",
                                    url: base_url + 'offer_status/' + o + '/1?<?php echo $_SERVER['QUERY_STRING']; ?>',
                                    data: '',
                                    success: function(response) {
                                        $('.os' + o).prop('checked', true);
                                    },
                                    error: function() {
                                        alert('An error occured');
                                    }
                                });
                            }
                        } else {
                            if (confirm('Are you sure you want to deactivate this offer?')) {
                                $.ajax({
                                    type: "POST",
                                    url: base_url + 'offer_status/' + o + '/0?<?php echo $_SERVER['QUERY_STRING']; ?>',
                                    data: '',
                                    success: function(response) {
                                        $('.os' + o).prop('checked', false);
                                    },
                                    error: function() {
                                        alert('An error occured');
                                    }
                                });
                            }
                        }
                    });
                </script>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css" id="style-resource-1">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2-bootstrap.css" id="style-resource-2">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css" id="style-resource-3">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/daterangepicker/daterangepicker-bs3.css" id="style-resource-4">
                <script src="<?php echo base_url(); ?>assets/js/datatables/datatables.js" id="script-resource-8"></script>
                <script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js" id="script-resource-9"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>
            <?php endif; ?>
        </div>
    </div>
</div>