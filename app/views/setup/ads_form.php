<?php
  $m='';
  $p='';
  
  if(isset($_GET['m'])){
      $m=$_GET['m'];
    }
    if(isset($_GET['p'])){
        $p=$_GET['p'];
    }
    //echo FCPATH;
    $adsid='';
    $arr=array();
    if(isset($data->banner_id)){
        $adsid=$data->banner_id;
    }

    $image_part=base_url('assets/upload/no_image.jpg');
    if(file_exists(FCPATH."/assets/upload/banner/thumb/$adsid.png")){
        $image_part=base_url("/assets/upload/banner/thumb/$adsid.png");
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
        <h1>NEW BANNER</h1>
        <ul class="mini-stats box-3">
            
        </ul>
    </div>  
    <div id="breadcrumb">
      <a href="<?php echo base_url('index.php/system/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href="<?php echo base_url("index.php/Setup/setupads/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Banner</a>
      <a href='#' class="current"><?php if(isset($data->adsid)) echo 'Edit Banner'; else echo 'New Banner';?></a>
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
                <h5>Banner Detail.</h5>
                <h5 class="result_text" style='color:red;'></h5>
            </div>

            <div class="widget-content nopadding">
                <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
                    
                        
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Banner Title</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="banner_title" value='<?php echo isset($data->title)?$data->title:""; ?>' id="banner_title">
                                    <input type='text' class='hide' id='banner_id' value='<?php echo isset($data->banner_id)?$data->banner_id:""; ?>'/>
                                </div>                   
                            </div>
                            
                            <label class='col-lg-2 control-label'>Banner Location</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-12">
                                    <select id='location_id' class='form-control'>
                                        <option value='0'>----select---</option>
                                        <?php for ($i=1; $i <= 4 ; $i++) {
                                            $se = '';
                                            if(isset($data->banner_location))
                                            {
                                                if($data->banner_location == $i)
                                                    $se = 'selected';
                                            }

                                            if($i == 1)
                                            {
                                                $bannerlog = 'Banner Top';
                                            }elseif($i == 2)
                                            {
                                                $bannerlog = 'Banner Left';
                                            }elseif($i == 3)
                                            {
                                                $bannerlog = 'Banner Bottom';
                                            }elseif ($i == 4) {
                                                $bannerlog = 'Banner Right';
                                            } 
                                            echo '<option value="'.$i.'" '.$se.' >'.$bannerlog.'</option>';
                                        }?>
                                    </select>
                                </div>                   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Orders</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm" name="orders" value='<?php echo isset($data->orders)?$data->orders:""; ?>' id="orders">
                                </div>                   
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Link</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm" name="link" value='<?php echo isset($data->link)?$data->link:""; ?>' id="link">
                                </div>                   
                            </div>
                            <label class='col-lg-2 control-label'>Images</label>
                            <div class="col-lg-3"> 
                                <div class="col-md-10">
                                    <img  onclick="$('#uploadImage').click();" src="<?php echo $image_part?>" id="uploadPreview" style='width:100%; border:solid 1px #CCCCCC; padding:3px;'>
                                    <input id="uploadImage" rel='uploadPreview' accept="image/*" type="file" name="userfile" onchange="PreviewImage(event);" style="visibility:hidden; display:none" />
                                    <!-- <input type='button' class="btn btn-success" onclick="$('#uploadImage').click();" value='Browse'/> -->
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
            url:"<?PHP echo site_url('setup/setupads/do_upload');?>/"+adsid,
            data:formdata,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // location.reload();
                location.href="<?php echo site_url('setup/setupads/index/?m='.$m.'&p='.$p) ?>";

                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
                location.href="<?php echo site_url('setup/setupads/index/?m='.$m.'&p='.$p) ?>";

            }
        });
       
    }
    $(function(){       
     
    // Form Validation`
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
          var url="<?php echo site_url('setup/setupads/save')?>";
          var is_active=1;
          // if($('#is_active').is(':checked'))
          //       is_active=1;
          
          $.ajax({
            url:url,
            type:"POST",
            datatype:"Json",
            async:false,
            data:{          
                banner_id:$("#banner_id").val(),
                banner_title:$("#banner_title").val(),
                link:$("#link").val(),
                location:$("#location_id").val(),
                orders:$("#orders").val(),
                is_active:is_active
            },
            success:function(data) {
                // $(".result_text").html(data.msg);
                var formdata = new FormData(form);
                if(data.banner_id!='' && data.banner_id!=null){
                    uploads(data.banner_id,formdata);
                    toasmsg('success',data.msg);
                }else{
                    toasmsg('error',data.msg);
                }
            }
          })
        }
      });


    $("#is_active").on("click",function(){      
      if($(this).prop("checked")==true){
        $(this).val(1);
      }else{
        if(window.confirm("Are you sure ! Do you want to set Inactive for this Ads.")){
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
    
        
    
