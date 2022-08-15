@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>پورسانت دسته بندی بازاریاب  </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> پورسانت دسته بندی بازاریاب</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <a href="{{ url('ad/seller') }}" class="col-1 offset-md-10 col-md-1 pull-left btn btn-success">برگشت</a>
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
                                <h3 class="card-title">پورسانت دسته بندی بازاریاب :  {{ $marks->user->username??'' }}</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/marketing/category/'.$user_id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">انتخاب دسته بندی مادر
                                                        بازاریاب </label>
                                                    <select required id="category_id"
                                                            class="form-control">
                                                        <option value="0">انتخاب دسته بندی</option>
                                                        @forelse($category as $row)
                                                            <option value="{{ $row->id }}">{{ $row->title }} </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">انتخاب دسته بندی زیر مجموعه
                                                        بازاریاب </label>
                                                    <select required id="subcat1"
                                                            class="form-control">
                                                        <option value="0">انتخاب دسته بندی</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">انتخاب دسته بندی زیر مجموعه
                                                        بازاریاب </label>
                                                    <select required id="subcat2" name="category_id"
                                                            class="form-control">
                                                        <option value="0">انتخاب دسته بندی</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> پورسانت
                                                        (%) </label>
                                                    <input required type="number" class="form-control"
                                                           name="countdown_category"
                                                           value="0"
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">نمایش دسته بندی ها </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام دسته بندی</th>
                                        <th>پورسانت</th>
                                        <th>تاریخ</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($getall as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>
                                                @php
                                                    $cat = \App\Category::where('id',$row->category_id)->first();
                                                @endphp
                                                @if(!@empty($cat))
                                                    {{ $cat->title??'' }}
                                                @endif
                                            </th>
                                            <th>{{ $row->countdown_category??'' }} % </th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <th>
                                                <a id="delRole" rel="{{ $row->id }}"
                                                   rel1="category/del"
                                                   href="javascript:"
                                                   class="deleteRecord">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
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
        $("#category_id").on('change', function () {
            var category_id = $(this).val();
            //alert(category_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/ad/sellers/get-cat') }}",
                type: "POST",
                data: {category_id: category_id}
            }).done(function (msg) {
                $("#subcat1").html(msg)
            });
        });

        $("#subcat1").on('change', function () {
            var subcat1 = $(this).val();

            // alert(subcat1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/ad/sellers/get-cat') }}",
                type: "POST",
                data: {category_id: subcat1}
            }).done(function (msg) {
                $("#subcat2").html(msg)
            });
        });
    </script>
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
                    window.location.href = "{{ url('/ad/marketing/') }}" + "/" + deleteFunction + "/" + id;
                });

        });
    </script>

@endsection

