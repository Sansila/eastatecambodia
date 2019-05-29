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
			$name_view = "";
			if(isset($_GET['name']))
				$name_view = $_GET['name'];
		?>

		<style type="text/css">
			iframe {
			    display: block;
			    position: relative!important;
			    float: right;
			    right: 37px;
			    top: 21px;
			}
			input.search-query {
			    padding-left:30px;
			    border: 1px solid #e9e4e4;
    			border-radius: 20px;
    			font-size: 14px;
			}

			form.form-search {
			    position: relative;
			}
			
			form.form-search:before {
			    content:'';
			    display: block;
			    width: 14px;
			    height: 14px;
			    background-image: url(http://getbootstrap.com/2.3.2/assets/img/glyphicons-halflings.png);
			    background-position: -48px 0;
			    position: absolute;
			    top:12px;
			    left:12px;
			    opacity: .5;
			    z-index: 1000;
			}
			.btn-primarys {
			    color: #ffffff;
			    background-color: #006dcc !important;
			    border-top-right-radius: 20px;
			    border-bottom-right-radius: 20px;
			    height: 38px;
			    border:none;
			    font-size: 12px;
			}
			.chosen-container{
				display: none !important; 
			}
			.modal-header .close {
			    margin-top: -35px;
			}
			.txt{
				border: 1px solid #eeeeee;
			}
			.txt-sel{
				max-width: 100%;
				border-radius: 3px;
			}
			.destop{
			  		display: inline-block;
			  	}
		  	.mobile{
		  		display: none;
		  	}
			@media only screen and (max-width: 600px) {
			  	.destop{
			  		display: none;
			  	}
			  	.mobile{
			  		display: inline-block;
			  	}
			}
			@media only screen and (max-width: 480px) {
			  	.destop{
			  		display: none;
			  	}
			  	.mobile{
			  		display: inline-block;
			  	}
			}
			.line-clamps {
			    display: -webkit-box;
			    -webkit-line-clamp: 1 !important;
			    -webkit-box-orient: vertical;
			}
			.line-clamp {
			    display: -webkit-box;
			    -webkit-line-clamp: 2 !important;
			    -webkit-box-orient: vertical;
			}
			.img-responsive{
				width: 100% !important;
			}
		</style>

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

												$have_img = false;
												$img_path = base_url('assets/upload/noimage.jpg');
												if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
												{
													$img_path = site_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
													$have_img = true;
												}
									?>
									<li>
										<img aly="" class="img-responsive pixelated <?php echo $hide;?>" src="<?php echo $img_path;?>"/>
										<span class="property-thumb-info-label">
											<span class="label price">$<?php echo number_format($img->price)?></span>
											<span class="label forrent <?php if($img->p_type == 0) echo "hide"; else echo "";?>">
												<?php 
													if($img->p_type == 1)
														echo $this->lang->line('search_sale');
													if($img->p_type == 2)
														echo $this->lang->line('search_rent');
													if($img->p_type == 3)
														echo $this->lang->line('search_sale_rent');
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
												$have_img = false;
												$img_path = base_url('assets/upload/noimage.jpg');
												if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
												{
													$img_path = site_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
													$have_img = true;
												}
									?>
									<li>
										<img aly="" class="img-responsive" src="<?php echo $img_path;?>"/>
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
											<li><strong><?php echo $this->lang->line('detail_property_id')?>:</strong> <?php echo 'P'.$detail->pid?></li>
											<li><strong><?php echo $this->lang->line('detail_property_post_date')?>:</strong> <?php echo $detail->create_date?></li>
											<li><strong><?php echo $this->lang->line('detail_property_type')?>:</strong> <?php echo $detail->typename?></li>
											<li><strong><?php echo $this->lang->line('detail_property_area')?>:</strong> <?php if($detail->housesize !="") echo $detail->housesize;else echo 0;?><sup>m2</sup></li>
											<li><strong><?php echo $this->lang->line('detail_property_price')?>:</strong> <?php echo '$'.number_format($detail->price)?></li>
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
									<div class="right">
										<a data-toggle="modal" data-target="#modalLoginForm" class="left btn btn-warning"><?php echo $this->lang->line('detail_property_contact_back')?></a>
										<a class="fass fa fa-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name=facebook')?>"
  										target="_blank" >
										</a>
										<a href="https://api.whatsapp.com://send?text=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name=whatsapp')?>" data-action="share/whatsapp/share" target="_blank" class="fass fa fa-whatsapp destop">
											<img src="<?php echo site_url('assets/img/icons/whatsapp.png')?>">
										</a>
										<a class="fass fa fa-whatsapp mobile" href="whatsapp://send?text=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name=whatsapp')?>" data-action="share/whatsapp/share">
											<img src="<?php echo site_url('assets/img/icons/whatsapp.png')?>">
										</a>
										<a target="_blank" href="https://telegram.me/share/url?url=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name=telegram')?>" class="fass fa fa-paper-plane">
										</a>
										<a target="_blank" href="https://social-plugins.line.me/lineit/share?url=<?php echo site_url('site/site/detail/'.$detail->pid.'/?name=line')?>" class="fas fa-line"><img src="<?php echo site_url('assets/img/line.png')?>">
										</a>
										<a target="_blank" class="fas map-google" href="https://www.google.com/maps/search/?api=1&query=<?php echo $detail->latitude?>,<?php echo $detail->longtitude?>">
											<img src="<?php echo site_url('assets/img/google-maps.png')?>">
										</a>
									</div>
								</div>
							
								<div class="tab-detail">
									<h3><?php echo $this->lang->line('detail_property_more_info')?></h3>
									<div class="panel-group" id="accordion">
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $this->lang->line('detail_property_additional')?></a> 
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<ul>
														<li class="<?php echo $direction?>"><strong><?php echo $this->lang->line('detail_property_direction')?>:</strong> <?php echo $detail->direction;?></li>
														<li class="<?php echo $housesize?>"><strong><?php echo $this->lang->line('detail_property_area_size')?>:</strong> <?php echo $detail->housesize;?><sup>m2</sup></li>
														<li class="<?php echo $bedroom?>"><strong><?php echo $this->lang->line('detail_property_bedroom')?>:</strong> <?php echo $detail->bedroom;?></li>
														<li class="<?php echo $bathroom?>"><strong><?php echo $this->lang->line('detail_property_bathroom')?>:</strong> <?php echo $detail->bathroom;?></li>
														<li class="<?php echo $furniture?>"><strong><?php echo $this->lang->line('detail_property_funiture')?>:</strong> <?php echo $detail->furniture;?></li>
														<li class="<?php echo $kitchen?>"><strong><?php echo $this->lang->line('detail_property_kitchen')?>:</strong> <?php echo $detail->kitchen;?></li>
														<li class="<?php echo $livingroom?>"><strong><?php echo $this->lang->line('detail_property_living')?>:</strong> <?php echo $detail->livingroom;?></li>
														<li class="<?php echo $dinning?>"><strong><?php echo $this->lang->line('detail_property_dinning')?>:</strong> <?php echo $detail->dinning_room;?></li>
														<li class="<?php echo $air?>"><strong><?php echo $this->lang->line('detail_property_air')?>:</strong> <?php echo $detail->air_conditional;?></li>
														<li class="<?php echo $parking?>"><strong><?php echo $this->lang->line('detail_property_parking')?>:</strong> <?php echo $detail->parking;?></li>
														<li class="<?php echo $steamandsouna?>"><strong><?php echo $this->lang->line('detail_property_steam_sauna')?>:</strong> <?php echo $detail->steamandsouna;?></li>
														<li class="<?php echo $garden?>"><strong><?php echo $this->lang->line('detail_property_garden')?>:</strong> <?php echo $detail->garden;?></li>
														<li class="<?php echo $balcony?>"><strong><?php echo $this->lang->line('detail_property_balcony')?>:</strong> <?php echo $detail->balcony;?></li>
														<li class="<?php echo $terrace?>"><strong><?php echo $this->lang->line('detail_property_terrace')?>:</strong> <?php echo $detail->terrace;?></li>
														<li class="<?php echo $elevator?>"><strong><?php echo $this->lang->line('detail_property_elevator')?>:</strong> <?php echo $detail->elevator;?></li>
														<li class="<?php echo $stairs?>"><strong><?php echo $this->lang->line('detail_property_stair')?>:</strong> <?php echo $detail->stairs;?></li>
														<li class="<?php echo $gym?>"><strong><?php echo $this->lang->line('detail_property_gym')?>:</strong> <?php echo $detail->gym?></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="panel panel-default pgl-panel">
											<div class="panel-heading">
												<h4 class="panel-title"> 
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php echo $this->lang->line('detail_property_map')?></a> 
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
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php echo $this->lang->line('detail_property_video')?></a> 
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse in">
												<div class="panel-body"> 
													<?php
														foreach ($image as $video) {
															$extends = pathinfo($video->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
															{

															$have_img = false;
															$img_path = base_url('assets/upload/noimage.jpg');
															if(file_exists(FCPATH.'assets/upload/property/'.$video->pid.'_'.$video->url))
															{
																$img_path = site_url('assets/upload/property/'.$video->pid.'_'.$video->url);
																$have_img = true;
															}
													?>
													<div class="col-md-4 animation">
														<div class="pgl-property">
															<div class="property-thumb-info">
																<div class="property-thumb-info-image">
																	<a href="#">
																		<video style="height: 176px;" class="img-responsive" controls>
																			<source src="<?php echo $img_path;?>">
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
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><?php echo $this->lang->line('detail_project_contact')?></a> 
												</h4>
											</div>
											<div id="collapseFive" class="panel-collapse collapse in">
												<div class="panel-body">
													<ul>
														<li><i class="fa fa-map-marker"></i> <?php echo $this->lang->line('detail_property_address')?>: <?php echo $profile->address?></li>
														<li><i class="fa fa-phone"></i> <?php echo $this->lang->line('detail_property_mobile')?> : <?php echo $profile->phone?><br></li>
														<li><i class="fa fa-envelope-o"></i> <?php echo $this->lang->line('detail_property_mail')?>: <?php echo $profile->email?></li>
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
							<h2 style="font-size: 1.571em;"><?php echo $this->lang->line('detail_property_relative')?></h2>
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
													<a href="<?php echo site_url('site/site/detail/'.$related->pid.'/?text='.$related->property_name.'&name=browser')?>">
														<?php
															$extends = pathinfo($imgrelated->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
															{
																$have_img = false;
																$img_path = base_url('assets/upload/noimage.jpg');
																if(file_exists(FCPATH.'assets/upload/property/'.$imgrelated->pid.'_'.$imgrelated->url))
																{
																	$img_path = site_url('assets/upload/property/'.$imgrelated->pid.'_'.$imgrelated->url);
																	$have_img = true;
																}
														?>
															<video style="height: 176px;" class="img-responsive" controls>
															  	<source src="<?php echo $img_path;?>">
															</video>
														<?php 
															}else{
																$have_img = false;
																$img_path = base_url('assets/upload/noimage.jpg');
																if(file_exists(FCPATH.'assets/upload/property/thumb/'.$imgrelated->pid.'_'.$imgrelated->url))
																{
																	$img_path = site_url('assets/upload/property/thumb/'.$imgrelated->pid.'_'.$imgrelated->url);
																	$have_img = true;
																}
														?>
															<img aly="" class="img-responsive" src="<?php echo $img_path;?>"/>
														<?php 
															}
														?>
														
													</a>
													<span class="property-thumb-info-label" >
													<span class="label price">$<?php echo number_format($related->price) ?></span>
													<span class="label forrent <?php if($related->p_type !=0) echo ""; else echo "hide";?>">
														<?php 
															if($related->p_type == 1)
																echo $this->lang->line('search_sale');
															if($related->p_type == 2)
																echo $this->lang->line('search_rent');
															if($related->p_type == 3)
																echo $this->lang->line('search_sale_rent');	
														?>
													</span>
												</span>
												</div>
												<div class="property-thumb-info-content" style="height: 120px;">
													<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$related->pid.'/?text='.$related->property_name.'&name=browser')?>"><?php echo $related->property_name;?></a></h3>
													<address class="module line-clamp"><?php echo $related->address;?></address>
												</div>
												<div class="amenities clearfix">
													<ul class="pull-left">
														<li><strong><?php echo $this->lang->line('detail_property_area')?>:</strong> <?php if($related->housesize !="") echo $related->housesize; else echo 0;?><sup>m2</sup></li>
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
						<div>
							<div>
							    <form class="form-search form-inline" method="get" action="<?php echo site_url('site/site/search')?>">
							        <div class="input-append">
							        	<select id="id_listing_type" name="available" class="hide">
								            <option value="0">Sale</option>
								        </select>
							            <input type="text" class="search-query" name="q" placeholder="<?php echo $this->lang->line('detail_project_search_placeholder')?>" />
							            <input id="list_type" class="hide" name="list_type" value="lists"/>
							            <select id="order-status" name="order" data-placeholder="Order" class="chosen-select order_bys hide">
											<option value="Desc">Descending</option>
											<option value="Asc">Ascending</option>
										</select>
							            <button type="submit" class="btn btn-primary btn-primarys"><?php echo $this->lang->line('detail_project_search')?></button>
							        </div>
							    </form>
							</div>
						</div>
						
						<aside class="block pgl-bg-light">
							<h3><?php echo $this->lang->line('news_tag')?></h3>
							<ul class="list-inline tagclouds">
								<?php 
									foreach ($tags as $tag) {
										echo '<li style="padding-left:5px;"><a href="'.site_url('site/site/search?available=0&q='.$tag->property_tag.'&list_type=lists&order=Desc').'">'.$tag->property_tag.'</a></li>';
									}
								?>
							</ul>
						</aside>

						<aside class="block pgl-agents pgl-bg-light">
							<h3><?php echo $this->lang->line('detail_property_our_agent')?></h3>
							<div class="owl-carousel pgl-pro-slide pgl-agent-item" data-plugin-options='{"items": false, "pagination": false, "autoHeight": true}'>

								<div class="pgl-agent-item">
									<div class="img-thumbnail-medium">
										<a href="#">
											<!-- <img src="<?php echo site_url('template')?>/images/agents/temp-agent.png" class="img-responsive" alt=""> -->
											<?php 
												$have_img = false;
												$img_path = base_url('assets/upload/noimage.jpg');
												if(file_exists(FCPATH.'assets/upload/adminuser/'.$detail->userid.'.png'))
												{
													$img_path = site_url('assets/upload/adminuser/'.$detail->userid.'.png');
													$have_img = true;
												}
											?>
											<img aly="" class="img-responsive" src="<?php echo $img_path;?>"/>
										</a>
									</div>
									<div class="pgl-agent-info">
										<!-- <small>NO.1</small> -->
										<h4><a href="#"><?php echo $detail->first_name.' '.$detail->last_name?></a></h4>
										<address>
											<!-- <i class="fa fa-map-marker"></i> Office : 1-800-666-8888<br> -->
											<i class="fa fa-phone"></i> : <?php echo $detail->phone;?><br>
											<!-- <i class="fa fa-fax"></i> Fax : 1-800-666-8888<br> -->
											<i class="fa fa-envelope-o"></i>: <?php echo $detail->email;?><br>
											<i><a href="<?php echo site_url('site/site/search?available=0&agent='.$detail->userid.'&list_type=lists&order=Desc')?>"><?php echo $this->lang->line('detail_property_view_all')?></a></i>
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
									<a href="<?php echo site_url('site/site/postproperty')?>" class="current"><?php echo $this->lang->line('home_page_post')?></a>
								</div>
								<div class="col-md-12" style="border-radius: 3px;">
									<a class="current" href="<?php echo site_url('site/site/join')?>"><?php echo $this->lang->line('home_page_join')?></a>
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
													<a href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?text='.$hot->property_name.'&name=browser')?>">
														<?php 
															$img = $this->site->getImage($hot->pid);
														?>
														<?php 
															$extends = pathinfo($img->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
															{
															$have_img = false;
															$img_path = base_url('assets/upload/noimage.jpg');
															if(file_exists(FCPATH.'assets/upload/property/'.$img->pid.'_'.$img->url))
															{
																$img_path = site_url('assets/upload/property/'.$img->pid.'_'.$img->url);
																$have_img = true;
															}	
														?>
															<video style="height: 176px;" class="img-responsive" controls>
															  	<source src="<?php echo $img_path;?>">
															</video>

														<?php 
															}else{
																$have_img = false;
																$img_path = base_url('assets/upload/noimage.jpg');
																if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
																{
																	$img_path = site_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
																	$have_img = true;
																}	
														?>
															<img aly="" class="img-responsive" src="<?php echo $img_path;?>"/>
														<?php
															}
														?>
													</a>
													<span class="property-thumb-info-label">
														<span class="label price">$<?php echo number_format($hot->price) ?></span>
														<span class="label forrent <?php if($hot->p_type !=0) echo ""; else echo "hide";?>">
															<?php 
																if($hot->p_type == 1)
																	echo $this->lang->line('search_sale');
																if($hot->p_type == 2)
																	echo $this->lang->line('search_rent');
																if($hot->p_type == 3)
																	echo $this->lang->line('search_sale_rent');	
															?>
														</span>
														<span class="label price"><?php echo 'P'.$hot->pid; ?></span>
													</span>
												</div>
												<div class="property-thumb-info-content" style="height: 90px;">
													<h3 style="margin-bottom:6px;"> 
														<a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?text='.$hot->property_name.'&name=browser')?>"><?php echo $hot->property_name?></a>
													</h3>
													<address class="module line-clamps"><?php echo $hot->address?></address>
												</div>
												<div class="amenities clearfix" style="height: 40px;">
													<ul class="pull-left">
														<li><strong><?php echo $this->lang->line('detail_property_area')?>:</strong> <?php if($hot->housesize !="") echo $hot->housesize; else echo 0;?><sup>m2</sup></li>
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
					<div class="col-md-12" style="margin-bottom: 30px;">
						<a class="img-link">
							<img class="img-responsive rendom">
						</a>
					</div>
				</div>	
			</div>
			<!-- End content with sidebar -->

			<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title w-100 font-weight-bold">
			        	<img src="<?php echo site_url('assets/img/logo.png')?>" width="100">
			        </h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body mx-3">
			        <form id="contact-form" enctype="multipart/form-data" method="POST" action="">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input placeholder="<?php echo $this->lang->line('detail_property_your_name')?>" type="text" name="name" id="name" class="form-control txt">
								</div>
								<div class="col-sm-6">
									<input placeholder="<?php echo $this->lang->line('detail_property_your_email')?>" type="email" name="customer_mail" id="customer_mail" class="form-control txt" required>
								</div>
								<div class="col-sm-6">
									<input placeholder="<?php echo $this->lang->line('detail_property_your_phone')?>" type="text" name="phone" id="phone" class="form-control txt" required>
								</div>
								<div class="col-sm-6">
									<select class="form-control txt-sel" name="in-status" required>
										<option value=""><?php echo $this->lang->line('detail_property_mod')?></option>
										<option value="1"><?php echo $this->lang->line('detail_property_mod_phone')?></option>
										<option value="2"><?php echo $this->lang->line('detail_property_mod_email')?></option>
										<option value="3"><?php echo $this->lang->line('detail_property_mod_both')?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<textarea placeholder="<?php echo $this->lang->line('detail_property_comment')?>" rows="5" name="comments" id="comments" class="form-control" style="max-width: 100%;"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="button" value="<?php echo $this->lang->line('detail_property_contact_back')?>" class="btn btn-primary min-wide" data-loading-text="Loading..." style="min-width: 20%;">
						</div>
					</form>

			      </div>
			    </div>
			  </div>
			</div>

			<!-- <div class="text-center">
			  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
			    Modal Login Form</a>
			</div> -->
			<?php 
				$page = "detail";
			?>
		</div>
		<!-- End Main -->

		<?php
			if(isset($_POST['button']))
			{	
				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['customer_mail'];
				$contact = $_POST['in-status'];
				$desc = $_POST['comments'];

				$data = array(
						'pid' => $detail->pid,
						'inter_name' => $name,
						'inter_email' => $email,
						'inter_phone' => $phone,
						'inter_status' => $contact,
						'is_contact' => 1,
						'inter_date' => date('Y-m-d')
				);

				if($contact == 2 || $contact == 3)
				{
					require('phpmailer/class.phpmailer.php');
				    $mail = new PHPMailer();
				    $mail->IsSMTP();
				    $mail->SMTPDebug = 0;
				    $mail->SMTPAuth = TRUE;
				    $mail->SMTPSecure = "ssl";
				    $mail->Port     = 465;
				    $mail->Host     = "smtp.gmail.com";
				    $mail->Mailer   = "smtp";
				    $mail->SetFrom($_POST["customer_mail"], $_POST["name"]);
				    $mail->AddReplyTo($_POST["customer_mail"], $_POST["name"]);
				    $mail->AddAddress("estatecambodia168.dev@gmail.com");
				    $mail->AddCC("vireak.cambodia@gmail.com");
					$mail->AddCC("info@estatecambodia.com");   
				    $mail->Subject = "Interest From Customer";
				    $mail->WordWrap   = 80;


				    $logo = "http://estatecambodia.com/assets/img/logo.png";
				    $description = '<div style="width: 100%"><table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
				        <tbody>
				            <tr>
				                <td style="width:8px" width="8"></td>
				                <td>
				                    <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
				                        <img src="'.$logo.'" style="width: 140px;">
				                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
				                        	Property Info: 
				                        	<ul style="list-style: none; text-align: left;">
	                                            <li>- PropertyID: P'.$detail->pid.'</li>
	                                            <li>- Property Title: '.$detail->property_name.'</li>
	                                            <li>- Price: '.$detail->price.'</li>
	                                            <li>- Location: '.$detail->locationname.'</li>
	                                        </ul>
	                                        Customer Contact Info:
					                        <ul style="list-style: none; text-align: left;">
	                                            <li>- Name: '.$name.'</li>
	                                            <li>- Phone: '.$phone.'</li>
	                                            <li>- Email: '.$email.'</li>
	                                        </ul>
                                        </div>
				                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
				                            '.$_POST["comments"].'
				                        </div>
				                    </div>
				                                            
				                </td>
				                <td style="width:8px" width="8"></td>
				            </tr>
				        </tbody>
				    </table></div>';

				    $mail->MsgHTML($description);

				    $mail->IsHTML(true);

				    if(!$mail->Send()) {
				        echo "<p class='error'>Problem in Sending Mail.</p>";
				    } else {
				    	$this->db->insert('tblinterest',$data);
				        if($this->db->affected_rows() > 0)
							redirect($_SERVER['HTTP_REFERER']);
						else
							echo "<p class='error'>Problem in Save Interest.</p>";
				    }
				}else{
					$this->db->insert('tblinterest',$data);
					if($this->db->affected_rows() > 0)
						redirect($_SERVER['HTTP_REFERER']);
					else
						echo "<p class='error'>Problem in Save Interest.</p>";
				}

			}
		?>

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

    //get device data
    $.getJSON('https://ipapi.co/json/', function(data) {
	  	//console.log(JSON.stringify(data, null, 2));
	  	var url="<?php echo site_url('site/site/saveipaddress')?>";
		$.ajax({
            url:url,
            type:"POST",
            datatype:"Json",
            async:false,
            data:{
            	"ip": data['ip'],
				"city": data['city'],
				"region": data['region'],
				"region_code": data['region_code'],
				"country": data['country'],
				"country_name": data['country_name'],
				"continent_code": data['continent_code'],
				"in_eu": data['in_eu'],
				"postal": data['postal'],
				"latitude": data['latitude'],
				"longitude": data['longitude'],
				"timezone": data['timezone'],
				"utc_offset": data['utc_offset'],
				"country_calling_code": data['country_calling_code'],
				"currency": data['currency'],
				"languages": data['languages'],
				"asn": data['asn'],
				"org": data['org'],
				'pid': '<?php echo $detail->pid?>',
				'view_from': '<?php echo $name_view?>',
            },
            success:function(data) {
            }
          });
	});

    $.ajax({ 
      	type: 'GET', 
      	url:"<?php echo site_url('site/site/getAdvertise/'.$page)?>",
      	dataType: 'json',
      	success: function (data) { 
      		ramdomimage(data);
      		setInterval(function() {
			    ramdomimage(data);
			},5000);
      	}
  	});
  	function ramdomimage(data)
  	{
  		var image = [];
      	$.each(data, function(i, item) {
		    image.push(item.img);
		    $('.img-link').attr("href",item.url);
		});
		var size = image.length;
		var x = Math.floor(size*Math.random());
      	$('.rendom').attr('src',image[x]);
  	}
</script>