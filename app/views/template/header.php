<!doctype html>
 <html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>855solution</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/images/logo.ico')?> ">
        <link rel="stylesheet" href="<?=base_url().'assets/css/bootstrap.min.css'?>">
       <!--          <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css"> -->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="<?=base_url().'assets/css/plugins.css'?>" />
        <link rel="stylesheet" href="<?=base_url().'assets/css/roboto-webfont.css'?>" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="<?=base_url().'assets/css/style/css/style.css'?>">
        <link rel="stylesheet" href="<?=base_url().'assets/css/style/style.css'?>">
        <link rel="stylesheet" href="<?=base_url().'assets/css/style/mystyle.css'?>">
       <!-- <link rel="stylesheet" href="<?= base_url().'assets/css/meat_css/style.css'?>">  -->
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="<?=base_url().'assets/css/responsive.css'?>" />
        <link rel="stylesheet" href="<?=base_url().'assets/css/font-awesomes.min.css'?>" />
        <!-- <link rel="stylesheet" href="<?=base_url().'assets/css/font-awesomess.min.css'?>" /> -->
        <script src="<?=base_url().'assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'?>"></script>
    </head>
    <body>
       <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
                <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!-- Sections -->
        <section id="social" class="social" style="background: #6c9b2a;">
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="social-wrapper">
                        <div class="col-md-6">
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="social-contact">
                                <a href="#"><i class="fa fa-phone"></i>(+855)10 871 787 / 96 446 4486</a>
                                <a href="#"><i class="fa fa-envelope"></i>info@855solution.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>
        <!-- Log -->
               <!--  <div class="row" align="center-content">
                <div class="col-sm-12" align="center">
                     <a class="" href="#"><img src="assets/images/logo.png" alt="Logo" /></a> 
                     <h2 class="hidden-xs" style="font-family: 'Lora-Regular' ">855.SOLUTION</h2>
                     <span class="hidden-xs" style="color: #6e9e2b;">{ A smarter solution for your system }</span>
                </div>  
                </div> -->
                <!-- end logo -->
        <nav class="navbar navbar-default" >
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url();?>"><img src="<?=base_url().'assets/images/logo.png'?>" alt="Logo" /></a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?=base_url();?>" >Home</a></li>
                           <?php
                                $menu = $this->db->query("SELECT * FROM tblmenus WHERE parentid=0 AND is_active=1 ORDER BY tblmenus.order ASC")->result();
                                $sl = "";
                                $i = 0;
                                foreach ($menu as $men) {
                                    $men_name = $men->menu_name;
                                    // if($site_lang == 'khmer') {
                                    //     $men_name = $men->menu_name_kh;
                                    // }
                                    $count=$this->db->query("SELECT count(*) as count FROM tblmenus WHERE parentid='".$men->menu_id."' AND is_active='1'")->row()->count;

                                        if($count>0){
                                            echo "<li ><a href='#'>$men_name</a>";
                                           // $this->green->getsubcate($men->menu_id,$site_lang);
                                        }else{ 
                                            $href = site_url('');
                                                
                                            if($men->menu_type == 10) {
                                                // $href = site_url('site/videoall/'.$men->menu_id.'/'.$men->article_id.'/'.$men->menu_type);requestquote
                                                $href = site_url('site/allcustomer/');
                                            }else if($men->menu_type == 9) {
                                                $href = site_url('site/allservice/');
                                            }else if($men->menu_type == 3) {
                                                $href = site_url('site/requestquote/');
                                            }else if($men->menu_type == 4) {
                                                $href = site_url('site/contactus/');
                                            }else if($men->menu_type == 6) {
                                                $href = site_url('site/allproduct/');
                                            }else if($men->menu_type == 7) {
                                                $href = site_url('site/aboutus/');
                                            }else if($men->menu_type == 11) {
                                                $href = site_url('site/templates/');
                                            }

                                            echo "<li class=''><a class='' href='".$href."'>$men_name</a>";
                                        }
                                        echo "</li>";
                                        $i++;
                                    }
                                ?>

                      
                    </ul>
        
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>































       