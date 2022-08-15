
@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش پروموت    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش پروموت   </li>
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
                                <h3 class="card-title">ویرایش پروموت    </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('/ad/promotes/edit-promote/'.$pros->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نوع پروموت  (en)</label>
                                            <select required name="promote_type" id="promote_type" class="form-control">
                                                <option value="">نوع پروموت</option>
                                                <option @if($pros->type="sidesliderone") selected @endif value="sidesliderone">کنار اسلایدر 1 </option>
                                                <option @if($pros->type="sideslidertwo") selected @endif value="sideslidertwo">کنار اسلایدر 2 </option>
                                            </select>
                                        </div>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">لینک دلخواه   </label>
                                                        <input name="url" value="{{  $pros->url??'' }}" type="text" class="form-control"
                                                               id="url"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input name="cover_img" type="hidden" value="{{ $pros->path }}">
                                                @if(!empty($pros->path))
                                                    <img style="width:100px;" alt=""
                                                         src="{{ asset($pros->path) }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input @if($pros->status="1") checked @endif type="checkbox" class="form-check-input" id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت  </label>
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

