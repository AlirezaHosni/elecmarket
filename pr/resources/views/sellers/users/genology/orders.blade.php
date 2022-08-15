@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش سفارشات </h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش سفارشات</li>
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
                                        <th>نام کاربر</th>
                                        <th>نام</th>
                                        <th> استان</th>
                                        <th>تاریخ سفارش</th>
                                        <th>مبلغ سفارش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $key => $row)
                                        @php
                                            $user_id = $row->user_id;
                                            $address = App\Address::where(['user_id' => $user_id])->first()->province_id;
                                            if (isset($address)) {
                                                $state = \App\Province::where(['id' => $address])->first()->name;
                                            } else {
                                                $state = "";
                                            }
                                        @endphp
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->user->profiles->first_name }}&nbsp;{{ $row->user->profiles->last_name }}</th>
                                            <th>{{ $row->user->username??'' }}</th>
                                            <th>{{ $state }}</th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <th class="c-price">{{ $row->total??'' }}</th>
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
