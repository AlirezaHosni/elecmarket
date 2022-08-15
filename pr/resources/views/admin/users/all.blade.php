@extends('admin.layouts.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش کارمند </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش کارمند</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row ">

            <div class=" col-md-3 offset-md-1">
                <a href="{{ url('ad/users/add') }}" class="btn btn-block btn-outline-success">ایجاد کارمند یا
                    مدیر</a>
            </div>
            @include('layouts.errors')
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
                                <h3 class="card-title">نمایش کارمند </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کاربری</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>شماره تلفن</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($user as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->username }} </th>
                                            <th>{{ $row->profiles->first_name??'' }}<span>&nbsp;</span>{{ $row->profiles->last_name??'' }}</th>
                                            <th>{{ $row->phone }} </th>

                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <th>@if($row->is_admin=="0") <span
                                                    class="badge bg-danger">کاربر معمولی  </span> @else <span
                                                    class="badge badge-primary">کارمند </span> @endif</th>
                                            <th>@if($row->status=="0") <span
                                                    class="badge bg-danger">در حال بررسی</span> @else <span
                                                    class="badge badge-primary">تایید شده</span> @endif</th>
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        @if($row->id=="1")
                                                            <p>مدیریت اصلی</p>
                                                            <a href="{{ url('/ad/users/roles/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-bars"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('/ad/users/edit/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ url('/ad/users/roles/'.$row->id) }}"
                                                               style="margin-right: 10px;margin-left: 10px;">
                                                                <i class="fa fa-bars"></i>
                                                            </a>
                                                            <a id="delRole" rel="{{ $row->id }}"
                                                               rel1="users/delete"
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
