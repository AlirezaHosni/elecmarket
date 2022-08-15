@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش فروشنده </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش فروشنده</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class=" col-md-2 offset-md-1">
                <a href="{{ url('ad/seller/create') }}" class="btn btn-block btn-outline-success">ایجاد
                    فروشنده</a>
            </div>
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
                                <h3 class="card-title">نمایش فروشنده </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربر</th>
                                        <th>شماره تلفن</th>
                                        <th>نوع فروشندگی</th>
                                        <th>اجازه سفارش </th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($saller as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->username??'' }} </th>
                                            <th>{{ $row->phone??'' }} </th>
                                            <th>
                                                @if($row->type_identity=="seller")
                                                    فروشنده
                                                @elseif($row->type_identity=="agent")
                                                    نماینده
                                                @elseif($row->type_identity=="selleragent")
                                                    عاملیت
                                                @elseif($row->type_identity=="supplier")
                                                    تامین کننده
                                                @elseif($row->type_identity=="marketer")
                                                    بازاریاب
                                                @endif
                                            </th>
                                            <th>@if($row->order_buy=="0") <span
                                                    class="badge bg-danger">سفارش مسدود  </span> @else <span
                                                    class="badge badge-primary">تایید شده</span> @endif</th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <th>@if($row->status=="0") <span
                                                    class="badge bg-danger">در حال بررسی</span> @else <span
                                                    class="badge badge-primary">تایید شده</span> @endif</th>
                                            <th>
                                                <div class="tools">

                                                    <div class="row">
                                                        @if($row->type_identity!="marketer")
                                                            <a href="{{ url('ad/seller/marker/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-support"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/category/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-bars"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/complate/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-archive"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/state/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-tags"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/edit/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a id="delRole" rel="{{ $row->id }}"
                                                               rel1="seller/delete"
                                                               href="javascript:"
                                                               class="deleteRecord">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('ad/marketing/category/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;color: #094141">
                                                                <i class="fa fa-tasks"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/marketer/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-support"></i>
                                                            </a>
                                                            <a href="{{ url('ad/seller/edit/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a id="delRole" rel="{{ $row->id }}"
                                                               rel1="seller/delete"
                                                               href="javascript:"
                                                               class="deleteRecord">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </th>
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
                    window.location.href = "{{ url('/ad/') }}" + "/" + deleteFunction + "/" + id;
                });

        });
    </script>
@endsection
