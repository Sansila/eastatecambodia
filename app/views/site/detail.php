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
										<img aly="" class="img-responsive <?php echo $hide;?>" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
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
											<li><strong>Post Date:</strong> <?php echo $detail->create_date?></li>
											<li><strong>Type:</strong> <?php echo $detail->typename?></li>
											<li><strong>Area:</strong> <?php if($detail->housesize !="") echo $detail->housesize;else echo 0;?><sup>m2</sup></li>
											<li><address><i class="fa fa-map-marker"></i> <?php if($detail->locationname !="") echo $detail->locationname; else echo ""; echo $detail->address;?></address></li>
											<li class="<?php echo $bedroom?>"><i class="icons icon-bedroom"></i> <?php echo $detail->bedroom;?> Bedrooms</li>
											<li class="<?php echo $bathroom?>"><i class="icons icon-bathroom"></i> <?php echo $detail->bathroom;?> Bathrooms</li>
										</ul>
									</div>
									<div class="col-sm-8">
										<h2><?php echo $detail->property_name;?></h2>
										<?php 
											echo $detail->description;
										?>
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
							<h2>Related Properties</h2>
							<div class="row">
								<div class="owl-carousel pgl-pro-slide" data-plugin-options='{"items": 3, "itemsDesktop": 3, "singleItem": false, "autoPlay": false, "pagination": false}'>
									<?php 
										foreach($this->site->getRelatedProperty($detail->pid,$detail->agent_id) as $related){
									?>
									<div class="col-md-12 animation">
										<div class="pgl-property">
											<div class="property-thumb-info">
												<div class="property-thumb-info-image">
													<a href="<?php echo site_url('site/site/detail/'.$related->pid)?>">
														<?php
															$extends = pathinfo($related->url, PATHINFO_EXTENSION);
															if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
																	{
														?>
															<video style="height: 176px;" class="img-responsive" controls>
															  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$related->pid.'_'.$related->url))) echo base_url('assets/upload/property/'.$related->pid.'_'.$related->url); else echo base_url('assets/upload/noimage.jpg')?>">
															</video>
														<?php 
															}else{
														?>
															<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$related->pid.'_'.$related->url))) echo base_url('assets/upload/property/thumb/'.$related->pid.'_'.$related->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
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
													<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$related->pid)?>"><?php echo $related->property_name;?></a></h3>
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
						<!-- Begin Advanced Search -->
						<!-- <aside class="block pgl-advanced-search pgl-bg-light hide">
							<h3>Advance Search</h3>
							<form name="advancedsearch">
								<div class="form-group">
									<label class="sr-only" for="property-status">Property Status</label>
									<select id="property-status" name="property-status" data-placeholder="Property Status" class="chosen-select">
										<option selected="selected" value="Property Status">Property Status</option>
										<option value="sale">For Sale</option>
										<option value="rent">For Rent</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="location">Location</label>
									<select id="location" name="location" data-placeholder="Location" class="chosen-select">
										<option selected="selected" value="Location">Location</option>
										<option value="United States">United States</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Aland Islands">Aland Islands</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
										<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote D'ivoire">Cote D'ivoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Curacao">Curacao</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-bissau">Guinea-bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										<option value="Korea, Republic of">Korea, Republic of</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libya">Libya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macao">Macao</option>
										<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										<option value="Moldova, Republic of">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Barthelemy">Saint Barthelemy</option>
										<option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Saint Martin (French part)">Saint Martin (French part)</option>
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
										<option value="South Sudan">South Sudan</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syrian Arab Republic">Syrian Arab Republic</option>
										<option value="Taiwan, Province of China">Taiwan, Province of China</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Timor-leste">Timor-leste</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
										<option value="Viet Nam">Viet Nam</option>
										<option value="Virgin Islands, British">Virgin Islands, British</option>
										<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										<option value="Wallis and Futuna">Wallis and Futuna</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="property-types">Property Types</label>
									<select id="property-types" name="property-types" data-placeholder="Property Types" class="chosen-select">
										<option selected="selected" value="Property Types">Property Types</option>
										<option value="residential">Residential</option>
										<option value="commercial">Commercial</option>
										<option value="land">Land</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="area-from">Area From</label>
									<select id="area-from" name="area-from" data-placeholder="Area From" class="chosen-select">
										<option selected="selected" value="Area From">Area From</option>
										<option value="450">450</option>
										<option value="350">350</option>
										<option value="250">250</option>
										<option value="150">150</option>
										<option value="100">100</option>
										<option value="50">50</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="search-bedrooms">Bedrooms</label>
									<select id="search-bedrooms" name="search-bedrooms" data-placeholder="Bedrooms" class="chosen-select">
										<option selected="selected" value="Bedrooms">Bedrooms</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="5plus">5+</option>
									</select>
								</div>
								<div class="form-group">
									<label class="sr-only" for="search-bathrooms">Bathrooms</label>
									<select id="search-bathrooms" name="search-bathrooms" data-placeholder="Bathrooms" class="chosen-select">
										<option selected="selected" value="Bathrooms">Bathrooms</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="4plus">4+</option>
									</select>
								</div>
								<div class="form-group">
									<div class="row pgl-narrow-row">
										<div class="col-xs-6">
											<label class="sr-only" for="search-minprice">Price From</label>
											<select id="search-minprice" name="search-minprice" data-placeholder="Price From" class="chosen-select">
												<option selected="selected" value="Price From">Price From</option>
												<option value="0">$0</option>
												<option value="25000">$25000</option>
												<option value="50000">$50000</option>
												<option value="75000">$75000</option>
												<option value="100000">$100000</option>
												<option value="150000">$150000</option>
												<option value="200000">$200000</option>
												<option value="300000">$300000</option>
												<option value="500000">$500000</option>
												<option value="750000">$750000</option>
												<option value="1000000">$1000000</option>
											</select>
										</div>
										<div class="col-xs-6">
											<label class="sr-only" for="search-maxprice">Price To</label>
											<select id="search-maxprice" name="search-maxprice" data-placeholder="Price To" class="chosen-select">
												<option selected="selected" value="Price To">Price To</option>
												<option value="25000">$25000</option>
												<option value="50000">$50000</option>
												<option value="75000">$75000</option>
												<option value="100000">$100000</option>
												<option value="150000">$150000</option>
												<option value="200000">$200000</option>
												<option value="300000">$300000</option>
												<option value="500000">$500000</option>
												<option value="750000">$750000</option>
												<option value="1000000">$1000000</option>
												<option value="1000000plus">>$1000000</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-block btn-primary">Search</button>
								</div>
								
							</form>
						</aside> -->
						<!-- End Advanced Search -->
						
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
											<i class="fa fa-phone"></i> Mobile : <?php echo $detail->phone;?><br>
											<!-- <i class="fa fa-fax"></i> Fax : 1-800-666-8888<br> -->
											<i class="fa fa-envelope-o"></i> Mail: <?php echo $detail->email;?>
										</address>
									</div>	
								</div>

								<!-- <div class="pgl-agent-item">
									<div class="img-thumbnail-medium">
										<a href="agentprofile.html"><img src="<?php echo site_url('template')?>/images/agents/temp-agent.png" class="img-responsive" alt=""></a>
									</div>
									<div class="pgl-agent-info">
										<small>NO.2.1</small>
										<h4><a href="agentprofile.html">Andrew MCCarthy</a></h4>
										<address>
											<i class="fa fa-map-marker"></i> Office : 1-800-666-8888<br>
											<i class="fa fa-phone"></i> Mobile : 0800-666-6666<br>
											<i class="fa fa-fax"></i> Fax : 1-800-666-8888<br>
											<i class="fa fa-envelope-o"></i> Mail: <a href="mailto:MCCarthy@gmail.com">MCCarthy@gmail.com</a>
										</address>
									</div>	
								</div> -->
								
							</div>
						</aside>
						<!-- End Our Agents -->
						
						<!-- Begin Advanced Search -->
						<aside class="block pgl-bg-dark pgl-testimonials hide">
							<div class="owl-carousel pgl-testimonial" data-plugin-options='{"items": 1, "pagination": false, "autoHeight": true}'>
								<div class="col-md-12">
									<div class="testimonial-author">
										<div class="img-thumbnail-small img-circle">
											<img src="<?php echo site_url('template')?>/images/agents/agent-1.jpg" class="img-circle" alt="Andrew MCCarthy">
										</div>
										<h4>Andrew MCCarthy</h4>
										<p><strong>Selller</strong></p>
									</div>
									<div class="divider-quote-sign"><span>“</span></div>
									<blockquote class="testimonial">
										<p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium totam rem.</p>
									</blockquote>
								</div>
								<div class="col-md-12">
									<div class="testimonial-author">
										<div class="img-thumbnail-small img-circle">
											<img src="<?php echo site_url('template')?>/images/agents/agent-1.jpg" class="img-circle" alt="John Smith">
										</div>
										<h4>John Smith</h4>
										<p><strong>Selller</strong></p>
									</div>
									<div class="divider-quote-sign"><span>“</span></div>
									<blockquote class="testimonial">
										<p>Sed perspiciatis unde omnisiste natus error voluptatem remopa accusantium doloremque laudantium totam rem.</p>
									</blockquote>
								</div>
							</div>
						</aside>
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
              mapTypeId: google.maps.MapTypeId.ROADMAP
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