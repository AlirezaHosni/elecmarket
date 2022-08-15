@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش محصولات </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش محصولات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row ">
        </div>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                @include('layouts.errors')
                <form method="post" action="{{ url('/ad/products/edit/'.$products->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">جزییات محصولات </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">نام محصول</label>
                                                    <input required name="title" type="text" class="form-control"
                                                           id="title" value="{{ $products->title }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">توضیحات کوتاه</label>
                                                        <textarea class="form-control" name="description_short"
                                                                  id="description_short" cols="30"
                                                                  rows="10"> {{ $products->description_short }}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> قیمت اصلی محصول(ریال) : </label>
                                                    <input type="number" required class="form-control date" name="price"
                                                           placeholder=" قیمت کالا " value="{{ $products->price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> گارانتی: </label>
                                                    <input type="text" required class="form-control date"
                                                           name="warranty"
                                                           placeholder="گارانتی" value="{{ $products->warranty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">کاور عکس محصول </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="cover" class="custom-file-input"
                                                                   id="cover">

                                                            <label class="custom-file-label" for="">انتخاب
                                                                کاور</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input name="cover_img" type="hidden" value="{{ $products->cover }}">
                                                @if(!empty($products->cover))
                                                    <img style="width:80px;" alt=""
                                                         src="{{ asset($products->cover) }}">
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label> وزن محصول : </label>
                                                    <input type="number" required class="form-control date"
                                                           name="weight"
                                                           placeholder=" وزن اصلی محصول"
                                                           value="{{ $products->weight }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>دسته بندی :</label>
                                                    <select class="form-control" name="category_id" id="category_id"
                                                            style="width:220px;">
                                                        <?php echo $categories_drop_down; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>برند :</label>
                                                    <select required name="brand_id" class="form-control">
                                                        <option value="0">برند انتخاب کنید</option>
                                                        @foreach($brands as $brands)
                                                            <option {{ $brands->id==$products->brand_id?'selected':'' }}  value="{{$brands->id}}">{{$brands->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h3 class="card-title">س‍‌‌ٔو محصول </h3>

                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> عنوان سئو : </label>
                                                <input type="text" class="form-control date" name="meta_title"
                                                       value="{{ $products->meta_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> کلمات کلیدی سئو : </label>
                                                <input type="text" class="form-control date" name="meta_keywords"
                                                       value="{{ $products->meta_keywords }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> توضیحات سئو : </label>
                                                <textarea class="form-control" id="meta_description"
                                                          name="meta_description"
                                                          placeholder="توضیحات متا کمتر از 350 کارکتر"
                                                          rows="4">{{ $products->meta_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h3 class="card-title">آپشن محصول </h3>

                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input @if($products->show_price==1)  checked @endif type="checkbox"
                                               class="form-check-input" id="show_price" name="show_price"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">نمایش قیمت
                                            محصول </label>
                                    </div>
                                    <div class="form-check">
                                        <input @if($products->feature_items==1)  checked @endif type="checkbox"
                                               class="form-check-input" id="feature_items" name="feature_items"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول ویژه </label>
                                    </div>
                                    <div class="form-check">
                                        <input @if($products->is_demo==1)  checked @endif type="checkbox"
                                               class="form-check-input" id="is_demo" name="is_demo"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول رونمایی </label>
                                    </div>
                                    <div class="form-check">
                                        <input @if($products->is_stock==1)  checked @endif type="checkbox"
                                               class="form-check-input" id="is_stock" name="is_stock"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول استوک </label>
                                    </div>
                                    <div class="form-check">
                                        <input @if($products->status==1)  checked @endif type="checkbox"
                                               class="form-check-input" id="status" name="status"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">وضعیت </label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });
            ClassicEditor
                .create(document.querySelector('#description_short'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });
            // bootstrap WYSIHTML5 - text editor
        })


    </script>
@endsection
