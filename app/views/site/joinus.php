
<style type="text/css">
.txtName{
	border-radius: 36px;
    border-color: #eeeeee;
    text-indent: 10px;
}
.txtMsg{
	border-radius: 18px;
    border-color: #eeeeee;
    text-indent: 5px;
}
.btnContact
{
    width: 100%;
    border-radius: 2rem;
    padding: 10px;
    color: #fff;
    background: #dc3545;
    border: none;
    cursor: pointer;
}
.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}
.checkbox label{
	padding-left: 0px !important;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
.txt-header{
	background: #173851;
    padding: 20px 0px 20px 20px;
    text-transform: uppercase;
}
.txt-header h3{
	margin: 0px;
	color: #ffffff;
}
.main{
	background-color: #eee;
}
.text-danger {
    color: #e31713;
}
</style>
<div role="main" class="main">
	<section class="pgl-intro" style="padding-top: 30px; margin-bottom: 0px;">
		<div class="container">
			<div class="container">
				<!-- <h2>Post Property</h2> -->
				<?php 
					$m = "";
					if(isset($_GET['m']))
						$m = $_GET['m'];

					if($m == "error")
					{
				?>
					<div class="alert alert-danger" role="alert">
					  	<?php echo $this->lang->line('join_message_false')?>
					</div>
				<?php
					}
				?>
				<div class="txt-header"><h3><?php echo $this->lang->line('join_title')?></h3></div>
				<div class="lead pgl-bg-light">
			        <form enctype="multipart/form-data" method="post" action="<?php echo site_url('site/site/savejoin')?>">
		                <!-- <h3>Post Property</h3> -->
		               <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_name')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtName" class="form-control txtName" required="" id="txtname" required="" id="username"/> 
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_email')?></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtEmail" class="form-control txtName" value="" />      
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_phone')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtPhone" class="form-control txtName" value="" required="" />    
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('join_business')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtBusiness" class="form-control txtName" value="" />
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('join_location')?></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName" name="txtAddress" style="max-width: 100%;">
	                                    	<option value="">Select</option>
	                                    	<?php 
	                                    		$address = $this->site->getAddressForJoin();
	                                    		foreach ($address as $ads) {
	                                    			echo '<option value="'.$ads->propertylocationid.'">'.$ads->locationname.'</option>';
	                                    		}
	                                    	?>
	                                    </select>      
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_gender')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-9">
	                                    <select class="form-control txtName" required style="max-width: 100%;" name="txtgender">
	                                    	<option value=""><?php echo $this->lang->line('help_us_select');?></option>
	                                    	<option value="Male"><?php echo $this->lang->line('help_us_male')?></option>
	                                    	<option value="Female"><?php echo $this->lang->line('help_us_female')?></option>
	                                    </select>        
	                                </div>
		                        </div>
		                    	<!-- <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_address')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-9">
	                                    <input type="text" name="txtAddress" class="form-control txtMsg" required="">        
	                                </div>
		                        </div> -->
		                        <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_description')?></label>
	                                <div class="col-lg-9">
	                                    <textarea name="txtRemark" class="form-control txtMsg" style="width: 100%; height: 95px;"></textarea>       
	                                </div>
		                        </div>
		                        <div class="form-group">
		                        	<label class='col-lg-3 control-label'><?php echo $this->lang->line('join_image')?> <span class="text-danger">*</span></label>
		                        	<div class="col-lg-9">
				                        <div style='border:0px solid #CCCCCC; text-align:center; width:200px; margin:0 auto;'>
											<img src="<?php echo base_url('assets/upload/No_person.jpg') ?>" id="uploadPreview" style='width:120px; height:150px; margin-bottom:15px'>
											<input id="uploadImage" accept="image/gif, image/jpeg, image/jpg, image/png" type="file" name="userfile" onchange="PreviewImage();" required="" style="opacity: 0; margin-top: -50px;"/>
											<input type='button' class="btn btn-success" onclick="$('#uploadImage').click();" value='<?php echo $this->lang->line('help_us_browse')?>' style="font-size: 15px;"/>
											
										</div>
									</div>
								</div>
		                    </div>
		                    <div class="col-md-4">
			                    <div class="form-group">
			                        <input type="submit" name="btnSubmit" class="btnContact" value="<?php echo $this->lang->line('help_us_continue')?>" />
			                    </div>
			                </div>
			                <div class="col-md-8"></div>
		                </div>
		            </form>

				</div>
			</div>
		</div>
	</section>

</div>

<script type="text/javascript">
	setTimeout(function(){ 
		$('.alert-danger').addClass('hide');
	}, 3000);
	function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
             document.getElementById("uploadPreview").style.backgroundImage = "none";
        };
    };
</script>