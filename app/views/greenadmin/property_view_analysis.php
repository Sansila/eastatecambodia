<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivday {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivrent {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivmonthsale{
	width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivmonthrent{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivperyear{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivchannel{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
.bd-example {
    padding: 1rem;
    margin-right: 0;
    margin-left: 0;
    border-width: .2rem;
}
.btns {
  width: 100%;
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
.vp{
  background: #c862de;
  color: white;
}
.vp:hover{
  color: white;
}
.unlink:hover{
  cursor: inherit;
}
.home-tabs.hot-new {
    border-color: #d84949;
}
.nav {
    padding-left: 0;
    margin-bottom: 30px;
    list-style: none;
    max-width: 100%;
}
.home-tabs>li.title {
    float: left;
    max-width: 200px;
}

.nav>li, .nav>li>a {
    display: block;
    position: relative;
    color: white;
    text-transform: uppercase;
}
.home-tabs.hot-new>li.title a {
    background: #d84949;
}
.nav>li, .nav>li>a {
    display: block;
    position: relative;
    color: white;
    text-transform: uppercase;
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
.vp{
  background: #c862de;
  color: white;
}
.vp:hover{
  color: white;
}
.unlink{
  text-align: right;
}
.unlink:hover{
  cursor: inherit;
}
</style>
<!-- HTML -->
<?php 
  $userid = $this->session->userdata('userid');
  $roleid=$this->session->userdata('roleid'); 
?>

<div class="container-fluid">
  <div class="bd-example">
    <div class="row">
      <div class="col-sm-12">
        <ul class="nav nav-tabs home-tabs hot-new" role="tablist">
          <li class="title font-strong" style="max-width:230px; ">
            <a><?php echo $this->lang->line('an_header_view')?> 
              <div class="corner"></div>
            </a>
        </li><li></li>
       </ul>
      </div>
    </div>
    <div class="row">
      	<div class="col-sm-6">
        	<h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_header_view_day_sal')?></h3>
        	<div id="chartdivday"></div>
      	</div>
      	<div class="col-sm-6">
	        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_header_view_day_rent')?></h3>
	        <div id="chartdivrent"></div>
	    </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
          <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_header_view_month_sal')?></h3>
          <div id="chartdivmonthsale"></div>
        </div>
        <div class="col-sm-6">
          <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_header_view_month_rent')?></h3>
          <div id="chartdivmonthrent"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_header_view_year')?></h3>
        <div id="chartdivperyear"></div>
      </div>
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
    </div>
  </div>
</div>

<script type="text/javascript">
        // Themes begi
am4core.useTheme(am4themes_animated);


var chart4 = am4core.create("chartdivperyear", am4charts.PieChart);
chart4.hiddenState.properties.opacity = 0; // this creates initial fade-in
chart4.fontSize = 10;

$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('greenadmin/home/getViewPropertyPerYear/')?>",
    dataType: 'json',
    success: function (data) { 
        chart4.data = data;
        console.log(data);
    }
});

chart4.radius = am4core.percent(70);
chart4.innerRadius = am4core.percent(40);
// chart.startAngle = 180;
// chart.endAngle = 360;
chart4.responsive.enabled = true;

var series4 = chart4.series.push(new am4charts.PieSeries());
series4.dataFields.value = "value";
series4.dataFields.category = "country";
series4.legendSettings.labelText = '{country}';
series4.legendSettings.valueText = '{value}';

series4.slices.template.cornerRadius = 10;
series4.slices.template.innerCornerRadius = 7;
series4.slices.template.draggable = false;
series4.slices.template.inert = true;
series4.alignLabels = false;

series4.hiddenState.properties.startAngle = 90;
series4.hiddenState.properties.endAngle = 90;

chart4.legend = new am4charts.Legend();


var chart = am4core.create("chartdivday", am4charts.XYChart);
$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('greenadmin/home/view_sale_day')?>",
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
series.tooltipText = "{cate}: {valueX.value}";

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
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "zoomY";

//add legend
//chart.legend = new am4charts.Legend();


var chart1 = am4core.create("chartdivrent", am4charts.XYChart);

$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('greenadmin/home/view_rent_day')?>",
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
series1.tooltipText = "{cate}: {valueX.value}";

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
chart1.cursor = new am4charts.XYCursor();
chart1.cursor.behavior = "zoomY";



var chart2 = am4core.create("chartdivmonthsale", am4charts.XYChart);

$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('greenadmin/home/view_sale_month')?>",
    dataType: 'json',
    success: function (data) { 
        chart2.data = data;
        console.log(data);
    }
});

//create category axis for years
var categoryAxis2 = chart2.yAxes.push(new am4charts.CategoryAxis());
categoryAxis2.dataFields.category = "year";
categoryAxis2.renderer.inversed = true;
categoryAxis2.renderer.grid.template.location = 0;

//create value axis for income and expenses
var valueAxis2 = chart2.xAxes.push(new am4charts.ValueAxis());
valueAxis2.renderer.opposite = true;


//create columns
var series2 = chart2.series.push(new am4charts.ColumnSeries());
series2.dataFields.categoryY = "year";
series2.dataFields.valueX = "income";
series2.name = "Income";
series2.columns.template.fillOpacity = 1;
series2.columns.template.strokeOpacity = 0;
series2.tooltipText = "{cate}: {valueX.value}";

//create line
var lineSeries2 = chart2.series.push(new am4charts.LineSeries());
lineSeries2.dataFields.categoryY = "year";
lineSeries2.dataFields.valueX = "expenses";
lineSeries2.name = "Expenses";
lineSeries2.strokeWidth = 3;
lineSeries2.tooltipText = "Expenses in {categoryY}: {valueX.value}";

var valueLabel2 = series2.bullets.push(new am4charts.LabelBullet());
  valueLabel2.label.text = "{cate}({income})";
  valueLabel2.label.horizontalCenter = "left";
  valueLabel2.label.dx = 10;
  valueLabel2.label.hideOversized = false;
  valueLabel2.label.truncate = false;

//add bullets
var circleBullet2 = lineSeries2.bullets.push(new am4charts.CircleBullet());
circleBullet2.circle.fill = am4core.color("#fff");
circleBullet2.circle.strokeWidth = 2;

//add chart cursor
chart2.cursor = new am4charts.XYCursor();
chart2.cursor.behavior = "zoomY";



var chart3 = am4core.create("chartdivmonthrent", am4charts.XYChart);

$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('greenadmin/home/view_rent_month')?>",
    dataType: 'json',
    success: function (data) { 
        chart3.data = data;
        console.log(data);
    }
});

//create category axis for years
var categoryAxis3 = chart3.yAxes.push(new am4charts.CategoryAxis());
categoryAxis3.dataFields.category = "year";
categoryAxis3.renderer.inversed = true;
categoryAxis3.renderer.grid.template.location = 0;

//create value axis for income and expenses
var valueAxis3 = chart3.xAxes.push(new am4charts.ValueAxis());
valueAxis3.renderer.opposite = true;


//create columns
var series3 = chart3.series.push(new am4charts.ColumnSeries());
series3.dataFields.categoryY = "year";
series3.dataFields.valueX = "income";
series3.name = "Income";
series3.columns.template.fillOpacity = 1;
series3.columns.template.strokeOpacity = 0;
series3.tooltipText = "{cate}: {valueX.value}";

//create line
var lineSeries3 = chart3.series.push(new am4charts.LineSeries());
lineSeries3.dataFields.categoryY = "year";
lineSeries3.dataFields.valueX = "expenses";
lineSeries3.name = "Expenses";
lineSeries3.strokeWidth = 3;
lineSeries3.tooltipText = "Expenses in {categoryY}: {valueX.value}";

var valueLabel3 = series3.bullets.push(new am4charts.LabelBullet());
  valueLabel3.label.text = "{cate}({income})";
  valueLabel3.label.horizontalCenter = "left";
  valueLabel3.label.dx = 10;
  valueLabel3.label.hideOversized = false;
  valueLabel3.label.truncate = false;

//add bullets
var circleBullet3 = lineSeries3.bullets.push(new am4charts.CircleBullet());
circleBullet3.circle.fill = am4core.color("#fff");
circleBullet3.circle.strokeWidth = 2;

//add chart cursor
chart3.cursor = new am4charts.XYCursor();
chart3.cursor.behavior = "zoomY";

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