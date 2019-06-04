<style type="text/css">
	table tbody tr td img{ width: 20px; margin-right: 10px; }
	ul,ol{ margin-bottom: 0px !important; }
	a{ cursor: pointer; }
	.datepicker { z-index: 9999; }
</style>
<div id="content-header" class="mini">
  <h1>User Group</h1>
  <ul class="mini-stats box-3"></ul>
</div>
<?php
	$m = $this->input->get('m');
	$p = $this->input->get('p');
?>
<div id="breadcrumb">
  <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
  <a href='#' class="current"><?php if(isset($row->groupid)) echo 'Edit User Group'; else echo "User Group";?></a>
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
          <h5> User Group</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">

	            <div class="form-group">
	              <label class='col-lg-2 control-label'>Group Name</label>
	              <div class="col-lg-4"> 
	                <div class="col-md-12">
	                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->groupname)?"$row->groupname":""; ?>' id="txtgroupname">
	                  <input type="text"  class="form-control input-sm hide" value='<?php echo isset($row->groupid)?$row->groupid:""; ?>' id="txtgroupid">
	                </div>
	              </div>

	              <label class='col-lg-2 control-label'>Remark</label>
	              <div class="col-lg-4"> 
	                <div class="col-md-12">
	                  	<textarea class="form-control" name="txtremark" id="txtremark"></textarea>
	                </div>
	              </div>
	            </div>

	        	<div class="form-group">
	              <label class='col-lg-2 control-label'>Admin User</label>
	              <div class="col-lg-4"> 
	                <div class="col-md-12">
	                	<select class="form-control select2-single required" name="txtisadmin" id="txtisadmin">
		                  	<option value="">Select</option>
		                  	<?php 
		                  		$alluser = $this->guser->getAllUser();
		                  		foreach ($alluser as $user) {
		                  			echo '<option value="'.$user->userid.'">'.$user->user_name.'</option>';
		                  		}
		                  	?>
		                </select>
	                </div>
	              </div>

	              <label class='col-lg-2 control-label'><?php echo $this->lang->line('mn_active')?></label>
	              <div class=" col-lg-4"> 
	                <div class="col-md-4">
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

	$(".select2-single").select2({
    	allowClear:true,
    	placeholder: 'User Is Admin'
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
        txtisadmin:{
          required:true
        },
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
        var url="<?php echo site_url('groupuser/save')?>";
        var is_active=0;
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            groupid: $("#txtgroupid").val(),
            groupname: $("#txtgroupname").val(),
            is_admin: $("#txtisadmin").val(),
            remark: $("#txtremark").val(), 
            is_active:is_active
          },
          success:function(data) {
            var formdata = new FormData(form);
            if(data.groupid!='' && data.groupid!=null){
              toasmsg('success',data.msg);
              // setTimeout(function(){
              //   location.href='<?php echo site_url("customer/viewgroup?m=".$m.'&p='.$p) ?>';
              // },500);
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
