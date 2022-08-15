@extends('front.layouts.design')
@section('content')
    @include("account.orders.style.css")
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                <div class="o-headline o-headline--checkout"><span>انتخاب آدرس تحویل سفارش</span></div>
                <div id="address-section">
                    <div id="user-default-address-container" class="c-checkout-contact is-completed">
                        <div class="c-checkout-contact__content">
                            <ul class="c-checkout-contact__items">
                                <li class="c-checkout-contact__item c-checkout-contact__item--username">
                                    <span>گیرنده : {{ $userProfileDetail->first_name??'' }}  {{ $userProfileDetail->last_name??'' }}</span>
                                </li>
                                @forelse($address as $row)
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile"><span>استان : {{ $row->province->name }}</span>
                                        </div>
                                        <br>
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile"><span>شهر : {{ $row->city->name }}</span>
                                        </div>
                                        <br>
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile"><span>شماره تماس : {{ $row->tel }}</span>
                                        </div>
                                        <div class="c-checkout-contact__item--message"></div>
                                        <br> <span class="full-address">نشانی : {{ $row->address }}</span>
                                        <br>
                                        <br>
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile"><span>کد پستی : {{ $row->zip_code }}</span>
                                        </div>
                                        <br>
                                    </li>
                                @empty
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile"><span>ادرس موجود نیست</span>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                            <div class="c-checkout-contact__badge"></div>
                        </div>
                        <a href="{{ route('address.user') }}" id="change-sh-address"
                           class="c-checkout-contact__location">اصلاح این آدرس</a>
                    </div>
                </div>

                <div class="checkout__address_complate">
                    <div class="o-headline o-headline--checkout"><span>مرسوله </span></div>
                    <div class="c-checkout-pack">
                        <div class="c-checkout-pack__row">
                            <?php $total_amount = 0; ?>
                            @forelse($userCart as $cart)
                                <div class="c-product-box c-product-box--compact">
                                    <a href="#" class="c-product-box__img"><img style="height: 70px;width: 70px"
                                                                                src="{{ $cart->cover }}"
                                                                                alt="{{ $cart->producttitle }}"></a>
                                    <div class="c-product-box__title">{{ $cart->producttitle }}
                                    </div>
                                    <br>

                                    <div class="c-product-box__title">تعداد : {{ $cart->quantity }}
                                    </div>
                                </div>
                                <?php $total_amount = $total_amount + ($cart->price * $cart->quantity); ?>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>


                <div class="c-checkout__to-shipping-sticky">
                    <a href="{{ route('checkSeller') }}" class="c-checkout__to-shipping-link">ادامه فرایند خرید</a>
                    <div class="c-checkout__to-shipping-price-report">
                        <p>مبلغ قابل پرداخت</p>
                        <div class="c-checkout__to-shipping-price-report--price price">{{ $total_amount / 10  }}
                            <span>تومان</span></div>
                    </div>
                </div>
            </div>
            <div class="c-checkout__actions">
                <button class="btn-link-spoiler">« بازگشت به سبد خرید</button>
            </div>
        </div>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary">
                        <li class="has-devider">
                            <span> مبلغ قابل پرداخت </span>
                            <span class="price"> {{ $total_amount / 10 }} تومان </span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </main>

@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
@endsection
@section('scripts')
    <script>
        $('.close-modal').click(function () {
            $('.main-cart').removeClass('main-cart-overlay');
            $('.modal-checkout').fadeOut(200);
        });
        $('#change-sh-address').click(function () {
            $('.main-cart').addClass('main-cart-overlay');
            $('.modal-checkout').fadeIn(200);
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
