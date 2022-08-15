/*
* iziModal | v1.6.0
* http://izimodal.marcelodolce.com
* by Marcelo Dolce.
*/
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof module&&module.exports?module.exports=function(e,i){return void 0===i&&(i="undefined"!=typeof window?require("jquery"):require("jquery")(e)),t(i),i}:t(jQuery)}(function(t){function e(){var t,e=document.createElement("fakeelement"),i={animation:"animationend",OAnimation:"oAnimationEnd",MozAnimation:"animationend",WebkitAnimation:"webkitAnimationEnd"};for(t in i)if(void 0!==e.style[t])return i[t]}function i(t){return 9===t?navigator.appVersion.indexOf("MSIE 9.")!==-1:(userAgent=navigator.userAgent,userAgent.indexOf("MSIE ")>-1||userAgent.indexOf("Trident/")>-1)}function n(t){var e=/%|px|em|cm|vh|vw/;return parseInt(String(t).split(e)[0])}function o(e){var i=e.replace(/^.*#/,""),n=t(e);n.attr("id",i+"-tmp"),window.location.hash=e,n.attr("id",i)}var s=t(window),a=t(document),r="iziModal",l={CLOSING:"closing",CLOSED:"closed",OPENING:"opening",OPENED:"opened",DESTROYED:"destroyed"},d=e(),h=!!/Mobi/.test(navigator.userAgent);window.$iziModal={},window.$iziModal.autoOpen=0,window.$iziModal.history=!1;var c=function(t,e){this.init(t,e)};return c.prototype={constructor:c,init:function(e,i){var n=this;this.$element=t(e),void 0!==this.$element[0].id&&""!==this.$element[0].id?this.id=this.$element[0].id:(this.id=r+Math.floor(1e7*Math.random()+1),this.$element.attr("id",this.id)),this.classes=void 0!==this.$element.attr("class")?this.$element.attr("class"):"",this.content=this.$element.html(),this.state=l.CLOSED,this.options=i,this.width=0,this.timer=null,this.timerTimeout=null,this.progressBar=null,this.isPaused=!1,this.isFullscreen=!1,this.headerHeight=0,this.modalHeight=0,this.$overlay=t('<div class="'+r+'-overlay" style="background-color:'+i.overlayColor+'"></div>'),this.$navigate=t('<div class="'+r+'-navigate"><div class="'+r+'-navigate-caption">Use</div><button class="'+r+'-navigate-prev"></button><button class="'+r+'-navigate-next"></button></div>'),this.group={name:this.$element.attr("data-"+r+"-group"),index:null,ids:[]},this.$element.attr("aria-hidden","true"),this.$element.attr("aria-labelledby",this.id),this.$element.attr("role","dialog"),this.$element.hasClass("iziModal")||this.$element.addClass("iziModal"),void 0===this.group.name&&""!==i.group&&(this.group.name=i.group,this.$element.attr("data-"+r+"-group",i.group)),this.options.loop===!0&&this.$element.attr("data-"+r+"-loop",!0),t.each(this.options,function(t,e){var o=n.$element.attr("data-"+r+"-"+t);try{"undefined"!=typeof o&&(""===o||"true"==o?i[t]=!0:"false"==o?i[t]=!1:"function"==typeof e?i[t]=new Function(o):i[t]=o)}catch(s){}}),i.appendTo!==!1&&this.$element.appendTo(i.appendTo),i.iframe===!0?(this.$element.html('<div class="'+r+'-wrap"><div class="'+r+'-content"><iframe class="'+r+'-iframe"></iframe>'+this.content+"</div></div>"),null!==i.iframeHeight&&this.$element.find("."+r+"-iframe").css("height",i.iframeHeight)):this.$element.html('<div class="'+r+'-wrap"><div class="'+r+'-content">'+this.content+"</div></div>"),null!==this.options.background&&this.$element.css("background",this.options.background),this.$wrap=this.$element.find("."+r+"-wrap"),null===i.zindex||isNaN(parseInt(i.zindex))||(this.$element.css("z-index",i.zindex),this.$navigate.css("z-index",i.zindex-1),this.$overlay.css("z-index",i.zindex-2)),""!==i.radius&&this.$element.css("border-radius",i.radius),""!==i.padding&&this.$element.find("."+r+"-content").css("padding",i.padding),""!==i.theme&&("light"===i.theme?this.$element.addClass(r+"-light"):this.$element.addClass(i.theme)),i.rtl===!0&&this.$element.addClass(r+"-rtl"),i.openFullscreen===!0&&(this.isFullscreen=!0,this.$element.addClass("isFullscreen")),this.createHeader(),this.recalcWidth(),this.recalcVerticalPos(),!n.options.afterRender||"function"!=typeof n.options.afterRender&&"object"!=typeof n.options.afterRender||n.options.afterRender(n)},createHeader:function(){this.$header=t('<div class="'+r+'-header"><h2 class="'+r+'-header-title">'+this.options.title+'</h2><p class="'+r+'-header-subtitle">'+this.options.subtitle+'</p><div class="'+r+'-header-buttons"></div></div>'),this.options.closeButton===!0&&this.$header.find("."+r+"-header-buttons").append('<a href="javascript:void(0)" class="'+r+"-button "+r+'-button-close" data-'+r+"-close></a>"),this.options.fullscreen===!0&&this.$header.find("."+r+"-header-buttons").append('<a href="javascript:void(0)" class="'+r+"-button "+r+'-button-fullscreen" data-'+r+"-fullscreen></a>"),this.options.timeoutProgressbar===!0&&this.$header.prepend('<div class="'+r+'-progressbar"><div style="background-color:'+this.options.timeoutProgressbarColor+'"></div></div>'),""===this.options.subtitle&&this.$header.addClass(r+"-noSubtitle"),""!==this.options.title&&(null!==this.options.headerColor&&(this.options.borderBottom===!0&&this.$element.css("border-bottom","3px solid "+this.options.headerColor),this.$header.css("background",this.options.headerColor)),null===this.options.icon&&null===this.options.iconText||(this.$header.prepend('<i class="'+r+'-header-icon"></i>'),null!==this.options.icon&&this.$header.find("."+r+"-header-icon").addClass(this.options.icon).css("color",this.options.iconColor),null!==this.options.iconText&&this.$header.find("."+r+"-header-icon").html(this.options.iconText)),this.$element.css("overflow","hidden").prepend(this.$header))},setGroup:function(e){var i=this,n=this.group.name||e;if(this.group.ids=[],void 0!==e&&e!==this.group.name&&(n=e,this.group.name=n,this.$element.attr("data-"+r+"-group",n)),void 0!==n&&""!==n){var o=0;t.each(t("."+r+"[data-"+r+"-group="+n+"]"),function(e,n){i.group.ids.push(t(this)[0].id),i.id==t(this)[0].id&&(i.group.index=o),o++})}},toggle:function(){this.state==l.OPENED&&this.close(),this.state==l.CLOSED&&this.open()},startProgress:function(t){var e=this;this.isPaused=!1,clearTimeout(this.timerTimeout),this.options.timeoutProgressbar===!0?(this.progressBar={hideEta:null,maxHideTime:null,currentTime:(new Date).getTime(),el:this.$element.find("."+r+"-progressbar > div"),updateProgress:function(){if(!e.isPaused){e.progressBar.currentTime=e.progressBar.currentTime+10;var t=(e.progressBar.hideEta-e.progressBar.currentTime)/e.progressBar.maxHideTime*100;e.progressBar.el.width(t+"%"),t<0&&e.close()}}},t>0&&(this.progressBar.maxHideTime=parseFloat(t),this.progressBar.hideEta=(new Date).getTime()+this.progressBar.maxHideTime,this.timerTimeout=setInterval(this.progressBar.updateProgress,10))):this.timerTimeout=setTimeout(function(){e.close()},e.options.timeout)},pauseProgress:function(){this.isPaused=!0},resumeProgress:function(){this.isPaused=!1},resetProgress:function(t){clearTimeout(this.timerTimeout),this.progressBar={},this.$element.find("."+r+"-progressbar > div").width("100%")},open:function(e){function i(){s.state=l.OPENED,s.$element.trigger(l.OPENED),!s.options.onOpened||"function"!=typeof s.options.onOpened&&"object"!=typeof s.options.onOpened||s.options.onOpened(s)}function n(){s.$element.off("click","[data-"+r+"-close]").on("click","[data-"+r+"-close]",function(e){e.preventDefault();var i=t(e.currentTarget).attr("data-"+r+"-transitionOut");void 0!==i?s.close({transition:i}):s.close()}),s.$element.off("click","[data-"+r+"-fullscreen]").on("click","[data-"+r+"-fullscreen]",function(t){t.preventDefault(),s.isFullscreen===!0?(s.isFullscreen=!1,s.$element.removeClass("isFullscreen")):(s.isFullscreen=!0,s.$element.addClass("isFullscreen")),s.options.onFullscreen&&"function"==typeof s.options.onFullscreen&&s.options.onFullscreen(s),s.$element.trigger("fullscreen",s)}),s.$navigate.off("click","."+r+"-navigate-next").on("click","."+r+"-navigate-next",function(t){s.next(t)}),s.$element.off("click","[data-"+r+"-next]").on("click","[data-"+r+"-next]",function(t){s.next(t)}),s.$navigate.off("click","."+r+"-navigate-prev").on("click","."+r+"-navigate-prev",function(t){s.prev(t)}),s.$element.off("click","[data-"+r+"-prev]").on("click","[data-"+r+"-prev]",function(t){s.prev(t)})}var s=this;try{void 0!==e&&e.preventClose===!1&&t.each(t("."+r),function(e,i){if(void 0!==t(i).data().iziModal){var n=t(i).iziModal("getState");"opened"!=n&&"opening"!=n||t(i).iziModal("close")}})}catch(c){}if(function(){if(s.options.history){var t=document.title;document.title=t+" - "+s.options.title,o("#"+s.id),document.title=t,window.$iziModal.history=!0}else window.$iziModal.history=!1}(),this.state==l.CLOSED){if(n(),this.setGroup(),this.state=l.OPENING,this.$element.trigger(l.OPENING),this.$element.attr("aria-hidden","false"),this.options.timeoutProgressbar===!0&&this.$element.find("."+r+"-progressbar > div").width("100%"),this.options.iframe===!0){this.$element.find("."+r+"-content").addClass(r+"-content-loader"),this.$element.find("."+r+"-iframe").on("load",function(){t(this).parent().removeClass(r+"-content-loader")});var u=null;try{u=""!==t(e.currentTarget).attr("href")?t(e.currentTarget).attr("href"):null}catch(c){}if(null===this.options.iframeURL||null!==u&&void 0!==u||(u=this.options.iframeURL),null===u||void 0===u)throw new Error("Failed to find iframe URL");this.$element.find("."+r+"-iframe").attr("src",u)}(this.options.bodyOverflow||h)&&(t("html").addClass(r+"-isOverflow"),h&&t("body").css("overflow","hidden")),this.options.onOpening&&"function"==typeof this.options.onOpening&&this.options.onOpening(this),function(){if(s.group.ids.length>1){s.$navigate.appendTo("body"),s.$navigate.addClass("fadeIn"),s.options.navigateCaption===!0&&s.$navigate.find("."+r+"-navigate-caption").show();var n=s.$element.outerWidth();s.options.navigateArrows!==!1?"closeScreenEdge"===s.options.navigateArrows?(s.$navigate.find("."+r+"-navigate-prev").css("left",0).show(),s.$navigate.find("."+r+"-navigate-next").css("right",0).show()):(s.$navigate.find("."+r+"-navigate-prev").css("margin-left",-(n/2+84)).show(),s.$navigate.find("."+r+"-navigate-next").css("margin-right",-(n/2+84)).show()):(s.$navigate.find("."+r+"-navigate-prev").hide(),s.$navigate.find("."+r+"-navigate-next").hide());var o;0===s.group.index&&(o=t("."+r+"[data-"+r+'-group="'+s.group.name+'"][data-'+r+"-loop]").length,0===o&&s.options.loop===!1&&s.$navigate.find("."+r+"-navigate-prev").hide()),s.group.index+1===s.group.ids.length&&(o=t("."+r+"[data-"+r+'-group="'+s.group.name+'"][data-'+r+"-loop]").length,0===o&&s.options.loop===!1&&s.$navigate.find("."+r+"-navigate-next").hide())}s.options.overlay===!0&&(s.options.appendToOverlay===!1?s.$overlay.appendTo("body"):s.$overlay.appendTo(s.options.appendToOverlay)),s.options.transitionInOverlay&&s.$overlay.addClass(s.options.transitionInOverlay);var a=s.options.transitionIn;"object"==typeof e&&(void 0===e.transition&&void 0===e.transitionIn||(a=e.transition||e.transitionIn),void 0!==e.zindex&&s.setZindex(e.zindex)),""!==a&&void 0!==d?(s.$element.addClass("transitionIn "+a).show(),s.$wrap.one(d,function(){s.$element.removeClass(a+" transitionIn"),s.$overlay.removeClass(s.options.transitionInOverlay),s.$navigate.removeClass("fadeIn"),i()})):(s.$element.show(),i()),s.options.pauseOnHover!==!0||s.options.pauseOnHover!==!0||s.options.timeout===!1||isNaN(parseInt(s.options.timeout))||s.options.timeout===!1||0===s.options.timeout||(s.$element.off("mouseenter").on("mouseenter",function(t){t.preventDefault(),s.isPaused=!0}),s.$element.off("mouseleave").on("mouseleave",function(t){t.preventDefault(),s.isPaused=!1}))}(),this.options.timeout===!1||isNaN(parseInt(this.options.timeout))||this.options.timeout===!1||0===this.options.timeout||s.startProgress(this.options.timeout),this.options.overlayClose&&!this.$element.hasClass(this.options.transitionOut)&&this.$overlay.click(function(){s.close()}),this.options.focusInput&&this.$element.find(":input:not(button):enabled:visible:first").focus(),function p(){s.recalcLayout(),s.timer=setTimeout(p,300)}(),a.on("keydown."+r,function(t){s.options.closeOnEscape&&27===t.keyCode&&s.close()})}},close:function(e){function i(){n.state=l.CLOSED,n.$element.trigger(l.CLOSED),n.options.iframe===!0&&n.$element.find("."+r+"-iframe").attr("src",""),(n.options.bodyOverflow||h)&&(t("html").removeClass(r+"-isOverflow"),h&&t("body").css("overflow","auto")),n.options.onClosed&&"function"==typeof n.options.onClosed&&n.options.onClosed(n),n.options.restoreDefaultContent===!0&&n.$element.find("."+r+"-content").html(n.content),0===t("."+r+":visible").length&&t("html").removeClass(r+"-isAttached")}var n=this;if(this.state==l.OPENED||this.state==l.OPENING){a.off("keydown."+r),this.state=l.CLOSING,this.$element.trigger(l.CLOSING),this.$element.attr("aria-hidden","true"),clearTimeout(this.timer),clearTimeout(this.timerTimeout),n.options.onClosing&&"function"==typeof n.options.onClosing&&n.options.onClosing(this);var o=this.options.transitionOut;"object"==typeof e&&(void 0===e.transition&&void 0===e.transitionOut||(o=e.transition||e.transitionOut)),o===!1||""===o||void 0===d?(this.$element.hide(),this.$overlay.remove(),this.$navigate.remove(),i()):(this.$element.attr("class",[this.classes,r,o,"light"==this.options.theme?r+"-light":this.options.theme,this.isFullscreen===!0?"isFullscreen":"",this.options.rtl?r+"-rtl":""].join(" ")),this.$overlay.attr("class",r+"-overlay "+this.options.transitionOutOverlay),n.options.navigateArrows===!1||h||this.$navigate.attr("class",r+"-navigate fadeOut"),this.$element.one(d,function(){n.$element.hasClass(o)&&n.$element.removeClass(o+" transitionOut").hide(),n.$overlay.removeClass(n.options.transitionOutOverlay).remove(),n.$navigate.removeClass("fadeOut").remove(),i()}))}},next:function(e){var i=this,n="fadeInRight",o="fadeOutLeft",s=t("."+r+":visible"),a={};a.out=this,void 0!==e&&"object"!=typeof e?(e.preventDefault(),s=t(e.currentTarget),n=s.attr("data-"+r+"-transitionIn"),o=s.attr("data-"+r+"-transitionOut")):void 0!==e&&(void 0!==e.transitionIn&&(n=e.transitionIn),void 0!==e.transitionOut&&(o=e.transitionOut)),this.close({transition:o}),setTimeout(function(){for(var e=t("."+r+"[data-"+r+'-group="'+i.group.name+'"][data-'+r+"-loop]").length,o=i.group.index+1;o<=i.group.ids.length;o++){try{a["in"]=t("#"+i.group.ids[o]).data().iziModal}catch(s){}if("undefined"!=typeof a["in"]){t("#"+i.group.ids[o]).iziModal("open",{transition:n});break}if(o==i.group.ids.length&&e>0||i.options.loop===!0)for(var l=0;l<=i.group.ids.length;l++)if(a["in"]=t("#"+i.group.ids[l]).data().iziModal,"undefined"!=typeof a["in"]){t("#"+i.group.ids[l]).iziModal("open",{transition:n});break}}},200),t(document).trigger(r+"-group-change",a)},prev:function(e){var i=this,n="fadeInLeft",o="fadeOutRight",s=t("."+r+":visible"),a={};a.out=this,void 0!==e&&"object"!=typeof e?(e.preventDefault(),s=t(e.currentTarget),n=s.attr("data-"+r+"-transitionIn"),o=s.attr("data-"+r+"-transitionOut")):void 0!==e&&(void 0!==e.transitionIn&&(n=e.transitionIn),void 0!==e.transitionOut&&(o=e.transitionOut)),this.close({transition:o}),setTimeout(function(){for(var e=t("."+r+"[data-"+r+'-group="'+i.group.name+'"][data-'+r+"-loop]").length,o=i.group.index;o>=0;o--){try{a["in"]=t("#"+i.group.ids[o-1]).data().iziModal}catch(s){}if("undefined"!=typeof a["in"]){t("#"+i.group.ids[o-1]).iziModal("open",{transition:n});break}if(0===o&&e>0||i.options.loop===!0)for(var l=i.group.ids.length-1;l>=0;l--)if(a["in"]=t("#"+i.group.ids[l]).data().iziModal,"undefined"!=typeof a["in"]){t("#"+i.group.ids[l]).iziModal("open",{transition:n});break}}},200),t(document).trigger(r+"-group-change",a)},destroy:function(){var e=t.Event("destroy");this.$element.trigger(e),a.off("keydown."+r),clearTimeout(this.timer),clearTimeout(this.timerTimeout),this.options.iframe===!0&&this.$element.find("."+r+"-iframe").remove(),this.$element.html(this.$element.find("."+r+"-content").html()),this.$element.off("click","[data-"+r+"-close]"),this.$element.off("click","[data-"+r+"-fullscreen]"),this.$element.off("."+r).removeData(r).attr("style",""),this.$overlay.remove(),this.$navigate.remove(),this.$element.trigger(l.DESTROYED),this.$element=null},getState:function(){return this.state},getGroup:function(){return this.group},setWidth:function(t){this.options.width=t,this.recalcWidth();var e=this.$element.outerWidth();this.options.navigateArrows!==!0&&"closeToModal"!=this.options.navigateArrows||(this.$navigate.find("."+r+"-navigate-prev").css("margin-left",-(e/2+84)).show(),this.$navigate.find("."+r+"-navigate-next").css("margin-right",-(e/2+84)).show())},setTop:function(t){this.options.top=t,this.recalcVerticalPos(!1)},setBottom:function(t){this.options.bottom=t,this.recalcVerticalPos(!1)},setHeader:function(t){t?this.$element.find("."+r+"-header").show():(this.headerHeight=0,this.$element.find("."+r+"-header").hide())},setTitle:function(t){this.options.title=t,0===this.headerHeight&&this.createHeader(),0===this.$header.find("."+r+"-header-title").length&&this.$header.append('<h2 class="'+r+'-header-title"></h2>'),this.$header.find("."+r+"-header-title").html(t)},setSubtitle:function(t){""===t?(this.$header.find("."+r+"-header-subtitle").remove(),this.$header.addClass(r+"-noSubtitle")):(0===this.$header.find("."+r+"-header-subtitle").length&&this.$header.append('<p class="'+r+'-header-subtitle"></p>'),this.$header.removeClass(r+"-noSubtitle")),this.$header.find("."+r+"-header-subtitle").html(t),this.options.subtitle=t},setIcon:function(t){0===this.$header.find("."+r+"-header-icon").length&&this.$header.prepend('<i class="'+r+'-header-icon"></i>'),this.$header.find("."+r+"-header-icon").attr("class",r+"-header-icon "+t),this.options.icon=t},setIconText:function(t){this.$header.find("."+r+"-header-icon").html(t),this.options.iconText=t},setHeaderColor:function(t){this.options.borderBottom===!0&&this.$element.css("border-bottom","3px solid "+t),this.$header.css("background",t),this.options.headerColor=t},setBackground:function(t){t===!1?(this.options.background=null,this.$element.css("background","")):(this.$element.css("background",t),this.options.background=t)},setZindex:function(t){isNaN(parseInt(this.options.zindex))||(this.options.zindex=t,this.$element.css("z-index",t),this.$navigate.css("z-index",t-1),this.$overlay.css("z-index",t-2))},setFullscreen:function(t){t?(this.isFullscreen=!0,this.$element.addClass("isFullscreen")):(this.isFullscreen=!1,this.$element.removeClass("isFullscreen"))},setContent:function(t){if("object"==typeof t){var e=t["default"]||!1;e===!0&&(this.content=t.content),t=t.content}this.options.iframe===!1&&this.$element.find("."+r+"-content").html(t)},setTransitionIn:function(t){this.options.transitionIn=t},setTransitionOut:function(t){this.options.transitionOut=t},setTimeout:function(t){this.options.timeout=t},resetContent:function(){this.$element.find("."+r+"-content").html(this.content)},startLoading:function(){this.$element.find("."+r+"-loader").length||this.$element.append('<div class="'+r+'-loader fadeIn"></div>'),this.$element.find("."+r+"-loader").css({top:this.headerHeight,borderRadius:this.options.radius})},stopLoading:function(){var t=this.$element.find("."+r+"-loader");t.length||(this.$element.prepend('<div class="'+r+'-loader fadeIn"></div>'),t=this.$element.find("."+r+"-loader").css("border-radius",this.options.radius)),t.removeClass("fadeIn").addClass("fadeOut"),setTimeout(function(){t.remove()},600)},recalcWidth:function(){var t=this;if(this.$element.css("max-width",this.options.width),i()){var e=t.options.width;e.toString().split("%").length>1&&(e=t.$element.outerWidth()),t.$element.css({left:"50%",marginLeft:-(e/2)})}},recalcVerticalPos:function(t){null!==this.options.top&&this.options.top!==!1?(this.$element.css("margin-top",this.options.top),0===this.options.top&&this.$element.css({borderTopRightRadius:0,borderTopLeftRadius:0})):t===!1&&this.$element.css({marginTop:"",borderRadius:this.options.radius}),null!==this.options.bottom&&this.options.bottom!==!1?(this.$element.css("margin-bottom",this.options.bottom),0===this.options.bottom&&this.$element.css({borderBottomRightRadius:0,borderBottomLeftRadius:0})):t===!1&&this.$element.css({marginBottom:"",borderRadius:this.options.radius})},recalcLayout:function(){var e=this,o=s.height(),a=this.$element.outerHeight(),d=this.$element.outerWidth(),h=this.$element.find("."+r+"-content")[0].scrollHeight,c=h+this.headerHeight,u=this.$element.innerHeight()-this.headerHeight,p=(parseInt(-((this.$element.innerHeight()+1)/2))+"px",this.$wrap.scrollTop()),f=0;i()&&(d>=s.width()||this.isFullscreen===!0?this.$element.css({left:"0",marginLeft:""}):this.$element.css({left:"50%",marginLeft:-(d/2)})),this.options.borderBottom===!0&&""!==this.options.title&&(f=3),this.$element.find("."+r+"-header").length&&this.$element.find("."+r+"-header").is(":visible")?(this.headerHeight=parseInt(this.$element.find("."+r+"-header").innerHeight()),this.$element.css("overflow","hidden")):(this.headerHeight=0,this.$element.css("overflow","")),this.$element.find("."+r+"-loader").length&&this.$element.find("."+r+"-loader").css("top",this.headerHeight),a!==this.modalHeight&&(this.modalHeight=a,this.options.onResize&&"function"==typeof this.options.onResize&&this.options.onResize(this)),this.state!=l.OPENED&&this.state!=l.OPENING||(this.options.iframe===!0&&(o<this.options.iframeHeight+this.headerHeight+f||this.isFullscreen===!0?this.$element.find("."+r+"-iframe").css("height",o-(this.headerHeight+f)):this.$element.find("."+r+"-iframe").css("height",this.options.iframeHeight)),a==o?this.$element.addClass("isAttached"):this.$element.removeClass("isAttached"),this.isFullscreen===!1&&this.$element.width()>=s.width()?this.$element.find("."+r+"-button-fullscreen").hide():this.$element.find("."+r+"-button-fullscreen").show(),this.recalcButtons(),this.isFullscreen===!1&&(o=o-(n(this.options.top)||0)-(n(this.options.bottom)||0)),c>o?(this.options.top>0&&null===this.options.bottom&&h<s.height()&&this.$element.addClass("isAttachedBottom"),this.options.bottom>0&&null===this.options.top&&h<s.height()&&this.$element.addClass("isAttachedTop"),1===t("."+r+":visible").length&&t("html").addClass(r+"-isAttached"),this.$element.css("height",o)):(this.$element.css("height",h+(this.headerHeight+f)),this.$element.removeClass("isAttachedTop isAttachedBottom"),1===t("."+r+":visible").length&&t("html").removeClass(r+"-isAttached")),function(){h>u&&c>o?(e.$element.addClass("hasScroll"),e.$wrap.css("height",a-(e.headerHeight+f))):(e.$element.removeClass("hasScroll"),e.$wrap.css("height","auto"))}(),function(){u+p<h-30?e.$element.addClass("hasShadow"):e.$element.removeClass("hasShadow")}())},recalcButtons:function(){var t=this.$header.find("."+r+"-header-buttons").innerWidth()+10;this.options.rtl===!0?this.$header.css("padding-left",t):this.$header.css("padding-right",t)}},s.off("load."+r).on("load."+r,function(e){var i=document.location.hash;if(0===window.$iziModal.autoOpen&&!t("."+r).is(":visible"))try{var n=t(i).data();"undefined"!=typeof n&&n.iziModal.options.autoOpen!==!1&&t(i).iziModal("open")}catch(o){}}),s.off("hashchange."+r).on("hashchange."+r,function(e){var i=document.location.hash;if(""!==i)try{var n=t(i).data();"undefined"!=typeof n&&"opening"!==t(i).iziModal("getState")&&setTimeout(function(){t(i).iziModal("open",{preventClose:!1})},200)}catch(o){}else window.$iziModal.history&&t.each(t("."+r),function(e,i){if(void 0!==t(i).data().iziModal){var n=t(i).iziModal("getState");"opened"!=n&&"opening"!=n||t(i).iziModal("close")}})}),a.off("click","[data-"+r+"-open]").on("click","[data-"+r+"-open]",function(e){e.preventDefault();var i=t("."+r+":visible"),n=t(e.currentTarget).attr("data-"+r+"-open"),o=t(e.currentTarget).attr("data-"+r+"-preventClose"),s=t(e.currentTarget).attr("data-"+r+"-transitionIn"),a=t(e.currentTarget).attr("data-"+r+"-transitionOut"),l=t(e.currentTarget).attr("data-"+r+"-zindex");void 0!==l&&t(n).iziModal("setZindex",l),void 0===o&&(void 0!==a?i.iziModal("close",{transition:a}):i.iziModal("close")),setTimeout(function(){void 0!==s?t(n).iziModal("open",{transition:s}):t(n).iziModal("open")},200)}),a.off("keyup."+r).on("keyup."+r,function(e){if(t("."+r+":visible").length){var i=t("."+r+":visible")[0].id,n=t("#"+i).data().iziModal.options.arrowKeys,o=t("#"+i).iziModal("getGroup"),s=e||window.event,a=s.target||s.srcElement;void 0===i||!n||void 0===o.name||s.ctrlKey||s.metaKey||s.altKey||"INPUT"===a.tagName.toUpperCase()||"TEXTAREA"==a.tagName.toUpperCase()||(37===s.keyCode?t("#"+i).iziModal("prev",s):39===s.keyCode&&t("#"+i).iziModal("next",s))}}),t.fn[r]=function(e,i){if(!t(this).length&&"object"==typeof e){var n={$el:document.createElement("div"),id:this.selector.split("#"),"class":this.selector.split(".")};if(n.id.length>1){try{n.$el=document.createElement(id[0])}catch(o){}n.$el.id=this.selector.split("#")[1].trim()}else if(n["class"].length>1){try{n.$el=document.createElement(n["class"][0])}catch(o){}for(var s=1;s<n["class"].length;s++)n.$el.classList.add(n["class"][s].trim())}document.body.appendChild(n.$el),this.push(t(this.selector))}for(var a=this,l=0;l<a.length;l++){var d=t(a[l]),h=d.data(r),u=t.extend({},t.fn[r].defaults,d.data(),"object"==typeof e&&e);if(h||e&&"object"!=typeof e){if("string"==typeof e&&"undefined"!=typeof h)return h[e].apply(h,[].concat(i))}else d.data(r,h=new c(d,u));u.autoOpen&&(isNaN(parseInt(u.autoOpen))?u.autoOpen===!0&&h.open():setTimeout(function(){h.open()},u.autoOpen),window.$iziModal.autoOpen++)}return this},t.fn[r].defaults={title:"",subtitle:"",headerColor:"#88A0B9",background:null,theme:"",icon:null,iconText:null,iconColor:"",rtl:!1,width:600,top:null,bottom:null,borderBottom:!0,padding:0,radius:3,zindex:999,iframe:!1,iframeHeight:400,iframeURL:null,focusInput:!0,group:"",loop:!1,arrowKeys:!0,navigateCaption:!0,navigateArrows:!0,history:!1,restoreDefaultContent:!1,autoOpen:0,bodyOverflow:!1,fullscreen:!1,openFullscreen:!1,closeOnEscape:!0,closeButton:!0,appendTo:"body",appendToOverlay:"body",overlay:!0,overlayClose:!0,overlayColor:"rgba(0, 0, 0, 0.4)",timeout:!1,timeoutProgressbar:!1,pauseOnHover:!1,timeoutProgressbarColor:"rgba(255,255,255,0.5)",transitionIn:"comingIn",transitionOut:"comingOut",transitionInOverlay:"fadeIn",transitionOutOverlay:"fadeOut",onFullscreen:function(){},onResize:function(){},onOpening:function(){},onOpened:function(){},onClosing:function(){},onClosed:function(){},afterRender:function(){}},t.fn[r].Constructor=c,t.fn.iziModal});

/**
 * jQuery.marquee - scrolling text like old marquee element
 * @author Aamir Afridi - aamirafridi(at)gmail(dot)com / http://aamirafridi.com/jquery/jquery-marquee-plugin
 */
(function(f){f.fn.marquee=function(x){return this.each(function(){var a=f.extend({},f.fn.marquee.defaults,x),b=f(this),c,h,t,u,k,e=3,y="animation-play-state",n=!1,E=function(a,b,c){for(var e=["webkit","moz","MS","o",""],d=0;d<e.length;d++)e[d]||(b=b.toLowerCase()),a.addEventListener(e[d]+b,c,!1)},F=function(a){var b=[],c;for(c in a)a.hasOwnProperty(c)&&b.push(c+":"+a[c]);b.push();return"{"+b.join(",")+"}"},p={pause:function(){n&&a.allowCss3Support?c.css(y,"paused"):f.fn.pause&&c.pause();b.data("runningStatus",
"paused");b.trigger("paused")},resume:function(){n&&a.allowCss3Support?c.css(y,"running"):f.fn.resume&&c.resume();b.data("runningStatus","resumed");b.trigger("resumed")},toggle:function(){p["resumed"==b.data("runningStatus")?"pause":"resume"]()},destroy:function(){clearTimeout(b.timer);b.find("*").andSelf().unbind();b.html(b.find(".js-marquee:first").html())}};if("string"===typeof x)f.isFunction(p[x])&&(c||(c=b.find(".js-marquee-wrapper")),!0===b.data("css3AnimationIsSupported")&&(n=!0),p[x]());else{var v;
f.each(a,function(c,d){v=b.attr("data-"+c);if("undefined"!==typeof v){switch(v){case "true":v=!0;break;case "false":v=!1}a[c]=v}});a.speed&&(a.duration=a.speed*parseInt(b.width(),10));u="up"==a.direction||"down"==a.direction;a.gap=a.duplicated?parseInt(a.gap):0;b.wrapInner('<div class="js-marquee"></div>');var l=b.find(".js-marquee").css({"margin-right":a.gap,"float":"left"});a.duplicated&&l.clone(!0).appendTo(b);b.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');c=b.find(".js-marquee-wrapper");
if(u){var m=b.height();c.removeAttr("style");b.height(m);b.find(".js-marquee").css({"float":"none","margin-bottom":a.gap,"margin-right":0});a.duplicated&&b.find(".js-marquee:last").css({"margin-bottom":0});var q=b.find(".js-marquee:first").height()+a.gap;a.startVisible&&!a.duplicated?(a._completeDuration=(parseInt(q,10)+parseInt(m,10))/parseInt(m,10)*a.duration,a.duration*=parseInt(q,10)/parseInt(m,10)):a.duration*=(parseInt(q,10)+parseInt(m,10))/parseInt(m,10)}else k=b.find(".js-marquee:first").width()+
a.gap,h=b.width(),a.startVisible&&!a.duplicated?(a._completeDuration=(parseInt(k,10)+parseInt(h,10))/parseInt(h,10)*a.duration,a.duration*=parseInt(k,10)/parseInt(h,10)):a.duration*=(parseInt(k,10)+parseInt(h,10))/parseInt(h,10);a.duplicated&&(a.duration/=2);if(a.allowCss3Support){var l=document.body||document.createElement("div"),g="marqueeAnimation-"+Math.floor(1E7*Math.random()),A=["Webkit","Moz","O","ms","Khtml"],B="animation",d="",r="";l.style.animation&&(r="@keyframes "+g+" ",n=!0);if(!1===
n)for(var z=0;z<A.length;z++)if(void 0!==l.style[A[z]+"AnimationName"]){l="-"+A[z].toLowerCase()+"-";B=l+B;y=l+y;r="@"+l+"keyframes "+g+" ";n=!0;break}n&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s infinite "+a.css3easing,b.data("css3AnimationIsSupported",!0))}var C=function(){c.css("margin-top","up"==a.direction?m+"px":"-"+q+"px")},D=function(){c.css("margin-left","left"==a.direction?h+"px":"-"+k+"px")};a.duplicated?(u?a.startVisible?c.css("margin-top",0):c.css("margin-top","up"==a.direction?
m+"px":"-"+(2*q-a.gap)+"px"):a.startVisible?c.css("margin-left",0):c.css("margin-left","left"==a.direction?h+"px":"-"+(2*k-a.gap)+"px"),a.startVisible||(e=1)):a.startVisible?e=2:u?C():D();var w=function(){a.duplicated&&(1===e?(a._originalDuration=a.duration,a.duration=u?"up"==a.direction?a.duration+m/(q/a.duration):2*a.duration:"left"==a.direction?a.duration+h/(k/a.duration):2*a.duration,d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),e++):2===e&&(a.duration=a._originalDuration,
d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),e++));u?a.duplicated?(2<e&&c.css("margin-top","up"==a.direction?0:"-"+q+"px"),t={"margin-top":"up"==a.direction?"-"+q+"px":0}):a.startVisible?2===e?(d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),t={"margin-top":"up"==a.direction?"-"+q+"px":m+"px"},e++):3===e&&(a.duration=a._completeDuration,d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),C()):(C(),t={"margin-top":"up"==
a.direction?"-"+c.height()+"px":m+"px"}):a.duplicated?(2<e&&c.css("margin-left","left"==a.direction?0:"-"+k+"px"),t={"margin-left":"left"==a.direction?"-"+k+"px":0}):a.startVisible?2===e?(d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),t={"margin-left":"left"==a.direction?"-"+k+"px":h+"px"},e++):3===e&&(a.duration=a._completeDuration,d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),D()):(D(),t={"margin-left":"left"==a.direction?"-"+k+"px":
h+"px"});b.trigger("beforeStarting");if(n){c.css(B,d);var l=r+" { 100%  "+F(t)+"}",p=c.find("style");0!==p.length?p.filter(":last").html(l):c.append("<style>"+l+"</style>");E(c[0],"AnimationIteration",function(){b.trigger("finished")});E(c[0],"AnimationEnd",function(){w();b.trigger("finished")})}else c.animate(t,a.duration,a.easing,function(){b.trigger("finished");a.pauseOnCycle?b.timer=setTimeout(w,a.delayBeforeStart):w()});b.data("runningStatus","resumed")};b.bind("pause",p.pause);b.bind("resume",
p.resume);a.pauseOnHover&&b.bind("mouseenter mouseleave",p.toggle);n&&a.allowCss3Support?w():b.timer=setTimeout(w,a.delayBeforeStart)}})};f.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:1E3,direction:"left",duplicated:!1,duration:5E3,gap:20,pauseOnCycle:!1,pauseOnHover:!1,startVisible:!1}})(jQuery);

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Â© 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright Â© 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */


/*! Pushy - v1.0.0 - 2016-3-1
* Pushy is a responsive off-canvas navigation menu using CSS transforms & transitions.
* https://github.com/christophery/pushy/
* by Christopher Yee */
!function(a){function b(){g.hasClass(k)?h.toggleClass(l):h.toggleClass(m)}function c(){g.hasClass(k)?(h.addClass(l),g.animate({left:"0px"},p),i.animate({left:q},p),j.animate({left:q},p)):(h.addClass(m),g.animate({right:"0px"},p),i.animate({right:q},p),j.animate({right:q},p))}function d(){g.hasClass(k)?(h.removeClass(l),g.animate({left:"-"+q},p),i.animate({left:"0px"},p),j.animate({left:"0px"},p)):(h.removeClass(m),g.animate({right:"-"+q},p),i.animate({right:"0px"},p),j.animate({right:"0px"},p))}function e(){a(r).addClass(t),a(r).on("click",function(){var b=a(this);b.hasClass(t)?(a(r).addClass(t).removeClass(s),b.removeClass(t).addClass(s)):b.addClass(t).removeClass(s)})}function f(){a(r).addClass(t),u.children("a").on("click",function(b){b.preventDefault(),a(this).toggleClass(s).next(".mobilemenu-submenu ul").slideToggle(200).end().parent(r).siblings(r).children("a").removeClass(s).next(".mobilemenu-submenu ul").slideUp(200)})}var g=a(".mobilemenu"),h=a("body"),i=a("#container"),j=a(".push"),k="mobilemenu-left",l="mobilemenu-open-left",m="mobilemenu-open-right",n=a(".site-overlay"),o=a(".menu-btn, .mobilemenu-link"),p=200,q=g.width()+"px",r=".mobilemenu-submenu",s="mobilemenu-submenu-open",t="mobilemenu-submenu-closed",u=a(r),v=function(){var a=document.createElement("p"),b=!1,c={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"};document.body.insertBefore(a,null);for(var d in c)void 0!==a.style[d]&&(a.style[d]="translate3d(1px,1px,1px)",b=window.getComputedStyle(a).getPropertyValue(c[d]));return document.body.removeChild(a),void 0!==b&&b.length>0&&"none"!==b}();if(v)g.css({visibility:"visible"}),e(),o.on("click",function(){b()}),n.on("click",function(){b()});else{h.addClass("no-csstransforms3d"),g.hasClass(k)?g.css({left:"-"+q}):g.css({right:"-"+q}),g.css({visibility:"visible"}),i.css({"overflow-x":"hidden"});var w=!1;f(),o.on("click",function(){w?(d(),w=!1):(c(),w=!0)}),n.on("click",function(){w?(d(),w=!1):(c(),w=!0)})}}(jQuery);



/*
 * jQuery Countdown - v1.2.8
 * http://github.com/kemar/jquery.countdown
 * Licensed MIT
 */

(function ($, window, document, undefined) {

    "use strict";

    /*
     * .countDown()
     *
     * Description:
     *      Unobtrusive and easily skinable countdown jQuery plugin.
     *
     * Usage:
     *      $(element).countDown()
     *
     *      $(element) is a valid <time> or any other HTML tag containing a text representation of a date/time
     *      or duration remaining before a deadline expires.
     *      If $(element) is a <time> tag, the datetime attribute is checked first.
     *          <time datetime="2013-12-13T17:43:00">Friday, December 13th, 2013 5:43pm</time>
     *          <time>2012-12-08T14:30:00+0100</time>
     *          <time>PT01H01M15S</time>
     *          <h1>600 days, 3:59:12</h1>
     *
     *      The text representation of a date/time or duration can be:
     *      - a valid duration string:
     *          PT00M10S
     *          PT01H01M15S
     *          P2DT20H00M10S
     *      - a valid global date and time string with its timezone offset:
     *          2012-12-08T14:30:00.432+0100
     *          2012-12-08T05:30:00-0800
     *          2012-12-08T13:30Z
     *      - a valid time string:
     *          12:30
     *          12:30:39
     *          12:30:39.929
     *      - a human readable duration string:
     *          2h 0m
     *          4h 18m 3s
     *          24h00m59s
     *          600 jours, 3:59:12
     *          600 days, 3:59:12
     *      - the output of a JavaScript Date.parse() parsable string:
     *          Date.toDateString() => Sat Dec 20 2014
     *          Date.toGMTString()  => Sat, 20 Dec 2014 09:24:00 GMT
     *          Date.toUTCString()  => Sat, 20 Dec 2014 09:24:00 GMT
     *
     *      If $(element) is not a <time> tag, a new one is created and appended to $(element).
     *
     * Literature, resources and inspiration:
     *      JavaScript Date reference:
     *          https://developer.mozilla.org/docs/JavaScript/Reference/Global_Objects/Date
     *      About the <time> element:
     *          https://html.spec.whatwg.org/multipage/semantics.html#the-time-element
     *          http://www.w3.org/TR/html5/text-level-semantics.html#the-time-element
     *          http://wiki.whatwg.org/wiki/Time_element
     *      <time> history:
     *          http://www.brucelawson.co.uk/2012/best-of-time/
     *          http://www.webmonkey.com/2011/11/w3c-adds-time-element-back-to-html5/
     *      Formats:
     *          http://en.wikipedia.org/wiki/ISO_8601
     *      jQuery plugin syntax:
     *          https://github.com/jquery-boilerplate/jquery-patterns
     *          https://github.com/jquery-boilerplate/jquery-boilerplate/wiki/Extending-jQuery-Boilerplate
     *          http://frederictonug.net/jquery-plugin-development-with-the-jquery-boilerplate
     *
     * Example of generated HTML markup:
     *      <time class="countdown" datetime="P12DT05H16M22S">
     *          <span class="item item-dd">
     *              <span class="dd"></span>
     *              <span class="label label-dd">days</span>
     *          </span>
     *          <span class="separator separator-dd">,</span>
     *          <span class="item item-hh">
     *              <span class="hh-1"></span>
     *              <span class="hh-2"></span>
     *              <span class="label label-hh">hours</span>
     *          </span>
     *          <span class="separator">:</span>
     *          <span class="item item-mm">
     *              <span class="mm-1"></span>
     *              <span class="mm-2"></span>
     *              <span class="label label-mm">minutes</span>
     *          </span>
     *          <span class="separator">:</span>
     *          <span class="item item-ss">
     *              <span class="ss-1"></span>
     *              <span class="ss-2"></span>
     *              <span class="label label-ss">seconds</span>
     *          </span>
     *      </time>
     */

    var pluginName = 'countDown';

    var defaults = {
        css_class: 'countdown',
        always_show_days: false,
        with_labels: true,
        with_seconds: true,
        with_separators: true,
        with_hh_leading_zero: true,
        with_mm_leading_zero: true,
        with_ss_leading_zero: true,
        label_dd: 'روز',
        label_hh: 'ساعت',
        label_mm: 'دقیقه',
        label_ss: 'ثانیه',
        separator: ':',
        separator_days: ','
    };

    function CountDown(element, options) {
        this.element = $(element);
        this.options = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    $.extend(CountDown.prototype, {

        init: function () {
            if (this.element.children().length) {
                return;
            }
            if (this.element.attr('datetime')) {  // Try to parse the datetime attribute first.
                this.endDate = this.parseEndDate(this.element.attr('datetime'));
            }
            if (this.endDate === undefined) {  // Fallback on the text content.
                this.endDate = this.parseEndDate(this.element.text());
            }
            if (this.endDate === undefined) {  // Unable to parse a date.
                return;
            }
            if (this.element.is('time')) {
                this.timeElement = this.element;
            } else {
                this.timeElement = $('<time></time>');
                this.element.html(this.timeElement);
            }
            this.markup();
            this.setTimeoutDelay = this.sToMs(1);
            this.daysVisible = true;
            this.timeElement.on('time.elapsed', this.options.onTimeElapsed);
            this.timeElement.on('time.tick', this.options.onTick);
            this.doCountDown();
        },

        parseEndDate: function (str) {

            var d;

            d = this.parseDuration(str);
            if (d instanceof Date) {
                return d;
            }

            d = this.parseDateTime(str);
            if (d instanceof Date) {
                return d;
            }

            d = this.parseHumanReadableDuration(str);
            if (d instanceof Date) {
                return d;
            }

            // Try to parse a string representation of a date.
            // https://developer.mozilla.org/docs/Web/JavaScript/Reference/Global_Objects/Date/parse
            d = Date.parse(str);
            if (!isNaN(d)) {
                return new Date(d);
            }

        },

        // Convert a valid duration string representing a duration to a Date object.
        //
        // https://html.spec.whatwg.org/multipage/infrastructure.html#valid-duration-string
        // http://en.wikipedia.org/wiki/ISO_8601#Durations
        // i.e.: P2DT20H00M10S, PT01H01M15S, PT00M10S, P2D, P2DT20H00M10.55S
        //
        // RegExp:
        // /^
        //    P                     => duration designator (historically called "period")
        //    (?:(\d+)D)?           => (days) followed by the letter "D" (optional)
        //    T?                    => the letter "T" that precedes the time components of the representation (optional)
        //    (?:(\d+)H)?           => (hours) followed by the letter "H" (optional)
        //    (?:(\d+)M)?           => (minutes) followed by the letter "M" (optional)
        //    (
        //         ?:(\d+)          => (seconds) (optional)
        //         (?:\.(\d{1,3}))? => (milliseconds) full stop character (.) and fractional part of second (optional)
        //         S                => followed by the letter "S"
        //    )?
        // $/
        parseDuration: function (str) {
            var timeArray = str.match(/^P(?:(\d+)D)?T?(?:(\d+)H)?(?:(\d+)M)?(?:(\d+)(?:\.(\d{1,3}))?S)?$/);
            if (timeArray) {
                var d, dd, hh, mm, ss, ms;
                dd = timeArray[1] ? this.dToMs(timeArray[1]) : 0;
                hh = timeArray[2] ? this.hToMs(timeArray[2]) : 0;
                mm = timeArray[3] ? this.mToMs(timeArray[3]) : 0;
                ss = timeArray[4] ? this.sToMs(timeArray[4]) : 0;
                ms = timeArray[5] ? parseInt(timeArray[5], 10) : 0;
                d = new Date();
                d.setTime(d.getTime() + dd + hh + mm + ss + ms);
                return d;
            }
        },

        // Convert a valid global date and time string to a Date object.
        // https://html.spec.whatwg.org/multipage/infrastructure.html#valid-global-date-and-time-string
        //
        // 2012-12-08T13:30:39+0100
        //     => ["2012-12-08T13:30:39+0100", "2012", "12", "08", "13", "30", "39", undefined, "+0100"]
        // 2012-12-08T06:54-0800
        //     => ["2012-12-08T06:54-0800", "2012", "12", "08", "06", "54", undefined, undefined, "-0800"]
        // 2012-12-08 13:30Z
        //     => ["2012-12-08 13:30Z", "2012", "12", "08", "13", "30", undefined, undefined, "Z"]
        // 2013-12-08 06:54:39.929-10:30
        //     => ["2013-12-08 06:54:39.929-08:30", "2013", "12", "08", "06", "54", "39", "929", "-10:30"]
        //
        // RegExp:
        // ^
        //     (\d{4,})         => (year) (four or more ASCII digits)
        //     -                => hyphen-minus
        //     (\d{2})          => (month)
        //     -                => hyphen-minus
        //     (\d{2})          => (day)
        //     [T\s]            => T or space
        //     (\d{2})          => (hours)
        //     :                => colon
        //     (\d{2})          => (minutes)
        //     (?:\:(\d{2}))?   => colon and (seconds) (optional)
        //     (?:\.(\d{1,3}))? => full stop character (.) and fractional part of second (milliseconds) (optional)
        //     ([Z\+\-\:\d]+)?  => time-zone (offset) string (optional)
        // $
        parseDateTime: function (str) {
            var timeArray = str.match(
                /^(\d{4,})-(\d{2})-(\d{2})[T\s](\d{2}):(\d{2})(?:\:(\d{2}))?(?:\.(\d{1,3}))?([Z\+\-\:\d]+)?$/);
            if (timeArray) {

                // Convert UTC offset from string to milliseconds.
                // +01:00 => ["+01:00", "+", "01", "00"] => -360000
                // -08:00 => ["-08:00", "-", "08", "00"] => 28800000
                // +05:30 => ["+05:30", "+", "05", "30"] => -19800000
                var offset = timeArray[8] ? timeArray[8].match(/^([\+\-])?(\d{2}):?(\d{2})$/) : undefined;

                // Time difference between UTC and the given time zone in milliseconds.
                var utcOffset = 0;
                if (offset) {
                    utcOffset = this.hToMs(offset[2]) + this.mToMs(offset[3]);
                    utcOffset = (offset[1] === '-') ? utcOffset : -utcOffset;
                }

                var d, yy, mo, dd, hh, mm, ss, ms;
                yy = timeArray[1];
                mo = timeArray[2] - 1;
                dd = timeArray[3];
                hh = timeArray[4] || 0;
                mm = timeArray[5] || 0;
                ss = timeArray[6] || 0;
                ms = timeArray[7] || 0;
                d = new Date(Date.UTC(yy, mo, dd, hh, mm, ss, ms));

                d.setTime(d.getTime() + utcOffset);

                return d;

            }
        },

        // Convert a string representing a human readable duration to a Date object.
        // Hours and minutes are mandatory.
        //
        // 600 days, 3:59:12 => ["600 days, 3:59:12", "600", "3", "59", "12", undefined]
        //           3:59:12 => ["3:59:12", undefined, "3", "59", "12", undefined]
        //             00:01 => ["00:01", undefined, "00", "01", undefined, undefined]
        //          00:00:59 => ["00:00:59", undefined, "00", "00", "59", undefined]
        //         240:00:59 => ["240:00:59", undefined, "240", "00", "59", undefined]
        //         4h 18m 3s => ["4h 18m 3s", undefined, "4", "18", "3", undefined]
        //     1d 0h 00m 59s => ["1d 0h 00m 59s", "1", "0", "00", "59", undefined]
        //             2h 0m => ["2h 0m", undefined, "2", "0", undefined, undefined]
        //         24h00m59s => ["24h00m59s", undefined, "24", "00", "59", undefined]
        //      12:30:39.929 => ["12:30:39.929", undefined, "12", "30", "39", "929"]
        //
        // RegExp:
        // /^
        //     (?:(\d+).+\s)?   => (days) followed by any character 0 or more times and a space (optional)
        //     (\d+)[h:]\s?     => (hours) followed by "h" or ":" and an optional space
        //     (\d+)[m:]?\s?    => (minutes) followed by "m" or ":" and an optional space
        //     (\d+)?[s]?       => (seconds) followed by an optional space (optional)
        //     (?:\.(\d{1,3}))? => (milliseconds) full stop character (.) and fractional part of second (optional)
        // $/
        parseHumanReadableDuration: function (str) {
            var timeArray = str.match(/^(?:(\d+).+\s)?(\d+)[h:]\s?(\d+)[m:]?\s?(\d+)?[s]?(?:\.(\d{1,3}))?$/);
            if (timeArray) {
                var d, dd, hh, mm, ss, ms;
                d = new Date();
                dd = timeArray[1] ? this.dToMs(timeArray[1]) : 0;
                hh = timeArray[2] ? this.hToMs(timeArray[2]) : 0;
                mm = timeArray[3] ? this.mToMs(timeArray[3]) : 0;
                ss = timeArray[4] ? this.sToMs(timeArray[4]) : 0;
                ms = timeArray[5] ? parseInt(timeArray[5], 10) : 0;
                d.setTime(d.getTime() + dd + hh + mm + ss + ms);
                return d;
            }
        },

        // Convert seconds to milliseconds.
        sToMs: function (s) {
            return parseInt(s, 10) * 1000;
        },

        // Convert minutes to milliseconds.
        mToMs: function (m) {
            return parseInt(m, 10) * 60 * 1000;
        },

        // Convert hours to milliseconds.
        hToMs: function (h) {
            return parseInt(h, 10) * 60 * 60 * 1000;
        },

        // Convert days to milliseconds.
        dToMs: function (d) {
            return parseInt(d, 10) * 24 * 60 * 60 * 1000;
        },

        // Extract seconds (0-59) from the given timedelta expressed in milliseconds.
        // A timedelta represents a duration, the difference between two dates or times.
        msToS: function (ms) {
            return parseInt((ms / 1000) % 60, 10);
        },

        // Extract minutes (0-59) from the given timedelta expressed in milliseconds.
        msToM: function (ms) {
            return parseInt((ms / 1000 / 60) % 60, 10);
        },

        // Extract hours (0-23) from the given timedelta expressed in milliseconds.
        msToH: function (ms) {
            return parseInt((ms / 1000 / 60 / 60) % 24, 10);
        },

        // Extract the number of days from the given timedelta expressed in milliseconds.
        msToD: function (ms) {
            return parseInt((ms / 1000 / 60 / 60 / 24), 10);
        },

        markup: function () {
            // Prepare the HTML content of the <time> element.
            var html = [
                '<span class="item item-dd">',
                    '<span class="dd"></span>',
                    '<span class="label label-dd">', this.options.label_dd, '</span>',
                '</span>',
                '<span class="separator separator-dd">', this.options.separator_days, '</span>',
                '<span class="item item-hh">',
                    '<span class="hh-1"></span>',
                    '<span class="hh-2"></span>',
                    '<span class="label label-hh">', this.options.label_hh, '</span>',
                '</span>',
                '<span class="separator">', this.options.separator, '</span>',
                '<span class="item item-mm">',
                    '<span class="mm-1"></span>',
                    '<span class="mm-2"></span>',
                    '<span class="label label-mm">', this.options.label_mm, '</span>',
                '</span>',
                '<span class="separator">', this.options.separator, '</span>',
                '<span class="item item-ss">',
                    '<span class="ss-1"></span>',
                    '<span class="ss-2"></span>',
                    '<span class="label label-ss">', this.options.label_ss, '</span>',
                '</span>'
            ];
            this.timeElement.html(html.join(''));
            // Customize HTML according to options.
            if (!this.options.with_labels) {
                this.timeElement.find('.label').remove();
            }
            if (!this.options.with_separators) {
                this.timeElement.find('.separator').remove();
            }
            if (!this.options.with_seconds) {
                this.timeElement.find('.item-ss').remove();
                this.timeElement.find('.separator').last().remove();
            }
            // Cache elements.
            this.item_dd       = this.timeElement.find('.item-dd');
            this.separator_dd  = this.timeElement.find('.separator-dd');
            this.remaining_dd  = this.timeElement.find('.dd');
            this.remaining_hh1 = this.timeElement.find('.hh-1');
            this.remaining_hh2 = this.timeElement.find('.hh-2');
            this.remaining_mm1 = this.timeElement.find('.mm-1');
            this.remaining_mm2 = this.timeElement.find('.mm-2');
            this.remaining_ss1 = this.timeElement.find('.ss-1');
            this.remaining_ss2 = this.timeElement.find('.ss-2');
            // Set the css class of the <time> element.
            this.timeElement.addClass(this.options.css_class);
        },

        doCountDown: function () {
            // Calculate the difference between the two dates in milliseconds.
            var ms = this.endDate.getTime() - new Date().getTime();
            // Extract seconds, minutes, hours and days from the timedelta expressed in milliseconds.
            var ss = this.msToS(ms);
            var mm = this.msToM(ms);
            var hh = this.msToH(ms);
            var dd = this.msToD(ms);
            // Prevent display of negative values.
            if (ms <= 0) {
                ss = mm = hh = dd = 0;
            }
            // Update display.
            // Use a space instead of 0 when no leading zero is required.
            this.displayRemainingTime({
                'ss': ss < 10 ? (this.options.with_ss_leading_zero ? '0' : ' ') + ss.toString() : ss.toString(),
                'mm': mm < 10 ? (this.options.with_mm_leading_zero ? '0' : ' ') + mm.toString() : mm.toString(),
                'hh': hh < 10 ? (this.options.with_hh_leading_zero ? '0' : ' ') + hh.toString() : hh.toString(),
                'dd': dd.toString()
            });
            // If seconds are hidden, stop the counter as soon as there is no minute left.
            if (!this.options.with_seconds && dd === 0 && mm === 0 && hh === 0) {
                ss = 0;
            }
            if (dd === 0 && mm === 0 && hh === 0 && ss === 0) {
                return this.timeElement.trigger('time.elapsed');
            }
            // Reload it.
            var self = this;
            window.setTimeout(function () { self.doCountDown(); }, self.setTimeoutDelay);
            return this.timeElement.trigger('time.tick', ms);
        },

        /**
         * Display the remaining time.
         *
         * @param {Object} remaining - an object literal containing a string representation
         * of days, hours, minutes and seconds remaining.
         * E.g. with leading zeros:
         * { dd: "600", hh: "03", mm: "59", ss: "11" }
         * Or without leading zeros:
         * { dd: "600", hh: " 3", mm: " 9", ss: "11" }
         */
        displayRemainingTime: function (remaining) {
            // Format the datetime attribute of the <time> element to an ISO 8601 duration.
            // https://html.spec.whatwg.org/multipage/semantics.html#datetime-value
            // I.e.: <time datetime="P2DT00H00M30S">2 00:00:00</time>
            var attr = [];
            attr.push('P');
            if (remaining.dd !== '0') {
                attr.push(remaining.dd, 'D');
            }
            attr.push('T', remaining.hh, 'H', remaining.mm, 'M');
            if (this.options.with_seconds) {
                attr.push(remaining.ss, 'S');
            }
            this.timeElement.attr('datetime', attr.join(''));
            // Remove days if necessary.
            if (this.daysVisible && !this.options.always_show_days && remaining.dd === '0') {
                this.item_dd.remove();
                this.separator_dd.remove();
                this.daysVisible = false;
            }
            // Update countdown values.
            // Use `trim` to convert spaces to empty string when there are no leading zeros.
            this.remaining_dd.text(remaining.dd);
            this.remaining_hh1.text(remaining.hh[0].trim());
            this.remaining_hh2.text(remaining.hh[1]);
            this.remaining_mm1.text(remaining.mm[0].trim());
            this.remaining_mm2.text(remaining.mm[1]);
            this.remaining_ss1.text(remaining.ss[0].trim());
            this.remaining_ss2.text(remaining.ss[1]);
        }

    });

    $.fn[pluginName] = function (options) {

        var args = arguments;

        // If the first parameter is an object (options) or was omitted, instantiate a new plugin instance.
        if (options === undefined || typeof options === 'object') {
            return this.each(function () {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName, new CountDown(this, options));
                }
            });
        }

        // Allow any public function (i.e. a function whose name isn't 'init' or doesn't start with an underscore)
        // to be called via the jQuery plugin, e.g. $(element).countDown('functionName', arg1, arg2).
        else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {

            // Cache the method call to make it possible to return a value.
            var returns;

            this.each(function () {
                var instance = $.data(this, 'plugin_' + pluginName);

                // Tests that there's already a plugin instance and checks that the requested public method exists.
                if (instance instanceof CountDown && typeof instance[options] === 'function') {
                    // Call the method of our plugin instance, and pass it the supplied arguments.
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }

                // Allow instances to be destroyed via the 'destroy' method.
                if (options === 'destroy') {
                    $.data(this, 'plugin_' + pluginName, null);
                }

            });

            // If the earlier cached method gives a value back return the value,
            // otherwise return this to preserve chainability.
            return returns !== undefined ? returns : this;

        }

    };

})(window.jQuery, window, document);


/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.6.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */
!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"undefined"!=typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){"use strict";var b=window.Slick||{};b=function(){function c(c,d){var f,e=this;e.defaults={accessibility:!0,adaptiveHeight:!1,appendArrows:a(c),appendDots:a(c),arrows:!0,asNavFor:null,prevArrow:'<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',nextArrow:'<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',autoplay:!1,autoplaySpeed:3e3,centerMode:!1,centerPadding:"50px",cssEase:"ease",customPaging:function(b,c){return a('<button type="button" data-role="none" role="button" tabindex="0" />').text(c+1)},dots:!1,dotsClass:"slick-dots",draggable:!0,easing:"linear",edgeFriction:.35,fade:!1,focusOnSelect:!1,infinite:!0,initialSlide:0,lazyLoad:"ondemand",mobileFirst:!1,pauseOnHover:!0,pauseOnFocus:!0,pauseOnDotsHover:!1,respondTo:"window",responsive:null,rows:1,rtl:!1,slide:"",slidesPerRow:1,slidesToShow:1,slidesToScroll:1,speed:500,swipe:!0,swipeToSlide:!1,touchMove:!0,touchThreshold:5,useCSS:!0,useTransform:!0,variableWidth:!1,vertical:!1,verticalSwiping:!1,waitForAnimate:!0,zIndex:1e3},e.initials={animating:!1,dragging:!1,autoPlayTimer:null,currentDirection:0,currentLeft:null,currentSlide:0,direction:1,$dots:null,listWidth:null,listHeight:null,loadIndex:0,$nextArrow:null,$prevArrow:null,slideCount:null,slideWidth:null,$slideTrack:null,$slides:null,sliding:!1,slideOffset:0,swipeLeft:null,$list:null,touchObject:{},transformsEnabled:!1,unslicked:!1},a.extend(e,e.initials),e.activeBreakpoint=null,e.animType=null,e.animProp=null,e.breakpoints=[],e.breakpointSettings=[],e.cssTransitions=!1,e.focussed=!1,e.interrupted=!1,e.hidden="hidden",e.paused=!0,e.positionProp=null,e.respondTo=null,e.rowCount=1,e.shouldClick=!0,e.$slider=a(c),e.$slidesCache=null,e.transformType=null,e.transitionType=null,e.visibilityChange="visibilitychange",e.windowWidth=0,e.windowTimer=null,f=a(c).data("slick")||{},e.options=a.extend({},e.defaults,d,f),e.currentSlide=e.options.initialSlide,e.originalSettings=e.options,"undefined"!=typeof document.mozHidden?(e.hidden="mozHidden",e.visibilityChange="mozvisibilitychange"):"undefined"!=typeof document.webkitHidden&&(e.hidden="webkitHidden",e.visibilityChange="webkitvisibilitychange"),e.autoPlay=a.proxy(e.autoPlay,e),e.autoPlayClear=a.proxy(e.autoPlayClear,e),e.autoPlayIterator=a.proxy(e.autoPlayIterator,e),e.changeSlide=a.proxy(e.changeSlide,e),e.clickHandler=a.proxy(e.clickHandler,e),e.selectHandler=a.proxy(e.selectHandler,e),e.setPosition=a.proxy(e.setPosition,e),e.swipeHandler=a.proxy(e.swipeHandler,e),e.dragHandler=a.proxy(e.dragHandler,e),e.keyHandler=a.proxy(e.keyHandler,e),e.instanceUid=b++,e.htmlExpr=/^(?:\s*(<[\w\W]+>)[^>]*)$/,e.registerBreakpoints(),e.init(!0)}var b=0;return c}(),b.prototype.activateADA=function(){var a=this;a.$slideTrack.find(".slick-active").attr({"aria-hidden":"false"}).find("a, input, button, select").attr({tabindex:"0"})},b.prototype.addSlide=b.prototype.slickAdd=function(b,c,d){var e=this;if("boolean"==typeof c)d=c,c=null;else if(0>c||c>=e.slideCount)return!1;e.unload(),"number"==typeof c?0===c&&0===e.$slides.length?a(b).appendTo(e.$slideTrack):d?a(b).insertBefore(e.$slides.eq(c)):a(b).insertAfter(e.$slides.eq(c)):d===!0?a(b).prependTo(e.$slideTrack):a(b).appendTo(e.$slideTrack),e.$slides=e.$slideTrack.children(this.options.slide),e.$slideTrack.children(this.options.slide).detach(),e.$slideTrack.append(e.$slides),e.$slides.each(function(b,c){a(c).attr("data-slick-index",b)}),e.$slidesCache=e.$slides,e.reinit()},b.prototype.animateHeight=function(){var a=this;if(1===a.options.slidesToShow&&a.options.adaptiveHeight===!0&&a.options.vertical===!1){var b=a.$slides.eq(a.currentSlide).outerHeight(!0);a.$list.animate({height:b},a.options.speed)}},b.prototype.animateSlide=function(b,c){var d={},e=this;e.animateHeight(),e.options.rtl===!0&&e.options.vertical===!1&&(b=-b),e.transformsEnabled===!1?e.options.vertical===!1?e.$slideTrack.animate({left:b},e.options.speed,e.options.easing,c):e.$slideTrack.animate({top:b},e.options.speed,e.options.easing,c):e.cssTransitions===!1?(e.options.rtl===!0&&(e.currentLeft=-e.currentLeft),a({animStart:e.currentLeft}).animate({animStart:b},{duration:e.options.speed,easing:e.options.easing,step:function(a){a=Math.ceil(a),e.options.vertical===!1?(d[e.animType]="translate("+a+"px, 0px)",e.$slideTrack.css(d)):(d[e.animType]="translate(0px,"+a+"px)",e.$slideTrack.css(d))},complete:function(){c&&c.call()}})):(e.applyTransition(),b=Math.ceil(b),e.options.vertical===!1?d[e.animType]="translate3d("+b+"px, 0px, 0px)":d[e.animType]="translate3d(0px,"+b+"px, 0px)",e.$slideTrack.css(d),c&&setTimeout(function(){e.disableTransition(),c.call()},e.options.speed))},b.prototype.getNavTarget=function(){var b=this,c=b.options.asNavFor;return c&&null!==c&&(c=a(c).not(b.$slider)),c},b.prototype.asNavFor=function(b){var c=this,d=c.getNavTarget();null!==d&&"object"==typeof d&&d.each(function(){var c=a(this).slick("getSlick");c.unslicked||c.slideHandler(b,!0)})},b.prototype.applyTransition=function(a){var b=this,c={};b.options.fade===!1?c[b.transitionType]=b.transformType+" "+b.options.speed+"ms "+b.options.cssEase:c[b.transitionType]="opacity "+b.options.speed+"ms "+b.options.cssEase,b.options.fade===!1?b.$slideTrack.css(c):b.$slides.eq(a).css(c)},b.prototype.autoPlay=function(){var a=this;a.autoPlayClear(),a.slideCount>a.options.slidesToShow&&(a.autoPlayTimer=setInterval(a.autoPlayIterator,a.options.autoplaySpeed))},b.prototype.autoPlayClear=function(){var a=this;a.autoPlayTimer&&clearInterval(a.autoPlayTimer)},b.prototype.autoPlayIterator=function(){var a=this,b=a.currentSlide+a.options.slidesToScroll;a.paused||a.interrupted||a.focussed||(a.options.infinite===!1&&(1===a.direction&&a.currentSlide+1===a.slideCount-1?a.direction=0:0===a.direction&&(b=a.currentSlide-a.options.slidesToScroll,a.currentSlide-1===0&&(a.direction=1))),a.slideHandler(b))},b.prototype.buildArrows=function(){var b=this;b.options.arrows===!0&&(b.$prevArrow=a(b.options.prevArrow).addClass("slick-arrow"),b.$nextArrow=a(b.options.nextArrow).addClass("slick-arrow"),b.slideCount>b.options.slidesToShow?(b.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),b.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),b.htmlExpr.test(b.options.prevArrow)&&b.$prevArrow.prependTo(b.options.appendArrows),b.htmlExpr.test(b.options.nextArrow)&&b.$nextArrow.appendTo(b.options.appendArrows),b.options.infinite!==!0&&b.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true")):b.$prevArrow.add(b.$nextArrow).addClass("slick-hidden").attr({"aria-disabled":"true",tabindex:"-1"}))},b.prototype.buildDots=function(){var c,d,b=this;if(b.options.dots===!0&&b.slideCount>b.options.slidesToShow){for(b.$slider.addClass("slick-dotted"),d=a("<ul />").addClass(b.options.dotsClass),c=0;c<=b.getDotCount();c+=1)d.append(a("<li />").append(b.options.customPaging.call(this,b,c)));b.$dots=d.appendTo(b.options.appendDots),b.$dots.find("li").first().addClass("slick-active").attr("aria-hidden","false")}},b.prototype.buildOut=function(){var b=this;b.$slides=b.$slider.children(b.options.slide+":not(.slick-cloned)").addClass("slick-slide"),b.slideCount=b.$slides.length,b.$slides.each(function(b,c){a(c).attr("data-slick-index",b).data("originalStyling",a(c).attr("style")||"")}),b.$slider.addClass("slick-slider"),b.$slideTrack=0===b.slideCount?a('<div class="slick-track"/>').appendTo(b.$slider):b.$slides.wrapAll('<div class="slick-track"/>').parent(),b.$list=b.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(),b.$slideTrack.css("opacity",0),(b.options.centerMode===!0||b.options.swipeToSlide===!0)&&(b.options.slidesToScroll=1),a("img[data-lazy]",b.$slider).not("[src]").addClass("slick-loading"),b.setupInfinite(),b.buildArrows(),b.buildDots(),b.updateDots(),b.setSlideClasses("number"==typeof b.currentSlide?b.currentSlide:0),b.options.draggable===!0&&b.$list.addClass("draggable")},b.prototype.buildRows=function(){var b,c,d,e,f,g,h,a=this;if(e=document.createDocumentFragment(),g=a.$slider.children(),a.options.rows>1){for(h=a.options.slidesPerRow*a.options.rows,f=Math.ceil(g.length/h),b=0;f>b;b++){var i=document.createElement("div");for(c=0;c<a.options.rows;c++){var j=document.createElement("div");for(d=0;d<a.options.slidesPerRow;d++){var k=b*h+(c*a.options.slidesPerRow+d);g.get(k)&&j.appendChild(g.get(k))}i.appendChild(j)}e.appendChild(i)}a.$slider.empty().append(e),a.$slider.children().children().children().css({width:100/a.options.slidesPerRow+"%",display:"inline-block"})}},b.prototype.checkResponsive=function(b,c){var e,f,g,d=this,h=!1,i=d.$slider.width(),j=window.innerWidth||a(window).width();if("window"===d.respondTo?g=j:"slider"===d.respondTo?g=i:"min"===d.respondTo&&(g=Math.min(j,i)),d.options.responsive&&d.options.responsive.length&&null!==d.options.responsive){f=null;for(e in d.breakpoints)d.breakpoints.hasOwnProperty(e)&&(d.originalSettings.mobileFirst===!1?g<d.breakpoints[e]&&(f=d.breakpoints[e]):g>d.breakpoints[e]&&(f=d.breakpoints[e]));null!==f?null!==d.activeBreakpoint?(f!==d.activeBreakpoint||c)&&(d.activeBreakpoint=f,"unslick"===d.breakpointSettings[f]?d.unslick(f):(d.options=a.extend({},d.originalSettings,d.breakpointSettings[f]),b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b)),h=f):(d.activeBreakpoint=f,"unslick"===d.breakpointSettings[f]?d.unslick(f):(d.options=a.extend({},d.originalSettings,d.breakpointSettings[f]),b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b)),h=f):null!==d.activeBreakpoint&&(d.activeBreakpoint=null,d.options=d.originalSettings,b===!0&&(d.currentSlide=d.options.initialSlide),d.refresh(b),h=f),b||h===!1||d.$slider.trigger("breakpoint",[d,h])}},b.prototype.changeSlide=function(b,c){var f,g,h,d=this,e=a(b.currentTarget);switch(e.is("a")&&b.preventDefault(),e.is("li")||(e=e.closest("li")),h=d.slideCount%d.options.slidesToScroll!==0,f=h?0:(d.slideCount-d.currentSlide)%d.options.slidesToScroll,b.data.message){case"previous":g=0===f?d.options.slidesToScroll:d.options.slidesToShow-f,d.slideCount>d.options.slidesToShow&&d.slideHandler(d.currentSlide-g,!1,c);break;case"next":g=0===f?d.options.slidesToScroll:f,d.slideCount>d.options.slidesToShow&&d.slideHandler(d.currentSlide+g,!1,c);break;case"index":var i=0===b.data.index?0:b.data.index||e.index()*d.options.slidesToScroll;d.slideHandler(d.checkNavigable(i),!1,c),e.children().trigger("focus");break;default:return}},b.prototype.checkNavigable=function(a){var c,d,b=this;if(c=b.getNavigableIndexes(),d=0,a>c[c.length-1])a=c[c.length-1];else for(var e in c){if(a<c[e]){a=d;break}d=c[e]}return a},b.prototype.cleanUpEvents=function(){var b=this;b.options.dots&&null!==b.$dots&&a("li",b.$dots).off("click.slick",b.changeSlide).off("mouseenter.slick",a.proxy(b.interrupt,b,!0)).off("mouseleave.slick",a.proxy(b.interrupt,b,!1)),b.$slider.off("focus.slick blur.slick"),b.options.arrows===!0&&b.slideCount>b.options.slidesToShow&&(b.$prevArrow&&b.$prevArrow.off("click.slick",b.changeSlide),b.$nextArrow&&b.$nextArrow.off("click.slick",b.changeSlide)),b.$list.off("touchstart.slick mousedown.slick",b.swipeHandler),b.$list.off("touchmove.slick mousemove.slick",b.swipeHandler),b.$list.off("touchend.slick mouseup.slick",b.swipeHandler),b.$list.off("touchcancel.slick mouseleave.slick",b.swipeHandler),b.$list.off("click.slick",b.clickHandler),a(document).off(b.visibilityChange,b.visibility),b.cleanUpSlideEvents(),b.options.accessibility===!0&&b.$list.off("keydown.slick",b.keyHandler),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().off("click.slick",b.selectHandler),a(window).off("orientationchange.slick.slick-"+b.instanceUid,b.orientationChange),a(window).off("resize.slick.slick-"+b.instanceUid,b.resize),a("[draggable!=true]",b.$slideTrack).off("dragstart",b.preventDefault),a(window).off("load.slick.slick-"+b.instanceUid,b.setPosition),a(document).off("ready.slick.slick-"+b.instanceUid,b.setPosition)},b.prototype.cleanUpSlideEvents=function(){var b=this;b.$list.off("mouseenter.slick",a.proxy(b.interrupt,b,!0)),b.$list.off("mouseleave.slick",a.proxy(b.interrupt,b,!1))},b.prototype.cleanUpRows=function(){var b,a=this;a.options.rows>1&&(b=a.$slides.children().children(),b.removeAttr("style"),a.$slider.empty().append(b))},b.prototype.clickHandler=function(a){var b=this;b.shouldClick===!1&&(a.stopImmediatePropagation(),a.stopPropagation(),a.preventDefault())},b.prototype.destroy=function(b){var c=this;c.autoPlayClear(),c.touchObject={},c.cleanUpEvents(),a(".slick-cloned",c.$slider).detach(),c.$dots&&c.$dots.remove(),c.$prevArrow&&c.$prevArrow.length&&(c.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),c.htmlExpr.test(c.options.prevArrow)&&c.$prevArrow.remove()),c.$nextArrow&&c.$nextArrow.length&&(c.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display",""),c.htmlExpr.test(c.options.nextArrow)&&c.$nextArrow.remove()),c.$slides&&(c.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function(){a(this).attr("style",a(this).data("originalStyling"))}),c.$slideTrack.children(this.options.slide).detach(),c.$slideTrack.detach(),c.$list.detach(),c.$slider.append(c.$slides)),c.cleanUpRows(),c.$slider.removeClass("slick-slider"),c.$slider.removeClass("slick-initialized"),c.$slider.removeClass("slick-dotted"),c.unslicked=!0,b||c.$slider.trigger("destroy",[c])},b.prototype.disableTransition=function(a){var b=this,c={};c[b.transitionType]="",b.options.fade===!1?b.$slideTrack.css(c):b.$slides.eq(a).css(c)},b.prototype.fadeSlide=function(a,b){var c=this;c.cssTransitions===!1?(c.$slides.eq(a).css({zIndex:c.options.zIndex}),c.$slides.eq(a).animate({opacity:1},c.options.speed,c.options.easing,b)):(c.applyTransition(a),c.$slides.eq(a).css({opacity:1,zIndex:c.options.zIndex}),b&&setTimeout(function(){c.disableTransition(a),b.call()},c.options.speed))},b.prototype.fadeSlideOut=function(a){var b=this;b.cssTransitions===!1?b.$slides.eq(a).animate({opacity:0,zIndex:b.options.zIndex-2},b.options.speed,b.options.easing):(b.applyTransition(a),b.$slides.eq(a).css({opacity:0,zIndex:b.options.zIndex-2}))},b.prototype.filterSlides=b.prototype.slickFilter=function(a){var b=this;null!==a&&(b.$slidesCache=b.$slides,b.unload(),b.$slideTrack.children(this.options.slide).detach(),b.$slidesCache.filter(a).appendTo(b.$slideTrack),b.reinit())},b.prototype.focusHandler=function(){var b=this;b.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick","*:not(.slick-arrow)",function(c){c.stopImmediatePropagation();var d=a(this);setTimeout(function(){b.options.pauseOnFocus&&(b.focussed=d.is(":focus"),b.autoPlay())},0)})},b.prototype.getCurrent=b.prototype.slickCurrentSlide=function(){var a=this;return a.currentSlide},b.prototype.getDotCount=function(){var a=this,b=0,c=0,d=0;if(a.options.infinite===!0)for(;b<a.slideCount;)++d,b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;else if(a.options.centerMode===!0)d=a.slideCount;else if(a.options.asNavFor)for(;b<a.slideCount;)++d,b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;else d=1+Math.ceil((a.slideCount-a.options.slidesToShow)/a.options.slidesToScroll);return d-1},b.prototype.getLeft=function(a){var c,d,f,b=this,e=0;return b.slideOffset=0,d=b.$slides.first().outerHeight(!0),b.options.infinite===!0?(b.slideCount>b.options.slidesToShow&&(b.slideOffset=b.slideWidth*b.options.slidesToShow*-1,e=d*b.options.slidesToShow*-1),b.slideCount%b.options.slidesToScroll!==0&&a+b.options.slidesToScroll>b.slideCount&&b.slideCount>b.options.slidesToShow&&(a>b.slideCount?(b.slideOffset=(b.options.slidesToShow-(a-b.slideCount))*b.slideWidth*-1,e=(b.options.slidesToShow-(a-b.slideCount))*d*-1):(b.slideOffset=b.slideCount%b.options.slidesToScroll*b.slideWidth*-1,e=b.slideCount%b.options.slidesToScroll*d*-1))):a+b.options.slidesToShow>b.slideCount&&(b.slideOffset=(a+b.options.slidesToShow-b.slideCount)*b.slideWidth,e=(a+b.options.slidesToShow-b.slideCount)*d),b.slideCount<=b.options.slidesToShow&&(b.slideOffset=0,e=0),b.options.centerMode===!0&&b.options.infinite===!0?b.slideOffset+=b.slideWidth*Math.floor(b.options.slidesToShow/2)-b.slideWidth:b.options.centerMode===!0&&(b.slideOffset=0,b.slideOffset+=b.slideWidth*Math.floor(b.options.slidesToShow/2)),c=b.options.vertical===!1?a*b.slideWidth*-1+b.slideOffset:a*d*-1+e,b.options.variableWidth===!0&&(f=b.slideCount<=b.options.slidesToShow||b.options.infinite===!1?b.$slideTrack.children(".slick-slide").eq(a):b.$slideTrack.children(".slick-slide").eq(a+b.options.slidesToShow),c=b.options.rtl===!0?f[0]?-1*(b.$slideTrack.width()-f[0].offsetLeft-f.width()):0:f[0]?-1*f[0].offsetLeft:0,b.options.centerMode===!0&&(f=b.slideCount<=b.options.slidesToShow||b.options.infinite===!1?b.$slideTrack.children(".slick-slide").eq(a):b.$slideTrack.children(".slick-slide").eq(a+b.options.slidesToShow+1),c=b.options.rtl===!0?f[0]?-1*(b.$slideTrack.width()-f[0].offsetLeft-f.width()):0:f[0]?-1*f[0].offsetLeft:0,c+=(b.$list.width()-f.outerWidth())/2)),c},b.prototype.getOption=b.prototype.slickGetOption=function(a){var b=this;return b.options[a]},b.prototype.getNavigableIndexes=function(){var e,a=this,b=0,c=0,d=[];for(a.options.infinite===!1?e=a.slideCount:(b=-1*a.options.slidesToScroll,c=-1*a.options.slidesToScroll,e=2*a.slideCount);e>b;)d.push(b),b=c+a.options.slidesToScroll,c+=a.options.slidesToScroll<=a.options.slidesToShow?a.options.slidesToScroll:a.options.slidesToShow;return d},b.prototype.getSlick=function(){return this},b.prototype.getSlideCount=function(){var c,d,e,b=this;return e=b.options.centerMode===!0?b.slideWidth*Math.floor(b.options.slidesToShow/2):0,b.options.swipeToSlide===!0?(b.$slideTrack.find(".slick-slide").each(function(c,f){return f.offsetLeft-e+a(f).outerWidth()/2>-1*b.swipeLeft?(d=f,!1):void 0}),c=Math.abs(a(d).attr("data-slick-index")-b.currentSlide)||1):b.options.slidesToScroll},b.prototype.goTo=b.prototype.slickGoTo=function(a,b){var c=this;c.changeSlide({data:{message:"index",index:parseInt(a)}},b)},b.prototype.init=function(b){var c=this;a(c.$slider).hasClass("slick-initialized")||(a(c.$slider).addClass("slick-initialized"),c.buildRows(),c.buildOut(),c.setProps(),c.startLoad(),c.loadSlider(),c.initializeEvents(),c.updateArrows(),c.updateDots(),c.checkResponsive(!0),c.focusHandler()),b&&c.$slider.trigger("init",[c]),c.options.accessibility===!0&&c.initADA(),c.options.autoplay&&(c.paused=!1,c.autoPlay())},b.prototype.initADA=function(){var b=this;b.$slides.add(b.$slideTrack.find(".slick-cloned")).attr({"aria-hidden":"true",tabindex:"-1"}).find("a, input, button, select").attr({tabindex:"-1"}),b.$slideTrack.attr("role","listbox"),b.$slides.not(b.$slideTrack.find(".slick-cloned")).each(function(c){a(this).attr({role:"option","aria-describedby":"slick-slide"+b.instanceUid+c})}),null!==b.$dots&&b.$dots.attr("role","tablist").find("li").each(function(c){a(this).attr({role:"presentation","aria-selected":"false","aria-controls":"navigation"+b.instanceUid+c,id:"slick-slide"+b.instanceUid+c})}).first().attr("aria-selected","true").end().find("button").attr("role","button").end().closest("div").attr("role","toolbar"),b.activateADA()},b.prototype.initArrowEvents=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.off("click.slick").on("click.slick",{message:"previous"},a.changeSlide),a.$nextArrow.off("click.slick").on("click.slick",{message:"next"},a.changeSlide))},b.prototype.initDotEvents=function(){var b=this;b.options.dots===!0&&b.slideCount>b.options.slidesToShow&&a("li",b.$dots).on("click.slick",{message:"index"},b.changeSlide),b.options.dots===!0&&b.options.pauseOnDotsHover===!0&&a("li",b.$dots).on("mouseenter.slick",a.proxy(b.interrupt,b,!0)).on("mouseleave.slick",a.proxy(b.interrupt,b,!1))},b.prototype.initSlideEvents=function(){var b=this;b.options.pauseOnHover&&(b.$list.on("mouseenter.slick",a.proxy(b.interrupt,b,!0)),b.$list.on("mouseleave.slick",a.proxy(b.interrupt,b,!1)))},b.prototype.initializeEvents=function(){var b=this;b.initArrowEvents(),b.initDotEvents(),b.initSlideEvents(),b.$list.on("touchstart.slick mousedown.slick",{action:"start"},b.swipeHandler),b.$list.on("touchmove.slick mousemove.slick",{action:"move"},b.swipeHandler),b.$list.on("touchend.slick mouseup.slick",{action:"end"},b.swipeHandler),b.$list.on("touchcancel.slick mouseleave.slick",{action:"end"},b.swipeHandler),b.$list.on("click.slick",b.clickHandler),a(document).on(b.visibilityChange,a.proxy(b.visibility,b)),b.options.accessibility===!0&&b.$list.on("keydown.slick",b.keyHandler),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().on("click.slick",b.selectHandler),a(window).on("orientationchange.slick.slick-"+b.instanceUid,a.proxy(b.orientationChange,b)),a(window).on("resize.slick.slick-"+b.instanceUid,a.proxy(b.resize,b)),a("[draggable!=true]",b.$slideTrack).on("dragstart",b.preventDefault),a(window).on("load.slick.slick-"+b.instanceUid,b.setPosition),a(document).on("ready.slick.slick-"+b.instanceUid,b.setPosition)},b.prototype.initUI=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.show(),a.$nextArrow.show()),a.options.dots===!0&&a.slideCount>a.options.slidesToShow&&a.$dots.show()},b.prototype.keyHandler=function(a){var b=this;a.target.tagName.match("TEXTAREA|INPUT|SELECT")||(37===a.keyCode&&b.options.accessibility===!0?b.changeSlide({data:{message:b.options.rtl===!0?"next":"previous"}}):39===a.keyCode&&b.options.accessibility===!0&&b.changeSlide({data:{message:b.options.rtl===!0?"previous":"next"}}))},b.prototype.lazyLoad=function(){function g(c){a("img[data-lazy]",c).each(function(){var c=a(this),d=a(this).attr("data-lazy"),e=document.createElement("img");e.onload=function(){c.animate({opacity:0},100,function(){c.attr("src",d).animate({opacity:1},200,function(){c.removeAttr("data-lazy").removeClass("slick-loading")}),b.$slider.trigger("lazyLoaded",[b,c,d])})},e.onerror=function(){c.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),b.$slider.trigger("lazyLoadError",[b,c,d])},e.src=d})}var c,d,e,f,b=this;b.options.centerMode===!0?b.options.infinite===!0?(e=b.currentSlide+(b.options.slidesToShow/2+1),f=e+b.options.slidesToShow+2):(e=Math.max(0,b.currentSlide-(b.options.slidesToShow/2+1)),f=2+(b.options.slidesToShow/2+1)+b.currentSlide):(e=b.options.infinite?b.options.slidesToShow+b.currentSlide:b.currentSlide,f=Math.ceil(e+b.options.slidesToShow),b.options.fade===!0&&(e>0&&e--,f<=b.slideCount&&f++)),c=b.$slider.find(".slick-slide").slice(e,f),g(c),b.slideCount<=b.options.slidesToShow?(d=b.$slider.find(".slick-slide"),g(d)):b.currentSlide>=b.slideCount-b.options.slidesToShow?(d=b.$slider.find(".slick-cloned").slice(0,b.options.slidesToShow),g(d)):0===b.currentSlide&&(d=b.$slider.find(".slick-cloned").slice(-1*b.options.slidesToShow),g(d))},b.prototype.loadSlider=function(){var a=this;a.setPosition(),a.$slideTrack.css({opacity:1}),a.$slider.removeClass("slick-loading"),a.initUI(),"progressive"===a.options.lazyLoad&&a.progressiveLazyLoad()},b.prototype.next=b.prototype.slickNext=function(){var a=this;a.changeSlide({data:{message:"next"}})},b.prototype.orientationChange=function(){var a=this;a.checkResponsive(),a.setPosition()},b.prototype.pause=b.prototype.slickPause=function(){var a=this;a.autoPlayClear(),a.paused=!0},b.prototype.play=b.prototype.slickPlay=function(){var a=this;a.autoPlay(),a.options.autoplay=!0,a.paused=!1,a.focussed=!1,a.interrupted=!1},b.prototype.postSlide=function(a){var b=this;b.unslicked||(b.$slider.trigger("afterChange",[b,a]),b.animating=!1,b.setPosition(),b.swipeLeft=null,b.options.autoplay&&b.autoPlay(),b.options.accessibility===!0&&b.initADA())},b.prototype.prev=b.prototype.slickPrev=function(){var a=this;a.changeSlide({data:{message:"previous"}})},b.prototype.preventDefault=function(a){a.preventDefault()},b.prototype.progressiveLazyLoad=function(b){b=b||1;var e,f,g,c=this,d=a("img[data-lazy]",c.$slider);d.length?(e=d.first(),f=e.attr("data-lazy"),g=document.createElement("img"),g.onload=function(){e.attr("src",f).removeAttr("data-lazy").removeClass("slick-loading"),c.options.adaptiveHeight===!0&&c.setPosition(),c.$slider.trigger("lazyLoaded",[c,e,f]),c.progressiveLazyLoad()},g.onerror=function(){3>b?setTimeout(function(){c.progressiveLazyLoad(b+1)},500):(e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"),c.$slider.trigger("lazyLoadError",[c,e,f]),c.progressiveLazyLoad())},g.src=f):c.$slider.trigger("allImagesLoaded",[c])},b.prototype.refresh=function(b){var d,e,c=this;e=c.slideCount-c.options.slidesToShow,!c.options.infinite&&c.currentSlide>e&&(c.currentSlide=e),c.slideCount<=c.options.slidesToShow&&(c.currentSlide=0),d=c.currentSlide,c.destroy(!0),a.extend(c,c.initials,{currentSlide:d}),c.init(),b||c.changeSlide({data:{message:"index",index:d}},!1)},b.prototype.registerBreakpoints=function(){var c,d,e,b=this,f=b.options.responsive||null;if("array"===a.type(f)&&f.length){b.respondTo=b.options.respondTo||"window";for(c in f)if(e=b.breakpoints.length-1,d=f[c].breakpoint,f.hasOwnProperty(c)){for(;e>=0;)b.breakpoints[e]&&b.breakpoints[e]===d&&b.breakpoints.splice(e,1),e--;b.breakpoints.push(d),b.breakpointSettings[d]=f[c].settings}b.breakpoints.sort(function(a,c){return b.options.mobileFirst?a-c:c-a})}},b.prototype.reinit=function(){var b=this;b.$slides=b.$slideTrack.children(b.options.slide).addClass("slick-slide"),b.slideCount=b.$slides.length,b.currentSlide>=b.slideCount&&0!==b.currentSlide&&(b.currentSlide=b.currentSlide-b.options.slidesToScroll),b.slideCount<=b.options.slidesToShow&&(b.currentSlide=0),b.registerBreakpoints(),b.setProps(),b.setupInfinite(),b.buildArrows(),b.updateArrows(),b.initArrowEvents(),b.buildDots(),b.updateDots(),b.initDotEvents(),b.cleanUpSlideEvents(),b.initSlideEvents(),b.checkResponsive(!1,!0),b.options.focusOnSelect===!0&&a(b.$slideTrack).children().on("click.slick",b.selectHandler),b.setSlideClasses("number"==typeof b.currentSlide?b.currentSlide:0),b.setPosition(),b.focusHandler(),b.paused=!b.options.autoplay,b.autoPlay(),b.$slider.trigger("reInit",[b])},b.prototype.resize=function(){var b=this;a(window).width()!==b.windowWidth&&(clearTimeout(b.windowDelay),b.windowDelay=window.setTimeout(function(){b.windowWidth=a(window).width(),b.checkResponsive(),b.unslicked||b.setPosition()},50))},b.prototype.removeSlide=b.prototype.slickRemove=function(a,b,c){var d=this;return"boolean"==typeof a?(b=a,a=b===!0?0:d.slideCount-1):a=b===!0?--a:a,d.slideCount<1||0>a||a>d.slideCount-1?!1:(d.unload(),c===!0?d.$slideTrack.children().remove():d.$slideTrack.children(this.options.slide).eq(a).remove(),d.$slides=d.$slideTrack.children(this.options.slide),d.$slideTrack.children(this.options.slide).detach(),d.$slideTrack.append(d.$slides),d.$slidesCache=d.$slides,void d.reinit())},b.prototype.setCSS=function(a){var d,e,b=this,c={};b.options.rtl===!0&&(a=-a),d="left"==b.positionProp?Math.ceil(a)+"px":"0px",e="top"==b.positionProp?Math.ceil(a)+"px":"0px",c[b.positionProp]=a,b.transformsEnabled===!1?b.$slideTrack.css(c):(c={},b.cssTransitions===!1?(c[b.animType]="translate("+d+", "+e+")",b.$slideTrack.css(c)):(c[b.animType]="translate3d("+d+", "+e+", 0px)",b.$slideTrack.css(c)))},b.prototype.setDimensions=function(){var a=this;a.options.vertical===!1?a.options.centerMode===!0&&a.$list.css({padding:"0px "+a.options.centerPadding}):(a.$list.height(a.$slides.first().outerHeight(!0)*a.options.slidesToShow),a.options.centerMode===!0&&a.$list.css({padding:a.options.centerPadding+" 0px"})),a.listWidth=a.$list.width(),a.listHeight=a.$list.height(),a.options.vertical===!1&&a.options.variableWidth===!1?(a.slideWidth=Math.ceil(a.listWidth/a.options.slidesToShow),a.$slideTrack.width(Math.ceil(a.slideWidth*a.$slideTrack.children(".slick-slide").length))):a.options.variableWidth===!0?a.$slideTrack.width(5e3*a.slideCount):(a.slideWidth=Math.ceil(a.listWidth),a.$slideTrack.height(Math.ceil(a.$slides.first().outerHeight(!0)*a.$slideTrack.children(".slick-slide").length)));var b=a.$slides.first().outerWidth(!0)-a.$slides.first().width();a.options.variableWidth===!1&&a.$slideTrack.children(".slick-slide").width(a.slideWidth-b)},b.prototype.setFade=function(){var c,b=this;b.$slides.each(function(d,e){c=b.slideWidth*d*-1,b.options.rtl===!0?a(e).css({position:"relative",right:c,top:0,zIndex:b.options.zIndex-2,opacity:0}):a(e).css({position:"relative",left:c,top:0,zIndex:b.options.zIndex-2,opacity:0})}),b.$slides.eq(b.currentSlide).css({zIndex:b.options.zIndex-1,opacity:1})},b.prototype.setHeight=function(){var a=this;if(1===a.options.slidesToShow&&a.options.adaptiveHeight===!0&&a.options.vertical===!1){var b=a.$slides.eq(a.currentSlide).outerHeight(!0);a.$list.css("height",b)}},b.prototype.setOption=b.prototype.slickSetOption=function(){var c,d,e,f,h,b=this,g=!1;if("object"===a.type(arguments[0])?(e=arguments[0],g=arguments[1],h="multiple"):"string"===a.type(arguments[0])&&(e=arguments[0],f=arguments[1],g=arguments[2],"responsive"===arguments[0]&&"array"===a.type(arguments[1])?h="responsive":"undefined"!=typeof arguments[1]&&(h="single")),"single"===h)b.options[e]=f;else if("multiple"===h)a.each(e,function(a,c){b.options[a]=c});else if("responsive"===h)for(d in f)if("array"!==a.type(b.options.responsive))b.options.responsive=[f[d]];else{for(c=b.options.responsive.length-1;c>=0;)b.options.responsive[c].breakpoint===f[d].breakpoint&&b.options.responsive.splice(c,1),c--;b.options.responsive.push(f[d])}g&&(b.unload(),b.reinit())},b.prototype.setPosition=function(){var a=this;a.setDimensions(),a.setHeight(),a.options.fade===!1?a.setCSS(a.getLeft(a.currentSlide)):a.setFade(),a.$slider.trigger("setPosition",[a])},b.prototype.setProps=function(){var a=this,b=document.body.style;a.positionProp=a.options.vertical===!0?"top":"left","top"===a.positionProp?a.$slider.addClass("slick-vertical"):a.$slider.removeClass("slick-vertical"),(void 0!==b.WebkitTransition||void 0!==b.MozTransition||void 0!==b.msTransition)&&a.options.useCSS===!0&&(a.cssTransitions=!0),a.options.fade&&("number"==typeof a.options.zIndex?a.options.zIndex<3&&(a.options.zIndex=3):a.options.zIndex=a.defaults.zIndex),void 0!==b.OTransform&&(a.animType="OTransform",a.transformType="-o-transform",a.transitionType="OTransition",void 0===b.perspectiveProperty&&void 0===b.webkitPerspective&&(a.animType=!1)),void 0!==b.MozTransform&&(a.animType="MozTransform",a.transformType="-moz-transform",a.transitionType="MozTransition",void 0===b.perspectiveProperty&&void 0===b.MozPerspective&&(a.animType=!1)),void 0!==b.webkitTransform&&(a.animType="webkitTransform",a.transformType="-webkit-transform",a.transitionType="webkitTransition",void 0===b.perspectiveProperty&&void 0===b.webkitPerspective&&(a.animType=!1)),void 0!==b.msTransform&&(a.animType="msTransform",a.transformType="-ms-transform",a.transitionType="msTransition",void 0===b.msTransform&&(a.animType=!1)),void 0!==b.transform&&a.animType!==!1&&(a.animType="transform",a.transformType="transform",a.transitionType="transition"),a.transformsEnabled=a.options.useTransform&&null!==a.animType&&a.animType!==!1},b.prototype.setSlideClasses=function(a){var c,d,e,f,b=this;d=b.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden","true"),b.$slides.eq(a).addClass("slick-current"),b.options.centerMode===!0?(c=Math.floor(b.options.slidesToShow/2),b.options.infinite===!0&&(a>=c&&a<=b.slideCount-1-c?b.$slides.slice(a-c,a+c+1).addClass("slick-active").attr("aria-hidden","false"):(e=b.options.slidesToShow+a,
d.slice(e-c+1,e+c+2).addClass("slick-active").attr("aria-hidden","false")),0===a?d.eq(d.length-1-b.options.slidesToShow).addClass("slick-center"):a===b.slideCount-1&&d.eq(b.options.slidesToShow).addClass("slick-center")),b.$slides.eq(a).addClass("slick-center")):a>=0&&a<=b.slideCount-b.options.slidesToShow?b.$slides.slice(a,a+b.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false"):d.length<=b.options.slidesToShow?d.addClass("slick-active").attr("aria-hidden","false"):(f=b.slideCount%b.options.slidesToShow,e=b.options.infinite===!0?b.options.slidesToShow+a:a,b.options.slidesToShow==b.options.slidesToScroll&&b.slideCount-a<b.options.slidesToShow?d.slice(e-(b.options.slidesToShow-f),e+f).addClass("slick-active").attr("aria-hidden","false"):d.slice(e,e+b.options.slidesToShow).addClass("slick-active").attr("aria-hidden","false")),"ondemand"===b.options.lazyLoad&&b.lazyLoad()},b.prototype.setupInfinite=function(){var c,d,e,b=this;if(b.options.fade===!0&&(b.options.centerMode=!1),b.options.infinite===!0&&b.options.fade===!1&&(d=null,b.slideCount>b.options.slidesToShow)){for(e=b.options.centerMode===!0?b.options.slidesToShow+1:b.options.slidesToShow,c=b.slideCount;c>b.slideCount-e;c-=1)d=c-1,a(b.$slides[d]).clone(!0).attr("id","").attr("data-slick-index",d-b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned");for(c=0;e>c;c+=1)d=c,a(b.$slides[d]).clone(!0).attr("id","").attr("data-slick-index",d+b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned");b.$slideTrack.find(".slick-cloned").find("[id]").each(function(){a(this).attr("id","")})}},b.prototype.interrupt=function(a){var b=this;a||b.autoPlay(),b.interrupted=a},b.prototype.selectHandler=function(b){var c=this,d=a(b.target).is(".slick-slide")?a(b.target):a(b.target).parents(".slick-slide"),e=parseInt(d.attr("data-slick-index"));return e||(e=0),c.slideCount<=c.options.slidesToShow?(c.setSlideClasses(e),void c.asNavFor(e)):void c.slideHandler(e)},b.prototype.slideHandler=function(a,b,c){var d,e,f,g,j,h=null,i=this;return b=b||!1,i.animating===!0&&i.options.waitForAnimate===!0||i.options.fade===!0&&i.currentSlide===a||i.slideCount<=i.options.slidesToShow?void 0:(b===!1&&i.asNavFor(a),d=a,h=i.getLeft(d),g=i.getLeft(i.currentSlide),i.currentLeft=null===i.swipeLeft?g:i.swipeLeft,i.options.infinite===!1&&i.options.centerMode===!1&&(0>a||a>i.getDotCount()*i.options.slidesToScroll)?void(i.options.fade===!1&&(d=i.currentSlide,c!==!0?i.animateSlide(g,function(){i.postSlide(d)}):i.postSlide(d))):i.options.infinite===!1&&i.options.centerMode===!0&&(0>a||a>i.slideCount-i.options.slidesToScroll)?void(i.options.fade===!1&&(d=i.currentSlide,c!==!0?i.animateSlide(g,function(){i.postSlide(d)}):i.postSlide(d))):(i.options.autoplay&&clearInterval(i.autoPlayTimer),e=0>d?i.slideCount%i.options.slidesToScroll!==0?i.slideCount-i.slideCount%i.options.slidesToScroll:i.slideCount+d:d>=i.slideCount?i.slideCount%i.options.slidesToScroll!==0?0:d-i.slideCount:d,i.animating=!0,i.$slider.trigger("beforeChange",[i,i.currentSlide,e]),f=i.currentSlide,i.currentSlide=e,i.setSlideClasses(i.currentSlide),i.options.asNavFor&&(j=i.getNavTarget(),j=j.slick("getSlick"),j.slideCount<=j.options.slidesToShow&&j.setSlideClasses(i.currentSlide)),i.updateDots(),i.updateArrows(),i.options.fade===!0?(c!==!0?(i.fadeSlideOut(f),i.fadeSlide(e,function(){i.postSlide(e)})):i.postSlide(e),void i.animateHeight()):void(c!==!0?i.animateSlide(h,function(){i.postSlide(e)}):i.postSlide(e))))},b.prototype.startLoad=function(){var a=this;a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&(a.$prevArrow.hide(),a.$nextArrow.hide()),a.options.dots===!0&&a.slideCount>a.options.slidesToShow&&a.$dots.hide(),a.$slider.addClass("slick-loading")},b.prototype.swipeDirection=function(){var a,b,c,d,e=this;return a=e.touchObject.startX-e.touchObject.curX,b=e.touchObject.startY-e.touchObject.curY,c=Math.atan2(b,a),d=Math.round(180*c/Math.PI),0>d&&(d=360-Math.abs(d)),45>=d&&d>=0?e.options.rtl===!1?"left":"right":360>=d&&d>=315?e.options.rtl===!1?"left":"right":d>=135&&225>=d?e.options.rtl===!1?"right":"left":e.options.verticalSwiping===!0?d>=35&&135>=d?"down":"up":"vertical"},b.prototype.swipeEnd=function(a){var c,d,b=this;if(b.dragging=!1,b.interrupted=!1,b.shouldClick=b.touchObject.swipeLength>10?!1:!0,void 0===b.touchObject.curX)return!1;if(b.touchObject.edgeHit===!0&&b.$slider.trigger("edge",[b,b.swipeDirection()]),b.touchObject.swipeLength>=b.touchObject.minSwipe){switch(d=b.swipeDirection()){case"left":case"down":c=b.options.swipeToSlide?b.checkNavigable(b.currentSlide+b.getSlideCount()):b.currentSlide+b.getSlideCount(),b.currentDirection=0;break;case"right":case"up":c=b.options.swipeToSlide?b.checkNavigable(b.currentSlide-b.getSlideCount()):b.currentSlide-b.getSlideCount(),b.currentDirection=1}"vertical"!=d&&(b.slideHandler(c),b.touchObject={},b.$slider.trigger("swipe",[b,d]))}else b.touchObject.startX!==b.touchObject.curX&&(b.slideHandler(b.currentSlide),b.touchObject={})},b.prototype.swipeHandler=function(a){var b=this;if(!(b.options.swipe===!1||"ontouchend"in document&&b.options.swipe===!1||b.options.draggable===!1&&-1!==a.type.indexOf("mouse")))switch(b.touchObject.fingerCount=a.originalEvent&&void 0!==a.originalEvent.touches?a.originalEvent.touches.length:1,b.touchObject.minSwipe=b.listWidth/b.options.touchThreshold,b.options.verticalSwiping===!0&&(b.touchObject.minSwipe=b.listHeight/b.options.touchThreshold),a.data.action){case"start":b.swipeStart(a);break;case"move":b.swipeMove(a);break;case"end":b.swipeEnd(a)}},b.prototype.swipeMove=function(a){var d,e,f,g,h,b=this;return h=void 0!==a.originalEvent?a.originalEvent.touches:null,!b.dragging||h&&1!==h.length?!1:(d=b.getLeft(b.currentSlide),b.touchObject.curX=void 0!==h?h[0].pageX:a.clientX,b.touchObject.curY=void 0!==h?h[0].pageY:a.clientY,b.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(b.touchObject.curX-b.touchObject.startX,2))),b.options.verticalSwiping===!0&&(b.touchObject.swipeLength=Math.round(Math.sqrt(Math.pow(b.touchObject.curY-b.touchObject.startY,2)))),e=b.swipeDirection(),"vertical"!==e?(void 0!==a.originalEvent&&b.touchObject.swipeLength>4&&a.preventDefault(),g=(b.options.rtl===!1?1:-1)*(b.touchObject.curX>b.touchObject.startX?1:-1),b.options.verticalSwiping===!0&&(g=b.touchObject.curY>b.touchObject.startY?1:-1),f=b.touchObject.swipeLength,b.touchObject.edgeHit=!1,b.options.infinite===!1&&(0===b.currentSlide&&"right"===e||b.currentSlide>=b.getDotCount()&&"left"===e)&&(f=b.touchObject.swipeLength*b.options.edgeFriction,b.touchObject.edgeHit=!0),b.options.vertical===!1?b.swipeLeft=d+f*g:b.swipeLeft=d+f*(b.$list.height()/b.listWidth)*g,b.options.verticalSwiping===!0&&(b.swipeLeft=d+f*g),b.options.fade===!0||b.options.touchMove===!1?!1:b.animating===!0?(b.swipeLeft=null,!1):void b.setCSS(b.swipeLeft)):void 0)},b.prototype.swipeStart=function(a){var c,b=this;return b.interrupted=!0,1!==b.touchObject.fingerCount||b.slideCount<=b.options.slidesToShow?(b.touchObject={},!1):(void 0!==a.originalEvent&&void 0!==a.originalEvent.touches&&(c=a.originalEvent.touches[0]),b.touchObject.startX=b.touchObject.curX=void 0!==c?c.pageX:a.clientX,b.touchObject.startY=b.touchObject.curY=void 0!==c?c.pageY:a.clientY,void(b.dragging=!0))},b.prototype.unfilterSlides=b.prototype.slickUnfilter=function(){var a=this;null!==a.$slidesCache&&(a.unload(),a.$slideTrack.children(this.options.slide).detach(),a.$slidesCache.appendTo(a.$slideTrack),a.reinit())},b.prototype.unload=function(){var b=this;a(".slick-cloned",b.$slider).remove(),b.$dots&&b.$dots.remove(),b.$prevArrow&&b.htmlExpr.test(b.options.prevArrow)&&b.$prevArrow.remove(),b.$nextArrow&&b.htmlExpr.test(b.options.nextArrow)&&b.$nextArrow.remove(),b.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden","true").css("width","")},b.prototype.unslick=function(a){var b=this;b.$slider.trigger("unslick",[b,a]),b.destroy()},b.prototype.updateArrows=function(){var b,a=this;b=Math.floor(a.options.slidesToShow/2),a.options.arrows===!0&&a.slideCount>a.options.slidesToShow&&!a.options.infinite&&(a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false"),a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false"),0===a.currentSlide?(a.$prevArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled","false")):a.currentSlide>=a.slideCount-a.options.slidesToShow&&a.options.centerMode===!1?(a.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")):a.currentSlide>=a.slideCount-1&&a.options.centerMode===!0&&(a.$nextArrow.addClass("slick-disabled").attr("aria-disabled","true"),a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled","false")))},b.prototype.updateDots=function(){var a=this;null!==a.$dots&&(a.$dots.find("li").removeClass("slick-active").attr("aria-hidden","true"),a.$dots.find("li").eq(Math.floor(a.currentSlide/a.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden","false"))},b.prototype.visibility=function(){var a=this;a.options.autoplay&&(document[a.hidden]?a.interrupted=!0:a.interrupted=!1)},a.fn.slick=function(){var f,g,a=this,c=arguments[0],d=Array.prototype.slice.call(arguments,1),e=a.length;for(f=0;e>f;f++)if("object"==typeof c||"undefined"==typeof c?a[f].slick=new b(a[f],c):g=a[f].slick[c].apply(a[f].slick,d),"undefined"!=typeof g)return g;return a}});

/*!
    Zoom 1.7.18
    license: MIT
    http://www.jacklmoore.com/zoom
*/
(function(o){var t={url:!1,callback:!1,target:!1,duration:120,on:"mouseover",touch:!0,onZoomIn:!1,onZoomOut:!1,magnify:1};o.zoom=function(t,n,e,i){var u,c,a,r,m,l,s,f=o(t),h=f.css("position"),d=o(n);return t.style.position=/(absolute|fixed)/.test(h)?h:"relative",t.style.overflow="hidden",e.style.width=e.style.height="",o(e).addClass("zoomImg").css({position:"absolute",top:0,left:0,opacity:0,width:e.width*i,height:e.height*i,border:"none",maxWidth:"none",maxHeight:"none"}).appendTo(t),{init:function(){c=f.outerWidth(),u=f.outerHeight(),n===t?(r=c,a=u):(r=d.outerWidth(),a=d.outerHeight()),m=(e.width-c)/r,l=(e.height-u)/a,s=d.offset()},move:function(o){var t=o.pageX-s.left,n=o.pageY-s.top;n=Math.max(Math.min(n,a),0),t=Math.max(Math.min(t,r),0),e.style.left=t*-m+"px",e.style.top=n*-l+"px"}}},o.fn.zoom=function(n){return this.each(function(){var e=o.extend({},t,n||{}),i=e.target&&o(e.target)[0]||this,u=this,c=o(u),a=document.createElement("img"),r=o(a),m="mousemove.zoom",l=!1,s=!1;if(!e.url){var f=u.querySelector("img");if(f&&(e.url=f.getAttribute("data-src")||f.currentSrc||f.src),!e.url)return}c.one("zoom.destroy",function(o,t){c.off(".zoom"),i.style.position=o,i.style.overflow=t,a.onload=null,r.remove()}.bind(this,i.style.position,i.style.overflow)),a.onload=function(){function t(t){f.init(),f.move(t),r.stop().fadeTo(o.support.opacity?e.duration:0,1,o.isFunction(e.onZoomIn)?e.onZoomIn.call(a):!1)}function n(){r.stop().fadeTo(e.duration,0,o.isFunction(e.onZoomOut)?e.onZoomOut.call(a):!1)}var f=o.zoom(i,u,a,e.magnify);"grab"===e.on?c.on("mousedown.zoom",function(e){1===e.which&&(o(document).one("mouseup.zoom",function(){n(),o(document).off(m,f.move)}),t(e),o(document).on(m,f.move),e.preventDefault())}):"click"===e.on?c.on("click.zoom",function(e){return l?void 0:(l=!0,t(e),o(document).on(m,f.move),o(document).one("click.zoom",function(){n(),l=!1,o(document).off(m,f.move)}),!1)}):"toggle"===e.on?c.on("click.zoom",function(o){l?n():t(o),l=!l}):"mouseover"===e.on&&(f.init(),c.on("mouseenter.zoom",t).on("mouseleave.zoom",n).on(m,f.move)),e.touch&&c.on("touchstart.zoom",function(o){o.preventDefault(),s?(s=!1,n()):(s=!0,t(o.originalEvent.touches[0]||o.originalEvent.changedTouches[0]))}).on("touchmove.zoom",function(o){o.preventDefault(),f.move(o.originalEvent.touches[0]||o.originalEvent.changedTouches[0])}).on("touchend.zoom",function(o){o.preventDefault(),s&&(s=!1,n())}),o.isFunction(e.callback)&&e.callback.call(a)},a.src=e.url})},o.fn.zoom.defaults=t})(window.jQuery);

/*! Magnific Popup - v1.1.0 - 2016-02-20
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2016 Dmitry Semenov; */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isLowIE=b.isIE8=document.all&&!document.addEventListener,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",c.mainEl&&c.mainEl.length?b.ev=c.mainEl.eq(0):b.ev=d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b.st.autoFocusLast&&b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=b.st[d]?b.st[d].markup:!1;y("FirstMarkupParse",f),f?b.currTemplate[d]=a(f):b.currTemplate[d]=!0}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||!(2===c.which||c.ctrlKey||c.metaKey||c.altKey||c.shiftKey)){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(c,d){if(void 0===d||d===!1)return!0;if(e=c.split("_"),e.length>1){var f=b.find(p+"-"+e[0]);if(f.length>0){var g=e[1];"replaceWith"===g?f[0]!==d[0]&&f.replaceWith(d):"img"===g?f.is("img")?f.attr("src",d):f.replaceWith(a("<img>").attr("src",d).attr("class",f.attr("class"))):f.attr(e[1],d)}}else b.find(p+"-"+c).html(d)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery";return b.direction=!0,c&&c.enabled?(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s);e.click(function(){b.prev()}),f.click(function(){b.next()}),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowRight=b.arrowLeft=null})):!1},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),A()});



/* slimmneu */
!function(e,n,i,s){"use strict";function t(n,i){this.element=n,this.$elem=e(this.element),this.options=e.extend(d,i),this.init()}var l="slimmenu",a=0,d={resizeWidth:"767",initiallyVisible:!1,collapserTitle:"Main Menu",animSpeed:"medium",easingEffect:null,indentChildren:!1,childrenIndenter:"&nbsp;&nbsp;",expandIcon:"<i>&#9660;</i>",collapseIcon:"<i>&#9650;</i>"};t.prototype={init:function(){var i,s=e(n),t=this.options,l=this.$elem,a='<div class="menu-collapser">'+t.collapserTitle+'<div class="collapse-button"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></div></div>';l.before(a),i=l.prev(".menu-collapser"),l.on("click",".sub-toggle",function(n){n.preventDefault(),n.stopPropagation();var i=e(this).closest("li");e(this).hasClass("expanded")?(e(this).removeClass("expanded").html(t.expandIcon),i.find(">ul").slideUp(t.animSpeed,t.easingEffect)):(e(this).addClass("expanded").html(t.collapseIcon),i.find(">ul").slideDown(t.animSpeed,t.easingEffect))}),i.on("click",".collapse-button",function(e){e.preventDefault(),l.slideToggle(t.animSpeed,t.easingEffect)}),this.resizeMenu(),s.on("resize",this.resizeMenu.bind(this)),s.trigger("resize")},resizeMenu:function(){var i=this,t=e(n),l=t.width(),d=this.options,o=e(this.element),h=e("body").find(".menu-collapser");n.innerWidth!==s&&n.innerWidth>l&&(l=n.innerWidth),l!=a&&(a=l,o.find("li").each(function(){e(this).has("ul").length&&(e(this).addClass("has-submenu").has(".sub-toggle").length?e(this).children(".sub-toggle").html(d.expandIcon):e(this).addClass("has-submenu").append('<span class="sub-toggle">'+d.expandIcon+"</span>")),e(this).children("ul").hide().end().find(".sub-toggle").removeClass("expanded").html(d.expandIcon)}),d.resizeWidth>=l?(d.indentChildren&&o.find("ul").each(function(){var n=e(this).parents("ul").length;e(this).children("li").children("a").has("i").length||e(this).children("li").children("a").prepend(i.indent(n,d))}),o.addClass("collapsed").find("li").has("ul").off("mouseenter mouseleave"),h.show(),d.initiallyVisible||o.hide()):(o.find("li").has("ul").on("mouseenter",function(){e(this).find(">ul").stop().slideDown(d.animSpeed,d.easingEffect)}).on("mouseleave",function(){e(this).find(">ul").stop().slideUp(d.animSpeed,d.easingEffect)}),o.find("li > a > i").remove(),o.removeClass("collapsed").show(),h.hide()))},indent:function(e,n){for(var i=0,s="";e>i;i++)s+=n.childrenIndenter;return"<i>"+s+"</i> "}},e.fn[l]=function(n){return this.each(function(){e.data(this,"plugin_"+l)||e.data(this,"plugin_"+l,new t(this,n))})}}(jQuery,window,document);



/*! SlotMachine - v3.0.1 - 2016-03-03
* https://github.com/josex2r/jQuery-SlotMachine
* Copyright (c) 2016 Jose Luis Represa; Licensed MIT */
"use strict";function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}();!function(a,b,c,d){function e(b,c){var d=void 0;return a.data(b[0],"plugin_"+f)?d=a.data(b[0],"plugin_"+f):(d=new p(b,c),a.data(b[0],"plugin_"+f,d)),d}var f="slotMachine",g={active:0,delay:200,auto:!1,spins:5,randomize:null,complete:null,stopHidden:!0,direction:"up"},h="slotMachineNoTransition",i="slotMachineBlurFast",j="slotMachineBlurMedium",k="slotMachineBlurSlow",l="slotMachineBlurTurtle",m="slotMachineGradient",n=m,o=function(){function a(b,c){return _classCallCheck(this,a),this.cb=b,this.initialDelay=c,this.delay=c,this.deferred=jQuery.Deferred(),this.startTime=null,this.timer=null,this.running=!1,this.resume(),this}return _createClass(a,[{key:"_start",value:function(){this.timer=setTimeout(function(){this.cb.call(this)}.bind(this),this.delay)}},{key:"cancel",value:function(){this.running=!1,clearTimeout(this.timer)}},{key:"pause",value:function(){this.running&&(this.delay-=(new Date).getTime()-this.startTime,this.cancel())}},{key:"resume",value:function(){this.running||(this.running=!0,this.startTime=(new Date).getTime(),this._start())}},{key:"reset",value:function(){this.cancel(),this.delay=this.initialDelay,this._start()}},{key:"add",value:function(a){this.pause(),this.delay+=a,this.resume()}}]),a}(),p=function(){function c(b,d){_classCallCheck(this,c),this.element=b,this.settings=a.extend({},g,d),this.defaults=g,this.name=f,this.$slot=a(b),this.$tiles=this.$slot.children(),this.$container=null,this._minTop=null,this._maxTop=null,this._$fakeFirstTile=null,this._$fakeLastTile=null,this._timer=null,this._spinsLeft=null,this.futureActive=null,this.running=!1,this.stopping=!1,this.active=this.settings.active,this.$slot.css("overflow","hidden"),this.$container=this.$tiles.wrapAll('<div class="slotMachineContainer" />').parent(),this.$container.css("transition","1s ease-in-out"),this._maxTop=-this.$container.height(),this._initFakeTiles(),this._minTop=-this._$fakeFirstTile.outerHeight(),this._initDirection(),this.resetPosition(),this.settings.auto!==!1&&(this.settings.auto===!0?this.shuffle():this.auto())}return _createClass(c,[{key:"_initFakeTiles",value:function(){this._$fakeFirstTile=this.$tiles.last().clone(),this._$fakeLastTile=this.$tiles.first().clone(),this.$container.prepend(this._$fakeFirstTile),this.$container.append(this._$fakeLastTile)}},{key:"_initDirection",value:function(){this._direction={selected:"down"===this.settings.direction?"down":"up",up:{key:"up",initial:this.getTileOffset(this.active),first:0,last:this.getTileOffset(this.$tiles.length),to:this._maxTop,firstToLast:this.getTileOffset(this.$tiles.length),lastToFirst:0},down:{key:"down",initial:this.getTileOffset(this.active),first:this.getTileOffset(this.$tiles.length),last:0,to:this._minTop,firstToLast:this.getTileOffset(this.$tiles.length),lastToFirst:0}}}},{key:"_changeTransition",value:function(){var a=this._delay||this.settings.delay,b=this._transition||this.settings.transition;this.$container.css("transition",a+"s "+b)}},{key:"_animate",value:function(a){this.$container.css("transform","matrix(1, 0, 0, 1, 0, "+a+")")}},{key:"_isGoingBackward",value:function(){return this.futureActive>this.active&&0===this.active&&this.futureActive===this.$tiles.length-1}},{key:"_isGoingForward",value:function(){return this.futureActive<=this.active&&this.active===this.$tiles.length-1&&0===this.futureActive}},{key:"raf",value:function(a,c){var d=b.requestAnimationFrame||b.mozRequestAnimationFrame||b.webkitRequestAnimationFrame||b.msRequestAnimationFrame,e=(new Date).getTime(),f=function g(){var b=(new Date).getTime(),f=b-e;c>f?d(g):"function"==typeof a&&a()};d(f)}},{key:"getTileOffset",value:function(a){for(var b=0,c=0;a>c;c++)b+=this.$tiles.eq(c).outerHeight();return this._minTop-b}},{key:"resetPosition",value:function(a){this.$container.toggleClass(h),this._animate(a===d?this.direction.initial:a),this.$container[0].offsetHeight,this.$container.toggleClass(h)}},{key:"setRandomize",value:function(a){this.settings.randomize=a,"number"==typeof a&&(this.settings.randomize=function(){return a})}},{key:"prev",value:function(){return this.futureActive=this.prevIndex,this.running=!0,this.stop(),this.futureActive}},{key:"next",value:function(){return this.futureActive=this.nextIndex,this.running=!0,this.stop(),this.futureActive}},{key:"getDelayFromSpins",value:function(a){var b=this.settings.delay;switch(this._transition="linear",a){case 1:b/=.5,this._transition="ease-out",this._animationFX=l;break;case 2:b/=.75,this._animationFX=k;break;case 3:b/=1,this._animationFX=j;break;case 4:b/=1.25,this._animationFX=j;break;default:b/=1.5,this._animationFX=i}return b}},{key:"shuffle",value:function(a,b){var c=this;if("function"==typeof a&&(b=a),this.running=!0,this.visible||this.settings.stopHidden!==!0){var d=this.getDelayFromSpins(a);this.delay=d,this._animate(this.direction.to),this.raf(function(){if(!c.stopping&&c.running){var d=a-1;c.resetPosition(c.direction.first),1>=d?c.stop(b):c.shuffle(d,b)}},d)}else this.stop(b);return this.futureActive}},{key:"stop",value:function(a){var b=this;if(!this.running||this.stopping)return this.futureActive;this.running=!0,this.stopping=!0,null===this.futureActive&&(this.futureActive=this.custom),this._isGoingBackward()?this.resetPosition(this.direction.firstToLast):this._isGoingForward()&&this.resetPosition(this.direction.lastToFirst),this.active=this.futureActive;var c=this.getDelayFromSpins(1);return this.delay=c,this._animationFX=n,this._animate(this.getTileOffset(this.active)),this.raf(function(){b.stopping=!1,b.running=!1,b.futureActive=null,"function"==typeof b.settings.complete&&b.settings.complete.apply(b,[b.active]),"function"==typeof a&&a.apply(b,[b.active])},c),this.active}},{key:"auto",value:function(){var a=this;this.running||(this._timer=new o(function(){"function"!=typeof a.settings.randomize&&(a.settings.randomize=function(){return a._nextIndex}),a.visible||a.settings.stopHidden!==!0?a.shuffle(a.settings.spins,a._timer.reset.bind(a._timer)):a.raf(a._timer.reset.bind(a._timer),500)},this.settings.auto))}},{key:"destroy",value:function(){this._$fakeFirstTile.remove(),this._$fakeLastTile.remove(),this.$tiles.unwrap(),a.data(this.element[0],"plugin_"+f,null)}},{key:"active",get:function(){return this._active},set:function(a){this._active=a,(0>a||a>=this.$tiles.length)&&(this._active=0)}},{key:"visibleTile",get:function(){var a=this.$tiles.first().height(),b=this.$container.css("transform"),c=/^matrix\(-?\d+,\s?-?\d+,\s?-?\d+,\s?-?\d+,\s?-?\d+,\s?(-?\d+)\)$/,d=parseInt(b.replace(c,"$1"),10);return Math.abs(Math.round(d/a))-1}},{key:"random",get:function(){return Math.floor(Math.random()*this.$tiles.length)}},{key:"custom",get:function(){var a=void 0;if("function"==typeof this.settings.randomize){var b=this.settings.randomize.call(this,this.active);(0>b||b>=this.$tiles.length)&&(b=0),a=b}else a=this.random;return a}},{key:"direction",get:function(){return this._direction[this._direction.selected]},set:function(a){this.running||(this.direction="down"===a?"down":"up")}},{key:"_prevIndex",get:function(){var a=this.active-1;return 0>a?this.$tiles.length-1:a}},{key:"_nextIndex",get:function(){var a=this.active+1;return a<this.$tiles.length?a:0}},{key:"prevIndex",get:function(){return"up"===this.direction?this._nextIndex:this._prevIndex}},{key:"nextIndex",get:function(){return"up"===this.direction?this._prevIndex:this._nextIndex}},{key:"visible",get:function(){var c=a(b),d=this.$slot.offset().top>c.scrollTop()+c.height(),e=c.scrollTop()>this.$slot.height()+this.$slot.offset().top;return!d&&!e}},{key:"_fxClass",set:function(a){var b=[i,j,k,l].join(" ");this.$tiles.add(this._$fakeFirstTile).add(this._$fakeLastTile).removeClass(b).addClass(a)}},{key:"_animationFX",set:function(a){var b=this.settings.delay/4,c=this.$slot.add(this.$tiles).add(this._$fakeFirstTile).add(this._$fakeLastTile);this.raf(function(){this._fxClass=a,a===n?c.removeClass(m):c.addClass(m)}.bind(this),b)}},{key:"delay",set:function(a){a/=1e3,this._delay=a,this._changeTransition()}},{key:"transition",set:function(a){a=a||"ease-in-out",this._transition=a,this._changeTransition()}}]),c}();a.fn[f]=function(b){var c=this,d=void 0;return 1===this.length?d=e(this,b):!function(){var f=c;d=a.map(f,function(a,c){var d=f.eq(c);return e(d,b)})}(),d}}(jQuery,window,document);

