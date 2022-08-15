<div class="row">
    <section class='layerDiscount'>

        <div class='layerDiscount-right'>
            <img class='image' src='{{ asset('assets/front/images/amazing.png') }}'>
        </div>

        <div class='layerDiscount-left owl-carousel owl-theme' id='layer_discountamazing'>

            <div id='layer_productsCardLogo' class='productsCard productsCard-logo'>
                <img class='image' src='{{ asset('assets/front/images/amazing.png') }}'>

            </div>
            @php
                $time = Carbon\Carbon::now();
                $amazong = \App\Discount::where('created_at', '<', $time)->latest()->get();
            @endphp
            @forelse($amazong as $key => $row)
                @if(!@empty($row->product))
                    @php

                        $slug = \App\Library\Helper::slugfix($row->product->title);
                        $idP  = $row->product->id;
                        $link = $idP."/".$slug;
                    @endphp
                    <div class='productsCard'>
                        <div class='productsCard-image'>
                            <a href="{{ url('/product/'.$link) }}">
                                <img src='{{ asset($row->product->cover) }}'>
                            </a>

                        </div>
                        <div class='productsCard-title'><a href="{{ url('/product/'.$link) }}">{{ $row->product->title }}</a></div>
                        <div class='productsCard-description'>
                            <i class='fa fa-info-circle'></i>
                            <span>گارنتی : {{ $row->product->warranty??'' }}  </span>
                        </div>
                        @if($row->special_type=="Percentage")
                            <div class='productsCard-price'>
                                <del class="price">{{ round($row->product->price / 10) }} <span class='currency'>تومان</span> </del>

                                <div class='percent'>{{ $row->discount }}%</div>
                                <div class='price'>{{ round(( $row->product->price - ($row->product->price * ($row->discount / 100))) / 10)  }} تومان</div>
                            </div>
                        @else
                            <div class='productsCard-price'>
                                <del class="price">{{ $row->product->price / 10 }} <span class='currency'>تومان</span> </del>
                                <div class='percent'>{{ $row->discount }}ریال</div>
                                <div class='price c-price'>{{ round(($row->product->price - $row->discount) / 10) }} تومان</div>
                            </div>
                        @endif
                        <div class='productsCard-amazing'>
                            <div class='timer'>
                                <i class='fa fa-clock-o'></i>
{{--                                <span id="clock">{{ \Carbon\Carbon::now()->lt($row->time_special) ? $row->time_special : 'پایان' }}</span>--}}
                                <span id="clock"></span>
{{--                                <span id="clock">{{ \Carbon\Carbon::now()->lt($row->time_special) ? Morilog\Jalali\Jalalian::forge($row->time_special)->format("Y-m-d H:i:s") : 'پایان' }}</span>--}}
                            </div>
                        </div>
                        <script src="{{ asset('assets/front/js/jquery.countdown.min.js') }}"></script>

                        <script>
                            // Set the date we're counting down to
                            var countDownDate = new Date("{{ $row->time_special }}").getTime();

                            // Update the count down every 1 second
                            var x = setInterval(function() {

                                // Get today's date and time
                                var now = new Date().getTime();

                                // Find the distance between now and the count down date
                                var distance = countDownDate - now;

                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                // Output the result in an element with id="demo"
                                document.getElementById("clock").innerHTML = days + "d " + hours + ":"
                                    + minutes + ":" + seconds;

                                // If the count down is over, write some text
                                if (distance < 0) {
                                    clearInterval(x);
                                    console.log('پایان');
                                    document.getElementById("clock").innerHTML = "پایان";
                                }
                            }, 1000);
                        </script>
                    </div>
                @endif
            @empty
            @endforelse

            <div class='productsCard productsCard-last'></div>

        </div>
    </section>
    <script>
        $(document).ready(function () {
            layer_discountamazing = $("#layer_discountamazing").owlCarousel({
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
                    1024: {items: 4},
                },
            });

            let matchMedia = window.matchMedia('(max-width: 425px)');
            if (matchMedia.matches == false) {
                document.querySelector(".productsCard-logo").closest(".owl-item").remove();
                document.querySelector(".productsCard-last").closest(".owl-item").remove();
                layer_discountamazing.owlCarousel('destroy'); // destroyed
                layer_discountamazing.owlCarousel({
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
                        1024: {items: 4},
                    },
                });
            }
            layer_discountamazing.trigger('refresh.owl.carousel');
        });
    </script>

</div>
