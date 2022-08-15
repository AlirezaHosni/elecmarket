@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تکمیل فروشنده </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> تکمیل فروشنده</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <a href="{{ url('ad/seller') }}" class="col-1 offset-md-10 col-md-1 pull-left btn btn-success">برگشت</a>
        </div>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تکمیل فروشنده  کاربری :  {{ $mark->user->username??'' }}</h3>

                            </div>
                        @include('layouts.errors')
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/seller/marker/'.$user_id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">وارد کردن حق امتیاز    </label>
                                                    <input required  type="number" name="score" class="form-control" value="{{ $mark->score??'' }}"

                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">وارد کردن تاریخ شروع قرارداد   </label>
                                                    <input required  type="text" class="form-control agree_start" name="agree_start" value="{{ $mark->agree_start??'' }}"

                                                    >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">وارد کردن تاریخ پایان قرارداد</label>
                                                    <input required  type="text" class="form-control agree_end" name="agree_end" value="{{ $mark->agree_end??'' }}"

                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">مشخص کردن سقف دارمدی ماهیانه  </label>
                                                    <input required  type="number" class="form-control" name="income_max" value="{{ $mark->income_max??'' }}"

                                                    >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">وارد کردن نام وارت</label>
                                                    <input required  type="text" class="form-control" name="heir_name" value="{{ $mark->heir_name??'' }}"

                                                    >
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
@section('links')
    <link href="{{url('assets/css/persian-datepicker.min.css')}}" rel="stylesheet"/>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ url('assets/js/persian-date.min.js')}}"></script>
    <script>
        $('.agree_start').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
        $('.agree_end').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
