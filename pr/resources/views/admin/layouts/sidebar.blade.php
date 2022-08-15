<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('ad.dashboard') }}" class="brand-link">
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
                     session(['adminSession', $userDetails->phone]);
                @endphp
                <div class="info">
                    <a href="{{ route('ad.dashboard') }}" class="d-block">{{ $userDetails->phone }}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('ad.dashboard') }}" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                پنل مدیریت
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->can('catalog'))
                        <li class="nav-header">کاتالوگ</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-shopping-basket"></i>
                                <p>
                                    کاتالوگ
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('catalog-products'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                محصولات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @if(auth()->user()->can('catalog-products-product-show'))
                                                <li class="nav-item">
                                                    <a href="{{ route('products.list') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>محصولات موجود</p>
                                                        <span
                                                            class="badge badge-info right">{{ App\Product::count() }}</span>
                                                    </a>
                                                </li>
                                            
                                            @endif
                                            @if(auth()->user()->can('catalog-products-product-countdown'))
                                                <li class="nav-item">
                                                    <a href="{{ route('countdown.list') }}" class="nav-link">
                                                        <i class="fa fa-clock-o"></i>
                                                        <p>محصولات شگفت انگیز </p>
                                                        <span
                                                            class="badge badge-info right">{{ App\Discount::count() }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(auth()->user()->can('catalog-products-product-stock'))
                                                <li class="nav-item">
                                                    <a href="{{ route('worked.list') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>محصولات استوک </p>
                                                        <span
                                                            class="badge badge-info right">{{ App\Worked::count() }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('catalog-category'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                دسته بندی&برند
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('categories.view') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>دسته بندی موجود </p>
                                                    <span
                                                        class="badge badge-info right">{{ App\Category::count() }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('brands.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>برند ها </p>
                                                    <span class="badge badge-info right">{{ App\Brand::count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('users'))
                        <li class="nav-header">مدیریت کاربران</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('user-sellers'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>فروشندگان
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('seller.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> لیست فروشنده گان</p>
                                                    <span
                                                        class="badge badge-info right">{{ App\User::where(['is_admin' => '0','is_seller' => '1'])->count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('user-customers'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>مشتریان
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('ad/customers') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>لیست مشتریان </p>
                                                    <span
                                                        class="badge badge-info right">{{ App\User::where(['is_admin' => '0','is_seller' => '0'])->count() }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('address.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>آدرس موجود </p>
                                                    <span
                                                        class="badge badge-info right">{{ App\Address::count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('user-users'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>کارمندان
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('ad/users/add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> کارمند جدید </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('ad/users') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> لیست کارمند جدید </p>
                                                    <span
                                                        class="badge badge-info right">{{ App\User::where(['is_admin' => '1','is_seller' => '0'])->count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('user-roles'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>نقش و دسترسی
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.roles.all') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> لیست نقش ها </p>
                                                    <span
                                                        class="badge badge-info right"></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.permissions.all') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> لیست دسترسی </p>
                                                    <span
                                                        class="badge badge-info right"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('order'))
                        <li class="nav-header">سفارشات</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-shopping-basket"></i>
                                <p>
                                    سفارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('order-orders'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                سفارشات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('cart.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>سبد خرید </p>
                                                    <span class="badge badge-info right">{{ App\Cart::count() }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('order.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>سفارشات </p>
                                                    <span class="badge badge-info right">{{ App\Order::count() }}</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ route('orders.status.all') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> وضعیت سفارشات </p>
                                                    <span
                                                        class="badge badge-info right">{{ App\OrderStatus::count() }}</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('order-paymant'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                پرداختی ها
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('ad.payments') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>پرداختی ها </p>
                                                    <span class="badge badge-info right">{{ App\Pay::count() }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('order-product-ref'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                مرجوع کالا
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('referral') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مرجوع </p>

                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('wallet'))
                        <li class="nav-header"> کیف پول</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-google-wallet"></i>
                                <p>
                                    کیف پول
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('wallet-view'))
                                    <li class="nav-item">
                                        <a href="{{ route('wallets.list') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تراکنش کیف پول </p>
                                        </a>
                                    </li>
                                @endif
                                @if(auth()->user()->can('wallet-user-show'))
                                    <li class="nav-item">
                                        <a href="{{ route('wallets.user') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p> کیف پول کاربران </p>
                                        </a>
                                    </li>
                                @endif
                                @if(auth()->user()->can('wallet-bank'))
                                    <li class="nav-item">
                                        <a href="{{ route('bank.user') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p> حساب بانک کاربران </p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('content'))
                        <li class="nav-header"> محتوا</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-newspaper-o"></i>
                                <p>
                                    محتوا
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('content-news'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                اخبار
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('news.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت اخبار </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('news.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد اخبار </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                سوالات متدوال
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('faq.cats.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> سوالات متداول  </p>
                                                </a>
                                            </li>
                                        
                                        </ul>
                                    </li>
                                @if(auth()->user()->can('content-honors'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                افتخارات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('honors.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت افتخارات </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('honors.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد افتخارات </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('content-articles'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                مقالات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('articles.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت مقالات </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('articles.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد مقالات </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('content-text'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>
                                                اعلانات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('texts.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت اعلانات </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('texts.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد اعلانات </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('front-site'))
                        <li class="nav-header"> فرانت</li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-desktop"></i>
                                <p>
                                    فرانت سایت
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(auth()->user()->can('front-site-pages'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>صفحات
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('page.view') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت صفحات </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('menu.all') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت منو </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('page.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد صفحات </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-pages-other'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>صفحات جانبی
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('support.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>ارتباط با ما </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('Complaints') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>نارضایتی </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('req.show') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> درخواست همکاری</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-request'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>درخواست سایت
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('reqforms.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> صفحات درخواست ها </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-gallery'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>اسلایدر سایت
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('sliders.view') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت اسلایدر </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('sliders.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد اسلایدر </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-gallery'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>گالری سایت
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('gallery.list') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> مدیریت گالری </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('gallery.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد گالری </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-promote'))
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>پروموت کنار اسلایدر
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('promote.list') }}" class="nav-link">
                                                    <i class="fa fa-product-hunts"></i>
                                                    <p> مدیریت پروموت </p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('promote.add') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> ایجاد پروموت </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-icon'))
                                    <li class="nav-item">
                                        <a href="{{ route('ad.icons') }}" class="nav-link">
                                            <i class="nav-icon fa fa-star text-info"></i>
                                            <p>ایکن </p>
                                        </a>
                                    </li>
                                @endif
                                @if(auth()->user()->can('front-site-socails'))
                                    <li class="nav-item">
                                        <a href="{{ route('ad.socials') }}" class="nav-link">
                                            <i class="nav-icon fa fa-instagram text-info"></i>
                                            <p>شبکه اجتماعی</p>
                                        </a>
                                    </li>
                                @endif
                                @if(auth()->user()->can('setting'))
                                    <li class="nav-item">
                                        <a href="{{ route('settings.list') }}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o text-info"></i>
                                            <p>تنظیمات</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('ad.logout') }}" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>خروج از داشبورد</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</aside>
