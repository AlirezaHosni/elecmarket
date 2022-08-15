@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش محصولات </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش محصولات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('layouts.errors')
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('products.add') }}" class="btn btn-block btn-outline-primary btn-sm">ایجاد
                            محصول</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('products.change.price') }}" class="btn btn-block btn-outline-primary btn-sm">ایجاد
                            تغییر قیمت محصولات</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">نمایش محصولات </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="product" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>تصویر محصول</th>
                                        <th>تعداد موجودی</th>
                                        <th>تعداد بازدیده</th>
                                        <th>نام محصول</th>
                                        <th>دسته بندی</th>
                                        <th>بازدید</th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <td><img width="80px"
                                                     src="{{ asset($row->cover) }}"></td>
                                            <td>تعداد : {{ $row->stock }}</td>
                                            <td>{{  $row->view_count??'0' }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>
                                                {{ $row->category->title??'' }}
                                            </td>
                                            <td>{{ $row->view_count }}</td>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>
                                                @if($row->status==1)  این محصولات فعال می باشد   @else این محصولات غیر
                                                فعال می باشد @endif
                                            </th>
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        <a href="{{ url('/ad/products/edit/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a id="delRole" rel="{{ $row->id }}"
                                                           rel1="products/delete"
                                                           href="javascript:"
                                                           class="deleteRecord">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                    <div class="row">
                                                        <a href="{{ url('/ad/products/fani/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-sort-alpha-desc"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/barsi/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-bitbucket"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/points/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-plus-square-o"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/downloads/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/comments/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-comment-o"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/reportprice/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-money"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/stock/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-product-hunt"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/add-imgs/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-image"></i>
                                                        </a>
                                                        <a href="{{ url('/ad/products/related/'.$row->id) }}"
                                                           style="margin-right: 10px;margin-left: 10px;">
                                                            <i class="fa fa-list-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @empty
                                        <tr>محصولات موجود نیست</tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                {{ $products->links() }}
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
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
    <script>
      $(function () {
        $("#product").DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": true,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      });


    </script>
@endsection
@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
@endsection
