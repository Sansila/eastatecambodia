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
  $row = $this->db->query(" SELECT * FROM tblpropertylocation WHERE propertylocationid = '$id' ")->row();
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
  <h1>New Property Location</h1>
  <ul class="mini-stats box-3">

  </ul>
</div>  
<div id="breadcrumb">
  <a href="<?php echo base_url('/sys/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
  <a href="<?php echo base_url("property/propertylocation/add?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Property Location</a>
  <a href='#' class="current"><?php if(isset($row->propertylocationid)) echo 'Edit Property Location'; else echo 'New Property Location';?></a>
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
          <h5>Category Detail.</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">

            <div class="form-group">
              <label class='col-lg-2 control-label'>Location Name</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" name="loc_name" value='<?php echo isset($row->locationname)?"$row->locationname":""; ?>' id="loc_name">
                  <input type="text"  class="form-control input-sm hide" name="loc_id" value='<?php echo isset($row->propertylocationid)?$row->propertylocationid:""; ?>' id="loc_id">
                </div>                   
              </div>

            </div>
                <div class="form-group">
                  <label class='col-lg-2 control-label'>Parent</label>
                  <div class="col-lg-5"> 
                    <div class="col-md-12">
                      <select class="form-control" id="parent">
                        <option value="0">Please Select</option>
                          <?php
                            $location=$this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
                              foreach ($location as $menu) {
                                $sel='';
                                if(isset($row->parent_id))
                                if($row->parent_id==$menu->propertylocationid)
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
                        <label class='col-lg-2 control-label'>Is Active</label>
                        <div class=" col-lg-3"> 
                          <div class="col-md-2">
                            <input type="checkbox"  class="form-control input-sm " name="is_active" id="is_active" <?php if (isset($row->status)){ if($row->status==1) echo 'checked'; }else{ echo "checked"; } ?>>
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
        location.href="<?PHP echo site_url('menu/index');?>?<?php echo 'm=$m&p=$p' ?>";
      }) 
      // $("#menu_type").change(function(){
      //   if($(this).val()=='article'){
      //     $("#article_tap").removeClass("hide");
      //     $("#article_id").prop("required",true);
      //   }
      //   else{
      //     $("#article_tap").addClass("hide");
      //     $("#article_id").prop("required",false);

      //   }
      // })
      $(function(){       

    // Form Validation
    $("#tab_aritcle").select2();
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
        var url="<?php echo site_url('property/propertylocation/save')?>";
        var is_active=0;
        var tab_con = [];
        var tab_id = [];
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            loc_id:$("#loc_id").val(),
            loc_name:$("#loc_name").val(),
            parent_id:$("#parent").val(),
            is_active:is_active
          },
          success:function(data) {
              var formdata = new FormData(form);
              if(data.loc_id!='' && data.loc_id!=null){
                 toasmsg('success',data.msg);
                 location.href='<?php echo site_url("property/propertylocation/index?m=".$m.'&p='.$p) ?>';
              }else{
                toasmsg('error',data.msg);
              }
              $('#basic_validate')[0].reset();

              console.log(data);
          }
        })
      }
    });


    $("#is_active").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this location.")){
          $(this).val(0);
        }else{
          return false;
        }        
      }      
    });
  });
</script>



