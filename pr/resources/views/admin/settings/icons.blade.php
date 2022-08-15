
@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> آیکن ها    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">  آیکن ها   </li>
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
                                <h3 class="card-title"> آیکن ها    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/icons') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="icons_id" value="{{ $icons->id??'' }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس لینک آیکن  (پشتیبانی 24 ساعته)  </label>
                                                    <textarea name="icon_1" id="icon_1" class="form-control"  cols="30" rows="10">{{ $icons->icon_1??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس لینک آیکن (تحویل اکسپرس)   </label>

                                                    <textarea name="icon_2" id="icon_2" class="form-control"  cols="30" rows="10">{{ $icons->icon_2??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس لینک آیکن  (پرداخت در محل)  </label>
                                                    <textarea name="icon_3" id="icon_3" class="form-control"  cols="30" rows="10">{{ $icons->icon_3??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس لینک آیکن (7 روز ضمانت بازگشت)   </label>
                                                    <textarea name="icon_4" id="icon_4" class="form-control"  cols="30" rows="10">{{ $icons->icon_4??'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">آدرس لینک آیکن  (ضمانت اصل بودن)  </label>
                                                    <textarea name="icon_5" id="icon_5" class="form-control"  cols="30" rows="10">{{ $icons->icon_5??'' }}</textarea>
                                                </div>
                                            </div>
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


