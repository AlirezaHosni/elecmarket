@extends('front.layouts.design')
@section('content')
    <style>
        ol {
            line-height: 35px;
            text-align: right;
        }

        .allert-in {
            height: auto;
        }

        .bn_rfrr_group > .bn_rfrrg_input {
            padding: 8px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">
                        <!-- Progress-->
                        <div class="bn_title">
                            <h3 style="color: red;font-size: 1.5em;"> ثبت نام (لطفا با دقت اطلاعات خود را وارد
                                کنید)</h3>
                            <span></span>
                        </div>
                        <p>&nbsp;</p>

                        <div class="bn_register_form">
                            <form action="{{ route('register') }}" method="POST" id="signupform"
                                  onsubmit="return doSignUp();">
                                @csrf
                                <div class="bn_rf_row">
                                    <div class="bn_title">
                                        <h3>کد معرف (بسیار مهم) </h3>
                                        <span></span>
                                    </div>
                                    <div class="bn_rfr_right">
                                        <div class="bn_rfrr_group">
                                            <label>کد معرف(اجباری) :</label>
                                            <input class="bn_rfrrg_input" id="donator" type="text" name="donator"
                                                   value="" required>

                                        </div>
                                        <div class="bn_ml_row">
                                            <a class="bn_button blue bn_ml_submit" id="clickdonator" value="تایید "
                                               type="submit">
                                                تایید
                                            </a>
                                        </div>
                                        <div class="bn_rfrr_group">
                                            <span id='alert' style="text-align: center;
    margin-top: 20%;
    margin-right: 10%;"></span>
                                        </div>
                                    </div>
                                    <div class="bn_rfr_left">
                                    </div>
                                </div>
                                <div class="checkmarf" style="display: none">
                                    <div class="bn_rf_row">
                                        <div class="bn_title">
                                            <h3>مشخصات کاربری</h3>
                                            <span></span>
                                        </div>
                                        <div class="bn_rfr_right">
                                            <div id="showdonator">

                                            </div>
                                            {{--                                            <div class="bn_rfrr_group">--}}
                                            {{--                                                <label>کد معرف(اجباری) :</label>--}}
                                            {{--                                                <input class="bn_rfrrg_input" type="text" id="donator" name="donator"--}}
                                            {{--                                                       value="" required>--}}
                                            {{--                                                <span id='alert' style="text-align: center;--}}
                                            {{--    margin-top: 20%;--}}
                                            {{--    margin-right: 10%;"></span>--}}

                                            {{--                                            </div>--}}


                                        </div>
                                        <div class="bn_rfr_left">
                                        </div>
                                    </div>

                                    <div class="bn_rf_row">
                                        <div class="bn_title">
                                            <h3>مشخصات فردی</h3>
                                            <span></span>
                                        </div>
                                        <div class="bn_rfr_right">
                                            <div class="bn_rfrr_group">
                                                <label>نام:</label>
                                                <input class="bn_rfrrg_input" id="c01" type="text" name="name" value=""
                                                       required>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>نام خانوادگي:</label>
                                                <input class="bn_rfrrg_input" id="c02" type="text" name="lname" value=""
                                                       required>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>نام پدر:</label>
                                                <input class="bn_rfrrg_input" id="c03" type="text" name="fname" value=""
                                                       required>
                                            </div>
                                        </div>
                                        <div class="bn_rfr_left">
                                            <div class="bn_rfrr_group">
                                                <label>شماره شناسنامه:</label>
                                                <input class="bn_rfrrg_input" id="c03" type="text" name="idNum" value=""
                                                >
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>تاریخ تولد</label>
                                                <input class="bn_rfrrg_input tavalodRooz" type="text" id=""
                                                       name="tavalodRooz" value="" required>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>جنسیت</label>
                                                <select class="bn_rfrrg_select" id="jensiyat_comb" size="1" name="jens"
                                                        required>
                                                    <option value="man">مــرد</option>
                                                    <option value="woman">زن</option>
                                                </select>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>رمز ورود:</label>
                                                <input class="bn_rfrrg_input" id="password" type="password"
                                                       name="password"
                                                       value="" required>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>تکرار رمز ورود:</label>
                                                <input class="bn_rfrrg_input" id="confirm_password" type="password"
                                                       name="password"
                                                       value="" required
                                                       style="margin-bottom: 5%; background-size: 16px 18px; background-position: left center;">
                                                <span id='message' style="text-align: center;
                                                margin-top: 20%;
                                                margin-right: 10%;"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bn_rf_row">
                                        <div class="bn_title">
                                            <h3>کد ملی</h3>
                                            <span></span>
                                        </div>
                                        <div class="bn_rfr_right">
                                            <div class="bn_rfrr_group" id="codemeli">
                                                <label>کد ملی:</label>
                                                <input class="bn_rfrrg_input check-num" id="codeMeli" type="text"
                                                       name="codeMeli" value="" maxlength="10" required>
                                            </div>
                                        </div>
                                        <div class="bn_rfr_left">
                                            <div class="bn_pf_notice">
                                                <i class="fa fa-exclamation-circle"></i>
                                                <span>نکته مهم</span>
                                                <p>
                                                    کد ملی مهمترین بخش ثبت نام است. در صورتی که کد ملی وارد شده با
                                                    مشخصات
                                                    واقعی شما همخوانی نداشته باشد ، در فعالیت شما اختلال جدی بوجود آمده
                                                    و
                                                    حساب شما حذف خواهد شد.پس از ثبت نام کد ملی به هیچ عنوان قابل تغییر
                                                    نمیباشد
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bn_rf_row">
                                        <div class="bn_title">
                                            <h3>مشخصه ارتباطی</h3>
                                            <span></span>
                                        </div>
                                        <div class="bn_rfr_right">
                                            <div class="bn_rfrr_group" id="ostan">

                                                <label>استان:</label>
                                                <select class="bn_rfrrg_select" id="province" size="1" name="province"
                                                        required>
                                                    <option value="0">-- انتخاب استان --</option>
                                                    @forelse($province as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>


                                            </div>
                                            <div class="bn_rfrr_group" id="cityis">
                                                <label>شهـر:</label>
                                                <select class="bn_rfrrg_select" id="city" size="1" name="city" required>
                                                    <option selected="selected" style="display: none;"></option>
                                                </select>
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>کد پستی:</label>
                                                <input class="bn_rfrrg_input" id="c02" type="text" name="pobox" value=""
                                                >
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>آدرس:</label>
                                                <textarea class="bn_rfrrg_textarea" placeholder="آدرس دقیق" id="c03"
                                                          name="address" required></textarea>
                                            </div>
                                        </div>
                                        <div class="bn_rfr_left">
                                            <div class="bn_rfrr_group">
                                                <label>تلفن ثابت:</label>
                                                <input class="bn_rfrrg_input" id="c02" type="text" name="tel" value=""
                                                >
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>تلفن همراه:</label>
                                                <input class="bn_rfrrg_input" id="cellphone" type="text"
                                                       name="cellPhone"
                                                       value="" required maxlength="11">
                                            </div>
                                            <div class="bn_rfrr_group">
                                                <label>ایمیــل:</label>
                                                <input class="bn_rfrrg_input" id="email" type="text" name="email"
                                                >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="bn_register_buttons">
                                        <input type="submit" class="bn_button blue bn_br_next"
                                               value="تایید و ارسال اطلاعات"
                                               name="submit" id="btnfinal"><i class="fa fa-long-arrow-left"></i>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <noscript>
                            "جاوا اسکریپت فعال نمی باشد.";

                        </noscript>
                        <script>

                            $("#city_comb option").hide();
                            $("#ostan_comb option").filter(function () {
                                return this.text == "";
                            }).attr("selected", "true");
                            $("#city_comb option").filter(function () {
                                return this.text == "";
                            }).attr("selected", "true");
                            $("#jensiyat_comb option").filter(function () {
                                return this.value == "";
                            }).attr("selected", "true");
                        </script>


                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
@section('links')
    <link href="{{url('assets/css/persian-datepicker.min.css')}}" rel="stylesheet"/>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ url('assets/js/persian-date.min.js')}}"></script>
    <script>
        $('.tavalodRooz').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>
    <script>
        $("#province").on('change', function () {
            var province_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/get-city') }}",
                type: "POST",
                data: {province_id: province_id}
            }).done(function (msg) {
                $("#city").html(msg)
            });
        });
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('پسورد تایید شد').css('color', 'green');
            } else
                $('#message').html('پسورد را به درستی وارد نکرده اید').css('color', 'red');
        });
        $('#clickdonator').on('click', function () {
            var donator = $('#donator').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/checkdonator') }}",
                type: "POST",
                data: {donator: donator}
            }).done(function (msg) {
                if (msg == "true") {
                    $("#alert").html('کد معرف به درستی وارد شد لطفا تمامی مقادیر را پر کنید').css('color', 'green');
                    document.querySelector(".checkmarf").style.display = 'block';
                } else {
                    $('#alert').html('لطفا با دقت کد معرف را وارد کنید').css('color', 'red');
                    document.querySelector(".checkmarf").style.display = 'none';
                    //
                }
                //alert(msg);

            }).fail(function (msg) {
                //$('#alert').html('پسورد را به درستی وارد نکرده اید').css('color', 'red');
            });

        });
        $('#clickdonator').on('click', function () {
            var donator = $('#donator').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/showdonator') }}",
                type: "POST",
                data: {donator: donator}
            }).done(function (msg) {
                $("#showdonator").html(msg);
                // $.each(msg, function(i,val) {
                //     $(document).find('#showdonator').append($("<span></span>").text(val.username).val(val.id));
                // });
                //alert(msg);
                //     $('#showdonator').html('');
                //     $.each(msg, function(i,val) {
                //         $(document).find('#showdonator').append($("#showdonator").text(val.username).val(val.id));});
                // });
                //$("#showdonator").val(msg);
                // if(msg=="true"){
                //    //$("#alert").html('کد معرف به درستی وارد شد لطفا تمامی مقادیر را پر کنید').css('color', 'green');
                //     //document.querySelector(".checkmarf").style.display = 'block';
                // }else{
                //     //$('#alert').html('لطفا با دقت کد معرف را وارد کنید').css('color', 'red');
                //     //document.querySelector(".checkmarf").style.display = 'none';
                //     //
                // }
                //alert(msg);

            }).fail(function (msg) {
                //$('#alert').html('پسورد را به درستی وارد نکرده اید').css('color', 'red');
            });
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
