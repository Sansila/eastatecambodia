
<style>
  .box-body .title { padding:20px 0 5px; margin-bottom:20px; border-bottom:1px solid #3c8dbc; font-size:16px; font-weight: bold; }
</style>

<section class="content">
  <form enctype="multipart/form-data" method="POST" id="user" name="user">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Site Information</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="title">Site Detail</div>
            <div class="form-group">
              <label>Site Name<span class="text-danger">*</span></label>
              <input type="hidden" name="id" id="id" required value="<?= $row->id; ?>">
              <input type="text" class="form-control" required value="<?= $row->site_name; ?>" placeholder="Enter Site Name" id="site_name" name="site_name">
            </div>
            <div class="form-group">
              <label>Slogan</label>
              <input type="text" class="form-control" value="<?= $row->slogan; ?>" placeholder="Enter Slogan" id="slogan" name="slogan">
            </div>
            <div class="form-group">
              <label>Phone Number<span class="text-danger">*</span></label>
              <input type="text" class="form-control" required value="<?= $row->phone; ?>" placeholder="Enter Phone Number" id="phone" name="phone">
            </div>
            <div class="form-group">
              <label>Email Address<span class="text-danger">*</span></label>
              <input type="email" class="form-control" required value="<?= $row->email; ?>" placeholder="Enter Email Address" id="email" name="email">
            </div>
            <div class="form-group">
              <label>Address<span class="text-danger">*</span></label>
              <textarea style="resize: none;" required rows="5" id="address" name="address" class="form-control"><?= $row->address; ?></textarea>
            </div>
            <!-- <div class="form-group">
              <label>Logo</label>
              <div style="margin-left: 20px; position: relative; top: 10px; ">
                <?php 
                if(isset($x->profile)){
                  $x->profile=trim($x->profile,","); 
                  $img_u=explode(",", $x->profile); 
                  $arr=array(); 
                  for ($i=0; $i < count($img_u); $i++) { $arr[$img_u[$i]]=$img_u[$i]; } 
                  foreach ($arr as $key => $value) {
                    if($value == "") {
                      echo "";
                    }else{
                      ?>
                      <div class="saouy">
                        <div data-fileindex="0" id="preview-1441024963117-0" class="file-preview-frame" style="margin:20px 0px;" >
                         <img style="width:auto;height:160px;" alt="" title="" class="file-preview-image" src="<?= site_url('upload/icons/'.$row->id.$row->logo); ?>">
                         <div class="file-thumbnail-footer">
                          <div class="file-caption-name" style="width: 250px;" title=""><p><?= $row->id.$row->logo; ?></p><div><span class="hide realname"><?= $row->id.$row->logo; ?></span></div></div>
                          <div class="file-actions">
                            <div class="file-footer-buttons">
                              <button title="Upload file" class="hide kv-file-upload btn btn-xs btn-default" type="button"><i class="glyphicon glyphicon-upload text-info"></i></button>
                              <button title="Remove file" class="kv-file-remove btn btn-xs btn-default" type="button"><i class="glyphicon glyphicon-trash text-danger"></i></button>
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
                }  
                ?>
              </div>
              <input id="file-4" type="file" name="userfile[]" accept="image/*" class="file" data-upload-url="#">
            </div> -->
          </div>
          <div class="col-sm-6">
            <div class="title">Social Media</div>
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" class="form-control" value="<?= $row->facebook; ?>" placeholder="Enter Facebook" id="facebook" name="facebook">
            </div>
            <div class="form-group">
              <label>Twitter</label>
              <input type="text" class="form-control" value="<?= $row->twitter; ?>" placeholder="Enter Twitter" id="twitter" name="twitter">
            </div>
            <div class="form-group">
              <label>Youtube</label>
              <input type="text" class="form-control" value="<?= $row->youtube; ?>" placeholder="Enter Youtube" id="youtube" name="youtube">
            </div>
            <div class="form-group">
              <label>Google Plus</label>
              <input type="text" class="form-control" value="<?= $row->google_plus; ?>" placeholder="Enter Google Plus" id="google" name="google">
            </div>
            <div class="form-group">
              <label>Linkedin</label>
              <input type="text" class="form-control" value="<?= $row->linkedin; ?>" placeholder="Enter Linkedin" id="linkedin" name="linkedin">
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer" style="margin-top: 20px;">
        <button type="submit" id="save" class="btn btn-primary">Save Change</button>
      </div>
    </div>
  </form>
</section> 

<script type="text/javascript">
  $(document).ready(function () {

    $('.kv-file-remove').click(function(){
      var filename = $(this).closest('.saouy').find('.file-preview-frame .file-caption-name div .realimg').text();
      var userid   = $('#uid').val();
      //alert(filename);
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('ctr_agent/unlink_image')?>",
        data: {
          filename: filename,
          userid: userid
        },
        success: function(data) {}
      });
      $(this).closest('.saouy').find('.file-preview-frame').remove();
    });

    //---------datetime picker-----------//
    $("#file-4").fileinput({
      uploadExtraData: {kvId: '10'}
    });

    //---------datetime picker-----------//
    $('.form_date').datetimepicker({
      language:  'en',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
    });

    //==============save===============//
    $('#save').click(function(){
      //var roleid = $('#role').val();
      $('.loading').show();
      var uid = $('#uid').val();
      var uname = $('#uname').val();

      arr = $('.file-thumbnail-footer span').map(function(){
        return $(this).text();
      });
      var fileg = "";
      for(i=0; i < arr.length; i++){
        fileg += arr[i];
      }
      //alert(fileg);
      var pwd = $('#pwd').val();
      var dob = $('#dob').val();
      var phone = $('#phone').val();
      var email = $('#email').val();
      var address = $('#address').val();
      var note = $('#note').val();
      var status = $('#status').val();
      var roleid = $('#role').val();
      var position = $('#position').val();
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var per_email = $("#per_email").val();

      $.ajax({
        type: "POST",
        url: "<?php echo site_url('ctr_agent/save')?>",
        data: { 
          //roleid:roleid, 
          uid:uid, 
          uname:uname, 
          pwd:pwd,
          gender:gender, 
          dob:dob, 
          phone:phone, 
          email:email, 
          address:address, 
          note:note,
          status:status,
          fileg: fileg,
          roleid: roleid,
          position: position,
          fname: fname,
          lname: lname,
          per_email : per_email,
        },
        success: function(data) {
          uploads(data);
          //alert(data);
        }
      });
    });
  });

  function uploads(id){
    var formData = new FormData($('#user')[0]);
    $.ajax({
      type:'POST',
      url:"<?PHP echo site_url('ctr_agent/upload');?>/"+id,
      data:formData,
      cache:false,
      type: "POST",
      contentType: false,
      processData: false,
      success:function(data){
        console.log("success");
        console.log(data);
        location.href = "<?php echo site_url()?>ctr_agent/view_agent?success";
      },
      error: function(data){
        console.log("error");
        console.log(data);
        location.href = "<?php echo site_url()?>ctr_agent/view_agent?error";
      }
    });
  }
</script>