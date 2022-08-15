<section class="product-wrapper container" style="background: #eaeaea;width: 100%;">
    <div class="headline">
        <h3>محصولات مرتبط</h3>
    </div>
    <div id="pslider" class="swiper-container">
        <div class="product-box swiper-wrapper">
            @forelse($relatedProducts as $row)
                <div class="product-item swiper-slide">
                    <a href="#"><img src="{{ asset($row->cover) }}" alt=""></a> <a class="title" href="#">
                        {{ $row->title }}
                    </a> <span class="price c-price">{{ $row->price }} ریال</span>
                </div>
            @empty
            @endforelse
        </div>
        <div id="pslider-nbtn" class="slider-nbtn swiper-button-next"></div>
        <div id="pslider-pbtn" class="slider-pbtn swiper-button-prev"></div>
    </div>
</section>
