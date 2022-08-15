@extends('account.layouts.design')
@section('content')
    @php
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userDetails = \App\User::find($user_id);
            $userProfileDetails = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
    @endphp
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="col-md-3 offset-2">
                    <a class="btn btn-success" href="{{ route('user.address.add') }}">ایجاد آدرس</a>
                </div>
            </div>
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
            <!-- End Page Header -->
            <div class="row flex-row">
                <div class="col-12">
                    <!-- Form -->

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
                                    @forelse($get as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->address }}</th>
                                            <th>{{ $row->province->name??'' }}</th>
                                            <th>{{ $row->city->name??'' }}</th>
                                            <th>{{ $row->tel??'' }}</th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <th>
                                                <a href="{{ url('/user/addresses/edit/'.$row->id) }}"
                                                   style="margin-right: 10px;margin-left: 10px;">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <a id="delRole" rel="{{ $row->id }}"
                                                   rel1="addresses/del"
                                                   href="javascript:"
                                                   class="deleteRecord">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </th>
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
                    window.location.href = "/user/" + deleteFunction + "/" + id;
                });

        });
    </script>
@endsection
