  
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
    .con{
      margin-top: 150px;
    }
    .pass_show{position: relative} 

	.pass_show .ptxt { 

	position: absolute; 

	top: 50%; 

	right: 10px; 

	z-index: 1; 

	color: #f36c01; 

	margin-top: -10px; 

	cursor: pointer; 

	transition: .3s ease all; 

	} 

	.pass_show .ptxt:hover{color: #333333;} 
  </style>
<div class="container con">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center"><?php echo $this->lang->line('em_header')?></h2>
                  <p><?php echo $this->lang->line('em_en_pwd')?></p>
                  <div class="panel-body">
    
                    <form id="register-form" class="form" method="post" oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Passwords do not match." : "")' action="<?php echo site_url('forgetpassword/changpassword')?>">
                      <div class="form-group pass_show">
                        <input id="confirm" name="password"​ required="required" placeholder="<?php echo $this->lang->line('em_txtpwd')?>" class="form-control"  type="password">
                      </div>
                      <div class="form-group pass_show">
                        <input id="confirm_password" name="confirm_password"​ required="required" placeholder="<?php echo $this->lang->line('em_txtconpwd')?>" class="form-control"  type="password">
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-md btn-primary btn-block" value="<?php echo $this->lang->line('em_next')?>" type="submit">
                      </div>
                      <input type="text" class="hide" name="id" id="id" value="<?php echo $id?>">
                      <input type="text" class="hide" name="email" id="email" value="<?php echo $email?>">
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.pass_show').append('<span class="ptxt">Show</span>');  
	});
	$(document).on('click','.pass_show .ptxt', function(){ 
		$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
		$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
	});  
</script>


