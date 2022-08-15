@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ایجاد گالری </h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ایجاد گالری</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row ">
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
                                <h3 class="card-title">ایجاد گالری </h3>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2 offset-10">
                                    <a href="{{ route('products.list') }}" class="alert alert-danger">
                                        برگشت
                                    </a>
                                </div>
                            </div>
                            <br>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/products/add-imgs/'.$productDetails->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                                        <div class="control-group">
                                            <label class="control-label"> نام محصول:</label>
                                            <label class="control-label">{{ $productDetails->title }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">عکس گالری </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="cover[]" class="custom-file-input"
                                                                   id="cover">
                                                            <label class="custom-file-label" for="">انتخاب
                                                                عکس گالری</label>
                                                        </div>
                                                    </div>
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
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> محصول</th>
                                        <th>عکس</th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($productImages as $key => $image)
                                        <tr>
                                            <td>{{ $key+=1 }}</td>
                                            <td>{{ $image->product_id }}</td>
                                            <td>{{ $image->product->title }}</td>
                                            <td class="table-img sorting_1">
                                                <img style="width: 80px; height: 80px;"
                                                     src="{{ asset($image->path.$image->image) }}"
                                                     alt="">
                                            </td>
                                            <th>{{ Verta($productDetails->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <td>
                                                <a id="delProduct" rel="{{ $image->id }}" rel1="products/delete-alt-image"
                                                   href="javascript:" class="deleteRecord">
                                                    <button class="btn tblActnBtn">
                                                        <i class="material-icons">پاک کردن</i>
                                                    </button>
                                                </a>
                                            </td>
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
                    window.location.href = "/ad/" + deleteFunction + "/" + id;
                });

        });
    </script>
@endsection


