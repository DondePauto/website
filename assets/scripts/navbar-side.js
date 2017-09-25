/* global jQuery */
(function($) {
	$(function() {
		// Enable collapse events when button or backdrop are clicked
		$(".navbar-toggler, .navbar-backdrop").click(function() {
			$("header").attr("temporal-toggle", $("header").attr("toggle"));
			$("header").attr("toggle", "true");
		});
		
		// Handle navigation bar toggle collapse events
		$("header [data-toggle=collapse]").click(function() {
			var STEP = function( current, animation ) {
				var expanded = $(".navbar-toggler").attr("aria-expanded");
				var limit = expanded==="true" ? animation.end : animation.start;
				$(".navbar-toggler, .navbar-brand, .wrap").css("left", (current-limit) + animation.unit);
				$(".navbar-backdrop").css("opacity", Math.abs((current-limit)/limit));
			};
			var COMPLETE = function() {
				var expanded = $(".navbar-toggler").attr("aria-expanded");
				$(".navbar-toggler").attr("aria-expanded", expanded==="false" ? "true" : "false");
				if( expanded==="true" ) {
					$("header").attr("toggle", "false");
					$("header").removeAttr("temporal-toggle");
					$(".navbar-backdrop").css("display", "none");
					$(".wrap").css("position", "static");
				}
			};
			if( $("header").attr("toggle")==="true" ) {
				var expanded = $(".navbar-toggler").attr("aria-expanded");
				var toLeft   = expanded==="true" ? "-75vw" : "0px";
				if( expanded==="false" ) {
					$(".wrap").css("position", "relative");
					$(".navbar-backdrop").css("display", "block");
				}
				$(".navbar-collapse").animate({left: toLeft}, {duration: 500, step: STEP, complete: COMPLETE});
			}
		});
	});
})(jQuery);
