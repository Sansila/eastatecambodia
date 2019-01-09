<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from pixelgeeklab.com/html/realestast/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 02:55:25 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="Real estate, Cambodia, Phnom penh, Property, House, Condo, Land, Hotel, Resort, Sale, Rent, Buy" />
	<meta name="description" content="Estate Cambodia provides property listing services for people who are looking to buy, sell or rent the properties such as land, house, condo, commercial unit in Cambodia">
	<meta name="author" content="estatecambodia.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<!-- Style Switcher-->
	<link rel="stylesheet" href="<?php echo site_url('template')?>/style-switcher/css/style-switcher.css">
	<!-- <link href="css/colors/red/style.html" rel="stylesheet" id="layoutstyle"> -->

	<!-- Theme Responsive-->
	<link href="<?php echo site_url('template')?>/css/theme-responsive.css" rel="stylesheet">
	<link href="<?php echo site_url('template')?>/css/main19c7.css" rel="stylesheet">
	<!-- <link href="<?php //echo site_url('template')?>/css/multiple-select.css" rel="stylesheet"> -->
	<!-- <link href="<?php //echo site_url('template')?>/css/normalize.css" rel="stylesheet"> -->
	<!-- <link href="<?php //echo site_url('template')?>/css/stylesheet.css" rel="stylesheet"> -->


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo site_url('template')?>/vendor/jquery.min.js"></script>
	<script src="<?php echo site_url('template')?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/jquery.validate.js')?>"></script>
	<script src="<?php echo base_url();?>ckeditor/ckeditor.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>assets/js/fileinput.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url('assets/js/select2.js')?>"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWZfWaMa42KBMR5apqkTAyDdnAkemyCHY"
  type="text/javascript"></script>
	
</head>
	<body>
		<div id="page">
			<header>
				<div id="top">
					<div class="container">
						<p class="pull-left text-note hidden-xs"><i class="fa fa-phone"></i> Need Support? <?php echo $profile->phone?></p>
						<ul class="nav nav-pills nav-top navbar-right">
							<li><a target="_blank" href="<?php echo site_url('/login')?>"><i class="fa fa-user"></i></a></li>
							<!-- <li><a target="_blank" href="<?php //echo $profile->email?>" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email"><i class="fa fa-envelope-o"></i></a></li> -->
							<li><a target="_blank" href="<?php echo $profile->facebook?>" title="" data-facebook="bottom" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="<?php echo $profile->twitter?>" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a target="_blank" href="<?php echo $profile->google_plus?>" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
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
								<li><a href="<?php echo site_url(); ?>">Home</a></li>
								<?php echo $menu; ?>
							</ul>
						</div><!--/.nav-collapse --> 
					</div><!--/.container-fluid --> 
				</nav>
			</header>
			<?php //echo Date('Y-m-d H:i:s A')?>
