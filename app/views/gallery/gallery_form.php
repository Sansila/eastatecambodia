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
        <h1>Photos Gallery</h1>
        <ul class="mini-stats box-3">
            
        </ul>
    </div>  
    <div id="breadcrumb">
      <a href="<?php echo base_url('index.php/system/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Gallery</a>
      
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
                <h5>Gallery Image.</h5>
                <h5 class="result_text" style='color:red;'></h5>
            </div>

            <div class="widget-content nopadding">
                <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="<?php echo site_url('gallery/upload') ?>" class="form-horizontal basic_validate">
                    
                       
                        <div class="form-group">
                            <label class='col-lg-2 control-label'>Images</label>
                            <div class=" col-lg-12"> 
                                <div class="col-md-12">
                                    <?php
                                    // if(isset($row->article_id)){
                                        $img=$this->db->query("SELECT * FROM tblgallery WHERE gallery_type='2'")->result();
                                        if(count($img)>0){
                                        foreach ($img as $img) {
                                     ?>
                                             <div class="saouy">
                                                  <div data-fileindex="0" id="preview-1441024963117-0" class="file-preview-frame" style="margin:20px 0px;" >
                                                     <img style="width:auto;height:160px;" alt="" title="" class="file-preview-image" src="<?php echo site_url('/assets/upload/gallery/thumb/'.$img->url) ?>">
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
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label"></label>                      
                              <div class="col-md-10">
                                <div class="col-lg-2 pull-right">
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
        var url="<?php echo site_url('gallery/removeimg')?>";
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
    function uploads(article_id,formdata){
        //alert(visitid+'/'+familyid);
        $.ajax({
            type:'POST',
            url:"<?PHP echo site_url('article/upload');?>/"+article_id,
            data:formdata,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // location.reload();
                location.href="<?php echo site_url('article/index/?m='.$m.'&p='.$p) ?>";

                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
                location.href="<?php echo site_url('article/index/?m='.$m.'&p='.$p) ?>";

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

</script>
    
        
    
