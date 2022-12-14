@extends('auth.layouts.design')
@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">ثبت نام کاربر جدید</p>

            <form action="../../index.html" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="نام و نام خانوادگی">
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span>
                    </div>
                </div>
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
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="تکرار رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> با <a href="#">شرایط</a> موافق هستم
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- یا -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i>
                    ثبت نام با اکانت فیس بود
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i>
                    ثبت نام با گوگل
                </a>
            </div>

            <a href="login.html" class="text-center">من قبلا ثبت نام کرده ام</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
@endsection
