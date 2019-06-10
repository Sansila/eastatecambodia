
<!-- <section id="home-search-bg" class="home-search hero lazyload" data-sizes="auto" style="background-image: url('<?php //echo site_url('assets/upload/banner/thumb'.'/'.$slide->banner_id.'.png')?>'); padding-top:16rem;     padding-bottom: 8rem; height: auto !important;">
	<div class="overlay"></div>
</section> -->

<!-- Begin Main -->
		<div role="main" class="main pgl-bg-grey">
			
			<!-- Begin content with sidebar -->
			<div class="container">
				
				<div class="row">
					<div class="col-md-12 content" style="padding-top: 30px;">
						<!-- <h2>Contact Us</h2> -->
						<div class="wizard row">
							<div class="col-md-12">
								<div class="col-md-2">
									<a href="<?php echo site_url('site/site/postproperty')?>" class="current"><?php echo $this->lang->line('home_page_post')?></a>
								</div>
								<div class="col-md-2">
									<a class="current" href="<?php echo site_url('site/site/join')?>"><?php echo $this->lang->line('home_page_join')?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="contact">
									<div class="row">
										<div class="col-sm-6">
											<strong><?php echo $this->lang->line('contact_address')?></strong>
											<address><?php echo $profile->address?></address>
										</div>
										<div class="col-sm-6">
											<address>
												<strong><?php echo $this->lang->line('contact_phone')?>.</strong> <?php echo $profile->phone?><br>
												<strong><?php echo $this->lang->line('contact_fax')?>.</strong> <?php echo $profile->phone?><br>
												<strong><?php echo $this->lang->line('contact_email')?>.</strong> <?php echo $profile->email?>
											</address>
										</div>
										<div class="col-md-12 ">
											<div class="">
												<form id="contact-form" enctype="multipart/form-data" method="POST" action="">
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 hide">
																<input placeholder="Name" type="text" name="owner" id="owner" class="form-control" value="<?php echo $profile->email;?>">
															</div>
															<div class="col-sm-6">
																<input placeholder="<?php echo $this->lang->line('contact_name')?>" type="text" name="name" id="name" class="form-control" data-msg-required="Please enter your name." required>
															</div>
															<div class="col-sm-6">
																<input placeholder="<?php echo $this->lang->line('contact_mail')?> *" type="email" name="customer_mail" id="customer_mail" class="form-control" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." required>
															</div>
														</div>
													</div>
													<div class="form-group">
														<textarea placeholder="<?php echo $this->lang->line('contact_message')?>" rows="5" name="comments" id="comments" class="form-control" data-msg-required="Please enter your message." required style="max-width: 100%;"></textarea>
													</div>
													<div class="form-group">
														<input type="submit" name="button" value="<?php echo $this->lang->line('contact_submit')?>" class="btn btn-primary min-wide" data-loading-text="Loading..." style="min-width: 100%;">
													</div>
													<div><?php if(isset($send)) echo $send; else echo "";?></div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="">
									<div id="contact-map" class="pgl-bg-light"></div>
								</div>
							</div>
						</div>
					</div>

				</div>	
			</div>
			<!-- End content with sidebar -->
			
		</div>
		<!-- End Main -->


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
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom($_POST["customer_mail"], $_POST["name"]);
    $mail->AddAddress("estatecambodia.dev168@gmail.com");
    $mail->AddCC("vireak.cambodia@gmail.com");  
    $mail->AddCC($_POST["owner"]);  
    $mail->Subject = "Contact From Customer";
    $mail->WordWrap   = 80;

    $logo = "http://estatecambodia.com/assets/img/logo.png";
    $description = '<div style="width: 100%"><table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
        <tbody>
            <tr>
                <td style="width:8px" width="8"></td>
                <td>
                    <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                        <img src="'.$logo.'" style="width: 140px;">
                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                            '.$_POST["comments"].'
                        </div>
                    </div>
                                            
                </td>
                <td style="width:8px" width="8"></td>
            </tr>
        </tbody>
    </table></div>';

    $mail->MsgHTML($description);

    //foreach ($_FILES["attachment"]["name"] as $k => $v) {
        //$mail->AddAttachment( $_FILES["attachment"]["tmp_name"], $_FILES["attachment"]["name"]);
    //}

    $mail->IsHTML(true);

    if(!$mail->Send()) {
        echo "<p class='error'>Problem in Sending Mail.</p>";
    } else {
        redirect($_SERVER['HTTP_REFERER']);
    }
}   
?>

<script type="text/javascript">
	window.onload=function(){
      var map;
      function initialize() {
          var myLatlng = new google.maps.LatLng(11.526230977882758, 104.96148778092572);

          var myOptions = {
              zoom: 12,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("contact-map"), myOptions);

          var marker = new google.maps.Marker({
              draggable: false,
              position: myLatlng,
              map: map,
              title: "Your location"
          });

          google.maps.event.addListener(marker, 'dragend', function (event) {
              document.getElementById("latitude").value = event.latLng.lat();
              document.getElementById("longtitude").value = event.latLng.lng();
              infoWindow.open(map, marker);
          });
      }
      google.maps.event.addDomListener(window, "load", initialize());
    }//]]> 
</script>