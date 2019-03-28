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
			$mod = "";
            if(isset($row['mod_position']) && $row['mod_position']=='2'){
				if(base64_decode($m)==$row['moduleid'])
					$classMe='active open';
					if($this->session->userdata('site_lang') == "khmer") 
						$mod = $row['module_namekh']; 
					else 
						$mod = $row['module_name'];
	    			$menu.='<li class="submenu '.$classMe.'">
	    		                <a href="#"><i class="fa fa-flask"></i><span>'.$mod.'</span><i class="arrow fa fa-chevron-right"></i></a>';					
	    					if(count($pages)>0){
	    						if(isset($pages[$row['moduleid']])){
	    							$page_mod=$pages[$row['moduleid']];

	        						if(count($page_mod)>0 && isset($pages[$row['moduleid']])){

	        							$menu.='<ul class="">'; 
	        							foreach($page_mod as $page){
	        								$p = '';
											$classSu='';
											if($this->session->userdata('site_lang') == "khmer")
												$p = $page['page_namekh'];
											else
												$p = $page['page_name'];
	        								if(base64_decode($p)==$page['pageid'])
												$classSu='active';
	                                        $page_link='';
	        								$page_link=$page['link'];
	        								$menu.='<li class="'.$classSu.'">
	        					                        <a href="'.site_url($page_link).'?m='.$row['moduleid'].'&p='.$page['pageid'].'"><i class="fa '.$page['icon'].' fa-fw"></i> '.$p.'</a>
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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/estatecambodiaicon.ico')?> ">
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
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.css') ?>" />
		
		<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.custom.js')?>"></script>					
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>		
		<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/gecom.js')?>"></script>
		<!-- Ck editor-->
		<script src="<?php echo base_url('assets/js/editor/summernote.js')?>"></script>		
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
    	<script type="text/javascript" src="<?php echo base_url('assets/js/zoomable/zoomsl-3.0.min.js') ?>"></script>

		<script src="<?php echo base_url();?>ckeditor/ckeditor.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
		<script src="<?php echo base_url();?>assets/js/fileinput.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
		<script src="<?php echo base_url('assets/js/canvasjs.min.js')?>"></script>
		<script src="<?php echo site_url('assets/amchart')?>/core.js"></script>
	    <script src="<?php echo site_url('assets/amchart')?>/charts.js"></script>
	    <script src="<?php echo site_url('assets/amchart')?>/animated.js"></script>
	</head>	
	
	<body data-color="grey" class="flat">
		<div id="wrapper">
			<div id="header">
				<?php
				$url = "";
					if($roleid == 1)
						$url = site_url('sys/dashboard');
					else
						$url = site_url('greenadmin/home');
				?>
				<h1><a href="<?php echo $url?>">
						<img src="<?php echo site_url('assets/img/logo.png')?>" style="width: 105px;">
					</a></h1>	
				<a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>	
			</div>
		
			<div id="user-nav">
	            <ul class="btn-group">
	            	<li class="btn">
	            		<a href="<?php echo base_url('en'); ?>">
	            			<img src="<?php echo site_url('assets/img/en.png')?>"​ width="13">
	            		</a>
	            	</li> 
	            	<li class="btn">
	            		<a href="<?php echo base_url('kh'); ?>">
	            			<img src="<?php echo site_url('assets/img/kh.png')?>"​ width="13">
	            		</a>
	            	</li>
	                <li class="btn dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-cog fa-fw"></i><span class="text"><?php echo $this->lang->line('setting');?></span>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <?php //if($roleid=='1'){?>
	                        <li><a href="<?php echo site_url("setting/setting/profile")?>"><i class="fa fa-user fa-fw"></i>​​ ​<?php echo $this->lang->line('profile')?></a>
	                        </li>
	                        <li><a href="<?php echo site_url("setting/setting/changepwd")?>"><i class="fa fa-key fa-fw"></i> <?php echo $this->lang->line('ch_pwd')?></a>
	                        </li>
	                        <li class="divider"></li>
	                        <li><a href="<?php echo site_url("setting/setting")?>"><i class="fa fa-gear fa-fw"></i> <?php echo $this->lang->line('setting');?></a>
	                        </li>
	                        <?php //}?>	                        
	                    </ul>
	                    <!-- /.dropdown-user -->
	                </li>	                
	                <li class="btn"><a title="" href="<?php echo site_url("greenadmin/login/logOut") ?>"><i class="fa fa-share"></i> <span class="text"><?php echo $this->lang->line('logout');?></span></a></li>	            </ul>
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
	                <h4 class="visible-lg">Layout Type</h4>
	                <p id="layout-type">
	                	
	                    <a data-option="old" class="button" href="#">Old</a>    
	                    <a data-option="flat" class="button " href="#">Flat</a>                
	                </p>
	            </div>
	            <div id="switcher-button" style="display:none;">
	                <i class="fa fa-cogs"></i>
	            </div>
	        </div>
			<div id="sidebar">	
				<ul>
					<li class="hide">
						<a href="<?php echo site_url("sys/dashboard") ?>">
							<i class="fa fa-home"></i> 
							<span>Dashboard</span>
						</a>
					</li>
					<?php echo $menu ?>
				</ul>			
			</div>			
			<div id="content">		
