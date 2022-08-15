@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">کیف پول کاربران</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">کیف پول کاربران</li>
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
                            <h4>کیف پول کاربران </h4>
                        </div>
                        <div class="widget-body">
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="money_total" value="{{ $user->money_total }}">
                                <div class="form-group">
                                    <label for="account-pass">مبلغ موجود کیف پول ریال </label>
                                    <input disabled class="form-control" type="text"
                                           value="{{ $user->money_total }}">
                                </div>
                                @if($user->money_total > 100000)
                                    <div class="em-separator separator-dashed"></div>
                                    <div class="form-group">
                                        <label for="account-pass">مبلغ درخواست از موجودی کیف پول(درخواست شما نباید از
                                            موجودی بیشتر باشد) </label>
                                        <input required class="form-control" type="number" name="price_request"
                                               value="{{ $user->money_total }}">
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-gradient-01" type="submit">درخواست</button>
                                        <button class="btn btn-shadow" type="reset">لغو</button>
                                    </div>
                                @else
                                    <label for="">مبلغ کیف پول شما مناسب نیست</label>
                                @endif
                            </form>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-12">
                    <!-- Form -->
                    @include('layouts.errors')
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>کیف پول کاربران </h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>شماره بانک</th>
                                        <th>درصد</th>
                                        <th>مبلغ واریزی</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($transaction as $key => $row)
                                        <tr>
                                            <th>{{ $key+=1 }}</th>
                                            <th>{{ $row->user->phone??'' }}</th>
                                            <th>{{ $row->user->bank_account??'' }}</th>
                                            <th>{{ $row->percent	??'' }}%</th>
                                            <th>{{ $row->amount	??'' }}</th>
                                            <th>
                                                @if($row->status=="pending")
                                                    <span
                                                        style="color: #00a65a">در حال حاضر اعتبار مورد نظر تایید نشده</span>
                                                @endif

                                            </th>
                                            <th>{{ Verta($row->created_at)->format('%d %B %Y') }}</th>
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
