@extends('front.layouts.design')
@section('content')
    <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-sm-12">
                <section class="bn_main_section">
                    <!-- Product List -->
                    <ul class="bn_ptil_list">
                        @forelse($productDetails as $row)
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
                            <li>
                                <div class="bn_product_item">
                                    @if(!@empty($countdown > 0))
                                        <ul class="bn_pi_labels">
                                            <li class="bn_pil_off">
                                                <span class="bn_pil_no">{{ $countdown??'' }}</span><span
                                                    class="bn_pil_percent">%</span>
                                            </li>
                                        </ul>
                                    @else
                                    @endif
                                    <ul class="bn_pi_icons">
                                        <li><a id="418063" href="javascript:void(0);" class="Favorite"><i
                                                    class="fa fa-heart"></i></a></li>
                                    </ul>
                                    <div class="bn_pi_img">
                                        <div class="bn_pi_details">
                                            <div style="display: none" class="bn_pid_item"><span
                                                    class="bn_pid_code"><span
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
                                                    @if($checkcat!=null)
                                                        @if(!@empty($checkcat->category_id == $cat_id))
                                                            <span class="bn_picp_off c-price">{{ $row->price }}<span
                                                                    class="bn_picpo_rls">ریال</span></span>
                                                        @endif
                                                    @endif
                                                    @if($totalprice > 0)
                                                        <span class="bn_picp_no c-price">{{ $totalprice }}
                                                <span class="bn_picpo_rls">ریال</span>
                                                </span>
                                                    @else
                                                    @endif

                                                </div>
                                            @endif
                                        </h5>
                                        @auth
                                            @if($type_identity=="user")
                                                <div class="bn_pic_buy">
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
                                            @elseif($type_identity=="marketer")
                                            @elseif($type_identity=="Admin")
                                            @endif
                                        @endauth

                                        @guest
                                            <div class="bn_pic_buy">
                                                <form action="{{ url('/sellers/add-cart') }}" method="post">
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
                                        @endguest

                                    </div>
                                </div>
                            </li>
                        @empty
                        @endforelse
                    </ul>

                    <!-- Pagination-->
                    <div class="bn_pagination">
                        <ul class="bn_pagination_list">
                            {{ $productDetails->links() }}

                        </ul>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
