@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش پرداختی ها موجود   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش پرداختی ها موجود</li>
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
                                <h3 class="card-title">نمایش پرداختی ها  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربر </th>
                                        <th>شماره سفارش  </th>
                                        <th>نوع پرداخت </th>
                                        <th>مبلغ کل </th>
                                        <th>وضعیت سفارش</th>
                                        <th>تاریخ بروز رسانی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($payments as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->user->username??'' }} </th>
                                            <th>{{ $row->order_id }} </th>
                                            <th>{{ $row->pay_type }} </th>
                                            <th>{{ $row->amount }} قیمت تمام شده </th>
                                            <th>{{ $row->status_pay	 }} </th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>

                                        </tr>
                                    @empty
                                        <p>پرداختی ها موجود نیست</p>
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
@section('scripts')
    <script>
        $(document).on('click', '.deleteRecord', function (e) {
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "شما مطمئن هستید؟",
                    text: "شما نمیتوانید این رکورد را دوباره بازیابی کنید!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "بله، آن را حذف کنید!",
                    closeOnConfirm: false
                },
                function () {
                    window.location.href = "/ad/" + deleteFunction + "/" + id;
                });

        });
    </script>
@endsection
