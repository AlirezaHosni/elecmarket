@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ایجاد فروشنده </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ایجاد فروشنده</li>
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
                                <h3 class="card-title">ایجاد فروشنده  </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/seller/create') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نام  </label>
                                                    <input required name="first_name" type="text" class="form-control"
                                                           id="first_name"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نام خانوادگی  </label>
                                                    <input required name="last_name" type="text" class="form-control"
                                                           id="last_name"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">کدملی   </label>
                                                    <input required name="nationalcode" type="text" class="form-control"
                                                           id="nationalcode"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">تلفن   </label>
                                                    <input required name="phone" type="number" class="form-control"
                                                           id="phone"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">جنسیت    </label>
                                                    <select required name="gender" id="gender" class="form-control">
                                                        <option value="0">انتخاب جنسیت</option>
                                                        <option value="man">مرد</option>
                                                        <option value="woman">زن</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">پسورد    </label>
                                                    <input required  name="password" type="password" class="form-control"
                                                           id="password"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">انتخاب نوع فروشندگی    </label>
                                                <select required name="seller" id="seller"  class="form-control">
                                                    <option value="0">انتخاب نوع فروشندگی</option>
                                                    <option value="supplier">تامین کننده</option>
                                                    <option value="agent">نماینده</option>
                                                    <option value="selleragent">عاملیت</option>
                                                    <option value="seller">فروشنده</option>
                                                    <option value="marketer">بازاریاب</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input required type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت فروشنده</label>
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
