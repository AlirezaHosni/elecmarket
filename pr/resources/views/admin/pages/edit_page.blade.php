@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش صفحات    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش صفحات   </li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش صفحات    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/pages/edit/'.$page->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">عنوان   </label>
                                                    <input value="{{ $page->title }}" name="title" type="text" class="form-control"
                                                           id="title"
                                                    >
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">توضیحات  </label>
                                            <textarea class="form-control" name="description" id="description" cols="30"
                                                      rows="10">{{ $page->description }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="">توضیحات کوتاه </label>
                                            <textarea class="form-control" name="description_short" id="description_short" cols="30"
                                                      rows="10">{{ $page->description_short }}</textarea>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">کاور صفحات  </label>
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
                                            <div class="col-md-3">
                                                <input name="cover_img" type="hidden" value="{{ $page->file_name }}">
                                                @if(!empty($page->file_name))
                                                    <img style="width:90px;" alt=""
                                                         src="/{{ $page->path.$page->file_name }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">نوع صفحات  </label>
                                            <select name="page_type" id="page_type" class="form-control">
                                                <option value="">انتخاب نوع صفحات</option>
                                                <option value="guide_buy" @if($page->page_type=="guide_buy") selected @else @endif>راهنمایی خرید</option>
                                                <option value="service_customer" @if($page->page_type=="service_customer") selected @else @endif>خدمات مشتریان </option>
                                                <option value="otaghnews" @if($page->page_type=="otaghnews") selected @else @endif>اتاق خبر  </option>
                                            </select>

                                        </div>
                                        <div class="form-check">
                                            <input @if($page->status==1) checked @else @endif type="checkbox" class="form-check-input" id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت   </label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

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

            // bootstrap WYSIHTML5 - text editor
        })
    </script>
@endsection

