@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش منوها </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش منوها</li>
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
                                <h3 class="card-title">ویرایش منوها </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/menus/edit/'.$manu->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">عنوان </label>
                                                    <input value="{{ $manu->title }}" required name="title" type="text" class="form-control"
                                                           id="title"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">نوع منوها </label>
                                            <select required name="menu_type" id="menu_type" class="form-control">
                                                <option value="">انتخاب نوع منوها</option>
                                                <option  {{ $manu->menu_type=="menuheaderleft"? 'selected' : '' }} value="menuheaderleft">منو هدر بالا سمت چپ</option>
                                                <option  {{ $manu->menu_type=="menuheaderright"? 'selected' : '' }} value="menuheaderright">منو هدر بالا سمت راست</option>
                                                <option  {{ $manu->menu_type=="menufootercata"? 'selected' : '' }} value="menufootercata"> منو فوتر دسته اول</option>
                                                <option  {{ $manu->menu_type=="menufootercatb"? 'selected' : '' }} value="menufootercatb"> منو فوتر دسته دوم</option>
                                                <option  {{ $manu->menu_type=="menufootercatc"? 'selected' : '' }} value="menufootercatc"> منو فوتر دسته سوم</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="">صفحه مورد نظر </label>
                                            <select required name="page_id" id="page_id" class="form-control">
                                                <option value="">انتخاب نوع صفحات</option>
                                                @forelse($page as $row)
                                                    <option {{ $row->id==$manu->page_id? 'selected' : '' }} value="{{ $row->id }}">{{ $row->title }}  </option>
                                                @empty
                                                @endforelse

                                            </select>

                                        </div>
                                        <div class="form-check">
                                            <input   {{ $manu->status=="1"? 'checked' : '' }} required type="checkbox" class="form-check-input" id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت </label>
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

