$(document).ready(function() {	
        let matchMedia_option = window.matchMedia('(max-width: 625px)');
        if (matchMedia_option.matches == false) {
            document.querySelector("#product__option").style.display = 'block';
            document.querySelector("#product__option_mobile").style.display = 'none';
        }
        if (matchMedia_option.matches == true) {
            document.querySelector("#product__option").style.display = 'none';
            document.querySelector("#product__option_mobile").style.display = 'block';
        }
        $(".modal").on('shown.bs.modal', function () {
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                slidesPerView: 4,
                loop: true,
                freeMode: true,
                loopedSlides: 5, //looped slides should be the same
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                loop: true,
                loopedSlides: 5, //looped slides should be the same
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs,
                },
            });
        });

        jQuery(function() {
            jQuery.each(window.jQueryQ || [], function(i, a) {
                setTimeout(function() {
                    jQuery.apply(this, a);
                }, 0);
            });
        });

        var pslider= {
            slidesPerView:4, spaceBetween:10, autoplay: {
                delay: 2000, disableOnInteraction: !1,
            }
            , navigation: {
                nextEl: '#pslider-nbtn', prevEl: '#pslider-pbtn',
            }
            , breakpoints: {
                1024: {
                    slidesPerView: 4, spaceBetween: 10,
                }
                , 768: {
                    slidesPerView: 3, spaceBetween: 10,
                }
                , 640: {
                    slidesPerView: 2, spaceBetween: 10,
                }
                , 320: {
                    slidesPerView: 1, spaceBetween: 10,
                }
            }
        }
        
    });