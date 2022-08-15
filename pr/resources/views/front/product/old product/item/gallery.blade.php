<div class="c-gallery">
    <div class="c-gallery__item">
        <ul id="product__option" class="c-gallery__options">
            <li>
                <button class="btn-option btn-option--add-to-wish"></button>
            </li>
            <li>
                <button class="btn-option btn-option--social"></button>
            </li>

            <li>
                <button class="btn-option btn-option--stats"></button>
            </li>
        </ul>

        <div class="c-gallery__img"><img src="{{ asset($productDetails->cover) }}" class="xzoom" alt="">
        </div>
    </div>
    <ul class="c-gallery__items">
        <li>
            <a href="#" onclick="return false;" data-toggle="modal" data-target="#product-gallery">
                <img style="height: 50px;width: 50px" src="{{ asset($productDetails->cover) }}">
            </a>
        </li>
        @forelse($gallery as $row)
            <li>
                <a href="#" onclick="return false;" data-toggle="modal" data-target="#product-gallery">
                    <img style="height: 50px;width: 50px" src="{{ asset($row->path.$row->image) }}">
                </a>
            </li>
        @empty
        @endforelse
    </ul>
</div>
