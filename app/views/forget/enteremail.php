  
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
  </style>
<div class="container con">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center"><?php echo $this->lang->line('em_header')?></h2>
                  <p><?php echo $this->lang->line('em_en_mail')?></p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="<?php echo site_url('forgetpassword/resetpassword')?>">
                      <div class="form-group">
                        <!-- <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          
                        </div> -->
                        <input id="email" name="email"​ required="required" placeholder="<?php echo $this->lang->line('em_email')?>" class="form-control"  type="email">
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-md btn-primary btn-block" value="<?php echo $this->lang->line('em_next')?>" type="submit">
                      </div>
                      <input type="text" class="hide" name="token" id="token">
                    </form>
                    <div class="alert alert-warning hide">
                      <?php echo $this->lang->line('em_smg')?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<script type="text/javascript">
  $('#email').change(function(){
    $('#token').val('');
    $.ajax({
        url:"<?php echo site_url('forgetpassword/getuserid/')?>",
        type:"POST",
        datatype:"Json",
        async:false,
        data:{
          email: $(this).val(),
        },
        success:function(data) {
          if(!data){
            $('#email').val('');
            $('.alert-warning').removeClass('hide');
            setTimeout(function(){ 
              $('.alert-warning').addClass('hide');
            }, 3000);
          }
          else{
            $('#token').val(data);
          }
        }
      });
  });
</script>
