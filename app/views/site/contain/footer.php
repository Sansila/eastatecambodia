		<style type="text/css">
			.custom_menu{
			    padding-top: 10px;
			    padding-bottom: 10px;
			    text-align: center;
			}
			.custom_menu a{
			    display: -webkit-box;
			    -webkit-line-clamp: 1;
			    -webkit-box-orient: vertical;
			    text-align: left;
			}
			.module {
			    margin: 0;
			    overflow: hidden;
			}
		</style>
		<!-- Begin footer -->
		<footer class="pgl-footer">
			<div class="container">
				<div class="pgl-upper-foot">
					<div class="row">
						<div class="col-sm-4">
							<h2>Contact detail</h2>
							<p><?php echo $profile->address?></p>
							<address>
								<i class="fa fa-phone"></i> Mobile : <?php echo $profile->phone?><br>
								<i class="fa fa-envelope-o"></i> Mail: <?php echo $profile->email?><!-- <a href="mailto:pixelgeklab@gmail.com">Pixelgeklab@gmail.com</a> -->
							</address>
						</div>
						<div class="col-sm-2 hide">
							<h2>Useful links</h2>
							<ul class="list-unstyled">
								<li><a href="#">Help and FAQs</a></li>
								<li><a href="#">Home Price</a></li>
								<li><a href="#">Market View</a></li>
								<li><a href="#">Free Credit Report</a></li>
								<li><a href="#">Terms and Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Community Guidelines</a></li>
							</ul>
						</div>
						<div class="col-sm-8">
							<h2>Properties</h2>
							<div class="row">
								<?php 
									$footer = $this->site->get_menu_footer();
									$name = "";
									$url = "";
									foreach ($footer as $key) {
										if($key->parentid == 0)
										{
											$name = 'All';
											$url = site_url('site/site/'.$key->location_name.'/'.$key->menu_id);
										}
										else
										{
											$name = $key->menu_name;
											$url = site_url('site/site/'.$key->location_name.'/'.$key->menu_id.'?type='.$key->menu_id);
										}
								?>
									<div class="col-sm-3 custom_menu"><a class="module" href="<?php echo $url;?>"><?php echo $name;?></a></div>
								<?php
									}
								?>
							</div>
						</div>
						<div class="col-sm-4 hide">
							<h2>Don’t miss out</h2>
							<p>In venenatis neque a eros laoreet eu placerat erat suscipit. Fusce cursus, erat ut scelerisque condimentum, quam odio ultrices leo.</p>
							<form class="form-inline pgl-form-newsletter" role="form">
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter your email here">
								</div>
								<button type="submit" class="btn btn-submit"><i class="icons icon-submit"></i></button>
							</form>
						</div>
					</div>
				</div>
				<div class="pgl-copyrights">
					<p>Copyright © <?php echo Date('Y')?> Estat-Cambodia. Designed by <a href="http://cambodiasoft.com/">CambodiaSoft</a></p>
				</div>
			</div>
		</footer>
		<!-- End footer -->
			
	</div>
	
	<!-- Begin Style Switcher -->
	<div id="style-switcher">
		<div id="toggle_button hide"> <a href="#"><i class="fa fa-pencil"></i></a> </div>
		<div id="style-switcher-menu">
			<h4 class="text-center">Style Switcher</h4>
			<div class="segment">
				<ul class="theme cookie_layout_style level-0" id="bd_value">
					<li> <a style="background: #36c" title="colors/blue/style" href="#"></a> </li>
					<li> <a style="background: #8a745f" title="colors/brown/style" href="#"></a> </li>
					<li> <a style="background: #8bc473" title="colors/green/style" href="#"></a> </li>
					<li> <a style="background: #f9b256" title="colors/orange/style" href="#"></a> </li>
					<li> <a style="background: #4dbfd9" title="colors/cyan/style" href="#"></a> </li>
					<li> <a style="background: #c578c8" title="colors/violet/style" href="#"></a> </li>
				</ul>
			</div>
			<div class="segment">
				<div id="reset"> <a href="#" class="btn btn-sm reset">Reset</a> </div>
			</div>
		</div>
	</div>
	<!-- Begin Style Switcher -->
	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	
	<script src="<?php echo site_url('template')?>/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="<?php echo site_url('template')?>/vendor/flexslider/jquery.flexslider-min.js"></script>
	<script src="<?php echo site_url('template')?>/vendor/chosen/chosen.jquery.min.js"></script>
	<script src="<?php echo site_url('template')?>/vendor/masonry/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo site_url('template')?>/vendor/masonry/masonry.pkgd.min.js"></script>
	
	<!-- Theme Initializer -->
	<script src="<?php echo site_url('template')?>/js/theme.plugins.js"></script>
	<script src="<?php echo site_url('template')?>/js/theme.js"></script>
	<script src="<?php echo site_url('template')?>/js/body19c7.js"></script>
	<!-- <script src="<?php echo site_url('template')?>/js/selectize.js"></script> -->
	<!-- <script src="<?php echo site_url('template')?>/js/index.js"></script> -->
	<script type="text/javascript" src="<?php echo site_url('template')?>/style-switcher/js/switcher.js"></script>
	<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

<!-- Mirrored from pixelgeeklab.com/html/realestast/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 02:56:31 GMT -->
</html>