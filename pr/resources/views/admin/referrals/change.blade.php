@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش مرجوع   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش مرجوع</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

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
                                <h3 class="card-title">نمایش مرجوع  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/ref/change/'.$get->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-control">
                                        <div class="row">
                                            <label for="">نام محصول :</label>
                                            <label for="">{{ $get->product->title??'' }}</label>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <div class="row">
                                            <label for="">توضیحات مرجوعی :</label>
                                            <label for="">{{ $get->referral_text??'' }}</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pro_id" value="{{ $get->id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">وضعیت مرجوعی </label>
                                                    <select required name="ref_status" id="ref_status" class="form-control">
                                                        <option value="">وضعیت مرجوعی</option>
                                                        <option value="1">تایید </option>
                                                        <option value="0">مورد تایید نشد </option>
                                                    </select>
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

