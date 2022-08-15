@extends('front.layouts.design')
@section('content')
    @include("account.orders.style.css")
    <section class="main-cart container">
        <aside class="o-page__content">
            @include('layouts.errors')
            <div class="o-headline">
                <div id="main-cart"><span class="c-checkout-text c-checkout__tab--active">سبد خرید</span><span
                        class="c-checkout__tab-counter">{{ count($userCart) }}</span></div>
            </div>
            <aside class="c-checkout">

                <div class="c-checkout__header">
                    <span class="c-checkout__header-title">سبد خرید </span>
                    <span class="c-checkout__header-extra-info">تعداد محصول :{{ count($userCart) }}</span>
                </div>
                <ul class="c-checkout__items ">
                    <li class="c-checkout__item">
                        <?php $total_amount = 0; ?>
                        @forelse($userCart as $cart)
                            <div class="c-checkout" style="margin: 0 0 30px; ">
                                <div class="c-checkout__row">
                                    <div class="c-checkout__col--thumb">
                                        <a href="#"><img src="{{ asset($cart->cover) }}"></a>
                                    </div>
                                    <div class="c-checkout__col--desc">
                                        <div class="del-col-checkout">
                                            <a class="btn btn-danger c-quantity-selector__remove"
                                               href="{{ url('/cart/del-quantity/'.$cart->id) }}"><i
                                                    class="fa fa-trash"></i> </a>

                                        </div>
                                        <a href="#">{{ $cart->producttitle }}</a>
                                        <div class="c-checkout__variant c-checkout__variant--color"></div>
                                        <div class="c-checkout__col--information">
                                            <div class="c-checkout__col c-checkout__col--counter">
                                                <div class="c-cart-item__quantity-row">
                                                    <div class="c-quantity-selector">
                                                        <a class="c-quantity-selector__add"
                                                           href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}">
                                                            + </a>
                                                        <div
                                                            class="c-quantity-selector__number">{{ $cart->quantity }}</div>
                                                        @if($cart->quantity>1)
                                                            <a class="btn btn-danger c-quantity-selector__remove"
                                                               href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"><i
                                                                    class="fa fa-minus"></i> </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="c-checkout__col c-checkout__col--price">
                                                <div class="c-checkout__price price">{{ $cart->price / 10 }} تومان</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $total_amount = $total_amount + ($cart->price * $cart->quantity); ?>
                        @empty
                        @endforelse
                    </li><!--cart-item-->
                </ul>
                <div class="c-checkout__to-shipping-sticky">
                    <a href="{{ route('shippings') }}" class="c-checkout__to-shipping-link">ادامه فرایند خرید</a>
                    <div class="c-checkout__to-shipping-price-report">
                        <p>مبلغ قابل پرداخت</p>
                        <div class="c-checkout__to-shipping-price-report--price price">{{ $total_amount / 10 }} <span>تومان</span>
                        </div>

                    </div>
                </div>
            </aside>
        </aside>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary">
                        <li>
                            <span>قیمت کالاها</span>
                            <span class="price"> {{ $total_amount / 10 }} تومان </span>
                        </li>

                        <li class="has-devider">
                            <span> مبلغ قابل پرداخت </span>
                            <span class="price"> {{ $total_amount / 10 }} تومان </span>
                        </li>
                    </ul>
                    <div class="c-checkout-summary__main">
                        <div class="c-checkout-summary__content">
                            <div><span> کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </section>

@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
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
