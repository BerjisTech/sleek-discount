<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>

    <!--   <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>-->
    <!--<script type="text/javascript">-->
    <!--	ShopifyApp.init({-->
    <!--		apiKey: '<?php #echo $api_key;  
                            ?>',-->
    <!--		shopOrigin: '<?php #echo 'https://'  . $shop. '.myshopify.com'; 
                                ?>' -->
    <!--           });-->
    <!--	ShopifyApp.ready(function () {-->
    <!--		ShopifyApp.Bar.initialize({-->
    <!--			buttons: {-->
    <!--				primary: {-->
    <!--					label: 'Save',-->
    <!--					message: 'unicorn_form_submit',-->
    <!--					loading: true-->
    <!--				}-->
    <!--			}-->
    <!--		});-->
    <!--	});-->
    <!--    console.log(document.referrer);-->
    <!--</script>-->
</head>

<body class="page-body skin-blue gray" data-url="<?php echo base_url(); ?>" data-shop-url="https://<?php echo $shop; ?>.myshopify.com/">

    <style>
        .tha_loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            margin: 250px auto;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Customize website's scrollbar like Mac OS Not supports in Firefox and IE */

        /* total width */
        *::-webkit-scrollbar {
            background-color: #fff;
            width: 16px
        }

        /* background of the scrollbar except button or resizer */
        *::-webkit-scrollbar-track {
            background-color: #fff
        }

        *::-webkit-scrollbar-track:hover {
            background-color: #f4f4f4
        }

        /* scrollbar itself */
        *::-webkit-scrollbar-thumb {
            background-color: #003471;
            border-radius: 16px;
            border: 5px solid #fff
        }

        *::-webkit-scrollbar-thumb:hover {
            background-color: #003471;
            border: 4px solid #f4f4f4
        }

        /* set button(top and bottom of the scrollbar) */
        *::-webkit-scrollbar-button {
            display: none
        }
    </style>

    <div class="ficha_hii" style="width: 100%; height: 100vh; display: table; background: #FFFFFF; z-index: 20000; position: fixed; text-align: center; vertical-align: middle;">
        <div class="tha_loader"></div>
    </div>

    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
        var shop_url = 'https://<?php echo $shop; ?>.myshopify.com';
        $(window).load(function() {
            $('.ficha_hii').hide(300);
        });
    </script>
    <div class="page-container">
        <div class="main-content">
            <?php include $page_name . '.php'; ?>
        </div>
    </div><?php include 'footer.php'; ?>
    <script type="text/javascript">
        ! function(e, t, n) {
            function a() {
                var e = t.getElementsByTagName("script")[0],
                    n = t.createElement("script");
                n.type = "text/javascript", n.async = !0, n.src = "https://beacon-v2.helpscout.net", e.parentNode.insertBefore(n, e)
            }
            if (e.Beacon = n = function(t, n, a) {
                    e.Beacon.readyQueue.push({
                        method: t,
                        options: n,
                        data: a
                    })
                }, n.readyQueue = [], "complete" === t.readyState) return a();
            e.attachEvent ? e.attachEvent("onload", a) : e.addEventListener("load", a, !1)
        }(window, document, window.Beacon || function() {});
    </script>
    <script type="text/javascript">
        window.Beacon('init', 'a622d317-9f86-462f-9ad2-c13970d05d1f')
    </script>
</body>

</html>