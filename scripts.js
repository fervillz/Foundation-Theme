jQuery(document).ready(function(a){"use strict";var o=function(){return!0};o()||(console.log=function(){}),a(".owl-carousel-testimonials").owlCarousel({loop:!1,margin:0,responsiveClass:!0,dots:!1,navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],autoplay:!0,items:3,stagePadding:0,nav:!0,autoHeight:!1,responsive:{0:{items:1,nav:!1},414:{items:1,nav:!1},768:{items:1,nav:!1},1e3:{items:2,nav:!0,loop:!0}}}),a(".owl-carousel-team").owlCarousel({loop:!1,margin:0,responsiveClass:!0,dots:!1,navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],autoplay:!0,items:3,stagePadding:0,nav:!0,autoHeight:!1,responsive:{0:{items:1,nav:!1},414:{items:2,nav:!1},768:{items:3,nav:!1},1e3:{items:4,nav:!0,loop:!0}}}),a(".owl-carousel-charity-1").owlCarousel({loop:!1,margin:0,responsiveClass:!0,dots:!1,navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],autoplay:!0,autoplayTimeout:3e3,autoplayHoverPause:!0,items:3,stagePadding:0,nav:!0,autoHeight:!1,responsive:{0:{items:1,nav:!1,loop:!0},440:{items:2,nav:!1,loop:!0},768:{items:2,nav:!1,loop:!0},1e3:{items:3,nav:!0,loop:!0}}}),a("a").click(function(){return a("html, body").animate({scrollTop:a(a(this).attr("href")).offset().top-50},500),!1}),a("body").on("click",".welcome-feature-button",function(o){o.preventDefault(),a(".welcome-info").toggleClass("welcome-hidden")})});