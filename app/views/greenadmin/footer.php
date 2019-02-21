
            </div>
			<!-- <div class="row">
				<div class="col-xs-12" id="footer">
					2015 - 2016 &copy; E-Shopping Admin. Developed by <a href="https://www.greenict.comkh/">www.greenict.com.kh</a>
				</div> 
			</div>-->
		</div>
	</body>
</html>
<script type="text/javascript">
	$(function(){
      $("#postcontent").click(function(e) {
        $.ajax({ 
            type: 'GET', 
            url:"<?php echo site_url('greenadmin/home/getChart')?>",
            dataType: 'json',
            success: function (data) { 
                console.log(data);
                alert("test");
            }
        });
    });
  });
</script>