@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> محصولات </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">{{ $pro->title??'' }} محصولات :</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
        </div>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('layouts.errors')
                <form method="post" action="{{ url('/ad/products/downloads/'.$pro->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="hidden" name="pro_id" value="{{ $pro->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">دانلود فایل ها محصولات </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">دانلود فایل ها محصولات<span
                                                                    style="color:red">*</span></label>
                                                        <input required class="form-control" type="text" id="title" name="title"
                                                               placeholder="نام فایل">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">نوع فایل</label>
                                                    <select required name="type" id="type" class="form-control">
                                                        <option value="">انتخاب نوع فایل</option>
                                                        <option value="pdf">pdf</option>
                                                        <option value="zip">zip</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">دانلود فایل ها محصولات<span
                                                                style="color:red">*</span></label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="download" class="custom-file-input"
                                                                   id="download">
                                                            <label class="custom-file-label" for="">انتخاب
                                                                فایل</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ذخیره</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <hr>


                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </form>

                <hr>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> فایل ها </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام فایل</th>
                                            <th>پسوند</th>
                                            <th>لینک</th>
                                            <th>*</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($value as $key => $row)
                                            <tr>
                                                <th>{{ $key+=1 }}</th>
                                                <td>{{ $row->title }}</td>
                                                <td>
                                                    @if($row->type=="pdf")
                                                        PDF
                                                    @elseif($row->type=="zip")
                                                        ZIP
                                                    @endif
                                                </td>
                                                <td><a target="_blank" href="/{{ $row->link??'' }}">دانلود فایل</a></td>
                                                <td>
                                                    <a id="delRole" rel="{{ $row->id }}"
                                                       rel1="products/downloads/del"
                                                       href="javascript:"
                                                       class="deleteRecord">
                                                       *
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>فایل ناموجود</tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <hr>


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


