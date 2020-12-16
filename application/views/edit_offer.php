<script>
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
</script>
<style>
    @media only screen and (min-width: 600px) {
        .offer-change-section {
            position: fixed;
            float: right;
            right: 0px;
        }
    }

    /* Customize website's scrollbar like Mac OS
Not supports in Firefox and IE */

    /* total width */
    .globalSets::-webkit-scrollbar,
    .offerForm::-webkit-scrollbar {
        background-color: #fff;
        width: 16px
    }

    /* background of the scrollbar except button or resizer */
    .globalSets::-webkit-scrollbar-track,
    .offerForm::-webkit-scrollbar-track {
        background-color: #fff
    }

    .globalSets::-webkit-scrollbar-track:hover,
    .offerForm::-webkit-scrollbar-track:hover {
        background-color: #f4f4f4
    }

    /* scrollbar itself */
    .globalSets::-webkit-scrollbar-thumb,
    .offerForm::-webkit-scrollbar-thumb {
        background-color: #003471;
        border-radius: 16px;
        border: 5px solid #fff
    }

    .globalSets::-webkit-scrollbar-thumb:hover,
    .offerForm::-webkit-scrollbar-thumb:hover {
        background-color: #063d7d;
        border: 4px solid #f4f4f4
    }

    /* set button(top and bottom of the scrollbar) */
    .globalSets::-webkit-scrollbar-button,
    .offerForm::-webkit-scrollbar-button {
        display: none
    }

    option {
        height: auto;
        padding: 10px;
        text-align: center;
    }
</style>

<style>
    .sleek-upsell {
        background: #ECF0F1;
        color: #2B3D51;
        padding: 5px;
        font-family: inherit;
        vertical-align: middle;
        margin: 5px;
    }

    .sleek-image img {
        width: 100px;
    }

    .sleek-text {
        font-weight: bold;
    }

    .sleek-upsell select {
        padding: 4px;
        margin-top: 5px;
    }

    .sleek-prices {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .sleek-compare-price {
        text-decoration: line-through;
    }

    .sleek-upsell button {
        padding: 10px;
        border: none;
        background: #2B3D51;
        color: #FFFFFF;
        font-weight: bold;
        border-radius: 0px;
        cursor: pointer;
        width: 100%;
    }

    /*--------------------------------------*/
    .card {
        display: table;
    }

    .card .sleek-form {
        display: flex;
    }

    .card .sleek-image,
    .card .sleek-offer,
    .card .sleek-card-atc {
        display: table;
        align-self: center;
        padding: 5px;
    }

    .card .sleek-offer {
        flex-grow: 4;
    }

    .card .sleek-prices {
        text-align: center;
    }

    /*--------------------------------------*/
    .block,
    .block .sleek-form,
    .block .sleek-text,
    .block .sleek-atc {
        display: table;
    }

    .sleek-block {
        display: flex;
    }

    .block .sleek-image,
    .block .sleek-offer {
        display: table;
        align-self: center;
        padding: 5px;
    }

    .block .sleek-offer {
        flex-grow: 1;
    }

    /*--------------------------------------*/
    .half-block,
    .half-block .sleek-form,
    .half-block .sleek-text,
    .half-block .sleek-atc {
        display: table;
    }

    .sleek-half-block {
        display: flex;
    }

    .half-block .sleek-image,
    .half-block .sleek-offer {
        display: table;
        align-self: center;
        padding: 5px;
    }

    .half-block .sleek-offer {
        flex-grow: 1;
    }

    /*--------------------------------------*/
    .flat,
    .flat .sleek-form,
    .flat .sleek-text {
        display: table;
    }

    .sleek-flat {
        display: flex;
    }

    .flat .sleek-image,
    .flat .sleek-offer {
        display: table;
        align-self: center;
        padding: 5px;
    }

    .flat .sleek-offer {
        flex-grow: 1;
    }

    .flat .flex-select {
        display: flex;
        width: auto;
        margin-top: 10px;
    }

    .flat .v-select {
        display: table;
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .flat .atc {
        flex-grow: 4;
    }

    .flat .q-select {
        margin-top: 0px;
        margin-right: 10px;
    }

    /*--------------------------------------*/
    .compact,
    .compact .sleek-form,
    .compact .sleek-text,
    .compact .sleek-atc {
        display: table;
    }

    .sleek-compact {
        display: flex;
    }

    .compact .sleek-image,
    .compact .sleek-offer {
        display: table;
        align-self: center;
        padding: 5px;
    }

    .compact .sleek-offer {
        flex-grow: 1;
    }

    .compact .sleek-atc {
        margin-top: 5px;
    }


    /*--------------------------------------*/
    @media only screen and (max-width: 600px) {
        .sleek-upsell {
            width: 97%;
            margin: 5px auto;
        }

        .card select {
            max-width: 100px;
        }

        .block select {
            max-width: 200px;
        }

        .sleek-prices * {
            display: inline-table;
        }

        .block .sleek-form,
        .block .sleek-text,
        .block .sleek-atc {
            width: 100%;
        }
    }
</style>
<script>
    let offer = <?php echo json_encode($offer); ?>;
    let updating_offer = offer[0]['offer_id'];
    let products = <?php echo json_encode($products); ?>;
    let variants = <?php echo json_encode($variants); ?>;
    let blocks = <?php echo json_encode($blocks); ?>;
    let conditions = <?php echo json_encode($conditions); ?>;
    let fields = <?php echo json_encode($fields); ?>;
    let choices = <?php echo json_encode($choices); ?>;
</script>
<div class="row">
    <div class="col-sm-4 col-xs-12" style="position: fixed; top: 0px; left: 0px; height: 100vh;">
        <div style="display: flex; align-items: center; justify-content: space-between; background: #003471; position: absolute; top: 0px; left: 0px; height: 7vh; width: 100%; vertical-align: middle;">
            <div onclick="window.location.replace('<?php echo base_url() . '?' . $_SERVER['QUERY_STRING']; ?>');" style="margin: 0px; padding: 0px; height: 100%; vertical-align: middle; text-align: center; border-radius: 0px;">
                <span style="height: 100%; margin: 0px; vertical-align: middle; padding-top: 2vh; text-align: center;" class="btn btn-primary entypo-home"></span>
            </div>
            <div style="flex-grow: 4; margin: 0px; padding: 0px; height: 100%; vertical-align: middle;"><select style="border-radius: 0px; width: 100%; height: 100%; margin: 0px; vertical-align: middle;" class="toplect form-control">
                    <option value="global">Global</option>
                </select></div>
            <div style="margin: 0px; padding: 0px; height: 100%; vertical-align: middle;"><span style="width: 100%; height: 100%; margin: 0px; vertical-align: middle; padding-top: 2vh;" onclick="showAjaxModal('products');" class="btn btn-primary btn-icon icon-right"><i class="entypo-plus" style="padding-top: 2vh;"></i>Add
                    Product</span></div>
        </div>
        <div style="position: absolute; top: 7vh; left: 0px; height: 93vh; overflow-y: auto; width: 100%;" class="globalSets">
            <div class="panel-group joined" id="accordion-test-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" aria-expanded="true">
                                1: Offer Details
                            </a> </h4>
                    </div>
                    <div id="collapseOne-2" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <h4>Offer Title <br /><small>(Optional) Your customers won't see this</small></h4>
                            <div style="display: table; width: 100%; margin-bottom: 10px;">
                                <input type="text" class="form-control offer_title" style="padding: 10px; border: 2px solid #666666; border-radius: 5px;" />
                            </div>
                            <div style="display: table; width: 100%; margin-bottom: 10px; vertical-align: top;">
                                <div class="panel products_handler">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseTwo-2" class="collapsed">
                                2: Design
                            </a> </h4>
                    </div>
                    <div id="collapseTwo-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div style="display: table; width: 100%;">
                                <h4>Offer Text <br /><small>eg Get 20% discount</small></h4>
                                <textarea class="form-control general_offer_text" placeholder="offer text" style="margin: 5px auto; height: auto; min-height: 100px; width: 99%; border: 2px solid #666666;"></textarea>
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Button Text <br /><small>eg Yes Please or Add To Cart</small></h4>
                                <input type="text" name="button-text" value="ADD TO CART" class="form-control general_offer_button_text" style="padding: 10px; border: 2px solid #666666; border-radius: 5px;" />
                            </div>
                            <div style="display: none; width: 100%;">
                                <h4>Color Scheme <br /><small>Choose the offer color scheme</small></h4>
                                <select name="button-text" placeholder="ADD TO CART" class="form-control general_offer_color_scheme" style="border: 2px solid #666666; border-radius: 5px;">
                                    <option value="custom">Custom</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Display options <br /><small>Extra general UI settings</small></h4>
                                <label><input type="checkbox" class="offer_closable" value="1" /> Show an x to
                                    dismiss offer</label><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2" class="collapsed">
                                3: Conditions
                            </a> </h4>
                    </div>
                    <div id="collapseThree-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4>Offer Conditions <br /><small>Choose when to give your customers this offer</small></h4>
                            <div style="display: table; width: 100%; margin-bottom: 10px; vertical-align: top;">
                                <div style="display: table; width: 100%; width: 100%; background: #ffffff; padding: 5px; margin-bottom: 5px;">
                                    <p>Select the eneral rule that'll Affects blocks e.g Block 1 and/or Block 2
                                        <select class="form-control offer_general_rule">
                                            <option value="ALL">ALL</option>
                                            <option value="ANY">ANY</option>
                                        </select>
                                    </p>
                                    <p>
                                        <p>Block Clause <br /><small>Affects conditions within specific blocks e.g this condition 1 and/or that condition 2</small></p>
                                        <div class="input-group" style="margin: 0px; padding: 0px;">
                                            <select class="form-control offer_block_rule">
                                                <option value="ALL">ALL</option>
                                                <option value="ANY">ANY</option>
                                            </select>
                                            <span class="btn btn-primary btn-icon icon-right input-group-addon" onclick="addBlock();"> <i class="entypo-plus"></i>Add Block</span>
                                        </div>
                                    </p>
                                </div>
                                <div class="conditionsHandler">
                                </div>
                                <div class="single_conditions" style="display: none; width: 100%; width: 100%; background: #ffffff; padding: 5px; margin-bottom: 5px;">
                                    <p>Add conditions to block <select class="which_b"></select> </p>
                                </div>
                            </div>
                            <div class="conditions_btn_wrapper" style="display: none; width: 100%; margin-bottom: 10px; vertical-align: top;">
                                <span class="btn btn-info btn-icon icon-right pull-right" onclick="showAjaxModal('conditions');"> <i class="entypo-plus"></i>Add
                                    Condition</span>
                            </div>
                            <div style="display: table; width: 100%; height: 1px; background: #333333;"></div>
                            <h4>Extra Options <br /><small>Adjust the offers conditional triggers</small></h4>
                            <div style="display: table; width: 100%; margin-bottom: 10px; vertical-align: top;">
                                <label><input type="checkbox" class="offer_show_after_accepted" value="1" /> Don't
                                    continue to show the offer after it has been accepted</label><br />
                                <label><input type="checkbox" class="offer_required_for_checkout" value="1" /> The
                                    offer must be accepted in order to continue.</label><br />
                                <label><input type="checkbox" class="offer_automatically_remove" value="1" /> Remove
                                    offer product from cart if offer conditions are no longer met.</label><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFour-2" class="collapsed">
                                4: Offer Addons
                            </a> </h4>
                    </div>
                    <div id="collapseFour-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div style="display: table; width: 100%; margin-bottom: 10px;">
                                <label><input type="checkbox" class="offer_apply_discount" value="1" /> Add add
                                    discount to this offer. <br /><span class="text-info">Paste your discount code
                                        below</span></label><br />
                                <input type="text" name="discount-code" placeholder="Paste your discount code here" class="form-control offer_discount_code" style="padding: 10px; border: 2px solid #666666; border-radius: 5px;" />
                            </div>
                            <div style="display: table; width: 100%; margin-bottom: 10px;">
                                <label><input type="checkbox" class="offer_to_checkout" value="1" /> Send user to
                                    checkout after accepting offer</label><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center;">
                        <label class="switch">
                            <input class="switcheck offer_status" type="checkbox" value="1">
                            <span class="slidr round"></span>
                        </label>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 offerDraftBtn" onclick="deactivateOffer();" style="text-align: center; cursor: pointer;">DRAFT</div>
                            <div class="col-xs-6 offerActiveBtn" onclick="activateOffer();" style="text-align: center; cursor: pointer;">ACTIVE</div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center;">
                        <button class="btn btn-lg btn-flat btn-primary saveOffer">Save</button>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div style="position: absolute; top: 7vh; left: 0px; height: 93vh; overflow-y: auto; width: 100%; display: none;" class="offerForm">
            <input autocomplete="false" type="hidden" value="card" class="offer_layout" />
            <div class="panel-group joined" id="accordion-test-p2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-p2" href="#collapseTwo-p2" aria-expanded="true">
                                1: Product Design
                            </a> </h4>
                    </div>
                    <div id="collapseTwo-p2" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div style="display: table; width: 100%;">
                                <h4>Offer Text <br /><small>eg Get 20% discount</small></h4>
                                <textarea class="form-control offer_text" placeholder="offer text" style="margin: 5px auto; height: auto; min-height: 100px; width: 99%; border: 2px solid #666666;"></textarea>
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Button Text <br /><small>eg Yes Please or Add To Cart</small></h4>
                                <input type="text" name="button-text" value="ADD TO CART" class="form-control offer_button_text" style="padding: 10px; border: 2px solid #666666; border-radius: 5px;" />
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Color Scheme <br /><small>Product block color scheme (will only affect this product)</small></h4>
                                <select name="button-text" placeholder="ADD TO CART" class="form-control offer_color_scheme" style="border: 2px solid #666666; border-radius: 5px;">
                                    <option value="default">Default</option>
                                    <option value="custom">Custom</option>
                                </select>
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Product options <br /><small>These will only affect this particular product</small></h4>
                                <label><input type="checkbox" class="offer_product_image" value="1" checked /> Show
                                    product image</label><br />
                                <label><input type="checkbox" class="offer_product_title" value="1" checked /> Show
                                    product title</label><br />
                                <label><input type="checkbox" class="offer_product_price" value="1" checked /> Show
                                    product price</label><br />
                                <label><input type="checkbox" class="offer_compare_at_price" value="1" checked /> Show
                                    product compare at price</label><br />
                                <label><input type="checkbox" class="offer_variant_price" value="1" checked /> Show
                                    variant price</label><br />
                            </div>
                            <div style="display: table; width: 100%;">
                                <h4>Display options <br /><small>Extra display options for this product</small></h4>
                                <label><input type="checkbox" class="offer_linked" value="1" /> Link offer to product
                                    page</label><br />
                                <label><input type="checkbox" class="offer_quantity_chooser" value="1" checked /> Show
                                    quantity chooser</label><br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-p2" href="#collapseThree-p2" class="collapsed">
                                2: Upgrade Settings
                            </a> </h4>
                    </div>
                    <div id="collapseThree-p2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Want this to be an upgrade?</h3><br />
                            <div style="display: table; width: 100%; padding: 10px;">
                                <h4>Choose the product to be replaced once this offered product is accepted<br /><small>Search product or variant</small></h4>
                                <div class="input-group">
                                    <input type="text" placeholder="ADD TO CART" class="form-control replace_this" style="padding: 10px; border: 2px solid #666666; border-radius: 5px 0px 0px 5px;" />
                                    <span class="input-group-addon btn btn-primary entypo-cancel" onclick="$('.replacer').html('');products[$('.toplect').val()]['rp']='';products[$('.toplect').val()]['rv']='';">CLEAR</span>
                                </div>
                                <div class="replacer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-p2" href="#collapseFour-p2" class="collapsed">
                                3: Product Custom Fields
                            </a> </h4>
                    </div>
                    <div id="collapseFour-p2" class="panel-collapse collapse" style="margin: 0px; padding: 0px;">
                        <div class="panel-body" style="margin: 0px; padding: 0px;">
                            <div style="display: table; width: 100%; margin: 0px; padding: 0px;">
                                <div class="panel minimal minimal-gray">
                                    <div class="panel-heading">
                                        <div class="panel-title hidden">
                                            <h4>Minimal Panel</h4>
                                        </div>
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#profile-1" data-toggle="tab" aria-expanded="1">Create Custom Fields</a>
                                                </li>
                                                <li class="">
                                                    <a href="#profile-2" data-toggle="tab" aria-expanded="false">Check fields</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile-1">
                                                <form method="GET" class="fields_form">
                                                    <select class="field_type form-control col-xs-12">
                                                        <option value="" selected="selected">Choose an option type...</option>
                                                        <option value="select">Dropdown</option>
                                                        <option value="text">Single Line Text</option>
                                                        <option value="number">Number</option>
                                                        <option value="textarea">Paragraph Text</option>
                                                        <option value="file">File Upload</option>
                                                        <option value="checkbox">Single Checkbox</option>
                                                        <option value="checkbox_group">Checkbox Group</option>
                                                        <option value="radio">Radio Buttons</option>
                                                        <option value="date">Date Picker</option>
                                                        <option value="swatch">Swatch Picker</option>
                                                    </select>
                                                    <input required type="text" class="field_name form-control col-xs-12" placeholder="Option name" />
                                                    <input required type="text" class="field_placeholder form-control col-xs-12" placeholder="Option placeholder" />
                                                    <input type="number" class="field_price form-control col-xs-12" placeholder="Option price" />
                                                    <div class="choices" style="display: none;">
                                                        <p class="col-xs-12">Option Choices</p>
                                                        <div class="col-xs-12 c_1 sleek_choice" style="padding: 0px;">
                                                            <span class="btn btn-sm entypo-up pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-down pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <input type="text" class="c_1_n" placeholder="Choice 1" />
                                                            <input type="number" class="c_1_p" placeholder="Price" value="0" />
                                                            <span class="btn btn-sm entypo-plus pull-right btn-default" onclick="" style="font-weight: bold; margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-minus pull-right btn-default" onclick="" style="font-weight: bold; margin: 0px;"></span>
                                                        </div>
                                                        <div class="col-xs-12 c_2 sleek_choice" style="padding: 0px;">
                                                            <span class="btn btn-sm entypo-up pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-down pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <input type="text" class="c_2_n" placeholder="Choice 2" />
                                                            <input type="number" class="c_2_p" placeholder="Price" value="0" />
                                                            <span class="btn btn-sm entypo-plus pull-right btn-default" onclick="" style="margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-minus pull-right btn-default" onclick="" style="margin: 0px;"></span>
                                                        </div>
                                                        <div class="col-xs-12 c_3 sleek_choice" style="padding: 0px;">
                                                            <span class="btn btn-sm entypo-up pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-down pull-left btn-default" onclick="" style="margin: 0px;"></span>
                                                            <input type="text" class="c_3_n" placeholder="Choice 3" />
                                                            <input type="number" class="c_3_p" placeholder="Price" value="0" />
                                                            <span class="btn btn-sm entypo-plus pull-right btn-default" onclick="" style="margin: 0px;"></span>
                                                            <span class="btn btn-sm entypo-minus pull-right btn-default" onclick="" style="margin: 0px;"></span>
                                                        </div>
                                                    </div>
                                                    <label class="col-xs-12" style="padding: 0px;"><input type="checkbox" class="field_required" /> Is this field required?</label>
                                                    <button class="btn btn-primary form-control btn-md center col-xs-12 save_option">ADD OPTION</button>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="profile-2">
                                                <div class="panel-group joined fields_holder" id="accordion-fields"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="console.log(offer);console.log(products);console.log(variants);console.log(blocks);console.log(conditions);console.log(fields);console.log(choices);">Log Arrays</div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 offer-change-section hidden-xs">
        <div class="affixiate">
            <div class="row" style="background: #ffffff; padding-top: 10px; padding-bottom: 10px;">
                <div class="col-sm-12" style="vertical-align: middle;">
                    <div class="sleekOffer">

                        <div class="card sleek-upsell"></div>
                        <div class="hidden half-block sleek-upsell"></div>
                        <div class="hidden block sleek-upsell"></div>
                        <div class="hidden flat sleek-upsell"></div>
                        <div class="hidden compact sleek-upsell"></div>

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="offerPicker">
                        <img class="active-selector" src="<?php echo base_url(); ?>assets/images/card.png" onclick="$('.active-selector').removeClass('active-selector');$(this).addClass('active-selector');pick('card');" style="width: 100px; height: auto; margin: 5px; cursor: pointer;" />
                        <img src="<?php echo base_url(); ?>assets/images/block.png" onclick="$('.active-selector').removeClass('active-selector');$(this).addClass('active-selector');pick('block');" style="width: 100px; height: auto; margin: 5px; cursor: pointer;" />
                        <img src="<?php echo base_url(); ?>assets/images/half_block.png" onclick="$('.active-selector').removeClass('active-selector');$(this).addClass('active-selector');pick('half-block');" style="width: 100px; height: auto; margin: 5px; cursor: pointer;" />
                        <img src="<?php echo base_url(); ?>assets/images/flat.png" onclick="$('.active-selector').removeClass('active-selector');$(this).addClass('active-selector');pick('flat');" style="width: 100px; height: auto; margin: 5px; cursor: pointer;" />
                        <img src="<?php echo base_url(); ?>assets/images/compact.png" onclick="$('.active-selector').removeClass('active-selector');$(this).addClass('active-selector');pick('compact');" style="width: 100px; height: auto; margin: 5px; cursor: pointer;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="productsModal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="1">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" style="padding: 0px; margin: 0px;">
                <div style="display: table; width: 100%; padding: 0px; margin: 0px;" id="products-wrappers">
                    <input type="text" autocomplete="off" class="form-control" id="search" name="search" style="display: table; width: 96%; margin: 3px auto; padding: 10px; border: 2px solid #666666; border-radius: 5px;" placeholder="Search for item">
                    <div style="display: table; margin: 3px auto; width: 96%;" id="products"></div>
                </div>
                <div class="form-inline" style="display: table; width: 100%; padding: 0px; margin: 0px;" id="conditions-wrappers">
                    <select type="text" autocomplete="off" class="small form-control" id="conditionSelector" style="margin: 3px; width: 250px; border: 2px solid #666666; border-radius: 5px;">
                        <option value="oc1">Cart has at least</option>
                        <option value="oc2">Cart has at most</option>
                        <option value="oc3">Cart has exactly</option>
                        <option value="oc4">Cart does not have any</option>
                        <option value="oc5">Cart total is at least</option>
                        <option value="oc6">Cart total is at most</option>
                        <option value="oc7">Customer is located in</option>
                        <option value="oc8">Customer is not located in</option>
                    </select>
                    <select type="text" autocomplete="off" class="small form-control" id="oc1Quantity" style="margin: 3px; max-width: 250px; border: 2px solid #666666; border-radius: 5px;">
                        <?php for ($i = 1; $i <= 20; $i++) : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <select type="text" autocomplete="off" class="small form-control" id="oc1Type" style="margin: 3px; width: 250px; border: 2px solid #666666; border-radius: 5px;">
                        <option value="product">Of product</option>
                        <option value="variant">Of variant</option>
                        <option value="collection">Item from collection</option>
                    </select>
                    <input type="hidden" class="occ" />
                    <input type="text" autocomplete="off" class="small form-control" id="ocContent" style="margin: 3px; width: 96%; padding: 10px; border: 2px solid #666666; border-radius: 5px;" placeholder="Search for item">
                    <input type="number" autocomplete="off" class="small form-control" id="ocNumber" style="margin: 3px; width: 250px; padding: 10px; border: 2px solid #666666; border-radius: 5px;" placeholder="0 cents">
                    <select id="countries" style="display: none; margin: 3px; max-width: 200px; border: 2px solid #666666; border-radius: 5px;" class="form-control small">
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AG">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AG">Antigua &amp; Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AA">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BL">Bonaire</option>
                        <option value="BA">Bosnia &amp; Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brazil</option>
                        <option value="BC">British Indian Ocean Ter</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="IC">Canary Islands</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CD">Channel Islands</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CI">Christmas Island</option>
                        <option value="CS">Cocos Island</option>
                        <option value="CO">Colombia</option>
                        <option value="CC">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CT">Cote D'Ivoire</option>
                        <option value="HR">Croatia</option>
                        <option value="CU">Cuba</option>
                        <option value="CB">Curacao</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TM">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FA">Falkland Islands</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="FS">French Southern Ter</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GB">Great Britain</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HW">Hawaii</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IA">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IR">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="NK">Korea North</option>
                        <option value="KS">Korea South</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malaysia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="ME">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="MI">Midway Islands</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Nambia</option>
                        <option value="NU">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="AN">Netherland Antilles</option>
                        <option value="NL">Netherlands(Holland, Europe)</option>
                        <option value="NV">Nevis</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NW">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau Island</option>
                        <option value="PS">Palestine</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PO">Pitcairn Island</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="ME">Republic of Montenegro</option>
                        <option value="RS">Republic of Serbia</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="NT">St Barthelemy</option>
                        <option value="EU">St Eustatius</option>
                        <option value="HE">St Helena</option>
                        <option value="KN">St Kitts-Nevis</option>
                        <option value="LC">St Lucia</option>
                        <option value="MB">St Maarten</option>
                        <option value="PM">St Pierre &amp; Miquelon</option>
                        <option value="VC">St Vincent &amp; Grenadines</option>
                        <option value="SP">Saipan</option>
                        <option value="SO">Samoa</option>
                        <option value="AS">Samoa American</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome &amp; Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="OI">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syria</option>
                        <option value="TA">Tahiti</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad &amp; Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TU">Turkmenistan</option>
                        <option value="TC">Turks &amp; Caicos Is</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States of America</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VS">Vatican City State</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VB">Virgin Islands (Brit)</option>
                        <option value="VA">Virgin Islands(USA)</option>
                        <option value="WK">Wake Island</option>
                        <option value="WF">Wallis &amp; Futana Is</option>
                        <option value="YE">Yemen</option>
                        <option value="ZR">Zaire</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                    <div class="c_i" style="display: table; width: 96%; margin: 10px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info saveCondition" style="display: none;">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    loadOffer();
    loadProductData();
    loadUIs();
    showBlocks();
    loadConditions();
    loadFields();
    populateFields();
    let settings = <?php echo json_encode($this->db->where('shop', $shop)->get('settings')->row()); ?>;

    function loadOffer() {
        let this_offer = offer[0];
        console.log(this_offer);

        pick(this_offer['layout']);

        $('.offer_title').val(this_offer['title']);
        $('.offer_general_text').val(this_offer['text']);
        $('.offer_general_button_text').val(this_offer['atc']);
        $('.offer_general_color_scheme').val(this_offer['scheme']);

        if (this_offer['close'] == 'y') {
            $('.offer_closable').prop('checked', true);
        } else {
            $('.offer_closable').prop('checked', false);
        }

        $('.offer_general_rule').val(this_offer['rule']);

        if (this_offer['stop_show'] == 'y') {
            $('.offer_show_after_accepted').prop('checked', true);
        } else {
            $('.offer_show_after_accepted').prop('checked', false);
        }


        if (this_offer['required_checkout'] == 'y') {
            $('.offer_required_for_checkout').prop('checked', true);
        } else {
            $('.offer_required_for_checkout').prop('checked', false);
        }

        if (this_offer['discount'] == 'y') {
            $('.offer_apply_discount').prop('checked', true);
        } else {
            $('.offer_apply_discount').prop('checked', false);
        }

        $('.offer_discount_code').val(this_offer['code']);

        if (this_offer['to_checkout'] == 'y') {
            $('.offer_to_checkout').prop('checked', true);
        } else {
            $('.offer_to_checkout').prop('checked', false);
        }

        if (this_offer['status'] == 1) {
            $('.offer_status').prop('checked', true);
        } else {
            $('.offer_status').prop('checked', false);
        }
    }

    function addBlock() {
        let bid = "<?php echo time(); ?>_" + blocks.length;
        blocks.push({
            'bid': bid,
            'rule': $('.offer_block_rule').val(),
            'oid': ''
        });
        console.log(blocks);
        showBlocks();
        loadConditions();
    }

    function showBlocks() {
        $('.conditionsHandler').html('');
        $('.which_b').html('');
        if (blocks.length > 0) {
            $('.single_conditions').show();
            $('.conditions_btn_wrapper').show();
        } else {
            $('.single_conditions').hide();
            $('.conditions_btn_wrapper').hide();
        }
        $(blocks).each(function(i, v) {
            $('.conditionsHandler').append('<div id="block' + v['bid'] + '" style="display: table; width: 100%; width: 100%; background: #ffffff; padding: 5px; margin-bottom: 5px;"><p>Block ' + (i + 1) + ' <span class="btn btn-danger btn-xs entypo-cancel pull-right" onclick="removeBlock(' + i + ',' + v['bid'] + ', 1);showBlocks();"></span></p><div class="block_c block' + v['bid'] + '"></div></div>');
            $('.which_b').append('<option value="' + v['bid'] + '">Block ' + (i + 1) + '</option>');
        });
        loadConditions();
    }

    function removeBlock(i, bid) {
        conditions = conditions.filter(e => e.bid != bid);
        blocks.splice(i, 1);
        console.log(blocks);
        console.log(conditions);
        showBlocks();
    }

    $('.toplect').change(function() {
        let thing = $(this).val();

        if (thing == 'global') {
            $('.offerForm').hide(150);
            $('.globalSets').show(300);
        } else {
            $('.globalSets').hide(150);
            $('.offerForm').show(300);

            if (products[thing]['show_title'] == 'y') {
                $('.offer_product_title').prop('checked', true);
            } else {
                $('.offer_product_title').prop('checked', false);
            }

            if (products[thing]['show_price'] == 'y') {
                $('.offer_product_price').prop('checked', true);
            } else {
                $('.offer_product_price').prop('checked', false);
            }

            if (products[thing]['show_image'] == 'y') {
                $('.offer_product_image').prop('checked', true);
            } else {
                $('.offer_product_image').prop('checked', false);
            }

            if (products[thing]['v_price'] == 'y') {
                $('.offer_variant_price').prop('checked', true);
            } else {
                $('.offer_variant_price').prop('checked', false);
            }

            if (products[thing]['c_price'] == 'y') {
                $('.offer_compare_at_price').prop('checked', true);
            } else {
                $('.offer_compare_at_price').prop('checked', false);
            }

            if (products[thing]['linked'] == 'y') {
                $('.offer_linked').prop('checked', true);
            } else {
                $('.offer_linked').prop('checked', false);
            }

            if (products[thing]['q_select'] == 'y') {
                $('.offer_quantity_chooser').prop('checked', true);
            } else {
                $('.offer_quantity_chooser').prop('checked', false);
            }

            if (products[thing]['ab_test'] == 'y') {
                $('.offer_ab_test').prop('checked', true);
            } else {
                $('.offer_ab_test').prop('checked', false);
            }

            if (products[thing]['rp']) {

                var title = createCORSRequest("GET", "<?php echo base_url(); ?>product_details/" + products[thing]['rp'] +
                    "/<?php echo $token; ?>/<?php echo $shop; ?>");

                if (title) {
                    title.onload = function() {
                        var data = JSON.parse(title.responseText);
                        var datacell = data['product'];
                        console.log("datacell")
                        console.log(datacell)
                        $('.replace_this').val(datacell['title']);
                        if (products[thing]['rv'] != '') {
                            $('.replace_this').val('(' + datacell['variants'][datacell['variants'].findIndex(x => x.id == products[thing]['rv'])]['title'] + ')' + datacell['title']);
                        }
                    };
                    title.send();
                }
            }
        }
    });
    $('.general_offer_text').on('keyup change', function() {
        if (products.length > 0) {
            $(products).each(function(o, p) {
                if (p['text'] == '') {
                    $('form[data-product-index="' + o + '"]  .sleek-text').html($('.general_offer_text').val());
                    offer[0]['text'] = $('.general_offer_text').val();
                }
            });
        }
    });
    $('.general_offer_button_text').on('keyup change', function() {
        if (products.length > 0) {
            $(products).each(function(o, p) {
                if (p['atc'] == '') {
                    $('form[data-product-index="' + o + '"]  .sleek-atc').html($('.general_offer_button_text').val());
                    offer[0]['atc'] = $('.general_offer_button_text').val();
                }
            });
        }
    });
    $('.offer_closable').change(function() {
        if (this.checked) {
            $('.reject_offer').show();
            offer[0]['close'] = 'y';
        } else {
            $('.reject_offer').hide();
            offer[0]['close'] = 'n';
        }
    });
    $('.offer_to_checkout').change(function() {
        if (this.checked) {
            offer[0]['to_checkout'] = 'y';
        } else {
            offer[0]['to_checkout'] = 'n';
        }
    });
    $('.offer_apply_discount').change(function() {
        if (this.checked) {
            offer[0]['discount'] = 'y';
        } else {
            offer[0]['discount'] = 'n';
        }
    });
    $('.offer_discount_code').on('input', function() {
        offer[0]['code'] = $(this).val();
    });
    $('.offer_status').change(function() {
        if (this.checked) {
            offer[0]['status'] = '1';
        } else {
            offer[0]['status'] = '0';
        }
    });
    $('.offer_text').on('keyup change', function() {
        $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-text').html($(this).val());
        products[$('.toplect').val()]['text'] = $(this).val();
    });
    $('.offer_button_text').on('keyup change', function() {
        $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-atc').html($(this).val());
        products[$('.toplect').val()]['atc'] = $(this).val();
    });
    $('.offer_product_image').change(function() {
        if (this.checked) {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-image').show();
            products[$('.toplect').val()]['show_image'] = 'y';
        } else {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-image').hide();
            products[$('.toplect').val()]['show_image'] = 'n';
        }
    });
    $('.offer_product_title').change(function() {
        if (this.checked) {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-title').show();
            products[$('.toplect').val()]['show_title'] = 'y';
        } else {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-title').hide();
            products[$('.toplect').val()]['show_title'] = 'n';
        }
    });
    $('.offer_product_price').change(function() {
        if (this.checked) {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-prices').show();
            products[$('.toplect').val()]['show_price'] = 'y';
        } else {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-prices').hide();
            products[$('.toplect').val()]['show_price'] = 'n';
        }
    });
    $('.offer_compare_at_price').change(function() {
        if (this.checked) {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-compare-price').show();
            products[$('.toplect').val()]['c_price'] = 'y';
        } else {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .sleek-compare-price').hide();
            products[$('.toplect').val()]['c_price'] = 'n';
        }
    });
    $('.offer_quantity_chooser').change(function() {
        if (this.checked) {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .q-select').show();
            products[$('.toplect').val()]['q_select'] = 'y';
        } else {
            $('form[data-product-index="' + $('.toplect').val() + '"]  .q-select').hide();
            products[$('.toplect').val()]['q_select'] = 'n';
        }
    });
    $('.offer_ab_test').change(function() {
        if (this.checked) {
            products[$('.toplect').val()]['ab_test'] = 'y';
        } else {
            products[$('.toplect').val()]['ab_test'] = 'n';
        }
    });
    $('.offer_linked').change(function() {
        if (this.checked) {
            products[$('.toplect').val()]['linked'] = 'y';
        } else {
            products[$('.toplect').val()]['linked'] = 'n';
        }
    });
    $('.offer_ab_text').on('keyup change', function() {
        products[$('.toplect').val()]['ab_text'] = $(this).val();
    });
    $('.offer_ab_button').on('keyup change', function() {
        products[$('.toplect').val()]['ab_atc'] = $(this).val();
    });
    $('.offer_title').on('keyup change', function() {
        offer[0]['title'] = $(this).val();
    });

    function showAjaxModal(action) {
        jQuery('#productsModal').modal('show', {
            backdrop: 'static'
        });
        if (action == "products" || action === "products") {
            jQuery('#products-wrappers').show();
            jQuery('#conditions-wrappers').hide();
            $('.modal-title').html('Add products to offer');
            jQuery('#products').html('<div style="display: table; width: 100%; text-align: center;"><img src="' + base_url +
                'assets/images/loader.gif" style="width: 200px; height: auto;" /></div>');
            loadProducts(' ');
        }
        if (action == "conditions" || action === "conditions") {
            jQuery('#products-wrappers').hide();
            jQuery('#conditions-wrappers').show();
            $('.modal-title').html('Add conditions to your offer');
            $('#conditionSelector').trigger('change');
            $('#oc1Type').trigger('change');
            $('#oc1Quantity').trigger('change');
            $('.saveCondition').html('Add condition');
            $('.saveCondition').show();
        }
    }

    function loadProducts(product) {
        $.ajax({
            type: "POST",
            url: base_url + 'search_products',
            data: {
                term: product,
                shop: '<?php echo $shop; ?>',
                token: '<?php echo $token; ?>'
            },
            dataType: "html",
            success: function(response) {
                $('#products').html(response);
            }
        });
    }

    $('#search').keyup(function() {

        var search = $(this).val();

        loadProducts(search);

        return false;
    });

    $('#ocContent').keyup(function(event) {

        //alert(event.keyCode);
        var item = $(this).val();
        var call_url = base_url + 'search_condition';
        var type = $('#oc1Type').val();

        $.ajax({
            type: "POST",
            url: call_url,
            data: {
                type: type,
                item: item,
                shop: '<?php echo $shop; ?>',
                token: '<?php echo $token; ?>'
            },
            dataType: "html",
            success: function(response) {
                $('.c_i').html(response);
            }
        });
    });

    function hideAll() {
        $('.card').addClass('hidden');
        $('.half-block').addClass('hidden');
        $('.block').addClass('hidden');
        $('.flat').addClass('hidden');
        $('.compact').addClass('hidden');
    }

    function pick(offerLayout) {
        hideAll();
        $('.' + offerLayout).removeClass('hidden');
        $('.offer_layout').val(offerLayout);
        offer[0]['layout'] = offerLayout;
    }

    function activateOffer() {
        offer[0]['status'] = '1';
        $('.switcheck').prop('checked', true);
        $('.offerDraftBtn').css({
            'font-size': '12px;',
            'font-weight': 'normal'
        });
        $('.offerActiveBtn').css({
            'font-size': '20px;',
            'font-weight': 'bold'
        });
    }

    function deactivateOffer() {
        offer[0]['status'] = '0';
        $('.switcheck').prop('checked', false);
        $('.offerDraftBtn').css({
            'font-size': '20px;',
            'font-weight': 'bold'
        });
        $('.offerActiveBtn').css({
            'font-size': '12px;',
            'font-weight': 'normal'
        });
    }

    function createCORSRequest(method, url) {
        var xhr = new XMLHttpRequest();
        if ("withCredentials" in xhr) {
            xhr.open(method, url, true);
        } else if (typeof XDomainRequest != "undefined") {
            xhr = new XDomainRequest();
            xhr.open(method, url);
        } else {
            xhr = null;
        }
        return xhr;
    }

    function addAll(p) {
        if (products.findIndex(x => x.product == p) == -1) {

            products.push({
                "product_id": "",
                "product": p,
                "offer": "",
                "text": "",
                "atc": "",
                "show_title": "y",
                "show_price": "y",
                "show_image": "y",
                "v_price": "y",
                "c_price": "y",
                "linked": "n",
                "q_select": "y",
                "ab_test": "n",
                "ab_text": "",
                "ab_atc": ""
            });
        }

        loadUIs();

        var vs = createCORSRequest("GET", "<?php echo base_url(); ?>variants/" + p +
            "/<?php echo $token; ?>/<?php echo $shop; ?>");
        var product_data = {
            "product_id": p
        };

        if (vs) {
            vs.onload = function() {
                var var_ids = JSON.parse(vs.responseText);
                // console.log(var_ids);
                $(var_ids['variants']).each(function(r, t) {
                    if (variants.findIndex(x => x.vid == t['id']) == -1) {
                        variants.push({
                            "id": "",
                            "oid": "",
                            "pid": p,
                            "vid": t['id']
                        });
                    }
                });

                console.log(products);
                console.log(variants);

                loadProductData();
            };
            vs.send();
        }
        jQuery('#productsModal').modal('toggle');

    }

    function addVariant(product, variant) {
        if (products.findIndex(x => x.product == product) == -1) {

            products.push({
                "product_id": "",
                "product": product,
                "offer": "",
                "text": "",
                "atc": "",
                "show_title": "y",
                "show_price": "y",
                "show_image": "y",
                "v_price": "y",
                "c_price": "y",
                "linked": "n",
                "q_select": "y",
                "ab_test": "n",
                "ab_text": "",
                "ab_atc": ""
            });
        }
        loadUIs();

        v = parseInt(variant);
        // if (variants.findIndex(x => x.vid == v) == -1) {
        if (variants.filter(function(e) {
                return e.vid === v;
            }).length == 0) {



            variants.push({
                "id": "",
                "oid": "",
                "pid": product,
                "vid": v
            });

            loadProductData();
        }

        console.log(products);
        console.log(variants);
        jQuery('#productsModal').modal('toggle');
    }

    function loadProductData() {
        $('.products_handler').html('');
        $('.toplect').html('<option value="global" style="height: 20px;">Global</option>');

        $(products).each(function(i, e) {
            // console.log(products);
            var product_id = products[i]['product'];
            // console.log(product_id);
            var product_data = createCORSRequest("GET", "<?php echo base_url(); ?>product_details/" + product_id +
                "/<?php echo $token; ?>/<?php echo $shop; ?>");
            if (product_data) {
                product_data.onload = function() {
                    var data = JSON.parse(product_data.responseText);
                    var datacell = data['product'];
                    // console.log(datacell);
                    var vcount = 0;
                    for (var vci = 0; vci < variants.length; ++vci) {
                        if (variants[vci]['pid'] == product_id)
                            vcount++;
                    }
                    var productDiv = '<div style="display: table;">' +
                        '<div style="display: inline-table; width: 30%;">' +
                        '<img src="' + datacell['image']['src'] + '"' +
                        'style="width: 100%; height: auto;" />' +
                        '</div>' +
                        '<div style="display: inline-table; width: 68%; vertical-align: top;">' +
                        '<div style="display: table; width: 100%; text-align: right;">' +
                        '<span class="btn btn-info btn-xs pull-right" onclick="removeOfferable(' + i + ',' + datacell['id'] + ')"> x </i></span>' +
                        '</div>' +
                        '<div style="display: table; width: 100%; margin-left: 5px;">' +
                        '<p>' +
                        datacell['title'] +
                        '<br /><small><em>' + vcount + ' variants</em></small>' +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    $('.products_handler').append(productDiv);
                    $('.toplect').append('<option value="' + i + '" style="height: 20px;">' + datacell['title'] + '</option>');
                };
                product_data.send();
            }
        });
    }

    function loadUIs() {
        $('.card').html('<div class="reject_offer" style="display: none; position: relative; width: 100%; text-align: right;"><span style="font-size: 15px; cursor: pointer;">x</span></div>');
        $('.block').html('<div class="reject_offer" style="display: none; position: relative; width: 100%; text-align: right;"><span style="font-size: 15px; cursor: pointer;">x</span></div>');
        $('.half-block').html('<div class="reject_offer" style="display: none; position: relative; width: 100%; text-align: right;"><span style="font-size: 15px; cursor: pointer;">x</span></div>');
        $('.flat').html('<div class="reject_offer" style="display: none; position: relative; width: 100%; text-align: right;"><span style="font-size: 15px; cursor: pointer;">x</span></div>');
        $('.compact').html('<div class="reject_offer" style="display: none; position: relative; width: 100%; text-align: right;"><span style="font-size: 15px; cursor: pointer;">x</span></div>');

        $(products).each(function(i, e) {
            var product_id = products[i]['product'];
            var product_data = createCORSRequest("GET", "<?php echo base_url(); ?>product_details/" + product_id +
                "/<?php echo $token; ?>/<?php echo $shop; ?>");
            if (product_data) {
                product_data.onload = function() {
                    var data = JSON.parse(product_data.responseText);
                    var s_data = data['shop'];
                    var datacell = data['product'];
                    // console.log(data);

                    let card_ui = '<form class="sleek-form" data-product-index="' + i + '"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">Need Free Shipping?</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + product_id + '"></div> <select class="v-select v-' + product_id + '"></select> <select class="q-select q-' + product_id + '"></select> </div></div><div class="sleek-card-atc"> <div class="sleek-prices"> <span class="sleek-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> </div><button class="sleek-atc" type="submit" onclick="return false;">' + $('.offer_button_text').val() + '</button> </div></form>';
                    let block_ui = '<form class="sleek-form" data-product-index="' + i + '"> <div class="sleek-text">Need Free Shipping?</div><div class="sleek-block"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + product_id + '"></div> <select class="v-select v-' + product_id + '"></select> <select class="q-select q-' + product_id + '"></select> </div></div></div><button class="sleek-atc" type="submit" onclick="return false;">' + $('.offer_button_text').val() + '</button> </form>';
                    let half_block_ui = '<form class="sleek-form" data-product-index="' + i + '"> <div class="sleek-half-block"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">Need Free Shipping?</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + product_id + '"></div> <select class="v-select v-' + product_id + '"></select> <select class="q-select q-' + product_id + '"></select> </div></div></div><button class="sleek-atc" type="submit" onclick="return false;">' + $('.offer_button_text').val() + '</button> </form>';
                    let flat_ui = '<form class="sleek-form" data-product-index="' + i + '"> <div class="sleek-text">Need Free Shipping?</div><div class="sleek-flat"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + product_id + '"></div> <select class="v-select v-' + product_id + '"></select> <div class="flex-select"> <select class="q-select q-' + product_id + '"></select> <button class="sleek-atc" type="submit" onclick="return false;">' + $('.offer_button_text').val() + '</button> </div></div></div></div></form>';
                    let compact_ui = '<form class="sleek-form" data-product-index="' + i + '"> <div class="sleek-compact"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">Need Free Shipping?</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + s_data['currency'] + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + product_id + '"></div> <select class="v-select v-' + product_id + '"></select> <select class="q-select q-' + product_id + '"></select> </div><button class="sleek-atc" type="submit" onclick="return false;">' + $('.offer_button_text').val() + '</button> </div></div></form>';
                    $('.card').append(card_ui);
                    $('.block').append(block_ui);
                    $('.half-block').append(half_block_ui);
                    $('.flat').append(flat_ui);
                    $('.compact').append(compact_ui);

                    $(datacell['variants']).each(function(i) {
                        // console.log(datacell['variants'][i]['title']);
                        $('.v-' + product_id).append('<option value="' + datacell['variants'][i]['id'] +
                            '">' +
                            datacell['variants'][i]['title'] + ' (' + s_data['currency'] + ' ' +
                            datacell['variants'][i]['price'] + ')</option>');
                    });
                    for (let q = 1; q <= 10; q++) {
                        $('.q-' + product_id).append('<option value="' + q + '">' +
                            q + '</option>')
                    }
                    if (settings != null) {
                        $('.sleek-upsell').css('background', settings['layout_bg']);
                        $('.sleek-upsell select').css('background', settings['layout_bg']);
                        $('.sleek-upsell').css('color', settings['layout_color']);
                        $('.sleek-upsell select').css('color', settings['layout_color']);
                        $('.sleek-upsell').css('font-family', settings['layout_font']);
                        $('.sleek-upsell').css('font-size', settings['layout_size']);
                        $('.sleek-upsell').css('margin-top', settings['layout_mt']);
                        $('.sleek-upsell').css('margin-bottom', settings['layout_mb']);
                        $('.sleek-upsell').css('border-radius', settings['offer_radius']);
                        $('.sleek-upsell').css('border-width', settings['offer_bs']);
                        $('.sleek-upsell').css('border-color', settings['offer_bc']);
                        $('.sleek-upsell').css('border-style', settings['offer_border']);
                        $('.sleek-upsell button').css('background', settings['button_bg']);
                        $('.sleek-upsell button').css('color', settings['button_color']);
                        $('.sleek-upsell button').css('font-family', settings['button_font']);
                        $('.sleek-upsell button').css('font-size', settings['button_size']);
                        $('.sleek-upsell button').css('margin-top', settings['button_mt']);
                        $('.sleek-upsell button').css('margin-bottom', settings['button_mb']);
                        $('.sleek-upsell button').css('border-radius', settings['button_radius']);
                        $('.sleek-upsell button').css('border-width', settings['button_bs']);
                        $('.sleek-upsell button').css('border-color', settings['button_bc']);
                        $('.sleek-upsell button').css('border-style', settings['button_border']);
                        $('.sleek-upsell img').css('border-radius', settings['image_radius']);
                        $('.sleek-upsell img').css('border-width', settings['image_bs']);
                        $('.sleek-upsell img').css('color', settings['image_bc']);
                        $('.sleek-upsell img').css('border-style', settings['image_border']);
                        $('.sleek-text').css('color', settings['text_color']);
                        $('.sleek-text').css('font-family', settings['text_font']);
                        $('.sleek-text').css('font-size', settings['text_size']);
                        $('.sleek-title').css('color', settings['title_color']);
                        $('.sleek-title').css('font-family', settings['title_font']);
                        $('.sleek-title').css('font-size', settings['title_size']);
                        $('.sleek-price').css('color', settings['price_color']);
                        $('.sleek-price').css('font-family', settings['price_font']);
                        $('.sleek-price').css('font-size', settings['price_size']);
                    }
                    console.log('Adjusting product ' + i);
                    console.log(products[i]);

                    if (products[i]['show_title'] == 'n') {
                        $('.sleek-title').remove();
                    }

                    if (products[i]['show_price'] == 'n') {
                        $('.sleek-prices').remove();
                    }

                    if (products[i]['show_image'] == 'n') {
                        $('.sleek-image').remove();
                    }

                    if (products[i]['v_price'] == 'n') {
                        $('.sleek-compare-price').remove();
                    }

                    if (products[i]['c_price'] == 'n') {
                        $('.sleek-price').remove();
                    }

                    if (products[i]['q_select'] == 'n') {
                        $('.q_select').css('display', 'none');
                    }
                };
                product_data.send();
            }
        });

        populateFields();
    }

    function removeOfferable(index, product) {

        variants = variants.filter(e => e.pid != product);
        products.splice(index, 1);

        console.log(products);
        console.log(variants);

        loadUIs();
        loadProductData();
    }

    $('#conditionSelector').change(function() {
        var oc = $('#conditionSelector').val();
        hideOcContent();
        if (oc == 'oc1' || oc == 'oc2' || oc == 'oc3') {
            $('#oc1Quantity').show();
            $('#oc1Type').show();
            $('#ocContent').show();
        }
        if (oc == 'oc4') {
            $('#oc1Type').show();
            $('#ocContent').show();
        }
        if (oc == 'oc5' || oc == 'oc6') {
            $('#ocNumber').show();
        }
        if (oc == 'oc7' || oc === 'oc8') {
            $('#countries').show();
        }
    });

    $('#oc1Type').change(function() {
        var type = $('#oc1Type').val();

        if (type == 'product') {
            $('#ocContent').attr('placeholder', 'Search for product');
        }
        if (type == 'variant') {
            $('#ocContent').attr('placeholder', 'Search for variant');
        }
        if (type == 'collection') {
            $('#ocContent').attr('placeholder', 'Search for collection');
        }
    });

    function hideOcContent() {
        $('#oc1Quantity').hide();
        $('#oc1Type').hide();
        $('#ocContent').hide();
        $('#ocNumber').hide();
        $('#countries').hide();
    }

    $('.saveCondition').click(function() {
        var type = $('#conditionSelector').val();
        var quantity = $('#oc1Quantity').val();
        var level = $('#oc1Type').val();
        var content = $('#ocContent').val();
        var amount = $('#ocNumber').val();
        var country = $('#countries').val();
        var occ = $('.occ').val();

        let cid = "<?php echo time(); ?>_" + conditions.length;

        conditions.push({
            "cid": cid,
            "oid": "",
            "bid": $('.which_b').val(),
            "type": type,
            "quantity": quantity,
            "level": level,
            "content": content,
            "pid": occ,
            "vid": occ,
            "amount": amount,
            "country": country
        });
        console.log(conditions);
        loadConditions();
        jQuery('#productsModal').modal('toggle');
    });

    function loadConditions() {
        $('.block_c').html('');
        $(conditions).each(function(i, e) {
            var rule = ''
            var rule_text = '';
            var content_text = '';
            var cbid = e['bid'];

            var bpos = blocks.findIndex(x => x.bid == cbid);

            if (i > 0) {
                if (blocks[bpos]['rule'] == 'ALL') {
                    rule = 'AND';
                } else {
                    rule = 'OR';
                }
            }

            if (e['type'] == 'oc1') {
                if (e['level'] == 'collection') {
                    rule_text = 'Cart has at least ' + e['quantity'] + ' item from collection ';
                } else {
                    rule_text = 'Cart has at least ' + e['quantity'];
                }
                content_text = e['content'];
            }

            if (e['type'] == 'oc2') {
                if (e['level'] == 'collection') {
                    rule_text = 'Cart has at most ' + e['quantity'] + ' item from collection ';
                } else {
                    rule_text = 'Cart has at most ' + e['quantity'];
                }
                content_text = e['content'];
            }

            if (e['type'] == 'oc3') {
                if (e['level'] == 'collection') {
                    rule_text = 'Cart has exactly ' + e['quantity'] + ' item from collection ';
                } else {
                    rule_text = 'Cart has exactly ' + e['quantity'];
                }
                content_text = e['content'];
            }

            if (e['type'] == 'oc4') {
                if (e['level'] == 'collection') {
                    rule_text = 'Cart does not have any item from collection ';
                } else {
                    rule_text = 'Cart does not have any ';
                }
                content_text = e['content'];
            }

            if (e['type'] == 'oc5') {
                rule_text = 'Cart total is at least '
                content_text = e['amount'] + ' cents';
            }

            if (e['type'] == 'oc6') {
                rule_text = 'Cart total is at most '
                content_text = e['amount'] + ' cents';
            }

            if (e['type'] == 'oc7') {
                rule_text = 'Customer is located in '
                content_text = e['country'];
            }

            if (e['type'] == 'oc8') {
                rule_text = 'Customer is not located in '
                content_text = e['country'];
            }

            var condition =
                '<div style="display: table; width: 100%; width: 100%; background: #ffffff; padding: 5px; margin-bottom: 5px;">' +
                '<div style="vertical-align: middle; display: inline-table; width: 80%; background: #ffffff;">' +
                '<p><strong>' + rule + '</strong> ' + rule_text + '<br />' +
                '<small><em>' + content_text + '</small>' +
                '</p>' +
                '</div>' +
                '<div style="vertical-align: middle; display: inline-table; width: 20%; text-align: right;">' +
                '<span class="btn btn-info btn-xs pull-right" onclick="removeConditions(' + i + ');">x</span>' +
                '</div>' +
                '</div>';
            $('.block' + e['bid']).append(condition);
        });
    }

    function removeConditions(i) {
        conditions.splice(i, 1);
        loadConditions();
    }

    $('.field_type').change(function() {
        if ($(this).val() == 'select' || $(this).val() == 'checkbox_group' || $(this).val() == 'radio') {
            $('.choices').css('display', 'table');
            $('.field_price').hide();
        } else {
            $('.choices').css('display', 'none');
            $('.field_price').show();
        }

        // 'c_1':{'choice':'','price':''}
    });

    $('.fields_form').submit(function(e) {
        e.preventDefault();
        if ($('.field_type').val() == "") {
            alert("You need to choose an option style first");
            return;
        }
        var fid = "<?php echo time(); ?>_" + fields.length;
        var type = $('.field_type').val();
        var name = $('.field_name').val();
        var placeholder = $('.field_placeholder').val();
        var price = $('.field_price').val();
        var required = '';

        if ($('.field_required').is(':checked')) {
            required = 'true';
        }

        if (type == 'select' || type == 'checkbox_group' || type == 'radio') {
            $('.choices').find('div').each(function(i) {
                var mc = {};
                mc['oid'] = '';
                mc['pid'] = products[$('.toplect').val()]['product'];
                mc['fid'] = fid;

                $(this).find('input[type="text"]').each(function() {
                    mc['value'] = $(this).val();
                });
                $(this).find('input[type="number"]').each(function() {
                    mc['price'] = $(this).val();
                });

                choices.push(mc);

            });

            var product_id = $('.product_id').val();
            console.log(choices);
        }

        fields.push({
            "fid": fid,
            "oid": "",
            "pid": products[$('.toplect').val()]['product'],
            "type": type,
            "name": name,
            "placeholder": placeholder,
            "price": price,
            "required": required
        });

        console.log(fields);

        loadFields();
        populateFields();

        clear_selections();
    });

    function clear_selections() {
        $('.field_type').prop('selectedIndex', 0);
        $('.field_name').val('');
        $('.field_placeholder').val('');
        $('.field_price').val('');
        $('.field_required').val('');
        $('.choices').find('div').each(function() {
            $(this).find('input[type="text"]').each(function() {
                $(this).val('');
            });
            $(this).find('input[type="number"]').each(function() {
                $(this).val('0');
            });
        });
        $('.choices').css('display', 'none');
        $('.field_price').show();
    }

    function loadFields() {
        $('.fields_holder').html('');

        $(fields).each(function(i, e) {
            var fid = fields[i]['fid'];
            var type = fields[i]['type'];
            var name = fields[i]['name'];
            var placeholder = fields[i]['placeholder'];
            var price = fields[i]['price'];
            var required = fields[i]['required'];
            var el_type = '';
            var m_c = choices.filter(e => e.fid == fid);

            if (type == "select") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<select class="form-control select sleek_fields_' + fid + '" id="properties[' + name +
                    ']" name="' + name + '"></select>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                $('.sleek_fields_' + name + '')
                    .append($("<option></option>")
                        .attr("value", "")
                        .text(placeholder));

                // var value_arr = value.split(',');
                $(m_c).each(function(key) {
                    var c_v = m_c[key]['value'];
                    var c_p = m_c[key]['price'];
                    $('.sleek_fields_' + fid + '')
                        .append($("<option></option>")
                            .attr("value", c_v)
                            .text(c_v + ' (' + c_p + ')'));
                });
            }
            if (type == "number") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="number" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "text") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="text" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "textarea") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<textarea class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '">' + placeholder + '</textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "file") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="file" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "checkbox") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' +
                    '<input type="checkbox" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" /> ' +
                    placeholder +
                    '</label>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "checkbox_group") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="text" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "radio") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' +
                    '<input type="radio" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" /> ' +
                    placeholder +
                    '</label>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "date") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="date" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
            if (type == "swatch") {
                $('.fields_holder').append(
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading"' +
                    '<h4 class="panel-title">' +
                    '<a style="color: #333333; text-transform: uppercase;" data-toggle="collapse" data-parent="#accordion-options" href="#collapse' +
                    i + '" aria-expanded="false" class="collapsed btn">' +
                    name +
                    '</a>' +
                    '<span class="btn entypo-up pull-right" onclick="push_up(' + i + ');"></span>' +
                    '<span class="btn entypo-down pull-right" onclick="push_down(' + i + ');"></span>' +
                    '<span class="btn entypo-pencil pull-right" onclick="edit_option(' + i + ');"></span>' +
                    '<span class="btn entypo-docs pull-right" onclick="duplicate_option(' + i + ');"></span>' +
                    '<span class="btn entypo-cancel pull-right" onclick="remove_option(' + i + ');"></span>' +
                    '</h4>' +
                    '</div>' +
                    '<div id="collapse' + i + '" class="panel-collapse collapse" aria-expanded="false">' +
                    '<div class="panel-body">' +
                    '<label>' + placeholder + '</label>' +
                    '<input type="color" class="form-control" id="properties[' + name + ']" name="' + name +
                    '" placeholder="' + placeholder + '" />' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
        });
    }

    function push_up(key) {
        if (key > 0) {
            fields.move(key, key - 1);
            loadFields();
            populateFields();
        }
    }

    function push_down(key) {
        if (key < fields.length) {
            fields.move(key, key + 1);
            loadFields();
            populateFields();
        }
    }

    function edit_option(key) {
        $('.panel-collapse').attr('class', 'panel-collapse collapse');
        $('.panel-collapse').attr('aria-expanded', 'false');
        $('#collapse' + key).attr('class', 'panel-collapse collapse in');
        $('#collapse' + key).attr('aria-expanded', 'true');
    }

    function duplicate_option(key) {

        let new_fid = "<?php echo time(); ?>_" + fields.length;
        let old_fid = fields[key]['fid'];

        var fid = new_fid;
        var oid = fields[key]['oid'];
        var pid = fields[key]['pid'];
        var type = fields[key]['type'];
        var name = fields[key]['name'];
        var placeholder = fields[key]['placeholder'];
        var price = fields[key]['price'];
        var required = fields[key]['required'];

        if (type == 'select' || type == 'checkbox_group' || type == 'radio') {
            let new_choice = choices.filter(r => r.fid == old_fid);
            console.log("new choices");
            console.log(choices);

            $(new_choice).each(function(i, e) {
                var mc = {};
                mc['oid'] = e['oid'];
                mc['pid'] = e['pid'];
                mc['fid'] = new_fid;
                mc['value'] = e['value'];
                mc['price'] = e['price'];
                choices.push(mc);
            });
        }

        fields.push({
            'fid': fid,
            'oid': oid,
            'pid': pid,
            'type': type,
            'name': name,
            'placeholder': placeholder,
            'price': price,
            'required': required
        });

        console.log(fields);
        console.log(choices);

        loadFields();
        populateFields();
    }

    function remove_option(key) {
        var result = confirm('Are you sure you want to delete ' + fields[key]['name'] + '?');
        if (result) {
            fid = fields[key]['fid'];
            choices = choices.filter(e => e.fid != fid);
            fields.splice(key, 1);
            loadFields();
            populateFields();
        }
    }

    Array.prototype.move = function(from, to) {
        this.splice(to, 0, this.splice(from, 1)[0]);
    };

    $('.saveOffer').click(function() {
        console.log(base_url + 'update_offers/' + updating_offer + '?<?php echo $_SERVER['QUERY_STRING']; ?>');
        $.ajax({
            type: "POST",
            url: base_url + 'update_offers/' + updating_offer + '?<?php echo $_SERVER['QUERY_STRING']; ?>',
            data: {
                offer,
                products,
                variants,
                blocks,
                conditions,
                fields,
                choices
            },
            success: function(response) {
                alert('Succesfully updated offer ' + response);
                // console.log(response);
                window.location.reload(false);
                //$('.data').html(response);
            },
            error: function(response) {
                alert('An error occured');
                console.log(response);
                console.log(response.responseText);
            }
        });

    });

    function populateFields() {
        if (fields.length > 0) {
            $(products).each(function(i, e) {
                var pid = products[i]['product'];
                let o_fields = fields.filter(e => e.pid == pid);
                console.log(o_fields);
                if (o_fields.length > 0) {
                    $('.o_h_' + pid).html('');
                    $(o_fields).each(function(i, e) {
                        var fid = o_fields[i]['fid'];
                        var type = o_fields[i]['type'];
                        var name = o_fields[i]['name'];
                        var placeholder = o_fields[i]['placeholder'];
                        var price = o_fields[i]['price'];
                        var required = o_fields[i]['required'];
                        var el_type = '';
                        var m_c = choices.filter(e => e.fid == fid);

                        if (type == "select") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<select class="form-control select sleek_fields_' + fid + '" id="properties[' + name +
                                ']" name="properties[' + name + ']"></select>' +
                                '</div>');
                            $('.sleek_fields_' + name + '')
                                .append($("<option></option>")
                                    .attr("value", "")
                                    .text(placeholder));

                            // var value_arr = value.split(',');
                            $(m_c).each(function(key) {
                                var c_v = m_c[key]['value'];
                                var c_p = m_c[key]['price'];
                                $('.sleek_fields_' + fid + '')
                                    .append($("<option></option>")
                                        .attr("value", c_v)
                                        .text(c_v + ' (' + c_p + ')'));
                            });
                        }
                        if (type == "number") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="number" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                        if (type == "text") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="text" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                        if (type == "textarea") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<textarea class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '">' + placeholder + '</textarea>' +
                                '</div>');
                        }
                        if (type == "file") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="file" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                        if (type == "checkbox") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' +
                                '<input type="checkbox" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" /> ' +
                                placeholder +
                                '</label>' +
                                '</div>');
                        }
                        if (type == "checkbox_group") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="text" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                        if (type == "radio") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' +
                                '<input type="radio" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" /> ' +
                                placeholder +
                                '</label>' +
                                '</div>');
                        }
                        if (type == "date") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="date" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                        if (type == "swatch") {
                            $('.o_h_' + pid).append(
                                '<div>' +
                                '<label>' + placeholder + '</label>' +
                                '<input type="color" class="form-control" id="properties[' + name + ']" name="properties[' + name +
                                ']" placeholder="' + placeholder + '" />' +
                                '</div>');
                        }
                    });
                }
            });
        }

    }
</script>