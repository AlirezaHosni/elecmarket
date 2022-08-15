@extends('front.layouts.design')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">

                        @include('layouts.errors')
                        <div class="bn_title">
                            <h3> فرم ثبت نارضایتی </h3>
                            <span></span>
                        </div>
                        <div class="bn_contact">
                            <div class="bn_contact_right">
                                <form action="{{ url('complaints') }}" method="POST" id="contactForm" class="appnitro">
                                    @csrf
                                    <div class="bn_rfrr_group">
                                        <label>نام و نام خانوادگي:</label>
                                        <input class="bn_rfrrg_input" type="text" required name="name">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <label>شماره موبایل:</label>
                                        <input class="bn_rfrrg_input" type="text" required name="tel">
                                    </div>

                                    <div class="bn_rfrr_group">
                                        <label>لطفا نارضایتی خود را مشخص کنید</label>
                                        <select class="bn_rfrrg_select half" name="type" required>
                                            <option value="نارضایتی فروشنده از فروشنده" selected>نارضایتی فروشنده از فروشنده</option>
                                            <option value="نارضایتی مشتری از نماینده " selected>نارضایتی مشتری از نماینده  </option>
                                            <option value="نارضایتی از کیفیت محصول">نارضایتی از کیفیت محصول</option>
                                            <option value="نارضایتی از گارانتی و خدمات">نارضایتی از گارانتی و خدمات</option>
                                            <option value="انتقاد و پیشنهاد به مدیر">انتقاد و پیشنهاد به مدیر</option>
                                        </select>
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
                                <div style="margin-bottom: 50px;" class="bn_title">
                                    <h3> کد رهگیری را وارد کنید   </h3>
                                    <span></span>
                                </div>
                                <form style="margin-top: 50px;" action="{{ url('checkrahgiri') }}" method="POST" id="contactForm" class="appnitro">
                                    @csrf
                                    <div class="bn_rfrr_group">
                                        <label> کد رهگیری  :</label>
                                        <input class="bn_rfrrg_input" type="text" required name="rahgiri">
                                    </div>
                                    <div class="bn_register_buttons bn_contact_form_button">
                                        <button class="bn_button blue bn_contact_form_button">ارسال <i
                                                class="fa fa-long-arrow-left"></i></button>
                                    </div>
                                </form>
                                <span>
                                    @include('layouts.errors')
                                </span>
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
                                            <span class="bn_contact_tl_val">{{ $settings->tel_header??'' }} </span>
                                        </li>
                                        <li>
                                            <span class="bn_contact_tl_name"><i class="fa fa-fax"></i>شماره فکس:</span>
                                            <span class="bn_contact_tl_val">{{ $settings->tel_header??'' }}</span>
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
