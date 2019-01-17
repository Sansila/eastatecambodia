
<!-- <section id="home-search-bg" class="home-search hero lazyload" data-sizes="auto" style="background-image: url('<?php //echo site_url('assets/upload/banner/thumb'.'/'.$slide->banner_id.'.png')?>'); padding-top:16rem;     padding-bottom: 8rem; height: auto !important;">
	<div class="overlay"></div>
</section> -->

<!-- Begin Main -->
		<div role="main" class="main pgl-bg-grey">
			
			<!-- Begin content with sidebar -->
			<div class="container">
				
				<div class="row">
					<div class="col-md-12 content" style="padding-top: 30px;">
						<!-- <h2>Contact Us</h2> -->
						<div class="wizard row">
							<div class="col-md-12">
								<div class="col-md-2">
									<a href="<?php echo site_url('site/site/postproperty')?>" class="current">Post Property</a>
								</div>
								<div class="col-md-2">
									<a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="contact">
									<div class="row">
										<div class="col-sm-6">
											<strong>Your address</strong>
											<address><?php echo $profile->address?></address>
										</div>
										<div class="col-sm-6">
											<address>
												<strong>Phone.</strong> <?php echo $profile->phone?><br>
												<strong>Fax.</strong> <?php echo $profile->phone?><br>
												<strong>Email.</strong> <?php echo $profile->email?>
											</address>
										</div>
										<div class="col-md-12 ">
											<div class="">
												<form id="contact-form" name="form1" method="post" action="<?php echo site_url('site/site/send_contact')?>">
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 hide">
																<input placeholder="Name" type="text" name="owner" id="owner" class="form-control" value="<?php echo $profile->email;?>">
															</div>
															<div class="col-sm-6">
																<input placeholder="Name" type="text" name="name" id="name" class="form-control" data-msg-required="Please enter your name." required>
															</div>
															<div class="col-sm-6">
																<input placeholder="Email Address *" type="email" name="customer_mail" id="customer_mail" class="form-control" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<textarea placeholder="Commants" rows="5" name="comments" id="comments" class="form-control" data-msg-required="Please enter your message." required style="max-width: 100%;"></textarea>
													</div>
													<div class="form-group">
														<input type="submit" value="Submit" class="btn btn-primary min-wide" data-loading-text="Loading..." style="min-width: 100%;">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="">
									<div id="contact-map" class="pgl-bg-light"></div>
								</div>
							</div>
						</div>
					</div>

				</div>	
			</div>
			<!-- End content with sidebar -->
			
		</div>
		<!-- End Main -->

<script type="text/javascript">
	window.onload=function(){
      var map;
      function initialize() {
          var myLatlng = new google.maps.LatLng(11.583903035180196, 104.90009201657483);

          var myOptions = {
              zoom: 18,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("contact-map"), myOptions);

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
</script>