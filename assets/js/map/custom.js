(function($) {
	//Full Screen Map Height
	//$window.on('resize', function(){
		setMapHeight();
	
	
	function setMapHeight(){
		var $body = $('body');
		if($body.hasClass('full-page-map')) {
			$('#map').height($window.height() - $('header').height());
		}
	}
	
	setMapHeight();
	//Slide Up Advance Search Form On Map
	$('.form-up-btn').each(function(){
		$(this).on('click',function(e){
			if($('#find-location').is(".open"))
			{
				$('#find-location').removeClass("open");
				setTimeout(function(){$('#map-banner').removeClass("visible")},0);
			}
			else
			{
				$('#find-location').addClass("open");
				setTimeout(function(){
					$('#map-banner').addClass("visible")
				},400);
			}
		e.preventDefault();
		});
	});
})(window.jQuery);