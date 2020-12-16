/*! jQuery v3.5.1 | (c) JS Foundation and other contributors | jquery.org/license */

if (!window.jQuery) {
    var script = document.createElement('script');
    script.type = "text/javascript";
    script.src = "https://code.jquery.com/jquery-3.5.1.min.js";
    script.integrity = "sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    script.crossOrigin = "anonymous"
    document.getElementsByTagName('head')[0].insertAdjacentElement('afterbegin', script);
}

function get_this(request) {
    if (request) {
        request.onload = function () {
            return request.responseText;
        };
        request.send();
    }
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

function g_d(g_url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", g_url, false); // false for synchronous request
    xmlHttp.send(null);
    return JSON.parse(xmlHttp.responseText);
}

function g_s_s_w(g_url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", g_url, false); // false for synchronous request
    xmlHttp.send(null);
    return xmlHttp.responseText;
}

function user_browser() {
    if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
        return 'Opera';
    }
    else if (navigator.userAgent.indexOf("Chrome") != -1) {
        return 'Chrome';
    }
    else if (navigator.userAgent.indexOf("Safari") != -1) {
        return 'Safari';
    }
    else if (navigator.userAgent.indexOf("Firefox") != -1) {
        return 'Firefox';
    }
    else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) {
        return 'IE';
    }
    else {
        return 'unknown';
    }
}

const device = () => {
    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        return "tablet";
    }
    if (
        /Mobile|iP(hone|od|ad)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(
            ua
        )
    ) {
        return "mobile";
    }
    return "desktop";
};

let page = window.location.pathname;
let page_ss = window.location.href;
let s_s_w = g_s_s_w('https://sleek-upsell.herokuapp.com/s_s_w/' + Shopify.shop);

jQuery(document).ready(function () {

    function createSUW() {
        $('body').prepend('<style>.suw{display: table; width: 300px; height: 500px; background: #ffffff; position: fixed; bottom: 0px; left: 0px; z-index: 3000000;}.suw_head, .suw_footer{display: table; width: 100%; height: 50px !important; background: #981B1B !important; color: #ffffff;}.suw_body{overflow-Y: auto; display: table; width: 100%; height: 400px;}.suw_head:before{content: "SETUP WIZARD"; display: table; position: absolute; top: 10px; left: 10px; z-index: 2000000; color: #FFFFFF; font-size: 12px;}.suw_head{cursor:move; cursor:-webkit-grab; cursor:-moz-grab; cursor:grab;}</style>');
        $('body').append('<div class="draggable suw">' +
            '<div class="suw_head dragger"></div>' +
            '<div class="suw_body"><select><option>2</option><option>2</option><option>2</option><option>2</option></select></div>' +
            '<div class="suw_footer"></div>' +
            '</div>');
        $('.suw_body').load('https://sleek-upsell.herokuapp.com/suw/' + Shopify.shop);

        var x, y, target = null;

        document.addEventListener('mousedown', function (e) {
            var clickedDragger = false;
            for (var i = 0; e.path[i] !== document.body; i++) {
                if (e.path[i].classList.contains('dragger')) {
                    clickedDragger = true;
                }
                else if (clickedDragger && e.path[i].classList.contains('draggable')) {
                    target = e.path[i];
                    target.classList.add('dragging');
                    x = e.clientX - target.style.left.slice(0, -2);
                    y = e.clientY - target.style.top.slice(0, -2);
                    return;
                }
            }
        });

        document.addEventListener('mouseup', function () {
            if (target !== null) target.classList.remove('dragging');
            target = null;
        });

        document.addEventListener('mousemove', function (e) {
            if (target === null) return;
            target.style.left = e.clientX - x + 'px';
            target.style.top = e.clientY - y + 'px';
            var pRect = target.parentElement.getBoundingClientRect();
            var tgtRect = target.getBoundingClientRect();

            if (tgtRect.left < pRect.left) target.style.left = 0;
            if (tgtRect.top < pRect.top) target.style.top = 0;
            if (tgtRect.right > pRect.right) target.style.left = pRect.width - tgtRect.width + 'px';
            if (tgtRect.bottom > pRect.bottom) target.style.top = pRect.height - tgtRect.height + 'px';
        });

    }

    if (sessionStorage.getItem('s_u_w') == 'y') { createSUW(); }
    else {
        // console.log(sessionStorage.getItem('s_u_w'));
        if (page_ss.includes(s_s_w)) {
            sessionStorage.setItem('s_u_w', 'y');
            createSUW();
        }
        // else {
        //     // console.log(page_ss);
        //     // console.log(s_s_w);
        // }
    }



    var offers_url = 'https://sleek-upsell.herokuapp.com/offers/' + Shopify.shop;

    let offers = g_d(offers_url);
    let cart = g_d("https://" + Shopify.shop + "/cart.js");

    // console.log(offers);
    // console.log(offers['offer']);
    // console.log(Object.keys(offers['offer']));
    // console.log(Object.keys(offers));
    // console.log(cart);
    // console.log(Object.keys(cart));

    let settings = offers['settings'];
    let drawer_selector = 'form[action="/cart"]';
    let drawer_position = 'before';
    let cart_selector = 'form[action="/cart"]';
    let cart_position = 'before';

    if (settings != null) {
        drawer_selector = settings.drawer_location;
        cart_selector = settings.cart_location;
        cart_position = settings.cart_position;
        drawer_position = settings.drawer_position;
    }

    const open = window.XMLHttpRequest.prototype.open;

    function openReplacement() {
        this.addEventListener("load", function () {
            if (
                [
                    "/cart/add.js",
                    "/cart/update.js",
                    "/cart/change.js",
                    "/cart/clear.js",
                ].includes(this._url)
            ) {
                cart = g_d("https://" + Shopify.shop + "/cart.js");
                // console.log('Cart has changed: New item count - ' + cart["item_count"]);
                // console.log(this.response);
                next_offer();
            }
        });
        return open.apply(this, arguments);
    }

    window.XMLHttpRequest.prototype.open = openReplacement;

    next_offer();
    // collection_based();

    function next_offer() {
        if (cart["item_count"] > 0) {
            let i = 0;
            let o_p = Object.keys(offers['offer']);
            let o_arr = offers['offer'];
            // console.log(o_p);
            for (i = 0; i <= o_p.length - 1; i++) {
                let pos = o_p[i];
                let v = o_arr[pos];
                if (check_offer(pos, v) == true) {
                    // console.log('Showing this offer now');
                    // console.log(i);
                    // console.log(pos);
                    // console.log(o_arr[pos]);
                    display_offer(pos)
                    break;
                } else {
                    // console.log('Not showing this offer');
                    // console.log(pos);
                }

                // console.log(i);
                // console.log(pos);
                // console.log(o_arr[pos]);
            }
        }
    }

    function collection_based() {
        if (page.includes('/cart')) {
            if (cart["item_count"] > 0) {
                let collects = offers['collects'];
                let items = cart['items'];
                let pid = '';
                // console.log('items');
                // console.log(items);
                // console.log('Looping through ' + items.length + ' items');
                for (let i = 0; i < items.length; i++) {
                    pid = items[i]['product_id'];
                    // console.log('Checking items ' + i + ' : ' + pid);
                    if (sessionStorage.getItem('c_upsold_' + pid) == 'y') {
                        // console.log('This has already been upsold');
                        continue;
                    } else {
                        // console.log('Creating upsell for ' + pid);
                        if (collects.findIndex(x => x.product_id == pid) != -1) {
                            sessionStorage.setItem('c_upsold_' + pid, 'y');
                            let n = collects.filter(x => x.product_id == pid);
                            let cid = n[0]['collection_id'];
                            let cb = collects.filter(x => x.collection_id == cid);

                            // console.log('Needed object');
                            // console.log(n);
                            // console.log('Collection ID ' + cid);
                            // console.log(cb);

                            // console.log('Looping through ' + cb.length + ' collection items');
                            for (let c = 0; c < cb.length; c++) {
                                // console.log('Checking collection item ' + c);
                                if (sessionStorage.getItem('c_used_' + cb[c]['product_id']) == 'z') {
                                    // console.log('This item was already an upsell ' + cb[c]['product_id']);
                                    continue;
                                } else {
                                    if (items.findIndex(x => x.product_id == cb[c]['product_id']) != -1) {
                                        sessionStorage.setItem('c_used_' + cb[c]['product_id'], 'z');
                                        continue;
                                    } else {
                                        sessionStorage.setItem('c_used_' + cb[c]['product_id'], 'z');
                                        // console.log('Using ' + cb[c]['product_id'] + ' as an upsell for ' + pid);
                                        // alert('Display '+cb[c]['product_id']);
                                        load_c_based(cb[c]['product_id']);
                                        break;
                                    }
                                }
                            }
                            break;

                        }

                        else {
                            // console.log('This product aint part of a collection');
                            continue;
                        }
                    }
                }
            }
        }
    }

    function check_offer(index, offer) {
        // console.log('Checking offer ' + index);

        let status = offer['offer'][0]['status'];
        let o_rule = offer['offer'][0]['rule'];
        let blocks = offer['blocks'];
        let bc = blocks.length;

        if (status == 1) {
            // console.log('Offer active');
            if (sessionStorage.getItem('sleek_shown_' + index) == 'y') {
                // console.log('Offer already shown');
                return false;
            } else {
                if (bc > 0) {
                    // console.log('Offer has blocks');
                    let what = false;
                    for (let i = 0; i <= blocks.length - 1; i++) {
                        let v = blocks[i];
                        if (o_rule == 'ANY') {
                            // console.log('Checking if any block is met');
                            if (check_block(i, v) == true) {
                                // console.log('Block ' + i + ' return true');
                                what = true;
                                break;
                            } else {
                                what = false;
                                break;
                            }
                        }
                        if (o_rule == 'ALL') {
                            // console.log('Checking if all blocks are met');
                            if (check_block(i, v) == false) {
                                // console.log('Block ' + i + ' return false');
                                what = false;
                                break;
                            } else {
                                what = true;
                                break;
                            }
                        }

                    }
                    return what;
                } else {
                    // console.log('Offer has no blocks');
                    return true;
                }
            }

        } else {
            // console.log('Offer not active');
            return false;
        }
    }

    function check_block(index, block) {
        let oid = block['oid'];
        let bid = block['bid'];
        let b_rule = block['rule'];

        // console.log('Checking block ' + bid + ' of offer ' + oid);
        // console.log(block);

        let oc = offers['offer'][oid]['conditions'];
        let bc = oc.filter(e => e.bid == bid);

        // console.log(oc);
        // console.log(bc);

        if (bc.length > 0) {
            // console.log('This block has conditions');
            let met = false;
            for (let i = 0; i <= bc.length - 1; i++) {
                let cond = bc[i];
                if (b_rule == 'ANY') {
                    // console.log('Checking if any condition is met');
                    if (check_condition(i, cond) == true) {
                        // console.log('condition ' + cond['cid'] + ' met');
                        met = true;
                        break;
                    } else {
                        met = false;
                        break;
                    }
                }
                if (b_rule == 'ALL') {
                    // console.log('Checking if any condition is met');
                    if (check_condition(i, cond) == false) {
                        // console.log('condition ' + cond['cid'] + ' not met');
                        met = false;
                        break;
                    } else {
                        met = true;
                        break;
                    }
                }
            }
            return met;
        } else {
            return true;
        }
    }

    function check_condition(index, condition) {
        let cid = condition["cid"];
        let oid = condition["oid"];
        let bid = condition["bid"];
        let type = condition["type"];
        let quantity = condition["quantity"];
        let level = condition["level"];
        let content = condition["content"];
        let pid = condition["pid"];
        let vid = condition["vid"];
        let amount = condition["amount"];
        let country = condition["country"];
        let citems = cart["items"];
        // console.log('citems');
        // console.log(citems);

        let met = false;

        if (type == 'oc1') {
            // Cart has at least
            if (level == 'product') {
                // console.log('Now checking if cart has at least ' + quantity + ' ' + content + ' (' + pid + ')');
                // console.log('pitems');
                let pitems = citems.filter(e => e.product_id == pid);
                // console.log(pitems)
                if (pitems.length >= quantity) {
                    // console.log('found ' + pitems.length + ' ' + content + 's (' + pid + ')');
                    met = true;
                    // console.log(met);
                } else {
                    // console.log('found only ' + pitems.length + ' ' + content + 's (' + pid + ')');
                    met = false;
                }
            }
            if (level == 'variant') {
                // console.log('Now checking if cart has at least ' + quantity + ' ' + content + ' (' + vid + ')');
                let vitems = citems.filter(e => e.variant_id == vid);
                if (vitems.length >= quantity) {
                    // console.log('found ' + vitems.length + ' ' + content + 's (' + vid + ')');
                    met = true;
                } else {
                    // console.log('found only ' + vitems.length + ' ' + content + 's (' + vid + ')');
                    met = false;
                }
            }
            if (level == 'collection') {
                // console.log('Checking if cart has at least ' + quantity + ' products from collections ' + content + '(' + pid + ')');
                let collects = offers['collects'];
                let needed = collects.filter(e => e.collection_id == pid);
                let count = 0;
                for (let i = 0; i <= citems.length - 1; i++) {
                    // console.log('citems at ' + i);
                    // console.log('Now checking ' + citems[i]['product_id']);
                    if (needed.findIndex(x => x.product_id == citems[i]['product_id']) >= 0) {
                        count = count + 1;
                        // console.log('Found ' + count + ' so far');
                        if (count >= quantity) {
                            // console.log('Breaking at ' + count);
                            met = true;
                            break;
                        } else {
                            continue;
                        }
                    }
                }

            }
        }
        if (type == 'oc2') {
            // Cart has at most
            if (level == 'product') {
                let pitems = citems.filter(e => e.product_id == pid);
                if (pitems.length <= quantity) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'variant') {
                let vitems = citems.filter(e => e.variant_id == vid);
                if (vitems.length <= quantity) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'collection') {
                // console.log('Checking if cart has at most ' + quantity + ' products from collections ' + pid);
                let collects = offers['collects'];
                let needed = collects.filter(e => e.collection_id == pid);
                let count = 0;
                for (let i = 0; i <= citems.length - 1; i++) {
                    // console.log('Now checking ' + citems[i]['product_id']);
                    if (needed.findIndex(x => x.product_id == citems[i]['product_id']) >= 0) {
                        count = count + 1;
                        // console.log('Found ' + count + ' so far');
                        if (count > quantity) {
                            // console.log('Breaking at ' + count);
                            met = false;
                            break;
                        } else {
                            met = true;
                            continue;
                        }
                    }
                }

            }
        }
        if (type == 'oc3') {
            // Cart has exactly
            if (level == 'product') {
                let pitems = citems.filter(e => e.product_id == pid);
                if (pitems.length == quantity) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'variant') {
                let vitems = citems.filter(e => e.variant_id == vid);
                if (vitems.length == quantity) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'collection') {
                // console.log('Checking if cart has at least ' + quantity + ' products from collections ' + pid);
                let collects = offers['collects'];
                let needed = collects.filter(e => e.collection_id == pid);
                let count = 0;
                for (let i = 0; i <= citems.length - 1; i++) {
                    // console.log('Now checking ' + citems[i]['product_id']);
                    if (needed.findIndex(x => x.product_id == citems[i]['product_id']) >= 0) {
                        count = count + 1;
                        // console.log('Found ' + count + ' so far');
                        if (count == quantity) {
                            // console.log('Breaking at ' + count);
                            met = true;
                            break;
                        } else {
                            continue;
                        }
                    }
                }

            }
        }
        if (type == 'oc4') {
            // Cart does not have any
            if (level == 'product') {
                let pitems = citems.filter(e => e.product_id == pid);
                if (pitems.length > 0) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'variant') {
                let vitems = citems.filter(e => e.variant_id == vid);
                if (vitems.length > 0) {
                    met = true;
                } else {
                    met = false;
                }
            }
            if (level == 'collection') {
                // console.log('Checking if cart has at least ' + quantity + ' products from collections ' + pid);
                let collects = offers['collects'];
                let needed = collects.filter(e => e.collection_id == pid);
                let count = 0;
                for (let i = 0; i <= citems.length - 1; i++) {
                    // console.log('Now checking ' + citems[i]['product_id']);
                    if (needed.findIndex(x => x.product_id == citems[i]['product_id']) >= 0) {
                        count = count + 1;
                        // console.log('Found ' + count + ' so far');
                        if (count > 0) {
                            // console.log('Breaking at ' + count);
                            met = false;
                            break;
                        } else {
                            met = true;
                            continue;
                        }
                    }
                }
            }
        }
        if (type == 'oc5') {
            // Cart total is at least
            if (cart["total_price"] >= amount) {
                met = true;
            } else {
                met = false;
            }
        }
        if (type == 'oc6') {
            // Cart total is at most
            if (cart["total_price"] <= amount) {
                met = true;
            } else {
                met = false;
            }
        }
        if (type == 'oc7') {
            // Customer is located in
        }
        if (type == 'oc8') {
            // Customer is not located in
        }


        return met;
    }

    function populateFields(oid, pid) {
        // console.log('Looking for fields');
        let fields = offers['offer'][oid]['fields'];
        let choices = offers['offer'][oid]['choices'];
        if (fields.length > 0) {
            // console.log('Found ' + fields.length + ' fields');
            // console.log(fields);
            let o_fields = fields.filter(e => e.pid == pid);
            // console.log(o_fields);
            if (o_fields.length > 0) {
                $('.o_h_' + pid).html('');
                $(o_fields).each(function (i, e) {
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
                        $(m_c).each(function (key) {
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
                            '<input type="number" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" />' +
                            '</div>');
                    }
                    if (type == "text") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' + placeholder + '</label>' +
                            '<input type="text" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" />' +
                            '</div>');
                    }
                    if (type == "textarea") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' + placeholder + '</label>' +
                            '<textarea id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '">' + placeholder + '</textarea>' +
                            '</div>');
                    }
                    if (type == "file") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' + placeholder + '</label>' +
                            '<input type="file" id="properties[' + name + ']" name="properties[' + name +
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
                            '<input type="text" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" />' +
                            '</div>');
                    }
                    if (type == "radio") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' +
                            '<input type="radio" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" /> ' +
                            placeholder +
                            '</label>' +
                            '</div>');
                    }
                    if (type == "date") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' + placeholder + '</label>' +
                            '<input type="date" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" />' +
                            '</div>');
                    }
                    if (type == "swatch") {
                        $('.o_h_' + pid).append(
                            '<div>' +
                            '<label>' + placeholder + '</label>' +
                            '<input type="color" id="properties[' + name + ']" name="properties[' + name +
                            ']" placeholder="' + placeholder + '" />' +
                            '</div>');
                    }
                });
            }
        }

    }

    function load_c_based(pid) {
        let curr = Shopify.currency['active'];
        $('<style>.sleek-upsell{opacity: 1 !important;background:#ecf0f1;color:#2b3d51;padding:5px;font-family:inherit;vertical-align:middle;margin:5px}.sleek-image img{width:100px}.sleek-text{font-weight:700}.sleek-upsell select{padding:4px;margin-top:5px}.sleek-prices{font-weight:700;margin-bottom:5px}.sleek-compare-price{text-decoration:line-through}.sleek-upsell button{padding:10px;border:none;background:#2b3d51;color:#fff;font-weight:700;border-radius:0;cursor:pointer;width:100%}.card{display:table}.card .sleek-form{display:flex}.sleek-card-atc,.sleek-image,.sleek-offer{display:table;align-self:center;padding:5px}.card .sleek-offer{flex-grow:1}.card .sleek-prices{text-align:center}@media only screen and (max-width:600px){.sleek-upsell select{max-width:100px}.sleek-prices *{display:inline-table}}.block,.block .sleek-atc,.block .sleek-form,.block .sleek-text{display:table}.sleek-block{display:flex}.block .sleek-image,.block .sleek-offer{display:table;align-self:center;padding:5px}.block .sleek-offer{flex-grow:1}</style>').insertBefore('form.cart');
        $('<div class="card sleek-upsell"></div>').insertBefore('form.cart');
        let oprods = offers['products'];
        let index = oprods.findIndex(x => x.id == pid);
        let datacell = oprods[index];

        let card_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-id="' + pid + '"> <div class="sleek-image"> <img src="' + datacell[
            'image']['src'] +
            '"/> </div><div class="sleek-offer"> <div class="sleek-text">Would you like an extra something? </div><div class="sleek-title">' +
            datacell['title'] +
            '</div><div class="sleek-selectors"> <div class="o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid +
            '"></select> <select name="quantity" class="q-select q-' + pid +
            '"></select> </div></div><div class="sleek-card-atc"> <div class="sleek-prices"> <span class="sleek-price money">' +
            curr + ' ' + datacell['variants'][0]['price'] +
            '</span> <span class="sleek-compare-price money">' +
            curr + ' ' + datacell['variants'][0]['price'] +
            '</span> </div><button class="sleek-atc" type="submit">YES PLEASE</button> </div></form>';

        $('.card').append(card_ui);
        $(datacell['variants']).each(function (i) {
            // console.log(datacell['variants'][i]['title']);
            $('.v-' + pid).append('<option value="' + datacell['variants'][i]['id'] +
                '">' +
                datacell['variants'][i]['title'] + ' (' + curr + ' ' +
                datacell['variants'][i]['price'] + ')</option>');
        });
        for (i = 1; i <= 10; i++) {
            $('.q-' + pid).append('<option value="' + i + '">' +
                i + '</option>')
        }

    }

    function brgxczvy(oid, pid, vid, quantity, price, action, type) {
        let citems = [];

        $(cart['items']).each(function (i, v) {
            citems.push(v['product_id']);
        });

        let s = {
            'stat_id': '',
            'date': Math.floor(Date.now() / 1000),
            'shop': Shopify.shop,
            'offer': oid,
            'product': pid,
            'variant': vid,
            'quantity': quantity,
            'ip': '',
            'country': '',
            'type': type,
            'action': action,
            'page': page,
            'device': device(),
            'browser': user_browser(),
            'citems': citems,
            'price': price
        }

        // console.log(s);

        var http = new XMLHttpRequest();
        var url = 'https://sleek-upsell.herokuapp.com/brgxczvy';
        var params = 'stat_id=""&date=' + Math.floor(Date.now() / 1000) + '&shop=' + Shopify.shop + '&offer=' + oid + '&product=' + pid + '&variant=' + vid + '&quantity=' + quantity + '&ip=""&country=""&type=' + type + '&action=' + action + '&page=' + page + '&device=' + device() + '&browser=' + user_browser() + '&citems=' + JSON.stringify(citems) + '&price=' + price;
        http.open('POST', url, true);

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function () {//Call a function when the state changes.
            if (http.readyState === 4) {
                if (http.status === 200) {
                    // console.log(http.responseText)
                } else {
                    // console.log("Error", http.statusText);
                }
            }
        }
        http.send(params);


    }

    function display_offer(oid) {
        let element = '';
        let curr = Shopify.currency['active'];
        let settings = offers['settings'];
        let lay = offers['offer'][oid]['offer'][0]['layout'];
        let lay_el = '<div class="card sleek-upsell"></div>';
        let nudge = 'before';

        if (page.includes('/cart')) { element = cart_selector; nudge = cart_position; }
        else { element = drawer_selector; nudge = drawer_position; }

        $('<style>.sleek-upsell{background: #ECF0F1; color: #2B3D51; padding: 5px; font-family: inherit; vertical-align: middle; margin: 5px;}.sleek-image img{width: 100px;}.sleek-text{font-weight: bold;}.sleek-upsell select{padding: 4px; margin-top: 5px;}.sleek-prices{font-weight: bold; margin-bottom: 5px;}.sleek-compare-price{text-decoration: line-through;}.sleek-upsell button{padding: 10px; border: none; background: #2B3D51; color: #FFFFFF; font-weight: bold; border-radius: 0px; cursor: pointer; width: 100%;}.card{display: table;}.card .sleek-form{display: flex;}.card .sleek-image, .card .sleek-offer, .card .sleek-card-atc{display: table; align-self: center; padding: 5px;}.card .sleek-offer{flex-grow: 4;}.card .sleek-prices{text-align: center;}.block, .block .sleek-form, .block .sleek-text, .block .sleek-atc{display: table;}.sleek-block{display: flex;}.block .sleek-image, .block .sleek-offer{display: table; align-self: center; padding: 5px;}.block .sleek-offer{flex-grow: 1;}.half-block, .half-block .sleek-form, .half-block .sleek-text, .half-block .sleek-atc{display: table;}.sleek-half-block{display: flex;}.half-block .sleek-image, .half-block .sleek-offer{display: table; align-self: center; padding: 5px;}.half-block .sleek-offer{flex-grow: 1;}.flat, .flat .sleek-form, .flat .sleek-text{display: table;}.sleek-flat{display: flex;}.flat .sleek-image, .flat .sleek-offer{display: table; align-self: center; padding: 5px;}.flat .sleek-offer{flex-grow: 1;}.flat .flex-select{display: flex; width: auto; margin-top: 10px;}.flat .v-select{display: table; width: 100%; align-items: center; justify-content: space-between;}.flat .atc{flex-grow: 4;}.flat .q-select{margin-top: 0px; margin-right: 10px;}.compact, .compact .sleek-form, .compact .sleek-text, .compact .sleek-atc{display: table;}.sleek-compact{display: flex;}.compact .sleek-image, .compact .sleek-offer{display: table; align-self: center; padding: 5px;}.compact .sleek-offer{flex-grow: 1;}.compact .sleek-atc{margin-top: 5px;}@media only screen and (max-width: 600px){.sleek-upsell{width: 97%; margin: 5px auto;}.card select{max-width: 100px;}.block select{max-width: 200px;}.sleek-prices *{display: inline-table;}.block .sleek-form, .block .sleek-text, .block .sleek-atc{width: 100%;}}</style>').insertBefore(element);

        if (lay == 'card') {
            lay_el = '<div class="card sleek-upsell"></div>';
        }
        if (lay == 'flat') {
            lay_el = '<div class="flat sleek-upsell"></div>';
        }
        if (lay == 'block') {
            lay_el = '<div class="block sleek-upsell"></div>';
        }
        if (lay == 'half-block') {
            lay_el = '<div class="half-block sleek-upsell"></div>';
        }
        if (lay == 'compact') {
            lay_el = '<div class="compact sleek-upsell"></div>';
        }

        $('.sleek-upsell').remove();

        if (nudge == 'prepend') { $(element).prepend(lay_el); }
        if (nudge == 'append') { $(element).append(lay_el); }

        if (nudge == 'before') { $(lay_el).insertBefore(element); }
        if (nudge == 'after') { $(lay_el).insertAfter(element); }


        if (drawer_position == 'before') { }

        if (offers['offer'][oid]['offer'][0]['close'] == 'y') {
            $(lay_el).append('<div style="display: table; position: relative; width: 100%; text-align: right;"><span class="reject_offer" style="font-size: 15px; cursor: pointer;">x</span></div>');
        }

        let products = offers['offer'][oid]['products'];
        let oprods = offers['products'];
        // console.log('Found products');
        // console.log(products);
        // console.log('Shop products');
        // console.log(oprods);

        $(products).each(function (i, v) {
            let pid = v['product'];
            let index = oprods.findIndex(x => x.id == pid);
            let datacell = oprods[index];

            let oatc = offers['offer'][oid]['offer'][0]['atc'];
            let vatc = v['atc'];
            let atc = 'ADD TO CART';

            let otext = offers['offer'][oid]['offer'][0]['text'];
            let vtext = v['text'];
            let dtext = 'ADD TO CART';

            if (oatc != '') {
                atc = oatc;
            } else if (vatc != '') {
                atc = vatc;
            } else {
                atc = 'ADD TO CART';
            }

            if (otext != '') {
                dtext = otext;
            } else if (vtext != '') {
                dtext = vtext;
            } else {
                dtext = 'Would you like a ' + datacell['title'];
            }

            // console.log('Product ' + pid + ' found at position ' + index);
            // console.log(datacell);

            let o_ui = '<form class="sleek-form" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">' + dtext + '</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <select name="quantity" class="q-select q-' + pid + '"></select> </div></div><div class="sleek-card-atc"> <div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><button class="sleek-atc" type="submit">' + atc + '</button> </div></form>';


            if (lay == 'card') {
                o_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">' + dtext + '</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <select name="quantity" class="q-select q-' + pid + '"></select> </div></div><div class="sleek-card-atc"> <div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><button class="sleek-atc" type="submit">' + atc + '</button> </div></form>';
            }
            if (lay == 'flat') {
                o_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-text">' + dtext + '</div><div class="sleek-flat"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <div class="flex-select"> <select name="quantity" class="q-select q-' + pid + '"></select> <button class="sleek-atc" type="submit">' + atc + '</button> </div></div></div></div></form>'
            }
            if (lay == 'block') {
                o_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-text">' + dtext + '</div><div class="sleek-block"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <select name="quantity" class="q-select q-' + pid + '"></select> </div></div></div><button class="sleek-atc" type="submit">' + atc + '</button> </form>';
            }
            if (lay == 'half-block') {
                o_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-half-block"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">' + dtext + '</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <select name="quantity" class="q-select q-' + pid + '"></select> </div></div></div><button class="sleek-atc" type="submit">' + atc + '</button> </form>';
            }
            if (lay == 'compact') {
                o_ui = '<form class="sleek-form" action="/cart/add" enctype="multipart/form-data" data-product-index="' + i + '" data-product-product_id="' + pid + '"> <div class="sleek-compact"> <div class="sleek-image"> <img src="' + datacell['image']['src'] + '"/> </div><div class="sleek-offer"> <div class="sleek-text">' + dtext + '</div><div class="sleek-title">' + datacell['title'] + '</div><div class="sleek-prices"> <span class="sleek-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> <span class="sleek-compare-price money">' + curr + ' ' + datacell['variants'][0]['price'] + '</span> </div><div class="sleek-selectors"> <div class="offer_fields_holder o_h_' + pid + '"></div> <select name="id" class="v-select v-' + pid + '"></select> <select name="quantity" class="q-select q-' + pid + '"></select> </div><button class="sleek-atc" type="submit">' + atc + '</button> </div></div></form>'
            }

            if (v['show_title'] == 'n') {
                $('.sleek-title').remove();
            }

            if (v['show_price'] == 'n') {
                $('.sleek-prices').remove();
            }

            if (v['show_image'] == 'n') {
                $('.sleek-image').remove();
            }

            if (v['v_price'] == 'n') {
                $('.sleek-compare-price').remove();
            }

            if (v['c_price'] == 'n') {
                $('.sleek-price').remove();
            }

            if (v['q_select'] == 'n') {
                $('.q_select').css('display', 'none');
            }

            $('.' + lay).append(o_ui);
            populateFields(oid, pid)
            $(datacell['variants']).each(function (i) {
                // console.log(datacell['variants'][i]['title']);
                if (datacell['variants'][vi]['inventory_quantity'] > 0) {
                    $('.v-' + pid).append('<option value="' + datacell['variants'][i]['id'] + '">' + datacell['variants'][i]['title'] + ' (' + curr + ' ' + datacell['variants'][i]['price'] + ')</option>');
                }
            });
            for (i = 1; i <= 10; i++) {
                $('.q-' + pid).append('<option value="' + i + '">' +
                    i + '</option>')
            }
            brgxczvy(oid, pid, $('.v-' + pid).val(), $('.q-' + pid).val(), datacell['variants'][0]['price'], 'show', 'show');
            $('.v-' + pid).change(function () {
                brgxczvy(oid, pid, $(this).val(), $('.q-' + pid).val(), datacell['variants'][0]['price'], 'variant change', 'impression');
            });
            $('.q-' + pid).change(function () {
                brgxczvy(oid, pid, $('.v-' + pid).val(), $(this).val(), datacell['variants'][0]['price'], 'quantity change', 'impression');
            });
            $('.sleek-form').hover(function () {
                brgxczvy(oid, pid, $('.v-' + pid).val(), $('.q-' + pid).val(), datacell['variants'][0]['price'], 'hover', 'impression');
            });
            $('.sleek-form').submit(function (e) {
                e.preventDefault();
                brgxczvy(oid, pid, $('.v-' + pid).val(), $('.q-' + pid).val(), datacell['variants'][0]['price'], 'add to cart', 'purchase');
                $.ajax({
                    type: 'POST',
                    url: '/cart/add.js',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function (response) {
                        sessionStorage.setItem('sleek_shown_' + oid, 'y');
                        if (offers['offer'][oid]['offer'][0]['discount'] == 'y' && offers['offer'][oid]['offer'][0]['code'] != '') {
                            g_s_s_w('https://' + Shopify.shop + '/discount/' + offers['offer'][oid]['offer'][0]['code']);
                        }
                        if (offers['offer'][oid]['offer'][0]['to_checkout'] == 'y') {
                            window.location.href = "/checkout";
                        } else {
                            if (page.includes('/cart')) {
                                // console.log(response);
                                sessionStorage.setItem('sleek_shown_' + oid, 'y');
                                $('.sleek-upsell').remove();
                                window.location.reload(false);
                            }
                            else {
                                $('.sleek-upsell').remove();
                                // console.log(response);
                                if (settings != null) {
                                    if (settings['refresh_state'] == 'y') {
                                        settings['drawer_refresh'];
                                    }
                                }
                                next_offer();
                            }
                        }
                    },
                    error: function (response) {
                        // console.log(response);
                        $(this).find('button').html('Could not add product');
                        setTimeout(function () { $(this).remove() }, 1000);
                    }
                });
            });
        });

        $('.reject_offer').click(function () {
            sessionStorage.setItem('sleek_shown_' + oid, 'y');
            brgxczvy(oid, '', '', '', '', 'reject', 'reject');
            $('.sleek-upsell').fadeOut("slow", function () {
                $('.sleek-upsell').remove();
                next_offer();
            });
        });

        $('.sleek-upsell').css('opacity', '1');
        $('.sleek-upsell form').css('margin-bottom', '0px');
        if (settings != null) {
            $('.sleek-upsell').css('opacity', '1');
            $('.sleek-upsell form').css('margin-bottom', '0px');
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

    }

});