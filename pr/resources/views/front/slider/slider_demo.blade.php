@php
    $demo = \App\Product::where('is_demo',1)->latest()->get();
@endphp
<section class='layerDiscount' style="background: #252737; margin: 20px 20px 20px 20px;">
    <div class='layerDiscount-right'>
        <img class='image' src='{{ asset('assets/front/images/unveiling.png') }}'>
    </div>

    <div class='layerDiscount-left owl-carousel owl-theme' id='layer_discountthree'>

        <div id='layer_productsCardLogo' class='productsCard productsCard-logo'>
            <img class='image' src='{{ asset('assets/front/images/unveiling.png') }}'>
        </div>
        @forelse($demo as $key => $row)
            <div class='productsCard'>
                <div class='productsCard-image'>
                    <img src='{{ asset($row->cover) }}'>
                </div>
                <div class='productsCard-title'> {{ $row->title }}</div>
                <div class='productsCard-description'>
                    <i class='fa fa-info-circle'></i>
                    <span>دارای هدیه نقدی</span>
                </div>
                <div class='productsCard-price'>
                    <del>5,000</del>
                    <div class='percent'>50%</div>
                    <div class='price'>{{ $row->price }} <span class='currency'>تومان</span></div>
                </div>
            </div>
        @empty
        @endforelse

        <div class='productsCard productsCard-last'></div>

    </div>
</section>
<script>
    $(document).ready(function () {
        layer_discountthree = $("#layer_discountthree").owlCarousel({
            rtl: true,
            // loop: false,
            margin: 10,
            nav: true,
            dots: false,
            // autoplay: false,
            // autoplayTimout: 0,
            autoplayHoverPause: true,
            responsive: {
                0: {items: 2},
                768: {items: 2},
                1024: {items: 4},
            },
        });

        let matchMedia = window.matchMedia('(max-width: 425px)');
        if (matchMedia.matches == false) {
            document.querySelector(".productsCard-logo").closest(".owl-item").remove();
            document.querySelector(".productsCard-last").closest(".owl-item").remove();
            layer_discountthree.owlCarousel('destroy'); // destroyed
            layer_discountthree.owlCarousel({
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
                    1024: {items: 1},
                },
            });
        }
        layer_discountthree.trigger('refresh.owl.carousel');
    });
</script>

