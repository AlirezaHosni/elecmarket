@extends('front.layouts.design')
@section('content')
<style>
    .c-toggle-box {
        position: relative;
        border: 1px solid #d3d3d3;
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
    }
    c-toggle-box__header {
        font-size: 16px;
        font-size: 1.143rem;
        line-height: 1.375;
        font-weight: 500;
        color: #494949;
        position: relative;
        cursor: pointer;
    }
    c-info-page {
        -webkit-box-shadow: 0 12px 12px 0 hsl(0deg 0% 71% / 11%);
        box-shadow: 0 12px 12px 0 hsl(0deg 0% 71% / 11%);
        background-color: #fff;
        border: 1px solid #dedede;
        margin: 14px auto;
        padding-bottom: 60px;
        line-height: 22px;
    }
    .c-toggle-box.is-active .c-toggle-box__content {
        display: block;
    }

    .c-toggle-box__content {
        display: none;
        font-size: 14px;
        font-size: 1rem;
        line-height: 1.571;
        color: #414141;
    }
    .c-toggle-box__button, .c-toggle-box__button:before {
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }
    .c-toggle-box__button {
        width: 28px;
        height: 28px;
        background-color: rgba(86,199,218,.11);
        color: #56c7da;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        font-size: 16px;
        border-radius: 50%;
        position: absolute;
        left: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        cursor: pointer;
    }
    .accordion-container {
        margin: 0 0 10px;
    }
    .accordion-toggle {
        position: relative;
        display: block;
        padding: 10px;
        font-size: 1.5em;
        font-weight: 300;
        background: #999;
        color: #fff;
        text-decoration: none;
    }
    .accordion-toggle.open,.accordion-toggle:hover {
        background: #333;
    }
    .accordion-toggle span.toggle-icon {
        position: absolute;
        top: 9px;
        right: 20px;
        font-size: 1.5em;
    }
    .accordion-content {
        display: none;
        padding: 20px;
        overflow: auto;
    }
    .c-info-page__show-more-container {
        width: 100%;
        text-align: left;
        padding: 5px 5px 5px 0;
    }
    .c-info-page__show-more {
        font-size: 14px;
        font-size: 1rem;
        line-height: 1.571;
        color: #19bfd3;
        width: 100%;
        padding: 6px 10px 7px 25px;
        position: relative;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <section class="bn_main_section">
                <div class="bn_main_content old">
                
                    <div class="bn_contact">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="accordion">

                                            @forelse($faq as $key => $faqs)
                            

                                            <div class="accordion-container">
                                                <a href="#" class="accordion-toggle"> {{ $faqs->title??''  }}</a>
                                                <div class="accordion-content">
                                                    {{  Str::words($faqs->des, '100') }}
                                                    <div class="c-info-page__show-more-container">
                                                        <a href="{{ url('/faqs/'.$faqs->id) }}" class="c-info-page__show-more">مشاهده توضیحات تکمیلی</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
              
                                    
                            @empty
                                
                            @endforelse
                            
                                        </div>
                                    </div>
                                 
                                
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
<script>
    $(document).ready(function () {
        $('.accordion-toggle').on('click', function(event){
            event.preventDefault();
            // create accordion variables
            var accordion = $(this);
            var accordionContent = accordion.next('.accordion-content');
            
            // toggle accordion link open class
            accordion.toggleClass("open");
            // toggle accordion content
            accordionContent.slideToggle(250);
            
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