@extends('sellers.layouts.auth.design')
@section('content')
    <!-- Begin Container -->
    <div class="container-fluid no-padding h-100">
        <div class="row flex-row h-100 bg-white">
            <!-- Begin Left Content -->
            <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
                <div class="seenbord-bg background-03">
                    <div class="seenboard-overlay overlay-08"></div>
                    <div class="authentication-col-content-2 mx-auto text-center">
                        <div class="logo-centered">
                            <a href="{{ url('/') }}">
                                <img
                                    src="{{ asset($settings->logo_path??'http://elecmarketing.com/assets/front/images/logo.png') }}"
                                    alt="logo">
                            </a>
                        </div>
                        <h1>ورود در شبکه</h1>
                        <span class="description">
                            ورود به پنل فروشندگان و بازاریابان و عاملان فروش
                            </span>
                    </div>
                </div>
            </div>
            <!-- End Left Content -->
            <!-- Begin Right Content -->
            <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
                <!-- Begin Form -->
                <div class="authentication-form-2 mx-auto">
                    <div class="tab-content" id="animate-tab-content">
                        <!-- Begin Sign In -->
                        <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                            <h3>خوش آمدید</h3>
                            <form id="login" tabindex="500" method="POST" action="{{ url('/sellers/login') }}">
                                @csrf
                                <div class="group material-input">
                                    <input type="text" name="username" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>نام کاربری فروشندگان:</label>
                                </div>
                                <div class="group material-input">
                                    <input type="password" name="password" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>پسورد</label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-gradient-01">
                                    ورود
                                </button>
                            </form>
                        </div>
                        <!-- End Sign In -->
                        <!-- Begin Sign Up -->
                        <!-- End Sign Up -->
                    </div>
                </div>
                <!-- End Form -->
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
@endsection
