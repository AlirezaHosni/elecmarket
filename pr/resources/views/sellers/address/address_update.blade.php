@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش آدرس</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش آدرس</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> ایجاد</h4>
                        </div>
                        <div class="widget-body">
                            <form action="{{ url('/sellers/addresses/update/'.$address->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">آدرس
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea  name="address" required class="form-control" cols="30" rows="10">{{ $address->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">کد پستی
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" required name="zip_code" class="form-control"
                                               value="{{ $address->zip_code }}">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">تلفن ثابت
                                    </label>
                                    <div class="col-lg-8">
                                        <input required type="text" name="tel" class="form-control"
                                               value="{{ $address->tel }}">
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
                url: "/get-city",
                type: "POST",
                data: {province_id: province_id}
            }).done(function (msg) {
                $("#city").html(msg)
            });
        });
    </script>

@endsection

