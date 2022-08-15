@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش پروموت موجود   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش پروموت موجود</li>
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
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-2">
                        <a href="{{ route('promote.add') }}" class="btn btn-block btn-outline-primary btn-sm">ایجاد پروموت</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">تغییر کاور پروموت</h3>
                            </div>
                            <form  action="{{ route('promote.changePromoteCover') }}" method="post" enctype="multipart/form-data" class="col-12 mt-1">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">کاور پروموت  </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="cover" class="custom-file-input"
                                                           id="cover">
                                                    <label class="custom-file-label" for="">انتخاب
                                                        کاور</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 row">
                                        <input name="cover_img" type="hidden" value="{{ $settings->logo_path??'' }}">
                                        @if(@!empty($settings->logo_path))
                                            <img style="width:100px;" alt=""
                                                 src="{{ asset($settings->logo_path) }}">
                                        @endif
                                    </div>
                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
                                    </div>
                            </form>
                            <hr>

                            <div class="card-header">
                                <h3 class="card-title">نمایش پروموت  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>کاور پروموت</th>
                                        <th>مکان </th>
                                        <th>تاریخ </th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($pro as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <td>
                                                @if(!empty($row->path))
                                                    <img
                                                        src="{{ asset($row->path) }}"
                                                        style="width:50px;">
                                                @endif
                                            </td>
                                            <th>
                                                @if($row->type=="sidesliderone")  کنار اسلایدر 1  @else کنار اسلایدر 2  @endif
                                            </th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>
                                                @if($row->status==1)  این پروموت فعال می باشد   @else این پروموت غیر فعال می باشد @endif
                                            </th>
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        <a href="{{ url('/ad/promotes/edit-promote/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a id="delRole" rel="{{ $row->id }}"
                                                           rel1="promotes/delete-promote"
                                                           href="javascript:"
                                                           class="deleteRecord">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @empty
                                        <p>پروموت موجود نیست</p>
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
