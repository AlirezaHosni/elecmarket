@extends('front.layouts.design')
@section('content')
    @include("account.orders.style.css")
    <main class="main-cart container">
        <aside class="o-page__content">
            <aside id="payment-data">
                <div class="o-headline o-headline--checkout"><span>انتخاب شیوه پرداخت </span></div>
                <ul class="c-checkout-paymethod">
                    <li>
                        <div
                            class="c-checkout-paymethod__item c-checkout-paymethod__item--cc has-options js-checkout-paymethod__item is-selected is-select-mode">
                            <label class="c-ui-radio c-ui-radio--primary">
                                <input type="radio" name="payment_method" checked>
                                <span
                                    class="c-ui-radio__check">
                                </span>
                            </label>
                            <h4 class="c-checkout-paymethod__title"> پرداخت اینترنتی ( آنلاین با تمامی کارت‌های بانکی )
                                <span>سرعت بیشتر در ارسال و پردازش سفارش</span>
                            </h4>
                        </div>
                        <div class="c-checkout-paymethod__options">
                            <div class="c-checkout-paymethod__providers">
                                <div class="c-checkout-paymethod__providers-arrow"></div>
                            </div>
                        </div>
                    </li>
                </ul>
                <?php
                $total_amount = 0;
                foreach ($prodcutorders as $row) {
                    $total_amount = $total_amount + ($row->product_price * $row->product_qty);
                }
                ?>

                <div class="c-checkout__to-shipping-sticky">
                    <a href="{{ route('factor') }}" class="c-checkout__to-shipping-link"> نمایش فاکتور و پرداخت
                        آنلاین </a>
                    <div class="c-checkout__to-shipping-price-report">
                        <p>مبلغ قابل پرداخت</p>
                        <div class="c-checkout__to-shipping-price-report--price price">{{ $total_amount / 10 }}
                            <span>تومان</span></div>
                    </div>
                </div>
            </aside>
            <div class="c-checkout__actions">
                <a href="{{ route('cart') }}" class="btn-link-spoiler">« بازگشت به شیوه خرید </a>
            </div>
            <section class="payment-methods container">
                <div class="o-headline o-headline--checkout"><span>پرداخت آنلاین  </span></div>
                <div class="c-checkout-details">
                    <form action="{{ route('pay.online') }}" method="post">
                        @csrf
                        <?php
                        $user_id = Auth::User()->id;
                        $userphone = App\User::where(['id' => $user_id])->first()->phone;
                        ?>
                        <input type="hidden" class="hidden" name="order_id" value="{{ $orders->id }}">
                        <input type="hidden" class="hidden" name="amount" value="{{ $total_amount }}">
                        <input type="hidden" class="hidden" name="phone" value="{{ $userphone }}">
                        <button type="submit" class="btn-order-traking">پرداخت انلاین</button>
                    </form>
                </div>
            </section>
        </aside>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">

                <section class="payment-methods container">
                    <div class="o-headline o-headline--checkout"><span>شما می توانید فاکتور خرید را در پروفایل خود در قسمت سفارشات من مشاهده کنید   </span>
                    </div>
                </section>
            </div>
        </aside>
    </main>
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
@endsection
@section('scripts')
    <script>
        $('.c-checkout-order-summary__header').click(function () {
            $('.c-checkout-order-summary__content').slideToggle(200);
        });
    </script>
@endsection

@section('scripts')
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/front/js/edit.js') }}"></script>
<script src="{{ asset('assets/front/js/scripthome.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/script.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main-old.js') }}"></script>
@endsection
@section('links')
<!-- Stylesheets -->
<link type="text/css" href="{{ asset('assets/front/css/normalize.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/grid12.css') }}" rel="stylesheet"/>

<link rel='stylesheet' href='{{ asset('assets/front/css/owl.carousel.min.css') }}'>
<link rel='stylesheet' href='{{ asset('assets/front/css/owl.theme.default.min.css') }}'>
<link rel='stylesheet' href='{{ asset('assets/front/css/owl.theme.css') }}'>

<link type="text/css" href="{{ asset('assets/front/css/slick-theme.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/slick.css') }}" rel="stylesheet"/>

<link type="text/css" href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/remodal.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/remodal-default-theme.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/iziModal.min.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/media.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/front/css/old-style.css') }}" rel="stylesheet"/>
<!-- JavaScript -->
<script>
    window.jQueryQ = window.jQueryQ || [];
    window.$ = window.jQuery = function () {
        window.jQueryQ.push(arguments);
    }
</script>    
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-2.2.0.min.js') }}"></script>

@endsection

