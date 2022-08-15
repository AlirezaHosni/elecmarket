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
                                    <h4> اطلاعات شخصی</h4>
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
                                    <input disabled type="text" class="form-control"
                                           placeholder="{{ $userDetails->phone }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>کد معرف :
                                {{ $userDetails->identifiercode??'' }}
                            </h4>
                        </div>
                        <div class="widget-body">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">نام و نام خانوادگی</label>
                                <div class="col-lg-8">
                                    <label   class="form-control">
                                        {{ $userProfileDetails->first_name??'' }}  {{ $userProfileDetails->last_name??'' }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">پست الکترونیک :</label>
                                <div class="col-lg-8">
                                    <label   class="form-control">
                                        {{ $userDetails->email??'' }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">  کد ملی:</label>
                                <div class="col-lg-8">
                                    <label   class="form-control">
                                        {{ $userProfileDetails->nationalcode??'' }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <div class="col-lg-8">
                                    <a href="{{ route('profile.user') }}"
                                       class="btn-link-spoiler btn-link-spoiler--edit"><i
                                            class="fa fa-pen"></i> ویرایش اطلاعات شخصی</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row flex-row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>نمایش سفارشات من </h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شماره سفارش  </th>
                                        <th>تاریخ </th>
                                        <th>مبلغ کل  </th>
                                        <th>عملیات سفارشات  </th>
                                        <th>جزییات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $user_id = Auth::user()->id;
                                         $get = App\Order::where(['user_id' => $user_id])->latest()->get();
                                    @endphp
                                    @forelse($get as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->tracking_code }}</th>
                                            <th>{{ Verta($row->updated_at)->format('%d %B %Y H:i') }}</th>
                                            <th>{{ $row->total??'' }} تومان </th>
                                            <th>{{ $row->order_status=="PAY-OK"?'پرداخت تایید شد':'پرداخت نشد' }}</th>
                                            <th><a href="{{ url('/user/orders/'.$row->id) }}"><i class="fa fa-chevron-left"></i></a></th>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
