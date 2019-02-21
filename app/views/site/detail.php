		<?php 
			$direction = ""; $housesize = ""; $bedroom = ""; $bathroom = ""; $furniture = ""; $parking =""; $kitchen = ""; $livingroom = ""; $dinning = ""; $air = ""; $garden = ""; $balcony = ""; $terrace = ""; $elevator = ""; 
			$stairs = ""; $gym =""; $steamandsouna = "";
			if($detail->direction == "" || $detail->direction == 0)
				$direction = "hide";
			if($detail->housesize == "" || $detail->housesize == 0)
				$housesize = "hide";
			if($detail->bedroom == "" || $detail->bedroom == 0)
				$bedroom = "hide";
			if($detail->bathroom == "" || $detail->bathroom == 0)
				$bathroom = "hide";
			if($detail->furniture == "" || $detail->furniture == 0)
				$furniture = "hide";
			if($detail->kitchen == "" || $detail->kitchen == 0)
				$kitchen = "hide";
			if($detail->livingroom == "" || $detail->livingroom == 0)
				$livingroom = "hide";
			if($detail->dinning_room == "" || $detail->dinning_room == 0)
				$dinning = "hide";
			if($detail->air_conditional == "" || $detail->air_conditional == 0)
				$air = "hide";
			if($detail->parking == "" || $detail->parking == 0)
				$parking = "hide";
			if($detail->steamandsouna == "" || $detail->steamandsouna == 0)
				$steamandsouna = "hide";
			if($detail->garden == "" || $detail->garden == 0)
				$garden = "hide";
			if($detail->balcony == "" || $detail->balcony == 0)
				$balcony = "hide";
			if($detail->terrace == "" || $detail->terrace == 0)
				$terrace = "hide";
			if($detail->elevator == "" || $detail->elevator == 0)
				$elevator = "hide";
			if($detail->stairs == "" || $detail->stairs == 0)
				$stairs = "hide";
			if($detail->gym == "" || $detail->gym == 0)
				$gym = "hide";
		?>

		<!-- Begin Main -->
		<div role="main" class="main pgl-bg-grey">
			<!-- Begin page top -->
			<section class="page-top hide">
				<div class="container">
					<div class="page-top-in">
						<h2><span>Property Detail</span></h2>
					</div>
				</div>
			</section>
			<!-- End page top -->
			
			<!-- Begin content with sidebar -->
			<div class="container">
				<div class="row">
					<div class="col-md-9 content">
						
						<section class="pgl-pro-detail pgl-bg-light">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php 
										foreach ($image as $img) {
											$extends = pathinfo($img->url, PATHINFO_EXTENSION);
											$hide = "";
											if($extends == "mp4" || $extends == "movie" || $extends == "mpe" || $extends == "qt" || $extends == "mov" || $extends == "avi" || $extends == "mpg" || $extends == "mpeg")
											{
												$hide = "hide";
											}else{
									?>
									<li>
										<img aly="" class="img-responsive pixelated <?php echo $hide;?>" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
										<span class="property-thumb-info-label">
											<span class="label price">$<?php echo number_format($img->price)?></span>
											<span class="label forrent <?php if($img->p_type == 0) echo "hide"; else echo "";?>">
												<?php 
													if($img->p_type == 1)
														echo "Sale";
													if($img->p_type == 2)
														echo "Rent";
													if($img->p_type == 3)
														echo "Rent & Sale";
												?>
											</span>
											<span class="label price"><?php echo 'P'.$img->pid;?></span>
										</span>
									</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides">
									<?php 
										foreach ($image as $img) {
											$extends = pathinfo($img->url, PATHINFO_EXTENSION);
											$hide = "";
											if($extends == "mp4" || $extends == "movie" || $extends == "mpe" || $extends == "qt" || $extends == "mov" || $extends == "avi" || $extends == "mpg" || $extends == "mpeg")
											{
												$hide = "hide";
											}else{
									?>
									<li>
										<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
									</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div class="pgl-detail">
								<div class="row">
									<div class="col-sm-4">
										<ul class="list-unstyled amenities amenities-detail">
											<li><strong>PropertyID:</strong> <?php echo 'P'.$detail->pid?></li>
											<li><strong>Post Date:</strong> <?php echo $detail->create_date?></li>
											<li><strong>Type:</strong> <?php echo $detail->typename?></li>
											<li><strong>Area:</strong> <?php if($detail->housesize !="") echo $detail->housesize;else echo 0;?><sup>m2</sup></li>
											<li><strong>Price:</strong> <?php echo '$'.number_format($detail->price)?></li>
											<li><address><i class="fa fa-map-marker"></i> <?php if($detail->locationname !="") echo $detail->locationname; else echo "";?></address></li>
											<li class="<?php echo $bedroom?>"><i class="icons icon-bedroom"></i> <?php echo $detail->bedroom;?> Bedrooms</li>
											<li class="<?php echo $bathroom?>"><i class="icons icon-bathroom"></i> <?php echo $detail->bathroom;?> Bathrooms</li>
											<!-- <li>
												<div class="fb-share-button" data-href="<?php echo site_url('site/site/detail/'.$detail->pid.'/?name='.$detail->property_name)?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Festatecambodia.com%2Fsite%2Fsite%2Fdetail%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
											</li> -->
										</ul>
									</div>
									<div class="col-sm-8">
										<h2 style="font-size: 1.5em"><?php echo $detail->property_name;?></h2>
										<?php 
											echo $detail->description;
										?>
									</div>
								</div>
								<div class="tab-detail">
									<div class="right" style="text-align: right;">
										<a class="fass fa fa-facebook" href="http://www.facebook.com/sharer.php"
  										target="_blank" >
										</a>
										<a href="#" class="fass fa fa-twitter"></a>
										<a target="_blank" href="https://telegram.me/share/url?url=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name='.$detail->property_name)?>&text=<?php echo $detail->property_name?>" class="fass fa fa-paper-plane"></a>
										
										<a href="#" class="fas fa-line">
											<img src="<?php echo site_url('assets/img/line.png')?>">
										</a>
									</div>
								</div>
							
								<div class="tab-detail">
									<h3>More Infomation</h3>
									<div class="panel-group" id="accordion">
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Additional Details</a> 
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<ul>
														<li class="<?php echo $direction?>"><strong>Direction:</strong> <?php echo $detail->direction;?></li>
														<li class="<?php echo $housesize?>"><strong>Area Size:</strong> <?php echo $detail->housesize;?><sup>m2</sup></li>
														<li class="<?php echo $bedroom?>"><strong>Bedrooms:</strong> <?php echo $detail->bedroom;?></li>
														<li class="<?php echo $bathroom?>"><strong>Bathrooms:</strong> <?php echo $detail->bathroom;?></li>
														<li class="<?php echo $furniture?>"><strong>Furniture:</strong> <?php echo $detail->furniture;?></li>
														<li class="<?php echo $kitchen?>"><strong>Kitchen:</strong> <?php echo $detail->kitchen;?></li>
														<li class="<?php echo $livingroom?>"><strong>Living Room:</strong> <?php echo $detail->livingroom;?></li>
														<li class="<?php echo $dinning?>"><strong>Dining Room:</strong> <?php echo $detail->dinning_room;?></li>
														<li class="<?php echo $air?>"><strong>Airconditioner:</strong> <?php echo $detail->air_conditional;?></li>
														<li class="<?php echo $parking?>"><strong>Parking:</strong> <?php echo $detail->parking;?></li>
														<li class="<?php echo $steamandsouna?>"><strong>Steam & Sauna:</strong> <?php echo $detail->steamandsouna;?></li>
														<li class="<?php echo $garden?>"><strong>Garden:</strong> <?php echo $detail->garden;?></li>
														<li class="<?php echo $balcony?>"><strong>Balcony:</strong> <?php echo $detail->balcony;?></li>
														<li class="<?php echo $terrace?>"><strong>Terrace:</strong> <?php echo $detail->terrace;?></li>
														<li class="<?php echo $elevator?>"><strong>Elevator:</strong> <?php echo $detail->elevator;?></li>
														<li class="<?php echo $stairs?>"><strong>Stairs:</strong> <?php echo $detail->stairs;?></li>
														<li class="<?php echo $gym?>"><strong>Gym:</strong> <?php echo $detail->gym?></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Map</a> 
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse in">
												<div class="panel-body">
													<div id="map_canvas" style="height: 350px;" class="pgl-bg-light"></div>
												</div>
											</div>
										</div>
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Video</a> 
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse in">
												<div class="panel-body"> 
													<?php
														foreach ($image as $video) {
															$extends = pathinfo($video->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
															{
													?>
													<div class="col-md-4 animation">
														<div class="pgl-property">
															<div class="property-thumb-info">
																<div class="property-thumb-info-image">
																	<a href="#">
																		<video style="height: 176px;" class="img-responsive" controls>
																			<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$video->pid.'_'.$video->url))) echo base_url('assets/upload/property/'.$video->pid.'_'.$video->url); else echo base_url('assets/upload/noimage.jpg')?>">
																		</video>
																	</a>
																</div>
															</div>
														</div>
													</div>
													<?php
															}
														}
													?>
												</div>
											</div>
										</div>
										<div class="panel panel-default pgl-panel hide">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFouth" class="collapsed">Agent</a> </h4>
											</div>
											<div id="collapseFouth" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="pgl-agent-item pgl-bg-light">
														<div class="row pgl-midnarrow-row">
															<div class="col-xs-4">
																<div class="img-thumbnail-medium">
																	<a href="agentprofile.html"><img alt="" class="img-responsive" src="<?php echo site_url('template')?>/images/agents/temp-agent.png"></a>
																</div>
															</div>
															<div class="col-xs-8">
																<div class="pgl-agent-info">
																	<small>NO.1</small>
																	<h4><a href="agentprofile.html">John Smith</a></h4>
																	<address>
																		<i class="fa fa-map-marker"></i> Office : 1-800-666-8888<br>
																		<i class="fa fa-phone"></i> Mobile : 0800-666-6666<br>
																		<i class="fa fa-fax"></i> Fax : 1-800-666-8888<br>
																		<i class="fa fa-envelope-o"></i> Mail: <a href="mailto:JohnSmith@gmail.com">JohnSmith@gmail.com</a>
																	</address>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Contact us</a> 
												</h4>
											</div>
											<div id="collapseFive" class="panel-collapse collapse in">
												<div class="panel-body">
													<ul>
														<li><i class="fa fa-map-marker"></i> Address: <?php echo $profile->address?></li>
														<li><i class="fa fa-phone"></i> Mobile : <?php echo $profile->phone?><br></li>
														<li><i class="fa fa-envelope-o"></i> Mail: <?php echo $profile->email?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						
						<!-- Begin Related properties -->
						<section class="pgl-properties">
							<h2 style="font-size: 1.571em;">Related Properties</h2>
							<div class="row">
								<div class="owl-carousel pgl-pro-slide" data-plugin-options='{"items": 3, "itemsDesktop": 3, "singleItem": false, "autoPlay": false, "pagination": false}'>
									<?php 
										foreach($this->site->getRelatedProperty($detail->pid,$detail->agent_id) as $related){
									?>
									<div class="col-md-12 animation">
										<div class="pgl-property">
											<div class="property-thumb-info">
												<div class="property-thumb-info-image">
													<?php 
														$imgrelated = $this->site->getImage($related->pid);
													?>
													<a href="<?php echo site_url('site/site/detail/'.$related->pid.'/?name='.$related->property_name)?>">
														<?php
															$extends = pathinfo($imgrelated->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
																	{
														?>
															<video style="height: 176px;" class="img-responsive" controls>
															  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$imgrelated->pid.'_'.$imgrelated->url))) echo base_url('assets/upload/property/'.$imgrelated->pid.'_'.$imgrelated->url); else echo base_url('assets/upload/noimage.jpg')?>">
															</video>
														<?php 
															}else{
														?>
															<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$imgrelated->pid.'_'.$imgrelated->url))) echo base_url('assets/upload/property/thumb/'.$imgrelated->pid.'_'.$imgrelated->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
														<?php 
															}
														?>
														
													</a>
													<span class="property-thumb-info-label" >
													<span class="label price">$<?php echo number_format($related->price) ?></span>
													<span class="label forrent <?php if($related->p_type !=0) echo ""; else echo "hide";?>">
														<?php 
															if($related->p_type == 1)
																echo "Sale";
															if($related->p_type == 2)
																echo "Rent";
															if($related->p_type == 3)
																echo "Rent & Sale";	
														?>
													</span>
												</span>
												</div>
												<div class="property-thumb-info-content" style="height: 120px;">
													<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$related->pid.'/?name='.$related->property_name)?>"><?php echo $related->property_name;?></a></h3>
													<address class="module line-clamp"><?php echo $related->address;?></address>
												</div>
												<div class="amenities clearfix">
													<ul class="pull-left">
														<li><strong>Area:</strong> <?php if($related->housesize !="") echo $related->housesize; else echo 0;?><sup>m2</sup></li>
													</ul>
													<ul class="pull-right">
														<li class="<?php if($related->bedroom == "" ) echo "hide";?>"><i class="icons icon-bedroom"></i> <?php echo $related->bedroom;?></li>
														<li class="<?php if($related->bedroom == "" ) echo "hide"?>"><i class="icons icon-bathroom"></i> <?php echo $related->bedroom;?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								<?php 
									}
								?>
								</div>
							</div>
						</section>
						<!-- End Related properties -->
						
					</div>
					<div class="col-md-3 sidebar">
						<!-- Begin Our Agents -->
						<aside class="block pgl-agents pgl-bg-light">
							<h3>Our Agents</h3>
							<div class="owl-carousel pgl-pro-slide pgl-agent-item" data-plugin-options='{"items": false, "pagination": false, "autoHeight": true}'>

								<div class="pgl-agent-item">
									<div class="img-thumbnail-medium">
										<a href="#">
											<!-- <img src="<?php echo site_url('template')?>/images/agents/temp-agent.png" class="img-responsive" alt=""> -->
											<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/adminuser/'.$detail->userid.'.png'))) echo base_url('assets/upload/adminuser/'.$detail->userid.'.png'); else echo base_url('assets/upload/noimage.jpg')?>"/>
										</a>
									</div>
									<div class="pgl-agent-info">
										<!-- <small>NO.1</small> -->
										<h4><a href="#"><?php echo $detail->user_name?></a></h4>
										<address>
											<!-- <i class="fa fa-map-marker"></i> Office : 1-800-666-8888<br> -->
											<i class="fa fa-phone"></i> : <?php echo $detail->phone;?><br>
											<!-- <i class="fa fa-fax"></i> Fax : 1-800-666-8888<br> -->
											<i class="fa fa-envelope-o"></i>: <?php echo $detail->email;?><br>
											<i><a href="<?php echo site_url('site/site/search?available=0&agent='.$detail->userid.'&list_type=lists&order=Desc')?>">View all Property</a></i>
										</address>
									</div>	
								</div>
								
							</div>
						</aside>
						<!-- <div class="wizard"> -->
							<!-- <a class="current">Detail</a>
							<a href="<?php echo site_url('site/site/postproperty')?>" class="current">Post Property</a>
							<a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a> -->
						<!-- </div> -->
						<div class="wizard row">
							<div class="col-md-12">
								<div class="col-md-12" style="border-radius: 3px;">
									<a href="<?php echo site_url('site/site/postproperty')?>" class="current">Post Property</a>
								</div>
								<div class="col-md-12" style="border-radius: 3px;">
									<a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a>
								</div>
							</div>
						</div>
						<!-- End Our Agents -->
						
						<div class="tab-pane active" id="all">
								<div class="row">
									<?php 
										$level = 2;
										$sponsored = $this->site->getListSponsored($detail->pid,$detail->lp_id,$detail->p_type,$level);
										foreach ($sponsored as $hot) {
									?>
									<div class="col-xs-12 animation">
										<div class="pgl-property">
											<div class="property-thumb-info">
												<div class="property-thumb-info-image">
													<a href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?name='.$hot->property_name)?>">
														<?php 
															$img = $this->site->getImage($hot->pid);
														?>
														<?php 
															$extends = pathinfo($img->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
															{
														?>
															<video style="height: 176px;" class="img-responsive" controls>
															  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>">
															</video>

														<?php 
															}else{
														?>
															<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
														<?php
															}
														?>
													</a>
													<span class="property-thumb-info-label">
														<span class="label price">$<?php echo number_format($hot->price) ?></span>
														<span class="label forrent <?php if($hot->p_type !=0) echo ""; else echo "hide";?>">
															<?php 
																if($hot->p_type == 1)
																	echo "Sale";
																if($hot->p_type == 2)
																	echo "Rent";
																if($hot->p_type == 3)
																	echo "Rent & Sale";	
															?>
														</span>
														<span class="label price"><?php echo 'P'.$hot->pid; ?></span>
													</span>
												</div>
												<div class="property-thumb-info-content" style="height: 120px;">
													<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?name='.$hot->property_name)?>"><?php echo $hot->property_name?></a></h3>
													<address class="module line-clamp"><?php echo $hot->address?></address>
												</div>
												<div class="amenities clearfix" style="height: 40px;">
													<ul class="pull-left">
														<li><strong>Area:</strong> <?php if($hot->housesize !="") echo $hot->housesize; else echo 0;?><sup>m2</sup></li>
													</ul>
													<ul class="pull-right">
														<li class="<?php if($hot->bedroom == "" ) echo "hide";?>"><i class="icons icon-bedroom"></i> <?php echo $hot->bedroom; ?></li>
														<li class="<?php if($hot->bathroom == "" ) echo "hide";?>"><i class="icons icon-bathroom"></i> <?php echo $hot->bathroom; ?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
							<?php } ?>

								</div>
							</div>
						<!-- End Advanced Search -->
						
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
          var myLatlng = new google.maps.LatLng('<?php if($detail->latitude !="") echo $detail->latitude; else echo "11.570516523819823"?>', '<?php if($detail->longtitude !="") echo $detail->longtitude; else echo "104.92183668505857";?>');

          var myOptions = {
              zoom: 13,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              gestureHandling: 'greedy'
          };
          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

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