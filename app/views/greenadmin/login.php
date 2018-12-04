<!DOCTYPE html>
<html lang="en">
	<head>	
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">	
	    <title>Admin Login Form</title>	
	   	<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/images/settings.png')?> ">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fullcalendar.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.gritter.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.jscrollpane.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.css') ?>" />		
		<link rel="stylesheet" href="<?php echo base_url('assets/css/icheck/flat/blue.css') ?>" />		
	</head>
	<body>	    
	  
		<div class="container-fluid"> 
		    <div class="row-fluid">
		        <div class="loginform text-center">	
		        	<div class="dv_login">
		        		<div class="dv_login_icon">
		        			<img src="<?php echo base_url('assets/img/icons/login.png') ?>"/>
		        		</div> 
		        		<div class="dv_login_form">
		        			<form action="<?php echo site_url('greenadmin/login/getLogin')?>" method="post" id="loginform">
		        				<table class="">
			        				<tr>	     
			        				  					
			        					<td colspan="3" align="left" class="login_title"> 
			        						<span class="">LOG IN </span>
			        					</td>
			        				</tr>			        				
			        				<tr>
			        					<td>User name</td>
			        					<td>:</td>
			        					<td>
			        						<input type="text" name="user_name" id="user_name" class="form-control col-sm-4" required data-parsley-required-message="Enter User Name"/>
			        					</td>
			        				</tr>
			        				<tr>
			        					<td>Password</td>
			        					<td>:</td>
			        					<td>
			        						<input type="password" name="password" id="password"  class="form-control col-sm-4" required data-parsley-required-message="Enter Password"/>
			        					</td>
			        				</tr>
			        				<tr>		        					
			        					<td colspan="3" style="text-align: center!import">
			        						<input type="submit" name="login" id="login"  class="form-control btn-primary" value="Login"/>
			        					</td>
			        				</tr>
			        			</table>		        				
		        			</form>		        					        			
		        		</div>    		
		        	</div>		        	
		        </div>
		    </div>
		</div>
	  
	</body>
	<style>
		html, body{height:100%; margin:0;padding:0}
		
		body {		  
		    background-repeat: no-repeat;
		    background-position: 0 0;
		    background-size: cover;
		    opacity: 0.5px;
		}
		
		.login_title{
			font-size: 18px;
			color: #276B08;
			font-weight: bold;
			padding-bottom: 20px;
			border-bottom: 1px solid #E9EDE8;
		}
		table{
			padding: 5px;
		}
		table td{
			padding: 3px;
			text-align: left;
		}
 
		.container-fluid{
		  height:100%;
		  display:table;
		  width: 100%;
		  padding: 0;
		}		 
		.row-fluid {height: 100%; display:table-cell; vertical-align: middle;} 
		.dv_login{
			position: relative;			
			width:550px;
			height:250px;
			margin: 0 auto; 			
			background: none repeat scroll 0 0 #f8f8f8;
		    border: 1px solid #DBD4D4;		 		   	
		    /*box-shadow: 1px 5px 5px 2px #E2DEDE;*/
		    border-radius: 4px;
		    padding-top: 15px;		    
			
		}
		.dv_login_icon{
			width:200px;
			float: left;			
		}
		.dv_login_form{
			width:290px;			
			float: left;
		}
		#login{
			width: 100px;
		}
	</style>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js') ?>"></script>
		<![endif]-->
		
		<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.custom.js')?>"></script>					
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>		
		<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/gecom.js')?>"></script>	

		<script src="<?php echo base_url('assets/js/jquery.icheck.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/select2.min.js')?>"></script>
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
</html>
