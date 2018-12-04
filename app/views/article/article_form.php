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
    
?>

<style type="text/css">
    table tbody tr td img{width: 20px; margin-right: 10px}
    ul,ol{
        margin-bottom: 0px !important;
    }
    a{
        cursor: pointer;
    }
    body.wait, body.wait *{
        cursor: wait !important;   
    }
    .datepicker {z-index: 9999;}
</style>

    <div id="content-header" class="mini">
        <h1>New Article</h1>
        <ul class="mini-stats box-3">
            
        </ul>
    </div>  
    <div id="breadcrumb">
      <a href="<?php echo base_url('/sys/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href="<?php echo base_url("article/add?m=MTE=&p=NjY=")?>" title="Go to Store List" class="tip-bottom">Article</a>
      <a href='#' class="current"><?php if(isset($row->article_id)) echo 'Edit Article'; else echo 'New Article';?></a>
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
                <h5>Article Detail.</h5>
                <h5 class="result_text" style='color:red;'></h5>
            </div>

            <div class="widget-content nopadding">
                <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
                    
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Article Title</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="title" value='<?php echo isset($row->article_title)?"$row->article_title":""; ?>' id="title">
                                    <input type="text"  class="form-control input-sm hide" name="article_id" value='<?php echo isset($row->article_id)?$row->article_id:""; ?>' id="article_id">
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Article Title (Khmer)</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="title_kh" value='<?php echo isset($row->article_title_kh)?"$row->article_title_kh":""; ?>' id="title_kh">
                                </div>                   
                            </div>
                            
                        </div>
                         
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Category Name</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <select class="form-control" id="location_id">
                                        <option value="0">Please Select</option>
                                        <?php
                                        $locat=$this->db->query("SELECT * FROM tblmenus WHERE is_active='1'")->result();
                                            foreach ($locat as $me) {
                                                $se='';
                                                if(isset($row->menu_id))
                                                    if($row->menu_id==$me->menu_id)
                                                        $se='selected';
                                                echo "<option value='$me->menu_id' $se>$me->menu_name</option>";
                                            }
                                         ?>
                                    </select>
                                </div>                   
                            </div>
                            
                        </div>



                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Content</label>
                            <div class=" col-lg-10"> 
                                <div class="col-md-12">
                                    <div class="tabbable inline">
                                      <ul id="myTab" class="nav nav-tabs tab-bricky">
                                          <li id='first' class='active'>
                                              <a href="#english" data-toggle="tab" onclick="session_tab('english');"> English </a>
                                          </li>
                                      
                                           <li id='tp_inv' class=<?php if(isset($_SESSION["tab"])&&$_SESSION["tab"]=="khmer") {echo "active";} ?> >
                                              <a href="#khmer" data-toggle="tab" onclick="session_tab('khmer');"> Khmer </a>
                                          </li>
                                         
                                      </ul>
                                    </div>
                                    <div style="clear:both"></div>
                                    <div class="tab-content">
                                        <div id="english" class="tab-pane active">
                                            <div><textarea class="summernote" id='contents'><?php echo isset($row->content)?"$row->content":""; ?></textarea></div>
                                        </div>
                                        <div id="khmer" class="tab-pane ">
                                            <textarea class="summernote" id='contents_kh'><?php echo isset($row->content_kh)?"$row->content_kh":""; ?></textarea>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                        </div>

                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Event Date</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="article_date" value='<?php echo isset($row->article_date)?"$row->article_date":date('Y-m-d'); ?>' id="article_date">
                                </div>                   
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Keyword</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                  <textarea class="form-control" id="meta_keyword"><?php echo isset($row->meta_keyword)?"$row->meta_keyword":""; ?></textarea>
                                </div>                   
                            </div>
                            
                        </div>
                         <div class="form-group">
                            <label class='col-lg-2 control-label'>Meta Description</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                  <textarea class="form-control" id="meta_description"><?php echo isset($row->meta_desc)?"$row->meta_desc":""; ?></textarea>
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Icon (example : fa fa-user)</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm" name="icon" value='<?php echo isset($row->icon)?"$row->icon":""; ?>' id="icon">
                                  
                                </div>                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Is Active</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-2">
                                    <input type="checkbox"  class="form-control input-sm " name="is_active" id="is_active" <?php if (isset($row->is_active)){ if($row->is_active==1) echo 'checked'; }else{ echo "checked"; } ?>>
                                </div>                   
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Is Marguee</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-2">
                                    <input type="checkbox"  class="form-control input-sm " name="is_marguee" id="is_marguee" <?php if (isset($row->is_marguee)){ if($row->is_marguee==1) echo 'checked'; }else{ echo "checked"; } ?> >

                                </div>                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Images</label>
                            <div class=" col-lg-12"> 
                                <div class="col-md-12">
                                    <?php
                                    if(isset($row->article_id)){
                                        $img=$this->db->query("SELECT * FROM tblgallery WHERE article_id='$row->article_id'")->result();
                                        foreach ($img as $img) {
                                     ?>
                                             <div class="saouy">
                                                  <div data-fileindex="0" id="preview-1441024963117-0" class="file-preview-frame" style="margin:20px 0px;" >
                                                     <img style="width:auto;height:160px;" alt="" title="" class="file-preview-image" src="<?php echo site_url('/assets/upload/article/thumb/'.$row->article_id.'_'.$img->url) ?>">
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
                                    <?php }
                                     }
                                    ?>
                                    <input id="file-4" type="file" name="userfile[]" class="file" multiple data-upload-url="#">
                                    <p><b>Note : <span style="color:red;">maximum size 960 x 600px</span></b></p>
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
                                  <!-- <button id="cancel" name="cancel" type="button" class="btn btn-danger">Cancel</button> -->
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
    $('.kv-file-remove').click(function(){
        var id=$(this).attr('rel');
        var url="<?php echo site_url('article/removeimg')?>";
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
    })
    function uploads(article_id,formdata,msg){
        //alert(visitid+'/'+familyid);
        $.ajax({
            type:'POST',
            url:"<?PHP echo site_url('article/upload');?>/"+article_id,
            data:formdata,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                toasmsg('success',msg);
                //location.reload();
                //location.href="<?php echo site_url('article/index/?m='.$m.'&p='.$p) ?>";
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
                //location.reload();
                //location.href="<?php echo site_url('article/index/?m='.$m.'&p='.$p) ?>";

            }
        });
       
    } 
    $('#cancel').click(function(){
        location.href="<?PHP echo site_url('store/store/index');?>?<?php echo 'm=$m&p=$p' ?>";
    }) 
    $("#menu_type").change(function(){
        if($(this).val()==1)
            $("#article_tap").removeClass("hide");
        else{
            $("#article_tap").addClass("hide");

        }
    })
    $(function(){       
    $('#article_date').datepicker({ dateFormat: "yy-mm-dd" });
    // Form Validation
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
          var url="<?php echo site_url('article/save')?>";
          var is_active=0;
          if($('#is_active').is(':checked'))
                is_active=1;
          var is_marguee=0;
            if($('#is_marguee').is(':checked'))
              is_marguee=1;
          var data = CKEDITOR.instances.contents.getData();
          $('#contents').text(data);
          var data_kh= CKEDITOR.instances.contents_kh.getData();
          $('#contents_kh').text(data_kh);
          $("body").toggleClass("wait");
          setTimeout(function(){
              $.ajax({
                url:url,
                type:"POST",
                datatype:"Json",
                async:false,
                data:{title:$("#title").val(),
                    title_kh:$("#title_kh").val(),
                    article_date:$("#article_date").val(),
                    article_id:$("#article_id").val(),
                    content:$("#contents").val(),
                    content_kh:$("#contents_kh").val(),
                    keyword:$("#meta_keyword").val(),
                    meta_desc:$("#meta_description").val(),
                    icon:$("#icon").val(),
                    location_id:$("#location_id").val(),
                    is_active:is_active,
                    is_marguee:is_marguee
                },
                success:function(data) {
                    // $(".result_text").html(data.msg);
                    var formdata = new FormData(form);

                    if(data.article_id!='' && data.article_id!=null){
                        uploads(data.article_id,formdata,data.msg);
                        // toasmsg('success',data.msg);
                        // location.href='<?php echo site_url("article/index?m=".$m.'&p='.$p) ?>';
                    }else{
                        toasmsg('error',data.msg);
                    }
                    $('#basic_validate')[0].reset();
                }
              })
          }, 500);
        }
      });


    $("#is_active").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this category.")){
          $(this).val(0);
        }else{
          return false;
        }        
      }      
    });
    $("#is_marguee").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this category.")){
          $(this).val(0);
        }else{
          return false;
        }        
      }      
    });
    CKEDITOR.replace( 'contents',
    {
        filebrowserBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserImageBrowseUrl : "<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Images&Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserFlashBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Flash&Connector=ckeditor/ckfinder/core/connector/php/connector.php",
        filebrowserUploadUrl  :"<?php echo base_url();?>ckeditor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File",
        filebrowserImageUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Image",
        filebrowserFlashUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash"
            
      }); 
    CKEDITOR.replace( 'contents_kh',
    {
        filebrowserBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserImageBrowseUrl : "<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Images&Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserFlashBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Flash&Connector=ckeditor/ckfinder/core/connector/php/connector.php",
        filebrowserUploadUrl  :"<?php echo base_url();?>ckeditor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File",
        filebrowserImageUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Image",
        filebrowserFlashUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash"
            
      }); 
    // CKEDITOR.replace('contents',{
    //   filebrowserBrowseUrl: "<?php echo base_url(); ?>ckfinder/ckfinder.html?resourceType=Files"
    // });
    // CKFinder.setupCKEditor();

    // function loadEditor(id)
    // {
    //     var instance = CKEDITOR.instances[id];
    //     if(instance)
    //     {
    //         CKEDITOR.remove(instance);
    //     }
       
    // }
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
    
        
    
