<!-- Begin Main -->
	<div role="main" class="main pgl-bg-grey">

		<!-- Begin content with sidebar -->
		<div class="container">
			<div class="row">
				<div class="col-md-9 content">
					<div class="blog-posts">
						<div class="row">

							<?php 
								foreach ($lists as $news) {
									$img = $this->site->getImageForNews($news->article_id);
									$source = $news->article_date;
    								$date = new DateTime($source);
							?>

							<div class="col-sm-6">
								<article class="post post-mid">
									<div class="post-image">
										<a href="<?php echo site_url('site/site/newsdetail/'.$news->article_id)?>"><img class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url))) echo base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>" alt="Blog"></a>
										<span class="post-date">
											<span class="day"><?php echo $date->format('d');?></span>
											<span class="month-year"><?php echo $date->format('M Y')?></span>
										</span>
									</div>
									<div class="post-body">
										
										<div class="post-content">
											<h3 class="module line-clamp1" style="font-size: 1.542em; margin-bottom: -5px;"><a href="<?php echo site_url('site/site/newsdetail/'.$news->article_id)?>"><?php echo $news->article_title;?></a></h3>
											<div class="module line-clamp6 my-content">
												<?php echo $news->content;?>
											</div>
											<a class="btn btn-default btn-sm" href="<?php echo site_url('site/site/newsdetail/'.$news->article_id)?>">Read more</a>
										</div>
									</div>
									
								</article>
							</div>

							<?php 
								}
							?>
						</div>	
						
						<?php 
							echo $this->pagination->create_links();
						?>
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
					
					<aside class="block tabs pgl-bg-light">
						<ul class="nav nav-tabs second-tabs">
							<li class="active"><a href="#popularPosts" data-toggle="tab"><i class="icon icon-star"></i> Popular</a></li>
							<li><a href="#latestComments" data-toggle="tab">Comments</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="popularPosts">
								<ul class="list-unstyled simple-post-list">
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-7.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Proin rutrum nisi eu ante mattis sit amet</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-6.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Sed non mauris vitae erat consequat</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-5.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Nullam ac urna eu felis dapibus</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-4.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Class aptent taciti sociosqu ad litora</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-3.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Ac urna eu felis condimentum</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
								</ul>
							</div>
							
							<div class="tab-pane" id="latestComments">
								<ul class="list-unstyled simple-post-list">
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-1.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Sed non mauris vitae erat consequat</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 213 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-2.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Proin rutrum nisi eu ante mattis sit amet</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 117 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-3.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Nullam ac urna eu felis dapibus</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 19 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-4.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Class aptent taciti sociosqu ad litora</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
									<li>
										<div class="post-image">
											<a href="blog-single.html"><img class="img-responsive" src="<?php echo site_url('template')?>/images/blog/demo-thumb-3.jpg" alt="Blog"></a>
										</div>
										<div class="post-info">
											<a href="blog-single.html">Ac urna eu felis condimentum</a>
											<div class="post-meta">
												<i class="fa fa-eye"></i> 113 views
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</aside>

					<!-- Begin Posts By Category -->
					<aside class="block pgl-cat pgl-bg-light">
						<h3>Posts By Category</h3>
						<ul class="list-unstyled list-cat">
							<li><a href="#">Single Family </a> <span>(39)  </span></li>
							<li><a href="#">Apartment  </a> <span>(15)  </span></li>
							<li><a href="#">Condo </a> <span>(27)  </span></li>
							<li><a href="#">Multi Family </a> <span>(23)  </span></li>
							<li><a href="#">Villa </a> <span>(18)  </span></li>
							<li><a href="#">Other  </a> <span>(21)  </span></li>
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
	$('.my-content').find('img').addClass('hide');
</script>