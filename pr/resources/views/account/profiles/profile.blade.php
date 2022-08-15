@extends('account.layouts.design')
@section('content')
    @php
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userDetails = \App\User::find($user_id);
            $userProfileDetails = \App\Profile::with('user')->where('user_id', $user_id)->first();
           // dd($userProfileDetails);
        }
    @endphp
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش پروفایل</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش پروفایل</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> پروفایل</h4>
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
                            <form action="{{ route('profile.user') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">نام
                                    </label>
                                    <div class="col-lg-8">
                                        <input disabled type="text" name="first_name" class="form-control"
                                               value="{{ $userProfileDetails->first_name }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">فامیل
                                    </label>
                                    <div class="col-lg-8">
                                        <input disabled type="text" name="last_name" class="form-control"
                                               value="{{ $userProfileDetails->last_name }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">نام پدر
                                    </label>
                                    <div class="col-lg-8">
                                        <input disabled type="text" name="fname" class="form-control"
                                               value="{{ $userProfileDetails->fname }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">کد ملی
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="nationalcode" class="form-control"
                                               value="{{ $userProfileDetails->nationalcode }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">تاریخ تولد
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" id="date_of_birth" name="birth" class="form-control tavalodRooz"
                                               value="{{ $userProfileDetails->birth }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">پروفایل
                                    </label>
                                    <div class="col-lg-7">
                                        <input type="file" name="path" class="form-control"
                                               value="{{ $userProfileDetails->path }}">
                                    </div>
                                    <input name="avatar_img" type="hidden"
                                           value="{{ $userProfileDetails['path']??'' }}">
                                    <div class="col-xxl-3">
                                        @if(!empty($userProfileDetails['path']))
                                            <img style="width:75px;"
                                                 src="{{ asset($userProfileDetails['path']??'') }}">
                                        @endif
                                    </div>
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
@section('links')
    <link href="{{url('assets/css/persian-datepicker.min.css')}}" rel="stylesheet"/>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ url('assets/js/persian-date.min.js')}}"></script>
    <script>
        $('.tavalodRooz').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD'
        });
    </script>
@endsection
