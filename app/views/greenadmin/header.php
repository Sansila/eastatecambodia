<?php     
	date_default_timezone_set('Asia/Phnom_Penh');
	$this->db->query('SET SQL_BIG_SELECTS=1');
	// echo date('Y-m-d H:i:s');
	$user_name=$this->session->userdata('user_name');	
	if($user_name==""){
		$this->green->goToPage(site_url('greenadmin/login'));		
	}    
	#====== get menu ============
	//print_r($this->session->userdata('moduleids'));
	$menu="";
	$roleid=$this->session->userdata('roleid');    
	$modules=$this->session->userdata('ModuleInfors');	
	
	$pages=$this->session->userdata('PageInfors');

    $year=$this->session->userdata('year');
    $schoolid=$this->session->userdata('schoolid');

    if(isset($_REQUEST['yearid']) && $_REQUEST['yearid']!=""){
        $year=$_REQUEST['yearid'];
    }elseif(isset($_REQUEST['y']) && $_REQUEST['y']!=""){
        $year=$_REQUEST['y'];
    }elseif(isset($_REQUEST['year']) && $_REQUEST['year']!=""){
        $year=$_REQUEST['year'];
    }
    $this->green->setActiveUser($this->session->userdata('userid'));
    $this->green->setActiveRole($roleid);
    $m='';
    $p='';
    if(isset($_GET['m'])){
    	$m=$_GET['m'];
        $this->green->setActiveModule($_GET['m']);
    }
    if(isset($_GET['p'])){
    	$p=$_GET['p'];
        $this->green->setActivePage($_GET['p']); 
    }          
   
    if(count($modules)>0){

		foreach ($modules as $row) {
			$classMe='';
            if(isset($row['mod_position']) && $row['mod_position']=='2'){
				if(base64_decode($m)==$row['moduleid'])
					$classMe='active open';
	    			$menu.='<li class="submenu '.$classMe.'">
	    		                <a href="#"><i class="fa fa-flask"></i><span>'.$row['module_name'].'</span><i class="arrow fa fa-chevron-right"></i></a>';					
	    					if(count($pages)>0){

	    						if(isset($pages[$row['moduleid']])){
	    							$page_mod=$pages[$row['moduleid']];

	        						if(count($page_mod)>0 && isset($pages[$row['moduleid']])){

	        							$menu.='<ul class="">'; 
	        							foreach($page_mod as $page){

											$classSu='';
	        								if(base64_decode($p)==$page['pageid'])
												$classSu='active';
	                                        $page_link='';
	        								$page_link=$page['link'];
	        								$menu.='<li class="'.$classSu.'">
	        					                        <a href="'.site_url($page_link).'?m='.$row['moduleid'].'&p='.$page['pageid'].'"><i class="fa '.$page['icon'].' fa-fw"></i> '.$page['page_name'].'</a>
	        					                    </li>';
	        							}
	        							$menu.='</ul>';							
	        						}
	                            }   
	    						
	    					}	
	    										
	    	                
	    			$menu.='</li>';
			}		
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/images/settings.png')?> ">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fullcalendar.css') ?>" />
		<!-- <link rel="stylesheet" href="<?php echo base_url('assets/site/css/tripsfonts.css') ?>" /> -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.gritter.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.jscrollpane.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css') ?>" />
		<!--<link rel="stylesheet" href="<?php /*echo base_url('assets/css/ge-com.css') */?>" />-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/gstyle.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/icheck/flat/blue.css') ?>" />

		<!-- Ck editor-->
		<link rel="stylesheet" href="<?php echo base_url('assets/js/editor/summernote.css') ?>" />
		<!-- Notification -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/toastr/toastr.css') ?>" />
		
		<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
		<!-- <link href="<?php echo base_url('assets/css/bootstrap-timepicker.css') ?>" rel="stylesheet"> -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.css') ?>" />
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/> -->


		
		<!--[if lt IE 9]>

		<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js') ;?>"></script>
		<![endif]-->
		
		<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.custom.js')?>"></script>					
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>		
		<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/gecom.js')?>"></script>	

		<!-- Ck editor-->
		<script src="<?php echo base_url('assets/js/editor/summernote.js')?>"></script>				

		<!--<script src="<?php echo base_url('assets/js/jquery.icheck.min.js')?>"></script>-->
		<script src="<?php echo base_url('assets/js/select2.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.validate.js')?>"></script>
		<script src="<?php echo base_url('assets/js/form_validation.js')?>"></script>

		<script src="<?php echo base_url('assets/js/jquery.wizard.js')?>"></script>
		<script src="<?php echo base_url('assets/js/wizard.js')?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bootbox.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.gritter.min.js')?>"></script>
		
		<script src="<?php echo base_url('assets/js/jui.js')?>"></script>
		<script src="<?php echo base_url('assets/js/tables.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>				
		<script src="<?php echo base_url('assets/js/form_common.js')?>"></script>	

		<!-- Notification -->
		<script src="<?php echo base_url('assets/js/toastr/glimpse.js')?>"></script>
		<script src="<?php echo base_url('assets/js/toastr/glimpse.toastr.js')?>"></script>
		<script src="<?php echo base_url('assets/js/toastr/toastr.js')?>"></script>
		<!-- Parsley Form Validation -->
		<script src="<?php echo base_url('assets/js/parsley.min.js')?>"></script> 
		<!-- jqprint -->
   	 	<script src="<?php echo base_url('assets/js/jquery.PrintArea.js')?>"></script>  
    	<script src="<?php echo base_url('assets/js/gScript.js')?>"></script>
    	<!-- <script src="<?php echo base_url('assets/js/bootstrap-timepicker.js')?>"></script> -->
    	<script type="text/javascript" src="<?php echo base_url('assets/js/zoomable/zoomsl-3.0.min.js') ?>"></script>
    	<!-- -----------------upload---------- -->
    	<!-- <link href="<?php echo base_url('assets/js/upload/jquery.filer.css') ?>" type="text/css" rel="stylesheet" /> -->
		<!-- <link href="<?php echo base_url('assets/js/upload/themes/jquery.filer-dragdropbox-theme.css') ?>" type="text/css" rel="stylesheet" /> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/upload/jquery.filer.js') ?>"></script> -->
		<!-- =====================export pdf=========== -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/jspdf.js') ?>"></script> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/FileSaver.js') ?>"></script> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/pdf/from_html.js') ?>"></script> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/pdf/standard_fonts_metrics.js') ?>"></script> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/pdf/split_text_to_size.js') ?>"></script> -->

		<!-- ========================================Number slep================== -->
		<!-- <link href="<?php echo base_url('assets/js/number_slep/jquery.stepper.min.css') ?>" type="text/css" rel="stylesheet" /> -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/number_slep/jquery.stepper.js') ?>"></script> -->
		<!-- =============loding========== -->
		<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/loading/loading.js') ?>"></script> -->
		<script src="<?php echo base_url();?>ckeditor/ckeditor.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
		<script src="<?php echo base_url();?>assets/js/fileinput.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
		<!-- <script src="<?php echo base_url();?>assets/js/js_star/star-rating.js" type="text/javascript"></script> -->
	</head>	
	<body data-color="grey" class="flat">
		<div id="wrapper">
			<div id="header">
				<h1><a href="<?php echo base_url('/sys/dashboard'); ?>">Dashboard</a></h1>	
				<a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>	
			</div>
		
			<div id="user-nav">
	            <ul class="btn-group">	                
	            	<li class="btn"><a href="<?php echo base_url(); ?>" target="_blank"><i class="fa fa-home"></i></a></li>
	                <li class="btn dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-cog fa-fw"></i><span class="text">Settings</span>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <?php //if($roleid=='1'){?>
	                        <li><a href="<?php echo site_url("setting/setting/profile")?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
	                        </li>
	                        <li><a href="<?php echo site_url("setting/setting/changepwd")?>"><i class="fa fa-key fa-fw"></i> Change Password</a>
	                        </li>
	                        <li class="divider"></li>
	                        <li><a href="<?php echo site_url("setting/setting")?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
	                        </li>
	                        <?php //}?>	                        
	                    </ul>
	                    <!-- /.dropdown-user -->
	                </li>

	                <li class="btn dropdown hide" id="menu-messages">
	                	<a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle">
	                		<i class="fa fa-envelope"></i> <span class="text">Messages</span> 
	                		<span class="label label-danger">5</span> <b class="caret"></b>
	                	</a>
	                    <ul class="dropdown-menu messages-menu">
	                        <li class="title">
	                        	<i class="fa fa-envelope-alt"></i>Messages<a class="title-btn" href="#" title="Write new message"><i class="fa fa-share"></i></a></li>
	                        <li class="message-item">
	                        	<a href="#">
		                            <!-- <img alt="User Icon" src="img/demo/av1.jpg" /> -->
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                        <li class="message-item">
								<a href="#">
		                            <!-- <img alt="User Icon" src="img/demo/av1.jpg" /> -->
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                        <li class="message-item">
								<a href="#">
		                            <!-- <img alt="User Icon" src="img/demo/av1.jpg" /> -->
		                            <div class="message-content">
		                            	<span class="message-time">
			                                3 mins ago
			                            </span>
		                                <span class="message-sender">
		                                    Nunc Cenenatis
		                                </span>
		                                <span class="message">
		                                    Hi, can you meet me at the office tomorrow morning?
		                                </span>
		                            </div>
	                        	</a>
	                        </li>
	                    </ul>
	                </li>	                
	                <li class="btn"><a title="" href="<?php echo site_url("greenadmin/login/logOut") ?>"><i class="fa fa-share"></i> <span class="text">Logout</span></a></li>
	            </ul>
	        </div>
	       
	       <div id="switcher">
	            <div id="switcher-inner">
	                <h3>Theme Options</h3>
	                <h4>Colors</h4>
	                <p id="color-style">
	                    <a data-color="orange" title="Orange" class="button-square orange-switcher" href="#"></a>
	                    <a data-color="turquoise" title="Turquoise" class="button-square turquoise-switcher" href="#"></a>
	                    <a data-color="blue" title="Blue" class="button-square blue-switcher" href="#"></a>
	                    <a data-color="green" title="Green" class="button-square green-switcher" href="#"></a>
	                    <a data-color="red" title="Red" class="button-square red-switcher" href="#"></a>
	                    <a data-color="purple" title="Purple" class="button-square purple-switcher" href="#"></a>
	                    <a href="#" data-color="grey" title="Grey" class="button-square grey-switcher"></a>
	                </p>
	                <!--
	                <h4>Background Patterns</h4>
	                <h5>for boxed version</h5>
	                <p id="pattern-switch">
	                    <a data-pattern="pattern1" style="background-image:url('assets/img/patterns/pattern1.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern2" style="background-image:url('assets/img/patterns/pattern2.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern3" style="background-image:url('assets/img/patterns/pattern3.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern4" style="background-image:url('assets/img/patterns/pattern4.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern5" style="background-image:url('assets/img/patterns/pattern5.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern6" style="background-image:url('assets/img/patterns/pattern6.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern7" style="background-image:url('assets/img/patterns/pattern7.png');" class="button-square" href="#"></a>
	                    <a data-pattern="pattern8" style="background-image:url('assets/img/patterns/pattern8.png');" class="button-square" href="#"></a>
	                </p>-->
	                <h4 class="visible-lg">Layout Type</h4>
	                <p id="layout-type">
	                	
	                    <a data-option="old" class="button" href="#">Old</a>    
	                    <a data-option="flat" class="button " href="#">Flat</a>                
	                </p>
	            </div>
	            <div id="switcher-button">
	                <i class="fa fa-cogs"></i>
	            </div>
	        </div>

			<div id="sidebar">
				<div id="search">
					<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
				</div>	
				<ul>
					<li class="submenu"><a href="<?php echo site_url("sys/dashboard") ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
					<li class=""><a href="<?php echo site_url("site-profile") ?>"><i class="fa fa-cog"></i> <span>Site Profile</span></a></li>
					<?php echo $menu ?>
				</ul>			
			</div>			
			<div id="content">

				

				
				
					
				
			
