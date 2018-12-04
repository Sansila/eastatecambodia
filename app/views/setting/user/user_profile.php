
<style type="text/css">
	table tbody tr td img{width: 20px; margin-right: 10px}
	
	.up:hover,.down:hover,a>label:hover,.sub:hover{cursor: pointer!important;}
	.cur_sort_up{
		background-image: url('<?php echo base_url('assets/images/icons/sort-up.png')?>');
		background-position: left;
		background-repeat: no-repeat;
		padding-left: 15px !important;
	}
	#top-bar img{width: 20px; margin-top: 5px;}

	.cur_sort_down{
		background-image: url('<?php echo base_url('assets/images/icons/sort-down.png')?>');
		background-position: left;
		background-repeat: no-repeat;
		padding-left: 15px !important;
	}
	
</style>
<?php
	$m='';
	$p='';
	if(isset($_GET['m'])){
	    $m=$_GET['m'];
	}
	if(isset($_GET['p'])){
	    $p=$_GET['p'];
	}
 ?>

<div class="wrapper">
	<div class="clearfix" id="main_content_outer">
	    <div id="main_content">
	      <div class="col-xs-12">
		      	<div class="col-xs-6">
		      	</div>
		      	  
		  </div>
	      <div class="row">
	      		<div class="col-sm-9">
	      			<div class="widget-box table-responsive">
						<div class="widget-title no_wrap" id='top-bar'>
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
								<h5>User Profile</h5>
										    
						</div>
						<div class="widget-content nopadding" id='tab_print'>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 align='center'><label>Edit Profile</label></h3>
								</div>
							</div>
							<div class='row'>
								<form enctype="multipart/form-data" name="basic_validate" id="frmprofile" method="POST" action="" class="form-horizontal basic_validate">
										<div class='col-sm-4' style='text-align:center'>
											<div class='col-sm-12'>
												<?php 
													 $logo_path=base_url('assets/upload/no_person.jpg');
													    if(file_exists(FCPATH."/assets/upload/adminuser/$user->userid".".png")){
													        $logo_path=base_url("/assets/upload/adminuser/$user->userid".".png");
													    }
																							 ?>
												<img title='Click to Change Profile Picture.' onclick="$('#uploadImagelogo').click();" id="uploadPreviewlogo" src="<?php echo $logo_path; ?>" id="uploadPreview" style='width:180px; border:solid 1px #CCCCCC; padding:3px;'>
		                                    	<input id="uploadImagelogo" rel='uploadPreviewlogo' accept="image/gif, image/jpeg, image/jpg, image/png" type="file" name="userfile" onchange="PreviewImage(event);" style="visibility:hidden; display:none" />
											</div>
											</br>
										</div>
										<div class='col-sm-7'>
											<table class='table'>
												<tr>
													<th width='140' style='text-align:right !important'><label> Last name : </label></th>
													<th>
														<a onclick='edit(event);'><label title='Click to edit' id='lblval'> <?php echo $user->last_name ?></label></a>
														<div class="input-group textfields hide">
														  <input type="text" class="form-control" id='last_name' value='<?php echo $user->last_name ?>'>
														  <span onclick="saveedit(event);" class="input-group-addon sub"id="basic-addon1"><span class="glyphicon glyphicon-ok sub" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												<tr>
													<th style='text-align:right !important'><label> First Name : </label></th>
													<th>
														<a onclick='edit(event);'><label title='Click to edit' id='lblval'> <?php echo $user->first_name ?></label></a>
														<div class="input-group textfields hide">
														  <input type="text" class="form-control" id='first_name' value='<?php echo $user->first_name ?>'>
														  <span onclick="saveedit(event);" class="input-group-addon sub" id="basic-addon1"><span class="glyphicon glyphicon-ok sub" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												<tr>
													<th  style='text-align:right !important'><label> User Name : </label></th>
													<th><label> <?php echo $user->user_name ?></label></th>
												</tr>
												<tr>
													<th  style='text-align:right !important'><label> Email : </label></th>
													<th>
														<a onclick='edit(event);'><label title='Click to edit' id='lblval'> <?php echo $user->email ?></label></a>
														<div class="input-group textfields hide">
														  <input type="text" class="form-control" id='email' value='<?php echo $user->email ?>'>
														  <span onclick="saveedit(event);" class="input-group-addon sub" id="basic-addon1"><span class="glyphicon glyphicon-ok sub" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												<tr>
												<tr>
													<th  style='text-align:right !important'><label> Role : </label></th>
													<th><label> <?php echo $user->role ?></label></th>
												</tr>
												<tr>
													<th  style='text-align:right !important'><label> Store : </label></th>
													<th>
														<?php 
															foreach ($this->user->getuserstor($user->userid) as $us) {
																echo "<label> $us->store_name </label>";
															}
														?>
														
													</th>
												</tr>
												<tr>
													
													<th colspan='2'>
														<a onclick='changepwd(event);'><label title='Click to Change password' id='lblval'>Change Password</label></a> 
														<span class='glyphicon glyphicon-chevron-down down' title='Click to change password' onclick='changepwd(event);' style='float: right'></span>
														<span class='glyphicon glyphicon-chevron-up up hide' title='Click to Unchange' onclick='hidepwd(event);' style='float: right'></span>
														<input type='text' id='is_pwdchange' value='' class='hide'/>
													</th>
												</tr>
												<tr class='pwd hide'>
													<th  style='text-align:right !important'><label>Old Password : </label></th>
													<th>
														<div class="input-group">
														  <input type="password" class="form-control" id='old_pwd' value=''>
														  <span onclick="saveedit(event);" class="input-group-addon"id="basic-addon1"><span class="glyphicon glyphicon-ok" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												<tr class='pwd hide'>
													<th  style='text-align:right !important'><label>New Password : </label></th>
													<th>
														<div class="input-group">
														  <input type="password" class="form-control" id='new_pwd' value=''>
														  <span onclick="saveedit(event);" class="input-group-addon"id="basic-addon1"><span class="glyphicon glyphicon-ok" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												<tr class='pwd hide'>
													<th  style='text-align:right !important'><label>Re-New Password : </label></th>
													<th>
														<div class="input-group">
														  <input type="password" class="form-control" onkeyup='confirmpwd(event);' id='con_pwd' value=''>
														  <span onclick="saveedit(event);" class="input-group-addon"id="basic-addon1"><span class="glyphicon glyphicon-ok" aria-hidden='true'></span></span>
														</div>
													</th>
												</tr>
												
												<tr>
												
											</table>
										</div>
										<div class='col-sm-12' style='text-align:center'>
											<div class="form-group">          
					                              <div class="col-md-7">
					                                <div class="col-lg-3">
					                                  <button id="save" name="save" onclick='saveuser()'; type="button" class="btn btn-primary">Save</button>
					                                </div>
					                                <!-- <div class="col-lg-1">
					                                  <button id="cancel" name="cancel" type="button" class="btn btn-danger">Cancel</button>
					                                </div> -->
					                              </div>
					                        </div>
										</div>
									</form>
							</div>
							
						</div>
					</div>
					
	      		</div>	      	
	        </div> 
	    </div>
   </div>
</div>
<script type="text/javascript">
		function PreviewImage(event) {
            var uppreview=$(event.target).attr('rel');
            //alert(uppreview);
            var upimage=$(event.target).attr('id');
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(upimage).files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById(uppreview).src = oFREvent.target.result;
                 document.getElementById(uppreview).style.backgroundImage = "none";
            };
        };
        function uploads(){
        	var formdata=new FormData($('#frmprofile')[0]);
	        $.ajax({
	            type:'POST',
	            url:"<?PHP echo site_url('setting/user/do_upload');?>",
	            data:formdata,
	            cache:false,
	            contentType: false,
	            processData: false,
	            success:function(data){
	                console.log("success");
	                console.log(data);
	            },
	            error: function(data){
	                console.log("error");
	                console.log(data);
	            }
	        });
	    }
		$(function(){			
			$("#print").on("click",function(){
				gPrint("tab_print");
			});
			$("#btnexport").on("click",function(e){
				var title="Store List";			
				var data=$('.table').attr('border',1);
					data = $("#tab_print").html();
	   			var export_data = $("<center><h3 align='center'>"+title+"</h3>"+data+"</center>").clone().find(".remove_tag").remove().end().html();
				window.open('data:application/vnd.ms-excel,' + encodeURIComponent(export_data));
    			e.preventDefault();
    			$('.table').attr('border',0);
			});
			
		})
		function edit(event){
			$(event.target).addClass('hide');
			$(event.target).closest('tr').find('.textfields').removeClass('hide');
		}
		function saveedit(event){
			var vals=$(event.target).closest('tr').find('input').val();
			$(event.target).closest('tr').find('#lblval').html(vals);
			$(event.target).closest('tr').find('.textfields').addClass('hide');
			$(event.target).closest('tr').find('#lblval').removeClass('hide');
		}
		function changepwd(event){
			$('.pwd').removeClass('hide');
			$(event.target).closest('tr').find('.up').removeClass('hide');
			$(event.target).closest('tr').find('.down').addClass('hide');
			$('#is_pwdchange').val(1);
		}
		function hidepwd(event){
			$('.pwd').addClass('hide');
			$(event.target).addClass('hide');
			$('.down').removeClass('hide');
			$('#is_pwdchange').val('');
			$('#old_pwd').val('');
			$('#new_pwd').val('');
			$('#con_pwd').val('');
		}
		function confirmpwd(event){
			var new_pwd=$('#new_pwd').val();
			var con=$('#con_pwd').val();
			if(new_pwd==con){
				$(event.target).closest('div').addClass('has-success');
				$(event.target).closest('div').removeClass('has-error');
			}
			else{
				$(event.target).closest('div').addClass('has-error');
				$(event.target).closest('div').removeClass('has-success');
			}
		}
		function saveuser(){
			var last_name=$('#last_name').val();
			var first_name=$('#first_name').val();
			var email=$('#email').val();
			var is_pwdchange=$('#is_pwdchange').val();
			var old_pwd=$('#old_pwd').val();
			var new_pwd=$('#new_pwd').val();
			var con_pwd=$('#con_pwd').val();
			if(is_pwdchange!=''){
				if(new_pwd!='')
					if(new_pwd==con_pwd){
						 	var url="<?php echo site_url('setting/user/saveprofile')?>";
					        $.ajax({
					                url:url,
					                type:"POST",
					                datatype:"Json",
					                async:false,
					                data:{
										'last_name':last_name,
					                	'first_name':first_name,
					                	'email':email,
					                	'is_pwd':is_pwdchange,
					                	'old_pwd':old_pwd,
					                	'new_pwd':new_pwd 
										},
					                success:function(res) {
					                	if(res=='Your Old password is incorrect.!'){
					                		toasmsg('error',res);
					                	}else{
					                		toasmsg('success',res);
					                		uploads();
					                	}
					                }
					        }) 
					}else{
						toasmsg('error','your Confirm new password do not mutch.');
					}
				else
					toasmsg('error','New Password Can not blank');
			}else{
						var url="<?php echo site_url('setting/user/saveprofile')?>";
				        $.ajax({
				                url:url,
				                type:"POST",
				                datatype:"Json",
				                async:false,
				                data:{'last_name':last_name,
				                	'first_name':first_name,
				                	'email':email},
				                success:function(res) {
				                		toasmsg('success',res);
				                		uploads();
				                }
				        }) 
			}

		}
	</script>