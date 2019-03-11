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
#chartdivloc {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
.chartdivdaysale{
	width: 100%;
	height: 500px;
	border: 1px solid #a6a6c1;
}
.chartdivmonthsale{
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
          <li class="title font-strong">
            <a><?php echo $this->lang->line('an_header')?> 
              <div class="corner"></div>
            </a>
        </li><li></li>
       </ul>
      </div>
    </div>
    <div class="row">
      	<div class="col-sm-12">
        	<h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_perday')?></h3>
        	<div id="chartdivday"></div>
      	</div>
      	<div class="col-sm-6 hide">
	        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_permonth')?></h3>
	        <div id="chartdiv"></div>
	    </div>
    </div>
  </div>
</div>

<script type="text/javascript">
        // Themes begi
am4core.useTheme(am4themes_animated);

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

// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.numberFormatter.numberFormat = "#";
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.cellStartLocation = 0.1;
categoryAxis.renderer.cellEndLocation = 0.9;

var  valueAxis = chart.xAxes.push(new am4charts.ValueAxis()); 
valueAxis.renderer.opposite = true;

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = field;
  series.dataFields.categoryY = "year";
  series.name = name;
  series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
  series.columns.template.height = am4core.percent(100);
  series.sequencedInterpolation = true;

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueX}";
  valueLabel.label.horizontalCenter = "left";
  valueLabel.label.dx = 10;
  valueLabel.label.hideOversized = false;
  valueLabel.label.truncate = false;

  var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
  categoryLabel.label.text = "{name}";
  categoryLabel.label.horizontalCenter = "right";
  categoryLabel.label.dx = -10;
  categoryLabel.label.fill = am4core.color("#fff");
  categoryLabel.label.hideOversized = false;
  categoryLabel.label.truncate = false;
}

createSeries("income", "Income");
createSeries("expenses", "Expenses");



// var chart2 = am4core.create("chartdiv", am4charts.XYChart);

// $.ajax({ 
//     type: 'GET', 
//     url:"<?php echo site_url('greenadmin/home/view_hot_month')?>",
//     dataType: 'json',
//     success: function (data) { 
//         chart2.data = data;
//         console.log(data);
//     }
// });

// // Create axes
// var categoryAxis2 = chart2.yAxes.push(new am4charts.CategoryAxis());
// categoryAxis2.dataFields.category = "year";
// categoryAxis2.numberFormatter.numberFormat = "#";
// categoryAxis2.renderer.inversed = true;
// categoryAxis2.renderer.grid.template.location = 0;
// categoryAxis2.renderer.cellStartLocation = 0.1;
// categoryAxis2.renderer.cellEndLocation = 0.9;

// var  valueAxis2 = chart2.xAxes.push(new am4charts.ValueAxis()); 
// valueAxis2.renderer.opposite = true;

// // Create series
// function createSeries2(field, name) {
//   var series2 = chart2.series.push(new am4charts.ColumnSeries());
//   series2.dataFields.valueX = field;
//   series2.dataFields.categoryY = "year";
//   series2.name = name;
//   series2.columns.template.tooltipText = "View: [bold]{valueX}[/]";
//   series2.columns.template.height = am4core.percent(100);
//   series2.sequencedInterpolation = true;

//   var valueLabel2 = series2.bullets.push(new am4charts.LabelBullet());
//   valueLabel2.label.text = "{valueX}";
//   valueLabel2.label.horizontalCenter = "left";
//   valueLabel2.label.dx = 10;
//   valueLabel2.label.hideOversized = false;
//   valueLabel2.label.truncate = false;

//   var categoryLabel2 = series2.bullets.push(new am4charts.LabelBullet());
//   categoryLabel2.label.text = "View";
//   categoryLabel2.label.horizontalCenter = "right";
//   categoryLabel2.label.dx = -10;
//   categoryLabel2.label.fill = am4core.color("#fff");
//   categoryLabel2.label.hideOversized = false;
//   categoryLabel2.label.truncate = false;
// }

// createSeries2("income", "Income");


</script>