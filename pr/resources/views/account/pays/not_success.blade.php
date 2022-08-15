@extends('account.layouts.design')
@section('content')
    <style>
        .container {
            width: 1380px;
            max-width: 100%;
            margin: 0 auto;
            padding-right: 16px !important;
            padding-left: 15px !important;
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
        .row-select{
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
    </style>
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                <div class="o-headline o-headline--checkout"><span>رسید پرداخت   {{  $orders->tracking_code }} </span></div>
            </div>
            <section class="c-checkout-details container">
                <h4 class="c-checkout-details__title">کد سفارش: </h4>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--text">
                        <p>سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون <span class="text-highlight text-highlight--ok">تکمیل شده</span> است. جزئیات این سفارش می بیندید&zwnj;.</p>
                    </div> </div>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--table">
                        <div class="c-checkout-table">
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>نام تحویل گیرنده:  {{ $userdetails->username }}  </span></div>
                                <div class="c-checkout-table__col"><span>{{ $userdetails->phone }}شماره تماس : </span></div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>تعداد مرسوله : {{ $orders->orders_products->count() }} </span></div>
                                <div class="c-checkout-table__col"><span>مبلغ کل: {{ $pays->amount }} </span></div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>وضعیت پرداخت: پرداخت آنلاین <span class="red">(ناموفق)</span> </span>
                                </div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col full-col"><span>آدرس :{{ $userdetails->addresses->find(1)->address??'' }} </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="c-checkout__actions">
                <a href="{{ url('/') }}" class="btn-link-spoiler">« بازگشت به خانه </a>
            </div>
        </div>
    </main>
@endsection
