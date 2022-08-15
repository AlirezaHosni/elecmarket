<?php
if (Auth::check()) {
    $user_id = Auth::user()->id;
    $usersget = App\User::where(['id' => $user_id])->first()->type_identity;
} else {
    $usersget = "none";
}
?>
<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled">
            <li class="active" style="
    margin-right: 5%;
    font-size: 1.5em;
    color: #5bc0de;
    margin-bottom: 5%;
    margin-top: 5%;
"><span>داشبورد</span>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="#profile" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-users"></i><span>پروفایل </span></a>
                <ul id="profile" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('sellers.profile') }}">جزییات پروفایل</a></li>
                    <li><a href="{{ route('sellers.password') }}"> پسورد</a></li>
                </ul>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="#dropdown-cus" aria-expanded="false" data-toggle="collapse"><i class="la la-user-plus"></i><span>جینالوژی  </span></a>
                <ul id="dropdown-cus" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('sellers.genology.show') }}">جینالوژی </a></li>

                </ul>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="#banks" aria-expanded="false" data-toggle="collapse"><i class="la la-bank"></i><span>حساب بانکی  </span></a>
                <ul id="banks" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('sellers.bank.update') }}">حساب بانکی </a></li>

                </ul>
            </li>
        </ul>
        @if($usersget=="marketer")
        @elseif($usersget=="none")
        @else


            <ul class="list-unstyled">
                <li><a href="#dropdown-cat" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-bars"></i><span>دسته بندی ها </span></a>
                    <ul id="dropdown-cat" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('sellers.cat.show') }}">دسته بندی</a></li>
                    </ul>
                </li>
                <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-shopping-cart"></i><span>سفارشات من </span></a>
                    <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('sellers.orders.show') }}">سفارشات من</a></li>
                        <li><a href="{{ route('sellers.orders.user.show') }}">سفارشات مشتریان</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="list-unstyled">
                <li><a href="#dropdown-order" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-shekel"></i><span> مرجوع کالا </span></a>
                    <ul id="dropdown-order" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('sellers.referal.prodect') }}">مرجوع کالا </a></li>
                    </ul>
                </li>
            </ul>
        @endif
        <ul class="list-unstyled">
            <li><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-share-alt"></i><span>کیف پول  </span></a>
                <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('sellers.wallets') }}">کیف پول </a></li>

                </ul>
            </li>
        </ul>

        <ul class="list-unstyled">
            <li><a href="#address" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-plus"></i><span>آدرس   </span></a>
                <ul id="address" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('sellers.address') }}">آدرس </a></li>

                </ul>
            </li>
        </ul>
        <ul class="list-unstyled">
            <li><a href="{{ route('sellers.out') }}"><i class="la la-spinner"></i><span>خروج</span></a></li>
        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
