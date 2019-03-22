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
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/img/estatecambodiaicon.ico')?> ">
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
	  
	</body>
	<style>

		body, html {
			height: 100%;
			background-repeat: no-repeat;
			background-image:url(<?php echo site_url('assets/img/bg-01.jpg')?>);
			position: fixed;
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		    background-size: cover;
		    background-position: 50% 50%;
		}

		.title-header{
			text-align: center;
			font-size: 16px;
			font-weight: 900;
			color: #d84949;
			text-transform: uppercase;
		}

		.card-container.card {
			max-width: 350px;
			padding: 40px 40px;
			border-radius: 15px;
		}

		.btn {
			font-weight: 700;
			height: 36px;
			-moz-user-select: none;
			-webkit-user-select: none;
			user-select: none;
			cursor: default;
		}

		/*
		* Card component
		*/
		.card {
			background-color: #F7F7F7;
			/* just in case there no content*/
			padding: 20px 25px 30px;
			margin: 0 auto 25px;
			margin-top: 70px;
			/* shadows and rounded borders */
			-moz-border-radius: 2px;
			-webkit-border-radius: 2px;
			border-radius: 2px;
			-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}

		.profile-img-card {
			width: 96px;
			height: 96px;
			margin: 0 auto 10px;
			display: block;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
		}

		/*
		* Form styles
		*/
		.profile-name-card {
			font-size: 16px;
			font-weight: bold;
			text-align: center;
			margin: 10px 0 0;
			min-height: 1em;
		}

		.reauth-email {
			display: block;
			color: #404040;
			line-height: 2;
			margin-bottom: 10px;
			font-size: 14px;
			text-align: center;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		.form-signin #inputEmail,
		.form-signin #inputPassword {
			direction: ltr;
			height: 35px;
			font-size: 16px;
			border-radius: 36px;
			font-size: 14px;
		}

		.form-signin input[type=email],
		.form-signin input[type=password],
		.form-signin input[type=text],
		.form-signin button {
			width: 100%;
			display: block;
			margin-bottom: 10px;
			z-index: 1;
			position: relative;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		.form-signin .form-control:focus {
			border-color: rgb(104, 145, 162);
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
		}

		.btn.btn-signin {
			/*background-color: #4d90fe; */
			background-color: #dc3545;
			/* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
			padding: 0px;
			font-weight: 700;
			font-size: 14px;
			height: 36px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 36px;
			border: none;
			-o-transition: all 0.218s;
			-moz-transition: all 0.218s;
			-webkit-transition: all 0.218s;
			transition: all 0.218s;
		}

		.forgot-password {
			color: rgb(104, 145, 162);
		}

		.forgot-password:hover,
		.forgot-password:active,
		.forgot-password:focus{
			color: rgb(12, 97, 33);
		}
		.forget_pwd a:hover{
			text-decoration: none;
		}

	</style>
	<div class="container">
		<div class="card card-container">
			<p class="title-header">Estatecambodia</p>
			<img id="profile-img" class="profile-img-card" src="<?php echo base_url('assets/images/avatar_2x.png') ?>" />
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" action="<?php echo site_url('greenadmin/login/firstgetLogin')?>" method="post">
				<span id="reauth-email" class="reauth-email"></span>
				<input type="hidden" name="pid" id="pid" class="form-control" value="<?php echo $pid?>">
				<input type="text" name="user_name" id="inputEmail" class="form-control" placeholder="<?php echo $this->lang->line('lo_name')?>" required autofocus>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo $this->lang->line('lo_pass')?>" required>
				<select class="form-control txtlang" name="txtlang">
					<option value=""><?php echo $this->lang->line('lo_lang')?></option>
					<option <?php if($lang == "en") echo "selected"; else echo "";?> value="en"><?php echo $this->lang->line('lo_lang_en')?></option>
					<option <?php if($lang == "kh") echo "selected"; else echo "";?> value="kh"><?php echo $this->lang->line('lo_lang_kh')?></option>
				</select>
				<div id="remember" class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> <?php echo $this->lang->line('lo_rem')?>
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo $this->lang->line('lo_login')?></button>
				<div class="forget_pwd">
					<a href="<?php echo site_url('forgetpassword/enteremail')?>"><?php echo $this->lang->line('lo_forget')?></a>
				</div>
			</form><!-- /form -->
			
		</div><!-- /card-container -->
	</div>
	
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
		<script type="text/javascript">
			$('.txtlang').change(function(){
				var val = $(this).val();
				if(val !="")
				{
					var url = '<?php echo site_url('/')?>' + val +'/'+ val;
					window.location = url;
				}
			});
		</script>
</html>
