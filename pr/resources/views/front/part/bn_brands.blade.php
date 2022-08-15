<div class="bn_brands">
    <div class="row">
        <div class="col-md-12">

            <!-- Barand tabs -->
            <ul class="bn_tabs bn_brands_tabs" data-tabgroup="second-tab-group">
                <li><a href="#baddran_brands" class="active" id="private">
                        <div class="bn_brands_title">
                            <h3>برند های اختصاصی </h3>
                        </div>
                    </a></li>
                <li><a href="#other_brands">
                        <div class="bn_brands_title">
                            <h3>برند های همکاران</h3>
                        </div>
                    </a></li>
            </ul>
        @php
            use App\Brand;
            $brand_private = Brand::where('brand_type','private')->get();
            $brandco_worker = Brand::where('brand_type','co_worker')->get();
        @endphp
        <!-- Brands Content tabs -->
            <section id="second-tab-group" class="tabgroup">
                <div class="bn_brands_item" id="baddran_brands">
                    <ul class="bn_brands_slider">

                        @forelse($brand_private as $row)
                            <li><a href="{{ url('/brands/'.$row->slug) }}"><img
                                        src="{{ asset($row->cover) }}" style="width: 140px;height: 110px;" alt="{{ $row->title }}"></a>
                            </li>
                        @empty
                        @endforelse

                    </ul>
                </div>

                <div class="bn_brands_item" id="other_brands">
                    <ul class="bn_brands_slider">
                        @forelse($brandco_worker as $row)
                            <li><a href="{{ url('/brands/'.$row->slug) }}"><img
                                        src="{{ asset($row->cover) }}" style="width: 140px;height: 110px;" alt="{{ $row->title }}"></a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>


            </section>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // $("#private").click(function() {
        //     alert( "Handler for .click() called." );
        // });
    });
</script>
