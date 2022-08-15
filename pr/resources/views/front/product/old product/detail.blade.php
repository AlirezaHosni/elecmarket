@extends('front.layouts.design')
@section('content')
    @include('front.product.item.style')
    @php
        $gallery = \App\Gallery::where(['product_id' => $productDetails->id ])->get();
    @endphp
    <div class="container">
        <nav class="nav-product-d">
            <ul class="c-breadcrumb" style="margin-right: 10px;">
                <li class="list-item"><a href="#">فروشگاه اینترنتی </a></li>
                <li class="list-item"><a href="#">{{ $productDetails->category->title??'' }} </a></li>
                <li class="list-item"><a href="#"> {{ $productDetails->title }} </a></li>
            </ul>
        </nav>
        <article class="c-product">
            <section class="c-product__info">
                <div class="c-product__headline">
                    <h1 class="c-product__title">
                        <span
                            class="en-title title-pro" >{{ $productDetails->title }}
                        </span>
                    </h1>
                </div>
                <div class="c-product__attributes">
                    <div class="c-product__right">
                        <div class="c-product__directory">
                            <ul>
                                <li><span>برند : </span> <a href="#"
                                                            class="btn-link-spoiler">{{  $productDetails->brand->title??'' }}</a>
                                </li>
                                <li><span>دسته بندی : </span> <a href="#"
                                                                 class="btn-link-spoiler"> {{ $productDetails->category->title??'' }} </a>
                                </li>
                            </ul>
                        </div>
                        <div class="c-product__params">
                            {!!  Str::limit($productDetails->description_short, 150) !!}
                        </div>
                        @if($productDetails->stock <= 0)
                        <div class="c-product__params">
                            موجوی ناکافی
                        </div> 
                        @else
                        <div class="c-product__params">
                           موجودی : {{ $productDetails->stock }}
                        </div> 
                        @endif
                    </div>
                    @include('front.product.item.product_cart')
                </div>
                @include('front.product.item.feature')
            </section>
            <section class="c-product__gallery">
                @include('front.product.item.option')
                @include('front.product.item.gallery')
            </section>
        </article>
        <div style="margin: 15px 0;"></div>
        @include('front.product.item.linked')
        @include('front.product.item.related')
        @include('front.product.item.tabs')

    </div>


@endsection

@section('links')

    
    <link rel="stylesheet" href="{{ asset('assets/f/vendor/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/vendor/slicknav/slicknav.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/f/css/mediaq.css') }}">
    
    <link type="text/css" href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet"/>
    <link type="text/css" href="{{ asset('assets/front/css/media.css') }}" rel="stylesheet"/>
    
    <link type="text/css" href="{{ asset('assets/front/css/old-style.css') }}" rel="stylesheet"/>


    <link type="text/css" href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet"/>

    <link type="text/css" href="{{ asset('assets/front/css/iziModal.min.css') }}" rel="stylesheet"/>


    <script src="{{ asset('assets/front/js/jquery-2.2.0.min.js') }}"></script> 
    
@endsection
@section('scripts')
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>
    <script src="{{ asset('assets/front/js/plugins.js') }}"></script>
    <script>
        jQuery(function () {
            jQuery.each(window.jQueryQ || [], function (i, a) {
                setTimeout(function () {
                    jQuery.apply(this, a);
                }, 0);
            });
        });
    </script>
    <script src="{{ asset('assets/f/vendor/swiper/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/f/vendor/slicknav/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/f/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/f/vendor/elevatezoom.js') }}"></script>
    <script src="{{ asset('assets/f/vendor/persianumber.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/script.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".price").each(function() {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
            var set = 0;
            let matchMedia = window.matchMedia('(max-width: 725px)');
        
        
            //start layer discount
            if (matchMedia.matches == false) {
        
                document.querySelector("#footer-desktop").style.display = 'block';
                document.querySelector("#footer-mobile").style.display = 'none';
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
    
@endsection
