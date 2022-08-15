jQuery(function($){

  /*--------------------------------------------------------------------------------*/
/*  Add Account terms
/*--------------------------------------------------------------------------------*/
$('#termcheck_add_acc_1').change(function(){
  if (this.checked) {
    $('#bn_pf2l_term_add_acc').fadeIn('slow');
  }
  else {
    $('#bn_pf2l_term_add_acc').fadeOut('slow');
  }
});

/*--------------------------------------------------------------------------------*/
/*  Ads Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_bat_content').length ) {
  $('.bn_bat_content').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    easing: 'easeOutExpo',
    vertical: true,
  });
  $('.bn_batc_slide').show();
}

/*--------------------------------------------------------------------------------*/
/*   Instantiating iziModal
/*--------------------------------------------------------------------------------*/
if ( $('#modal-ads').length ) {
  $("#modal-ads").iziModal({
    closeButton: true,
    overlayClose: true,
    width: 644,
    padding: 20,
    autoOpen: true,
    overlayColor: 'rgba(0, 0, 0, 0.6)',
  });
};


if ( $('#modal-add_acc').length ) {
  $("#modal-add_acc").iziModal({
    closeButton: true,
    overlayClose: true,
    width: 644,
    padding: 20,
    autoOpen: false,
    overlayColor: 'rgba(0, 0, 0, 0.6)',
  });
};
/*---------------------------------------------------------------------------------*/
/*  Rank Effect
/*---------------------------------------------------------------------------------*/
$('.bn_rank_badge').delay( 250 ).animate( { opacity:'1', top:'0' }, { duration: 'slow', easing: 'easeInOutBack' });
$('.bn_badge').delay( 270 ).animate( { opacity:'1', top:'0' }, { duration: 'slow', easing: 'easeInOutBack' });

$('.bn_rank_badge_text').delay( 750 ).animate( { opacity:'1', bottom:'-55px' },   700 );
$('.bn_rank_confetti').delay( 650 ).animate( { opacity:'1', top:'0' },   1500 );

/*---------------------------------------------------------------------------------*/
/*  Expand Table
/*---------------------------------------------------------------------------------*/
$('.toggle').click(function(){
  $(this).parent().parent().next('.bn_hidden-row').fadeToggle(350, 'easeOutExpo');
});


/*---------------------------------------------------------------------------------*/
/*  Vertical Menu
/*---------------------------------------------------------------------------------*/
if ( $('#only-one [data-accordion]').length ) {
  $('#only-one [data-accordion]').accordion({
    transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
    transitionSpeed: 200
  });
};
/*---------------------------------------------------------------------------------*/
/*  Radio Like
/*---------------------------------------------------------------------------------*/
var $favicon = $('.bn_radio_like');

$favicon.click(
  function(e) {
    e.preventDefault();
    $(this).addClass('bn_radio_like_color');
    $('.bb-gallery-like_text').addClass('bb-gallery-like_text_color');

  }

  );

/*--------------------------------------------------------------------------------*/
/*  OFF Box
/*--------------------------------------------------------------------------------*/
if ( $('.sbn_offbox_hwwr_list').length ) {
  $('.sbn_offbox_hwwr_list').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    dots: true,
    speed: 1000,
    rtl:false,
    vertical:true,
    asNavFor: '.sbn_offbox_hwwl_list',
  });
  $('.sbn_offbox_hwwl_list').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.sbn_offbox_hwwr_list',
    dots: false,
    centerMode: false,
    focusOnSelect: false,
    rtl: true,
    arrows: false,
    fade: true
  });

}
/*--------------------------------------------------------------------------------*/
/*  Index 2 Featured Products
/*--------------------------------------------------------------------------------*/
if ( $('#sbn_main_featured_list').length ) {
  $('#sbn_main_featured_list').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    dots: false,
    rtl: true,
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}
/*--------------------------------------------------------------------------------*/
/*  Index 2 Latest Products
/*--------------------------------------------------------------------------------*/
if ( $('#sbn_lpcm_list').length ) {
  $('#sbn_lpcm_list').slick({
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    dots: false,
    rtl: true,
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}

/*--------------------------------------------------------------------------------*/
/*  Index 2 Banner
/*--------------------------------------------------------------------------------*/
if ( $('.sbn_main_banner_item').length ) {
  $('.sbn_main_banner_item').slick({
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    rtl:false,
    dots: true,
    asNavFor: '.sbn_main_banner_nav',
  });
  $('.sbn_main_banner_nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.sbn_main_banner_item',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    rtl: false,
    arrows: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}
/*--------------------------------------------------------------------------------*/
/*  Product Single 360
/*--------------------------------------------------------------------------------*/
if ( $('.expand_threeD').length ) {

  $('.expand_threeD').magnificPopup({
   type: 'ajax',
 });

}
/*---------------------------------------------------------------------------------*/
/*  Anmiated Stats
/*---------------------------------------------------------------------------------*/
$('.bn-count').each(function () {
  $(this).prop('Counter',0).animate({
    Counter: $(this).text()
  }, {
    duration: 2000,
    easing: 'easeOutExpo',
    step: function (now) {
      $(this).text(Math.ceil(now));
    }
  });
});

/*---------------------------------------------------------------------------------*/
/*  Lottery
/*---------------------------------------------------------------------------------*/
var wins=0;
var gift=-1;
var shuffle=false;

$(document).ready(function(){
	$('.bn_lottery_result').hide();

  var triky = $("#slotmachine").slotMachine({
    delay : 700,
    direction: 'down',
    active  : 8,
    randomize: function(){
     return gift;
   }
 });

  $("#Shuffle").click(function(){
   wins=0;
   if (shuffle) {
    alert('تقاضای شما در حال اجرا است. لطفا صبر کنید');
    return false;
  }
  shuffle=true;
  $("#Shuffle").html('لطفا صبر کنید ...');
  $.post('index.php', {'page':'youraccount', 'file':'reward'}, function(data){
   m = data.split('|');
   if (m[0]=='ok') {
     gift= m[1];
     wins=1;
     triky.shuffle(8, stopSlot);
   } else if (m[0]=='error') {
    shuffle=false;
    $("#Shuffle").html('انتخـاب جایــزه');
    alert(m[1]);
  } else {
    shuffle=false;
    $("#Shuffle").html('انتخـاب جایــزه');
    alert('شما از سیستم خارج شده اید.');
    document.location.href = 'http://baadraan.ir/index.php?page=signin';
  }
});


});

});

function stopSlot(foo) {

	shuffle=false;
	if (wins==1) {
		wins=0;
		var val = $('.g' + gift).html();
		$('.bn_lrc_val').html(val);
		$('.bn_lottery_result').slideDown();
	}
	$("#Shuffle").html('انتخـاب جایــزه بعدی');
	gift=-1;
}

/*---------------------------------------------------------------------------------*/
/*  Register Form
/*---------------------------------------------------------------------------------*/
$("#hidden-foreign").hide();
$("#foreign-check").click(function() {
  if($(this).is(":checked")) {
    $("#codemeli").fadeOut(0);
    $("#hidden-foreign").fadeIn(300, 'easeOutExpo');
  } else {
    $("#hidden-foreign").fadeOut(0);
    $("#codemeli").fadeIn(300, 'easeOutExpo');
  }
});

/*---------------------------------------------------------------------------------*/
/*  Profile Menu
/*---------------------------------------------------------------------------------*/
$('.profile').slimmenu(
{
  resizeWidth: '992',
  collapserTitle: 'منـوی میـزکار',
  animSpeed:200,
  indentChildren: true,
  childrenIndenter: '&raquo;',
});

/*---------------------------------------------------------------------------------*/
/*  Mega Menu
/*---------------------------------------------------------------------------------*/
"use strict";

$('.bn_product_menu > ul > li:has( > ul)').addClass('bn_product_menu_dropdown-icon');
  //Checks if li has sub (ul) and adds class for toggle icon - just an UI

  $('.bn_product_menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
  //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

  $(".bn_product_menu > ul").before("<a href=\"#\" class=\"bn_product_menu_mobile\"><span>دستـه بندی محصولات</span></a>");

  //Adds menu-mobile class (for mobile toggle menu) before the normal menu
  //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
  //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
  //Done this way so it can be used with wordpress without any trouble

  $(".bn_product_menu > ul > li").hover(function(e) {
    if ($(window).width() > 943) {
      $(this).children("ul").stop(true, false).fadeToggle(150);
      e.preventDefault();

    }
  });
  //If width is more than 943px dropdowns are displayed on hover

  $(".bn_product_menu > ul > li").click(function() {
    if ($(window).width() <= 943) {
      $(this).children("ul").fadeToggle(150);
    }

  });
  //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

  $(".bn_product_menu_mobile").click(function(e) {
    $(".bn_product_menu > ul").toggleClass('show-on-mobile');
    e.preventDefault();
  });
  //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

  /*---------------------------------------------------------------------------------*/
/*  Countdown
/*---------------------------------------------------------------------------------*/
$('time').countDown({
  with_separators: false
});
$('.alt-1').countDown({
  css_class: 'countdown-alt-1'
});
$('.alt-2').countDown({
  css_class: 'countdown-alt-2'
});

/*---------------------------------------------------------------------------------*/
/*  Banner Slider
/*---------------------------------------------------------------------------------*/
if ( $('.bn_banner_slider').length ) {
  $('.bn_banner_slider').slick({
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    dots: true,
  });
  $('.bn_banner_slider').show();
}

/*--------------------------------------------------------------------------------*/
/*  News Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_ncn_list').length ) {
  $('.bn_ncn_list').slick({
    dots: false,
    arrows: true,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    easing: 'easeOutExpo',
    vertical: true,
  });
}
/*--------------------------------------------------------------------------------*/
/*  FAQ Slider
/*--------------------------------------------------------------------------------*/
$('.marquee').marquee({
    //speed in milliseconds of the marquee
    duration: 5000,
    //gap in pixels between the tickers
    gap: 50,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: 'up',
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: false,
    pauseOnHover: true
  });

/*--------------------------------------------------------------------------------*/
/*  Articles Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_nca_list').length ) {
  $('.bn_nca_list').slick({
    dots: false,
    arrows: true,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    easing: 'easeOutExpo',
    vertical: true
  });
}

/*--------------------------------------------------------------------------------*/
/*  Product Tabs
/*--------------------------------------------------------------------------------*/
$('.tabgroup > div').hide();
$('.tabgroup > div:first-of-type').show();
$('.bn_tabs a').click(function(e){
  e.preventDefault();
  var $this = $(this),
  tabgroup = '#'+$this.parents('.bn_tabs').data('tabgroup'),
  others = $this.closest('li').siblings().children('a'),
  target = $this.attr('href');
  others.removeClass('active');
  $this.addClass('active');
  $(tabgroup).children('div').hide();
  $(target).show();
  $('.bn_brands_slider').slick('setPosition');
})



var tabarray = {
	cosmetic:1,
  sanitary: 0,
  clothes: 0,
  food: 0,
  health: 0,
  culture: 0,
  leather: 0,
  educate: 0
};
$('.tabgroup > div').hide();
$('.tabgroup > div:first-of-type').show();
$('.product_tabs a').click(function(e){
  e.preventDefault();
  var $this = $(this),

  tabgroup = '#'+ $this.parents('.bn_tabs').data('tabgroup'),
  others = $this.closest('li').siblings().children('a'),
  target = $this.attr('href');
  others.removeClass('active');
  tabtitle = target.replace('#',''),
  $this.addClass('active');
  $(tabgroup).children('div').hide();

  $(target).show();
  if (tabarray[tabtitle]==0) {
   $.post('index.php', {'sid':tabtitle, 'page':'eshop', 'file':'loadfptabs'}, function(data){

     $(target).html(data)	;
     tabarray[tabtitle]=1;
   });
 }

})

/*--------------------------------------------------------------------------------*/
/*  Brands Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_brands_slider').length ) {
  $('.bn_brands_slider').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    dots: false,
    rtl: true,
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}

/*--------------------------------------------------------------------------------*/
/*  Profile User Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_pmlu_slider').length ) {
  $('.bn_pmlu_slider').slick({
    infinite: false,
    lazyLoad: 'ondemand',
    slidesToShow: 6.5,
    slidesToScroll: 6.5,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: false,
    speed: 1000,
    dots: false,
    rtl: true,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5.5,
        slidesToScroll: 5.5,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 5.5,
        slidesToScroll: 5.5,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4.5,
        slidesToScroll: 4.5,
      }
    },
    {
      breakpoint: 568,
      settings: {
        slidesToShow: 3.5,
        slidesToScroll: 3.5,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2.5,
        slidesToScroll:2.5
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}


/*--------------------------------------------------------------------------------*/
/*  Related Products
/*--------------------------------------------------------------------------------*/
if ( $('.bn_sr_list').length ) {
  $('.bn_sr_list').slick({
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    dots: false,
    rtl: true,
    responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
  });

}


/*---------------------------------------------------------------------------------*/
/*  Awards Slider
/*---------------------------------------------------------------------------------*/
if ( $('.bn_acc_slider').length ) {
  $('.bn_acc_slider').slick({
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    speed: 1000,
    rtl: true,
    dots: false,
  });
}

/*---------------------------------------------------------------------------------*/
/*  Textbox Slider
/*---------------------------------------------------------------------------------*/
if ( $('.bn_textbox_slider').length ) {
  $('.bn_textbox_slider').slick({
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    speed: 1000,
    dots: true,
  });
}

/*--------------------------------------------------------------------------------*/
/*  Payment Form
/*--------------------------------------------------------------------------------*/
var $pf_close = $('#icon1');
var $pf2_close = $('#icon2');

$pf_close.click(
  function(e) {
   e.preventDefault();
   if (confirm("آیا از حذف این آیتم مطمئن هستی؟") == true) {
     $("#selected1").fadeOut(300, 'easeOutExpo');
   }
   return;
 });
$pf2_close.click(
  function(e) {
    e.preventDefault();
    if (confirm("آیا از حذف این آیتم مطمئن هستی؟") == true) {
     $("#selected2").fadeOut(300, 'easeOutExpo');
   }
   return;
 });


$("input[id$='option_2']").click(function() {
  $("#user_payment").show(300, 'easeOutExpo');
});
$("input[id$='option_1']").click(function() {
  $("#user_payment").hide('easeOutExpo');
});

$("input[id$='deliver_2']").click(function() {
  $("#bn_dp").show(300, 'easeOutExpo');
});
$("input[id$='deliver_1']").click(function() {
  $("#bn_dp").hide('easeOutExpo');
});

$('#bn_dp select').on('change', function() {
  if ($(this).val() == 'حضوری') {
    $("#bn_dfp").hide('easeOutExpo');
    $("#bn_dfp_1").hide('easeOutExpo');
    $("#bn_dfp_2").hide('easeOutExpo');
    $("#bn_dfp_3").hide('easeOutExpo');
    $("#bn_dpl").show(300, 'easeOutExpo');
  }
  else if ($(this).val() == 'پستی') {
    $("#bn_dpl").hide('easeOutExpo');
    $("#bn_dfp").show(300, 'easeOutExpo');
  }
});

$('#bn_dfp select').on('change', function() {
  if ($(this).val() == 'bn_dfp_1') {

    $("#bn_dfp_2").hide('easeOutExpo');
    $("#bn_dfp_3").hide('easeOutExpo');
    $("#bn_dfp_1").show(300, 'easeOutExpo');
  }
  else if ($(this).val() == 'bn_dfp_2') {
    $("#bn_dfp_1").hide('easeOutExpo');
    $("#bn_dfp_3").hide('easeOutExpo');
    $("#bn_dfp_2").show(300, 'easeOutExpo');
  }
  else if ($(this).val() == 'bn_dfp_3') {
    $("#bn_dfp_1").hide('easeOutExpo');
    $("#bn_dfp_2").hide('easeOutExpo');
    $("#bn_dfp_3").show(300, 'easeOutExpo');

  }
});

/*--------------------------------------------------------------------------------*/
/*  Shop Single Slider
/*--------------------------------------------------------------------------------*/
if ( $('.bn_si_slider').length ) {
  $('.bn_si_slider').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    arrows: false,
    speed: 1000,
    dots: false,
    fade: true,
    rtl: true,
  });
}
if ( $('.bn_si_nav_slider').length ) {
  $('.bn_si_nav_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.bn_si_slider',
    arrows: true,
    speed: 1000,
    focusOnSelect: true,
    infinite: false,


  });
}
/*--------------------------------------------------------------------------------*/
/*  Product Single Zoom

/*---------------------------------------------------------------------------------*/
/*  Product Single Lightbox
/*---------------------------------------------------------------------------------*/
if ( $('.expand').length ) {

  $('.expand').magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
    removalDelay: 300,
    gallery:{
      enabled:true
    }
  });
}
/*---------------------------------------------------------------------------------*/
/*  Popup
/*---------------------------------------------------------------------------------*/


});