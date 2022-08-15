@extends('front.layouts.design')
@section('content')
    @include('account.orders.style.style')
    <div id="center_column" class="center_column col-xs-12 col-lg-12">
        <div class="block row">
            <div class="block_content proz"><h1 id="cart_title" class="page-heading">خلاصه سبد خرید <span
                        class="heading-counter">محتويات سبد خريد شما: <span
                            id="summary_products_quantity">1 محصول</span> </span></h1>
                <p id="emptyCartWarning" class="alert alert-warning unvisible">سبد خرید شما خالی است.</p>
                <div class="cart_last_product">
                    <div class="cart_last_product_header">
                        <div class="left">آخرین محصول اضافه شده</div>
                    </div>
                    <a class="cart_last_product_img" href=""> <img
                            src="#"
                            alt="کیس گیمینگ اچ پی"> </a>
                    <div class="cart_last_product_content"><p class="product-name"><a
                                href="">
                                کیس گیمینگ اچ پی </a></p> <small> <a
                                href="">
                                رنگ : کرم, گارانتی کالا : گارانتی طلایی 2 ساله ال جی </a> </small></div>
                </div>
                <div id="order-detail-content" class="table_block table-responsive">
                    <table id="cart_summary" class="table table-bordered stock-management-on">
                        <thead>
                        <tr>
                            <th class="cart_product first_item">محصول</th>
                            <th class="cart_description item">توضیحات</th>
                            <th class="cart_avail item text-left hidden-sm">موجودی</th>
                            <th class="cart_unit item text-left">قیمت واحد</th>
                            <th class="cart_quantity item text-left">تعداد</th>
                            <th class="cart_total item text-left">مجموع</th>
                            <th class="cart_delete last_item">&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="cart_total_price">
                            <td colspan="3" class="text-left">جمع محصولات</td>
                            <td colspan="2" class="price" id="total_product">11,272,500 تومان</td>
                        </tr>
                        <tr class="cart_total_delivery">
                            <td colspan="3" class="text-left">جمع هزینه حمل</td>
                            <td colspan="2" class="price" id="total_shipping">10,002 تومان</td>
                        </tr>
                        <tr class="cart_total_voucher unvisible">
                            <td colspan="3" class="text-left"> جمع تخفیف ها</td>
                            <td colspan="2" class="price-discount price" id="total_discount"> 0 تومان</td>
                        </tr>
                        <tr class="cart_total_price">
                            <td colspan="3" class="total_price_container text-left"><span>مجموع</span>
                                <div class="hookDisplayProductPriceBlock-price"></div>
                            </td>
                            <td colspan="2" class="price" id="total_price_container"><span id="total_price">11,282,502 تومان</span>
                            </td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr id="product_52_367_0_0" class="cart_item last_item first_item address_0 odd">
                            <td class="cart_product"><a
                                    href=""><img
                                        src="#"
                                        alt="کیس گیمینگ اچ پی"></a></td>
                            <td class="cart_description"><p class="product-name"><a
                                        href="">کیس
                                        گیمینگ اچ پی</a></p> <small class="cart_ref">SKU:AK-5698456</small> <small><a
                                        href="">رنگ:کرم,
                                        گارانتی کالا:گارانتی طلایی 2 ساله ال جی</a></small></td>
                            <td class="cart_avail hidden-sm"><span class="alert alert-success"><i
                                        class="fa fa-check"></i></span></td>
                            <td class="cart_unit" data-title="قیمت واحد">
                                <ul class="price text-left" id="product_price_52_367_0">
                                    <li class="price special-price">11,272,500 تومان</li>
                                    <li class="price-percent-reduction small"> &nbsp;-10%&nbsp;</li>
                                    <li class="old-price">12,525,000 تومان</li>
                                </ul>
                            </td>
                            <td class="cart_quantity text-center"><a rel="nofollow"
                                                                     class="cart_quantity_up btn btn-default button-plus"
                                                                     id="cart_quantity_up_52_367_0_0"
                                                                     href="https://ipresta.ir/idemo/themes/b/sahand/cart?add=1&amp;id_product=52&amp;ipa=367&amp;id_address_delivery=0&amp;token=f32ae0d898239fee91062ff53dc62fdd"
                                                                     title="افزودن"><span><i
                                            class="fa fa-plus"></i></span></a> <input type="hidden" value="1"
                                                                                      name="quantity_52_367_0_0_hidden">
                                <input size="2" type="text" autocomplete="off"
                                       class="cart_quantity_input form-control grey" value="1"
                                       name="quantity_52_367_0_0"> <a rel="nofollow"
                                                                      class="cart_quantity_down btn btn-default button-minus"
                                                                      id="cart_quantity_down_52_367_0_0"
                                                                      href=""
                                                                      title="کاستن"> <span><i
                                            class="fa fa-minus"></i></span> </a></td>
                            <td class="cart_total" data-title="مجموع"><span class="price"
                                                                            id="total_product_price_52_367_0"> 11,272,500 تومان </span>
                            </td>
                            <td class="cart_delete text-center" data-title="حذف">
                                <div><a rel="nofollow" title="حذف" class="cart_quantity_delete" id="52_367_0_0"
                                        href="https://ipresta.ir/idemo/themes/b/sahand/cart?delete=1&amp;id_product=52&amp;ipa=367&amp;id_address_delivery=0&amp;token=f32ae0d898239fee91062ff53dc62fdd"><i
                                            class="fa fa-plus"></i></a></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="cart_navigation overb clearfix"><a
                        href=""
                        class="button btn btn-default standard-checkout button-medium" title="خـرید خود را نهایی کنید"
                        style=""> <span>خـرید خود را نهایی کنید<i class="fa fa-chevron-right right"></i></span> </a> <a
                        href="" class="button-exclusive btn btn-default hidden"
                        title="بازگشت به فروشگاه"> <i class="fa fa-chevron-left"></i>بازگشت به فروشگاه </a></p>
                <div class="clear"></div>
                <div style="clear:both;height:1px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
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