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
                            <form action="{{ route('sellers.address') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">آدرس
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea name="address" required class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">استان
                                    </label>
                                    <div class="col-lg-8">
                                        <select name="province_id" id="province" class="form-control">
                                            <option value="">انتخاب استان</option>
                                            @forelse($pr as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
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
                                               value="">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">تلفن ثابت
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tel" class="form-control"
                                               value="">
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
            <!-- End Page Header -->
            <div class="row flex-row">
                <div class="col-12">
                    <!-- Form -->
                    @include('layouts.errors')
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>نمایش آدرس </h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ادرس </th>
                                        <th>استان</th>
                                        <th>شهر</th>
                                        <th>شماره تماس</th>
                                        <th>تاریخ</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($address as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->address }}</th>
                                            <th>{{ $row->province->name??'' }}</th>
                                            <th>{{ $row->city->name??'' }}</th>
                                            <th>{{ $row->tel??'' }}</th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <td>
                                                <a href="{{ url('/sellers/addresses/update/'.$row->id) }}"
                                                   style="margin-right: 10px;margin-left: 10px;color: #0b0b0b">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a id="delRole" rel="{{ $row->id }}"
                                                   rel1="addresses/del"
                                                   href="javascript:"
                                                   class="deleteRecord">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                            </td>
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
                url: "{{ url('/get-city') }}",
                type: "POST",
                data: {province_id: province_id}
            }).done(function (msg) {
                $("#city").html(msg)
            });
        });
    </script>
    <script>
        $(document).on('click', '.deleteRecord', function (e) {
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "شما مطمئن هستید؟",
                    text: "شما نمیتوانید این رکورد را دوباره بازیابی کنید!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "بله، آن را حذف کنید!",
                    closeOnConfirm: false
                },
                function () {
                    window.location.href = "{{ url('/sellers/') }}" + "/" + deleteFunction + "/" + id;
                });

        });
    </script>

@endsection

