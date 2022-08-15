<?php
    $geticons = \App\Icon::first();
    if(!@empty($geticons)){
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
<div id="navxs">
    <nav class="c-footer__feature-innerbox">
        <a data-snt-event="dkFooterClick" data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;تحویل اکسپرس&quot;}" class="c-footer__badge" href="{{ url($link1??'') }}" target="_blank">
            <div class="c-footer__feature-item c-footer__feature-item--1">تحویل اکسپرس</div>
        </a><a data-snt-event="dkFooterClick" data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;پشتیبانی ۲۴ ساعته&quot;}" class="c-footer__badge" href="{{ url($link2??'') }}" target="_blank">
            <div class="c-footer__feature-item c-footer__feature-item--3">پشتیبانی ۲۴ ساعته</div>
        </a><a data-snt-event="dkFooterClick" data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;پرداخت در محل&quot;}" class="c-footer__badge" href="{{ url($link3??'') }}" target="_blank">
            <div class="c-footer__feature-item c-footer__feature-item--4">پرداخت در محل</div>
        </a><a data-snt-event="dkFooterClick" data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;۷ روز ضمانت بازگشت&quot;}" class="c-footer__badge" href="{{ url($link4??'') }}" target="_blank">
            <div class="c-footer__feature-item c-footer__feature-item--5">۷ روز ضمانت بازگشت</div>
        </a><a data-snt-event="dkFooterClick" data-snt-params="{&quot;item&quot;:&quot;slogan-image&quot;,&quot;item_option&quot;:&quot;ضمانت اصل&zwnj;بودن کالا&quot;}" class="c-footer__badge" href="{{ url($link5??'') }}" target="_blank">
            <div class="c-footer__feature-item c-footer__feature-item--6">ضمانت اصل&zwnj;بودن کالا</div>
        </a>
    </nav>
</div>
<div  id="nav">

</div>

<script>
    let matchMedia = window.matchMedia('(max-width: 600px)');
    //start layer discount
    if (matchMedia.matches == false) {
        document.querySelector("#nav").style.display = 'block';
    }
    if (matchMedia.matches == true) {
        document.querySelector("#navxs").style.display = 'none';
    }
</script>
