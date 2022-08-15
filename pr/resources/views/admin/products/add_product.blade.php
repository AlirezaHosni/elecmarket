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
        <div class="row">
        </div>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('layouts.errors')
                <form method="post" action="{{ url('/ad/products/add') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">جزییات محصول </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">نام محصول <span style="color:red">*</span></label>
                                                    <input required name="title" type="text" class="form-control"
                                                           id="title"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">توضیحات کوتاه<span
                                                                    style="color:red">*</span></label>
                                                        <textarea class="form-control" name="description_short"
                                                                  id="description_short" cols="30"
                                                                  rows="10"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> قیمت اصلی محصول(ریال) : <span
                                                                style="color:red">*</span></label>
                                                    <input type="number" required class="form-control date" name="price"
                                                           placeholder=" قیمت کالا " value="{{old('price')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> گارانتی: <span style="color:red">*</span></label>
                                                    <input type="text" required class="form-control date"
                                                           name="warranty"
                                                           placeholder="گارانتی" value="{{old('warranty')}}">
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
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label> وزن محصول به گرم  : <span style="color:red">*</span></label>
                                                    <input type="number" required class="form-control date"
                                                           name="weight"
                                                           placeholder=" وزن اصلی محصول" value="{{old('weight')}}">g
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>دسته بندی :<span style="color:red">*</span></label>
                                                    <a href="{{ route('categories.add') }}"
                                                       class="btn btn-success btn-xs">ایجاد دسته بندی</a>
                                                    <p>تعداد دسته بندی موجود: {{ \App\Category::count() }}</p>
                                                    <hr>
                                                    <select required name="category_id" class="form-control">
                                                        <option value="0">دسته بندی انتخاب کنید</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                            @if(count($category->parent) > 0)
                                                                @include('admin.partials.category', ['categories'=>$category->parent, 'level'=>1])
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>برند :<span style="color:red">*</span></label>
                                                    <a href="{{ route('brands.add') }}" class="btn btn-success btn-xs">ایجاد
                                                        برند</a>
                                                    <p>تعداد دسته بندی موجود: {{ \App\Brand::count() }}</p>
                                                    <hr>
                                                    <select required name="brand_id" class="form-control">
                                                        <option value="0">برند انتخاب کنید</option>
                                                        @foreach($brands as $brands)
                                                            <option value="{{$brands->id}}">{{$brands->title}}</option>
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
                                                       placeholder="meta title" value="{{old('meta_title')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> کلمات کلیدی سئو : </label>
                                                <input type="text" class="form-control date" name="meta_keywords"
                                                       placeholder="meta keywords" value="{{old('meta_keywords')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> توضیحات سئو : </label>
                                                <textarea class="form-control" id="meta_description"
                                                          name="meta_description"
                                                          placeholder="توضیحات متا کمتر از 350 کارکتر"
                                                          rows="4">{{old('meta_description')}}</textarea>
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
                                        <input type="checkbox" class="form-check-input" id="show_price"
                                               name="show_price"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">نمایش قیمت
                                            محصول </label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="feature_items"
                                               name="feature_items"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول ویژه </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_demo" name="is_demo"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول رونمایی </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_stock"
                                               name="is_stock"
                                               value="1">
                                        <label class="form-check-label" for="exampleCheck1">محصول استوک </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" name="status"
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
