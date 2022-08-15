@extends('auth.layouts.design')
@section('content')

    <div class="login-logo">
        <a href="/"><b>ورود به کنترل پنل </b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        @include('layouts.errors')
        <div class="card-body login-card-body">
            <form id="login" tabindex="500" method="POST" action="{{ url('/ad/login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="شماره تماس" name="phone">
                    <div class="input-group-append">
                        <span class="fa fa-phone input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
