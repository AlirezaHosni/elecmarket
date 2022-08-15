$(document).ready(function () {
    $(".price").each(function() {
        var num = $(this).text();
        var commaNum = numberWithCommas(num);
        $(this).text(commaNum);
    });
    var set = 0;
    // $(window).scroll(function () {
    //     clearTimeout(set);
    //     scrollTop = $(window).scrollTop();
    //     if (scrollTop > 200) {
    //         $('.cg-menu-below').addClass('fixed-header');
    //         set = setTimeout(function () {
    //             $('.cg-menu-below');
    //         }, 2000);
    //     } else {
    //         $('.cg-menu-below').removeClass('fixed-header');
    //     }
    // });
    let matchMedia = window.matchMedia('(max-width: 725px)');


    //start layer discount
    if (matchMedia.matches == false) {

        document.querySelector("#footer-desktop").style.display = 'block';
        document.querySelector("#footer-mobile").style.display = 'none';

        document.querySelector(".productsCard-logo").remove();
    }
    //start layer swiper menu-btn

    if (matchMedia.matches == true) {
        //document.querySelector(".mobilemenu").style.display = 'none';
        document.querySelector(".mobilemenu").style.display = 'block';
        document.querySelector(".mobilemenu").style.visibility = 'visible';
        document.querySelector("#footer-desktop").style.display = 'none';

        document.querySelector("#footer-mobile").style.display = 'block';
        //owl2.owlCarousel('destroy'); // destroyed
    }
});
function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}