@extends('account.layouts.design')
@section('content')
    @php
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userDetails = \App\User::find($user_id);
            $userProfileDetails = \App\Profile::with('user')->where('user_id', $user_id)->first();
           // dd($userProfileDetails);
        }
    @endphp
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش سفارشات من</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش سفارشات من</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row flex-row">
                <div class="col-12">
                    <!-- Form -->
                    @include('layouts.errors')
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>نمایش سفارشات من </h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش  </th>
                                        <th>تاریخ </th>
                                        <th>مبلغ  </th>
                                        <th>مبلغ کل  </th>
                                        <th>عملیات سفارشات  </th>
                                        <th>جزییات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($get as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->tracking_code }}</th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>{{ $row->total??'' }} ریال </th>
                                            <th>{{ $row->total??'' }} ریال </th>
                                            <th>{{ $row->order_status=="PAY-OK"?'پرداخت تایید شد':'پرداخت نشد' }}</th>
                                            <th><a href="{{ url('/sellers/orders/'.$row->id) }}">نمایش فاکتور</a></th>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
@endsection
