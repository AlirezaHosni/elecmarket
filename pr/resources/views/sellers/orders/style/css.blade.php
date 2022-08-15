<style>
    .container {
        /* width: 1380px; */
        max-width: 100%;
        margin: 0 auto;
        padding-right: 16px !important;
        padding-left: 15px !important;
    }
    .c-checkout__header-title{
        color: #777;
        font-size: 15px;
        font-size: .9rem;
        line-height: 1.5;
        font-weight: 700;
        margin-right: 8px;
    }
    .cart-empty,
    .icon-wrapper {
        margin: 27px auto;
        background: #fff;
        border: 1px solid #e7e7e7;
        padding: 30px;
        text-align: center;
        line-height: 22px
    }

    .cart-empty__icon {
        width: 167px;
        height: 170px;
        background: #f4f4f4;
        position: relative;
        border-radius: 50%;
        margin: 0 auto
    }

    .cart-empty__icon:before {
        content: "\f07a";
        font-family: fontawesome;
        position: absolute;
        font-size: 77px;
        left: 42px;
        top: 72px;
        color: #a8a8a8
    }

    .cart-sfl__icon {
        margin: 0 auto;
        width: 200px;
        height: 150px;
        background: url({{ asset('assets/f/images/06d51c65.png') }}) 50% no-repeat;
        background-size: auto;
        background-size: contain;
    }

    .cart-empty__title {
        font-size: 2.214rem;
        line-height: 1.419;
        letter-spacing: -.4px;
        margin: 25px 0;
        color: #858585
    }

    .cart-empty__links {
        margin-bottom: 20px
    }

    .cart-empty__link-urls a {
        margin: 5px 0 0 10px;
        padding: 0 2px;
        position: relative
    }

    .btn-cart:not(.disabled):not(.is-inactive):not([disabled]) {
        position: relative;
        overflow: hidden
    }

    .cart-empty .btn-cart {
        padding-right: 100px;
        padding-left: 100px;
        margin-top: 15px;
        display: inline-block
    }

    .icon-wrapper .icon {
        border-bottom: none;
        justify-content: space-around;
        flex-wrap: wrap
    }

    .main-cart {
        display: flex;
        flex-wrap: wrap
    }

    .main-cart .o-page__content {
        flex: 0 0 74%;
        padding-right: 0;
        padding-left: 25px
    }

    .c-checkout-feature-aside {
        border-radius: 5px;
        box-shadow: 0 8px 13px -7px rgba(0, 0, 0, .05);
        background-color: #fff;
        border: 1px solid #e6e6e6;
        margin-top: 10px;
        padding: 15px;
        letter-spacing: -.2px;
        line-height: 1.73;
        color: #aaa;
        font-weight: 500
    }

    .c-checkout-feature-aside__item {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        font-size: 1.3em;
        line-height: 1.692;
        font-weight: 500;
        margin-bottom: 10px;
        padding: 0 27px 0 20px
    }

    .c-checkout-steps,
    .c-checkout-steps__item::before {
        position: absolute;
        left: 50%;
        transform: translateX(-50%)
    }

    .c-checkout-feature-aside__item--guarantee {
        background: url({{ asset('assets/front/images/a8d65c7a.svg') }}) 100% 50% no-repeat;
        background-size: 22px auto
    }

    .c-checkout-feature-aside__item--cash {
        background: url({{ asset('assets/front/images/3e2ec4e5.svg') }}) 100% 50% no-repeat;
        background-size: 22px auto
    }

    .c-checkout-feature-aside__item:last-child {
        margin-bottom: 0
    }

    .c-checkout-feature-aside__item--express {
        background: url({{ asset('assets/front/0e30c4eb.svg') }}) 100% 50% no-repeat;
        background-size: 22px auto
    }

    .c-checkout-feature-aside {
        font-size: 1em
    }
    .c-checkout__to-shipping-sticky{
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        height: 66px;
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background-color: #fff;
        -webkit-box-shadow: 0 -3px 4px 0 rgb(0 0 0 / 6%);
        box-shadow: 0 -3px 4px 0 rgb(0 0 0 / 6%);
        border-color: #e0e0e2;
        border-style: solid;
        border-width: 1px 0;
        padding: 10px 12px;
        z-index: 1;
    }
    .options__row{
        border-radius: 5px;
        background: #fff;
        border: 1px solid #c8c8c8;
        color: #717171;
        font-size: 14px;
        font-size: 1rem;
        line-height: 1.571;
        padding: 11px 12px;
        width: 60%;
        letter-spacing: -.8px;
    }
    @media only screen and (max-width: 872px){
        .main-cart .o-page__aside, .main-cart .o-page__content {
            flex-basis: 100%;
            padding-left: 0;
        }
        .main-cart .c-checkout-aside {
            margin: 0;
        }
        .c-checkout{
            width:100%;
        }
    }
</style>
