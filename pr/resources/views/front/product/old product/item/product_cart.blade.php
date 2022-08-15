@php
    if (Auth::check()) {
    $cat_id = $productDetails->category_id;
    $user_id = Auth::user()->id;
     $userDetails = App\User::where('id', $user_id)->first();
     $type_identity = $userDetails->type_identity;
    $checkcat = App\CategoryUser::where(['user_id' => $user_id,'category_id' => $cat_id])->first();
     if(!@empty($checkcat)){
          $countdown = $checkcat->discount_category??'5';
                   //dd($countdown);
          $totalprice = ($productDetails->price - ($productDetails->price * ($countdown / 100)));
     }else{
         $totalprice = $productDetails->price;
     }
    }else{
        $totalprice = $productDetails->price;
        $type_identity = "guest";
    }

//dd($type_identity);

@endphp
<div class="c-product__summary">
    <div class="c-product__guarantee">گارانتی :<span>{{ $productDetails->warranty??'' }} </span></div>
    <div class="c-product__delivery" style="padding-bottom: 50px;">
        <div class="delivery-warehouse"><span
                class="c-product__delivery-warehouse--no-lead-time"> @if($productDetails->show_price=="1")
                     <div class="product__delivery price original">قیمت :{{ $totalprice / 10??'' }} تومان</div>
                @endif </span></div>
    </div>

    <div class="c-product__add" style="margin-top: 10px;">
        @if($type_identity=="user")
            <form action="{{ url('add-cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                <input type="hidden" name="price" value="{{ $totalprice??'' }}">
                <input type="hidden" name="quantity" value="1">
                <button style="width: 100%;" class="btn-add-to-cart" type="submit" value="افزودن به سبد خرید">افزودن به
                    سبد
                    خرید
                </button>
            </form>
        @elseif($type_identity=="marketer")
        @elseif($type_identity=="Admin")
        @elseif($type_identity=="guest")
        @else
            <form action="{{ url('/sellers/add-cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                <input type="hidden" name="price" value="{{ $totalprice??'' }}">
                <input type="hidden" name="quantity" value="1">
                <button style="width: 100%;" class="btn-add-to-cart" type="submit" value="افزودن به سبد خرید">افزودن به
                    سبد
                    خرید
                </button>
            </form>
        @endif

    </div>
    <div class="c-product__unfair-price">
        <span>آیا قیمت مناسب‌تری سراغ دارید؟ </span>
        <a class="btn-link-spoiler" href="#">بله</a> | <a class="btn-link-spoiler" href="#">خیر</a>
    </div>
</div>
