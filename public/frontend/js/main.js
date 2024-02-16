
(function ($) {
	"use strict";

	// Page Loader==========>
	$(window).on('load', function () {
		$('.page-loader').fadeOut();
	});



	// Sticky Nav==========>
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 50) {
			$("#header-sticky").removeClass("sticky-menu");
		} else {
			$("#header-sticky").addClass("sticky-menu");
		}
	});


	// Smoth scroll ==========>
	$(function () {
		$('.smoth-scroll').on('click', function (event) {
			var $anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 0
			}, 1500);
			event.preventDefault();
		});
		$(window).on('scroll', 
		function(){
			if ($(this).scrollTop() === 0) {
				$('.smoth-scroll').hide();
			} else {
				$('.smoth-scroll').show();
			}
		});
	});
	
})(jQuery);



