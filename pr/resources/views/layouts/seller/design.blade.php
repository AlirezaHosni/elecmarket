<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>پنل فروشنده x</title>
    @include('layouts.seller.css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.seller.navbar')
    @include('layouts.seller.sidebar')
    @yield('content')

</div>
<!-- ./wrapper -->

@include('layouts.seller.javascript')
</body>
</html>
