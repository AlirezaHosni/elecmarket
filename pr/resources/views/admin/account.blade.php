@extends('admin.layouts.design')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">داشبورد </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">داشبورد</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">تعداد کاربران </span>
                                <span class="info-box-number">
                  <span
                      class="badge badge-info right">{{ App\User::where(['is_admin' => '0','is_seller' => '0'])->count() }}</span>
                  <small>%</small>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">تعداد محصولات</span>
                                <span class="info-box-number">{{ App\Product::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">تعداد سفارشات</span>
                                <span class="info-box-number"><span
                                        class="badge badge-info right">{{ App\Order::count() }}</span></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">اعضای </span>
                                <span class="info-box-number"><span
                                        class="badge badge-info right">{{ App\User::count() }}</span></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">آخرین سفارشات</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    @php
                                        use App\Order;$ord = Order::latest()->take(5)->get()
                                    @endphp
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>ای دی محصول</th>
                                            <th>محصول</th>
                                            <th>وضعیت</th>
                                            <th>قیمت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($ord as $row)
                                            <tr>
                                                <td><a href="">{{ $row->tracking_code }}</a></td>
                                                <td></td>
                                                <td><span
                                                        class="badge badge-success">{{ $row->payment_type	 }} </span>
                                                </td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        {{ $row->total }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{ route('order.show') }}" class="btn btn-sm btn-secondary float-right">مشاهده
                                    همه
                                    سفارشات</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <!-- Info Boxes Style 2 -->

                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">محصولات تازه اضافه شده</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @php
                                        use App\Product;$pro = Product::where('status','1')->latest()->take(5)->get()
                                    @endphp
                                    @forelse($pro as $row)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{ asset($row->cover) }}" alt="Product Image"
                                                     class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">{{ $row->title }}
                                                    <span
                                                        class="badge badge-warning float-left">تومان {{ $row->price }}</span></a>
                                            </div>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="{{ route('products.list') }}" class="uppercase">نمایش همه محصولات</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
