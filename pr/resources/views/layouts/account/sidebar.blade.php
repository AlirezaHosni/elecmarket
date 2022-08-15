<?php
if (Auth::check()) {
    $user_id = Auth::user()->id;
    $usersget = App\User::where(['id' => $user_id])->first()->type_identity;
//var_dump($usersget);
} else {
    $usersget = "none";
}
?>
<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <span class="heading">جزییات پروفایل </span>

        <ul class="list-unstyled">
            <li class="active"><a href="#dropdown-db" aria-expanded="true" data-toggle="collapse"><i
                        class="la la-columns"></i><span>داشبورد</span></a>
            </li>
            <li><a href="#profile" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-users"></i><span>پروفایل </span></a>
                <ul id="profile" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('profile.user') }}">جزییات پروفایل</a></li>
                </ul>
            </li>
        </ul>
        <span class="heading">سفارشات  </span>
        <ul class="list-unstyled">
            <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-puzzle-piece"></i><span>سفارشات من </span></a>
                <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('order.user') }}">سفارشات من</a></li>
                    <li><a href="{{ route('product.referral') }}">مرجوع کالا </a></li>
                </ul>
            </li>

        </ul>
        <ul class="list-unstyled">
            <li><a href="#card" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-credit-card"></i><span>کارت بانکی   </span></a>
                <ul id="card" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('user.card') }}">کارت بانکی </a></li>

                </ul>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="#address" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-plus"></i><span>آدرس   </span></a>
                <ul id="address" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('address.user') }}">آدرس </a></li>

                </ul>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="{{ route('user-logout') }}"><i class="la la-spinner"></i><span>خروج</span></a></li>
        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
