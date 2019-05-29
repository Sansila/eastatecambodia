<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixelgeeklab.com/html/realestast/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 02:55:25 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Real estate, Cambodia, Phnom penh, Property, House, Condo, Land, Hotel, Resort, Sale, Rent, Buy" />
	<meta name="description" content="Estate Cambodia provides property listing services for people who are looking to buy, sell or rent the properties such as land, house, condo, commercial unit in Cambodia">
	<meta name="author" content="estatecambodia.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		if($sitetype == "property"){
			foreach ($imagelimit as $img) {
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
			<meta property="og:image" content="<?php echo $img_path;?>">
	<?php
				}
			}
	?>
	<meta property="og:url"    		  content="<?php echo site_url('site/site/detail/'.$detail->pid.'/?name='.$detail->property_name)?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $detail->property_name;?>" />
	<meta property="og:description"   content="<?php echo $detail->property_name?>" />
	<?php
		}else if($sitetype == "newsdetail"){
			$have_img = false;
			$img_path = base_url('assets/upload/noimage.jpg');
			if(file_exists(FCPATH.'assets/upload/article/thumb/'.$img->article_id.'_'.$img->url))
			{
				$img_path = site_url('assets/upload/article/thumb/'.$img->article_id.'_'.$img->url);
				$have_img = true;
			}
	?>
		<meta property="og:image" content="<?php echo $img_path;?>">
		<meta property="og:url"    		  content="<?php echo site_url('site/site/newsdetail/'.$row->article_id.'?type='.$type)?>" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="<?php echo $row->article_title;?>" />
		<meta property="og:description"   content="<?php echo $row->article_title?>" />

	<?php
		}
	?>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/estatecambodiaicon.ico')?> ">
	<title>
		<?php 
			if($name !="")
				echo 'Estate Cambodia - '.$name;
			else
				echo 'Estate Cambodia - Real Estate - Phnom Penh - Investment - Property - Land';
		?>
	</title>

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Bootstrap -->
	<link href="<?php echo site_url('template')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libs CSS -->
	<link href="<?php echo site_url('template')?>/css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	
	<link rel="stylesheet" href="<?php echo site_url('template')?>/vendor/owl-carousel/owl.carousel.css" media="screen">
	<link rel="stylesheet" href="<?php echo site_url('template')?>/vendor/owl-carousel/owl.theme.css" media="screen">
	<link rel="stylesheet" href="<?php echo site_url('template')?>/vendor/flexslider/flexslider.css" media="screen">
	<link rel="stylesheet" href="<?php echo site_url('template')?>/vendor/chosen/chosen.css" media="screen">

	<!-- Theme -->
	<link href="<?php echo site_url('template')?>/css/theme-animate.css" rel="stylesheet">
	<link href="<?php echo site_url('template')?>/css/theme-elements.css" rel="stylesheet">
	<link href="<?php echo site_url('template')?>/css/theme-blog.css" rel="stylesheet">
	<link href="<?php echo site_url('template')?>/css/theme.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/gstyle.css') ?>" /> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/js/editor/summernote.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/social.css') ?>" />

	<!-- Style Switcher-->
	<link rel="stylesheet" href="<?php echo site_url('template')?>/style-switcher/css/style-switcher.css">
	<!-- <link href="css/colors/red/style.html" rel="stylesheet" id="layoutstyle"> -->

	<!-- Theme Responsive-->
	<link href="<?php echo site_url('template')?>/css/theme-responsive.css" rel="stylesheet">
	<link href="<?php echo site_url('template')?>/css/main19c7.css" rel="stylesheet">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo site_url('template')?>/vendor/jquery.min.js"></script>
	<script src="<?php echo site_url('template')?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/jquery.validate.js')?>"></script>
	<script src="<?php echo base_url();?>ckeditor/ckeditor.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>assets/js/fileinput.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url('assets/js/select2.js')?>"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWZfWaMa42KBMR5apqkTAyDdnAkemyCHY"
  type="text/javascript"></script>

  <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=316143172374700&autoLogAppEvents=1"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137969756-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137969756-1');
</script>
	
</head>
	<body>
		<div id="page">
			<header>
				<div id="top">
					<div class="container">
						<p class="pull-left text-note hidden-xs"><i class="fa fa-phone"></i> <?php echo $this->lang->line('home_page_support').' : '.$profile->phone?></p>
						<ul class="nav nav-pills nav-top navbar-right">
							<li>
								<a class="hide-from-destop">
									<i class="fa fa-phone"></i>
									<?php 
										//echo substr($profile->phone,0,14);
										$tokens = explode(' | ', $profile->phone);      // split string on :
										array_pop($tokens);                   // get rid of last element
										echo $newString = implode(' | ', $tokens);
									?>
								</a>
							</li>
							<li><a target="_blank" href="<?php echo site_url('/login')?>"><i class="fa fa-user"></i></a></li>
							<!-- <li><a target="_blank" href="<?php //echo $profile->email?>" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email"><i class="fa fa-envelope-o"></i></a></li> -->
							<li>
								<a href="<?php echo base_url('en'); ?>">
									<img src="<?php echo site_url('assets/img/en.png')?>">
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('kh'); ?>">
									<img src="<?php echo site_url('assets/img/kh.png')?>">
								</a>
							</li>
							<!-- <li><a target="_blank" href="<?php echo $profile->google_plus?>" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li> -->
							<li>
								<a>
									<div id="google_translate_element"></div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<nav class="navbar navbar-default pgl-navbar-main" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
							<a class="logo" href="<?php echo site_url();?>"><img src="<?php echo site_url('template');?>/images/logo.png" alt="Flatize"></a> </div>
						
						<div class="navbar-collapse collapse width">
							<ul class="nav navbar-nav pull-right">
								<li><a href="<?php echo site_url(); ?>">
									<?php 
										if($this->session->userdata('site_lang')=="khmer")
											echo "ទំព័រដើម";
										else
											echo "Home";
									?>
								</a></li>
								<?php echo $menu; ?>
							</ul>
						</div><!--/.nav-collapse --> 
					</div><!--/.container-fluid --> 
				</nav>
			</header>
			<?php //echo Date('Y-m-d H:i:s A')?>
