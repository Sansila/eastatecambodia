<?php
    $categoryid=isset($cate['categoryid'])?$cate['categoryid']:"";
  $m='';
  $p='';
  $product_id='';
  if(isset($row->product_id))
         $product_id=$row->product_id;
  if(isset($_GET['m'])){
      $m=$_GET['m'];
    }
    if(isset($_GET['p'])){
        $p=$_GET['p'];
    }
    $image_part=base_url('assets/upload/no_image.jpg');
    if(file_exists(FCPATH."/assets/upload/product/$product_id.png")){
        $image_part=base_url("/assets/upload/product/$product_id.png");
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
        <h1>New Product</h1>
        <ul class="mini-stats box-3">
            
        </ul>
    </div>  
    <div id="breadcrumb">
      <a href="<?php echo base_url('/sys/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Product</a>
      <a href='#' class="current"><?php if(isset($row->article_id)) echo 'Edit Product'; else echo 'New Product';?></a>
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
                <h5>Product Detail.</h5>
                <h5 class="result_text" style='color:red;'></h5>
            </div>

            <div class="widget-content nopadding">
                <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
                    
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Product Name</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="product_name" value='<?php echo isset($row->product_name)?"$row->product_name":""; ?>' id="product_name">
                                    <input type="text"  class="form-control input-sm hide" name="product_id" value='<?php echo isset($row->product_id)?$row->product_id:""; ?>' id="product_id">
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Menu</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                   <select class="form-control required" id="menu_id">
                                     <option value=''>Please Select</option>
                                     <?php
                                     $me=$this->db->query("SELECT * FROM tblmenu WHERE menu_type='2'")->result();
                                     foreach ($me as $key => $menu) {
                                        $sel='';
                                        if(isset($row->product_id))
                                            if($row->menu_id==$menu->menu_id)
                                                $sel="selected='selected'";
                                         echo "<option value='$menu->menu_id' $sel>$menu->menu_name</option>";
                                     }
                                      ?>
                                   </select>
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Description</label>
                            <div class=" col-lg-10"> 
                                <div class="col-md-12">
                                    <textarea class="summernote" id='contents'><?php echo isset($row->content_desc)?"$row->content_desc":""; ?></textarea>
                                </div>                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Description Bottom</label>
                            <div class=" col-lg-10"> 
                                <div class="col-md-12">
                                    <textarea class="summernote" id='contents_buttom'><?php echo isset($row->content_bottom)?"$row->content_bottom":""; ?></textarea>
                                </div>                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Image</label>
                            <div class="col-lg-3"> 
                                

                                <div class="col-md-10">
                                    <img  onclick="$('#uploadImage').click();" src="<?php echo $image_part?>" id="uploadPreview" style='width:100%; border:solid 1px #CCCCCC; padding:3px;'>
                                    <input id="uploadImage" rel='uploadPreview' accept="image/gif, image/jpeg, image/jpg, image/png" type="file" name="userfile" onchange="PreviewImage(event);" style="visibility:hidden; display:none" />
                                    <!-- <input type='button' class="btn btn-success" onclick="$('#uploadImage').click();" value='Browse'/> -->
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
    
    function PreviewImage(event) {
                var uppreview=$(event.target).attr('rel');
                //alert(uppreview);
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
        location.href="<?PHP echo site_url('store/store/index');?>?<?php echo 'm=$m&p=$p' ?>";
    }) 
   
    function uploads(adsid,formdata){
        //alert(visitid+'/'+familyid);
        $.ajax({
            type:'POST',
            url:"<?PHP echo site_url('product/do_upload');?>/"+adsid,
            data:formdata,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // location.reload();
                location.href='<?php echo site_url("product/index?m=".$m.'&p='.$p) ?>';
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
                location.href='<?php echo site_url("product/index?m=".$m.'&p='.$p) ?>';
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
          var url="<?php echo site_url('product/save')?>";
          var is_active=0;
          if($('#is_active').is(':checked'))
                is_active=1;
          var data = CKEDITOR.instances.contents.getData();
          var data_b = CKEDITOR.instances.contents_buttom.getData();

          $('#contents').text(data);
          $('#contents_buttom').text(data_b);
          setTimeout(function(){
              $.ajax({
                url:url,
                type:"POST",
                datatype:"Json",
                async:false,
                data:{product_name:$("#product_name").val(),
                    product_id:$("#product_id").val(),
                    menu_id:$("#menu_id").val(),
                    content:$("#contents").val(),
                    content_b:$("#contents_buttom").val(),
                    is_active:is_active
                },
                success:function(data) {
                    // $(".result_text").html(data.msg);
                    var formdata = new FormData(form);
                    if(data.product_id!='' && data.product_id!=null){
                        uploads(data.product_id,formdata)
                        toasmsg('success',data.msg);

                        // location.href='<?php echo site_url("product/index?m=".$m.'&p='.$p) ?>';
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
    CKEDITOR.replace( 'contents',
    {
        filebrowserBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserImageBrowseUrl : "<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Images&Connector=ckeditor/ckfinder/core/connectors/php/connector.php",
        filebrowserFlashBrowseUrl :"<?php echo base_url();?>ckeditor/ckfinder/ckfinder.html?Type=Flash&Connector=ckeditor/ckfinder/core/connector/php/connector.php",
        filebrowserUploadUrl  :"<?php echo base_url();?>ckeditor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File",
        filebrowserImageUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Image",
        filebrowserFlashUploadUrl : "<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash"
            
      }); 
    CKEDITOR.replace( 'contents_buttom',
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
    // CKEDITOR.replace('contents_buttom',{
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
    
        
    
