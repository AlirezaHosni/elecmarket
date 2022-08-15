@extends('front.layouts.design')
@section('content')
    <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-sm-12">

                <section class="bn_main_section">
                    <!-- Product Filter -->
                    <div class="bn_shop_filter">
                        <ul class="bn_sf_list">
                            <li>
                                <a href="index.php?page=eshop&amp;sorttype=update">
                                    <span><i class="fa fa-shopping-cart"></i>جستجو در نتایج:{{ $search_product }}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Product List -->
                    <ul class="bn_ptil_list">
                        @forelse($productsAll as $row)
                            @php
                                $link = $row->id."/".$row->slug;
                            @endphp
                            @php
                                if(Auth::check()){
                                     $user_id = Auth::user()->id;
                                $cat_id = $row->category_id;
                                $user = App\User::where('id',$user_id)->first();
                                //$countcat = App\CategoryUser::where(['user_id' => $user_id,'category_id' => $cat_id])->count();
                                //dd($countcat);
                                $checkcat = App\CategoryUser::where(['user_id' => $user_id,'category_id' => $cat_id])->first();
                                //dd($checkcat);
                                if(!@empty($checkcat)){
                                    $countdown = $checkcat->countdown_category??'5';
                                    //dd($countdown);
                                    $totalprice = ($row->price - ($row->price * ($countdown / 100)));
                                }else{
                                    $totalprice = $row->price;
                                }
                                }else{
                                    $totalprice = $row->price;
                                }


                            @endphp
                            <li>
                                <div class="bn_product_item">
                                    <ul class="bn_pi_labels">


                                        <li class="bn_pil_off">
                                            <span class="bn_pil_no">{{ $countdown??'' }}</span><span
                                                class="bn_pil_percent">%</span>
                                        </li>

                                    </ul>
                                    <ul class="bn_pi_icons">
                                        <li><a id="418063" href="javascript:void(0);" class="Favorite"><i
                                                    class="fa fa-heart"></i></a></li>
                                    </ul>
                                    <div class="bn_pi_img">
                                        <div class="bn_pi_details">
                                            <div class="bn_pid_item"><span class="bn_pid_code"><span
                                                        class="bn_pid_text">وضعیت : </span><span
                                                        style="font-family:IRANSans,Yekan">موجود<span></span></span></span>
                                            </div>
                                        </div>

                                        <img src="{{ asset($row->cover) }}"
                                             alt="{{ $row->title }}">
                                    </div>
                                    <div class="bn_pi_content">
                                        <h5>
                                            <a href="{{ url('/product/'.$link) }}">
                                                {{ $row->title }}
                                            </a>
                                            @if($row->show_price=="1")
                                                <div class="bn_pic_price">
                                            <span class="bn_picp_off">{{ $totalprice }}<span
                                                    class="bn_picpo_rls">ریال</span></span>
                                                    @if(!@empty($checkcat->category_id == $cat_id))
                                                        <span class="bn_picp_no">{{ $totalprice }}<span
                                                                class="bn_picpo_rls">ریال</span></span>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="bn_pic_buy ">
                                                <form action="{{ url('add-cart') }}" method="post">
                                                    <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                    <input type="hidden" name="price" value="{{ $totalprice }}">
                                                    @csrf
                                                    <div class="bn_picb_input"><input type="text" name="quantity"
                                                                                      placeholder="1" value="1"
                                                                                      id="i507167"></div>
                                                    <button style=" background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;" class="ordernew" type="submit"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                        @endforelse
                    </ul>

                    <!-- Pagination-->
                    <div class="bn_pagination">
                        <ul class="bn_pagination_list">
                            {{ $productsAll->links() }}

                        </ul>
                    </div>

                </section>
            </div>
        </div>
    </div>
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
