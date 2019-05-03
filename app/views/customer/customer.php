
<style type="text/css">
	table tbody tr td img{width: 20px; margin-right: 10px}
	a,.sort{cursor: pointer;}

	.cur_sort_up{
		background-image: url('<?php echo base_url('assets/images/icons/sort-up.png')?>');
		background-position: left;
		background-repeat: no-repeat;
		padding-left: 15px !important;
	}
	#top-bar img{width: 20px; margin-top: 5px;}

	.cur_sort_down{
		background-image: url('<?php echo base_url('assets/images/icons/sort-down.png')?>');
		background-position: left;
		background-repeat: no-repeat;
		padding-left: 15px !important;
	}
	.colorbg{
		background: #d0adc7 !important;
	}

	.custom-checkbox {
	  min-height: 1rem;
	  padding-left: 0;
	  margin-right: 0;
	  cursor: pointer; 
	}
	.custom-checkbox .custom-control-input{
		display: none;
	}
  	.custom-checkbox .custom-control-indicator {
	    content: "";
	    display: inline-block;
	    position: relative;
	    width: 30px;
	    height: 10px;
	    background-color: #818181;
	    border-radius: 15px;
	    margin-right: 10px;
	    -webkit-transition: background .3s ease;
	    transition: background .3s ease;
	    vertical-align: middle;
	    margin: 0 16px;
	    box-shadow: none; 
  	}
    .custom-checkbox .custom-control-indicator:after {
      	content: "";
      	position: absolute;
      	display: inline-block;
      	width: 18px;
      	height: 18px;
      	background-color: #f1f1f1;
      	border-radius: 21px;
      	box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
      	left: -2px;
      	top: -4px;
      	-webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
      	transition: left .3s ease, background .3s ease, box-shadow .1s ease; 
    }
  	.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
    	background-color: #84c7c1;
    	background-image: none;
    	box-shadow: none !important; 
  	}
    .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
      	background-color: #84c7c1;
      	left: 15px; 
    }
  	.custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
    	box-shadow: none !important; 
  	}
</style>
<?php
	$m='';
	$p='';
	if(isset($_GET['m'])){
	    $m=$_GET['m'];
	}
	if(isset($_GET['p'])){
	    $p=$_GET['p'];
	}
 ?>
<div id="content-header" class="mini">
        <h1><?php echo $this->lang->line('cl_title')?></h1>
        <ul class="mini-stats box-3">
            
        </ul>
</div>
<div id="breadcrumb">
      <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
      <a href='#' class="current"><?php echo $this->lang->line('cl_title')?></a>
</div>
<div class="wrapper">
	<div class="clearfix" id="main_content_outer">
	    <div id="main_content">
	      <div class="col-xs-12">
		      	<div class="col-xs-6">
		      	</div>
		      	  
		  </div>
	      <div class="row">
	      		<div class="col-sm-12">
	      			<div class="widget-box table-responsive">
						<div class="widget-title no_wrap" id='top-bar'>
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
								<h5><?php echo $this->lang->line('cl_title')?></h5>
							<div style="text-align: right; width:130px; float:right">
					      			      		
					      	</div> 			    
						</div>
						<div class="widget-content nopadding" id='tap_print'>

							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
									<?php 
										foreach($thead as $th=>$val){
					           				if($th=='Action')
					           					echo "<th class='remove_tag'>".$th."</th>";
					           				else
					           					echo "<th class='sort $val no_wrap' onclick='sort(event);' rel='$val'>".$th."</th>";								
					           			}
									?>
									</tr>
									<tr class='remove_tag'>
										<th></th>
										<th>
											<select class="form-control" id="txtsearchgroup" onchange="getdata(1);">
												<option value="">Select</option>
												<?php 
													$roleid = $this->session->userdata('roleid');
													foreach ($this->cust->getGroup($roleid) as $group) {
														echo '<option value="'.$group->groupid.'">'.$group->groupname.'</option>';
													}
												?>
											</select>
										</th>
										<th>
											<input type='text' onkeyup="getdata(1);" class='form-control input-sm' id='s_store_name'/> 
										</th>
										<th ></th>
										<th>
											
										</th>
										<th>
											
										</th>
										<th width='150'>
										</th>
										
									</tr>
								</thead>
								<tbody class='list'>

								</tbody>
							</table>  

						</div>
					</div>
					<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
							<div class='col-sm-3'>
								<label><?php echo $this->lang->line('show')?>  
									
									<select id='perpage' onchange='getdata(1);' name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" tabindex="-1" class="form-control select2-offscreen">
										<?PHP
										for ($i=10; $i < 500; $i+=10) { 
											echo "<option value='$i'>$i</option>";
										}
										 ?>
									</select> 
								</label>
							</div>
							<div class='dataTables_paginate'>

							</div>
					</div>
					<div style="padding: 0px 0px 15px;">
						<button class="btn btn-primary btn-send">Send as Email</button>
					</div>
	      		</div>	      	
	        </div> 
	    </div>
   </div>
</div>



<script type="text/javascript">

		$(".btn-send").on("click", function() {
			var fcheck = $('.custom-control-input').is(':checked');
			if(fcheck == true)
			{
				$('.list').find('tr').each(function(){
					var ch = $(this).find('td.no label .custom-control-input').is(':checked');
					var loc = $(this).find('td.location').text();
					var email = $(this).find('td.email').text();
					if(ch == true){
						var url="<?php echo site_url('customer/sendEmail')?>";
						$.ajax({
				            url:url,
				            type:"POST",
				            datatype:"Json",
				            async:false,
				            data:{
				            		'loc':loc,
				            		'email':email
				            	},
				            success:function(data) {
				              console.log(data);
				            }
				        });
					}
				});
			}else{
				alert('Please check any user to send email');
			}
			
		});
		
		$('#export').click(function(){
			$('#exporttap').modal('show');
			$('#btnprint').hide();
			$('#btnexport').show();
		})
		$('#print').click(function(){
			$('#exporttap').modal('show');
			$('#btnprint').show();
			$('#btnexport').hide();
		})
		function gsPrint(emp_title,data){
			 var element = "<div>"+data+"</div>";
			 $("<center><p style='padding-top:15px;text-align:center;'><b>"+emp_title+"</b></p><hr>"+element+"</center>").printArea({
			  mode:"popup",  //printable window is either iframe or browser popup              
			  popHt: 600 ,  // popup window height
			  popWd: 500,  // popup window width
			  popX: 0 ,  // popup window screen X position
			  popY: 0 , //popup window screen Y position
			  popTitle:"test", // popup window title element
			  popClose: false,  // popup window close after printing
			  strict: false 
			  });
		}
		$('.colch').click(function(){
			if($(this).is(':checked')){
				var col=$(this).attr('rel');
				$('.'+col).removeClass(' remove_tag');
			}else{
				var col=$(this).attr('rel');
				$('.'+col).addClass(' remove_tag');
			}
		})
		$(function(){	
			getdata(1);	
			$(document).on('click', '.pagenav', function(){
			    var page = $(this).attr("id");
				getdata(page);			
			});	
			$("#btnprint").on("click",function(){
					var htmlToPrint = '' +
					        '<style type="text/css">' +
					        'table th, table td {' +
					        'border:1px solid #000 !important;' +
					        'padding;0.5em;' +
					        '}' +
					        '</style>';				
					var title="Store List";	
				   	var data = $("#tap_print").html().replace(/<img[^>]*>/gi,"");
				   	var export_data = $("<center>"+data+"</center>").clone().find(".remove_tag").remove().end().html();
				   		export_data+=htmlToPrint;
				   	gsPrint(title,export_data);
			});
			$("#btnexport").on("click",function(e){
				var title="Store List";			
				var data=$('.table').attr('border',1);
					data = $("#tap_print").html().replace(/<img[^>]*>/gi,"");
	   			var export_data = $("<center><h3 align='center'>"+title+"</h3>"+data+"</center>").clone().find(".remove_tag").remove().end().html();
				window.open('data:application/vnd.ms-excel,' + encodeURIComponent(export_data));
    			e.preventDefault();
    			$('.table').attr('border',0);
			});
		})
		function getdata(page){
          	var url="<?php echo site_url('customer/getdata_customer')?>";
          	var m="<?PHP echo $m?>";
          	var p="<?PHP echo $p?>";
          	var s_name=$('#s_store_name').val();
          	
          	var perpage=$('#perpage').val();
			$.ajax({
	            url:url,
	            type:"POST",
	            datatype:"Json",
	            async:false,
	            data:{'m':m,
	            		'p':p,
	            		'page':page,
	            		's_name':s_name,
	            		'group': $('#txtsearchgroup').val(),
	            		'perpage':perpage
	            	},
	            success:function(data) {
	              $(".list").html(data.data); console.log(data);
	              $('.dataTables_paginate').html(data.pagina.pagination);
	            }
	        });
		}
		
		function update(event){
			    var storeid=jQuery(event.target).attr("rel");
				location.href="<?PHP echo site_url('customer/editcustomer');?>/"+storeid+"?<?php echo "m=$m&p=$p" ?>";
			
		}

		function deletefinding(event){
			var conf=confirm("Are you Sure to delete this Customer");
			if(conf==true){
				var storeid=jQuery(event.target).attr("rel");
				var url="<?php echo site_url('customer/delete')?>/"+storeid;
				$.ajax({
		            url:url,
		            type:"POST",
		            datatype:"Json",
		            async:false,
		            data:{'storeid':storeid},
		            success:function(data) {
		             	//$(event.target).closest('tr').remove();
		             	getdata(1);
		            }
		          })
			}
		}
		
		
		
	</script>