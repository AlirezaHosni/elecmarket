@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش پسورد</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش پسورد</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> پسورد</h4>
                        </div>
                        <div class="widget-body">
                            <div class="col-10 ml-auto">
                                <div class="section-title mt-3 mb-3">
                                    <h4>01. اطلاعات شخصی</h4>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">نام
                                    کاربری</label>
                                <div class="col-lg-8">
                                    <input disabled type="text" class="form-control"
                                           placeholder="{{ $userDetails->username }}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label
                                    class="col-lg-2 form-control-label d-flex justify-content-lg-end">تلفن</label>
                                <div class="col-lg-8">
                                    <input disabled type="text" class="form-control" placeholder="{{ $userDetails->phone }}">
                                </div>
                            </div>
                            <div class="col-10 ml-auto">
                                <div class="section-title mt-3 mb-3">
                                    <h4>02. بروز رسانی پسورد </h4>
                                </div>
                            </div>
                            <form action="{{ route('sellers.password') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="account-pass">رمز عبور قدیمی</label>
                                    <input class="form-control" type="password" name="current_pwd" id="current_pwd"
                                           placeholder="*********">
                                    <span class="bar"></span>
                                    <span id="chkPwd"></span>
                                </div>
                                <div class="form-group">
                                    <label for="account-pass">رمز عبور جدید</label>
                                    <input class="form-control" type="password" name="new_pwd" id="new_pwd"
                                           placeholder="*********">
                                    <span class="bar"></span>
                                    <span id="chkPwd"></span>
                                </div>
                                <div class="form-group">
                                    <label for="account-pass"> تکرار رمز عبور جدید </label>
                                    <input class="form-control" type="password" name="confirm_pwd" id="confirm_pwd"
                                           placeholder="*********">
                                    <span class="bar"></span>
                                    <span id="chkPwd"></span>
                                </div>
                                <div class="em-separator separator-dashed"></div>
                                <div class="text-right">
                                    <button class="btn btn-gradient-01" type="submit">ذخیره تغییرات</button>
                                    <button class="btn btn-shadow" type="reset">لغو</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#current_pwd").keyup(function () {
            var current_pwd = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '{{ url('/sellers/check-user-pwd') }}',
                data: {
                    current_pwd: current_pwd
                },
                success: function (resp) {
                    /*alert(resp);*/
                    if (resp == "false") {
                        $("#chkPwd").html("<font color='red'>کلمه عبور فعلی نادرست است</font>");
                    } else if (resp == "true") {
                        $("#chkPwd").html("<font color='green'>گذرواژه فعلی صحیح است</font>");
                    }
                },
                error: function () {
                    alert("Error");
                }
            });
        });
    </script>
@endsection

