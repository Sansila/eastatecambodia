<?php
	$pict_path=base_url('assets/upload/no_image.jpg');
	if(isset($query->userid))
	{
	    if(file_exists(FCPATH."/assets/upload/".$query->userid."_thumb.png")){       
	        $pict_path=base_url("assets/upload/".$query->userid."_thumb.png");
	    }
	}
?>

<div id="content-header" class="mini">
	<h1>User Management</h1>
	<ul class="mini-stats box-3">
		<li class="hide">
			<div class="left sparkline_bar_good"><span>2,4,9,7,12,10,12</span>+10%</div>
			<div class="right">
				<strong>36094</strong>
				Visits
			</div>
		</li>
		
	</ul>
</div>
<div id="breadcrumb">
	<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
	<a href="#" class="current">User Managment</a>
</div><br>
<div class="row">
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-default">
	      	<div class="panel-body">
		        <div class="table-responsive" id="tab_print">
						<form enctype="multipart/form-data" accept-charset="utf-8" method='post' id="defaultform" action='<?php echo site_url('setting/user/update');?>'>
							<input type='text' id='txtuserid' style='display:none;' name='txtuserid' value="<?php if(isset($query->userid)) echo $query->userid; else echo "";?>">
							<table align='center' width="900">
								<tr>
									<td><label for="emailField">First Name</label></td>
									<td> : </td>
									<td><input  type='text' class="form-control" name='txtf_name' value="<?php if(isset($query->first_name)) echo $query->first_name; else echo "";?>" id='txtf_name' required data-parsley-required-message="Enter First Name" placeholder="your First name"/>
									</td>
									<td><label for="emailField">last name</label></td>
									<td> : </td>
									<td><input type='text' class="form-control" name='txtl_name' value="<?php if(isset($query->last_name)) echo $query->last_name; else echo "";?>" id='txtl_name' required data-parsley-required-message="Enter Last Name" placeholder="your Last name"/>
									</td>
									<td rowspan='4' style='border:0px solid #CCCCCC; text-align:center; width:200px'>
										<img src="<?php if(isset($pict_path)) echo $pict_path; else echo "";?>" id="uploadPreview" style='width:120px; height:150px; margin-bottom:15px'>
										<input id="uploadImage" type="file" accept="image/gif, image/jpeg, image/jpg, image/png" name="userfile" onchange="PreviewImage();" style="visibility:hidden; display:none;" />
										<input type='button' class="btn btn-success" onclick="$('#uploadImage').click();" value='Browse'/>
									</td>
								</tr>
								<tr>
									<td><label for="emailField">User Name</label></td>
									<td> : </td>
									<td><input type='text' class="form-control" name='txtu_name' value="<?php if(isset($query->user_name)) echo $query->user_name; else echo "";?>" id='txtu_name' required data-parsley-required-message="Enter User Name" placeholder="your User name"/></td>
									<td><label for="emailField">Password</label></td>
									<td> : </td>
									<td><input type='password' class="form-control" name='txtpwd' id='txtpwd' value="<?php if(isset($query->password)) echo $query->password; else echo "";?>" required data-parsley-required-message="Enter Password" placeholder="your Password"/></td>

								</tr>
								<tr>
									<td><label for="emailField">Email address</label></td>
									<td> : </td>
									<td class='control-group'><input type='text' class="form-control" value="<?php if(isset($query->email)) echo $query->email; else echo "";?>" name='txtemail' id='txtemail' required data-parsley-required-message="Enter Email" placeholder="your Email Address"/></td>
									<td><label for="emailField">Role</label></td>
									<td> : </td>
									<td>
										<select name='cborole' id='cborole' class="form-control ">
											<?php
											foreach ($this->role->getallrole() as $role_row) {
												if(isset($query->roleid))
												{
											?>
												<option value='<?php echo $role_row->roleid; ?>' <?php if($query->roleid==$role_row->roleid) echo 'selected';?>> <?php echo $role_row->role ; ?></option>
											<?php 
												}else{
											?>
												<option value='<?php echo $role_row->roleid; ?>'> <?php echo $role_row->role ; ?></option>
											<?php
												}
											}
											?>
										</select>
									</td>
									
								</tr>
								<tr>
									<td><label for="emailField">Phone</label></td>
									<td> : </td>
									<td class='control-group'>
										<input type='text' class="form-control" name='txtphone' id='txtphone' required data-parsley-required-message="Enter Phone" placeholder="your Phone Number" value="<?php if(isset($query->phone)) echo $query->phone; else echo "";?>" />
									</td>
									
									<td><label for="emailField">Gender</label></td>
									<td> : </td>
									<td>
										<select name='gender' id='gender' class="form-control ">
											<?php 
												$sel =""; $sel1 ="";
												// if(isset($query->gender))
												// {
													if($query->gender == "Male")
														$sel = "selected";
													if($query->gender == "Female")
														$sel1 = "selected";
												//}
											?>
											<option <?php echo $sel;?> value="Male">Male</option>
											<option <?php echo $sel1;?> value="Female">Female</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label for="emailField">Address</label></td>
									<td> : </td>
									<td class='control-group'>
										<select class="form-control select2-single" id="address" name="address">
		                                    <option value="0">Please Select</option>
		                                    <?php
		                                        $location=$this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
		                                        foreach ($location as $menu) {
		                                            $sel='';
		                                            if(isset($query->address))
		                                            if($query->address==$menu->propertylocationid)
		                                            $sel='selected';
		                                    ?>
		                                    <option value="<?php echo $menu->propertylocationid;?>" <?php echo $sel; ?>><?php echo str_repeat("---- &nbsp;",$menu->level).$menu->locationname;?></option>
		                                    <?php 
		                                        }
		                                    ?>
		                                </select>
									</td>
								</tr>
								
								<tr>
									<td></td>
									<td></td>
									<td colspan='2'>
										<input type='submit' class="btn btn-primary" name='btnsubmit' id='btnsubmit' value='Save User'>
										<input type='reset' class="btn btn-warning" name='btnreset' id='btnreset'>
										<button type="button" class="btn btn-danger" id='btncancel'>Cancel</button>
									</td>
									
									<td></td>
									<td></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<script type="text/javascript">
		function PreviewImage() {
		        var oFReader = new FileReader();
		        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		        oFReader.onload = function (oFREvent) {
		            document.getElementById("uploadPreview").src = oFREvent.target.result;
		            document.getElementById("uploadPreview").style.backgroundImage = "none";
		        };
		    };
		    $(function(){
				$('#defaultform').parsley();				
			})
		$(document).ready(function() {
			
				$('#btncancel').click(function(){
					var r = confirm("Are you sure to cancel !");
					if (r == true) {
						location.href="<?PHP echo site_url('setting/user/');?>";
					} else {
					   
					}
				});

			$(".select2-single").select2({
		        allowClear:true,
		        placeholder: 'Location'
		    });
			
       });
	</script>