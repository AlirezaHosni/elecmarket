@extends('admin.layouts.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش محصول کار کرده </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">ویرایش محصول کار کرده</li>
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
                                <h3 class="card-title">ویرایش محصول کار کرده </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/products/edit-worked/'.$work->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>محصولات :</label>
                                                    <select name="product_id" class="form-control">
                                                        <option value="0"> محصولات انتخاب کنید</option>
                                                        @foreach($products as $products)
                                                            <option {{ $work->product_id==$products->id?'selected':'' }} value="{{$products->id}}">{{$products->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> تاریخ کار کرده : </label>
                                                    <input type="text" required class="form-control expiry_date"
                                                           name="expiry_date"
                                                           placeholder="تاریخ براساس روزی که محصول با این قیمت کار کرده بخوره"
                                                           value="{{old('expiry_date')}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>فعال سازی کار کرده محصول :</label>
                                                <input {{ $work->worked=="1"?'checked':'' }} type="checkbox" class="browser-default" name="worked"
                                                       id="special"
                                                       value="1" style="opacity: 1;pointer-events: auto;outline: none;">
                                            </div>
                                        </div>
                                    </div>
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

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('links')
    <link href="{{url('assets/css/persian-datepicker.min.css')}}" rel="stylesheet"/>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ url('assets/js/persian-date.min.js')}}"></script>
    <script>
        $('.expiry_date').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection

