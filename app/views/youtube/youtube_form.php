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
    .datepicker {z-index: 9999;}
</style>

    <div id="content-header" class="mini">
        <h1>New Video</h1>
        <ul class="mini-stats box-3">
            
        </ul>
    </div>  
    <div id="breadcrumb">
      <a href="<?php echo base_url('index.php/system/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Video</a>
      <a href='#' class="current"><?php if(isset($row->menu_id)) echo 'Edit Video'; else echo 'New Video';?></a>
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
                <h5>Video Detail.</h5>
                <h5 class="result_text" style='color:red;'></h5>
            </div>

            <div class="widget-content nopadding">
                <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
                    
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Video Title</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="video_title" value='<?php echo isset($row->gallery_title)?"$row->gallery_title":""; ?>' id="video_title">
                                    <input type="text"  class="form-control input-sm hide" name="gallery_id" value='<?php echo isset($row->gallery_id)?$row->gallery_id:""; ?>' id="gallery_id">
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Video Code</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <input type="text"  class="form-control input-sm required" name="video_code" value='<?php echo isset($row->url)?"$row->url":""; ?>' id="video_code">
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Location</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                    <select class="form-control" id="location_id">
                                        <option value="">Please Select</option>
                                        <?php
                                        $locat=$this->db->query("SELECT * FROM tbllocation WHERE is_active='1' AND location_type='category'")->result();
                                            foreach ($locat as $me) {
                                                $se='';
                                                if(isset($row->location_id))
                                                    if($row->location_id==$me->location_id)
                                                        $se='selected';
                                                echo "<option value='$me->location_id' $se>$me->location_name</option>";
                                            }
                                         ?>
                                    </select>
                                </div>                   
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>order</label>
                            <div class="col-lg-5"> 
                                <div class="col-md-12">
                                <?php $order=$this->db->query("SELECT MAX(`order`) as orders FROM tblgallery")->row()->orders; ?>
                                    <input type="text"  class="form-control input-sm required" name="order" value='<?php echo isset($row->order)?"$row->order":"$order"; ?>' id="order">
                                </div>                   
                            </div>
                            
                        </div>
                         <div class="form-group">
                            <label class='col-lg-2 control-label'>Home Page Show</label>
                            <div class=" col-lg-3"> 
                                <div class="col-md-2">
                                    <input type="checkbox"  class="form-control input-sm " name="home_page" id="home_page" <?php if (isset($row->home)){ if($row->home==1) echo 'checked'; }else{ echo "checked"; } ?>>
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
          var url="<?php echo site_url('youtube/save')?>";
          var home=0;
          if($('#home_page').is(':checked')) {
            home=1;
          }
          
          $.ajax({
            url:url,
            type:"POST",
            datatype:"Json",
            async:false,
            data:{            
                gallery_id:$("#gallery_id").val(),
                video_title:$("#video_title").val(),
                video_code:$("#video_code").val(),
                location_id: $("#location_id").val(),
                home:home,
                order:$("#order").val()
            },
            success:function(data) {
                // $(".result_text").html(data.msg);
                // var formdata = new FormData(form);
                if(data.gallery_id!='' && data.gallery_id!=null){
                     toasmsg('success',data.msg);
                     location.href='<?php echo site_url("youtube/index?m=".$m.'&p='.$p) ?>';
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
        if(window.confirm("Are you sure ! Do you want to set Inactive for this menu.")){
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
    
        
    
