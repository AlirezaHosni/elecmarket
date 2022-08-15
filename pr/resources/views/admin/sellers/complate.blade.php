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
                @include('layouts.errors')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تکمیل فروشنده  کاربری :  {{ $marks->user->username??'' }}</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">

                                <form method="post" action="{{ url('ad/seller/complate/'.$user_id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="seller_id" value="{{ $user_id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">کد فروشنده در فروشنده </label>
                                                    <input   type="text" class="form-control" name="code_seller_seller" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">انتخاب دسته بندی فروشنده </label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        @forelse($getall as $row)
                                                            @php
                                                                $cat = \App\Category::where('id',$row->category_id)->first();
                                                            @endphp
                                                            <option value="{{ $row->category_id }}">{{ $cat->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">سقف خرید ماهیانه منتاظر با دسته بندی </label>
                                                    <input required  type="text" class="form-control" name="buy_max_category" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">تخفیف منتاظر با دسته بندی </label>
                                                    <input required  type="text" class="form-control" name="discount_category" value=""

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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>کد فروشنده در فروشنده</th>
                                        <th>نام دسته بندی</th>
                                        <th>سقف خرید ماهیانه متناظر با دسته بندی </th>
                                        <th>تخفیف متناظر با دسته بندی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($getall as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->code_seller_seller }}</th>
                                            <th>
                                                @php
                                                    $cat = \App\Category::where('id',$row->category_id)->first();
                                                @endphp
                                                @if(!@empty($cat))
                                                    {{ $cat->title??'' }}
                                                @endif
                                            </th>
                                            <th>{{ $row->buy_max_category??'' }} </th>
                                            <th>{{ $row->discount_category??'' }} </th>
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
