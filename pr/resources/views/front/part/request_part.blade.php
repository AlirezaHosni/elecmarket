{{--<div class="row">--}}
{{--    <!-- IconBox-->--}}
{{--    <div class="col-md-12">--}}
{{--        <div class="bn_news_container">--}}

{{--            <div class="col-md-8 col-md-offset-2">--}}

{{--                <div class="bn_title" style="margin-bottom: 50px;">--}}
{{--                    <h3>درخواست ها: </h3>--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="text-align: center">--}}
{{--                    <a href="{{ url('/req') }}">--}}
{{--                        <img src="{{ asset('assets/1.jpg') }}" class="text-center card-img" alt=""--}}
{{--                             style="width: 300px;height: 300px;">--}}
{{--                    </a>--}}

{{--                </div>--}}

{{--                <div class="col-md-4 " style="text-align: center">--}}
{{--                    <a href="{{ url('/req') }}">--}}
{{--                        <img src="{{ asset('assets/2.jpg') }}" class="text-center card-img" alt=""--}}
{{--                             style="width: 300px;height: 300px;">--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--                <div class="col-md-4" style="text-align: center">--}}
{{--                    <a href="{{ url('/req') }}">--}}
{{--                        <img src="{{ asset('assets/3.jpg') }}" class="text-center card-img" alt=""--}}
{{--                             style="width: 300px;height: 300px;">--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        --}}
{{--    </div>--}}
    <!-- layerSwiper -->
    <section class='layerSwiper'>

        <header class='layerSwiper-header'>
            <span class='title'> درخواست ها</span>
        </header>

        <div id='layer_swiper' class='layerSwiper-body owl-carousel owl-theme owl-theme-digi'>

            <!-- item1 -->
            <div class='productsCard'>
                <div class='productsCard-image'>
                    <img src='{{ asset('assets/1.jpg') }}'>
                </div>
                <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>
            </div>

            <!-- item2 -->
            <div class='productsCard'>
                <div class='productsCard-image'>
                    <img src='{{ asset('assets/2.jpg') }}'>
                </div>
                <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>
            </div>

            <!-- item3 -->
            <div class='productsCard'>
                <div class='productsCard-image'>
                    <img src='{{ asset('assets/3.jpg') }}'>
                </div>
                <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>
            </div>
            <!-- item3 -->
            <div class='productsCard'>
                <div class='productsCard-image'>
                    <img src='{{ asset('assets/1.jpg') }}'>
                </div>
                <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>
            </div>
        </div>

    </section>


<script>
    $(document).ready(function () {
        //start layer swiper
        layer_swiper = $("#layer_swiper").owlCarousel({
            rtl: true,
            // loop: false,
            margin: 10,
            nav: true,
            dots: false,
            // autoplay: false,
            // autoplayTimout: 0,
            autoplayHoverPause: true,
            responsive: {
                0: {items: 1},
                768: {items: 1},
                1024: {items: 3},
            },
        });

    });
</script>
