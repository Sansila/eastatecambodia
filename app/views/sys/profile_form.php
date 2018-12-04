

<div id="content-header" class="mini">
  <h1>Site Profile</h1>
  <ul class="mini-stats box-3"></ul>
</div>  

<div id="breadcrumb">
  <a href="<?php echo site_url('sys/dashboard'); ?>" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
  <a href="#" class="current">Site Profile</a>
</div>

<div class="col-sm-6" style="text-align: center">
  <strong><center class='error' style='color:red;'><?php if(isset($error)) echo "$error"; ?></center></strong>
</div>

<!-- main content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
    	<form enctype="multipart/form-data" name="basic_validate" id="basic_validate" method="POST" action="" class="form-horizontal basic_validate">
       <div class="widget-box">
         <div class="widget-title">
           <span class="icon"><i class="fa fa-align-justify"></i></span>
           <h5>Profile Detail.</h5>
           <h5 class="result_text" style='color:red;'></h5>
         </div>

         <div class="widget-content nopadding">
          <div class="form-group">
            <label class='col-lg-2 control-label'>Site Name</label>
            <div class="col-lg-5"> 
              <div class="col-md-12">
                <input type="text"  class="form-control input-sm required" name="site_name" value='<?php echo isset($row->site_name)?"$row->site_name":""; ?>' id="site_name">
              </div>
            </div>
          </div>

          <div class="form-group">

            <label class='col-lg-2 control-label'>Phone Number</label>

            <div class="col-lg-5"> 

              <div class="col-md-12">

                <input type="text"  class="form-control input-sm required" name="phone" value='<?php echo isset($row->phone)?"$row->phone":""; ?>' id="phone">

              </div>

            </div>

          </div>

          <div class="form-group">

            <label class='col-lg-2 control-label'>Email</label>

            <div class="col-lg-5"> 

              <div class="col-md-12">

                <input type="text"  class="form-control input-sm required" name="email" value='<?php echo isset($row->email)?"$row->email":""; ?>' id="email">

              </div>

            </div>

          </div>

          <div class="form-group">

            <label class='col-lg-2 control-label'>Address</label>

            <div class="col-lg-5"> 

              <div class="col-md-12">

               <textarea name="address" class="form-control" rows="4" id="address"><?php echo isset($row->address)?"$row->address":""; ?></textarea>

             </div>

           </div>

         </div>

       </div>

     </div>



     <div class="widget-box">

       <div class="widget-title">

         <span class="icon"><i class="fa fa-align-justify"></i></span>

         <h5>Social Media.</h5>

       </div>



       <div class="widget-content nopadding">
         <div class="form-group hide">

           <label class='col-lg-2 control-label'>Video</label>

           <div class="col-lg-5"> 

            <div class="col-md-12">

            <input type="text"  class="form-control input-sm" name="video" value='<?php echo isset($row->video)?"$row->video":""; ?>' id="video">

            </div>

          </div>

        </div>

        <div class="form-group">

          <label class='col-lg-2 control-label'>Facebook</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="facebook" value='<?php echo isset($row->facebook)?"$row->facebook":""; ?>' id="facebook">

            </div>

          </div>

        </div>

        <div class="form-group">

          <label class='col-lg-2 control-label'>Google Plus</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="google-plus" value='<?php echo isset($row->google_plus)?"$row->google_plus":""; ?>' id="google-plus">

            </div>

          </div>

        </div>

        <div class="form-group">

          <label class='col-lg-2 control-label'>Youtube</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="youtube" value='<?php echo isset($row->youtube)?"$row->youtube":""; ?>' id="youtube">

            </div>

          </div>

        </div>

        <div class="form-group">

          <label class='col-lg-2 control-label'>Twitter</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="twitter" value='<?php echo isset($row->twitter)?"$row->twitter":""; ?>' id="twitter">

            </div>

          </div>

        </div>

        <div class="form-group">

          <label class='col-lg-2 control-label'>LinkedIn</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="linkedin" value='<?php echo isset($row->linkedin)?"$row->linkedin":""; ?>' id="linkedin">

            </div>

          </div>

        </div>
        <div class="form-group">

          <label class='col-lg-2 control-label'>Weixin</label>

          <div class="col-lg-5"> 

            <div class="col-md-12">

              <input type="text"  class="form-control input-sm" name="weixin" value='<?php echo isset($row->weixin)?"$row->weixin":""; ?>' id="weixin">

            </div>

          </div>

        </div>

      </div>

    </div>



    <div class="widget-box">

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

   </div>

 </form>

</div>

</div>

</div>



<script type="text/javascript">

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

        var url="<?php echo site_url('sys/dashboard/profile_save')?>";

        $.ajax({

          url:url,

          type:"POST",

          datatype:"Json",

          async:false,

          data:{
            site_id:1,
            site_name:$("#site_name").val(),
            phone:$("#phone").val(),
            email:$("#email").val(),
            address:$("#address").val(),
            facebook:$("#facebook").val(),
            google_plus:$("#google-plus").val(),
            youtbue:$("#youtube").val(),
            twitter:$("#twitter").val(),
            linkedin:$("#linkedin").val(),
            weixin:$("#weixin").val(),
            video:$("#video").val(),
          },

          success:function(data) {

            // $(".result_text").html(data.msg);

            var formdata = new FormData(form);

            if(data.status == true){

              toasmsg('success',data.msg);

              // location.href='<?php echo site_url("site-profile") ?>';

            }else{

              toasmsg('error',data.msg);

            }

          }

        })

      }

    });

  });

</script>