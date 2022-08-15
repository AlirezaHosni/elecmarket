@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش مشتریان </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش مشتریان</li>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش مشتریان  </h3>
                                @include('layouts.errors')
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/customers/edit/'.$user->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">تلفن   </label>
                                                    <input disabled value="{{ $user->phone }}" required name="phone" type="number" class="form-control"
                                                           id="phone"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نام کاربری به انگلیسی  </label>
                                                    <input value="{{ $user->username }}" required name="username" type="text" class="form-control"
                                                           id="first_name"
                                                    >
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


                                        <div class="form-check">
                                            <input {{ $user->status=="1"?'checked':'' }} required type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت مشتریان</label>
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
