@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش افتخارات موجود   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش افتخارات موجود</li>
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
                                <h3 class="card-title">نمایش افتخارات  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>نام افتخارات </th>
                                        <th>لینک</th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>تعداد نمایش</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($honor as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->title }} </th>
                                            <th>{{ $row->slug }} </th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>{{ $row->view_count }} </th>
                                            <th>
                                                @if($row->status==1)  این افتخارات فعال می باشد   @else این افتخارات غیر فعال می باشد @endif
                                            </th>
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        <a href="{{ url('/ad/honors/edit/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a id="delRole" rel="{{ $row->id }}"
                                                           rel1="honors/delete"
                                                           href="javascript:"
                                                           class="deleteRecord">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @empty
                                        <p>افتخارات موجود نیست</p>
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
