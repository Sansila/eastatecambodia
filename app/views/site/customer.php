
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
.select2-container--default .select2-search--dropdown .select2-search__field
{
	max-width: 100%;
}
.select2-container--default .select2-selection--single{
	padding: 20px 0px;
	border-radius: 36px;
	border-color: #eee;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
	font-size: 14px;
	padding-left: 18px;
    position: relative;
    top: -13px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{
	height: 37px;
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
					  	Create false.
					</div>
				<?php
					}else if($m == "success"){
				?>
					<div class="alert alert-success" role="alert">
					  	Thank you. our team will feedback to you soon.
					</div>
				<?php
					}
				?>
				<div class="txt-header"><h3>Create Customer</h3></div>
				<div class="lead pgl-bg-light">
			        <form method="post" action="<?php echo site_url('site/site/savecustomer/'.$id)?>">
		                <!-- <h3>Post Property</h3> -->
		               <div class="row">
		                    <div class="col-md-6">
		                    	<div class="form-group">
		                            <label class='col-lg-4 control-label'>Customer Type <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName" name="customertype" id="customer-type" style="max-width: 100%;" required="">
	                                    	<option value="">Select</option>
	                                    	<option value="1">Looking for Property</option>
	                                    	<option value="2">Join as Agent</option>
	                                    </select>
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_email')?><span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtEmail" class="form-control txtName" value="" required="" />      
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_address')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <textarea name="txtAddress" class="form-control txtMsg" required="" style="width: 100%; height: 95px; padding: 10px;"></textarea>        
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-md-6">
		                    	<div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_name')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtName" class="form-control txtName" required="" id="txtname" required="" id="username"/> 
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_phone')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtPhone" class="form-control txtName" value="" required="" />    
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Find In Location <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName select2-single" id="customer-type" style="max-width: 100%;" multiple="multiple" 
	                                    name="location[]" required="">
	                                    	<option value="">Select</option>
	                                    	<?php 
	                                    		foreach ($locs as $loc) {
	                                    	?>
	                                    		<option value="<?php echo $loc->propertylocationid?>">
	                                    			<?php echo str_repeat("---- &nbsp;",$loc->level).$loc->locationname;?>
	                                    		</option>
	                                    	<?php 
	                                    		}
	                                    	?>
	                                    </select>
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-md-12">
		                    	<div class="form-group">
		                            <label class='col-lg-2 control-label'><?php echo $this->lang->line('help_us_description')?></label>
	                                <div class="col-lg-10">
	                                    <textarea name="txtRemark" class="form-control txtMsg" style="width: 100%; height: 95px; padding: 10px;"></textarea>       
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
			                    <div class="form-group">
			                        <input type="submit" name="btnSubmit" class="btnContact" value="Create" />
			                    </div>
			                </div>
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
	setTimeout(function(){ 
		$('.alert-success').addClass('hide');
	}, 3000);
	//===== location =====//
	$(".select2-single").select2({
        allowClear:true,
        placeholder: 'Location'
    });
</script>