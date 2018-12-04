	 <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url('assets/images/logo.ico')?> ">
	<?php

		$row=$this->db->query("SELECT * FROM dashboard_item WHERE dashid='1'")->row();
		$m=$row->moduleid;
		$p=$row->link_pageid;
		$showage=0;
		

	 ?>

			<div id="content-header" class="mini">
				<h1>Dashboard</h1>
				<ul class="mini-stats box-3">
					<li>
						<div class="left sparkline_bar_good"><span>2,4,9,7,12,10,12</span>+10%</div>
						<div class="right">
							<strong>36094</strong>
							Visits
						</div>
					</li>
					<li>
						<div class="left sparkline_bar_neutral"><span>20,15,18,14,10,9,9,9</span>0%</div>
						<div class="right">
							<strong>1433</strong>
							Users
						</div>
					</li>
					<li>
						<div class="left sparkline_bar_bad"><span>3,5,9,7,12,20,10</span>+50%</div>
						<div class="right">
							<strong>8650</strong>
							Orders
						</div>
					</li>
				</ul>
			</div>

			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
				<a href="#" class="current">Dashboard</a>
			</div>
			
			<div style="height:600px"></div>
			<div class="container-fluid hide">
				<div class="row">
					<div class="col-xs-12 center" style="text-align: center;">					
						<ul class="quick-actions">
							<li>
								<a href="#">
									<i class="icon-cal"></i>
									Manage Events
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-shopping-bag"></i>
									Manage Orders
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-database"></i>
									Manage DB
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-people"></i>
									Manage Users
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-lock"></i>
									Security
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon-piechart"></i>
									Statistics
								</a>
							</li>
						</ul>
					</div>	
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info">
							Welcome in the <strong>Unicorn Admin Theme</strong>. Don't forget to check all the pages!
							<a href="#" data-dismiss="alert" class="close">×</a>
						</div>
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="fa fa-signal"></i></span>
								<h5>Site Statistics</h5>
								<div class="buttons">
									<a href="#" class="btn"><i class="fa fa-refresh"></i> <span class="text">Update stats</span></a>
								</div>
							</div>
							<div class="widget-content">
								<div class="row">
									<div class="col-xs-12 col-sm-4">
										<ul class="site-stats">
											<li><div class="cc"><i class="fa fa-user"></i> <strong>1433</strong> <small>Total Users</small></div></li>
											<li><div class="cc"><i class="fa fa-arrow-right"></i> <strong>16</strong> <small>New Users (last week)</small></div></li>
											<li class="divider"></li>
											<li><div class="cc"><i class="fa fa-shopping-cart"></i> <strong>259</strong> <small>Total Shop Items</small></div></li>
											<li><div class="cc"><i class="fa fa-tag"></i> <strong>8650</strong> <small>Total Orders</small></div></li>
											<li><div class="cc"><i class="fa fa-repeat"></i> <strong>29</strong> <small>Pending Orders</small></div></li>
										</ul>
									</div>
									<div class="col-xs-12 col-sm-8">
										<div class="chart"></div>
									</div>	
								</div>							
							</div>
						</div>					
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-grid ui-sortable">
						<div class="widget-box">
							<div class="widget-title"><span class="icon"><i class="fa fa-file"></i></span><h5>Recent Posts</h5><span title="54 total posts" class="label label-info tip-left">54</span></div>
							<div class="widget-content nopadding">
								<ul class="recent-posts">
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av2.jpg"> -->
										</div>
										<div class="article-post">
											<span class="user-info"> By: neytiri on 2 Aug 2012, 09:27 AM, IP: 186.56.45.7 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av3.jpg"> -->
										</div>
										<div class="article-post">
											<span class="user-info"> By: john on on 24 Jun 2012, 04:12 PM, IP: 192.168.24.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> -->
										</div>
										<div class="article-post">
											<span class="user-info"> By: michelle on 22 Jun 2012, 02:44 PM, IP: 172.10.56.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Publish</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li class="viewall">
										<a title="View all posts" class="tip-top" href="#"> + View all + </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-grid ui-sortable">
						<div class="widget-box">
							<div class="widget-title"><span class="icon"><i class="fa fa-comment"></i></span><h5>Recent Comments</h5><span title="88 total comments" class="label label-info tip-left">88</span></div>
							<div class="widget-content nopadding">
								<ul class="recent-comments">
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> -->
										</div>
										<div class="comments">
											<span class="user-info"> User: michelle on IP: 172.10.56.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av3.jpg"> -->
										</div>
										<div class="comments">
											<span class="user-info"> User: john on IP: 192.168.24.3 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li>
										<div class="user-thumb">
											<!-- <img width="40" height="40" alt="User" src="img/demo/av2.jpg"> -->
										</div>
										<div class="comments">
											<span class="user-info"> User: neytiri on IP: 186.56.45.7 </span>
											<p>
												<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
											</p>
											<a href="#" class="btn btn-primary btn-xs">Edit</a> <a href="#" class="btn btn-success btn-xs">Approve</a> <a href="#" class="btn btn-warning btn-xs">Mark as spam</a> <a href="#" class="btn btn-danger btn-xs">Delete</a>
										</div>
									</li>
									<li class="viewall">
										<a title="View all comments" class="tip-top" href="#"> + View all + </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-bar-chart-o"></i>
									</span>
									<h5>Bar chart</h5>
								</div>
								<div class="widget-content">
									<div class="bars"></div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-bar-chart-o"></i>
									</span>
									<h5>Pie chart</h5>
								</div>
								<div class="widget-content">
									<div class="pie"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-eye"></i>
									</span>
									<h5>Browsers</h5>
								</div>
								<div class="widget-content nopadding">
									<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Browser</th>
												<th>Visits</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Chrome</td>
												<td>8775</td>
											</tr>
											<tr>
												<td>Firefox</td>
												<td>5692</td>
											</tr>
											<tr>
												<td>Internet Explorer</td>
												<td>4030</td>
											</tr>
											<tr>
												<td>Opera</td>
												<td>1674</td>
											</tr>
											<tr>
												<td>Safari</td>
												<td>1166</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-4">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-arrow-right"></i>
									</span>
									<h5>Refferers</h5>
								</div>
								<div class="widget-content nopadding">
									<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Site</th>
												<th>Visits</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">http://google.com</a></td>
												<td>12679</td>
											</tr>
											<tr>
												<td><a href="#">http://bing.com</a></td>
												<td>11444</td>
											</tr>
											<tr>
												<td><a href="#">http://yahoo.com</a></td>
												<td>8595</td>
											</tr>
											<tr>
												<td><a href="#">http://www.something.com</a></td>
												<td>4445</td>
											</tr>
											<tr>
												<td><a href="#">http://else.com</a></td>
												<td>2094</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-lg-4">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-file"></i>
									</span>
									<h5>Most Visited Pages</h5>
								</div>
								<div class="widget-content nopadding">
									<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Page</th>
												<th>Visits</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><a href="#">Shopping cart</a></td>
												<td>9440</td>
											</tr>
											<tr>
												<td><a href="#">Blog</a></td>
												<td>6974</td>
											</tr>
											<tr>
												<td><a href="#">jQuery UI tips</a></td>
												<td>5377</td>
											</tr>
											<tr>
												<td><a href="#">100+ Free Icon Sets</a></td>
												<td>4990</td>
											</tr>
											<tr>
												<td><a href="#">How to use a Google Web Tools</a></td>
												<td>4834</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
					<div class="col-xs-12 col-sm-6 col-grid">
						<div class="widget-box">
							<div class="widget-title">
								<h5>Dialog</h5>
							</div>
							<div class="widget-content">
								<a href="#" id="open-dialog" class="btn btn-inverse">Dialog</a> <a href="#" id="open-modal" class="btn btn-primary">Modal Dialog</a>
								<div id="dialog" title="Basic dialog">
									<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
								</div>
								<div id="modal-dialog" title="Modal Dialog">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
						<div class="widget-box">
							<div class="widget-title">
								<h5>Sliders</h5>
							</div>
							<div class="widget-content">
								<h4>Horizontal Slider</h4>
								<div id="h-slider"></div>
								<div id="h-slider-2" class="slider-red"></div>
								<div id="h-slider-3" class="slider-purple"></div>
								<div id="h-slider-4" class="slider-green"></div>
								<div id="h-slider-5" class="slider-yellow"></div>
								<hr />
								<h4>Vertical Slider</h4>
								<div id="eq" style="height:120px;">
									<span>88</span>
									<span class="slider-red">77</span>
									<span class="slider-purple">55</span>
									<span class="slider-green">33</span>
									<span>40</span>
									<span class="slider-yellow">45</span>
									<span>70</span>
									<span class="slider-purple">25</span>
								</div>
							</div>
						</div>
						<div id="accordion" class="accordion">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-globe"></i></span><h5>Accordion, opened by default</h5>
                                    </a>
                                </div>
                                <div class="widget-content">
                                    This is opened by default
                                </div>
                            </div> 
                            <div class="widget-box">
                                <div class="widget-title">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-magnet"></i></span><h5>Accordion, closed</h5>
                                    </a>
                                </div>
                                <div class="widget-content">
                                    Another is open
                                </div>
                            </div>
                            <div class="widget-box">
                                <div class="widget-title">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-plane"></i></span><h5>Accordion, closed</h5>
                                    </a>
                                </div>
                            	<div class="widget-content">
                                	Another is open
                            	</div>
                            </div>
                        </div>
					</div>
					<div class="col-xs-12 col-sm-6 col-grid">
						<div class="widget-box">
							<div class="widget-title">
								<h5>Autocomplete</h5>
							</div>
							<div class="widget-content">
								<input type="text" class="form-control" placeholder="Enter tag" id="tags" />
							</div>
						</div>
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-calendar"></i>
								</span>
								<h5>Datepicker</h5>
							</div>
							<div class="widget-content">
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										From: <input id="ui-datepicker" type="text" class="form-control input-sm" />
									</div>
									<div class="col-xs-12 col-sm-6">
										To: <input id="ui-datepicker-2" type="text" class="form-control input-sm" />
									</div>
								</div>
								<hr />
								<h4>Inline Datepicker</h4>
								<div id="ui-datepicker-inline" class="center"></div>
							</div>
						</div>
					</div>
				</div>		
				<!--
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box widget-calendar">
							<div class="widget-title"><span class="icon"><i class="fa fa-calendar"></i></span><h5>Calendar</h5></div>
							<div class="widget-content nopadding">
								 <div class="calendar"></div>
							</div>
						</div>
					</div>
				</div>
				-->
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
	})
	
</script>