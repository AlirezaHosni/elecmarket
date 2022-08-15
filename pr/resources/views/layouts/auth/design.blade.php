<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.auth.css')
</head>
<body class="hold-transition login-page">
<?php
$settings = App\Setting::first();
?>
<div class="login-box">
    @yield('content')
</div>
<!-- /.login-box -->
@include('layouts.auth.scripts')
</body>
</html>
