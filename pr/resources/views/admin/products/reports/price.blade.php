@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش  تغییر قیمت </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش  تغییر قیمت </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                @include('layouts.errors')
                <form method="post" action="{{ url('/ad/products/change-price/') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">تغییر قیمت گروهی  </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">نوع تغییر <span
                                                                    style="color:red">*</span></label>
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="percent">درصد</option>
                                                            <option value="number">قیمت</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">عدد  <span
                                                                    style="color:red">*</span></label>
                                                        <input type="number" name="num" id="num" class="form-control" value="0">
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


                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">نمایش  تغییر قیمت </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام </th>
                                        <th>قیمت </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($pro as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->title??'' }} </th>
                                            <td>
                                                {{ $row->price ??'' }}تومان
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
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

