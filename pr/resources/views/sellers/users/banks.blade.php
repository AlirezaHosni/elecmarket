@extends('sellers.layouts.design')
@section('content')
    <div class="content-inner">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">نمایش حساب بانکی</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="ti ti-home"></i></a></li>
                                <li class="breadcrumb-item active">نمایش حساب بانکی</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-xl-12">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4> حساب بانکی</h4>
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
                                           placeholder="{{ $users->username }}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label
                                    class="col-lg-2 form-control-label d-flex justify-content-lg-end">تلفن</label>
                                <div class="col-lg-8">
                                    <input disabled type="text" class="form-control" placeholder="{{ $users->phone }}">
                                </div>
                            </div>
                            <div class="col-10 ml-auto">
                                <div class="section-title mt-3 mb-3">
                                    <h4>02. بروز رسانی حساب بانکی </h4>
                                </div>
                            </div>
                            <form action="{{ route('sellers.bank.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="xnumber" class="hidden" value="{{ $users->card_bank }}">
                                <div class="credit-card-wrapper form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">شماره کارت
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" name="card_bank" id="cardnumber"

                                               class="cartbank number credit-card-number form-control"
                                               value="{{ $users->card_bank??old('card_bank') }}">
                                        <p id="card_er"
                                           style="display: none; color: red;margin: 2% 0 0 0;background: #ffff0029;padding-right: 5%;">
                                            شماره کارت اشتباه می باشد</p>
                                    </div>
                                    <div class="col-lg-1">
                                        <img width="32px" id="img0" src="">
                                    </div>

                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">شماره شبا
                                    </label>
                                    <div class="col-lg-4">
                                        <input required type="text" name="code_shaba" class="code_shaba form-control"
                                               value="{{ $users->code_shaba??old('code_shaba') }}">
                                    </div>
                                    <div class="col-lg-1">
                                        IR
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
    <script src="{{ asset('assets/js/credit-card-input.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".cartbank").each(function () {
                var num = $(this).val();
                sunnyweb_check_number(num);

                var commaNum = numbercartWithCommas(num);

                $(this).val(commaNum);
            });
            $(".cartbank").change(function () {
                var num = $(this).val();
                sunnyweb_check_number(num);
                var commaNum = numbercartWithCommas(num);

                $(this).val(commaNum);
            });


        });

        function numbercartWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{4})+(?!\d))/g, "-");
            return parts.join(".");
        }
        function sunnyweb_check_number(num) {
            var xnumber = document.getElementById("xnumber").value;

            function numberx(xnumber) {
                var parts = xnumber.toString().split("-");
                parts[0] = parts[0].replace(/\B(?=(\d{4})+(?!\d))/g, "");
                return parts.join("");
            }

            var xnumber = numberx(xnumber);
            document.getElementById('card_er').style.display = 'none';
            function validateCard(code) {
                var L = code.length;
                if (L < 16 || parseInt(code.substr(1, 10), 10) == 0 || parseInt(code.substr(10, 6), 10) == 0) return false;
                var c = parseInt(code.substr(15, 1), 10);
                var s = 0;
                var k, d;
                for (var i = 0; i < 16; i++) {
                    k = (i % 2 == 0) ? 2 : 1;
                    d = parseInt(code.substr(i, 1), 10) * k;
                    s += (d > 9) ? d - 9 : d;
                }
                return ((s % 10) == 0);
            }

            if (validateCard(xnumber) === false) document.getElementById('card_er').style.display = 'block';
            var number = num.substring(6, -16);
            var imgToSwap = document.getElementById("img0");

            if (number === '603799') {
                imgToSwap.src = "{{ asset('assets/bank/meli.png') }}";
            }
            if (number === '589210') {
                imgToSwap.src = "{{ asset('assets/bank/sepah.png') }}";
            }
            if (number === '627961') {
                imgToSwap.src = "{{ asset('assets/bank/sanatmadan.png') }}";
            }
            if (number === '603770') {
                imgToSwap.src = "{{ asset('assets/bank/keshavarsi.png') }}";
            }
            if (number === '628023') {
                imgToSwap.src = "{{ asset('assets/bank/maskan.png') }}";
            }
            if (number === '627760') {
                imgToSwap.src = "{{ asset('assets/bank/postbank.png') }}";
            }
            if (number === '502908') {
                imgToSwap.src = "{{ asset('assets/bank/tosehe.png') }}";
            }
            if (number === '627412') {
                imgToSwap.src = "{{ asset('assets/bank/eghtesad.png') }}";
            }
            if (number === '622106') {
                imgToSwap.src = "{{ asset('assets/bank/parsian.png') }}";
            }
            if (number === '502229') {
                imgToSwap.src = "{{ asset('assets/bank/pasargad.png') }}";
            }
            if (number === '627488') {
                imgToSwap.src = "{{ asset('assets/bank/karafarin.png') }}";
            }
            if (number === '621986') {
                imgToSwap.src = "{{ asset('assets/bank/saman.png') }}";
            }
            if (number === '639346') {
                imgToSwap.src = "{{ asset('assets/bank/sina.png') }}";
            }
            if (number === '639607') {
                imgToSwap.src = "{{ asset('assets/bank/sarmaye.png') }}";
            }
            if (number === '502806') {
                imgToSwap.src = "{{ asset('assets/bank/shahr.png') }}";
            }
            if (number === '504706') {
                imgToSwap.src = "{{ asset('assets/bank/shahr.png') }}";
            }
            if (number === '502938') {
                imgToSwap.src = "{{ asset('assets/bank/day.png') }}";
            }
            if (number === '603769') {
                imgToSwap.src = "{{ asset('assets/bank/saderat.png') }}";
            }
            if (number === '610433') {
                imgToSwap.src = "{{ asset('assets/bank/mellat.png') }}";
            }
            if (number === '627353') {
                imgToSwap.src = "{{ asset('assets/bank/tejarat.png') }}";
            }
            if (number === '589463') {
                imgToSwap.src = "{{ asset('assets/bank/refah.png') }}";
            }
            if (number === '627381') {
                imgToSwap.src = "{{ asset('assets/bank/ansar.png') }}";
            }
            if (number === '639370') {
                imgToSwap.src = "{{ asset('assets/bank/mehreqtesad.png') }}";
            }
            if (number === '639599') {
                imgToSwap.src = "{{ asset('assets/bank/ghavamin.png') }}";
            }
            if (number === '504172') {
                imgToSwap.src = "{{ asset('assets/bank/resalat.png') }}";
            }
        }
    </script>
@endsection

