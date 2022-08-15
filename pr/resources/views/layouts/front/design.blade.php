<!DOCTYPE html>
<html>
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="revisit-after" content="1 days">
    <meta name="fontiran.com:license" content="">
    <!-- Title -->
    <title> فروشگاه اینترنتی </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.png') }}"/>
    <!-- Shiv -->
    <!--[if lte IE 9]
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Stylesheets -->
    <link type="text/css" href="{{ asset('assets/front/css/normalize.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/grid12.css') }}" rel="stylesheet"/>
    <link rel='stylesheet' href='{{ asset('assets/front/css/owl.carousel.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('assets/front/css/owl.theme.default.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('assets/front/css/owl.theme.css') }}'>
    <link type="text/css" href="{{ asset('assets/front/css/slick-theme.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/slick.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/remodal.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/remodal-default-theme.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/iziModal.min.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/media.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/old-style.css') }}" rel="stylesheet"/>
    <!-- JavaScript -->

    <script type="text/javascript" src="{{ asset('assets/front/js/jquery-2.2.0.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/script.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main-old.js') }}"></script>
    @yield('links')

</head>
<body>
@php
    use App\User;
    $menuheader = \App\Menu::where('menu_type', 'menuheaderright')->take(4)->get();
    $socails = \App\Social::latest()->first();
    if (Auth::check()) {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $userProfileDetails = \App\Profile::with('user')->where('user_id', $user_id)->first();

        // dd($userProfileDetails);
        $userCart = DB::table('carts')->where(['user_id' => $user_id])->get();
        $userDetails = User::where('id', Auth::user()->id)->first();
        //dd($userDetails->type_identity);
        $userCart = DB::table('carts')->where(['user_id' => $user_id])->get();
        $cartCount = \App\Product::cartCount();
        $type_identity = $userDetails->type_identity;
    }else{
        $type_identity = "guest";
    }


    //dd($type_identity);
@endphp



<!-- Start: Main Wrapper -->
<div class="bn_wrapper">
    <nav class="mobilemenu mobilemenu-right">
        <!-- Mobile Menu Search -->
        <form method="post" action="{{ url('/search') }}">
            @csrf
            <div class="bn_mobile_search">
                <input class="bn_ms_input" type="text" name="pcode" required
                       placeholder="کد و یا نام کالا را جستجو کنید...">
                <i class="fa fa-search bn_search_icon"></i>
                <input class="bn_ms_submit" type="submit" value="" tabindex="20">
            </div>
        </form>
        <!-- Mobile Menu Buttons -->
        @if(empty(Auth::check()))
            <div class="bn_mobile_btns">

                <a class="bn_mb_reg" href="{{ route('lgrg') }}">ورود / ثبت نـام</a>

            </div>
        @else
            @if($type_identity=="Admin")
                <div class="bn_mobile_btns">
                    <a class="bn_mb_reg" href="{{ route('ad.dashborad') }}">پنل مدیریت </a>
                </div>
            @elseif($type_identity=="user")
                <div class="bn_mobile_btns">
                    <a class="bn_mb_reg" href="{{ route('account') }}">پنل کاربری </a>
                </div>
            @else
                <div class="bn_mobile_btns">
                    <a class="bn_mb_reg" href="{{ route('sellers.dashborad') }}">پنل فروشندگان </a>
                </div>
        @endif

    @endif
    <!-- Mobile Menu Links -->
        <ul class="bn_mb_nav">
            <li class="bold"><a href="{{ url('complaints') }}"><i class="fa fa-check"></i><span>ثبت نارضایتی</span></a>
            </li>
            <li><a href="{{ route('jobs') }}"><i class="fa fa-home"></i><span>فرم درخواست همکاری </span></a></li>
            <li><a href="{{ url('products') }}"><i class="fa fa-shopping-cart"></i><span>فـروشگاه</span></a>
            </li>
            <li><a href="{{ url('support') }}"><i class="fa fa-phone"></i><span>تمـاس با ما</span></a></li>
            <?php
            $mfooterc = \App\Menu::where('menu_type', 'menufootercatc')->take(5)->get();
            ?>
            @forelse($mfooterc as $row)
                <li><a href="/pages/{{ $row->page->slug??'' }}">{{ $row->title }}   </a></li>
            @empty
            @endforelse
        </ul>
        <!-- Mobile Menu Socials -->
        <ul class="bn_mb_socials">
            <li><a href="{{ $socails->telegram??'' }}" target="_blank" class="bn_mbs_telegram"><i
                        class="fa fa-telegram"></i><span>تلگــرام</span></a></li>
            <li><a href="{{ $socails->instagram??'' }}" target="_blank" class="bn_mbs_instagram"><i
                        class="fa  fa-instagram"></i><span>اینستاگـرام</span></a></li>
        </ul>

    </nav>
    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    @include('layouts.front.header')
    @yield('content')

    {{--    @include('layouts.front.footer')--}}
    <div id="footer-desktop" style="display: block">
        @include('layouts.front.footerdigi3')
    </div>
    <div id="footer-mobile" style="display: none">
        @include('layouts.front.footerdigi2')
    </div>
</div>
@yield('model')
<style>
    .cta-whatsapp-wrapper
    {

        position: fixed;
        bottom:30px;
        right: 10px;
        cursor: pointer;
    }
    .cta-whatsapp-wrapper .img-cta-whatsapp
    {
        width:60px;
        height:60px;
    }
    .cta-whatsapp-wrapper .img-cta-whatsapp img
    {
        width: 100%;
        position: relative;
    }
    .cta-whatsapp-wrapper .img-cta-whatsapp:after
    {
        content: 'فروشگاه اینترنتی الکمارکتینگ';
        width: 150px;
        right:50px;
        top:30%;
        z-index:50000;
        position: absolute;
        background-color:#79ba7d;
        padding:2px 5px;
        border-radius:5px;
        color: #f2faff;
        text-align: center;
    }
    .box-cta-whatsapp-wrapper
    {
        position: fixed;
        background-color:#79ba7e;
        bottom:20px;
        right: 10px;
        width:320px;
        padding: 15px 10px;
        text-align: justify;
        font-size:0.8em;
        border-radius: 4px;
        color: #f2faff;
        display: none;
        opacity: 0.95;
    }
    .box-cta-whatsapp-wrapper h5
    {
        font-size:1.1em !important;
        text-align: center;
        margin:20px 0;
        font-weight: 600;
        color:  #262626;
    }
    .box-cta-whatsapp-wrapper a
    {
        background-color:#f2faff;
        display: block;
        padding:7px;
        text-align: center;
        color:  #262626;
        border-radius: 4px;
        font-size:1.1em;
        font-weight: 600;
    }
    .box-cta-whatsapp-wrapper span
    {
        position: absolute;
        top:10px;
    }
    .box-cta-whatsapp-wrapper span img
    {
        width:30px;
        z-index: 99;
        margin-top:-5px
    }
    .box-cta-whatsapp-wrapper a:hover
    {
        color:#79ba7e;
    }
    body {
        direction: rtl;
    }
</style>
<section class="cta-whatsapp-wrapper">
    <div class="img-cta-whatsapp" style="">
        <img src="{{ asset('assets/img/social/whatsapp.png') }}" alt="لوگوی شبکه اجتماعی واتس آپ">
    </div>
    <div class="box-cta-whatsapp-wrapper" style="display: none;">
        <h5>پشتیبانی آنلاین   الکمارکتینگ از طریق واتساپ</h5>
        <p>جهت سهولت در امر پاسخگویی به شما بازدیدکنندگان گرامی، با راه اندازی پشتیبانی آنلاین، پاسخگوی سوالات شما عزیزان هستیم.</p>
        <p>هرگونه سوال در خصوص محصولات، پکیج های آموزشی و... را ا طریق واتساپ با ما در میان گذارید.</p>
        <a href="https://wa.me/989120938596?text=سلام. وقت بخیر! من از طریق فروشگاه اینترنتی الکمارکتینگ با شما ارتباط میگیرم!" target="_blank">جهت ارسال پیام در واتساپ اینجا کلیک کنید</a>
        <span><img src="{{ asset('assets/img/social/multiply.png') }}" alt=""></span>
    </div>
</section>
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/front/js/edit.js') }}"></script>
@yield('scripts')
<script>
    $(document).ready(function () {
        $(".c-price").each(function() {
            var num = $(this).text();
            var commaNum = numberWithCommas(num);
            $(this).text(commaNum);
        });
        var set = 0;
        // $(window).scroll(function () {
        //     clearTimeout(set);
        //     scrollTop = $(window).scrollTop();
        //     if (scrollTop > 200) {
        //         $('.cg-menu-below').addClass('fixed-header');
        //         set = setTimeout(function () {
        //             $('.cg-menu-below');
        //         }, 2000);
        //     } else {
        //         $('.cg-menu-below').removeClass('fixed-header');
        //     }
        // });
        let matchMedia = window.matchMedia('(max-width: 725px)');


        //start layer discount
        if (matchMedia.matches == false) {

            document.querySelector("#footer-desktop").style.display = 'block';
            document.querySelector("#footer-mobile").style.display = 'none';

            document.querySelector(".productsCard-logo").remove();
        }
        //start layer swiper menu-btn

        if (matchMedia.matches == true) {
            //document.querySelector(".mobilemenu").style.display = 'none';
            document.querySelector(".mobilemenu").style.display = 'block';
            document.querySelector(".mobilemenu").style.visibility = 'visible';
            document.querySelector("#footer-desktop").style.display = 'none';

            document.querySelector("#footer-mobile").style.display = 'block';
            //owl2.owlCarousel('destroy'); // destroyed
        }
    });
    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
</script>
</body>
</html>
