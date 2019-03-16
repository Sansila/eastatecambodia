
<style type="text/css">
.txtName{
	border-radius: 36px;
    border-color: #eeeeee;
    text-indent: 10px;
}
.txtAddress{
	border-radius: 15px;
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
.select2-container--default .select2-selection--multiple {
    background-color: white;
    border: 1px solid #eeeeee;
    border-radius: 10px;
    cursor: text;
    height: auto;
    margin-bottom: 13px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
	font-size: 14px;
}
.select2-container .select2-search--inline .select2-search__field{
	font-size: 14px;
	margin-top: 0px;
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
					<div class="alert alerts alert-danger" role="alert">
					  	Failed please dry again.
					</div>
				<?php
					}else if($m == "success"){
				?>
					<div class="alert alerts alert-success" role="alert">
					  	Thank you for finding in our website.
					</div>
				<?php
					}
				?>
				<div class="txt-header"><h3>Help Me Find Property</h3></div>
				<div class="lead pgl-bg-light">
			        <form method="post" action="<?php echo site_url('site/site/savefind')?>">
		                <!-- <h3>Post Property</h3> -->
		                <input type="hidden" name="txtID" value="<?php echo $id?>">
		               <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Name <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtName" class="form-control txtName" required="" id="txtname" required="" id="username"/> 
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Phone Number <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtPhone" class="form-control txtName" value="" required="" />    
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Email<span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="email" required="" name="txtEmail" class="form-control txtName" value="" />      
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Address <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <textarea name="txtAddress" class="form-control txtAddress" required="" style="width: 100%; height: 95px;"></textarea>        
	                                </div>
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                    	
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Property Category <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName select2-single" multiple="multiple" name="txtpro_cate[]" style="max-width: 100%;" required="">
	                                    	<option value="">-Select-</option>
	                                    	<?php 
	                                    		$cates = $this->site->getPropertyCategory();
	                                    		foreach ($cates as $cate) {
	                                    			echo '<option value="'.$cate->typeid.'">'.$cate->typename.'</option>';
	                                    		}
	                                    	?>
	                                    </select>
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Property Type</label>
	                                <div class="col-lg-8" style="margin-bottom: 15px;">
	                                    <!-- <select name="txtpro_type" class="form-control txtName" style="max-width: 100%;" required="">
	                                    	<option value="">-Select-</option>
	                                    	<option value="1">Sale</option>
	                                    	<option value="2">Rent</option>
	                                    </select> -->
	                                    <input type="checkbox" value="1" name="txtpro_type[]"><spand style="font-size: 14px;">Sale</spand>
	                                    <input type="checkbox" value="2" name="txtpro_type[]"><spand style="font-size: 14px;">Rent</spand>
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Description</label>
	                                <div class="col-lg-8">
	                                    <textarea name="txtDes" class="form-control txtAddress" style="width: 100%; height: 139px;"></textarea>       
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-sm-12">
		                    	<div class="col-md-4">
				                    <div class="form-group">
				                        <input type="submit" name="btnSubmit" class="btnContact" value="Continue" />
				                    </div>
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
		$('.alerts').addClass('hide');
	}, 3000);
	$('.select2-single').select2({
		allowClear:false,
		placeholder: 'Property Category'
	});
</script>