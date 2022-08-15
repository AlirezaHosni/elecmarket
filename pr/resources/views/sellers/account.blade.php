@extends('sellers.layouts.design')
@section('content')
    <!-- End Left Sidebar -->
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">داشبورد</h2>

                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <!-- Begin Row -->
            <div class="row flex-row">
                <!-- Begin Facebook -->
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <a href="{{ route('sellers.wallets') }}">
                                        <div class="title text-facebook"> کیف پول پرداخت شده</div>
                                        <div class="number">{{ $wallet->amount??'0' }}ریال</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Facebook -->
                <!-- Begin Twitter -->
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <a href="{{ route('sellers.wallets') }}">
                                    <div class="media-body align-self-center">
                                        <div class="title text-twitter">کیف پول معلق شده</div>
                                        <div class="number"> {{ $wallet->deposit??'0'	 }}ریال</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Twitter -->
                <!-- Begin Linkedin -->
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <a href="{{ route('sellers.wallets') }}">
                                    <div class="media-body align-self-center">
                                        <div class="title text-instagram">درخواست برداشت</div>
                                        <div class="number">{{ $wallet->withdraw??'0' }}ریال</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <a href="{{ route('sellers.wallets') }}">
                                    <div class="media-body align-self-center">
                                        <div class="title text-instagram">کیف پول تایید شده</div>
                                        <div class="number">{{ $wallet->amount??'0' }}ریال</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Linkedin -->
            </div>


        </div>
        <!-- End Container -->
        <!-- Begin Page Footer-->
    @include('layouts.sellers.footer')
    <!-- End Page Footer -->
        <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
        <!-- Offcanvas Sidebar -->
        <!-- End Offcanvas Sidebar -->
    </div>
    <!-- End Content -->
@endsection
