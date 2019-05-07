
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
.dropdown-menu-price{
	background: white !important;
}
.dropdown-price {
    position: relative;
    border: 1px solid #eee;
    border-radius: 30px;
    margin-bottom: 15px;
    font-size: 14px;
}
.caret{
	float: right;
    margin-top: 5px;
}
.dropdown-toggle-drop{
	width: 100%;
    text-align: left;
    padding: 12px 15px 12px 15px;
}
.dropdown-menus {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
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
					  	<?php echo $this->lang->line('help_us_message_false')?>
					</div>
				<?php
					}else if($m == "success"){
				?>
					<div class="alert alerts alert-success" role="alert">
					  	<?php echo $this->lang->line('help_us_message_success')?>
					</div>
				<?php
					}
				?>
				<div class="txt-header"><h3><?php echo $this->lang->line('help_us_title')?></h3></div>
				<div class="lead pgl-bg-light">
			        <form method="post" action="<?php echo site_url('site/site/savefind')?>">
		                <!-- <h3>Post Property</h3> -->
		                <input type="hidden" name="txtID" value="<?php echo $id?>">
		               <div class="row">
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
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_email')?><span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="email" required="" name="txtEmail" class="form-control txtName" value="" />      
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_address')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <textarea name="txtAddress" class="form-control txtAddress" required="" style="width: 100%; height: 75px;"></textarea>        
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_gender')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName" name="txtgender" required="" style="max-width: 100%;" required="">
	                                    	<option value="">-Select-</option>
	                                    	<option value="Male">Male</option>
	                                    	<option value="Female">Female</option>
	                                    </select>      
	                                </div>
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_pro_category')?> <span class="text-danger">*</span></label>
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
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_pro_location')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName select2-single" multiple="multiple" name="txtpro_loc[]" style="max-width: 100%;" required="">
	                                    	<option value="">-Select-</option>
	                                    	<?php 
	                                    		$locats = $this->site->getPropertyLocation();
	                                    		foreach ($locats as $loc) {
	                                    			echo '<option value="'.$loc->propertylocationid.'">
							                    			'.str_repeat("---- &nbsp;",$loc->level).$loc->locationname.'
							                    		  </option>';
	                                    		}
	                                    	?>
	                                    </select>
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_pro_type')?> <span class="text-danger">*</span></label>
	                                <div class="col-lg-8" style="margin-bottom: 15px;">
	                                    <input type="checkbox" value="1" name="txtpro_type[]" required=""><spand style="font-size: 14px;"><?php echo $this->lang->line('help_us_sale')?></spand>
	                                    <input type="checkbox" value="2" name="txtpro_type[]"><spand style="font-size: 14px;"><?php echo $this->lang->line('help_us_rent')?></spand>
	                                </div>
		                        </div>
		                        <div class="form-group">
		                        	<label class='col-lg-4 control-label'>Price </label>
		                        	<div class="col-lg-8">
		                        		<div class="dropdown dropdown-price">
									        <button id="min-max-price-range" class="dropdown-toggle dropdown-toggle-drop" href="#" data-toggle="dropdown">Price <strong class="caret"></strong>
									        </button>
									        <div class="dropdown-menus dropdown-menu-price col-sm-12" style="padding:10px;">
									            <form class="row">
									                <div class="col-xs-5">
									                    <input class="form-control price-label" placeholder="Min" data-dropdown-id="price-min"/>
									                </div>
									                <div class="col-xs-2"> - </div>
									                <div class="col-xs-5">
									                    <input class="form-control price-label" placeholder="Max" data-dropdown-id="price-max"/>
									                </div>
													<div class="clearfix"></div>
									                <ul id="price-min" class="col-sm-12 price-range list-unstyled">
									                    <li data-value="0">0</li>
									                    <li data-value="10">10</li>
									                    <li data-value="20">20</li>
									                    <li data-value="30">30</li>
									                    <li data-value="40">40</li>
									                    <li data-value="50">50</li>
									                    <li data-value="60">60</li>
									                </ul>
									                <ul id="price-max" class="col-sm-12 price-range text-right list-unstyled hide">
									                    <li data-value="0">0</li>
									                    <li data-value="10">10</li>
									                    <li data-value="20">20</li>
									                    <li data-value="30">30</li>
									                    <li data-value="40">40</li>
									                    <li data-value="50">50</li>
									                    <li data-value="60">60</li>
									                </ul>
									            </form>
									        </div>
									    </div>
		                        	</div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'><?php echo $this->lang->line('help_us_description')?></label>
	                                <div class="col-lg-8">
	                                    <textarea name="txtDes" class="form-control txtAddress" style="width: 100%; height: 95px;"></textarea>       
	                                </div>
		                        </div>
		                    </div>
		                    <div class="col-sm-12">
		                    	<div class="col-md-4">
				                    <div class="form-group">
				                        <input type="submit" name="btnSubmit" class="btnContact" value="<?php echo $this->lang->line('help_us_continue')?>" />
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
		placeholder: 'Select'
	});
	//======= dropdown daul form ========//
	$('#min-max-price-range').click(function (event) {
	    setTimeout(function(){ $('.price-label').first().focus();   },0);
	    $('.dropdown-menus').toggle();
	});
	var priceLabelObj;
	$('.price-label').focus(function (event) {
	    priceLabelObj=$(this);
	    $('.price-range').addClass('hide');
	    $('#'+$(this).data('dropdownId')).removeClass('hide');
	});

	$(".price-range li").click(function(){
	    priceLabelObj.attr('value', $(this).attr('data-value'));
	    var curElmIndex=$( ".price-label" ).index( priceLabelObj );
	    var nextElm=$( ".price-label" ).eq(curElmIndex+1);

	    if(nextElm.length){
	        $( ".price-label" ).eq(curElmIndex+1).focus();
	    }else{
	        $('#min-max-price-range').dropdown('toggle');
	    }
	});
	// $(document).on("click", function () {
	//     $('.dropdown-menus').hide();
	// });
</script>