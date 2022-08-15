@extends('front.layouts.design')
@section('content')
    <!-- Main Login-->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="bn_main_login" style="background-color: #fffff5;">
                    @include('layouts.errors')
                    <div class="bn_ml_right" style="">
                        <div class="bn_title">
                            <h3>کد تایید  </h3>
                        </div>
                        <form action="{{ route('otp') }}" method="post" formnum="1"
                              class="appnitro">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $phone }}">
                            <div class="bn_ml_row">

                                <input type="number" required pattern=".{5,}" name="code"  class="bn_mlr_input_text" placeholder="کد تائید">
                            </div>
                            <span style="font-weight: bold;font-size: 1em;text-align: center" id="clock"></span>
                            <div class="bn_ml_row">
                                <input class="bn_button blue bn_ml_submit" value="ارسال" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/jquery.countdown.min.js') }}"></script>
    <script >
        //var date = new Date(new Date().valueOf() + 15 * 24 * 60 * 60 * 1000);
        //alert(date);
        jQuery(function($){
            var fiveSeconds = new Date(new Date().valueOf() + 2 * 60 * 1000);
            //alert(fiveSeconds);
            $('#clock').countdown(fiveSeconds, {elapse: false})
                .on('update.countdown', function(event) {
                    var $this = $(this);
                    if (event.elapsed) {
                        $this.html(event.strftime('<p>زمان باقی مانده :<span style="font-size: 14px;">%M:%S</span></p>'));
                    } else {
                        $this.html(event.strftime('<p>زمان باقی مانده :<span style="font-size: 14px;">%M:%S</span></p>'));
                    }
                })
                .on('finish.countdown', function(event) {
                    $(this).html('<a href="javascript;" onclick="location.reload();">ارسال مجدد  </a>')
                        .parent().addClass('disabled');
                });

            // $('#clock').countdown(date, function(event) {
            //     $(this).html(event.strftime('%M:%S'));
            // });
        });

    </script>
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
