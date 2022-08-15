@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش دسته بندی </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش دسته بندی</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row ">

            <div class=" col-md-2 offset-md-1">
                <a href="{{ route('categories.add') }}" class="btn btn-block btn-outline-success">ایجاد
                    دسته بندی</a>
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
                                <h3 class="card-title">نمایش دسته بندی </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>لینک</th>
                                        <th>دسته مادر</th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->title }} </th>
                                            <th>{{ $row->slug }} </th>
                                            <th>@if($row->parent_id==0) <span
                                                    class="badge bg-danger"> دسته مادر </span> @else{{ $row->parent_id }} @endif
                                            </th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>@if($row->status=="0") <span
                                                    class="badge bg-danger">در حال بررسی</span> @else <span
                                                    class="badge badge-primary">تایید شده</span> @endif</th>
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        <a href="{{ url('/ad/categories/edit/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a id="delRole" rel="{{ $row->id }}"
                                                           rel1="categories/del"
                                                           href="javascript:"
                                                           class="deleteRecord">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        @if(count($row->parent) > 0)
                                                            @include('admin.partials.category_list', ['categories'=>$row->parent, 'level'=>1])
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
