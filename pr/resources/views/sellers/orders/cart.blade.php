@extends('front.layouts.design')
@section('content')
    @include('sellers.orders.style.css')
    <section class="main-cart container">
        <div class="o-page__content">
            @include('layouts.errors')
            <div class="o-headline">
                <div id="main-cart"><span class="c-checkout-text c-checkout__tab--active">سبد خرید</span><span
                        class="c-checkout__tab-counter">{{ count($userCart) }}</span></div>
            </div>
            <div class="c-checkout">
                <div class="c-checkout__header">
                    <span class="c-checkout__header-title">سبد خرید </span>
                    <span class="c-checkout__header-extra-info">تعداد محصول :{{ count($userCart) }}</span>
                </div>
                <ul class="c-checkout__items">
                    <li class="c-checkout__item">
                        <?php
                        if (Auth::check()) {
                        $user_id = Auth::user()->id;
                        $user =  App\User::where(['id' => $user_id])->first();
                        }
                        $countdown = "";
                        $total_amount = 0; ?>
                        @forelse($userCart as $cart)
                            <?php
                                $productDetails = App\Product::where('id', $cart->product_id)->first();
                                $cat_id = $productDetails->category_id;

                                $type_identity = $user->type_identity;
                                $checkcat = App\CategoryUser::where(['user_id' => $user_id, 'category_id' => $cat_id])->first();
                                if (!@empty($checkcat)) {
                                    $countdown = $checkcat->discount_category ?? '5';
                                } else {
                                    $countdown = 0;
                                }
                                ?>
                            <div class="c-checkout" style="margin: 0 0 30px; ">
                                <div class="row">
                                    <div style="flex: 90%;
    margin-left: 10%;
    float: left;
    margin-top: 2%;">
                                        <a class="btn btn-danger c-quantity-selector__remove"
                                           href="{{ url('/sellers/cart/del-quantity/'.$cart->id) }}"><i
                                                class="fa fa-trash"></i> </a>

                                    </div>
                                </div>
                                <div class="c-checkout__row" style="margin: 0 0 30px; ">

                                    <div class="c-checkout__col--thumb">
                                        <a href="#"><img src="{{ asset($cart->cover) }}" alt=""></a>
                                    </div>
                                    <div class="c-checkout__col--desc">
                                        <a href="#">{{ $cart->producttitle }}</a>
                                        <div class="c-checkout__variant c-checkout__variant--color"></div>
                                        <div class="c-checkout__col--information">
                                            <div class="c-checkout__col c-checkout__col--counter">
                                                <div class="c-cart-item__quantity-row">
                                                    <div class="c-quantity-selector">
                                                        {{--                                                <button type="button" class="c-quantity-selector__add"><i--}}
                                                        {{--                                                        class="fa fa-plus"></i></button>--}}
                                                        <a class="c-quantity-selector__add"
                                                           href="{{ url('/sellers/cart/update-quantity/'.$cart->id.'/1') }}">
                                                            + </a>
                                                        <div
                                                            class="c-quantity-selector__number">{{ $cart->quantity }}</div>
                                                        @if($cart->quantity>1)
                                                            <a class="btn btn-danger c-quantity-selector__remove"
                                                               href="{{ url('/sellers/cart/update-quantity/'.$cart->id.'/-1') }}"><i
                                                                    class="fa fa-minus"></i> </a>
                                                        @endif
                                                        {{--                                                <button type="button" class="c-quantity-selector__remove"><i--}}
                                                        {{--                                                        class="fa fa-trash"></i></button>--}}
                                                    </div>
                                                    {{--                                                <a href="#" class="c-cart-item__save-for-later"><i--}}
                                                    {{--                                                        class="fa fa-th-list"></i> ذخیره در لیست خرید بعدی </a>--}}
                                                    {{--                                                <div class="c-checkout__quantity-error">امکان تغییر تعداد برای این کالا وجود--}}
                                                    {{--                                                    ندارد.--}}
                                                    {{--                                                </div>--}}
                                                </div>
                                            </div>
                                            <div class="c-checkout__col c-checkout__col--price">
                                                <!--incredible
                                                <div class="c-checkout__price c-checkout__price--del">۱۵۰,۰۰۰ ریال </div>
                                                <div class="c-checkout__price c-checkout__price--discount"> تخفیف شگفت‌انگیز: ۷۱,۰۰۰ ریال </div>
                                               incredible-->

                                                <div class="c-checkout__price">
                                                    {{ $countdown }}% &nbsp;&nbsp;
                                                    <div class="c-checkout__price c-checkout__price--del price">
                                                        {{ $cart->price }}
                                                        ریال
                                                    </div>

                                               </div>

                                                <div class="c-checkout__price price">{{ $cart->total }} ریال</div>

                                            </div>
                                        </div>
                                        {{--                                    <div class="c-cart-item__stock-info"><span><i class="fa fa-bell"></i> ۴ عدد در انبار باقیست - پیش از اتمام بخرید </span>--}}
                                        {{--                                    </div>--}}
                                    </div>

                                </div>
                            </div>
                            <?php $total_amount = $total_amount + ($cart->total * $cart->quantity); ?>
                        @empty
                        @endforelse
                    </li><!--cart-item-->
                </ul>
                <div class="c-checkout__to-shipping-sticky">
                    <a href="{{ route('sellers.shippings') }}" class="c-checkout__to-shipping-link">ادامه فرایند
                        خرید</a>
                    <div class="c-checkout__to-shipping-price-report">
                        <p>مبلغ قابل پرداخت</p>
                        <div class="c-checkout__to-shipping-price-report--price c-price">{{ $total_amount }} <span>ریال</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary">

                        <li class="has-devider">
                            <span> مبلغ قابل پرداخت </span>
                            <span class="price"> {{ $total_amount }} ریال </span>
                        </li>
                    </ul>
                    <div class="c-checkout-summary__main">
                        <div class="c-checkout-summary__content">
                            <div><span> کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.</span>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="c-checkout-feature-aside">--}}
{{--                    <div class="c-checkout-summary">--}}
{{--                        <h3 class="head" style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">از تخفیف ها و جدیدترین های الکمارکتینگ با خبر باشید</h3>--}}
{{--                        <div class="content" style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">--}}
{{--                            <form action="#">--}}
{{--                                <input type="text" style="flex: 80%;--}}
{{--                                       width: 80%;" class="options__row form-control row-select">--}}
{{--                                <button class="btn btn-search" type="submit">آدرس ایمیل</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </aside>
    </section>

@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
@endsection
