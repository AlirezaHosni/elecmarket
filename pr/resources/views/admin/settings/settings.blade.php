
@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> تنظیمات    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">  تنظیمات   </li>
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
                                <h3 class="card-title"> تنظیمات    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/settings/setting') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="setting_id" value="{{ $settings->id??'' }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">شماره تماس ها :   </label>
                                                    <textarea name="footer_contact" id="footer_contact" class="form-control"  cols="30" rows="10">{{ $settings->footer_contact??'' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="slug"> بخش درباره ما فوتر  </label>
                                                    <textarea class="form-control" name="footer_about" id="footer_about" cols="30" rows="10">{{ $settings->footer_about??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">متن کپی رایت   </label>
                                                    <input name="copy_right" type="text" value="{{ $settings->copy_right??'' }}" class="form-control"
                                                           id="copy_right"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tel_header">تلفن در هدر  </label>
                                                    <input name="tel_header" value="{{ $settings->tel_header??'' }}" type="text" class="form-control"
                                                           id="tel_header"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس شرکت     </label>
                                                    <input name="address" type="text" value="{{ $settings->address??'' }}" class="form-control"
                                                           id="address"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">رنگ باکس      </label>
                                                    <input name="bn_textbox" type="text" value="{{ $settings->bn_textbox??'' }}" class="form-control"
                                                           id="bn_textbox"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">متن مرجوع کالا</label>
                                                    <textarea name="reference" class="form-control" id="reference" cols="30" rows="10">{{ $settings->reference??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="exampleInputFile">کاور پروموت  </label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <div class="custom-file">--}}
{{--                                                            <input type="file" name="cover" class="custom-file-input"--}}
{{--                                                                   id="cover">--}}
{{--                                                            <label class="custom-file-label" for="">انتخاب--}}
{{--                                                                کاور</label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-2">--}}
{{--                                                <input name="cover_img" type="hidden" value="{{ $settings->logo_path??'' }}">--}}
{{--                                                @if(@!empty($settings->logo_path))--}}
{{--                                                    <img style="width:100px;" alt=""--}}
{{--                                                         src="{{ asset($settings->logo_path) }}">--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
                .create(document.querySelector('#footer_contact'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });

            ClassicEditor
                .create(document.querySelector('#footer_about'))
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

