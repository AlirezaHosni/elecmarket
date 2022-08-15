
<!-- Header -->
<header class="bn_header cg-menu-below" style="z-index: 1000;">
    <!-- Top Header -->
    <div class="bn_top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="bn_date">
                        <span>{{ Verta('now')->format('%d %B %Y H:i') }}</span>
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <ul class="bn_top_nav">
                        @forelse($menuheader as $row)
                            <li class="bold"><a href="{{ url('/pages/') }}/{{ $row->page->slug }}"><i
                                        class="fa fa-check"></i><span>{{ $row->title }} </span></a></li>
                        @empty
                        @endforelse

                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="bn_icon_nav">
                        <li><a href="{{ route('jobs') }}"><i class="fa fa-home"></i><span>فرم درخواست همکاری </span></a>
                        </li>
                        <li><a href="{{ url('products') }}"><i class="fa fa-shopping-cart"></i><span>فـروشگاه</span></a>
                        </li>
                        <li><a href="{{ url('support') }}"><i class="fa fa-phone"></i><span>تمـاس با ما</span></a></li>
                        <li><a href="{{ url('complaints') }}"><i class="fa fa-comment"></i><span>ثبت نارضایتی</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="bn_main_header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="menu-btn"><i class="fa fa-bars"></i></div>
                    @if($type_identity=="user")
                    <div id="cart">
                        <a class="bn_basket_btn" href="{{ route('cart') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="basket_btn_text">
                                <span class="basket_btn_name">سبد خرید</span>
                                <span class="basket_btn_no"></span>
                                @if(empty(Auth::check()))
                                    <span class="basker_btn_item">0</span>
                                @else
                                    <span class="basker_btn_item">{{ $cartCount }}</span>
                                @endif
                            </div>
                        </a>

                    </div>
                    @elseif($type_identity=="guest")
                        <div id="cart">
                            <a class="bn_basket_btn" href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <div class="basket_btn_text">
                                    <span class="basket_btn_name">سبد خرید</span>
                                    <span class="basket_btn_no"></span>
                                    @if(empty(Auth::check()))
                                        <span class="basker_btn_item">0</span>
                                    @else
                                        <span class="basker_btn_item">{{ $cartCount }}</span>
                                    @endif
                                </div>
                            </a>

                        </div>
                    @elseif($type_identity=="marketer")
                    @else
                        <div id="cart">
                            <a class="bn_basket_btn" href="{{ route('sellers.cart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <div class="basket_btn_text">
                                    <span class="basket_btn_name">سبد خرید</span>
                                    <span class="basket_btn_no"></span>
                                    @if(empty(Auth::check()))
                                        <span class="basker_btn_item">0</span>
                                    @else
                                        <span class="basker_btn_item">{{ $cartCount }}</span>
                                    @endif
                                </div>
                            </a>

                        </div>
                    @endif
                    @if(empty(Auth::check()))
                        <a class="bn_button orange bn_reg_btn " href="{{ route('lgrg') }}">ورود / ثبت نـام</a>
                    @else
                        @if($type_identity=="Admin")
                            <a class="bn_button orange hidden-xs" href="{{ route('ad.dashborad') }}">پنل مدیریت </a>
                        @elseif($type_identity=="user")
                            <a class="bn_button orange hidden-xs" href="{{ route('account') }}">پنل کاربری </a>
                        @else
                            <a class="bn_button orange hidden-xs" href="{{ route('sellers.dashborad') }}">پنل فروشندگان </a>
                        @endif
                    @endif
                        <form method="post" action="{{ url('/search') }}" class="bn_header_search">
                            @csrf
                            <input type="hidden" name="page" value="eshop">
                            <input type="hidden" name="showall" value="1">
                            <input class="bn-search-input" type="text" name="pcode" required
                                   placeholder="کد و یا نام کالا را جستجو کنید...">
                            <i class="fa fa-search bn-search-icon"></i>
                            <input class="bn-search-submit" type="submit" value="" tabindex="20">
                        </form>
                </div>
                <div class="col-md-3">
                    <a class="logo" style="height: 60px" href="{{ url('/') }}"><img width="200"
                                                                                    src="{{ asset($settings->logo_path??'assets/front/images/logo.png') }}"
                                                                                    alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bn_main_menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="bn_header_social">
                        <li><a href="{{ $socails->instagram??'' }}" target="_blank" tooltip="اینساگرام" flow="down"><i
                                    class="bn_social_instagram"></i></a></li>
                        <li><a href="{{ $socails->telegram??'' }}" target="_blank" tooltip="تلگـرام" flow="down"><i
                                    class="bn_social_telegram"></i></a></li>
                    </ul>
                    <div class="bn_header_call">
                        <i class="fa fa-phone"></i>
                        <span class="bn_call_name">تلفن تماس: </span>
                        <span class="bn_call_text">{{ $settings->tel_header??'' }}</span>
                    </div>
                    @include('layouts.front.part.cat')
                </div>
            </div>
        </div>
    </div>

</header>

