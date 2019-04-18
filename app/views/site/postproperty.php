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
.control-label{
	color: #999;
}
.help-inline{
	font-size: 12px;
    top: -10px;
    position: relative;
}
.main{
	background-color: #eee;
}
.text-danger {
    color: #e31713;
}
</style>
<div role="main" class="main">
	<section class="pgl-intro" style="padding-top: 30px; margin-bottom:0px;">
		<div class="container">
			<div class="container">
				<!-- <h2>Post Property</h2> -->
				<div class="txt-header"><h3><?php echo $this->lang->line('post_page_title')?></h3></div>
				<div class="lead pgl-bg-light">
			        <form enctype="multipart/form-data" method="POST" action="<?php echo site_url('site/site/save')?>">
		               <div class="row">
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_name')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-9">
	                                    <input type="text" name="txtname" class="form-control txtName" required="" id="txtname" required="" maxlength="15" minlength="4" id="username"/>                  
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_email')?> </label>
	                                <div class="col-lg-9">
	                                    <input type="text" name="txtemail" class="form-control txtName" id="txtemail" />          
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('post_page_phone')?>  <span class="text-danger">*</span></label>
	                                <div class="col-lg-9">
	                                    <input type="tel" name="txtphone" required="" class="form-control txtName" id="txtphone" style="max-width: 100%;" />                 
	                                </div>
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-3 control-label'><?php echo $this->lang->line('help_us_address')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-9"> 
	                                    <textarea name="txtaddress" id="txtaddress" required="" class="form-control txtMsg" style="width: 100%; height: 95px;"></textarea>                 
	                                </div>
		                        </div>
						        <div class="form-group">
						        	<label class='col-lg-3 control-label'><?php echo $this->lang->line('post_page_relation')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-9">
									    <select class="form-control txtName" name="txttype_post" style="max-width: 100%;" required="">
									    	<option value="">-<?php echo $this->lang->line('help_us_select')?>-</option>
									    	<option value="owner"><?php echo $this->lang->line('post_page_owner')?></option>
									    	<option value="agent"><?php echo $this->lang->line('post_page_agent')?></option>
									    </select>              
	                                </div>
		                        </div>
			                </div>
		                    <div class="col-md-12">
		                    	<div class="form-group">
	                                <div class="col-lg-4"> 
	                                    <div class="form-group">
					                        <input type="submit" name="btnSubmit" class="btn btn-success btnContact" value="<?php echo $this->lang->line('post_page_continue')?>" />
					                    </div>              
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