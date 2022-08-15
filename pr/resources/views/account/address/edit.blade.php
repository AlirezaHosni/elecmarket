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
                        <h2 class="page-header-title">ویرایش آدرس</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">ویرایش آدرس</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> ویرایش</h4>
                        </div>
                        <div class="widget-body">
                            <form action="{{ url('user/addresses/edit/'.$get->id) }}" method="post"
                                  class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">آدرس
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea name="address" required class="form-control" cols="30"
                                                  rows="10">{{ $get->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">استان
                                    </label>
                                    <div class="col-lg-8">
                                        <select name="province_id" id="province" class="form-control">
                                            <option value="">انتخاب استان</option>
                                            @forelse($province as $row)
                                                <option
                                                    {{ $row->id==$get->province_id?"selected":"" }} value="{{ $row->id }}">{{ $row->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">شهر
                                    </label>
                                    <div class="col-lg-8">
                                        <select name="city_id" id="city" class="form-control">
                                            <option value="">انتخاب شهر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">کد پستی
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="zip_code" class="form-control"
                                               value="{{ $get->zip_code }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">تلفن ثابت
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tel" class="form-control"
                                               value="{{ $get->tel }}">
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
            <!-- End Row -->
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $("#province").on('change', function () {
            var province_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ url('/get-city') }}',
                type: "POST",
                data: {province_id: province_id}
            }).done(function (msg) {
                $("#city").html(msg)
            });
        });
    </script>
@endsection
