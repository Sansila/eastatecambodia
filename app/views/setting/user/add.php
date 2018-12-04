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

<!-- </div> -->
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-default">
	      	<div class="panel-body">
		        <div class="table-responsive" id="tab_print">
				<form  enctype="multipart/form-data" accept-charset="utf-8" method="post" id="defaultform" action='<?php echo site_url('setting/user/saveuser');?>'>
					<table align='center' width="900">
						<tr>
							<td><label for="emailField">First Name</label></td>
							<td> : </td>
							<td><input  type='text' class="form-control" name='txtf_name' id='txtf_name' required data-parsley-required-message="Enter First Name" placeholder="your First name"/>
							</td>
							<td><label for="emailField">Last name</label></td>
							<td> : </td>
							<td><input type='text' class="form-control" name='txtl_name' id='txtl_name' required data-parsley-required-message="Enter Last Name" placeholder="your Last name"/>
							</td>
							<td rowspan='4' style='border:0px solid #CCCCCC; text-align:center; width:200px'>
								<img src="<?php echo base_url('assets/upload/No_person.jpg') ?>" id="uploadPreview" style='width:120px; height:150px; margin-bottom:15px'>
								<input id="uploadImage" accept="image/gif, image/jpeg, image/jpg, image/png" type="file" name="userfile" onchange="PreviewImage();" style="visibility:hidden; display:none" />
								<input type='button' class="btn btn-success" onclick="$('#uploadImage').click();" value='Browse'/>
								
							</td>
						</tr>
						<tr>
							<td><label for="emailField">User Name</label></td>
							<td> : </td>
							<td><input type='text' class="form-control" name='txtu_name' id='txtu_name' required data-parsley-required-message="Enter User Name" placeholder="your User name"/></td>
							<td><label for="emailField">Password</label></td>
							<td> : </td>
							<td><input type='password' class="form-control" name='txtpwd' id='txtpwd' required data-parsley-required-message="Enter Password" placeholder="your Password"/></td>
							
						</tr>
						<tr>
							<td><label for="emailField">Email address</label></td>
							<td> : </td>
							<td class='control-group'><input type='text' class="form-control" name='txtemail' id='txtemail' required data-parsley-required-message="Enter Email" placeholder="your Email Address"/></td>
							
							<td><label for="emailField">Role</label></td>
							<td> : </td>
							<td>
								<select name='cborole' id='cborole' class="form-control ">
									<?php
									foreach ($this->role->getallrole() as $role_row) {
										echo "<option value='$role_row->roleid'>$role_row->role</option>";
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
							</td>
							
							<td></td>
							<td></td>
						</tr>
					</table>
				</form>
				<span style='color:red'><?PHP if(isset($error)) echo $error; ?></span>
			</div>
		</div>
		<?php
			//echo $this->user->getRealIP();
 		?>
	<!-- </div>
</div>
</div> -->
		
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
		</script>