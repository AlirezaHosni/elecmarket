@extends('front.layouts.design')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <div class="bn_main_content old">

                        @include('layouts.errors')
                        <div class="bn_title">
                            <h3>گزارش قیمت مناسب‌تر این کالا
                            </h3>
                            <span></span>
                        </div>
                        <div class="bn_contact">
                            <div class="bn_contact_right">
                                <img src="{{ asset($product->cover) }}" class="img-responsive" style="width: 300px;height: 300px;" alt="">
                            </div>
                            <div class="bn_contact_left">
                                <form action="{{ url('/products/reports/price/'.$product->id) }}" method="POST"
                                      id="contactForm" class="appnitro">
                                    @csrf
                                    <input type="hidden" class="hidden" name="pro_id" value="{{ $product->id }}">
                                    <div class="bn_rfrr_group">
                                        <label>این کالا را با چه قیمتی دیده‌اید؟</label>
                                        <input class="bn_rfrrg_input" type="number" name="price">
                                    </div>
                                    <div class="bn_rfrr_group">
                                        <input onchange="valueChanged()" class="is_internet bn_rfrrg_input is_internet"
                                               type="checkbox" id="is_internet"
                                               name="is_internet" value="1">
                                        <label>در فروشگاه اینترنتی دیده‌ام</label>
                                    </div>
                                    <div id="internet" class="internet bn_rfrr_group">
                                        <label>آدرس اینترنتی فروشگاه</label>
                                        <input class="bn_rfrrg_input" id="site" type="text" name="site">
                                    </div>
                                    <div class="nointernet" style="display: none">
                                        <div class="bn_rfrr_group">
                                            <label>نام فروشگاه </label>
                                            <input class="bn_rfrrg_input" type="text" id="name_shop" name="name_shop">
                                        </div>
                                        <div class="bn_rfrr_group">
                                            <select name="province_id" id="province_id" class="bn_rfrrg_input">
                                                @forelse($province as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name??'' }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="bn_register_buttons bn_contact_form_button">
                                        <button class="bn_button blue bn_contact_form_button">ثبت اطلاعات <i
                                                    class="fa fa-long-arrow-left"></i></button>
                                    </div>
                                </form>

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
    <script>
            function valueChanged()
                {
                    if($('.is_internet').is(":checked")){
                    $(".nointernet").show();
                    document.getElementById('site').value = '';
                    $(".internet").hide();
                    }else{
                        $(".internet").show();
                        $(".nointernet").hide();
                        document.getElementById('name_shop').value = '';
                        document.getElementById('province_id').value = '';
                    }
                }




    </script>
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
