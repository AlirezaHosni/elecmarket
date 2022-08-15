<style>
    /*footer------------------------*/
    footer{
        width: 100%;
        height: auto;
        margin-top: 50px;
        padding: 80px 10px 0;
        background: #eceff1;
        position: relative;
        line-height: 22px;
        overflow: hidden;
        float: right;
        text-align: center;
    }

    footer .footer-jump{
        position: absolute;
        height: 60px;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        background-color: #f5f5f5;
        border-top: 1px solid #eceff1;
        border-bottom: 1px solid #cfd8dc;
        text-align: center;
    }

    footer .footer-jump a{
        text-decoration: none;
    }

    footer .footer-jump a .footer-jump-angle{
        font: 18px iranyekan;
        color: #4a4a4a;
        line-height: 55px;
    }

    footer .footer-jump a .footer-jump-angle i{
        vertical-align: middle;
        font-size: 25px;
        background: hsla(0,0%,74.5%,.41);
        display: inline-block;
        padding: 5px 10px;
        border-radius: 50px;
        margin-left: 10px;
    }

    .footer-inner-box{
        width: 100%;
        height: auto;
        float: right;
        margin-top: 10px;
        text-align: center;
        display: block;
    }

    .footer-inner-box a{
        margin-bottom: 10px;
        text-decoration: none;
        width: 215px;
        display: inline-block;
    }

    .footer-inner-box a img{
        width: 70px;
        height: 70px;
    }

    .footer-inner-box a .item-feature{
        display: block;
        margin-top: 10px;
        font: 14px iranyekan;
        width: 100%;
        text-align: center;
        color: #606060;
        float: right;
    }

    .middle-bar-footer{
        width: 100%;
        height: auto;
        float: right;
        margin-top: 10px;
        border-top: 1px solid #dcdcdc;
        border-bottom: 1px solid #dcdcdc;
    }

    .middle-bar-footer .footer-links{
        width: 100%;
        height: auto;
        float: right;
        margin-top: 20px;
        padding: 0 10px;
    }

    .middle-bar-footer .footer-links .links-col{
        width: 195px;
        height: auto;
        float: right;
        overflow: hidden;
    }

    .middle-bar-footer .footer-links .links-col a.head-line{
        font: 14px iranyekan;
        color: #4a5f73;
        text-decoration: none;
        margin-bottom: 20px;
        display: block;
        font: 15px iranyekan;
    }

    .middle-bar-footer .footer-links .links-col ul.links-ul li{
        margin-bottom: 10px;
    }

    .middle-bar-footer .footer-links .links-col ul.links-ul li a{
        font: 14px iranyekan;
        color: #4b4b4b;
        text-decoration: none;
        font: 13px iranyekan;
        font-weight: 300;
    }

    footer .footer-form{
        width: 100%;
        height: auto;
        float: left;
        margin-top: 20px;
        padding: 0 10px;
    }

    footer .footer-form span.newslitter-form{
        font: 14px iranyekan;
        color: #4b4b4b;
        display: block;
        text-align: right;
    }

    footer .footer-form form{
        width: 80%;
        height: 40px;
        float: right;
        border-radius: 5px;
        position: relative;
        margin-top: 15px;
        overflow: hidden;
    }

    footer .footer-form form .input-footer{
        width: 100%;
        height: 40px;
        outline: none;
        text-align: left;
        background: #fff;
        border: 1px solid #c8c8c8;
        color: #717171;
        float: right;
        padding: 0 10px 0 80px;
        font: 12px iranyekan;
        border-radius: 5px;
    }

    footer .footer-form form .input-footer::placeholder{
        text-align: right;
    }

    footer .footer-form form .btn-footer-post{
        position: absolute;
        top: 0;
        left: 0;
        padding: 5px 20px;
        font: 14px iranyekan;
        height: 40px;
        background: #00bfd6;
        color: #fff;
        cursor: pointer;
        line-height: 30px;
        transition: all 400ms ease;
    }

    footer .footer-form form .btn-footer-post:hover{
        background: #08e3fd;
        transition: all 400ms ease;

    }

    footer .footer-social{
        width: 100%;
        height: auto;
        float: right;
        margin-top: 35px;
        padding: 0 10px;
        margin-left: 15px;
    }

    footer .footer-social .newslitter-form-social{
        font: 14px iranyekan;
        color: #4b4b4b;
        width: 100%;
        display: block;
        text-align: right;
    }

    footer .footer-social .social-links{
        width: 200px;
        height: 50px;
        margin-top: 10px;
        overflow: hidden;
        text-align: right;
    }

    footer .footer-social .social-links a{
        width: 40px;
        height: 40px;
        color: #9c9c9c;
        display: inline-block;
        font-size: 25px;
        line-height: 40px;
    }

    footer .footer-address{
        width: 100%;
        height: auto;
        float: right;
        margin-top: 20px;
        margin-bottom: 15px;
    }

    footer .footer-address .footer-contact{
        width: 50%;
        height: auto;
        float: right;
        font: 14px iranyekan;
        margin-bottom: 10px;
    }

    footer .footer-address .footer-contact ul li{
        color: #616161;
        margin-bottom: 10px;
    }

    footer .footer-address .footer-contact ul li a{
        text-decoration: none;
        color: #616161;
        position: relative;
        padding-left: 30px;
    }

    footer .footer-address .footer-contact ul li a.phone-contact::before{
        content: "";
        display: block;
        height: 24px;
        background: #bbb7b7;
        position: absolute;
        left: 0;
        width: 1px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    footer .footer-address .footer-contact ul li.email-title{
        float: right;
        margin-right: 20px;
    }

    footer .footer-address .address-images{
        width: 31%;
        height: 65px;
        float: left;
        line-height: 63px;
    }

    footer .footer-address .address-images img{
        width: 150px;
    }

    footer .more-info{
        width: 100%;
        height: auto;
        background: #d7dee0;
        float: right;
        padding: 20px 0;

    }

    footer .more-info .about-site{
        width: 100%;
        height: auto;
        margin-top: 15px;
        border-bottom: 1px solid #c5c4c4;
    }

    footer .more-info .about-site h1{
        font: 16px iranyekan;
        font-weight: bold;
        margin-bottom: 15px;
        color: #616161;
    }

    footer .more-info .about-site p{
        font: 12px iranyekan;
        color: #535353;
    }

    footer .copy-right-footer{
        width: 100%;
        height: auto;
        float: right;
        text-align: center;
    }

    footer .copy-right-footer p{
        font: 12px iranyekan;
        line-height: 30px;
        color: #535353;
        margin-bottom: 0;
    }
    @media (max-width: 1135px){
        footer .footer-address .footer-contact ul li a.phone-contact::before{
            content: "";
            width: 0;
            height: 0;
        }

        footer .footer-address .footer-contact ul li.email-title{
            margin-right: 0;
        }
    }
    @media (max-width: 992px) {
        footer .footer-form form {
            width: 100%;
        }
    }
    @media (max-width: 490px){
        footer .footer-address .address-images{
            width: 100%;
            height: auto;
            float: left;
            line-height: 63px;
            display: block;
            text-align: center;
        }

        footer .footer-address{
            text-align: center;
        }

        footer .footer-address .footer-contact{
            width: 100%;
        }

        .widget-product .product-carousel .item .post-title, .brand-slider .product-carousel .item .post-title{
            height: 100px;
        }

        footer .footer-address .footer-contact ul li a{
            padding-left: 0;
        }

        footer .footer-address .footer-contact ul li{
            text-align: right;
        }
    }
    @media (max-width: 550px){
        .footer-checkout-col{
            width: 100%;
        }
    }


</style>
<footer>
    <div class="footer-jump">
        <a href="#">
            <span class="footer-jump-angle"><i class="fa fa-angle-up"></i>برگشت به بالا</span>
        </a>
    </div>
    <div class="col-12">
        <div class="middle-bar-footer">
            <div class="col-lg-6 col-xs-12 pull-right">
                <div class="footer-links">
                    <div class="links-col">
                        <h5>راهنمای خرید از دیجی‌کالا </h5>
                        <ul class="links-ul">
                            {{--                            <li><i class="fa fa-phone"></i>پشتیبانی: (30 خط) <span dir="ltr">021-45863</span></li>--}}
                            {{--                            <li><i class="fa fa-envelope"></i></li>--}}
                            {{--                            <li><i class="fa fa-mobile"></i>شماره پیامک: 3000909090</li>--}}
                            {{--                            <li><i class="fa fa-eye"></i>بازرسی و نظارت: <span dir="ltr">021-45863</span></li>--}}

                            <li><a href="">نحوه ثبت سفارش </a></li>
                            <li><a href="">رویه ارسال سفارش </a></li>
                            <li><a href="">شیوه‌های پرداخت</a></li>
                        </ul>
                    </div>

                    <div class="links-col">
                        <h5>پیوندهای فروشگاه</h5>
                        <ul class="links-ul">
                            </li>
                            <li><a href="">شعب شرکت</a></li>

                            <li><a href="" rel="nofollow">:: بازاریابی شبکه ای وزارت صنعت</a>
                            </li>
                            <li><a href="" rel="nofollow">:: اطلاع رسانی بازاریابی شبکه ای</a>
                            </li>
                        </ul>
                    </div>

                    <div class="links-col">
                        <h5>قوانین و مقررات</h5>
                        <ul class="links-ul">
                            <li><a href="">منشور اخلاقی</a></li>
                            <li><a href="">آئین
                                    نامه انضباطی</a></li>
                            <li><a href="">قوانین باز پسگیری کالا</a>
                            </li>
                            <li><a href="">قوانین و مقررات</a>
                            </li>
                            <li><a href="">استاندارد بازاریابی
                                    فروشگاه</a></li>
                            <li><a href="">مشروح طرح درآمدی</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-xs-12 pull-left">
                <div class="footer-form">
                    <h5>دریافت خبرنامه</h5>
                    <form onsubmit="alert('این بخش در حال تکمیل است. لطفا بعدا مراجعه نمایید.'); return false;">
                        <input class="bn_fn_input" type="text" name="">
                        <input class="bn_fn_submit" type="submit" name="" value="تائید ایمیــل">
                    </form>
                </div>

                <div class="footer-social col-xs-12">
                    <span class="newslitter-form-social">&zwnj;استور را در شبکه&zwnj;های اجتماعی دنبال کنید:</span>

                    <div class="social-links">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12" style="margin-top: 1%;margin-bottom: 1%;">
        <div class="footer-address col-xs-12">
            <div class="footer-contact">
                <ul>
                    <li>هفت روز هفته ، ۲۴ ساعت شبانه&zwnj;روز پاسخگوی شما هستیم</li>
                    <li style="float:right">شماره تماس : <a href="#" class="phone-contact">۶۱۹۳۰۰۰۰ - ۰۲۱ ، ۹۵۱۱۹۰۹۵
                            - ۰۲۱</a></li>
                    <li class="email-title">آدرس ایمیل : <a href="#">info@test.com</a></li>
                </ul>
            </div>

            <div class="address-images d-xl-none" style="margin-top: 1%;margin-bottom: 3%;">
                    <h5>اپلیکیشن های موبایل فروشگاه</h5>
                    <ul class="bn_fa_list">
                        <li><a href=""><img
                                    src="{{ asset('assets/front/images/app-windows.jpg') }}" alt=""></a></li>
                        <li><a href=""><img
                                    src="{{ asset('assets/front/images/app-google.jpg') }}" alt=""></a></li>
                        <li><a href=""><img
                                    src="{{ asset('assets/front/images/app-apple.jpg') }}" alt=""></a></li>
                    </ul>
            </div>
        </div>
    </div>

    <div class="more-info">
        <div class="col-12">
            <div class="about-site">
                <h1>فروشگاه اینترنتی &zwnj;استور بررسی، انتخاب و خرید آنلاین</h1>
                <p>&zwnj;استور به عنوان یکی از قدیمی&zwnj;ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه اصل، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل&zwnj;بودن کالا موفق شده تا همگام با فروشگاه&zwnj;های معتبر جهان، به بزرگ&zwnj;ترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به سایت &zwnj;استور با دنیایی از کالا رو به رو می&zwnj;شوید! هر آنچه که نیاز دارید و به ذهن شما خطور می&zwnj;کند در اینجا پیدا خواهید کرد.</p>

                <div class="bn_fc_logos d-xl-none" style="margin-top: 2%;
    margin-bottom: 2%;">
                    <ul class="bn_fcl_list">
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-1.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-2.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-3.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-4.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-5.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-6.png') }}" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-7.pn') }}g" alt=""></a>
                        </li>
                        <li><a href=""><img src="{{ asset('assets/front/images/footer-logo-8.png') }}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="copy-right-footer col-xs-12">
                <p>
                    استفاده از مطالب فروشگاه اینترنتی &zwnj;استور فقط برای مقاصد غیرتجاری و با ذکر منبع
                    بلامانع است. کلیه حقوق این سایت متعلق (فروشگاه آنلاین &zwnj;استور) می&zwnj;باشد.
                </p>
            </div>
        </div>
    </div>
</footer>
