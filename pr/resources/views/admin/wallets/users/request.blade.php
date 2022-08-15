@extends('admin.layouts.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>درخواست ها مشتری برای برداشت کاربران   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">درخواست ها مشتری برای برداشت کاربران</li>
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
                                <h3 class="card-title">درخواست ها مشتری برای برداشت کاربران  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/wallets/request/'.$getwallets->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">کد رهیگیری واریز مدیریت  </label>
                                                    <input  name="paid_code" type="text" class="form-control"
                                                           id="paid_code"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">مبلغ واریز مدیریت   </label>
                                                    <input  name="price_paid" type="number" class="form-control"
                                                           id="price_paid"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="exampleInputEmail1">وضعیت درخواست کاربر       </label>
                                                <select required name="paid_status" id="paid_status" class="form-control">
                                                    <option value="">انتخاب وضعیت پرداخت</option>
                                                    <option value="pay-final">پرداخت نهایی</option>
                                                    <option value="pay-error">پرداخت رد شد </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">تاریخ بررسی مدیر     </label>
                                                    <input  name="paid_data" type="text" class="expiry_date form-control"
                                                           id="expiry_date"
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
        $('.expiry_date').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
