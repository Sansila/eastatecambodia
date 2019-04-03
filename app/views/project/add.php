<?php
$categoryid=isset($cate['categoryid'])?$cate['categoryid']:"";
$m='';
$p='';
$storeid='';
if(isset($store->storeid))
 $storeid=$store->storeid;

if(isset($_GET['m'])){
  $m=$_GET['m'];
}
if(isset($_GET['p'])){
  $p=$_GET['p'];
}
if(isset($id))
{
	$row = $this->db->query("SELECT * FROM tblproject WHERE projectid='$id' ")->row();
}
?>

<style type="text/css">
table tbody tr td img{width: 20px; margin-right: 10px}
ul,ol{
  margin-bottom: 0px !important;
}
a{
  cursor: pointer;
}
.datepicker {z-index: 9999;}
</style>

<div id="content-header" class="mini">
  <h1>Project</h1>
  <ul class="mini-stats box-3">

  </ul>
</div>  
<div id="breadcrumb">
  <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
  <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Project</a>
  <a href='#' class="current"><?php if(isset($row->menu_id)) echo 'Edit Project'; else echo 'New Project';?></a>
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
          <h5>Project Detail.</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">

            <div class="form-group">
              <label class='col-lg-2 control-label'>Poject Name</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" name="projectname" value='<?php echo isset($row->projectname)?"$row->projectname":""; ?>' id="projectname">
                  <input type="text"  class="form-control input-sm hide" name="projectid" value='<?php echo isset($row->projectid)?$row->projectid:""; ?>' id="projectid">
                </div>                   
              </div>

            </div>
            <div class="form-group hide">
              	<label class='col-lg-2 control-label'><?php echo $this->lang->line('p_loc')?></label>
                <div class="col-lg-4"> 
                    <div class="col-md-12">
                        <select class="form-control select2-single input-sm required" id="location_id" name="location_id">
                            <option value="">Please Select</option>
                            <?php
                                $location=$this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
                                foreach ($location as $menu) {
                                    $sel='';
                                    if(isset($row->locationid))
                                    	if($row->locationid==$menu->propertylocationid)
                                    		$sel='selected';
                            ?>
                            <option value="<?php echo $menu->propertylocationid;?>" <?php echo $sel; ?>><?php echo str_repeat("---- &nbsp;",$menu->level).$menu->locationname;?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>                   
                </div>

                </div>
 
                      <div class="form-group">
                        <label class="col-lg-2 control-label"></label>                      
                        <div class="col-md-10">
                          <div class="col-lg-1">
                            <button id="save" name="save" type="submit" class="btn btn-primary">Save</button>
                          </div>
                          <div class="col-lg-1">
                            <button id="cancel" name="cancel" type="button" class="btn btn-danger">Cancel</button>
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

       function isNumberKey(evt){
        var e = window.event || evt; // for trans-browser compatibility 
        var charCode = e.which || e.keyCode; 
        if ((charCode > 45 && charCode < 58) || charCode == 8){ 
          return true; 
        } 
        return false;  
      }  
      $('#cancel').click(function(){
        location.href="<?PHP echo site_url('project/index');?>?<?php echo 'm=$m&p=$p' ?>";
      });
      $(".select2-single").select2({
	        allowClear:true,
	        placeholder: 'Location'
	  });

   $(function(){       
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
        var url="<?php echo site_url('project/save')?>";
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            projectid:$("#projectid").val(),
            projectname:$("#projectname").val()
          },
          success:function(data) {
              var formdata = new FormData(form);
              if(data.projectid!='' && data.projectid!=null){
                 toasmsg('success',data.msg);
                 setTimeout(function(){
                 	location.href='<?php echo site_url("project/index?m=".$m.'&p='.$p) ?>';
                 },1000);
              }else{
                toasmsg('error',data.msg);
              }
              $('#basic_validate')[0].reset();
          }
        })
      }
    });

  });
</script>