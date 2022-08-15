@extends('sellers.layouts.design')
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
                        <h2 class="page-header-title">مرجوع کالا </h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">مرجوع کالا</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> مرجوع کالا</h4>
                        </div>
                        <div class="widget-body">

                            <form action="{{ url('/products/referral') }}" method="post" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="group-input">
                                    <div class="form-control">
                                        <span>انتخاب سفارش </span>
                                        <select name="order_id" id="order_id">
                                            <option value="">انتخاب</option>
                                            @forelse($orderall as $row)
                                                <option value="{{ $row->id }}">مبلغ سفارش : {{ $row->total }}
                                                    -{{ $row->tracking_code }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="flname">
                                        <span>انتخاب محصول </span>
                                        <select id="product_id" size="1" name="product_id" required>
                                            <option selected="selected" style="display: none;"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="group-input">
                                    <div class="flname">
                                        <span>دلیل مرجوعی محصولات  </span>
                                        <textarea name="referral_text" id="referral_text" cols="30" rows="10">

                        </textarea>
                                    </div>
                                </div>
                                <div class="foot">
                                    <button type="submit" class="btn-checked">مرجوع</button>
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
    <script>
        $("#order_id").on('change', function () {
            var order_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/get-product') }}",
                type: "POST",
                data: {order_id: order_id}
            }).done(function (msg) {
                $("#product_id").html(msg)
            });
        });
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('پسورد تایید شد').css('color', 'green');
            } else
                $('#message').html('پسورد را به درستی وارد نکرده اید').css('color', 'red');
        });
        $('#donator').on('keyup', function () {
            var donator = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/checkdonator') }}",
                type: "POST",
                data: {donator: donator}
            }).done(function (msg) {
                if (msg == "true") {
                    $("#alert").html('کد معرف به درستی وارد شد لطفا تمامی مقادیر را پر کنید').css('color', 'green');
                    document.querySelector(".checkmarf").style.display = 'block';
                } else {
                    $('#alert').html('لطفا با دقت کد معرف را وارد کنید').css('color', 'red');
                    document.querySelector(".checkmarf").style.display = 'none';
                    //
                }
                //alert(msg);

            }).fail(function (msg) {
                //$('#alert').html('پسورد را به درستی وارد نکرده اید').css('color', 'red');
            });

        });
    </script>
@endsection
