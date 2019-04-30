<style type="text/css">
	table tbody tr td img{ width: 20px; margin-right: 10px; }
	ul,ol{ margin-bottom: 0px !important; }
	a{ cursor: pointer; }
	.datepicker { z-index: 9999; }
</style>
<div id="content-header" class="mini">
  <h1>Group Customer</h1>
  <ul class="mini-stats box-3"></ul>
</div>
<?php
	$m = $this->input->get('m');
	$p = $this->input->get('p');
?>
<div id="breadcrumb">
  <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
  <a href='#' class="current"><?php if(isset($row->location_id)) echo 'Edit Group Customer'; else echo "Group Customer";?></a>
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
          <h5>Group Customer</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
            <div class="form-group">
              <label class='col-lg-2 control-label'>Group Name</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->groupname)?"$row->groupname":""; ?>' id="txtgroupname">
                  <input type="text"  class="form-control input-sm hide" value='<?php echo isset($row->groupid)?$row->groupid:""; ?>' id="txtgroupid">
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
        email:{
          required:true,
          email: true
        },
        date:{
          required:true,
          date: true
        },
        url:{
          required:true,
          url: true
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
        var url="<?php echo site_url('customer/savegroup')?>";
        var is_active=0;
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            groupid:$("#txtgroupid").val(),
            groupname:$("#txtgroupname").val(),
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
