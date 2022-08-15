@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">لیست مشتریان</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">لیست مشتریان</li>
                            </ul>
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
                            <h4>لیست مشتریان </h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>نام کاربری</th>
                                        <th>استان</th>
                                        <th>تاریخ ثبت نام</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($marks as $key => $row)
                                        @php
                                            $user_id = $row->id;
                                            $address = App\Address::where(['user_id' => $user_id])->first()->province_id;
                                            $profile = App\Profile::where(['user_id' => $user_id])->first();
                                            if (isset($profile)) {
                                                $profile_name = $profile->first_name."".$profile->last_name;
                                            }else{
                                                $profile_name = "";
                                            }
                                            if (isset($address)) {
                                                $state = \App\Province::where(['id' => $address])->first()->name;
                                            } else {
                                                $state = "";
                                            }
                                        @endphp
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <td>{{ $profile_name }}</td>
                                            <th>{{ $row->username }}</th>
                                            <th>
                                                {{ $state }}
                                            </th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
                                            <td>
                                                <a href="{{ url('/sellers/orders/genology/'.$row->id) }}"
                                                   style="margin-right: 10px;margin-left: 10px;color: #0b0b0b">
                                                    <i class="la la-folder-open"></i>
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
                    window.location.href = "/sellers/" + deleteFunction + "/" + id;
                });

        });
    </script>
@endsection
