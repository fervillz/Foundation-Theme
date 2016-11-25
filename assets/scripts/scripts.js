jQuery( document ).ready( function ( $ ) {
	'use strict';
	/*
	|--------------------------------------------------------------------------
	| Developer mode
	|--------------------------------------------------------------------------
	|
	| Set to true - it will allow printing in the console. Alsways check for this
	| variables when running tests so you dont forget about certain console.logs.
	| Id needed for development testing this variable should be used.
	|
	*/
	var devMode = function() {
		return true;
	};

	// Disable console.log for production site.
	if ( ! devMode() ) {
		console.log = function() {};
	}

	$('.owl-carousel-testimonials').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		dots: false,
		navText: ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
		autoplay: true,
		items: 3,
		stagePadding: 0,
		nav: true,
		autoHeight: false,

		responsive:{
			0:{
	            items:1,
	            nav:false
	        },
	        414:{
	            items:1,
	            nav:false
	        },
	        768:{
	            items:1,
	            nav:false
	        },
	        1000:{
	            items:2,
	            nav:true,
	            loop:true
	        }
	    }
	});

	$('.owl-carousel-team').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		dots: false,
		navText: ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
		autoplay: true,
		items: 3,
		stagePadding: 0,
		nav: true,
		autoHeight: false,

		responsive:{
			0:{
	            items:1,
	            nav:false
	        },
	        414:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:3,
	            nav:false
	        },
	        1000:{
	            items:4,
	            nav:true,
	            loop:true
	        }
	    }
	});

	$('.owl-carousel-charity-1').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		dots: false,
		navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		autoplay: true,
		autoplayTimeout: 3000,
        autoplayHoverPause: true,
		items: 3,
		stagePadding: 0,
		nav: true,
		autoHeight: false,

		responsive:{
			0:{
	            items:1,
	            nav:false,
	            loop:true
	        },
	        440:{
	            items:2,
	            nav:false,
	            loop:true
	        },
	        768:{
	            items:2,
	            nav:false,
	            loop:true
	        },
	        1000:{
	            items:3,
	            nav:true,
	            loop:true
	        }
	    }
	});

	//var top = 505;
	//$(window).scroll(function(){
	//    var scrolltop = $(document).scrollTop();
	//    if  (scrolltop >= top) {
	///        $('.menu-quick-join-container').addClass('fix-menu');
	//    } else {
	//        $('.menu-quick-join-container').removeClass('fix--menu');
	//    }
	//});
	//
	$('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top - 50
	    }, 500);
	    return false;
	});

	$('body').on('click', '.welcome-feature-button', function(event) {
		event.preventDefault();

		$('.welcome-info').toggleClass('welcome-hidden');
	});

});
