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
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" name="projectname" value='<?php echo isset($row->project_name)?"$row->project_name":""; ?>' id="projectname">
                  <input type="text"  class="form-control input-sm hide" name="projectid" value='<?php echo isset($row->projectid)?$row->projectid:""; ?>' id="projectid">
                </div>                   
              </div>
              <label class='col-lg-2 control-label'><?php echo $this->lang->line('p_loc')?></label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                    <select class="form-control select2-single input-sm required" id="location_id" name="location_id">
                        <option value="">Please Select</option>
                        <?php
                            $location=$this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
                            foreach ($location as $menu) {
                                $sel='';
                                if(isset($row->project_location))
                                  if($row->project_location==$menu->propertylocationid)
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
              <label class='col-lg-2 control-label'>Phone</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" name="phone" value='<?php echo isset($row->phone)?"$row->phone":""; ?>' id="phone">
                </div>                   
              </div>
              <label class='col-lg-2 control-label'>Email</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" name="email" value='<?php echo isset($row->email)?"$row->email":""; ?>' id="email">
                </div>                   
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Contact Person</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" name="contactperson" value='<?php echo isset($row->contact_person)?"$row->contact_person":""; ?>' id="contactperson">
                </div>                   
              </div>
              <label class='col-lg-2 control-label'>Contact Title</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" name="contacttitle" value='<?php echo isset($row->contact_title)?"$row->contact_title":""; ?>' id="contacttitle">
                </div>                   
              </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Website</label>
              <div class="col-lg-4"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm" name="website" value='<?php echo isset($row->website)?"$row->website":""; ?>' id="website">
                </div>                   
              </div>
            </div>
            <div class="form-group">
                <label class='col-lg-2 control-label'>Project Description</label>
                <div class=" col-lg-10"> 
                    <div class="col-md-12">
                        <!-- <div style="clear:both"></div> -->
                        <div class="tab-content">
                            <div id="english" class="tab-pane active">
                                <div><textarea id='contents_pro' style="margin: 0px; width: 100%; height: 275px; resize: none;"><?php echo isset($row->remark)?"$row->remark":""; ?></textarea></div>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Image</label>
              <div class=" col-lg-12"> 
                  <div class="col-md-12">
                      <?php
                      if(isset($row->projectid)){
                          $imgs=$this->db->query("SELECT * FROM tblgallery WHERE projectid = $row->projectid ")->result();
                          foreach ($imgs as $img) {
                       ?>
                               <div class="saouy">
                                    <div data-fileindex="0" id="preview-1441024963117-0" class="file-preview-frame" style="margin:20px 0px;" >
                                      <?php 
                                          $extends = pathinfo($img->url, PATHINFO_EXTENSION);
                                          $hide = "";
                                          if($extends == "mp4" || $extends == "movie" || $extends == "mpe" || $extends == "qt" || $extends == "mov" || $extends == "avi" || $extends == "mpg" || $extends == "mpeg")
                                          {
                                      ?>
                                          <video style="height: 176px;" class="img-responsive" controls>
                                              <source src="<?php echo base_url('assets/upload/project/'.$img->projectid.'_'.$img->url); ?>">
                                          </video>
                                      <?php 
                                          }else{
                                      ?>
                                       <img style="width:auto;height:160px;" alt="" title="" class="file-preview-image" src="<?php echo site_url('assets/upload/project/thumb/'.$row->projectid.'_'.$img->url) ?>">
                                       <?php 
                                          }
                                       ?>
                                       <div class="file-thumbnail-footer">
                                        <div class="file-caption-name" style="width: 250px;" title=""><p><?php echo $img->url; ?></p><div><span class="hide realname"><?php echo $value?></span></div></div>
                                        <div class="file-actions">
                                        <div class="file-footer-buttons">
                                        <button title="Upload file" class="hide kv-file-upload btn btn-xs btn-default" type="button"><i class="glyphicon glyphicon-upload text-info"></i>
                                        </button>
                                        <button title="Remove file" class="kv-file-remove btn btn-xs btn-default" type="button" rel='<?php echo $img->gallery_id ?>'><i class="glyphicon glyphicon-trash text-danger"></i></button>
                                            </div>
                                            <div title="Not uploaded yet" tabindex="-1" class="file-upload-indicator"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        </div>
                                    </div>

                              </div>
                      <?php 
                          }
                       }
                      ?>
                      <input id="file-4" type="file" name="userfile[]" class="file" multiple data-upload-url="#">
                      <!-- <p><b>Note : <span style="color:red;">maximum size 960 x 600px</span></b></p> -->
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
    $('.kv-file-remove').click(function(){
        var id=$(this).attr('rel');
        var url="<?php echo site_url('project/removeimg')?>";
        $.ajax({
                url:url,
                type:"POST",
                datatype:"Json",
                async:false,
                data:{id:id },
                success:function(data) {
                    // alert(data);
                }
              })
        $(this).closest('.saouy').remove();
    });
    function uploads(projectid,formdata,msg){
        //alert(visitid+'/'+familyid);
        $.ajax({
            type:'POST',
            url:"<?PHP echo site_url('project/upload');?>/"+projectid,
            data:formdata,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                toasmsg('success',msg);
                console.log("success");
                console.log(data);
                setTimeout(function(){ 
                    location.reload();
                }, 1000);
            },
            error: function(data){
                console.log("error");
                console.log(data);
                setTimeout(function(){ 
                    location.reload();
                }, 1000);
            }
        });
       
    } 

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
        var data = CKEDITOR.instances.contents_pro.getData();
          $('#contents_pro').text(data);
        $.ajax({
          url:url,
          type:"POST",
          datatype:"Json",
          async:false,
          data:{            
            projectid:$("#projectid").val(),
            projectname:$("#projectname").val(),
            locationid:$('#location_id').val(),
            phone:$('#phone').val(),
            email:$('#email').val(),
            contactperson:$('#contactperson').val(),
            contacttitle:$('#contacttitle').val(),
            website:$('#website').val(),
            remark:$('#contents_pro').val(),
          },
          success:function(data) {
              var formdata = new FormData(form);
              if(data.projectid!='' && data.projectid!=null){
                 // toasmsg('success',data.msg);
                 // setTimeout(function(){
                 // 	location.href='<?php echo site_url("project/index?m=".$m.'&p='.$p) ?>';
                 // },1000);
                 uploads(data.projectid,formdata,data.msg);
              }else{
                toasmsg('error',data.msg);
              }
              $('#basic_validate')[0].reset();
          }
        })
      }
    });
    CKEDITOR.replace( 'contents_pro',
    {
        filebrowserBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserImageBrowseUrl : "<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Images&Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserFlashBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Flash&Connector=ckeditor/ckfinder/core/connector/php/connector.php",
        filebrowserUploadUrl  :"<?php echo base_url();?>ckeditor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File",
        filebrowserImageUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Image",
        filebrowserFlashUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash"
            
    });
  });
</script>