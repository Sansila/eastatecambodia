<style type="text/css">
	table tbody tr td img{ width: 20px; margin-right: 10px; }
	ul,ol{ margin-bottom: 0px !important; }
	a{ cursor: pointer; }
	.datepicker { z-index: 9999; }
</style>
<div id="content-header" class="mini">
  <h1>Customer</h1>
  <ul class="mini-stats box-3"></ul>
</div>
<?php
	$m = $this->input->get('m');
	$p = $this->input->get('p');
?>
<div id="breadcrumb">
  <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
  <a href='#' class="current"><?php if(isset($row->location_id)) echo 'Edit Group Customer'; else echo "Customer";?></a>
</div>

<div class="col-sm-6" style="text-align: center">
  <strong>
    <center class='error' style='color:red;'><?php if(isset($error)) echo "$error"; ?></center>
  </strong>
</div>

<!-- main content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon">
            <i class="fa fa-align-justify"></i>
          </span>
          <h5>Customer</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
            <div class="form-group">
              <label class='col-lg-2 control-label'>Group Name</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <select class="form-control required" name="txtgroup" id="txtgroup">
                  	<option value="">Select</option>
                  	<?php 
                  		$groups = $this->cust->getgroupcustomer();
                  		foreach ($groups as $group) {
                  			echo '<option value="'.$group->groupid.'">'.$group->groupname.'</option>';
                  		}

                  	?>
                  </select>
                  <input type="text"  class="form-control input-sm hide" value='<?php echo isset($row->customerid)?"$row->customerid":""; ?>' id="txtcustomerid" name="txtcustomerid">
                </div>
              </div>
              <label class='col-lg-2 control-label'>Customer Name</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->customer_name)?"$row->customer_name":""; ?>' id="txtcustomer" name="txtcustomer">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Company Name</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->company)?"$row->company":""; ?>' id="txtcompany" name="txtcompany">
                </div>
              </div>
              <label class='col-lg-2 control-label'>Title</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->title)?"$row->title":""; ?>' id="txttitle" name="txttitle">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Phone</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->phone)?"$row->phone":""; ?>' id="txtphone" name="txtphone">
                </div>
              </div>
              <label class='col-lg-2 control-label'>Email</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->email)?"$row->email":""; ?>' id="txtemail" name="txtemail">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Address</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->address)?"$row->address":""; ?>' id="txtaddress" name="txtaddress">
                </div>
              </div>
              <label class='col-lg-2 control-label'>Location Name</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  	<select class="form-control required select2-single" id="txtlocation" multiple="multiple" name="txtlocation">
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
            <div class="form-group">
              <label class='col-lg-2 control-label'>Remark</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" value='<?php echo isset($row->remark)?"$row->remark":""; ?>' id="txtremark">
                </div>
              </div>
              <label class='col-lg-2 control-label'>Description</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm " value='<?php echo isset($row->description)?"$row->description":""; ?>' id="txtdescription">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'><?php echo $this->lang->line('mn_active')?></label>
              <div class=" col-lg-3"> 
                <div class="col-md-2">
                  <input type="checkbox"  class="form-control input-sm " name="is_active" id="is_active" <?php if (isset($row->is_active)){ if($row->is_active==1) echo 'checked'; }else{ echo "checked"; } ?>>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label"></label>                      
              <div class="col-md-10">
                <div class="col-lg-1">
                  <button id="save" name="save" type="submit" class="btn btn-primary"><?php echo $this->lang->line('mn_save')?></button>
                </div>
                <div class="col-lg-1">
                  <button id="cancel" name="cancel" type="button" class="btn btn-danger"><?php echo $this->lang->line('mn_cancel')?></button>
                </div>
              </div>
            </div>
          </form>                
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function PreviewImage(event) {
    var uppreview=$(event.target).attr('rel');
    var upimage=$(event.target).attr('id');
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(upimage).files[0]);
    oFReader.onload = function (oFREvent) {
      document.getElementById(uppreview).src = oFREvent.target.result;
      document.getElementById(uppreview).style.backgroundImage = "none";
    };
  };
  function isNumberKey(evt){
    var e = window.event || evt; // for trans-browser compatibility 
    var charCode = e.which || e.keyCode; 
    if ((charCode > 45 && charCode < 58) || charCode == 8){ 
      return true; 
    } 
    return false;  
  }  
  $(".select2-single").select2({
    	allowClear:true,
    	placeholder: 'Location'
	});
  $('#cancel').click(function(){
    location.href="<?PHP echo site_url('category/index?m=Nw==&p=NzY=');?>";
  });
  $(function(){
    //Form Validation
    $("#basic_validate").submit(function(e){
      e.preventDefault();
    })
    .validate({
      rules:{
        required:{
          required:true
        },
        txtgroup:{
        	required:true,
        },
        txtcustomer:{
        	required:true,
        },
        txtcompany:{
        	required:true,
        },
        txttitle:{
        	required:true,
        },
        txtphone:{
        	required:true,
        },
        txtemail:{
        	required:true,
        	email: true,
        },
        txtaddress:{
        	required:true,
        },
        txtlocation:{
        	required:true,
        }
      },
      errorClass: "help-inline",
      errorElement: "span",
      highlight:function(element, errorClass, validClass) {
        $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
      },
      submitHandler: function(form) {
        var url="<?php echo site_url('customer/savecustomer')?>";
        var is_active=0;
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{  
          	customerid:$('#txtcustomerid').val(),          
            groupid:$("#txtgroup").val(),
            customername:$("#txtcustomer").val(),
            company:$("#txtcompany").val(),
            title:$("#txttitle").val(),
            phone:$("#txtphone").val(),
            email:$("#txtemail").val(),
            address:$("#txtaddress").val(),
            location:$("#txtlocation").val(),
            remrk:$('#txtremark').val(),
            description:$("#txtdescription").val(),
            is_active:is_active
          },
          success:function(data) {
            var formdata = new FormData(form);
            if(data.groupid!='' && data.groupid!=null){
              toasmsg('success',data.msg);
              location.href='<?php echo site_url("customer/viewgroup?m=".$m.'&p='.$p) ?>';
            }else{
              toasmsg('error',data.msg);
            }
            $('#basic_validate')[0].reset();
          }
        })
      }
    });
    $("#is_active").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this Group.")){
          $(this).val(0);
        }else{
          return false;
        }        
      }      
    });
  });

</script>
