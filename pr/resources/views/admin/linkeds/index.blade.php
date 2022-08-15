@extends('admin.layouts.design')

@section('content')
@php
use App\Product;    

@endphp
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش محصولات مرتبط   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش محصولات مرتبط</li>
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
                    <div class="col-md-2">
                        <a href="{{ url('/ad/products/linked/add/'.$main_id) }}" class="btn btn-block btn-outline-primary btn-sm">ایجاد محصولات مرتبط</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">نمایش محصولات مرتبط  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام محصولات مرتبط </th>
                                        <th>تاریخ بروز رسانی</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($sup as  $rows)
                                        <tr>
                                            <th>{{ $rows->id+=1 }}</th>
                                            <th>
                                            @php
                                            
                                            $pro_id = $rows->linked;    
                                            $product = Product::where('id',$pro_id)->first();
                                            
                                                $title = $product->title??"";
                                                $stock = $product->stock??"";
                                                      
                                            @endphp  
                                            نام محصول : {{ $title }}
                                            تعداد محصول : {{ $stock }}
                                            </th>
                                            <th>{{ Verta($rows->updated_at)->format('%d %B %Y H:i') }}</th>                                   
                                            <th>
                                                <div class="tools">
                                                    <div class="row">
                                                        <a id="delRole" rel="{{ $rows->id }}"
                                                           rel1="products/linked/del"
                                                           href="javascript:"
                                                           class="deleteRecord">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @empty
                                        <p>محصولات مرتبط نیست</p>
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
