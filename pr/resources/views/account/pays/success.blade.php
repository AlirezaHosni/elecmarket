@extends('account.layouts.design')
@section('content')
   @include('account.orders.style.css')
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                <div class="o-headline o-headline--checkout"><span>رسید پرداخت   {{  $orders->tracking_code }} </span></div>
            </div>
            <section class="c-checkout-details container">
                <h4 class="c-checkout-details__title">کد سفارش: </h4>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--text">
                        <p>سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون <span class="text-highlight text-highlight--ok">تکمیل شده</span> است. جزئیات این سفارش را می&zwnj;توانید با کلیک بر روی دکمه  مشاهده نمایید.</p>
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
                                <div class="c-checkout-table__col"><span>وضعیت پرداخت: پرداخت آنلاین <span class="green">(موفق)</span> </span>
                                </div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col full-col"><span>آدرس :{{  $userdetails->addresses->find(1)->address??'' }} </span></div>
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
