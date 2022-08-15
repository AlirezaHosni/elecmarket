<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('bazaryab.dashborad') }}" class="brand-link">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <p>نام کاربری:</p>
                </div>
                @php
                    $user_id = Auth::user()->id;
                     $userDetails = App\User::find($user_id);
                     session(['bazaryabSession', $userDetails->phone]);
                @endphp
                <div class="info">
                    <a href="{{ route('bazaryab.dashborad') }}" class="d-block">{{ $userDetails->phone }}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبوردها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">کاتالوگ</li>


                    <li class="nav-header">پروسانت ها </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-pagelines"></i>
                            <p>
                               پورسانت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> پورسانت ها  </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> درخواست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('bazaryab.logout') }}" class="nav-link">
                            <i class="nav-icon fa fa-circle-o"></i>
                            <p>خروج از پنل</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
