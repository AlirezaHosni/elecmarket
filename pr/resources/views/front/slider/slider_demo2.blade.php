<div class="row">
    <style>
        .layerSwiper .owl-theme .owl-nav .owl-next {
            float: left !important;
            padding: 10px 0px 10px 0px !important;
            color: #000 !important;
            font-size: 26px;
            font-weight: 700;
            background-color: #fff !important;
            width: 49px !important;
            height: 100px !important;
            box-shadow: 1.5px 0 4px 0 rgba(0, 0, 0, .15);
            border-radius: 0 8px 8px 0;
            text-align: center;
            outline: none;
            transition: all 0.5s;
        }

        .layerSwiper .owl-theme .owl-nav .owl-prev {
            float: right !important;
            padding: 10px 0px 10px 0px !important;
            color: #000 !important;
            font-size: 26px;
            font-weight: 700;
            background-color: #fff !important;
            width: 49px !important;
            height: 100px !important;
            box-shadow: 1.5px 0 4px 0 rgba(0, 0, 0, .15);
            border-radius: 8px 0 0 8px;
            text-align: center;
            outline: none;
            transition: all 0.5s;
        }
    </style>
    <section class='layerSwiper' style="margin-top: 10px;margin-bottom: 10px;">
        @php
            $demo = \App\Product::where('is_demo',1)->latest()->get();
            //dd($demo);
        @endphp
        <header class='layerSwiper-header'>
            <span class='title' style="margin-right: 10%;">  رونمایی محصولات</span>
        </header>
        <div id='layer_swiperdemo' class='layerSwiper-body owl-carousel owl-theme owl-theme-digi'>
            <!-- item1 -->
            @forelse($demo as $key => $row)
                @php
                    $link = $row->id."/".$row->slug;
                @endphp
                <div class='productsCard'>
                    <div class='productsCard-image'>
                        <a href="{{ url('/product/'.$link) }}"><img src='{{ asset($row->cover) }}'>
                        </a>
                    </div>
                    <div class='productsCard-title' style="text-align: center;font-size: 1.4em;"><a
                            href="{{ url('/product/'.$link) }}">{{ $row->title }}</a></div>
{{--                    <div class='productsCard-description' style="text-align: center;font-size: 1.2em;">--}}
{{--                        <i class='fa fa-info-circle'></i>--}}
{{--                        <span>{!! $row->description_short !!} </span>--}}
{{--                    </div>--}}
                    @if($row->show_price=="1")
                        <div class='productsCard-price'>
                            <div class='price'> قیمت محصول :{{ $row->price / 10 }} <span class='currency'>تومان</span></div>
                        </div>
                    @endif
                </div>
            @empty
            @endforelse
            <div class='productsCard productsCard-last'></div>
        </div>

    </section>
    <script>
        $(document).ready(function () {
            //start layer swiper
            layer_swiper = $("#layer_swiperdemo").owlCarousel({
                rtl: true,
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: false,
                autoplayTimout: 0,
                autoplayHoverPause: false,
                responsive: {
                    0: {items: 1},
                    768: {items: 1},
                    1024: {items: 1},
                },
            });

        });
    </script>

</div>

