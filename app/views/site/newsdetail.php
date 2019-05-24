<style type="text/css">
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
</style>
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
											<a href="<?php echo site_url('site/site/newsdetail/'.$row->article_id.'?type='.$type)?>" style="line-height: 1.5;">
												<?php echo $row->article_title;?>	
											</a>
										</h3>
										<div class="tab-detail">
										<div class="right" style="text-align: right;">
											<a class="fass fa fa-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo site_url('site/site/newsdetail/'.$row->article_id.'/?type='.$type.'&name=facebook')?>"
	  										target="_blank" >
											</a>
											<a href="https://api.whatsapp.com://send?text=<?php echo site_url('site/site/newsdetail/'.$row->article_id.'/?type='.$type.'&name=whatsapp')?>" data-action="share/whatsapp/share" target="_blank" class="fass fa fa-whatsapp destop">
												<img src="<?php echo site_url('assets/img/icons/whatsapp.png')?>">
											</a>
											<a class="fass fa fa-whatsapp mobile" href="whatsapp://send?text=<?php echo site_url('site/site/newsdetail/'.$row->article_id.'/?type='.$type.'&name=whatsapp')?>" data-action="share/whatsapp/share">
												<img src="<?php echo site_url('assets/img/icons/whatsapp.png')?>">
											</a>
											<a target="_blank" href="https://telegram.me/share/url?url=<?php echo site_url('site/site/newsdetail/'.$row->article_id.'/?type='.$type.'&name=telegram')?>" class="fass fa fa-paper-plane"></a>
											<a target="_blank" href="https://social-plugins.line.me/lineit/share?url=<?php echo site_url('site/site/newsdetail/'.$row->article_id.'/?type='.$type.'&name=line')?>" class="fas fa-line">
												<img src="<?php echo site_url('assets/img/line.png')?>">
											</a>
										</div>
									</div>
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
					<form class="form-inline form-search" class="form-inline" role="form" action="<?php echo site_url('site/site/searcharticle/'.$type.'?type='.$type)?>" method="post">
						<div class="form-group">
							<label class="sr-only" for="txtsearcharticle"><?php echo $this->lang->line('news_search')?></label>
							<input type="text" class="form-control" id="txtsearcharticle" name="txtsearcharticle" placeholder="Looking for something">
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
												<a href="<?php echo site_url('site/site/newsdetail/'.$pop->article_id.'?type='.$type)?>">
													<img class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url))) echo base_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>" alt="Blog">
												</a>
											</div>
											<div class="post-info">
												<a href="<?php echo site_url('site/site/newsdetail/'.$pop->article_id.'?type='.$type)?>" class="module line-clamp">
													<?php
														echo $pop->article_title;
													?>	
												</a>
												<div class="post-meta">
													<?php 
														$hit = 0;
														if($pop->hit !="")
															$hit = $pop->hit;
													?>
													<i class="fa fa-eye"></i> <?php echo $hit.' '.$this->lang->line('news_view');?>
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
				<aside class="block pgl-cat pgl-bg-light hide">
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

				<aside class="block pgl-bg-light hide">
					<h3>Tags</h3>
					<ul class="list-inline tagclouds">
						<?php 
							foreach ($tags as $tag) {
								echo '<li style="padding-left:5px;"><a href="'.site_url('site/site/search?available=0&q='.$tag->property_tag.'&list_type=lists&order=Desc').'">'.$tag->property_tag.'</a></li>';
							}
						?>
					</ul>
				</aside>

			</div>

		</div>

		<!-- <ul class="post-action">
			<li class="btn-pre"><a href="#">Riff Raff Eats Fried Okra With Oprah on 'Dolce &amp; Gabbana’</a></li>
			<li class="btn-next"><a href="#">Watch Drunk Riff Raff Freestyle About Failed Hoop Dreams for 10 Minutes</a></li>
		</ul> -->
		<div class="row">
			<div class="col-md-12" style="margin-bottom: 30px;">
				<a class="img-link">
					<img class="img-responsive rendom">
				</a>
			</div>
		</div>	

	</div>
	<!-- End content with sidebar -->
	
</div>
<!-- End Main -->

<?php 
	$page = "newsdetail";
?>

<script type="text/javascript">
	$('.my-content-detail').find('img').css({'max-width':'100%','height':'auto'});

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