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
	#chartdiv {
	  width: 100%;
	  height: 500px;
	  border: 1px solid #a6a6c1;
	}
	#chartdivview {
		width: 100%;
	  	height: 500px;
	  	border: 1px solid #a6a6c1;
	}
	h3{
	  padding-left: 15px;
	  background: #64b5de;
	  color: white;
	  padding: 10px;
	  text-align: center;
	  margin-bottom: 0px;
	  font-size: 14px;
	  font-weight: normal;
	}
	.optday{
	  float: left;
	  border: none;
	  background: none;
	  color: white
	}
	.optday option{
	  color: #999999;
	}
	#chartdivchannel{
	  width: 100%;
	  height: 500px;
	  border: 1px solid #a6a6c1;
	}
	#chartpropertystatus{
	  width: 100%;
	  height: 500px;
	  border: 1px solid #a6a6c1;
	}
</style>

	 <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/images/logo.ico')?> ">
	<?php

		$row=$this->db->query("SELECT * FROM dashboard_item WHERE dashid='1'")->row();
		$m=$row->moduleid;
		$p=$row->link_pageid;
		$showage=0;
		

	 ?>

			<div id="content-header" class="mini">
				<h1><?php echo $this->lang->line('dashboard')?></h1>
				<ul class="mini-stats box-3">
					<a>
						<li class="list_post">
							<div class="left sparkline_bar_good"><span>Post And View Property</span></div>
							<div class="right">
								<strong>last 7</strong>
								days 
							</div>
						</li>
					</a>
					<a>
						<li class="ListCustomer_view">
							<div class="left sparkline_bar_good"><span>Customer Find Property</span></div>
							<div class="right">
								<strong><?php echo $counter_finder;?></strong>
								finder
							</div>
						</li>
					</a>
					<a>
						<li class="InactivePro">
							<div class="left sparkline_bar_good"><span><?php echo $this->lang->line('inactive_post')?></span></div>
							<div class="right">
								<strong><?php echo $count_property;?></strong>
								<?php echo $this->lang->line('property')?>
							</div>
						</li>
					</a>
					<a>
						<li class="InactiveUser">
							<div class="left sparkline_bar_good"><span><?php echo $this->lang->line('inactive_join')?></span></div>
							<div class="right">
								<strong><?php echo $count_inactive_user;?></strong>
								<?php echo $this->lang->line('user')?>
							</div>
						</li>
					</a>
					<li class="hide">
						<div class="left sparkline_bar_bad"><span>Total Property</span></div>
						<div class="right">
							<strong><?php echo $active_property;?></strong>
							Properties
						</div>
					</li>
					<li class="hide">
						<div class="left sparkline_bar_bad"><span>Total User</span></div>
						<div class="right">
							<strong><?php echo $active_user;?></strong>
							Users
						</div>
					</li>
				</ul>
			</div>

			<!-- <div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
				<a href="#" class="current">Dashboard</a>
			</div>
 -->


 <!-- <div id="content-header" class="mini">
        <h1>PROPERTY LIST</h1>
        <ul class="mini-stats box-3">
            
        </ul>
 </div> -->
 	<?php 
 		$userid = $this->session->userdata('userid');
 	?>
 	<div class="chart_post_property">
 		<div class="row">
      		<div class="col-sm-6">
 				<h3 style="padding-left: 15px;">Property Post Analysis The Last 7 Days</h3>
 				<div id="chartdiv"></div>
 			</div>
 			<div class="col-sm-6">
		 		<h3 style="padding-left: 15px;">Property View Analysis The Last 7 Days</h3>
		 		<div id="chartdivview"></div>
		 	</div>
	 	</div>
	 	<div class="row">
		    <div class="col-sm-6">
		        <h3 style="padding-left: 15px;">
		          <select class="optday" id="txtshowby">
		            <option value="1">Today</option>
		            <option value="2">Yesterday</option>
		            <option value="3">Last 3 days</option>
		            <option value="7">Last 7 days</option>
		            <option value="15">Last 15 days</option>
		            <option value="30">Last 30 days</option>
		            <option value="60">Last 60 days</option>
		            <option value="90">Last 90 days</option>
		          </select>
		          View analytics by Channel
		        </h3>                  
		        <div id="chartdivchannel"></div>
		    </div>
		    <div class="col-sm-6">
		    	<h3>Property Status</h3>
		    	<div id="chartpropertystatus"></div>
		    </div>
	 	</div>
 	</div>
 	<div class="List_customer hide">
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
												<th>No</th>
												<th>Customer Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Address</th>
												<th>Property Category</th>
												<th>Property Type</th>
												<th>Action</th>
											</tr>
											<tr class='remove_tag'>
												<th></th>
												<th>
													<input type='text' onkeyup="getdatac(1);" class='form-control input-sm' id='s_store_name'/> 
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
										<tbody class='lists'>

										</tbody>
									</table>  

								</div>
							</div>
							<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
									<div class='col-sm-3'>
										<label><?php echo $this->lang->line('show')?>  
											
											<select id='perpage' onchange='getdatac(1);' name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" tabindex="-1" class="form-control select2-offscreen">
												<?PHP
												for ($i=10; $i < 500; $i+=10) { 
													echo "<option value='$i'>$i</option>";
												}
												 ?>
											</select> 
										</label>
									</div>
									<div class='dataTables_paginatec'>

									</div>
							</div>
			      		</div>	      	
			        </div> 
			    </div>
		   </div>
		</div>
 	</div>
 	<div class="List_property hide">
		<div id="breadcrumb">
		      <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i><?php echo $this->lang->line('home')?></a>
		      <a href='#' class="current"><?php echo $this->lang->line('property_list')?> : <?php echo $this->pro->countAllUnaproveProperty();?> <?php echo $this->lang->line('record')?></a>
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
										<h5><?php echo $this->lang->line('record');?></h5>
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
												<th></th>
												<th>
													<input type='text' onkeyup="getdata(1);" class='form-control input-sm' id='s_user_name'/>
												</th>
												<th><input type='text' onkeyup="getdata(1);" class='form-control input-sm' id='s_store_id'/></th>
												<th>
													<input type='text' onkeyup="getdata(1);" class='form-control input-sm' id='s_store_name'/>
												</th>
												<th >
												   <select class="form-control input-sm" id="pro_type" name="pro_type" onchange="getdata(1);">
												   		<option value="">-select-</option>
														<?php 
															$sql = $this->db->query("SELECT * FROM tblpropertytype where type_status =1 ")->result();
															foreach($sql as $val)
															{
														?>
															<option value="<?php echo $val->typeid?>"><?php echo $val->typename?></option>
														<?php
															}
														?>
												   </select>
												</th>
												<th >
													<select class="form-control" id="pro_loc" onchange="getdata(1);">
														<option value="">-select-</option>
														<?php 
															$myloc = $this->db->query("SELECT * FROM tblpropertylocation WHERE parent_id = 0")->result();
															foreach ($myloc as $val) {
														?>
															<option value="<?php echo $val->propertylocationid?>"><?php echo $val->locationname;?></option>
														<?php
															}
														?>
													</select>
												</th>
												<th ></th>
												<th >
													<select class="form-control" id="pro_status" onchange="getdata(1);">
														<option value="">-select-</option>
														<option value="1">Sale</option>
														<option value="2">Rent</option>
														<option value="3">Rent & Sale</option>
													</select>
												</th>
												<th ></th>
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
	</div>
	<div class="List_user hide">
		<div id="breadcrumb">
			<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
			<a href="#" class="current">User Managment</a>
		</div><br>

		<!-- </div> -->

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
											<thead>
												<th class='col-xs-1'>No</th>
												<th class='col-xs-1'>First Name</th>
												<th class='col-xs-1'>Last Name </th>
												<th class='col-xs-1'>User Name</th>
												<th class='col-xs-2'>Email</th>
												<th class='col-xs-1'>Created Date</th>
												<th class='col-xs-1'>Action</th>
											</thead>
											<tr class='remove_tag'>
												<td></td>
												<td><input class='form-control input-sm' id='txts_fname' type='text' onkeyup='getdatainactiveuser(1);' value='' name='txts_fname'/></td>
												<td><input class='form-control input-sm' id='txts_lname' type='text' onkeyup='getdatainactiveuser(1);' value='' name='txts_lname'/></td>
												<td><input class='form-control input-sm' id='txts_uname' type='text' onkeyup='getdatainactiveuser(1);' value='' name='txts_uname'/></td>
												<td><input class='form-control input-sm' id='txts_email' type='text' onkeyup='getdatainactiveuser(1);' value='' name='txts_email'/></td>
												<td></td>
												<th width='150'>
												</th>
												
											</tr>
										</thead>
										<tbody class='listinactiveuser'>

										</tbody>
									</table>  

								</div>
							</div>
							<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
									<div class='col-sm-3'>
										<label><?php echo $this->lang->line('show')?>  
											
											<select id='perpage' onchange='getdatainactiveuser(1);' name="DataTables_Table_0_length" size="1" aria-controls="DataTables_Table_0" tabindex="-1" class="form-control select2-offscreen">
												<?PHP
												for ($i=10; $i < 500; $i+=10) { 
													echo "<option value='$i'>$i</option>";
												}
												 ?>
											</select> 
										</label>
									</div>
									<div class='dataTables_paginate_inactive_user'>

									</div>
							</div>
			      		</div>	      	
			        </div> 
			    </div>
		   </div>
		</div>
		
			
	</div>
			
	<!-- <script src="<?php echo base_url('assets/js/unicorn.interface.js')?>"></script>		 -->
	<script src="<?php echo base_url('assets/js/excanvas.min.js')?>"></script>					
	<script src="<?php echo base_url('assets/js/jquery.flot.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.resize.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.min.js')?>"></script>		
	<!-- <script src="<?php echo base_url('assets/js/unicorn.charts.js')?>"></script>		 -->
	<script src="<?php echo base_url('assets/js/jquery.sparkline.min.js')?>"></script>
	<!-- <script src="<?php echo base_url('assets/js/unicorn.dashboard.js')?>"></script> -->

<script type="text/javascript">

	am4core.useTheme(am4themes_animated);

	var chart = am4core.create("chartdiv", am4charts.XYChart);

	$.ajax({ 
	    type: 'GET', 
	    url:"<?php echo site_url('greenadmin/home/analisys_post')?>",
	    dataType: 'json',
	    success: function (data) { 
	        chart.data = data;
	        console.log(data);
	    }
	});

	//create category axis for years
	var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "year";
	categoryAxis.renderer.inversed = true;
	categoryAxis.renderer.grid.template.location = 0;

	//create value axis for income and expenses
	var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.opposite = true;


	//create columns
	var series = chart.series.push(new am4charts.ColumnSeries());
	series.dataFields.categoryY = "year";
	series.dataFields.valueX = "income";
	series.name = "Income";
	series.columns.template.fillOpacity = 1;
	series.columns.template.strokeOpacity = 0;
	//series.tooltipText = "{cate}: {valueX.value}";

	//create line
	var lineSeries = chart.series.push(new am4charts.LineSeries());
	lineSeries.dataFields.categoryY = "year";
	lineSeries.dataFields.valueX = "expenses";
	lineSeries.name = "Expenses";
	lineSeries.strokeWidth = 3;
	lineSeries.tooltipText = "Expenses in {categoryY}: {valueX.value}";

	var valueLabel = series.bullets.push(new am4charts.LabelBullet());
	  valueLabel.label.text = "{cate}({income})";
	  valueLabel.label.horizontalCenter = "left";
	  valueLabel.label.dx = 10;
	  valueLabel.label.hideOversized = false;
	  valueLabel.label.truncate = false;

	//add bullets
	var circleBullet = lineSeries.bullets.push(new am4charts.CircleBullet());
	circleBullet.circle.fill = am4core.color("#fff");
	circleBullet.circle.strokeWidth = 2;

	//add chart cursor
	//chart.cursor = new am4charts.XYCursor();
	//chart.cursor.behavior = "zoomY";


	var chart1 = am4core.create("chartdivview", am4charts.XYChart);

	$.ajax({ 
	    type: 'GET', 
	    url:"<?php echo site_url('greenadmin/home/analisys_view')?>",
	    dataType: 'json',
	    success: function (data) { 
	        chart1.data = data;
	        console.log(data);
	    }
	});

	//create category axis for years
	var categoryAxis1 = chart1.yAxes.push(new am4charts.CategoryAxis());
	categoryAxis1.dataFields.category = "year";
	categoryAxis1.renderer.inversed = true;
	categoryAxis1.renderer.grid.template.location = 0;

	//create value axis for income and expenses
	var valueAxis1 = chart1.xAxes.push(new am4charts.ValueAxis());
	valueAxis1.renderer.opposite = true;


	//create columns
	var series1 = chart1.series.push(new am4charts.ColumnSeries());
	series1.dataFields.categoryY = "year";
	series1.dataFields.valueX = "income";
	series1.name = "Income";
	series1.columns.template.fillOpacity = 1;
	series1.columns.template.strokeOpacity = 0;
	//series1.tooltipText = "{cate}: {valueX.value}";

	//create line
	var lineSeries1 = chart1.series.push(new am4charts.LineSeries());
	lineSeries1.dataFields.categoryY = "year";
	lineSeries1.dataFields.valueX = "expenses";
	lineSeries1.name = "Expenses";
	lineSeries1.strokeWidth = 3;
	lineSeries1.tooltipText = "Expenses in {categoryY}: {valueX.value}";

	var valueLabel1 = series1.bullets.push(new am4charts.LabelBullet());
	  valueLabel1.label.text = "{cate}({income})";
	  valueLabel1.label.horizontalCenter = "left";
	  valueLabel1.label.dx = 10;
	  valueLabel1.label.hideOversized = false;
	  valueLabel1.label.truncate = false;

	//add bullets
	var circleBullet1 = lineSeries1.bullets.push(new am4charts.CircleBullet());
	circleBullet1.circle.fill = am4core.color("#fff");
	circleBullet1.circle.strokeWidth = 2;

	//add chart cursor
	//chart1.cursor = new am4charts.XYCursor();
	//chart1.cursor.behavior = "zoomY";


	var chart6 = am4core.create("chartpropertystatus", am4charts.PieChart);
	    chart6.hiddenState.properties.opacity = 0; // this creates initial fade-in
	    chart6.fontSize = 10;

	    $.ajax({ 
	        type: 'GET', 
	        url:"<?php echo site_url('greenadmin/home/getPropertyStatus')?>",
	        dataType: 'json',
	        success: function (data) { 
	            chart6.data = data;
	            console.log(data);
	        }
	    });

	    chart6.radius = am4core.percent(70);
	    chart6.innerRadius = am4core.percent(40);
	    // chart.startAngle = 180;
	    // chart.endAngle = 360;
	    chart6.responsive.enabled = true;

	    var series6 = chart6.series.push(new am4charts.PieSeries());
	    series6.dataFields.value = "value";
	    series6.dataFields.category = "country";
	    series6.legendSettings.labelText = '{country}';
	    series6.legendSettings.valueText = '{value}';

	    series6.slices.template.cornerRadius = 10;
	    series6.slices.template.innerCornerRadius = 7;
	    series6.slices.template.draggable = false;
	    series6.slices.template.inert = true;
	    series6.alignLabels = false;

	    series6.hiddenState.properties.startAngle = 90;
	    series6.hiddenState.properties.endAngle = 90;

	    chart6.legend = new am4charts.Legend();	

	
	function gsPrint(emp_title,data){
		 var element = "<div id='print_area'>"+data+"</div>";
		 $("<center><p style='padding-top:15px;text-align:center;'><b>"+emp_title+"</b></p><hr>"+element+"</center>").printArea({
		  mode:"popup",  //printable window is either iframe or browser popup              
		  popHt: 1000 ,  // popup window height
		  popWd: 1024,  // popup window width
		  popX: 0 ,  // popup window screen X position
		  popY: 0 , //popup window screen Y position
		  popTitle:"test", // popup window title element
		  popClose: false,  // popup window close after printing
		  strict: false 
		  });
	}
	$(function(){

		$("#print").on("click",function(){					
				var title="<h4 align='center'>"+ $("#title").text()+"</h4>";
			   	var data = $("#tab_print").html().replace(/<img[^>]*>/gi,"");
			   	var data_print=$("<div>"+data+"</div>").html().replace(/<A[^>]*>|<\/A>/gi,"");
			   	var export_data = $("<center>"+data_print+"</center>").clone().find(".remove_tag").remove().end().html();
			   		
			   	gsPrint(title,export_data);
			});
		$("#export").on("click",function(e){
				var data=$("#tab_print").html().replace(/<img[^>]*>/gi,"");
	   			var export_data = $("<center><h3 align='center'>DASHBOARD</h3>"+data+"</center>").clone().find(".remove_tag").remove().end().html();
				window.open('data:application/vnd.ms-excel,' + encodeURIComponent(export_data));
    			e.preventDefault();
		});
	});

	$('.list_post').click(function(){
		$('.chart_post_property').removeClass('hide');
		$('.List_customer').addClass('hide');
		$('.List_property').addClass('hide');
		$('.List_user').addClass('hide');
	});
	$('.ListCustomer_view').click(function(){
		$('.List_customer').removeClass('hide');
		$('.List_property').addClass('hide');
		$('.List_user').addClass('hide');
		$('.chart_post_property').addClass('hide');
	});
	$('.InactiveUser').click(function(){
		$('.List_property').addClass('hide');
		$('.List_customer').addClass('hide');
		$('.List_user').removeClass('hide');
		$('.chart_post_property').addClass('hide');
	});
	$('.InactivePro').click(function(){
		$('.List_property').removeClass('hide');
		$('.List_user').addClass('hide');
		$('.List_customer').addClass('hide');
		$('.chart_post_property').addClass('hide');
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
		getdatac(1);
		getdatainactiveuser(1);	
		$(document).on('click', '.pagenav', function(){
		    var page = $(this).attr("id");
			getdata(page);
			getdatac(page);	
			getdatainactiveuser(page);		
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
      	var url="<?php echo site_url('property/property/getdata_inactive')?>";
      	var m="<?PHP echo $m?>";
      	var p="<?PHP echo $p?>";
      	var s_name=$('#s_store_name').val();
		var s_id = $('#s_store_id').val();
		var p_type = $('#pro_type').val();
		var user = $('#s_user_name').val();
		var p_status = $("#pro_status").val();
		var pro_loc = $("#pro_loc").val();
      	
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
	            		'perpage':perpage,
						's_id': s_id,
						'p_type': p_type,
						'user_add' : user,
						'p_status': p_status,
						'pro_loc': pro_loc
	            	},
	            success:function(data) {
	              $(".list").html(data.data); console.log(data);
	              $('.dataTables_paginate').html(data.pagina.pagination);

	            }
	          })
	}
	function getdatac(page){
	  	var url="<?php echo site_url('greenadmin/home/getdata')?>";
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
            		
            		'perpage':perpage
            	},
            success:function(data) {
              $(".lists").html(data.data); console.log(data);
              $('.dataTables_paginatec').html(data.pagina.pagination);
            }
        })
	}
	function getdatainactiveuser(page){
	  	var url="<?php echo site_url('sys/dashboard/getdatainactiveuser')?>";
	  	var m="<?PHP echo $m?>";
	  	var p="<?PHP echo $p?>";
	  	var fname=$('#txts_fname').val();
	  	var lname=$('#txts_lname').val();
	  	var uname=$('#txts_uname').val();
	  	var email=$('#txts_email').val();
	  	
	  	var perpage=$('#perpage').val();
		$.ajax({
            url:url,
            type:"POST",
            datatype:"Json",
            async:false,
            data:{'m':m,
            		'p':p,
            		'page':page,
            		'fname':fname,
            		'lname':lname,
            		'uname':uname,
            		'email':email,
            		'perpage':perpage
            	},
            success:function(data) {
              $(".listinactiveuser").html(data.data); console.log(data);
              $('.dataTables_paginate_inactive_user').html(data.pagina.pagination);
            }
        })
	}
	function previewstore(event){
		    var storeid=jQuery(event.target).attr("rel");
			window.open("<?PHP echo site_url('store/store/preview');?>/"+storeid+"?<?php echo "m=$m&p=$p" ?>",'_blank');
		
	}
	function deletestore(event){
		var conf=confirm("Are you sure to delete this property");
		if(conf==true){
			var storeid=jQuery(event.target).attr("rel");
			var url="<?php echo site_url('property/property/delete_pro')?>/"+storeid;
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
	function update(event){
		var storeid=jQuery(event.target).attr("rel");
		location.href="<?PHP echo site_url('property/property/edit');?>/"+storeid+"?<?php echo "m=$m&p=$p" ?>";
	}
	function approve(argument) {
		var conf=confirm("Are you sure to Active this property");
		if(conf==true){
			var storeid=jQuery(event.target).attr("rel");
			var url="<?php echo site_url('property/property/active_property')?>/"+storeid;
			$.ajax({
	            url:url,
	            type:"POST",
	            datatype:"Json",
	            async:false,
	            data:{'storeid':storeid},
	            success:function(data) {
	             	//$(event.target).closest('tr').remove();
	             	getdata(1);
	             	window.location.reload();
	            }
	          })
		}
	}	
	function search(event){
		
			var f_name=jQuery('#txts_fname').val();
			var l_name=jQuery('#txts_lname').val();
			var email=jQuery('#txts_email').val();
			var roleid=jQuery('#cbos_role').val();
			var u_name=jQuery('#txts_uname').val();
			//alert(roleid);
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/setting/user/search_inactive",    
				data: {'f_name':f_name,
					   'l_name':l_name,
					   'email':email,
					   'roleid':roleid,
					   'u_name':u_name},
				type: "POST",
				success: function(data){
                   //alert(data);
                   jQuery('#listbody').html(data);
                   
				}
			});
		}
	function deleteuser(event){
		var r = confirm("Are you sure to delete this User !");
		if (r == true) {
		    var u_id=jQuery(event.target).attr("rel");
			//location.href="<?PHP //echo site_url('setting/user/delete_user');?>/"+u_id;
			// var storeid=jQuery(event.target).attr("rel");
			var url="<?php echo site_url('setting/user/delete_user');?>/"+u_id;
			$.ajax({
	            url:url,
	            type:"POST",
	            datatype:"Json",
	            async:false,
	            success:function(data) {
	             	//$(event.target).closest('tr').remove();
	             	getdata(1);
	             	window.location.reload();
	            }
	          })
		} else {
		    txt = "You pressed Cancel!";
		}
		
	}
	function updateuser(event){
		var u_id=jQuery(event.target).attr("rel");
		var approve = 1;
		location.href="<?PHP echo site_url('setting/user/edit_isinactive');?>/"+u_id+'/'+approve;
	}
	function deletefinding(event){
		var conf=confirm("Are you Sure to delete this Finding");
		if(conf==true){
			var storeid=jQuery(event.target).attr("rel");
			var url="<?php echo site_url('greenadmin/home/delete')?>/"+storeid;
			$.ajax({
	            url:url,
	            type:"POST",
	            datatype:"Json",
	            async:false,
	            data:{'storeid':storeid},
	            success:function(data) {
	             	//$(event.target).closest('tr').remove();
	             	getdatac(1);
	             	location.reload();
	            }
	          })
		}
	}
	// ============= get by channel =============//
	var gdate = 1;
	getchannel(gdate);

	$('.optday').change(function(){
	    getchannel($(this).val());
	});

	function getchannel(gdate)
	{
	    var chart5 = am4core.create("chartdivchannel", am4charts.PieChart);
	    chart5.hiddenState.properties.opacity = 0; // this creates initial fade-in
	    chart5.fontSize = 10;

	    $.ajax({ 
	        type: 'GET', 
	        url:"<?php echo site_url('greenadmin/home/getViewByChannel')?>/"+gdate,
	        dataType: 'json',
	        success: function (data) { 
	            chart5.data = data;
	            console.log(data);
	        }
	    });

	    chart5.radius = am4core.percent(70);
	    chart5.innerRadius = am4core.percent(40);
	    // chart.startAngle = 180;
	    // chart.endAngle = 360;
	    chart5.responsive.enabled = true;

	    var series5 = chart5.series.push(new am4charts.PieSeries());
	    series5.dataFields.value = "value";
	    series5.dataFields.category = "country";
	    series5.legendSettings.labelText = '{country}';
	    series5.legendSettings.valueText = '{value}';

	    series5.slices.template.cornerRadius = 10;
	    series5.slices.template.innerCornerRadius = 7;
	    series5.slices.template.draggable = false;
	    series5.slices.template.inert = true;
	    series5.alignLabels = false;

	    series5.hiddenState.properties.startAngle = 90;
	    series5.hiddenState.properties.endAngle = 90;

	    chart5.legend = new am4charts.Legend();
	}
</script>