  
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
    
                    <form id="register-form" enctype="multipart/form-data" method="POST" action="">
                      <div class="form-group">
                        <input id="email" name="email"​ required="required" placeholder="<?php echo $this->lang->line('em_email')?>" class="form-control"  type="email">
                      </div>
                      <div class="form-group">
                        <input name="button" class="btn btn-md btn-primary btn-block" value="<?php echo $this->lang->line('em_next')?>" type="submit">
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

<?php
if(isset($_POST['button']))
{
    require('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port     = 465;  
    $mail->Username = "estatecambodia.dev@gmail.com";
    $mail->Password = "@Sila168.com.Dev";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("estatecambodia.dev@gmail.com", "Estate Cambodia");
    $mail->AddReplyTo("estatecambodia.dev@gmail.com", "Estate Cambodia");
    $mail->AddAddress($_POST["email"]);   
    $mail->Subject = "Reset New Password";
    $mail->WordWrap   = 80;

    $id = $_POST["token"];
    $email = $_POST["email"];

    $st = array('set_time'=>strtotime("+24 hours"));
    $this->db->where('userid',$id);
    $this->db->update('admin_user',$st);


    $logo = "http://estatecambodia.com/assets/img/logo.png";
      $description = '<div style="width: 100%">
          <table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
            <tbody>
                <tr>
                    <td style="width:8px" width="8"></td>
                    <td>
                        <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                            <img src="'.$logo.'" style="width: 140px;">
                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                                <div style="padding: 0px 10px 10px; text-align: center">
                                  By clicking on the following link, you are confirming your new password.
                                </div>
                                <div style="padding-top:32px;text-align:center">
                      <a href="http://estatecambodia.com/forgetpassword/changpassword/'.$id.'" style="font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:5px 24px;background-color:#d94235;border-radius:5px;min-width:90px" data-saferedirecturl="http://estatecambodia.com/forgetpassword/changpassword/'.$id.'" target="_blank">
                      Reset password now
                      </a>
                    </div>
                            </div>
                        </div>
                                                
                    </td>
                    <td style="width:8px" width="8"></td>
                </tr>
            </tbody>
        </table>
      </div>';

    $mail->MsgHTML($description);

    //foreach ($_FILES["attachment"]["name"] as $k => $v) {
        //$mail->AddAttachment( $_FILES["attachment"]["tmp_name"], $_FILES["attachment"]["name"]);
    //}

    $mail->IsHTML(true);

    if(!$mail->Send()) {
        echo "<p class='error'>Problem in Sending Mail.</p>";
    } else {
        //echo "<p class='success'>Mail Sent Successfully.</p>";
        redirect(site_url('forgetpassword/checkmessage'));
    }
}   
?>

<script type="text/javascript">
  $('#email').change(function(){
    $('#token').val('');
    $.ajax({
        url:"<?php echo site_url('forgetpassword/getuserid')?>",
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
