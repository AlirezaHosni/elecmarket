@extends('sellers.layouts.design')
@section('content')
    @include('sellers.orders.style.css')
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                <div class="o-headline o-headline--checkout"><span>فاکتور    </span></div>
            </div>s
            <section class="c-checkout-details container">
                <h4 class="c-checkout-details__title">کد سفارش:{{ $order->tracking_code }}</h4>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--text">
                        <p>سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                            <span class="text-highlight text-highlight--ok">تکمیل شده</span>
                            است. جزئیات این سفارش را می باشد</p>
                    </div>
                </div>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--table">
                        <div class="c-checkout-table">
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>نام تحویل گیرنده: {{ $userProfileDetail->first_name??'' }} - {{ $userProfileDetail->last_name??'' }}  </span></div>
                                <div class="c-checkout-table__col"><span>شماره تماس :  {{ $userDetail->phone }}</span></div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>تعداد مرسوله : ۱ </span></div>
                                <div class="c-checkout-table__col c-price"><span>مبلغ کل: {{ $order->total }} ریال </span></div>
                            </div>
                            <div class="c-checkout-table__row">
                                <div class="c-checkout-table__col"><span>وضعیت سفارش: در انتظار پرداخت </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="c-checkout-details container">
                <div id="shipping-data">
                    <div class="o-headline o-headline--checkout"><span>جزییات سفارش    </span></div>
                </div>
                <div class="c-checkout-details__row">
                    <div class="c-checkout-details__col--table">
                        <div class="c-checkout-table">
                            @forelse($prodcutorders as $cart)
                                <div class="c-checkout-table__row">
                                    <?php
                                    $total_amount = 0;
                                    $cover = \App\Product::where('id',$cart->product_id)->first()->cover;
                                    ?>
                                    <div class="c-checkout-table__col"><img style="width: 75px;height: 75px;" src="{{ asset($cover??'') }}" alt=""></div>
                                    <div class="c-checkout-table__col">نام محصول : {{ $cart->product_name }}</div>
                                    <div class="c-checkout-table__col">تعداد محصول : {{ $cart->product_qty }}</div>
                                    <div class="c-checkout-table__col c-price">قیمت محصول :{{ $cart->product_price }}</div>
                                </div>
                                <?php $total_amount = $total_amount + ($cart


                                            ->product_price * $cart->product_qty); ?>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
            @php
                $checkpays = \App\Pay::where(['order_id' => $order->id,'status_pay' => 'complate'])->count();
            @endphp
            @if($checkpays > 0)
                <section class="payment-methods container">
                    <div class="o-headline o-headline--checkout"><span>جزئیات پرداخت </span></div>
                    <div class="c-checkout-details">
                        <div class="c-checkout-orders-table">
                            <div class="c-checkout-orders-table__row">
                                <div>
                                    <p>رديف</p>
                                </div>
                                <div>
                                    <p>درگاه</p>
                                </div>
                                <div>
                                    <p>شماره پيگيري</p>
                                </div>
                                <div>
                                    <p>تاريخ</p>
                                </div>
                                <div>
                                    <p>مبلغ</p>
                                </div>
                                <div>
                                    <p>وضعيت</p>
                                </div>
                            </div>
                            <div class="c-checkout-orders-table__row">
                                <?php
                                $pays = \App\Pay::where(['order_id' => $order->id])->get();
                                ?>
                                @forelse($pays as $row)
                                    <div>
                                        <p>{{ $row->id }}</p>
                                    </div>
                                    <div>
                                        <p>{{ $row->pay_type }} </p>
                                    </div>
                                    <div>
                                        <p>{{ $row->transaction_id }}</p>
                                    </div>
                                    <div>
                                        <p>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</p>
                                    </div>
                                    <div>
                                        <p class="c-price"> {{ $row->total }} ریال</p>
                                    </div>
                                    <div>
                                        <p>{{ $row->status_pay }} </p>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="payment-methods container">
                    <div class="o-headline o-headline--checkout"><span>پرداخت آنلاین  </span></div>
                    <div class="c-checkout-details">
                        <form action="{{ route('sellers.pay.online') }}" method="post">
                            @csrf
                            <input type="hidden" class="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" class="hidden" name="amount" value="{{ $total_amount }}">
                            <button type="submit" class="btn-order-traking">پرداخت انلاین</button>
                        </form>
                    </div>
                </section>
                <section class="payment-methods container">
                    <div class="o-headline o-headline--checkout"><span>جزئیات پرداخت </span></div>
                    <div class="c-checkout-details">
                        <div class="c-checkout-orders-table">
                            <div class="c-checkout-orders-table__row">
                                <div>
                                    <p>رديف</p>
                                </div>
                                <div>
                                    <p>درگاه</p>
                                </div>
                                <div>
                                    <p>شماره پيگيري</p>
                                </div>
                                <div>
                                    <p>تاريخ</p>
                                </div>
                                <div>
                                    <p>مبلغ</p>
                                </div>
                                <div>
                                    <p>وضعيت</p>
                                </div>
                            </div>
                            <div class="c-checkout-orders-table__row">
                                <?php
                                $pays = \App\Pay::where(['order_id' => $order->id])->get();
                                ?>
                                @forelse($pays as $row)
                                    <div>
                                        <p>{{ $row->id }}</p>
                                    </div>
                                    <div>
                                        <p>{{ $row->pay_type }} </p>
                                    </div>
                                    <div>
                                        <p>{{ $row->transaction_id }}</p>
                                    </div>
                                    <div>
                                        <p>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</p>
                                    </div>
                                    <div>
                                        <p class="c-price"> {{ $row->total }} ریال</p>
                                    </div>
                                    <div>
                                        <p>{{ $row->status_pay }} </p>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            <div class="c-checkout__actions">
                <a href="{{ route('sellers.cart') }}" class="btn-link-spoiler">« بازگشت به سبد خرید</a>
            </div>
        </div>
    </main>
@endsection
