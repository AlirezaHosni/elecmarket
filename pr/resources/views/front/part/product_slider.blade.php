<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="bn_products_tabs">
            @php
                use App\Category;
                $category = Category::where('parent_id','0')->get();
                //dd($category);
            @endphp
            <!-- Nav tabs -->

                <ul class="bn_tabs bn_products_tabs product_tabs" data-tabgroup="first-tab-group">
                    @forelse($category as $key => $row)
                        <li><a href="#{{ $row->slug }}"
                               class="@if($key==0) active @endif"><span>{{ $row->title }}</span></a></li>
                    @empty
                    @endforelse
                </ul>


                <!-- Content tabs -->
                <section id="first-tab-group" class="tabgroup">
                    @forelse($category as $row)
                        <div class="bn_pt_item" id="{{ $row->slug }}">

                            <div class="bn_pti_right">
                                <h5>{{ $row->title }} </h5>
                                @php
                                    $subcat = \App\Category::where('parent_id',$row->id)->get();
                                @endphp
                                <ul class="bn_ptir_list">
                                    @forelse($subcat as $rows)
                                        <li><a href="">{{ $rows->title }} </a></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            <div class="bn_pti_left">
                            @php
                                $id = $row->id;
                               $childs = \App\Product::getProductCategoryChilds($id);
                               $childs = $id.','.$childs;
                               $childs = explode(",",$childs);
                               $products = \App\Product::whereIn('category_id', $childs)->get();
                              // $cat = Category::where(['parent_id' => $row->id])->first();

                            @endphp
                            <!-- Product List -->
                                <ul class="bn_ptil_list home">
                                    @if(!@empty($products))
                                        @forelse($products as $row)
                                            <li>
                                                <div class="bn_product_item">
                                                    <ul class="bn_pi_labels">

                                                    </ul>
                                                    <ul class="bn_pi_icons">
                                                        <li><a id="508473" href="javascript:void(0);"
                                                               class="Favorite"><i
                                                                    class="fa fa-heart"></i></a></li>
                                                    </ul>
                                                    <div class="bn_pi_img">
                                                        <div class="bn_pi_details">
                                                            <div class="bn_pid_item"><span class="bn_pid_code"><span
                                                                        class="bn_pid_text">ضریب کالا : </span>1.1</span>
                                                            </div>
                                                            <div class="bn_pid_item"><span class="bn_pid_code"><span
                                                                        class="bn_pid_text">کد کالا : </span>508473</span>
                                                            </div>
                                                            <div class="bn_pid_item"><span class="bn_pid_code"><span
                                                                        class="bn_pid_text">وضعیت : </span><span
                                                                        style="font-family:IRANSans,Yekan">موجود<span></span>
                                                            </div>
                                                        </div>

                                                        <img
                                                            src="{{ asset($row->cover) }}"
                                                            alt="بادی اسپلش Coconut آموس وان">
                                                    </div>
                                                    <div class="bn_pi_content">
                                                        <h5>
                                                            <a href="">{{  $row->title }}</a></h5>
                                                        <span class="bn_pic_desc">با رایحه دلپذیر</span>
                                                        <div class="bn_pic_price">

                                                    <span class="bn_picp_no">{{ $row->price }} <span
                                                            class="bn_picpo_rls">Rls</span></span>
                                                        </div>
                                                        <div class="bn_pic_buy ">


                                                            <a class="ordernew"
                                                               href=""
                                                               id="b508473" title="افزودن به سبد خريد"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                            <div class="bn_picb_input"><input type="text"
                                                                                              placeholder="1"
                                                                                              value="1" id="i508473">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>

                        </div>
                    @empty
                    @endforelse
                </section>


            </div>
        </div>
    </div>
</div>
