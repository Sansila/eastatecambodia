<style type="text/css">
	.homepage-map #map {
	    width: 100%;
	    height: 710px;
	}
	.infobox-wrapper .sale_amount {
	    position: absolute;
	    top: 37px;
	    left: 20px;
	    z-index: 10;
	    font-size: 16px;
	    color: red;
	}
	.property-text{
		background: white;
		padding: 10px;
		width: 200px;
	}
</style>
<div role="main" class="main pgl-bg-grey">
	<div class="container">
		<div style="margin-top: 30px"></div>
		<div class="homepage-map">
			<div id="map"></div>
		</div>
		<div style="margin-top: 30px"></div>
	</div>
</div>
<script>
(function($){	
	var _latitude = 11.583903035180196;
	var _longitude = 104.90009201657483;
	createHomepageGoogleMap(_latitude,_longitude);
})(jQuery);
</script>