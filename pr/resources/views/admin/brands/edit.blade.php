@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش برند    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش برند   </li>
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
                                <h3 class="card-title">ویرایش برند    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/brands/edit/'.$brands->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نام برند </label>
                                            <input name="title" type="text" class="form-control"
                                                   id="exampleInputEmail1" value="{{  $brands->title }}"
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">توضیحات برند</label>
                                            <textarea class="form-control" name="body" id="body" cols="30"
                                                      rows="10">{{  $brands->body }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نوع برند  (en)</label>
                                            <select required name="brand_type" id="brand_type" class="form-control">
                                                <option value="">نوع برند</option>
                                                <option @if($brands->brand_type=="private") selected @endif value="private">اختصاصی </option>
                                                <option @if($brands->brand_type=="co_worker") selected @endif value="co_worker">همکاران </option>
                                            </select>
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
                                                <input name="cover_img" type="hidden" value="{{ $brands->cover }}">
                                                @if(!empty($brands->cover))
                                                    <img style="width:90px;"
                                                         src="/{{ $brands->cover }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" @if($brands->status==1) checked  @endif id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت برند</label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">بروز رسانی</button>
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

