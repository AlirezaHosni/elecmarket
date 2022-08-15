<style>
    @media (max-width: 600px){
        .fixmobilesliders{
            height: 250px;
            max-height: 250px;
        }
    }
</style>
<div class="col-md-9 col-xs-12">
    <div class="bn_preloader banner-preloader">
        <div class="ball-pulse">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    @php
        $slider = \App\Slider::latest()->get();
    @endphp
    <ul class="bn_banner_slider">
        @forelse($slider as $row)
            <li class="fixmobileslider"><img class="mySlides fixmobilesliders" src="{{ $row->slider_path }}"
                                             style="width:100%" alt="{{ $row->caption??'' }}"></li>
        @empty
        @endforelse
    </ul>
</div>
<script>
    let matchMediaxx = window.matchMedia('(max-width: 600px)');
    //start layer discount
    if (matchMediaxx.matches == false) {
        document.querySelector(".fixmobileslider").style.maxHeight = '425px';
        document.querySelector(".fixmobileslider").style.height = '425px';
        document.querySelector(".fixmobilesliders").style.height = '425px';
    }
    if (matchMediaxx.matches == true) {
        document.querySelector(".fixmobileslider").style.maxHeight = '250px';
        document.querySelector(".fixmobileslider").style.height = '250px';
        document.querySelector(".fixmobilesliders").style.height = '250px';
    }
</script>

