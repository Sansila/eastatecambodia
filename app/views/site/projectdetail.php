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
			.left{
				float: left;
				font-size: 12px;
				height: 35px;
    			border-radius: 3px;
    			background-color: #d84949 !important;
    			border-color: #d84949;
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
		</style>

		<!-- Begin Main -->
		<div role="main" class="main pgl-bg-grey">
			<!-- Begin page top -->
			<section class="page-top hide">
				<div class="container">
					<div class="page-top-in">
						<h2><span>Project Detail</span></h2>
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
								<ul class="slides" >
									<!-- <li class="flex-active-slide">
										<img aly="" class="img-responsive pixelated " src="http://localhost:81/eastatecambodia/assets/upload/property/thumb/28_ancient-70996_640.jpg" draggable="false">
									</li> -->
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
										<img aly="" class="img-responsive pixelated <?php echo $hide;?>" src="<?php if(@ file_get_contents(base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url))) echo base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
									</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides" >
									<!-- <li class="flex-active-slide">
										<img aly="" class="img-responsive" src="http://localhost:81/eastatecambodia/assets/upload/property/thumb/28_ancient-70996_640.jpg" draggable="false">
									</li> -->
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
										<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url))) echo base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
									</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div class="pgl-detail">
								<div class="row">
									<div class="col-sm-12">
										<h2 style="font-size: 1.5em"><?php echo $detail->project_name;?></h2>
										<?php 
											echo $detail->remark;
										?>
									</div>
								</div>
							</div>
						</section>
						
						<!-- Begin Related properties -->
						<section class="pgl-properties">
							<h2 style="font-size: 1.571em;"><?php echo $this->lang->line('detail_project_relative_property')?></h2>
							<div class="row">
								<div class="owl-carousel pgl-pro-slide owl-theme owl-carousel-init" data-plugin-options='{"items": 3, "itemsDesktop": 3, "singleItem": false, "autoPlay": false, "pagination": false}'>
									<?php 
										foreach($project as $related){
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
						</div>
						</section>
						<!-- End Related properties -->
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
						<aside class="block pgl-agents pgl-bg-light">
							<h3><?php echo $this->lang->line('detail_project_contact')?></h3>
							<div style="display: block; opacity: 1;">

								<div class="owl-wrapper-outer autoHeight">
									<div class="owl-wrapper">
										<div class="owl-item">
											<div class="pgl-agent-item">
												<div class="pgl-agent-info">
													<address>
														<i class="fa fa-phone"></i> : <?php echo $detail->phone;?><br>
														<i class="fa fa-envelope-o"></i>: <?php echo $detail->email?><br>
														<i class="fa fa-globe"></i>: <a target="_blank" href="<?php echo $detail->website?>"><?php echo $detail->website?></a>
													</address>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</aside>
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
					</div>
				</div>
			</div>
		</div>
		<!-- End Main -->
<script type="text/javascript">
    //get device data
 //    $.getJSON('https://ipapi.co/json/', function(data) {
	//   	//console.log(JSON.stringify(data, null, 2));
	//   	var url="<?php echo site_url('site/site/saveipaddress')?>";
	// 	$.ajax({
 //            url:url,
 //            type:"POST",
 //            datatype:"Json",
 //            async:false,
 //            data:{
 //            	"ip": data['ip'],
	// 			"city": data['city'],
	// 			"region": data['region'],
	// 			"region_code": data['region_code'],
	// 			"country": data['country'],
	// 			"country_name": data['country_name'],
	// 			"continent_code": data['continent_code'],
	// 			"in_eu": data['in_eu'],
	// 			"postal": data['postal'],
	// 			"latitude": data['latitude'],
	// 			"longitude": data['longitude'],
	// 			"timezone": data['timezone'],
	// 			"utc_offset": data['utc_offset'],
	// 			"country_calling_code": data['country_calling_code'],
	// 			"currency": data['currency'],
	// 			"languages": data['languages'],
	// 			"asn": data['asn'],
	// 			"org": data['org'],
	// 			'pid': <?php echo $detail->pid?>
 //            },
 //            success:function(data) {
 //            }
 //          });
	// });
</script>