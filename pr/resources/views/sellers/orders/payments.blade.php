@extends('front.layouts.design')
@section('content')
    @include('sellers.orders.style.css')
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="payment-data">
                <div class="o-headline o-headline--checkout"><span>انتخاب شیوه پرداخت </span></div>
                <ul class="c-checkout-paymethod">
                    <li>
                        <h4 style="margin-right: 5%;margin-top: 2%" class="c-checkout-paymethod__title">
                            کاربر عزیز لطفا روش پرداخت خود را انتخاب کنید
                        </h4>

                        <div
                            class="c-checkout-paymethod__item c-checkout-paymethod__item--cc has-options js-checkout-paymethod__item is-selected is-select-mode">
                            <label class="c-ui-radio c-ui-radio--primary">
                                <input type="radio" class="payment_method" onClick="showformonline()"
                                       name="payment_method"> <span
                                    class="c-ui-radio__check"></span> </label>
                            <h4 class="c-checkout-paymethod__title"> پرداخت اینترنتی ( آنلاین با تمامی کارت‌های
                                بانکی )
                                <span>سرعت بیشتر در ارسال و پردازش سفارش</span></h4>
                        </div>
                        <div
                            class="c-checkout-paymethod__item c-checkout-paymethod__item--cc has-options js-checkout-paymethod__item is-selected is-select-mode">
                            <label class="c-ui-radio c-ui-radio--primary">
                                <input type="radio" onClick="showwallets()" class="payment_method"
                                       name="payment_method"> <span
                                    class="c-ui-radio__check"></span> </label>
                            <h4 class="c-checkout-paymethod__title">پرداخت اعتباری (کیف پول)
                            </h4>
                        </div>
                    </li>
                </ul>
                {{--                <div class="o-headline o-headline--checkout"><span>خلاصه سفارش</span></div>--}}
                {{--                <div class="c-checkout-order-summary">--}}
                {{--                    <section class="c-checkout-order-summary__item">--}}
                {{--                        <header class="c-checkout-order-summary__header">--}}
                {{--                        </header>--}}
                {{--                        <?php $total_amount = 0; ?>--}}
                {{--                        @forelse($prodcutorders as $row)--}}
                {{--                            <div class="c-checkout-order-summary__content">--}}
                {{--                                <?php--}}
                {{--                                $cover = \App\Product::where('id', $row->product_id)->first()->cover;--}}
                {{--                                ?>--}}
                {{--                                <div class="c-product-box"><img style="width: 70px;height: 70px"--}}
                {{--                                                                src="{{ asset($cover??'') }}">--}}
                {{--                                    <h4>{{ $row->product_name }}</h4> <span>{{ $row->product_qty }} عدد</span></div>--}}
                {{--                            </div>--}}
                {{--                            <?php $total_amount = $total_amount + ($row->product_price * $row->product_qty); ?>--}}
                {{--                        @empty--}}
                {{--                        @endforelse--}}
                {{--                    </section>--}}
                {{--                </div>--}}
                <?php
                $total_amount = 0;
                foreach ($prodcutorders as $row) {
                    $total_amount = $total_amount + ($row->product_price * $row->product_qty);
                }
                ?>
                <div class="o-headline o-headline--checkout"><span>نحوه پرداخت حساب سفارش </span></div>
                <div class="c-checkout__to-shipping-sticky">
                    <a style="design:none;visibility:hidden" href="{{ route('sellers.factor') }}" id="pay-online"
                       class="c-checkout__to-shipping-link ">نمایش فاکتور و پرداخت آنلاین</a>
                    <br>

                    <form style="design:none;visibility:hidden" id="pay-online2"
                          action="{{ route('sellers.pay.online') }}" method="post">
                        @csrf
                        <?php
                        $user_id = Auth::User()->id;
                        $userphone = App\User::where(['id' => $user_id])->first()->phone;
                        ?>
                        <input type="hidden" class="hidden" name="order_id" value="{{ $orders->id }}">
                        <input type="hidden" class="hidden" name="amount" value="{{ $orders->total }}">
                        <input type="hidden" class="hidden" name="phone" value="{{ $userphone }}">
                        <button type="submit" class="btn-order-traking">پرداخت انلاین</button>
                    </form>

                </div>

                <div class="c-checkout__to-shipping-sticky">
                    {{--                    <a href="{{ route('sellers.factor') }}" class="c-checkout__to-shipping-link">پرداخت و فاکتور </a>--}}
                    <div class="c-checkout__to-shipping-price-report">
                        <p>مبلغ قابل پرداخت</p>
                        <div class="c-checkout__to-shipping-price-report--price c-price">{{ $total_amount }}
                            <span>ریال</span>
                        </div>
                    </div>
                </div>
                <form id="cod" style="design:none;visibility:hidden;margin-top: 20px"
                      action="{{ route('sellers.payments.cod') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="order_id" value="{{ $orders->id }}">
                    <input type="hidden" name="total" value="{{ $total_amount }}">
                    <button class="btn btn-add-to-cart" type="submit">استفاده از اعتبار موجودی</button>
                </form>

            </div>
            {{--            <div class="c-checkout__actions">--}}
            {{--                <a href="{{ route('sellers.cart') }}" class="btn-link-spoiler">« بازگشت به شیوه خرید </a>--}}
            {{--            </div>--}}
        </div>
        <aside class="o-page__aside">
            <div class="c-checkout-aside">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary">
                        <li class="has-devider">
                            <span>جمع</span>
                            <span class="c-price"> {{ $total_amount }} ریال </span>
                        </li>


                    </ul>
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
        // $('.payment_method').click(function() {
        //
        //     if($('#radio_button').is(':checked')) { alert("it's checked"); }
        // });
        function showformonline() {
            document.getElementById("pay-online").style.display = "block";
            document.getElementById("pay-online").style.visibility = "visible";
            document.getElementById("pay-online2").style.display = "block";
            document.getElementById("pay-online2").style.visibility = "visible";
            document.getElementById("cod").style.display = "none";
            document.getElementById("cod").style.visibility = "hidden";
            //alert('showformonline');
        }

        function showwallets() {
            //alert('showwallets');
            document.getElementById("pay-online").style.display = "none";
            document.getElementById("pay-online").style.visibility = "hidden";
            document.getElementById("pay-online2").style.display = "none";
            document.getElementById("pay-online2").style.visibility = "hidden";
            document.getElementById("cod").style.display = "block";
            document.getElementById("cod").style.visibility = "visible";
        }
    </script>
@endsection

