@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> محصولات </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">{{ $pro->title??'' }} محصولات :</li>
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
                <form method="post" action="{{ url('/ad/products/barsi/'.$pro->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="hidden" name="pro_id" value="{{ $pro->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">بررسی تخصصی </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">بررسی تخصصی<span
                                                                    style="color:red">*</span></label>
                                                        <textarea class="form-control" name="barsi"
                                                                  id="barsi" cols="30"
                                                                  rows="10">{{ $pro->description??'' }}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
                .create(document.querySelector('#barsi'))
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
