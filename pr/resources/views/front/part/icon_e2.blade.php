<style>
    .o-section--border-bottom {
        border-bottom: 1px solid #e5e5ea;
    }

    .o-section {
        padding: 15px 0;
    }

    .c-feature--homepage {
        height: 75px;
    }

    .c-feature {
        height: 92px;
        position: relative;
        overflow: hidden;
    }

    .c-feature__container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-size: 10px;
        font-size: .714rem;
        line-height: 2.2;
        letter-spacing: .2px;
        color: #000;
        -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        position: relative;
    }

    .c-feature__container > a {
        width: 33%;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 33%;
        -ms-flex: 0 0 33%;
        flex: 0 0 33%;
        display: block;
    }

    .c-feature__item {
        padding-top: 56px;
        background: no-repeat;
        background-position-x: 0%;
        background-position-y: 0%;
        background-image: none;
        background-size: auto;
        text-align: center;
        background-position: 50% 0;
        -webkit-background-size: auto 45px;
        background-size: auto 45px;
    }

    .c-feature__item--3 {
        background: url({{ asset('assets/icon/a9286d2f.svg') }}) 50% 4px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-feature__item--5 {
        background: url({{ asset('assets/icon/514926b1.svg') }}) 50% 5px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }

    .c-feature__item--6 {
        background: url({{ asset('assets/icon/fdb293e6.svg') }}) 50% 6px no-repeat;
        background-size: auto;
        background-size: auto 58px;
    }
</style>
<?php
$geticons = \App\Icon::first();
if (!@empty($geticons)){
$link1 = $geticons->icon_1;
$link2 = $geticons->icon_2;
$link3 = $geticons->icon_3;
$link4 = $geticons->icon_4;
$link5 = $geticons->icon_5;
}else{
$link1 = "";
$link2 = "";
$link3 = "";
$link4 = "";
$link5 = "";
}
?>
<aside class="o-section o-section--border-bottom" id="icon-mobile" style="display: none;background: #ffffff">
    <div class="c-feature c-feature--homepage js-head-features">
        <div class="c-feature__container"><a target="_blank" href="{{ url($link3??'') }}">
                <div class="c-feature__item c-feature__item--3">پشتیبانی ۲۴ ساعته</div>
            </a><a target="_blank" href="{{ url($link2??'') }}">
                <div class="c-feature__item c-feature__item--6">ضمانت اصل‌بودن کالا</div>
            </a><a target="_blank" href="{{ url($link4??'') }}">
                <div class="c-feature__item c-feature__item--5">۷ روز ضمانت بازگشت</div>
            </a></div>
    </div>
</aside>
<script>
    $(document).ready(function () {
        let matchMedia = window.matchMedia('(max-width: 425px)');


        //start layer discount
        if (matchMedia.matches == false) {
            document.querySelector("#icon-mobile").style.display = 'none';

        }
        //start layer swiper

        if (matchMedia.matches == true) {
            document.querySelector("#icon-mobile").style.display = 'block';

        }
    });
    // var $a= $.noConflict(true);
    // $(window).scroll(function(){
    //     if ($a(window).scrollTop() >= 300) {
    //         $a('.cg-menu-below').addClass('fixed-header');
    //     }
    //     else {
    //         $a('.cg-menu-below').removeClass('fixed-header');
    //     }
    // });

</script>
