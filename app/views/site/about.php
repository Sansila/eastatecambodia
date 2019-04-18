
<!-- <section id="home-search-bg" class="home-search hero lazyload" data-sizes="auto" style="background-image: url('<?php //echo site_url('assets/upload/banner/thumb'.'/'.$slide->banner_id.'.png')?>'); padding-top:16rem;     padding-bottom: 8rem; height: auto !important;">
	<div class="overlay"></div>
</section>
 -->
<div role="main" class="main pgl-bg-grey">
	<section class="pgl-intro" style="padding-top: 30px;">
		<div class="container">
			<div class="container">
				<!-- <h2>About US</h2> -->
				<div class="wizard row">
					<div class="col-md-12">
						<!-- <div class="col-md-2">
							<a class="current">About US</a>
						</div> -->
						<div class="col-md-2">
							<a href="<?php echo site_url('site/site/postproperty')?>" class="current"><?php echo $this->lang->line('home_page_post')?></a>
						</div>
						<div class="col-md-2">
							<a class="current" href="<?php echo site_url('site/site/join')?>"><?php echo $this->lang->line('home_page_join')?></a>
						</div>
					</div>
				</div>
				<div class="lead pgl-bg-light">
					<?php echo $desc->content?>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Begin testimonial -->
	<section class="pgl-teams" style="padding-top: 1px; padding-bottom: 0px;">

	</section>
	<!-- End testimonial -->
	
</div>