<style>
    body, html {
      height: 100%;
      background-repeat: no-repeat;
      background-image:url(<?php echo site_url('assets/img/bg-01.jpg')?>);
      position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: 50% 50%;
    }
    .con{
      margin-top: 150px;
    }
  </style>
<div class="container con">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center"><?php echo $this->lang->line('em_ch_email')?></h2>
                  <p><?php echo $this->lang->line('em_ch_desc')?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>