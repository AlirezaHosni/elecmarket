@extends('front.layouts.design')
@section('content')
    @include("account.orders.style.css")
    <main class="main-cart container">
        <div class="o-page__content">
            <div id="shipping-data">
                @include('layouts.errors')
                <div class="o-headline o-headline--checkout"><span>انتخاب پروسه سفارش  </span></div>
                <section>
                    <div id="address-section">
                        <div id="user-default-address-container" class="c-checkout-contact is-completed">
                            <div class="c-checkout-contact__content">

                                <div class="c-checkout-contact__badge"></div>
                            </div>
                            <p id="change-sh-address" class="c-checkout-contact__location">انتخاب پروسه سفارش </p>

                        </div>
                        <div class="o-headline o-headline--checkout">
                            <span>انتخاب آدرس تحویل سفارش</span>
                        </div>
                        <form action="{{ url('check/sellers') }}" method="post">
                            @csrf
                            <div id="address-section">
                                <div id="user-default-address-container" class="c-checkout-contact is-completed">
                                    <div class="c-checkout-contact__content">
                                        <ul class="c-checkout-contact__items">
                                            <li class="c-checkout-contact__item c-checkout-contact__item--username">
                                                <span>گیرنده : {{ $userProfileDetail->first_name??'' }}  {{ $userProfileDetail->last_name??'' }}</span>
                                                <a href="{{ route('sellers.address') }}"
                                                   class="c-checkout-contact__btn-edit">
                                                    اصلاح آدرس یا ایجاد </a>
                                            </li>
                                            @forelse($address as $row)
                                                <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                    <div
                                                        class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                        <span>استان : {{ $row->province->name }}</span>
                                                    </div>
                                                    <br>
                                                    <div
                                                        class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                        <span>شهر : {{ $row->city->name }}</span>
                                                    </div>
                                                    <br>
                                                    <div
                                                        class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                        <span>شماره تماس : {{ $row->tel }}</span>
                                                    </div>
                                                    <div class="c-checkout-contact__item--message"></div>
                                                    <br> <span class="full-address">نشانی : {{ $row->address }}</span>
                                                    <br>


                                                    <div
                                                        class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                        <span>کد پستی : {{ $row->zip_code }}</span>
                                                    </div>
                                                    <br>

                                                    <div style="display:flex;">
                                                        <label for="" style="flex-basis: 30%;color: green;font-weight: 400">انتخاب آدرس:</label>
                                                        <label class="c-ui-radio c-ui-radio--primary" >
                                                            <input type="radio" class="payment_method"
                                                                   name="address_id" value="{{ $row->id }}"> <span
                                                                class="c-ui-radio__check"></span> </label>
                                                    </div>
                                                    <br>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                        <div class="c-checkout-contact__badge"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="o-headline o-headline--checkout">
                                <span>انتخاب روش حمل و نقل  </span>
                            </div>
                            <div id="address-section">
                                <div id="user-default-address-container" class="c-checkout-contact is-completed">
                                    <div class="c-checkout-contact__content">
                                        <ul class="c-checkout-contact__items">
                                            <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                    <span>حضوری</span>
                                                </div>
                                                <label class="c-ui-radio c-ui-radio--primary">
                                                    <input type="radio" class="payment_method"
                                                           name="transport" value="code"> <span
                                                        class="c-ui-radio__check"></span> </label>
                                            </li>
                                            <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                    <span>پیک</span>
                                                </div>
                                                <label class="c-ui-radio c-ui-radio--primary">
                                                    <input type="radio" class="payment_method"
                                                           name="transport" value="payk"> <span
                                                        class="c-ui-radio__check"></span> </label>
                                            </li>
                                            <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                    <span>تیپاکس</span>
                                                </div>
                                                <label class="c-ui-radio c-ui-radio--primary">
                                                    <input type="radio" class="payment_method"
                                                           name="transport" value="tipax"> <span
                                                        class="c-ui-radio__check"></span> </label>
                                            </li>
                                            <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                    <span>باربری</span>
                                                </div>
                                                <label class="c-ui-radio c-ui-radio--primary">
                                                    <input type="radio" class="payment_method"
                                                           name="transport" value="baar"> <span
                                                        class="c-ui-radio__check"></span> </label>
                                            </li>
                                            <li class="c-checkout-contact__item c-checkout-contact__item--location">
                                                <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                    <span>اتوبوس رانی </span>
                                                </div>
                                                <label class="c-ui-radio c-ui-radio--primary">
                                                    <input type="radio" class="payment_method"
                                                           name="transport" value="bus"><span
                                                        class="c-ui-radio__check"></span> </label>
                                            </li>
                                        </ul>
                                        <div class="c-checkout-contact__badge"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="o-headline o-headline--checkout"><span>خلاصه سفارش</span></div>
                            <div class="c-checkout-price-options">
                                <div class="c-checkout-price-options__form">
                                    <section class="c-checkout-price-options__container">
                                        <div class="c-checkout-price-options__header"><span>بررسی تایید سفارش </span>
                                        </div>
                                        <div class="c-checkout-price-options__content">


                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <input type="hidden" name="cart_id" value="{{ $userCart['0']->id }}">
                                            <input type="hidden" name="total"
                                                   value="{{ $total_orders??'0' }}">

                                            <?php

                                            $getstat = App\Address::where(['user_id' => $user_id])->first();
                                            $panelmarketer = \App\User::where(['username' => $identity])->first();

                                            if(!empty($panelmarketer->type_identity=="marketer")){
                                                $meketer_id = $panelmarketer->id;
                                                $total_porcant = 0;
                                                $total_countdown = 0;
                                                foreach($userCart as $carts){
                                                    $usercat = \App\CategoryUser::where(['user_id' => $meketer_id,'category_id' => $carts->category_id])->get();
                                                   if(count($usercat) > 0 ){
                                                       $product_price = $carts->price;
                                                       foreach ($usercat as $row){
                                                           $category_id = $row->category_id;
                                                           $countdown = $row->countdown_category;
                                                           $countdown_t = $row->countdown_category;
                                                           $countdown = $countdown / 100;
                                                           $price_porcant = $product_price * $countdown;
                                                       }
                                                       $total_porcant += $price_porcant;
                                                       $total_countdown += $countdown_t;
                                                   }else{
                                                       $total_porcant = 5;
                                                       $total_countdown = 5;
                                                   }

                                                }

                                            }

                                            if (empty($getstat)) {
                                                $state = null;
                                            } else {

                                                $state = $getstat->province_id;

                                                $sellers = App\Marketer::where('state_id', $state)->orderby('user_id')->first();
                                                if (empty($sellers)) {
                                                    $seller_id = null;
                                                } else {
                                                    $seller_id = $sellers->user->username;
                                                }
                                                // print_r($sellers);die;
                                            }
                                            $identifiercode = App\User::where(['id' => $user_id])->first()->identifiercode;
                                            ?>
                                            <input type="hidden" name="marketer_parcent_total" value="{{ $total_porcant??'0' }}">
                                            <input type="hidden" name="total_countdown" value="{{ $total_countdown??'0' }}">
                                            <input type="hidden" class="hidden" value="{{ $state }}" name="state">
                                            <input type="hidden" class="hidden" value="{{ $seller_id }}"
                                                   name="seller_id">
                                            <input required type="hidden" name="identifiercode"
                                                   value="{{ $identifiercode }}">

                                            <div class="c-checkout-price-options__row ">
                                                <button type="submit" class="btn-primary">تایید سفارشات و پرداخت
                                                </button>
                                            </div>

                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>
        <div class="c-checkout-shipment__invoice-type">
            <p class="c-checkout-shipment__invoice-type-info"></p>
        </div>
        </div>
        <div class="c-checkout__actions">
            <a href="{{ route('cart') }}" class="btn-link-spoiler">« بازگشت به سبد خرید</a>
        </div>
        </div>

    </main>
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/f/css/reset.css') }}">
@endsection
@section('scripts')
    <script>
        //alert('sdsds');
        $("#stateall").on('change', function () {

            var state_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/get-sellers') }}",
                type: "POST",
                data: {state_id: state_id}
            }).done(function (msg) {
                $("#seller_id").html(msg)
            });
        });
    </script>


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


