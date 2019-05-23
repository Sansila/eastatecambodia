<!-- Begin Main -->
<div role="main" class="main pgl-bg-grey">
	<!-- Begin content with sidebar -->
	<div class="container">
		<div class="row">
			<div class="col-md-9 content">
				<div class="blog-posts">
					<article class="post post-large post-single">
						<div class="post-body" style="height: auto;">
							<div class="post-content" style="padding-left: 0px;">
								<div class="row">
									<div class="col-md-2">
										<div class="post-date" style="position: relative; left: 0px; top: 0px;">
											<?php
												$source = $row->article_date;
			    								$date = new DateTime($source);
											?>
											<span class="day"><?php echo $date->format('d');?></span>
											<span class="month-year"><?php echo $date->format('M Y')?></span>
										</div>
									</div>
									<div class="col-md-10">
										<h3 style="font-size: 1.542em;">
											<a href="<?php echo site_url('site/site/newsdetail/'.$row->article_id)?>" style="line-height: 1.5;">
												<?php echo $row->article_title;?>	
											</a>
										</h3>
									</div>
								</div>
								<div class="post-meta"></div>
								<div class="my-content-detail">
									<?php echo $row->content;?>
								</div>
							</div>
						</div>
						
					</article>
					
				</div>
			</div>
			<div class="col-md-3 sidebar">
				<aside class="block pgl-bg-light blk-search">
					<form class="form-inline form-search" class="form-inline" role="form">
						<div class="form-group">
							<label class="sr-only" for="textsearch2">Looking for something</label>
							<input type="text" class="form-control" id="textsearch2" placeholder="Looking for something">
						</div>
						<button type="submit" class="btn"><i class="fa fa-search"></i></button>
					</form>
				</aside>
				
				<aside class="block tabs pgl-bg-light <?php if(count($populars) > 0) echo ""; else echo "hide";?>">
					<ul class="nav nav-tabs second-tabs">
						<li class="active">
							<a href="#popularPosts" data-toggle="tab"><i class="icon icon-star"></i> Popular
							</a>
						</li>
						<!-- <li><a href="#latestComments" data-toggle="tab">Comments</a></li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="popularPosts">
							<ul class="list-unstyled simple-post-list">
								<?php 
										foreach ($populars as $pop) {
											$img = $this->site->getImageForNews($pop->article_id);
									?>
										<li>
											<div class="post-image">
												<a href="<?php echo site_url('site/site/newsdetail/'.$pop->article_id)?>">
													<img class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url))) echo base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>" alt="Blog">
												</a>
											</div>
											<div class="post-info">
												<a href="<?php echo site_url('site/site/newsdetail/'.$pop->article_id)?>" class="module line-clamp">
													<?php
														echo $pop->article_title;
													?>	
												</a>
												<div class="post-meta">
													<i class="fa fa-eye"></i> <?php echo $pop->hit;?> views
												</div>
											</div>
										</li>
									<?php
										}
									?>
							</ul>
						</div>
						
					</div>
				</aside>

				<!-- Begin Posts By Category -->
				<aside class="block pgl-cat pgl-bg-light">
					<h3>Posts By Category</h3>
					<ul class="list-unstyled list-cat">
						<?php 
							foreach ($cates as $cate) {
								if($this->session->userdata('site_lang')=="khmer")
                				{
									echo '<li><a href="'.site_url('site/site/properties/'.$cate->menu.'?type='.$cate->menu).'">'.$cate->typenamekh.'  </a> <span>('.$cate->tcategory.')  </span></li>';
								}else{
									echo '<li><a href="'.site_url('site/site/properties/'.$cate->menu.'?type='.$cate->menu).'">'.$cate->typename.'  </a> <span>('.$cate->tcategory.')  </span></li>';
								}
							}
						?>
					</ul>
				</aside>
				<!-- End Posts By Category -->

				<aside class="block pgl-bg-light">
					<h3>Tags</h3>
					<ul class="list-inline tagclouds">
						<li><a href="#">Image</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">Gallery</a></li>
						<li><a href="#">Post Formats</a></li>
						<li><a href="#">Typography</a></li>
						<li><a href="#">WooCommerce</a></li>
						<li><a href="#">Shortcodes</a></li>
						<li><a href="#">Best Sellers</a></li>
						<li><a href="#">Slideshow</a></li>
					</ul>
				</aside>
			</div>
		</div>	
	</div>
	<!-- End content with sidebar -->
	
</div>
<!-- End Main -->

<script type="text/javascript">
	$('.my-content-detail').find('img').css({'max-width':'100%','height':'auto'});
</script>