<style>
    /*footer------------------------*/
    footer {
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

    footer .footer-jump {
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

    footer .footer-jump a {
        text-decoration: none;
    }

    footer .footer-jump a .footer-jump-angle {
        font: 18px iranyekan;
        color: #4a4a4a;
        line-height: 55px;
    }

    footer .footer-jump a .footer-jump-angle i {
        vertical-align: middle;
        font-size: 25px;
        background: hsla(0, 0%, 74.5%, .41);
        display: inline-block;
        padding: 5px 10px;
        border-radius: 50px;
        margin-left: 10px;
    }

    .footer-inner-box {
        width: 100%;
        height: auto;
        float: right;
        margin-top: 10px;
        text-align: center;
        display: block;
    }

    .footer-inner-box a {
        margin-bottom: 10px;
        text-decoration: none;
        width: 215px;
        display: inline-block;
    }

    .footer-inner-box a img {
        width: 70px;
        height: 70px;
    }

    .footer-inner-box a .item-feature {
        display: block;
        margin-top: 10px;
        font: 14px iranyekan;
        width: 100%;
        text-align: center;
        color: #606060;
        float: right;
    }

    .middle-bar-footer {
        width: 100%;
        height: auto;
        float: right;
        margin-top: 10px;
        border-top: 1px solid #dcdcdc;
        border-bottom: 1px solid #dcdcdc;
    }

    .middle-bar-footer .footer-links {
        width: 100%;
        height: auto;
        float: right;
        margin-top: 20px;
        padding: 0 10px;
    }

    .middle-bar-footer .footer-links .links-col {
        width: 195px;
        height: auto;
        float: right;
        overflow: hidden;
    }

    .middle-bar-footer .footer-links .links-col a.head-line {
        font: 14px iranyekan;
        color: #4a5f73;
        text-decoration: none;
        margin-bottom: 20px;
        display: block;
        font: 15px iranyekan;
    }

    .middle-bar-footer .footer-links .links-col ul.links-ul li {
        margin-bottom: 10px;
    }

    .middle-bar-footer .footer-links .links-col ul.links-ul li a {
        font: 14px iranyekan;
        color: #4b4b4b;
        text-decoration: none;
        font: 13px iranyekan;
        font-weight: 300;
    }

    footer .footer-form {
        width: 100%;
        height: auto;
        float: left;
        margin-top: 20px;
        padding: 0 10px;
    }

    footer .footer-form span.newslitter-form {
        font: 14px iranyekan;
        color: #4b4b4b;
        display: block;
        text-align: right;
    }

    footer .footer-form form {
        width: 80%;
        height: 40px;
        float: right;
        border-radius: 5px;
        position: relative;
        margin-top: 15px;
        overflow: hidden;
    }

    footer .footer-form form .input-footer {
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

    footer .footer-form form .input-footer::placeholder {
        text-align: right;
    }

    footer .footer-form form .btn-footer-post {
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

    footer .footer-form form .btn-footer-post:hover {
        background: #08e3fd;
        transition: all 400ms ease;

    }

    footer .footer-social {
        width: 100%;
        height: auto;
        float: right;
        margin-top: 35px;
        padding: 0 10px;
        margin-left: 15px;
    }

    footer .footer-social .newslitter-form-social {
        font: 14px iranyekan;
        color: #4b4b4b;
        width: 100%;
        display: block;
        text-align: right;
    }

    footer .footer-social .social-links {
        width: 200px;
        height: 50px;
        margin-top: 10px;
        overflow: hidden;
        text-align: right;
    }

    footer .footer-social .social-links a {
        width: 40px;
        height: 40px;
        color: #9c9c9c;
        display: inline-block;
        font-size: 25px;
        line-height: 40px;
    }


    footer .more-info {
        width: 100%;
        height: auto;
        background: #d7dee0;
        float: right;
        padding: 20px 0;

    }

    footer .more-info .about-site {
        width: 100%;
        height: auto;
        margin-top: 15px;
        border-bottom: 1px solid #c5c4c4;
    }

    footer .more-info .about-site h1 {
        font: 16px iranyekan;
        font-weight: bold;
        margin-bottom: 15px;
        color: #616161;
    }

    footer .more-info .about-site p {
        font: 12px iranyekan;
        color: #535353;
    }

    footer .copy-right-footer {
        width: 100%;
        height: auto;
        float: right;
        text-align: center;
    }

    footer .copy-right-footer p {
        font: 12px iranyekan;
        line-height: 30px;
        color: #535353;
        margin-bottom: 0;
    }

    @media (max-width: 1135px) {
        footer .footer-address .footer-contact ul li a.phone-contact::before {
            content: "";
            width: 0;
            height: 0;
        }

        footer .footer-address .footer-contact ul li.email-title {
            margin-right: 0;
        }
    }

    @media (max-width: 992px) {
        footer .footer-form form {
            width: 100%;
        }
    }

    @media (max-width: 490px) {
        footer .footer-address .address-images {
            width: 100%;
            height: auto;
            float: left;
            line-height: 63px;
            display: block;
            text-align: center;
        }

        footer .footer-address {
            text-align: center;
        }

        footer .footer-address .footer-contact {
            width: 100%;
        }

        .widget-product .product-carousel .item .post-title, .brand-slider .product-carousel .item .post-title {
            height: 100px;
        }

        footer .footer-address .footer-contact ul li a {
            padding-left: 0;
        }

        footer .footer-address .footer-contact ul li {
            text-align: right;
        }
    }

    @media (max-width: 550px) {
        .footer-checkout-col {
            width: 100%;
        }
    }


    .c-footer__address, .c-footer__description-content, .c-footer__feature-innerbox, .c-footer__middlebar, .c-footer__partners {
        max-width: 1450px;
        margin: auto;
    }

    .c-footer__feature-innerbox, .c-footer__middlebar {
        display: -ms-inline-flexbox;
        display: inline-flex;
        width: 100%;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .c-footer__feature-innerbox {
        margin: 0 auto;
        -ms-flex-pack: distribute;
        justify-content: space-around;
    }

    .c-footer {
        line-height: 22px;
    }

    .c-footer__badge {
        display: inline-block;
        width: 16.3%;
    }

    .c-footer__feature-item--1 {
        background: url({{ asset('assets/icon/8f570b58.svg') }}) 43% 8px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-footer__feature-item--3 {
        background: url({{ asset('assets/icon/a9286d2f.svg') }}) 50% 4px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-footer__feature-item {
        text-align: center;
        position: relative;
        padding-top: 80px;
        font-size: 13px;
        font-size: .929rem;
        line-height: 1.692;
        color: #606060;
        letter-spacing: .2px;
        padding-bottom: 20px;
        margin: auto;
    }

    .c-footer__feature-item--4 {
        background: url({{ asset('assets/icon/22414818.svg') }}) 50% 0 no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-footer__feature-item--5 {
        background: url({{ asset('assets/icon/514926b1.svg') }}) 50% 5px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-footer__feature-item--6 {
        background: url({{ asset('assets/icon/fdb293e6.svg') }}) 50% 6px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .footer-address {
        font-style: normal;
        letter-spacing: -1.1px;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        width: 100%;
        padding: 15px 7px;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size: 14px;
        font-size: 1rem;
        line-height: 27px;
    }

    .footer-contact, .footer-contact li {
        color: #535353;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .footer-address .footer-contact {
        width: 100%;
        height: auto;
        float: right;
        font: 14px iranyekan;
        margin-bottom: 10px;
    }

    .footer-contact {
        list-style: none;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: calc(100% - 470px);
        width: auto;
        margin: 8px 0 16px 56px;
        margin-bottom: 16px;
    }

    .footer__address-images a:not(:last-of-type) {
        margin-left: 8px;
    }

    .c-footer__address-images {
        text-align: left;
        white-space: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        width: 470px;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        width: auto;
    }

    .footer__address, .footer__address-images {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .footer hr {
        outline: none;
        border: none;
        height: 1px;
        width: calc(100% - 15px);
        margin: auto;
        background-color: #cfd8dc
    }

    .footer__address {
        font-style: normal;
        letter-spacing: -1.1px;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        width: 100%;
        padding: 15px 7px;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size: 14px;
        font-size: 1rem;
        line-height: 27px
    }

    .footer__address,
    .footer__address-images {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center
    }

    .footer__address-images {
        text-align: left;
        white-space: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        width: 470px;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        width: auto
    }

    .footer__address-images a:not(:last-of-type) {
        margin-left: 8px
    }

    .footer__contact {
        list-style: none;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: calc(100% - 470px);
        width: auto;
        margin: 8px 0 16px 56px
    }

    .footer__contact,
    .footer__contact li {
        color: #535353;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .footer__contact li {
        font-size: 16px;
        font-size: 1.143rem;
        line-height: 36px;
        vertical-align: middle;
        text-align: right;
        direction: rtl;
        white-space: nowrap;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap
    }

    .footer__contact li:first-of-type {
        width: 100%
    }

    .footer__contact li:nth-of-type(2) {
        padding-left: 20px
    }

    .footer__contact li a {
        margin-right: 10px
    }

    .footer__copyright {
        color: #757575;
        padding-left: 12px;
        padding-right: 12px
    }

    .footer__copyright--text {
        color: #4a4a4a;
        padding-top: 30px;
        text-align: center;
        border-top: 1px solid #b0bec5;
        font-size: 12px;
        padding-bottom: 15px
    }

    }
    .footer__more-info {
        padding: 0 41px;
        margin: 0 -41px;
    }

    .footer__more-info {
        background-color: #d7dee0;
        padding: 20px 12px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        margin: 0 -10px;
    }

    .footer__safety-partner, .t-index .footer__description-content {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
    }

    .footer__description-content {

        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 0 7px;
    }

    .footer__seo {
        margin-top: 25px
    }

    .footer__seo--content {
        height: 78px;
        overflow: hidden;
        -webkit-transition: all .2s linear;
        transition: all .2s linear
    }

    .footer__seo-readmore {
        display: none
    }

    .footer__seo h1 {
        font-size: 15px;
        font-size: 1.071rem;
        line-height: 1.467;
        margin-bottom: 18px;
        color: #5d5959
    }

    .footer__seo p {
        font-size: 12px;
        font-size: .857rem;
        line-height: 2.17;
        font-weight: 300;
        letter-spacing: -.3px;
        color: #535353
    }

    .footer__seo a {
        font-size: 14px;
        font-size: 1rem;
        line-height: 1.571;
        letter-spacing: -.3px;
        text-align: right;
        color: #8e8e8e;
        display: inline-block;
        margin-right: 10px
    }

    .footer__partners-container {
        text-align: center
    }

    .footer__partners {
        list-style: none;
        padding: 0;
        margin: 9px auto;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        width: 100%
    }

    .footer__partners li {
        text-align: center;
        margin-top: 15px;
        vertical-align: middle;
        width: calc(25% - 5px);
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .footer__safety-partner-1,
    .footer__safety-partner-2 {
        background: no-repeat 50% 50%;
        background-size: contain;
        display: block;
        margin: 10px 20px
    }

    .footer__safety-partner-3 {
        margin-right: 8px
    }

    .footer__safety-partner-1 {
        width: 110px;
        height: 120px;
        background-image: url(../files/5c1e7ecd.png)
    }

    .footer__safety-partner-2 {
        background-size: 110px 120px;
        margin: 0 !important
    }

    .footer__safety-partner-2 img {
        max-width: 100%;
        max-height: 88%;
        width: 88%
    }
</style>
<footer class="c-footer">
    <div class="footer-jump">
        <a href="#">
            <span class="footer-jump-angle"><i class="fa fa-angle-up"></i>برگشت به بالا</span>
        </a>
    </div>
    <hr>
    @php
        $icons = \App\Icon::first();
        if(!@empty($icons)){
             $icon_1 = $icons->icon_1;
            $icon_2 = $icons->icon_2;
            $icon_3 = $icons->icon_3;
            $icon_4 = $icons->icon_4;
            $icon_5 = $icons->icon_5;
        }else{
            $icon_1 = "";
            $icon_2 = "";
            $icon_3 = "";
            $icon_4 = "";
            $icon_5 = "";
        }
    @endphp
{{--    <nav class="c-footer__feature-innerbox">--}}
{{--        <a data-snt-event="dkFooterClick"--}}
{{--           data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;تحویل اکسپرس&quot;}"--}}
{{--           class="c-footer__badge" href="{{ url('/pages/'.$icon_1??'') }}" target="_blank">--}}
{{--            <div class="c-footer__feature-item c-footer__feature-item--1">تحویل اکسپرس</div>--}}
{{--        </a><a data-snt-event="dkFooterClick"--}}
{{--               data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;پشتیبانی ۲۴ ساعته&quot;}"--}}
{{--               class="c-footer__badge" href="{{ url('/pages/'.$icon_2??'') }}" target="_blank">--}}
{{--            <div class="c-footer__feature-item c-footer__feature-item--3">پشتیبانی ۲۴ ساعته</div>--}}
{{--        </a><a data-snt-event="dkFooterClick"--}}
{{--               data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;پرداخت در محل&quot;}"--}}
{{--               class="c-footer__badge" href="{{ url('/pages/'.$icon_3??'') }}" target="_blank">--}}
{{--            <div class="c-footer__feature-item c-footer__feature-item--4">پرداخت در محل</div>--}}
{{--        </a><a data-snt-event="dkFooterClick"--}}
{{--               data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;۷ روز ضمانت بازگشت&quot;}"--}}
{{--               class="c-footer__badge" href="{{ url('/pages/'.$icon_4??'') }}" target="_blank">--}}
{{--            <div class="c-footer__feature-item c-footer__feature-item--5">۷ روز ضمانت بازگشت</div>--}}
{{--        </a><a data-snt-event="dkFooterClick"--}}
{{--               data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;ضمانت اصل‌بودن کالا&quot;}"--}}
{{--               class="c-footer__badge" href="{{ url('/pages/'.$icon_5??'') }}" target="_blank">--}}
{{--            <div class="c-footer__feature-item c-footer__feature-item--6">ضمانت اصل‌بودن کالا</div>--}}
{{--        </a>--}}
{{--    </nav>--}}
    <div class="col-12">
        <div class="middle-bar-footer">
            <div class="col-lg-6 col-xs-12 pull-right">
                <div class="footer-links">
                    <div class="links-col">
                        <h5>راهنمای خرید </h5>
                        <ul class="links-ul">
                            <?php
                            $mfootera = \App\Menu::where('menu_type', 'menufootercata')->take(5)->get();
                            ?>
                            @forelse($mfootera as $row)
                                <li><a href="{{ url('/pages/'.$row->page->slug??'') }}">{{ $row->title }}   </a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>

                    <div class="links-col">
                        <h5> فروشگاه</h5>
                        <ul class="links-ul">

                            <?php
                            $mfooterb = \App\Menu::where('menu_type', 'menufootercatb')->take(5)->get();
                            ?>
                            @forelse($mfooterb as $row)
                                <li><a href="{{ url('/pages/'.$row->page->slug??'') }}">{{ $row->title }}   </a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>

                    <div class="links-col">
                        <h5>قوانین و مقررات</h5>
                        <ul class="links-ul">
                            <?php
                            $mfooterc = \App\Menu::where('menu_type', 'menufootercatc')->take(5)->get();
                            ?>
                            @forelse($mfooterc as $row)
                                <li><a href="{{ url('/pages/'.$row->page->slug??'') }}">{{ $row->title }}   </a></li>

                            @empty
                            @endforelse
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
                    <span class="newslitter-form-social">&zwnj; ما را در شبکه&zwnj;های اجتماعی دنبال کنید:</span>

                    <div class="social-links">
                        <a href="{{ $socails->instagram??'' }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $socails->telegram??'' }}"><i class="fa fa-telegram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12" style="margin-top: 1%;margin-bottom: 1%;">
        <nav class="footer-address ">

            <ul class="footer-contact">
                <li>
                    {!! $settings->footer_contact??'' !!}
                </li>
            </ul>
            <div class="footer__address-images">
                <a
                    href=""
                    target="_blank" class="footer__address-appstore">
                    <img
                        data-src="{{ asset('assets/s/dd753f51.png') }}" alt="playstore" loading="lazy"
                        src="{{ asset('assets/s/dd753f51.png') }}" width="150px">
                </a>
                <a href="" class="footer__address-appstore"
                >
                    <img src="{{ asset('assets/s/f822b108.svg') }}" width="150px">
                </a>
                <a class="footer__address-appstore">
                    <img
                        data-src="{{ asset('assets/s/692fd5db.svg') }}" src="{{ asset('assets/s/692fd5db.svg') }}"
                        alt="دریافت از مایکت"
                        width="150px"></a>
                <a class="footer__address-appstore">
                    <img
                        data-src="{{ asset('assets/s/c4abfc14.png') }}" alt="" loading="lazy"
                        src="{{ asset('assets/s/c4abfc14.png') }}" width="150px">
                </a>
            </div>
        </nav>
    </div>

    <div class="more-info footer__more-info">
        <div class="container">
            <div class="col-12">
                <div class="footer__description-content">
                    <article class="footer__seo col-md-8 pull-right" style="display: block;text-align: right;">

                        {!! $settings->footer_about??'' !!}

                    </article>
                    <aside class="col-md-4">
                        <div class="image">
                            <img src="{{ asset('assets/f/images/cert/enamad.png') }}" alt="">
                            <img src="{{ asset('assets/f/images/cert/samandehi.png') }}" alt="">
                        </div>
                    </aside>
                </div>
                <hr>

                <div class="copy-right-footer col-xs-12" style="margin-top: 5%">
                    <p>
                        {{ $settings->copy_right??'' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
