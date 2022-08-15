<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>داشبورد مدیریت سایت </title>
    @include('layouts.panel.css')

@yield('links')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.panel.navbar')
    @include('layouts.panel.sidebar')
    @yield('content')

</div>
<!-- ./wrapper -->

@include('layouts.panel.javascript')
@yield('scripts')
</body>
</html>
