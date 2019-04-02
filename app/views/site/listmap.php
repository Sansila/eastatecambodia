<style type="text/css">
	.homepage-map #map {
	    width: 100%;
	    height: 700px;
	}
</style>
<div role="main" class="main pgl-bg-grey">
	<div class="container">
		<div class="homepage-map">
			<div id="map"></div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
	window.onload=function(){
      var map;
      function initialize() {
          var myLatlng = new google.maps.LatLng(11.583903035180196, 104.90009201657483);

          var myOptions = {
              zoom: 18,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("map"), myOptions);

          var marker = new google.maps.Marker({
              draggable: false,
              position: myLatlng,
              map: map,
              title: "Your location"
          });

          google.maps.event.addListener(marker, 'dragend', function (event) {
              document.getElementById("latitude").value = event.latLng.lat();
              document.getElementById("longtitude").value = event.latLng.lng();
              infoWindow.open(map, marker);
          });
      }
      google.maps.event.addDomListener(window, "load", initialize());
    }//]]> 
</script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZ-Erd-14Vf2AoPW2Pzlxssf6-2R3PPs"></script> -->
<script src="<?php echo site_url('assets/js')?>/map/markerwithlabel_packed.js"></script>
<script src="<?php echo site_url('assets/js')?>/map/infobox.js"></script> 
<script src="<?php echo site_url('assets/js')?>/map/markerclusterer_packed.js"></script> 
<script src="<?php echo site_url('assets/js')?>/map/custom-map.js"></script>
<script src="<?php echo site_url('assets/js')?>/map/custom.js"></script> 
<script>
(function($){	
	var _latitude = 36.596165;
	var _longitude = -97.062988;
	createHomepageGoogleMap(_latitude,_longitude);
})(jQuery);
</script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106986305-1', 'auto');
  ga('send', 'pageview');
</script>