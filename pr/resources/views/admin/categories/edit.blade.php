@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ویرایش دسته بندی </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ویرایش دسته بندی</li>
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
                                <h3 class="card-title">ویرایش دسته بندی </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/categories/edit/'.$category->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">نام دسته بندی </label>
                                            <input required name="title" value="{{ $category->title }}" type="text" class="form-control"
                                                   id="exampleInputEmail1"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">توضیحات</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">انتخاب دسته بندی:</label>
                                            <select   {{ $category->parent_id=="0"?'disabled':'' }}  name="category_id" id="category_id" class="form-control">
                                                <option value="">دسته بندی مادر</option>
                                                @forelse($categories as $row)
                                                    <option @if($category->parent_id==$row->id) selected @endif value="{{ $row->id }}">{{ $row->title }}</option>
                                                    @if(count($row->parent) > 0)
                                                        @include('admin.partials.category', ['categories'=>$row->parent, 'level'=>1, 'selected_category'=>$category])
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-check">
                                            <input  {{ $category->status=="1"?'checked':'' }} type="checkbox" class="form-check-input" id="status" name="status"
                                                   value="1">
                                            <label class="form-check-label" for="exampleCheck1">وضعیت دسته بندی</label>
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
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: {fa: true}
            });
        })
    </script>
@endsection
