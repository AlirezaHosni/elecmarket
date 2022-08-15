
@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش  سوالات     </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش سوالات   </li>
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
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                @include('layouts.errors')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش سوالات    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/faqs/edit/'.$faq->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نام سوالات </label>
                                            <input name="title" value="{{ $faq->title }}" type="text" class="form-control"
                                                   id="title"
                                            >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">توضیحات  </label>
                                        
                                            <textarea name="des" id="des" class="form-control" cols="30" rows="10">{{  $faq->des }}</textarea>
                                        </div>
                                        <div class="form-check">
                                            <input {{  $faq->status=="1"?'checked':'' }} type="checkbox" class="form-check-input" id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت  </label>
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
                .create(document.querySelector('#des'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });
            ClassicEditor
                .create(document.querySelector('#bodyform'))
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

