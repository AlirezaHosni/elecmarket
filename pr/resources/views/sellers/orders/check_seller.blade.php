@extends('front.layouts.design')
@section('content')
    @include('sellers.orders.style.css')
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                <div class="o-headline o-headline--checkout"><span>انتخاب پروسه بازاریابی  </span></div>
                <div id="address-section">
                    <div id="user-default-address-container" class="c-checkout-contact is-completed">
                        <div class="c-checkout-contact__content">

                            <div class="c-checkout-contact__badge"></div>
                        </div>
                        <p id="change-sh-address" class="c-checkout-contact__location">انتخاب پروسه بازاریابی  </p>

                    </div>
                    <div class="o-headline o-headline--checkout"><span>خلاصه سفارش</span></div>
                    <div class="c-checkout-price-options">
                        <div class="c-checkout-price-options__form">
                            <section class="c-checkout-price-options__container">
                                <div class="c-checkout-price-options__header"> <span>بررسی پروسه بازاریابی</span></div>
                                <div class="c-checkout-price-options__content">
                                    <?php

                                    ?>
                                    <p>لطفا پروسه را تکمیل کنید تا تخفیف شما اعمال شود</p>
                                    <form action="{{ url('sellers/check/sellers') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        <input type="hidden" name="cart_id" value="{{ $userCart['0']->id }}">
                                        <input type="hidden" name="total"
                                               value="{{ $total_orders??'0' }}">
                                        <div class="c-checkout-price-options__row">
                                            <label for=""> کد معرف</label>
                                            <input required type="text" name="identifiercode">
                                        </div>
                                        <div class="c-checkout-price-options__row">
                                            <label for=""> استان</label>
                                            <select required name="state" id="stateall" class="options__row row-select">
                                                <option value="">انتخاب استان</option>
                                                @forelse($state as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="c-checkout-price-options__row">
                                            <label for="">نماینده استان</label>
                                            <select required name="seller_id" id="seller_id" class=" options__row row-select">
                                                <option value="">انتخاب نماینده استان</option>
                                            </select>
                                        </div>
                                        <button class="btn-primary">ثبت  </button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="c-checkout-shipment__invoice-type">
                    <p class="c-checkout-shipment__invoice-type-info"></p>
                </div>
                {{--                <div class="c-checkout__to-shipping-sticky">--}}
                {{--                    <a href="{{ route('payments') }}" class="c-checkout__to-shipping-link">ادامه فرایند خرید</a>--}}
                {{--                    <div class="c-checkout__to-shipping-price-report">--}}
                {{--                        <p>مبلغ قابل پرداخت</p>--}}
                {{--                        <div class="c-checkout__to-shipping-price-report--price">0 <span>ریال</span></div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <div class="c-checkout__actions">
                <a href="{{ route('sellers.cart') }}" class="btn-link-spoiler">« بازگشت به سبد خرید</a>
            </div>
        </div>
        <aside class="o-page__aside">
{{--            <div class="c-checkout-feature-aside">--}}
{{--                <div class="c-checkout-summary">--}}
{{--                    <h3 class="head" style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">از تخفیف ها و جدیدترین های الکمارکتینگ با خبر باشید</h3>--}}
{{--                    <div class="content"  style="margin-bottom: 5%;--}}
{{--    margin-top: 2%;">--}}
{{--                        <form action="#">--}}
{{--                            <input type="text" style="flex: 80%;--}}
{{--                                       width: 80%;"  class="options__row form-control row-select">--}}
{{--                            <button class="btn btn-search" type="submit">آدرس ایمیل</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </aside>
    </main>
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
@endsection
@section('scripts')
    <script>
        //alert('sdsds');
        $("#stateall").on('change', function () {

            var state_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/get-sellers') }}",
                type: "POST",
                data: {state_id: state_id}
            }).done(function (msg) {
                $("#seller_id").html(msg)
            });
        });
    </script>


@endsection


