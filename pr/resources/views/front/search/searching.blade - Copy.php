@extends('layouts.front.design')
@section('content')
    <section class="search container">
        <div class="o-page__aside">
            <div class="c-listing-sidebar">
                <div class="c-box">
                    <div class="c-box__header">جستجو در نتایج:</div>
                    <p style="text-align: center;
    font-size: 1em;
    color: red;
    font-weight: bold;">{{ $search_product }}</p>
                </div>
                <div class="c-box">
                    <div class="c-filter c-filter--switcher">
                        <span>فقط کالاهای موجود</span>
                        <div class="scroll">
                            <span id="circle">
                                <input id="circle_input" type="checkbox">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="c-box">
                    <div class="c-filter c-filter--switcher">
                        <span>فقط کالاهای آماده ارسال</span>
                        <div class="scroll">
                            <span id="circle">
                                <input id="circle_input" type="checkbox">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="o-page__content">
            <article>
                <nav>
                    <ul class="c-breadcrumb">
                        <li><span>فروشگاه اینترنتی </span></li>
                        <li><span> {{ count($productsAll) }}کالا</span></li>
                    </ul>
                </nav>
                <div class="c-listing">
                    <div class="c-listing__header">
                        <ul class="c-listing__sort" data-label="مرتب‌سازی بر اساس :">
                            <li><span>مرتب سازی بر اساس :</span></li>
                            <li><a href="#" class="is-active">پربازدیدترین</a></li>
                            <li><a href="#">محبوب ترین</a></li>
                            <li><a href="#">جدیدترین</a></li>
                            <li><a href="#">پرفروش ترین</a></li>
                            <li><a href="#">ارزان ترین</a></li>
                            <li><a href="#">گران ترین</a></li>
                        </ul>
                        <ul class="c-listing__type">
                            <li>
                                <button><i class="fa fa-bars"></i></button>
                            </li>
                            <li>
                                <button class="is-active"><i class="fa fa-grip-horizontal"></i></button>
                            </li>
                        </ul>
                    </div>
                    <ul class="c-listing__items">
                        @forelse($productsAll as $row)
                            @php
                                $link = "/showmarket/product/".$row->id."/".$row->slug;
                            @endphp
                            <li>
                                <div class="c-product-box c-promotion-box ">
                                    <a href="{{ $link }}" class="c-product-box__img c-promotion-box__image"><img
                                            src="{{ asset($row->cover) }}" alt=""></a>
{{--                                    <div class="c-product-box__content">--}}
{{--                                        <a href="{{ $link }}" class="title">{{ $row->title }}</a>--}}
{{--                                        <span class="price">{{ $row->price }} تومان</span>--}}

                                    <div class="bn_pi_content">
                                        <h5><a href="{{ $link }}">{{ $row->title }}</a></h5>
                                        <div class="bn_pic_price">

                                            @if($row->show_price=="1")
                                                <span class="bn_picp_no">{{ $row->price }} <span
                                                        class="bn_picpo_rls">تومان</span></span>
                                            @endif
                                        </div>
                                        <div class="bn_pic_buy">
                                            <form action="{{ url('add-cart') }}" method="post">
                                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                <input type="hidden" name="price" value="{{ $row->price }}">
                                                @csrf
                                                <div class="bn_picb_input"><input type="text" name="quantity" placeholder="1" value="1"
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
                    <div class="c-pager">
                        {{ $productsAll->links() }}
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
