<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>داشبورد مدیریت سایت </title>
    @include('admin.layouts.css')
    <link rel="icon" type="image/png" sizes="16x16"
          href="{{ asset('http://elecmarketing.com/assets/front/logo/img.jpg') }}">
@yield('links')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    @yield('content')

</div>
<!-- ./wrapper -->

@include('admin.layouts.javascript')
@yield('scripts')
</body>
</html>
