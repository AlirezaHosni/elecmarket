@extends('front.layouts.design')
@section('content')
    @include('sellers.orders.style.css')
    @include('layouts.errors')
    <main class="main-cart container">
        <div class="o-page__content">

            <div id="shipping-data">
                <form action="{{ url('sellers/check/sellers') }}" method="post">
                    @csrf
                    <div class="o-headline o-headline--checkout">
                        <span>انتخاب آدرس تحویل سفارش</span>
                    </div>
                    <div id="address-section">
                        <div id="user-default-address-container" class="c-checkout-contact is-completed">
                            <div class="c-checkout-contact__content">
                                <ul class="c-checkout-contact__items">
                                    <li class="c-checkout-contact__item c-checkout-contact__item--username">
                                        <span>گیرنده : {{ $userProfileDetail->first_name??'' }}  {{ $userProfileDetail->last_name??'' }}</span>
                                        <a href="{{ route('sellers.address') }}" class="c-checkout-contact__btn-edit">
                                            اصلاح آدرس یا ایجاد </a>
                                    </li>
                                    @forelse($address as $row)

                                        <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                            <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                <span>استان : {{ $row->province->name }}</span>
                                            </div>
                                            <br>
                                            <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                <span>شهر : {{ $row->city->name }}</span>
                                            </div>
                                            <br>
                                            <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                <span>شماره تماس : {{ $row->tel }}</span>
                                            </div>
                                            <div class="c-checkout-contact__item--message"></div>
                                            <br> <span class="full-address">نشانی : {{ $row->address }}</span>
                                            <br>
                                            <label class="c-ui-radio c-ui-radio--primary">
                                                <input type="radio" class="payment_method"
                                                       name="address_id" value="{{ $row->id }}"> <span
                                                    class="c-ui-radio__check"></span> </label>
                                            <br>
                                            <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                <span>کد پستی : {{ $row->zip_code }}</span>
                                            </div>
                                            <br>
                                        </li>

                                    @empty
                                    @endforelse
                                </ul>
                                <div class="c-checkout-contact__badge"></div>
                            </div>
                        </div>
                    </div>

                    <div class="o-headline o-headline--checkout">
                        <span>انتخاب روش حمل و نقل  </span>
                    </div>
                    <div id="address-section">
                        <div id="user-default-address-container" class="c-checkout-contact is-completed">
                            <div class="c-checkout-contact__content">
                                <ul class="c-checkout-contact__items">
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                            <span>حضوری</span>
                                        </div>
                                        <label class="c-ui-radio c-ui-radio--primary">
                                            <input type="radio" class="payment_method"
                                                   name="transport" value="code"> <span
                                                class="c-ui-radio__check"></span> </label>
                                    </li>
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                            <span>پیک</span>
                                        </div>
                                        <label class="c-ui-radio c-ui-radio--primary">
                                            <input type="radio" class="payment_method"
                                                   name="transport" value="payk"> <span
                                                class="c-ui-radio__check"></span> </label>
                                    </li>
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                            <span>تیپاکس</span>
                                        </div>
                                        <label class="c-ui-radio c-ui-radio--primary">
                                            <input type="radio" class="payment_method"
                                                   name="transport" value="tipax"> <span
                                                class="c-ui-radio__check"></span> </label>
                                    </li>
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                            <span>باربری</span>
                                        </div>
                                        <label class="c-ui-radio c-ui-radio--primary">
                                            <input type="radio" class="payment_method"
                                                   name="transport" value="baar"> <span
                                                class="c-ui-radio__check"></span> </label>
                                    </li>
                                    <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                            <span>اتوبوس رانی </span>
                                        </div>
                                        <label class="c-ui-radio c-ui-radio--primary">
                                            <input type="radio" class="payment_method"
                                                   name="transport" value="bus"><span
                                                class="c-ui-radio__check"></span> </label>
                                    </li>
                                </ul>
                                <div class="c-checkout-contact__badge"></div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="cart_id" value="{{ $userCart['0']->id }}">

                    <div>
                        <div class="c-checkout-pack">
                            <div class="c-checkout-pack__row" style="float:left;">
                                <?php $total_amount = 0; ?>
                                @forelse($userCart as $cart)
                                    <div class="c-product-box c-product-box--compact">
                                        <a href="#" class="c-product-box__img"><img style="height: 70px;width: 70px"
                                                                                    src="{{ asset($cart->cover) }}"
                                                                                    alt=""></a>
                                        <div class="c-product-box__title">{{ $cart->producttitle }}
                                        </div>
                                        <br>

                                        <div class="c-product-box__title">تعداد : {{ $cart->quantity }}
                                        </div>
                                    </div>
                                    <?php $total_amount = $total_amount + ($cart->total * $cart->quantity); ?>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <input type="hidden" name="total" value="{{ $total_amount }}">
                    </div>


                    <div class="c-checkout-shipment__invoice-type">
                        <p class="c-checkout-shipment__invoice-type-info">شما می‌توانید فاکتور خرید را پس از تحویل سفارش
                            از
                            بخش جزییات سفارش در حساب کاربری خود دریافت کنید.</p>
                    </div>
                    <div class="c-checkout__to-shipping-sticky">
                        <button type="submit" class="c-checkout__to-shipping-link">تایید سفارش و پرداخت</button>
                        <div class="c-checkout__to-shipping-price-report">
                            <p>مبلغ قابل پرداخت</p>
                            <div class="c-checkout__to-shipping-price-report--price c-price">{{ $total_amount }}
                                <span>ریال</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="c-checkout__actions">
                <a href="{{ route('sellers.cart') }}" class="btn-link-spoiler">« بازگشت به سبد خرید</a>
            </div>
        </div>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary">
                        <li class="has-devider">
                            <span> مبلغ قابل پرداخت </span>
                            <span class="c-price"> {{ $total_amount }} ریال </span>
                        </li>
                    </ul>
                </div>
{{--                <div class="c-checkout-feature-aside">--}}
{{--                    <div class="c-checkout-summary">--}}
{{--                        <h3 class="head" style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">از تخفیف ها و جدیدترین های الکمارکتینگ با خبر باشید</h3>--}}
{{--                        <div class="content"  style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">--}}
{{--                            <form action="#">--}}
{{--                                <input type="text" style="flex: 80%;--}}
{{--                                       width: 80%;"  class="options__row form-control row-select">--}}
{{--                                <button class="btn btn-search" type="submit">آدرس ایمیل</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
