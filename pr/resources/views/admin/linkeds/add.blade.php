
@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ایجاد محصولات مرتبط   </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ایجاد محصولات مرتبط  </li>
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
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                @include('layouts.errors')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ایجاد محصولات مرتبط   </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/products/linked/add/'.$pro->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="hidden" name="main" value="{{ $pro->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نام محصولات </label>
                                            <input disabled value="{{ $pro->title??'' }}" type="text" class="form-control"
                                                   id="title"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">انتخاب محصول مرتبط  </label>
                                            <select name="linked" class="form-control select2" style="width: 100%;">
                                                @forelse($related as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                @empty
                                                    
                                                @endforelse
                                                
                                              </select>
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

                <!-- /.row -->
            </div><!-- /.container-fluid -->

        </section>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script>


    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>
@endsection
@section('links')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endsection


