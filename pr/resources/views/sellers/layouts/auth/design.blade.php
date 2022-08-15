<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Iran licence -->
    <link rel="stylesheet" href="{{ asset('assets/sellers/css/fontiran.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('http://elecmarketing.com/assets/front/images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('http://elecmarketing.com/assets/front/images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('http://elecmarketing.com/assets/front/images/logo.png') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/sellers/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sellers/vendors/css/base/seenboard-1.0.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sellers/css/animate/animate.min.css') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="{{ asset('http://elecmarketing.com/assets/front/images/logo.png') }}" alt="logo" class="loader-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- End Preloader -->
@yield('content')
<!-- Begin Vendor Js -->
<script src="{{ asset('assets/sellers/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/sellers/vendors/js/base/core.min.js') }}"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="{{ asset('assets/sellers/vendors/js/app/app.min.js') }}"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="{{ asset('assets/sellers/js/components/tabs/animated-tabs.min.js') }}"></script>
<!-- End Page Snippets -->
</body>
</html>
