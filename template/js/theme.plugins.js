(function($) {
	$.extend({

		scrollToTop: function() {

			var _isScrolling = false;

			// Append Button
			$("body").append($("<a />")
							.addClass("scroll-to-top")
							.attr({
								"href": "#",
								"id": "scrollToTop"
							})
							.append(
								$("<i />")
									.addClass("icons icon-up")
							));

			$("#scrollToTop").click(function(e) {

				e.preventDefault();
				$("body, html").animate({scrollTop : 0}, 500);
				return false;

			});

			// Show/Hide Button on Window Scroll event.
			$(window).scroll(function() {

				if(!_isScrolling) {

					_isScrolling = true;

					if($(window).scrollTop() > 150) {

						$("#scrollToTop").stop(true, true).addClass("visible");
						_isScrolling = false;

					} else {

						$("#scrollToTop").stop(true, true).removeClass("visible");
						_isScrolling = false;

					}

				}

			});

		}

	});
	//========= Order By ==========//
	$('.order_by').on('change', function(){
		var order = $(this).val();
		$('.order_bys option').each(function(){
			var o = $(this).val();
			if(order == o)
				$(this).prop("selected", true);
		});
		$('.search_all_form').submit();
	});
	$('.short_by').on('change', function(){
		// var order = $(".order_by").val();
		var short = $(this).val();
		$('.short_bys option').each(function(){
			var s = $(this).val();
			if(short == s)
				$(this).prop("selected", true);
		});

		$('.search_all_form').submit();
	});

})(jQuery);

