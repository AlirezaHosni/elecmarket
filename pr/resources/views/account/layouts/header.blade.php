<header class="header">
    <?php
    use App\Profile;if (Auth::check()) {
        $user_id = Auth::user()->id;
        $profiles = Profile::where('user_id', $user_id)->first();
    }
    ?>
    <nav class="navbar fixed-top">
        <!-- Begin Search Box-->
        <!-- End Search Box-->
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="{{ route('account') }}" class="navbar-brand">
                    <div class="brand-image brand-big">
                        <img src="{{ asset($settings->logo_path??'assets/front/logo/logo.png') }}" alt="logo"
                             class="logo-big">
                    </div>
                    <div class="brand-image brand-small">
                        <img src="{{ asset($settings->logo_path??'assets/front/logo/logo.png') }}" alt="logo"
                             class="logo-small">
                    </div>
                </a>
                <!-- Toggle Button -->
                <a id="toggle-btn" href="#" class="menu-btn active">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <a target="_blank" href="{{ url('/') }}" class="menu-btn">نمایش سایت </a>
                <!-- End Toggle -->
            </div>
            <!-- End Logo -->
            <!-- Begin Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                <!-- Search -->
                <!-- End Search -->
                <!-- Begin Notifications -->
                <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#"
                                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                 class="nav-link"><i
                            class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu notification">
                        <li>
                            <div class="notifications-header">
                                <div class="title">اعلان ها (4)</div>
                                <div class="notifications-overlay"></div>
                                <img src="{{ asset('assets/accounts/img/notifications/01.jpg') }}" alt="..."
                                     class="img-fluid">
                            </div>
                        </li>
                        <li>
                            <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">مشاهده همه
                                اعلانها</a>
                        </li>
                    </ul>
                </li>
                <!-- End Notifications -->
                <!-- User -->
                <li class="nav-item dropdown">
                    <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" class="nav-link">
                        <img src="{{ asset($profiles->path??'assets/accounts/img/avatar/avatar-01.jpg') }}" alt="..."
                             class="avatar rounded-circle"></a>
                    <ul aria-labelledby="user" class="user-size dropdown-menu">
                        <li class="welcome">
                            <a href="#" class="edit-profil"><i class="la la-gear"></i></a>

                            <img src="{{ asset($profiles->path??'assets/accounts/img/avatar/avatar-01.jpg') }}"
                                 alt="..."
                                 class="rounded-circle">
                        </li>
                        <li>
                            <a href="{{ route('account') }}" class="dropdown-item">
                                پروفایل
                            </a>
                        </li>
                        <li class="separator"></li>
                        <li><a rel="nofollow" href="{{ route('user-logout') }}"
                               class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                    </ul>
                </li>
                <!-- End User -->
                <!-- Begin Quick Actions -->

                <!-- End Quick Actions -->
            </ul>
            <!-- End Navbar Menu -->
        </div>
        <!-- End Topbar -->
    </nav>
</header>
