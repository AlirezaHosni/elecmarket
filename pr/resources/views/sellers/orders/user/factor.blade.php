@extends('sellers.layouts.design')
@section('content')
    {{--    @include("account.style.css")--}}

    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">فاکتور</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">فاکتور</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Begin Invoice -->
                    <div class="invoice has-shadow">
                        <!-- Begin Invoice COntainer -->
                        <div class="invoice-container">
                            <!-- Begin Invoice Top -->
                            <div class="invoice-top">
                                <div class="row d-flex align-items-center">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                        <h1>فاکتور</h1>
                                        <span>شماره-{{ $order->tracking_code }}</span>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                                        <div class="actions dark">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">
                                                        <i class="la la-print"></i>پرینت
                                                    </a>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="la la-download"></i>دانلود
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Invoice Top -->
                            <!-- Begin Invoice Header -->
                            <div class="invoice-header">
                                <div class="row d-flex align-items-center">
                                    <div
                                        class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
                                        <div class="details">
                                            <ul>
                                                <li class="company-name"> {{ $userProfileDetail->first_name }}
                                                    - {{ $userProfileDetail->last_name }}  </li>
                                                <li>شماره تماس : {{ $userDetail->phone }}</li>
                                                <li>مبلغ کل: {{ $order->total }} ریال</li>
                                                <li>وضعیت
                                                    سفارش: {{ $order->order_status=="PAY-OK"?'پرداخت تایید شد':'پرداخت نشد' }}  </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-end justify-content-md-end justify-content-center mb-2">
                                        <div class="client-details">
                                            <ul>
                                                <li>{{ $userProfileDetail->first_name }}
                                                    - {{ $userProfileDetail->last_name }} </li>
                                                <li>{{ Verta($order->updated_at)->format('%d %B %Y H:i') }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Invoice Header -->
                            <div class="invoice-date d-flex justify-content-xl-end justify-content-center">
                                <span>{{ Verta($order->updated_at)->format('%d %B %Y H:i') }}</span>
                            </div>
                            <!-- Begin Table -->
                            <div class="col-xl-12 desc-tables">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-left">#</th>
                                            <th class="text-center">نام محصول</th>
                                            <th class="text-center">تعداد محصول</th>
                                            <th class="text-center">قیمت محصول</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @forelse($orderproduct as $row)
                                                <?php
                                                $cover = \App\Product::where('id', $row->product_id)->first()->cover;
                                                ?>
                                                <td class="text-left">
                                                    <img style="width: 75px;height: 75px;" src="{{ asset($cover??'') }}"
                                                         alt="">
                                                </td>
                                                <td class="text-center">
                                                    {{ $row->product_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $row->product_qty }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $row->product_price }}
                                                </td>
                                            @empty
                                            @endforelse
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- End Invoice Container -->
                        <!-- Begin Invoice Footer -->
                        @php
                            $checkpays = \App\Pay::where(['order_id' => $order->id,'status_pay' => 'PAY-OK'])->count();
                        @endphp
                        @if($checkpays > 0)
                            <div class="invoice-footer">
                                <!-- Begin Invoice Container -->
                                <div class="invoice-container">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-xl-12 desc-tables">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-left">#</th>
                                                        <th class="text-center">درگاه</th>
                                                        <th class="text-left">شماره پیگیری</th>
                                                        <th class="text-left">تاریخ</th>
                                                        <th class="text-left">مبلغ</th>
                                                        <th class="text-left">وضعیت</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $pays = \App\Pay::where(['order_id' => $order->id])->get();
                                                    ?>
                                                    @forelse($pays as $row)
                                                        <tr>
                                                            <td>
                                                                {{ $row->id }}
                                                            </td>
                                                            <td>
                                                                {{ $row->pay_type }}
                                                            </td>
                                                            <td>
                                                                {{ $row->transaction_id }}
                                                            </td>

                                                            </td>
                                                            {{ Verta($row->updated_at)->format('%d %B %Y H:i') }}
                                                            </td>
                                                            <td>
                                                                {{ $row->amount }} ریال
                                                            </td>
                                                            <td>
                                                                {{  $row->status_pay=="PAY-OK"?'پرداخت تایید شد':'پرداخت نشد' }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Invoice Container -->
                            </div>
                        @else
                            <section class="payment-methods container">
                                <div class="o-headline o-headline--checkout"><span>پرداخت آنلاین  </span></div>
                                <div class="c-checkout-details">
                                    <form action="{{ route('pay.online') }}" method="post">
                                        @csrf
                                        <input type="hidden" class="hidden" name="order_id" value="{{ $order->id }}">
                                        <input type="hidden" class="hidden" name="amount" value="{{ $order->total }}">
                                        <button type="submit" class="btn-order-traking">پرداخت انلاین</button>
                                    </form>
                                </div>
                            </section>
                            <section class="payment-methods container">
                                <div class="o-headline o-headline--checkout"><span>جزئیات پرداخت </span></div>
                                <div class="c-checkout-details">
                                    <div class="col-xl-12 desc-tables">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-left">#</th>
                                                    <th class="text-center">درگاه</th>
                                                    <th class="text-left">شماره پیگیری</th>
                                                    <th class="text-left">تاریخ</th>
                                                    <th class="text-left">مبلغ</th>
                                                    <th class="text-left">وضعیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $pays = \App\Pay::where(['order_id' => $order->id])->get();
                                                ?>
                                                @forelse($pays as $row)
                                                    <tr>
                                                        <td>
                                                            {{ $row->id }}
                                                        </td>
                                                        <td>
                                                            {{ $row->pay_type }}
                                                        </td>
                                                        <td>
                                                            {{ $row->transaction_id }}
                                                        </td>

                                                        </td>
                                                        {{ Verta($row->updated_at)->format('%d %B %Y H:i') }}
                                                        </td>
                                                        <td>
                                                            {{ $row->amount }} ریال
                                                        </td>
                                                        <td>
                                                            {{  $row->status_pay=="PAY-OK"?'پرداخت تایید شد':'پرداخت نشد' }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                    @endif

                    <!-- End Invoice Footer -->
                    </div>
                    <!-- End Invoice -->
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
@endsection
