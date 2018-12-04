<style type="text/css">

table tbody tr td img{ width: 20px; margin-right: 10px; }

ul,ol{ margin-bottom: 0px !important; }

a{ cursor: pointer; }

.datepicker { z-index: 9999; }

</style>



<div id="content-header" class="mini">

  <h1>New Menu</h1>

  <ul class="mini-stats box-3"></ul>

</div>

<?php

$m = $this->input->get('m');

$p = $this->input->get('p');

?>

<div id="breadcrumb">

  <a href="<?php echo base_url('/sys/dashboard')?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>

  <a href="<?php echo base_url("index.php/store/store/index?m=$m&p=$p")?>" title="Go to Store List" class="tip-bottom">Menu</a>

  <a href='#' class="current"><?php if(isset($row->location_id)) echo 'Edit Menu'; else echo 'New Menu';?></a>

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
          <h5>Menu Detail.</h5>
          <h5 class="result_text" style='color:red;'></h5>
        </div>

        <div class="widget-content nopadding">
          <form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
            <div class="form-group">
              <label class='col-lg-2 control-label'>Menu Name</label>
              <div class="col-lg-5"> 
                <div class="col-md-12">
                  <input type="text"  class="form-control input-sm required" value='<?php echo isset($row->location_name)?"$row->location_name":""; ?>' id="location_name">
                  <input type="text"  class="form-control input-sm hide" value='<?php echo isset($row->location_id)?$row->location_id:""; ?>' id="location_id">
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

    location.href="<?PHP echo site_url('category/index?m=Nw==&p=NzY=');?>";

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

        var url="<?php echo site_url('category/save')?>";

        var is_active=0;

        if($('#is_active').is(':checked'))

          is_active=1;

        $.ajax({

          url:url,

          type:"POST",

          datatype:"Json",

          async:false,

          data:{            

            location_id:$("#location_id").val(),

            location_name:$("#location_name").val(),

            is_active:is_active

          },

          success:function(data) {

            // $(".result_text").html(data.msg);

            var formdata = new FormData(form);

            if(data.location_id!='' && data.location_id!=null){

              toasmsg('success',data.msg);

              location.href='<?php echo site_url("category/index?m=".$m.'&p='.$p) ?>';

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







