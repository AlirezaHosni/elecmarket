@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش وضعیت سفارشات   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش وضعیت سفارشات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 pull-right" >
                        <a href="{{ route('orders.status.add') }}" class="btn btn-success">ایجاد وضعیت سفارش</a>
                    </div>
                </div>
            </div>
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
                                        <th>نام  </th>
                                        <th>مقدار   </th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($get as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->title }} </th>
                                            <th>{{ $row->var }} </th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <td>
                                                <a href="{{ url('/ad/orders/edit-status/'.$row->id) }}"
                                                   style="margin-right: 10px;margin-left: 10px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a id="delRole" rel="{{ $row->id }}"
                                                   rel1="orders/delete-status"
                                                   href="javascript:"
                                                   class="deleteRecord">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>وضعیت سفارشات نیست</p>
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
