@extends('admin.layouts.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ایجاد نقش کارمند </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('ad.dashboard') }}">خانه</a></li>
                            <li class="breadcrumb-item active"> ایجاد نقش کارمند</li>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ایجاد نقش کارمند </h3>
                                @include('layouts.errors')
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form method="post" action="{{ url('ad/users/roles/'.$user->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نقش </label>
                                                    <select required name="roles" id="roles" class="form-control">
                                                        <option value="">انتخاب نقش کارمندان و مدیران</option>
                                                        @forelse($roles as $role)
                                                            <option
                                                                @if($rolesname!=null)
                                                                {{ $role->name==$rolesname?'selected':'' }}
                                                                    @endif
                                                                value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
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

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
