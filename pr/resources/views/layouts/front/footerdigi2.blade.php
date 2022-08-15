<style>

    @media (max-width: 550px) {
        .c-footer {
            background: #fff;
            -webkit-box-shadow: 0 -1px 4px 0 rgba(94, 94, 94, .06);
            box-shadow: 0 -1px 4px 0 rgba(94, 94, 94, .06)
        }

        .c-footer__address {
            padding: 12px 0;
            font-size: 9px;
            font-size: .643rem;
            line-height: 2.444;
            color: #9b9b9b;
            border-top: 1px solid #f1f1f1;
            font-style: normal;
            text-align: center
        }

        .c-footer__address span {
            display: block
        }

        .c-footer__product-id {
            font-size: 13px;
            font-size: .929rem;
            line-height: 1.692;
            color: #858585;
            text-align: center;
            width: 100%;
            padding: 16px
        }

        .c-footer__product-id span:first-child {
            margin-left: 8px
        }

        .c-footer__links {
            padding: 15px 0 25px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            font-size: 12px;
            font-size: .857rem;
            line-height: 1.833;
            list-style: none
        }

        .c-footer__links li {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 50%;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            padding: 0 25px;
            margin-top: 15px
        }

        .c-footer__links li a {
            color: #9b9b9b
        }

        .c-footer__social-media {
            padding-bottom: 0
        }

        .c-footer--homepage {
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .c-footer--homepage .c-footer__social-media {
            padding-bottom: 15px;
            background-color: #f9f9f9;
            width: calc(100% + 16px);
            margin-right: -8px;
            padding-right: 8px;
            padding-left: 8px
        }

        .c-footer--homepage .c-footer__links {
            -webkit-box-shadow: 0 -1px 4px 0 rgba(94, 94, 94, .06);
            box-shadow: 0 -1px 4px 0 rgba(94, 94, 94, .06)
        }

        .o-section__headline--center {
            text-align: center;
        }

        .c-social {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding-bottom: 10px;
        }

        .c-social__btn--instagram {
            height: 57px;
            -webkit-border-radius: 9px;
            border-radius: 9px;
            background-image: -webkit-linear-gradient(185deg, #4e60d3, #913baf 35%, #d52d88 68%, #f26d4f);
            background-image: -o-linear-gradient(185deg, #4e60d3, #913baf 35%, #d52d88 68%, #f26d4f);
            background-image: linear-gradient(265deg, #4e60d3, #913baf 35%, #d52d88 68%, #f26d4f);
            -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .11);
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .11);
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .c-social__btn {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 calc(60% - 7px);
            -ms-flex: 0 0 calc(60% - 7px);
            flex: 0 0 calc(60% - 7px);
            border: none;
            padding: 0;
            font-weight: 700;
            color: #fff;
            font-size: 12px;
            font-size: .857rem;
            line-height: 1.33;
            text-align: right;
            position: relative
        }

        .c-expandable-text__text h1 {
            font-size: 20px;
            font-size: 1.429rem;
            line-height: 1.1;
            margin-bottom: 12px;
        }

        .c-expandable-text__expand-btn {
            bottom: 0;
            height: 55px;
            background: #fff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            font-size: 14px;
            font-size: 1rem;
            line-height: 1.571;
            color: #4a4a4a;
        }

        .c-expandable-text {
            position: relative;
        }

        .c-category-description--homepage {
            border-top: 1px solid #f1f1f1;
            font-size: 11px;
            font-size: .786rem;
            line-height: 2;
            color: #9b9b9b;
            margin: 0 10px;
            padding-top: 20px;
        }

        .o-collapse {
            margin: 15px 0;
        }

        article, aside, footer, header, nav, section {
            display: block;
        }

        .c-expandable-text.collapsed .c-expandable-text__text--homepage {
            max-height: 120px;
        }

        .c-expandable-text.collapsed .c-expandable-text__text {
            max-height: 100px;
        }

        .c-category-description__text, .c-category-description a, .c-category-description div, .c-category-description p, .c-category-description section, .c-category-description span {
            font-size: 12px;
            font-size: .857rem;
            line-height: 1.833;
            margin-right: 5%;
            margin-left: 5%;
        }

        .c-footer__address {
            padding: 12px 0;
            font-size: 9px;
            font-size: .643rem;
            line-height: 2.444;
            color: #9b9b9b;
            border-top: 1px solid #f1f1f1;
            font-style: normal;
            text-align: center;
        }

        .c-footer__address span {
            display: block;
        }

        .o-section .c-btn-primary {
            margin-top: 10px
        }

        .o-section .c-discount-time {
            margin-bottom: 5px
        }

        .o-section--border-bottom {
            border-bottom: 1px solid #e5e5ea
        }

        .o-section--border-top {
            border-top: 1px solid #e5e5ea
        }

        .o-section__headline--center {
            text-align: center;
        }

        .o-section__headline {
            margin-bottom: 15px;
            color: #858585;
            font-size: 14px;
            font-size: 1rem;
            line-height: 1.571;
        }

        .c-btn-app {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: 23px;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .c-btn-app__icon {
            width: calc(50% - 7px);
            display: block;
            background: no-repeat 50% 50%;
            background-size: auto;
            -webkit-background-size: 100% 100%;
            background-size: 100% 100%;
            padding: 0;
            border: none;
            margin: 0;
            width: 40%;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin: 0 4px;
            width: 37%;
        }

        .c-btn-app__icon img {
            max-height: 100%;
            width: 100%;
        }

        .o-container {
            padding-left: 8px;
            padding-right: 8px;
        }

        .c-ui-input {
            position: relative;
        }

        .c-ui-input--newsletter .c-ui-input__input, .c-ui-input--newsletter .c-ui-select {
            padding-right: 59px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            background-color: #f0f0f0;
            border-color: #e5e5ea;
            padding-top: 17px;
            padding-bottom: 17px;
            font-size: 15px;
            font-size: 1.071rem;
            line-height: 1.467;
        }

        .c-ui-input__input--right-placeholder {
            text-align: left;
            direction: ltr;
        }

        .c-ui-input__input, .c-ui-select {
            -webkit-border-radius: 8px;
            border-radius: 8px;
            border: 1px solid #d6d6d6;
            border-top-color: rgb(214, 214, 214);
            border-right-color: rgb(214, 214, 214);
            border-bottom-color: rgb(214, 214, 214);
            border-left-color: rgb(214, 214, 214);
            font-size: 14px;
            font-size: 1rem;
            line-height: 1.571;
            font-weight: 700;
            color: hsla(0, 0%, 64%, .5);
            padding: 9px 10px 8px;
            padding-top: 9px;
            padding-right: 10px;
            padding-bottom: 8px;
            width: 100%;
            color: #858585;
        }

        .c-form-newsletter .c-btn-primary {
            margin-top: 20px;
        }

        .o-section .c-btn-primary {
            margin-top: 10px;
        }

        .c-btn-primary {
            -webkit-border-radius: 9px;
            border-radius: 9px;
            -webkit-box-shadow: 0 2px 6px 0 rgba(0, 191, 214, .5);
            box-shadow: 0 2px 6px 0 rgba(0, 191, 214, .5);
            font-size: 18px;
            font-size: 1.286rem;
            line-height: 1.222;
            letter-spacing: -.6px;
            color: #fff;
            background-color: #00bfd6;
            padding: 14px;
            width: 100%;
            text-align: center;
        }
        o-section--border-bottom {
            border-bottom: 1px solid #e5e5ea;
        }
        .o-section {
            padding: 15px 0;
        }
        .o-section__headline--center {
            text-align: center;
        }
        .o-section__headline {
            margin-bottom: 15px;
            color: #858585;
            font-size: 14px;
            font-size: 1rem;
            line-height: 1.571;
        }
        .c-ui-input--newsletter .c-ui-input__input, .c-ui-input--newsletter .c-ui-select {
            padding-right: 59px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            background-color: #f0f0f0;
            border-color: #e5e5ea;
            padding-top: 17px;
            padding-bottom: 17px;
            font-size: 15px;
            font-size: 1.071rem;
            line-height: 1.467;
        }
        .c-ui-input__input--right-placeholder {
            text-align: left;
            direction: ltr;
        }
        .c-ui-input__input, .c-ui-select {
            -webkit-border-radius: 8px;
            border-radius: 8px;
            border: 1px solid #d6d6d6;
            border-top-color: rgb(214, 214, 214);
            border-right-color: rgb(214, 214, 214);
            border-bottom-color: rgb(214, 214, 214);
            border-left-color: rgb(214, 214, 214);
            font-size: 14px;
            font-size: 1rem;
            line-height: 1.571;
            font-weight: 700;
            color: hsla(0,0%,64%,.5);
            padding: 9px 10px 8px;
            padding-top: 9px;
            padding-right: 10px;
            padding-bottom: 8px;
            width: 100%;
            color: #858585;
        }
    }

</style>

<div class="o-container" style="background: #ffffff;margin-top: 5%;">
{{--    <nav class="o-section o-section--border-bottom o-section--border-top">--}}
{{--        <p--}}
{{--            class="o-section__headline o-section__headline--center">تخفیف‌های جذاب را از اپلیکیشن دنبال کنید!</p>--}}
{{--        <div class="c-btn-app">--}}
{{--            <a--}}
{{--                href=""--}}
{{--                target="_blank" class="c-btn-app__icon">--}}
{{--                <img src="{{ asset('assets/s/dd753f51.png') }}"--}}
{{--                     alt="" loading="lazy">--}}
{{--            </a>--}}
{{--            <a--}}
{{--                href=""--}}
{{--                target="_blank" class="c-btn-app__icon">--}}
{{--                <img src="{{ asset('assets/s/f822b108.svg') }}"--}}
{{--                     alt="دریافت از بازار" loading="lazy"></a>--}}
{{--            <a--}}
{{--                href=""--}}
{{--                target="_blank" class="c-btn-app__icon">--}}
{{--                <img src="{{ asset('assets/s/692fd5db.svg') }}"--}}
{{--                     alt="" loading="lazy"></a>--}}
{{--            <a--}}
{{--                href=""--}}
{{--                target="_blank" class="c-btn-app__icon">--}}
{{--                <img src="{{ asset('assets/s/c4abfc14.png') }}"--}}
{{--                     alt="دریافت از مایکت" loading="lazy"></a>--}}
{{--        </div>--}}
{{--    </nav>--}}
    <div class="o-section o-section--border-bottom">
        <p class="o-section__headline o-section__headline--center">از
            تخفیف‌ها و جدیدترین‌های الکمار کتینگ باخبر
            شوید!</p>
        <form class="c-form-newsletter" id="SubscribeNewsletter" novalidate="novalidate">
            <div class="c-ui-input c-ui-input--newsletter">
                <input type="text" name="subscribe[email]"
                       placeholder="آدرس ایمیل"
                       class="c-ui-input__input c-ui-input__input--right-placeholder">
            </div>
            <button class="c-btn-primary" type="submit" data-event="newsletter_subscription">
                تایید ایمیل
            </button>
        </form>

    </div>
</div>
@include('front.part.icon_e2')
<footer class="c-footer js-footer ">
    <div class="o-container">
        <nav class="o-section c-footer__social-media"><p class="o-section__headline o-section__headline--center">
                ما را در شبکه‌های اجتماعی دنبال کنید
            </p>
            <div class="c-social"><a href="{{ $socails->instagram??'' }}"
                                     class="c-social__btn c-social__btn--instagram"><img
                        src="{{ asset('assets/8c778c7d.png') }}" loading="lazy"
                        alt="اینستاگرام " width="25">
                    اینستاگرام
                </a></div>
        </nav>
        <nav>
            <ul class="c-footer__links">
                <?php
                $mfooteras = \App\Menu::where('menu_type', 'menufootercata')->take(5)->get();
                ?>
                @forelse($mfooteras as $row)
                    <li><a href="{{ url('/pages/'.$row->page->slug??'') }}">{{ $row->title }}   </a></li>
                @empty
                @endforelse
            </ul>
        </nav>
        <article class="o-collapse c-category-description c-category-description--homepage c-expandable-text">
            <div class="c-expandable-text__text c-expandable-text__text--homepage js-expandable-text">
                {!! $settings->footer_about??'' !!}

            </div>
            <address class="c-footer__address">
                {{ $settings->copy_right??'' }}
            </address>
    </div>
</footer>
