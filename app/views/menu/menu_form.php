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
  <h1>New Category</h1>
  <ul class="mini-stats box-3">

  </ul>
</div>  
<div id="breadcrumb">
  <a href="<?php echo base_url('/sys/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
  <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Category</a>
  <a href='#' class="current"><?php if(isset($row->menu_id)) echo 'Edit Category'; else echo 'New Category';?></a>
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
              <label class='col-lg-2 control-label'>Category Name</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" name="menu_name" value='<?php echo isset($row->menu_name)?"$row->menu_name":""; ?>' id="menu_name">
                  <input type="text"  class="form-control input-sm hide" name="menu_id" value='<?php echo isset($row->menu_id)?$row->menu_id:""; ?>' id="menu_id">
                </div>                   
              </div>

            </div>
            <div class="form-group">
              <label class='col-lg-2 control-label'>Category Name (Khmer)</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" name="menu_name_kh" value='<?php echo isset($row->menu_name_kh)?"$row->menu_name_kh":""; ?>' id="menu_name_kh">
                </div>                   
              </div>

            </div>
            <div class="form-group hide">
              <label class='col-lg-2 control-label'>Location</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <select class="form-control" id="location_id">
                    <!-- <option value="">Please Select</option> -->
                    <?php
                    $locat=$this->db->query("SELECT * FROM tbllocation where is_active='1' ")->result();
                    foreach ($locat as $locat) {
                      $sel='';
                      if(isset($row->location_id))
                        if($row->location_id==$locat->location_id)
                          $sel='selected';
                        ?>
                        <option value="<?php echo $locat->location_id ;?>" <?php echo $sel; ?>><?php echo $locat->location_name ?></option>
                        <?php }
                        ?>                                       
                      </select>
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
                        $menu=$this->db->query("SELECT * FROM tblmenus where is_active='1' ORDER BY lineage asc")->result();
                        foreach ($menu as $menu) {
                          $sel='';
                          if(isset($row->parentid))
                            if($row->parentid==$menu->menu_id)
                              $sel='selected';
                            ?>
                            <option value="<?php echo $menu->menu_id ;?>" <?php echo $sel; ?>><?php echo str_repeat("---- &nbsp;",$menu->level).$menu->menu_name,$menu->menu_id;?></option>
                            <?php }
                            ?>                                       
                          </select>
                        </div>                   
                      </div>
                    </div>  
                    <div class="form-group">
                      <label class='col-lg-2 control-label'>Menu Type</label>
                      <div class="col-lg-5"> 
                        <div class="col-md-12">
                          <select class="form-control" id="menu_type">
                            <option>Please select</option>
                            <?php
                            $locat=$this->db->query("SELECT * FROM tbllocation WHERE is_active='1' ")->result();
                            foreach ($locat as $me) {
                              $se='';
                              if(isset($row->location_id))
                                if($row->menu_type==$me->location_id)
                                  $se='selected';
                                echo "<option value='$me->location_id' $se>$me->location_name</option>"; 
                              }
                              ?>

                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="form-group <?PHP if(isset($row->menu_type)) if($row->menu_type!='article')  echo 'hide' ?>" id="article_tap">
                        <label class='col-lg-2 control-label'>Article</label>
                        <div class="col-lg-5"> 
                          <div class="col-md-12">
                            <select class="form-control" id="article_id">
                              <option value="0">Please Select</option>
                              <?php
                              $data=$this->db->query("SELECT * FROM tblarticle WHERE is_active=1")->result();
                              foreach ($data as $a) {
                                $sel='';
                                if(isset($row->article_id))
                                  if($row->article_id==$a->article_id)
                                    $sel='selected';
                                  echo "<option value='$a->article_id' $sel>$a->article_title</option>";
                                }
                                ?>
                              </select>
                            </div>                   
                          </div>

                        </div>
                        <div class="form-group hide">
                          <label class='col-lg-2 control-label'>Tab Content</label>
                          <div class="col-lg-5"> 
                            <div class="col-md-12">
                              <select class="form-control" id="tab_aritcle">
                                <option value="">Please Select</option>
                                <?php
                                foreach($this->db->query("SELECT * FROM tblarticle WHERE is_active=1")->result() as $a) {
                                  $sel = '';
                                  if(isset($row->article_id) && $row->article_id==$a->article_id) {
                                    $sel = 'selected';
                                  }
                                  echo "<option value='$a->article_id' $sel>$a->article_title</option>";
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
                              <?php $order=$this->db->query("SELECT MAX(`order`) as orders FROM tblmenus WHERE is_active=1")->row()->orders; ?>
                              <input type="text"  class="form-control input-sm required" name="order" value='<?php echo isset($row->order)?"$row->order":"$order"; ?>' id="order">
                            </div>                   
                          </div>

                        </div>
                        <div class="form-group">
                          <label class='col-lg-2 control-label'>Menu Layout</label>
                          <div class="col-lg-5"> 
                            <div class="col-md-12">
                              <select class="form-control" id="layout">
                               <?php
                               $lay=$this->db->query("SELECT * FROM tbllayout where is_active=1")->result();
                               foreach ($lay as $lay) {
                                $sel='';
                                if(isset($row->layout_id))
                                  if($row->layout_id==$lay->layout_id)
                                   $sel='selected';
                                 echo "<option value='$lay->layout_id' $sel>$lay->layout_name</option>";
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
        var url="<?php echo site_url('menu/save')?>";
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
            menu_id:$("#menu_id").val(),
            menu_name:$("#menu_name").val(),
            tab_con: $("#tab_aritcle").val(), 
            tab_id:tab_id,
            menu_name_kh:$("#menu_name_kh").val(),
            parent_id:$("#parent").val(),
            layout:$("#layout").val(),
            location_id:$("#location_id").val(),
            order:$("#order").val(),
            menu_type:$("#menu_type").val(),
            article_id:$("#article_id").val(),
            is_active:is_active
          },
          success:function(data) {
              var formdata = new FormData(form);
              if(data.menu_id!='' && data.menu_id!=null){
                 toasmsg('success',data.msg);
                 location.href='<?php echo site_url("menu/index?m=".$m.'&p='.$p) ?>';
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



