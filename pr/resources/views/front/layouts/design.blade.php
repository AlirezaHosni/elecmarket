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
    <link rel="shortcut icon" href="{{ asset('assets/front/logo/img.jpg') }}"/>
    <!-- Shiv -->
    <!--[if lte IE 9]
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
            <div class="bn_mobile_btns">
                <a class="bn_mb_reg" href="{{ url('/sellers/login') }}">ورود پنل بازاریاب  </a>
            </div>
        @else
            @if($type_identity=="Admin")
                <div class="bn_mobile_btns">
                    <a class="bn_mb_reg" href="{{ route('ad.dashboard') }}">پنل مدیریت </a>
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

    @include('front.layouts.header')
    @yield('content')

    {{--    @include('layouts.front.footer')--}}
    <div id="footer-desktop" style="display: block">
        @include('front.layouts.footerdigi3')
    </div>
    <div id="footer-mobile" style="display: none">
        @include('front.layouts.footerdigi2')
    </div>

</div>
@yield('model')
@include('front.layouts.whatsapp')

@yield('scripts')

</body>
</html>
