<style>
    ul.product_list {
        position: relative;
    }

    ul.product_list.grid li {
        height: auto;
        position: relative;
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
    }

    ul.product_list.grid li, #index ul.product_list.grid li {
        padding: 0;
        padding-bottom: 0;
        padding-top: 0;
        text-align: center;
        border-left: 1px solid #eee;
    }

    .left-block {
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        padding: 0;
    }

    ul.product_list .comments_note {
        padding: 3px 5px 1px 5px;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    ul.product_list.grid li .product-container {
        overflow: hidden;
        position: relative;
        padding-top: 10px;
    }

    .product-container {
        padding: 0;
        position: relative;
        direction: rtl;
    }

    ul.product_list.grid li .product-container .old-price, ul.product_list.grid li .product-container .price, ul.product_list.grid li .product-container .price-percent-reduction {
        display: inline-table;
    }

    .price-percent-reduction {
        position: absolute;
        top: 0;
        left: -84px;
        background: #fff;
        z-index: 1;
        color: #c83a3a;
        -moz-box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 4px 5px rgb(0 0 0 / 10%);
        box-shadow: 0 4px 5px rgb(0 0 0 / 10%);
        text-align: center;
        width: 200px;
        padding: 10px 2px 2px;
        border: 0;
        font: bold 13px/18px IRANSans, "tahoma", sans-serif;
        transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        -webkit-transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        -moz-transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        transform: rotate(
            -45deg);
        -webkit-transform: rotate(
            -45deg);
        -moz-transform: rotate(-45deg);
    }

    .price-percent-reduction {
        background: #f13340;
        border: 1px solid #d02a2c;
        font: 400 21px/24px "tahoma", sans-serif;
        color: white;
        padding: 0 3px 0 5px;
        display: inline-block;
    }

    ul.product_list.grid li .product-container img {
        position: relative;
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
    }

    @media screen and (min-width: 992px) {
        ul.product_list .product-image-container img {
            max-width: 100%;
        }

        ul.product_list .product-image-container img {
            margin: 0 auto;
            transition: All 0.5s ease;
            -webkit-transition: All 0.5s ease;
            -moz-transition: All 0.5s ease;
        }

        .img-responsive {
            display: block;
            height: auto;
            max-width: 100%;
            margin: auto;
        }
    }

    .quick-view {
        background: #fff;
        position: absolute;
        top: -35px;
        left: -67px;
        width: 100px;
        padding: 10px 5px 5px 5px;
        font: 400 13px/22px IRANSans, "tahoma", sans-serif;
        z-index: 100;
        opacity: 0;
        COLOR: #555;
        transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        -webkit-transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        -moz-transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0s;
        -moz-box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 4px 5px rgb(0 0 0 / 10%);
        box-shadow: 0 4px 5px rgb(0 0 0 / 10%);
        transform: rotate(
            -45deg);
        -webkit-transform: rotate(
            -45deg);
        -moz-transform: rotate(-45deg);
    }

    ul.product_list.grid li .product-container .product-image-container .content_price span {
        color: white;
    }

    ul.product_list.grid li .product-container .old-price, ul.product_list.grid li .product-container .price, ul.product_list.grid li .product-container .price-percent-reduction {
        display: inline-table;
    }

    .product-container .price {
        color: #4caf50;
        margin: 0;
        text-align: center;
        display: block;
        font: 400 12px/18px IRANSans, "tahoma", sans-serif;
    }

    .price.product-price {
        font: 400 12px/18px IRANSans, "tahoma", sans-serif;
        color: #333333;
    }

    .price {
        font: 400 12px/18px IRANSans, "tahoma", sans-serif;
        color: #4caf50;
        white-space: nowrap;
    }

    a.date_upd {
        color: #999;
        font-family: IRANSans;
        font-size: 11px;
        clear: both;
        display: block;
        font-weight: 400;
    }

    ul.product_list.grid li .product-container .product-desc {
        display: none;
    }

    ul.product_list.grid li .product-container .content_price, #index ul.product_list.grid li .product-container .content_price {
        line-height: 16px;
        min-height: 36px;
    }

    ul.product_list.grid li .product-container .button-container {
        margin-bottom: 1px;
        width: 100%;
        display: block;
        height: 46px;
    }

    ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button, ul.product_list.grid li .product-container .button-container span.button, ul.product_list.grid li .product-container .button-container .lnk_view {
        margin: 10px 0;
        font: 400 12px/16px Mj_Flow Bold, IRANSans, "tahoma", sans-serif;
        padding: 4px 6px;
        color: #fff;
        border: none;
    }

    ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button, ul.product_list.grid li .product-container .button-container span.button, ul.product_list.grid li .product-container .button-container .lnk_view {
        margin: 10px 0;
        font: 400 12px/16px Mj_Flow Bold, IRANSans, "tahoma", sans-serif;
        padding: 4px 6px;
        color: #fff;
        border: none;
    }

    ul.product_list.grid li .product-container .button-container .lnk_view {
        background: #888;
        padding-top: 5px !important;
        border-color: #777;
        border: none;
    }

    ul.product_list.grid li .button-container .availability, ul.product_list.list li .button-container .availability {
        display: inline-block;
    }

    ul.product_list.grid li .right-block .availability, ul.product_list.list li .right-block .availability {
        font: 400 13px/12px IRANSans, "tahoma", sans-serif;
        z-index: 100;
        COLOR: #555;
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        padding: 4px 0 3px 0;
        margin: 10px -1px;
    }

    ul.product_list .availability span {
        font: 400 13px/20px IRANSans, "tahoma", sans-serif;
        border-radius: 5px;
    }

    .available-now, .available-dif {
        color: #fff;
        padding: 2px 5px 1px;
        background: #5cb85c;
        border-radius: 5px;
        border: 0;
        display: inline;
        width: 24px;
        line-height: 20px;
        position: relative;
        overflow: hidden;
    }
</style>
