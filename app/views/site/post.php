
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
.text-danger {
    color: #e31713;
}
.fileinput-remove-button{
	display: none;
}
.fileinput-upload-button{
	display: none;
}
.main{
	background-color: #eee;
}
</style>
<div role="main" class="main">
	<section class="pgl-intro" style="padding-top: 30px; margin-bottom: 0px;">
		<div class="container">
			<div class="container">
				<!-- <h2>Post Property</h2> -->
				<div class="txt-header"><h3> Add Property</h3></div>
				<div class="lead pgl-bg-light">
			        <form enctype="multipart/form-data" method="POST" action="<?php echo site_url('site/site/savepost')?>">
		               <div class="row">
		                    <div class="col-md-6">
								<div class="form-group hide">
		                            <label class='col-lg-4 control-label'>Property Title <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txtid" class="form-control txtName" value="<?php echo $id;?>" id="txtid"/>                  
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Property Title <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="text" name="txttitle" class="form-control txtName" required="" id="txttitle"/>                  
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Price <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="number" name="txtprice" required="" class="form-control txtName" id="txtprice" style="max-width: 100%" />                 
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Size(Land, House) <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <input type="number" name="txtsize" required="" class="form-control txtName" id="txtsize" style="max-width: 100%"/>                 
	                                </div>
		                        </div>
		                        
		                    </div>
		                    <div class="col-md-6">
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Categories <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName" required="" name="txtcategory" id="txtcategory" style="max-width: 100%;">
                                        	<option value="">Please Select</option>
	                                        <?php
	                                        $locat=$this->db->query("SELECT * FROM tblpropertytype WHERE type_status = '1' ")->result();
	                                            foreach ($locat as $me) {
	                                                $se='';
	                                                if(isset($row->type_id))
	                                                    if($row->type_id==$me->typeid)
	                                                        $se='selected';
	                                                echo "<option value='$me->typeid' $se>$me->typename</option>";
	                                            }
	                                         ?>
	                                    </select>         
	                                </div>
		                        </div>
						        <div class="form-group">
						        	<label class='col-lg-4 control-label'>Property Type <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
									    <select class="form-control txtName" required="" name="txttype" id="txttype" style="max-width: 100%;" required="">
									    	<option value="">Please Select</option>
	                                        <option value="1">Sale</option>
	                                        <option value="2">Rent</option>
	                                        <option value="3">Sale & Rent</option>
									    </select>              
	                                </div>
		                        </div>
		                        <div class="form-group">
		                            <label class='col-lg-4 control-label'>Location <span class="text-danger">*</span></label>
	                                <div class="col-lg-8">
	                                    <select class="form-control txtName select2-single" required="" name="txtlocation" id="txtlocation" style="max-width: 100%;" required="">
									    	<option value="">Please Select</option>
	                                        <?php
	                                            $location=$this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
	                                            foreach ($location as $menu) {
	                                        ?>
	                                        	<option value="<?php echo $menu->propertylocationid;?>"><?php echo str_repeat("---- &nbsp;",$menu->level).$menu->locationname;?></option>
	                                        <?php 
	                                            }
	                                        ?>
									    </select>                  
	                                </div>
		                        </div>
			                </div>
			                <div class="col-md-12">
			                	<div class="form-group">
		                            <label class='col-lg-2 control-label'>Content</label>
	                                <div class="col-lg-10"> 
	                                    <textarea name="txtcontent" id="contents_pro" class="form-control txtMsg" style="width: 100%; height: 95px;"></textarea>                 
	                                </div>
		                        </div>
			                </div>
			                <div class="col-md-12" style="margin-top: 20px;"></div>
			                <div class="col-md-12">
			                	<div class="form-group">
		                            <label class='col-lg-2 control-label'>Map</label>
	                                <div class="col-lg-10"> 
	                                    <div id="map_canvas" style="height: 500px;"></div>                 
	                                </div>
		                        </div>
			                </div>
			                <div class="col-md-12" style="margin-top: 20px;"></div>
			                <div class="col-md-12">
			                	<div class="col-md-6">
			                        <div class="form-group">
			                            <label class='col-lg-4 control-label'>Latitude</label>
		                                <div class="col-lg-8">
		                                    <input type="text" name="latitude" class="form-control txtName" id="latitude"/>                  
		                                </div>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="form-group">
			                            <label class='col-lg-4 control-label'>Longtitude</label>
		                                <div class="col-lg-8">
		                                    <input type="text" name="longtitude" class="form-control txtName" id="longtitude"/> 
		                                </div>
			                        </div>
				                </div>
			                </div>
			                <div class="col-md-12">
			                	<div class="form-group">
		                            <label class='col-lg-2 control-label'>Image</label>
	                                <div class="col-lg-10">
                                        <input id="file-4" type="file" name="userfile[]" class="file" multiple data-upload-url="#">                
	                                </div>
		                        </div>
			                </div>
			                <div class="col-md-12">
			                	<div class="form-group">
		                            <label class='col-lg-2 control-label'>Who I am? <span class="text-danger">*</span></label>
	                                <div class="col-lg-10">
                                        <input type="text" name="txtwho" required="" value="<?php echo $owner?>" disabled="" class="form-control txtName" id="txtwho"/>      
	                                </div>
		                        </div>
			                </div>
		                    <div class="col-md-12">
		                    	<div class="form-group">
	                                <div class="col-lg-3"> 
	                                    <div class="form-group">
					                        <input type="submit" name="btnSubmit" class="btnContact" value="Post" />
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

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWZfWaMa42KBMR5apqkTAyDdnAkemyCHY"
  type="text/javascript"></script> -->
<script type="text/javascript">//<![CDATA[
    window.onload=function(){
      var map;
      function initialize() {
 
    	var myLatlng = new google.maps.LatLng(11.570516523819823,104.92183668505857);
        
        var myOptions = {
              zoom: 12,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              gestureHandling: 'greedy'
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var marker = new google.maps.Marker({
              draggable: true,
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
<script type="text/javascript">

	$(".select2-single").select2({
        allowClear:true,
        placeholder: 'Location'
    });

	CKEDITOR.replace('contents_pro',
    {
        filebrowserBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserImageBrowseUrl : "<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Images&Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserFlashBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Flash&Connector=ckeditor/ckfinder/core/connector/php/connector.php",
        filebrowserUploadUrl  :"<?php echo base_url();?>ckeditor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File",
        filebrowserImageUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Image",
        filebrowserFlashUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash"
            
    }); 
</script>