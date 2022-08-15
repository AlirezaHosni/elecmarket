@extends('admin.layouts.design')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>نمایش دسترسی نقش موجود </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active">نمایش دسترسی نقش موجود</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                @include('layouts.errors')

                <div class="row">
                    <a href="{{ route('admin.roles.all') }}" class="btn btn-danger">
                        برگشت به نقش ها
                    </a>
                    {{--                    <a href="{{ route('admin.permissions.add') }}" class="btn btn-success">--}}
                    {{--                        ایجاد دسترسی--}}
                    {{--                    </a>--}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">نمایش دسترسی نقش ({{ $role->name }})</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ url('ad/role/permissions/'.$role->id) }}" method="post"
                                  enctype="multipart/form">
                                <div class="card-body">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            @forelse($permissions as $key => $row)
                                                {{--                                                {{ $role->permissions['name']==$row->name?'checked':'' }}--}}

                                                <div class="col-lg-3">
                                                    <div class="form-check">
                                                        <input
                                                            @if ($index!=null)
                                                            @foreach($index as $rox)
                                                            {{ $rox==$row->name?'checked':'' }}
                                                            @endforeach
                                                            @endif
                                                            name="permissions[]" class="form-check-input"
                                                            type="checkbox"
                                                            value="{{ $row->name }} ">
                                                        <label class="form-check-label">{{ $row->title }} </label>
                                                    </div>
                                                </div>

                                            @empty
                                                <p>دسترسی نقش موجود نیست</p>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
                                </div>
                            </form>
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

