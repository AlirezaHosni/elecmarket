@extends('front.layouts.design')
@section('content')
    <style>
        @media only screen and (min-width: 800px) {
            .img-page {
                width: 1024px;
                height: 420px;
                text-align: center;
                margin-right: 5%;
                margin-left: 5%;
            }
        }
        @media only screen and (max-width: 600px) {
            .img-page {
                text-align: center;

                width: 100%;
                height: 50%;
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">

                        @include('layouts.errors')
                        <div class="bn_title">
                            <img class="img-page"  src="{{ asset($cmsPageDatails->cover_path) }}" alt="">
                        </div>
                        <div class="bn_contact">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ $cmsPageDatails->title??'' }}</h3>
                                    <span></span>
                                    <div class="bn_ticketing_paragraph">
                                        {!! $cmsPageDatails->description_short??'' !!}
                                    </div>
                                    <div class="bn_ticketing">
                                        {!! $cmsPageDatails->description??'' !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/front/js/edit.js') }}"></script>
<script src="{{ asset('assets/front/js/scripthome.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/script.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('assets/front/js/main-old.js') }}"></script>
@endsection
@section('links')
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
<script>
    window.jQueryQ = window.jQueryQ || [];
    window.$ = window.jQuery = function () {
        window.jQueryQ.push(arguments);
    }
</script>    
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-2.2.0.min.js') }}"></script>

@endsection
