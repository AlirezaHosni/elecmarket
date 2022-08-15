@extends('auth.layouts.design')
@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

            <form action="/" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="ایمیل">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> یاد آوری من
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
{{--                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>--}}
                        <a href="/" class="btn btn-block btn-primary">
                            <i class="fa fa-facebook mr-2"></i>ارسال
                        </a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">رمز عبورم را فراموش کرده ام.</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
