<section class='layerDiscount' style="background: #eaeaea;width: 100%">
    <div class='layerDiscount-left owl-carousel owl-theme' id='layerSwiperone' style="width: 100%">
        @php
        $form = \App\CatReq::latest()->get();
        @endphp
        @forelse($form as $row)
        <div class='productsCard'>
            <div class='productsCard-image' >
                <img src='{{ asset($row->img) }}' style="height: 200px;width: 200px;">
            </div>
             <div class='productsCard-title'><a href="{{ url('/req') }}/{{ $row->slug }}" style="text-align: center">
                     {{ $row->title }}
                 </a></div>
        </div>
        @empty
        @endforelse
        <div class='productsCard productsCard-last'></div>

    </div>
</section>
{{--<section class='layerSwiper'>--}}

{{--    <header class='layerSwiper-header'>--}}
{{--        <span class='title'> درخواست ها</span>--}}
{{--    </header>--}}

{{--    <div id='layer_swiper' class='layerSwiper-body owl-carousel owl-theme owl-theme-digi'>--}}

{{--        <!-- item1 -->--}}
{{--        <div class='productsCard'>--}}
{{--            <div class='productsCard-image'>--}}
{{--                <img src='{{ asset('assets/1.jpg') }}'>--}}
{{--            </div>--}}
{{--            <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>--}}
{{--        </div>--}}

{{--        <!-- item2 -->--}}
{{--        <div class='productsCard'>--}}
{{--            <div class='productsCard-image'>--}}
{{--                <img src='{{ asset('assets/2.jpg') }}'>--}}
{{--            </div>--}}
{{--            <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>--}}
{{--        </div>--}}

{{--        <!-- item3 -->--}}
{{--        <div class='productsCard'>--}}
{{--            <div class='productsCard-image'>--}}
{{--                <img src='{{ asset('assets/3.jpg') }}'>--}}
{{--            </div>--}}
{{--            <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>--}}
{{--        </div>--}}
{{--        <!-- item3 -->--}}
{{--        <div class='productsCard'>--}}
{{--            <div class='productsCard-image'>--}}
{{--                <img src='{{ asset('assets/1.jpg') }}'>--}}
{{--            </div>--}}
{{--            <div class='productsCard-title'><a href="{{ url('/req') }}">درخواست</a></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</section>--}}
<script>
    $(document).ready(function () {
        layer_swiper = $("#layerSwiperone").owlCarousel({
            rtl: true,
             loop: false,
            margin: 10,
            nav: true,
            dots: false,
             autoplay: false,
             autoplayTimout: 0,
            autoplayHoverPause: false,
            responsive: {
                0: {items: 2},
                768: {items: 2},
                1024: {items: 3},
            },
        });

        let matchMedia = window.matchMedia('(max-width: 425px)');
        if (matchMedia.matches == false) {
            layer_swiper.owlCarousel('destroy'); // destroyed
            layer_swiper.owlCarousel({
                rtl: true,
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: false,
                autoplayTimout: 0,
                autoplayHoverPause: false,
                responsive: {
                    0: {items: 2},
                    768: {items: 2},
                    1024: {items: 3},
                },
            });
        }
        layer_swiper.trigger('refresh.owl.carousel');
    });
</script>
