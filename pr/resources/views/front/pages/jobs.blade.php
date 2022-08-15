@extends('front.layouts.design')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">

                        @include('layouts.errors')
                        <div class="bn_title">
                            <h3> فرم درخواست همکاری  </h3>
                            <span></span>
                        </div>
                        <div class="bn_contact">
                            <div class="bn_contact_right">
                                <form action="{{ route('jobs') }}" method="POST" id="contactForm" class="appnitro">
                                    @csrf
                                    <div class="bn_rfrr_group">
                                        <label>نام و نام خانوادگي:</label>
                                        <input class="bn_rfrrg_input" type="text" required name="name">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label> سمت  :</label>
                                        <input class="bn_rfrrg_input" type="text" required name="post">
                                    </div>

                                    <div class="bn_rfrr_group">
                                        <label>شماره موبایل:</label>
                                        <input class="bn_rfrrg_input" type="text" required name="phone">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label>شماره تماس:</label>
                                        <input class="bn_rfrrg_input" type="text"  name="tel">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label>ایمیل :</label>
                                        <input class="bn_rfrrg_input" type="email"  name="email">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label> شرکت  :</label>
                                        <input class="bn_rfrrg_input" type="text"  name="company">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label> برند  :</label>
                                        <input class="bn_rfrrg_input" type="text" required name="brand">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label> نوع محصول  :</label>
                                        <input class="bn_rfrrg_input" type="text" required name="product">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label>پیـام شما:</label>
                                        <textarea class="bn_rfrrg_textarea" name="massage" required></textarea>
                                    </div>
                                    <div class="bn_register_buttons bn_contact_form_button">
                                        <button class="bn_button blue bn_contact_form_button">ارسال اطلاعات<i
                                                class="fa fa-long-arrow-left"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="bn_contact_left">
                                <div class="bn_contact_tracking">
                                    <div class="bn_title">
                                        <h3>اطلاعات تماس</h3>
                                    </div>
                                    <ul class="bn_contact_tracking_list">
                                        <li>
                                            <span class="bn_contact_tl_name"><i
                                                    class="fa fa-map-marker"></i>آدرس:</span>
                                            <span class="bn_contact_tl_val">{{ $settings->address??'' }}</span>
                                        </li>
                                        <li>
                                            <span class="bn_contact_tl_name"><i
                                                    class="fa fa-phone"></i>تلفن های تماس:</span>
                                            <span class="bn_contact_tl_val">{{ $settings->tel_header??'' }}</span>
                                        </li>
                                        <li>
                                            <span class="bn_contact_tl_name"><i class="fa fa-fax"></i>شماره فکس:</span>
                                            <span class="bn_contact_tl_val">{{ $settings->tel_header??'' }} </span>
                                        </li>

                                    </ul>
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

