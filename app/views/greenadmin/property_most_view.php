
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
	.Property{
		width: 400px;
	}
	.sort{
		border-top-right-radius: 0px !important;
    	border-top-left-radius: 0px !important;
    	background-color: #64b5de !important;
    	color: white !important;
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
        <h1>Property View List</h1>
        <ul class="mini-stats box-3">
            
        </ul>
 </div>
 <div id="breadcrumb">
      <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>Home</a>
      <a href='#' class="current">Property View list</a>
 </div>
<div class="wrapper">
	<div class="clearfix" id="main_content_outer">
	    <div id="main_content">
	      <div class="col-xs-12">
	      		<div style="margin-top: 10px;"></div>
	      		<label class='col-xs-2 control-label' style="text-align: right; margin-top: 7px;">Property View By</label>
		      	<div class="col-xs-2">
		      		<select class="form-control" onchange="getdata(1);" id="txtshowby">
		      			<option value="">Select View</option>
		      			<option value="day">Per Day</option>
		      			<option value="week">Per Week</option>
		      			<option value="month">Per Month</option>
		      		</select>
		      	</div>
		  </div>
		  <div class="form-group">
	            <label class='col-lg-2 control-label'>View By</label>
	            <div class="col-lg-5"> 
	                <div class="col-md-12">
	                    <select class="form-control" onchange="getdata(1);" id="txtshowby">
		      			<option value="">Select View</option>
		      			<option value="day">Per Day</option>
		      			<option value="week">Per Week</option>
		      			<option value="month">Per Month</option>
		      		</select>
	                </div>                   
	            </div>
	            
	        </div>
	      <div class="row">
	      		<div class="col-sm-12">
	      			<div class="widget-box table-responsive">
						<div class="widget-title no_wrap hide" id='top-bar'>
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
								<h5>Property View List</h5>
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
									<tr class='remove_tag hide'>
										<th></th>
										<th>
											<input type='text' onkeyup="getdata(1);" class='form-control hide input-sm' id='s_store_name'/> 
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
					<!-- <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
							<div class='col-sm-3'>
								<label>Show 
									
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
					</div> -->
	      		</div>	      	
	        </div> 
	    </div>
   </div>
</div>

<div class="modal fade bs-example-modal-lg" id="exporttap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="wrapper">
				<div class="clearfix" id="main_content_outer">
				    <div id="main_content">
					    <div class="result_info">
					    	<div class="col-sm-6">
					      		<strong>Choose Column To Export</strong>
					      	</div>
					      	<div class="col-sm-6" style="text-align: center">
					      		<strong>
					      			<center class='visit_error' style='color:red;'></center>
					      		</strong>	
					      	</div>
					    </div>
					      	<form enctype="multipart/form-data" name="frmvisit" id="frmvisit" method="POST">
						        <div class="row">
									<div class="col-sm-12">
							            	<div class="panel-body">
							            		<div class='table-responsive'>
										               <table class='table'>
										               		<thead >
										               			<?php
										               			foreach($thead as $th=>$val){
										               				if($th!='Action')
											           					echo "<th>".$th."</th>";	
											           			}?>
										               		</thead>
										               		<tbody >
										               			<?php
										               			foreach($thead as $th=>$val){
										               				if($th!='Action')
											           					echo "<td align='center'><input type='checkbox' checked class='colch' rel='".$val."'></td>";	
											           			}?>
										               		</tbody>
										               </table>
											   </div>
								            </div>
								    </div> 
								</div>
					      </form>
					</div> 
			    </div>
			</div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id='btnprint' class="btn btn-primary">Print</button>
                <button type="button" id='btnexport' class="btn btn-primary">Export</button>
            </div>
        </div>                       <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>

<script type="text/javascript">

		
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
          	var url="<?php echo site_url('greenadmin/home/getdata_proview')?>";
          	var m="<?PHP echo $m?>";
          	var p="<?PHP echo $p?>";
          	var s_name=$('#s_store_name').val();
          	var perdate = $('#txtshowby').val();
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
		            		'perdate':perdate,
		            		'perpage':perpage
		            	},
		            success:function(data) {
		              $(".list").html(data.data); console.log(data);
		              $('.dataTables_paginate').html(data.pagina.pagination);
		            }
		          })
		}
		
		function update(event){
			    var storeid=jQuery(event.target).attr("rel");
				location.href="<?PHP echo site_url('menu/edit');?>/"+storeid+"?<?php echo "m=$m&p=$p" ?>";
			
		}
		function previewstore(event){
			    var storeid=jQuery(event.target).attr("rel");
				window.open("<?PHP echo site_url('store/store/preview');?>/"+storeid+"?<?php echo "m=$m&p=$p" ?>",'_blank');
			
		}
		function deletestore(event){
			var conf=confirm("Are you Sure to delete this Store");
			if(conf==true){
				var storeid=jQuery(event.target).attr("rel");
				var url="<?php echo site_url('menu/delete')?>/"+storeid;
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