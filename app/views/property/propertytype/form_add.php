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
  $row = $this->db->query(" SELECT * FROM tblpropertytype as pt left join tblmenus as m ON pt.menu = m.menu_id WHERE pt.typeid='$id' ")->row();
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
  <h1><?php echo $this->lang->line('pc_header')?></h1>
  <ul class="mini-stats box-3">

  </ul>
</div>  
<div id="breadcrumb">
  <?php 
    $roleid=$this->session->userdata('roleid'); 
    $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
  ?>
  <a href="<?php if($rol->is_admin == 1 || $rol->is_admin == 2) echo base_url('/sys/dashboard'); else echo "";?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
  <a href="<?php echo base_url("property/propertytype/add?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom"><?php echo $this->lang->line('pc_header')?></a>
  <a href='#' class="current"><?php if(isset($row->typeid)) echo 'Edit Property Type'; else echo $this->lang->line('pc_header');?></a>
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
          <h5><?php echo $this->lang->line('pc_header');?></h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
            <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">

                        <div class="form-group">
                          <label class='col-lg-2 control-label'><?php echo $this->lang->line('pc_name')?></label>
                          <div class="col-lg-5"> 
                            <div class="col-md-12">
                              <input type="text"  class="form-control input-sm required" name="protype_name" value='<?php echo isset($row->typename)?$row->typename:""; ?>' id="protype_name">
                              <input type="text"  class="form-control input-sm hide" name="protype_id" value='<?php echo isset($row->typeid)?$row->typeid:""; ?>' id="protype_id">
                            </div>                   
                          </div>
                        </div>
                        <div class="form-group">
                          <label class='col-lg-2 control-label'><?php echo $this->lang->line('pc_addon')?></label>
                          <div class="col-lg-5"> 
                            <div class="col-md-12">
                              <select class="form-control" id="id_menu">
                                <option value="">-select-</option>
                                <?php 
                                  $query = $this->db->query("SELECT * FROM tblmenus where is_active = 1")->result();
                                  foreach($query as $val)
                                  {
                                    $sel = "";
                                    if($row->menu == $val->menu_id)
                                      $sel = "selected";
                                ?>
                                  <option <?php echo $sel;?> value="<?php echo $val->menu_id?>"><?php echo $val->menu_name?></option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>                   
                          </div>
                        </div>
                        <div class="form-group">
                          <label class='col-lg-2 control-label'><?php echo $this->lang->line('pc_note')?></label>
                          <div class="col-lg-5"> 
                            <div class="col-md-12">
                              <input type="text"  class="form-control input-sm" name="protype_note" value='<?php echo isset($row->type_note)?$row->type_note:""; ?>' id="protype_note">
                            </div>                   
                          </div>

                        </div>
                       <div class="form-group">
                        <label class='col-lg-2 control-label'><?php echo $this->lang->line('pc_active')?></label>
                        <div class=" col-lg-3"> 
                          <div class="col-md-2">
                            <input type="checkbox"  class="form-control input-sm " name="is_active" id="is_active" <?php if (isset($row->type_status)){ if($row->type_status==1) echo 'checked'; }else{ echo "checked"; } ?>>
                          </div>                   
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label"></label>                      
                        <div class="col-md-10">
                          <div class="col-lg-1">
                            <button id="save" name="save" type="submit" class="btn btn-primary"><?php echo $this->lang->line('pc_save')?></button>
                          </div>
                          <div class="col-lg-1">
                            <button id="cancel" name="cancel" type="button" class="btn btn-danger"><?php echo $this->lang->line('pc_cancel')?></button>
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
        location.href="<?PHP echo site_url('property/propertytype/index');?>?<?php echo 'm=$m&p=$p' ?>";
      });
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
        var url="<?php echo site_url('property/propertytype/save')?>";
        var is_active=0;
        var tab_con = [];
        var tab_id = [];
        // tab_id.push($('#tab_id').val());
        if($('#is_active').is(':checked'))
          is_active=1;
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            protype_id:$("#protype_id").val(),
            protype_name:$("#protype_name").val(),
            protype_note:$("#protype_note").val(),
            menu_id:$('#id_menu').val(),
            is_active:is_active
          },
          success:function(data) {
              var formdata = new FormData(form);
              if(data.protype_id!='' && data.protype_id!=null){
                 toasmsg('success',data.msg);
                 location.href='<?php echo site_url("property/propertytype/index?m=".$m.'&p='.$p) ?>';
              }else{
                toasmsg('error',data.msg);
              }
              $('#basic_validate')[0].reset();
              //console.log(data);
          }
        })
      }
    });


    $("#is_active").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this PropertyType.")){
          $(this).val(0);
        }else{
          return false;
        }        
      }      
    });
    /*
    $('input').on('ifChecked', function(event){      
        $(this).val(1);          
    });
   $('input').on('ifUnchecked', function(event){
      if(window.confirm("Are you sure ! Do you want to set Inactive for this stock.")){
        $(this).val(0);
      }else{
        return false;
      } 
    });
    */
  });
</script>



