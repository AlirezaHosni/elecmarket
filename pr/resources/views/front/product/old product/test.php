<?php
$link = $row->id . "/" . $row->slug;
if (Auth::check()) {
    $user_id = Auth::user()->id;
    $cat_id = $row->category_id;
    $userDetails = App\User::where('id', $user_id)->first();
    $type_identity = $userDetails->type_identity;
    $checkcat = App\CategoryUser::where(['user_id' => $user_id, 'category_id' => $cat_id])->first();
    if (!empty($checkcat)) {
        $countdown = $checkcat->discount_category ?? '5';
        $totalprice = ($row->price - ($row->price * ($countdown / 100)));
    } else {
        $countdown = 0;
        $totalprice = $row->price;
    }
} else {
    $checkcat = null;
    $countdown = 0;
    $totalprice = $row->price;
}
?>
<button type="submit" class="lnk_view "
        data-minimal_quantity="1">
    خرید
</button>

<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
    <div class="left-block">
        <div class="comments_note">
            <div class="star_content">
                <div style="color:rgba(0,0,0,0.3) ;font-size:14px" class="fa fa-star 1"></div>
                <div style="color:rgba(0,0,0,0.3) ;font-size:14px" class="fa fa-star 1"></div>
                <div style="color:rgba(0,0,0,0.3) ;font-size:14px" class="fa fa-star 1"></div>
                <div style="color:rgba(0,0,0,0.3) ;font-size:14px" class="fa fa-star 1"></div>
                <div style="color:rgba(0,0,0,0.3) ;font-size:14px" class="fa fa-star 1"></div>
            </div>
            <span class="nb-comments">( 0 نظر )</span></div>
        <span class="price-percent-reduction"><b>10% </b> <span class="hoverhide">تخفیف !</span> </span>
        <div class="product-image-container"><a class="product_img_link"
                                                href="#"
                                                title="شارژر همراه ای دیتا مدل PT100" itemprop="url"> <img
                    class="replace-2x img-responsive"
                    src="#"
                    alt="تبلت ترانسفورمر پد ایسوس" title="تبلت ترانسفورمر پد ایسوس" width="160" height="160"
                    itemprop="image"> </a> <a class="quick-view"
                                              href="#"
                                              rel="#"
                                              title="نمایش سریع"> <span><i class="fa fa-arrows-alt"></i></span> </a>
            <div title="تخفیف !" class="content_price" itemprop="offers" itemscope=""
                 itemtype="http://schema.org/Offer"><span itemprop="price"
                                                          class="price product-price"> 93,600 تومان </span>
                <meta itemprop="priceCurrency" content="IRR">
                <span class="old-price product-price"> 104,000 تومان </span> <span
                    class="price-percent-reduction">-10%</span></div>
        </div>
    </div>
    <div class="right-block"><a class="date_upd"><span>تاریخ بروزرسانی : </span> 1395-01-29</a>
        <h3 itemprop="name"><a class="product-name" href="#"
                               title="شارژر همراه ای دیتا مدل PT100" itemprop="url"> شارژر همراه ای دیتا مدل PT100</a>
        </h3>
        <p class="product-desc" itemprop="description"> از محصولات فوق العاده با کیفیت پاناسونیک است که در رده چرخ گوشت
            های سطح بالا قرار دارد. تیغه های استیل ضدزنگ این محصول دست ساز هستند تا بالاترین کارایی را در هنگام چرخ
            نمودن انواع گوشت از خود نشان دهند. قدرت 1500 واتی موتور&nbsp; قادر به تولید یک و نیم...</p>
        <div class="content_price"><span class="price product-price"> 93,600 تومان </span> <span
                class="old-price product-price"> 104,000 تومان </span> <span class="price-percent-reduction">-10%</span>
        </div>
        <div class="button-container"><a class="ajax_add_to_cart_button btn btn-success"
                                         href="#"
                                         rel="nofollow" title="خرید" data-id-product="27" data-minimal_quantity="1">
                <span>خرید</span> </a> <a class="lnk_view btn btn-primary"
                                          href="#" title="مشاهده">
                <span>توضیحات</span> </a> <span class="availability hidden-xs"> <span class="available-now"> <i
                        class="fa fa-check"></i> </span> </span></div>
        <div class="color-list-container"></div>
        <div class="product-flags"><span class="discount">ارزان شد!</span></div>
    </div>
    <div class="functional-buttons clearfix">
        <div class="compare"><a class="add_to_compare" href="#"
                                data-id-product="27">افزودن به مقایسه</a></div>
    </div>
</div>
