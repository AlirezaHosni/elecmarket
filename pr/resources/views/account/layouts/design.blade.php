<!DOCTYPE html>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل کاربری</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--assets/accounts/ -->
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/logo/img.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/logo/img.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/logo/img.png') }}">
    <!-- Stylesheet -->
    <!-- Font Iran licence -->
    <link rel="stylesheet" href="{{ asset('assets/accounts/css/fontiran.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/accounts/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/accounts/vendors/css/base/seenboard-1.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/accounts/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/accounts/css/owl-carousel/owl.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield('links')
</head>
<?php
$settings = App\Setting::first();
?>
<body id="page-top">
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="{{ asset($settings->logo_path??'assets/front/logo/logo.png') }}" alt="logo" class="loader-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- End Preloader -->
<div class="page">

    <!-- Begin Header -->
    @include('account.layouts.header')
    <!-- End Header -->
    <!-- Begin Page Content -->
    <div class="page-content d-flex align-items-stretch">
        @include('account.layouts.sidebar')
        @yield('content')
    </div>
    <!-- End Page Content -->
</div>

<!-- Begin Vendor Js -->
<script src="{{ asset('assets/accounts/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/base/core.min.js') }}"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="{{ asset('assets/accounts/vendors/js/nicescroll/nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/calendar/locale/fa.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/accounts/vendors/js/app/app.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
@yield('scripts')
<!-- End Page Snippets -->
</body>
</html>
