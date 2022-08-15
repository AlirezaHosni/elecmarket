<div class="bn_news">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="bn_news_container">
                <!-- Latest News-->
                <div class="bn_nc_news">
                    <div class="bn_title">
                        <h3>آخـرین اخبار فروشگاه</h3>
                    </div>
                    <ul class="bn_ncn_list">
                        @forelse($news as $row)
                            <li>
                                <a href="{{ url('/news/'.$row->slug) }}">
                                    <div class="bc_ncnl_date">
                                        <span>{{ $row->title }}</span><span class="bc_ncnld_no">{{ $row->id }}</span>
                                    </div>
                                    <div class="bc_ncnl_text">
                                        <h2>{{ $row->title }}</h2>
                                        <span><i class="fa fa-clock-o"></i>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</span>
                                    </div>
                                </a>
                            </li>
                        @empty

                        @endforelse

                    </ul>
                    <a class="bn_more bn_more_news"
                       href="{{ route('new.all') }}"><span>نمایش همه</span><i
                            class="fa fa-angle-double-left"></i></a>
                </div>

                <!-- Latest Articles-->
                <div class="bn_nc_articles d-xl-none">
                    <div class="bn_title blue">
                        <h3>آخـرین مقالات</h3>
                    </div>
                    <ul class="bn_nca_list">

                        @forelse($article as $row)
                            <li>
                                <a href="{{ url('/articles/'.$row->slug) }}">
                                    <div class="bc_ncnl_date">
                                        <span>{{ $row->title }}</span><span class="bc_ncnld_no">{{ $row->id }}</span>
                                    </div>
                                    <div class="bc_ncnl_text">
                                        <h2>{{ $row->title }}</h2>
                                        <span><i class="fa fa-clock-o"></i>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</span>
                                    </div>
                                </a>
                            </li>
                        @empty

                        @endforelse
                    </ul>
                    <a class="bn_more bn_more_news" href="{{ route('art.all') }}"><span>نمایش همه</span><i
                            class="fa fa-angle-double-left"></i></a>
                </div>

                <!-- Latest Gallery-->
                <div class="bn_nc_gallery d-xl-none">
{{--                    <a class="bn_more bn_more_news no-left" href=""><span>نمایش همه</span><i--}}
{{--                            class="fa fa-angle-double-left"></i></a>--}}

                    <div class="bn_title">
                        <h3>گالری فروشگاه</h3>
                    </div>
                    @php
                        $getgallery = \App\GallerySite::latest()->get();
                    @endphp
                    <style>
                        .bn_gallery{
                            display: block;
                            width: 100%;
                            height: auto;
                            -webkit-border-radius: 4px;
                            -moz-border-radius: 4px;
                            border-radius: 4px;
                        }

                    </style>
                    <div class="bn_gallery" style="background-color: {{ $bgcolor??'#ffffff' }};margin-top: 5%">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="bn_textbox_slider">
                                        @forelse($getgallery as $row)
                                            <li>
                                                <img
                                                    src="{{ asset($row->image??'') }}"
                                                    style="width: 415px;height: 234px;" alt="{{ $row->caption??'' }}">
                                            </li>
                                        @empty
                                            <li>
                                                <img
                                                    src="{{ asset($row->image??'') }}"
                                                    style="width: 415px;height: 234px;" alt="{{ $row->caption??'' }}">
                                            </li>
                                        @endforelse

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

