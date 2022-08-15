@extends('front.layouts.design')
@section('content')
    <style>
        @media only screen and (max-width: 769px) {
            .bn_ticketing_select {
                width: 100%;
            }
        }
    </style>
    <!-- Basket-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">
                        <div class="bn_title">
                            <h3>ثبت درخواست ها</h3>
                            <span></span>
                        </div>
                        <div class="bn_ticketing_paragraph">
                            <p>
                                {!! $reqs->body !!}
                            </p>
                        </div>
                        <div class="bn_ticketing">
                            <div class="bn_title ">
                                <h3>
                                    فرم درخواست کاربران
                                </h3>
                            </div>
                            <p class="bn_ticketing_right_paragraph">
                                {!! $reqs->bodyform !!}
                            </p>
                            <form action="{{ url('req/'.$reqs->slug) }}" method="POST" id="form3" dir="rtl">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="bn_ticketing_input" type="text" name="name"
                                               placeholder="نام خانوادگی " class="logintxtbox" isneeded="true"
                                               id="txt15">
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="bn_ticketing_input" type="text" name="tel"
                                               placeholder="شماره تماس  " class="logintxtbox" isneeded="true"
                                               id="txt15">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 pull-right">
                                        <select name="type" id="type" class="bn_ticketing_select">
                                            <option value="">انتخاب نوع درخواست</option>
                                            <option value="prgraming">برنامه نویسی</option>
                                            <option value="new-project">پروژه جدید دارم</option>
                                            <option value="start-project">به یک راه انداز پروژه نیازمندم</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="">متن پیام درخواست</label>
                                    <div class="col-md-12">
                                        <textarea class="bn_ticketing_text" name="massage" id="" cols="30" rows="10" placeholder="...."></textarea>
                                    </div>
                                </div>
                                <br>
                                <button class="bn_button blue bn_ticketing_button" type="submit" id="psformsubmit"
                                        formnum="3" value="نمایش وضعیت">
                                    ارسال
                                </button>
                            </form>
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
