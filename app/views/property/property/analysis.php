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
            <a>Property Analysis 
              <div class="corner"></div>
            </a>
        </li><li></li>
       </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h3 style="padding-left: 15px;">Property Analysis Per Day of PropertyID: <?php echo 'P'.$id?></h3>
        <div id="chartdivday"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h3 style="padding-left: 15px;">Property Analysis Per Month of PropertyID: <?php echo 'P'.$id?></h3>
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
    url:"<?php echo site_url('property/property/analysisperday/'.$id)?>",
    dataType: 'json',
    success: function (data) { 
        chart.data = data;
        console.log(data);
    }
});

// Set input format for the dates
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.dateX = "date";
series.tooltipText = "{value}"
series.strokeWidth = 2;
series.minBulletDistance = 15;

// Drop-shaped tooltips
series.tooltip.background.cornerRadius = 20;
series.tooltip.background.strokeOpacity = 0;
series.tooltip.pointerOrientation = "vertical";
series.tooltip.label.minWidth = 40;
series.tooltip.label.minHeight = 40;
series.tooltip.label.textAlign = "middle";
series.tooltip.label.textValign = "middle";

// Make bullets grow on hover
var bullet = series.bullets.push(new am4charts.CircleBullet());

bullet.circle.strokeWidth = 2;
bullet.circle.radius = 4;
bullet.circle.fill = am4core.color("#fff");

var bullethover = bullet.states.create("hover");
bullethover.properties.scale = 1.3;

// Make a panning cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "panXY";
chart.cursor.xAxis = dateAxis;
chart.cursor.snapToSeries = series;

// Create vertical scrollbar and place it before the value axis
chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarY.parent = chart.leftAxesContainer;
chart.scrollbarY.toBack();

// Create a horizontal scrollbar with previe and place it underneath the date axis
chart.scrollbarX = new am4charts.XYChartScrollbar();
chart.scrollbarX.series.push(series);
chart.scrollbarX.parent = chart.bottomAxesContainer;

chart.events.on("ready", function () {
  dateAxis.zoom({start:0, end:1});
});


var chart2 = am4core.create("chartdiv", am4charts.XYChart);

$.ajax({ 
    type: 'GET', 
    url:"<?php echo site_url('property/property/analysispermonth/'.$id)?>",
    dataType: 'json',
    success: function (data) { 
        chart2.data = data;
        console.log(data);
    }
});

// Set input format for the dates
chart2.dateFormatter.inputDateFormat = "yyyy-MM";

// Create axes
var dateAxis2 = chart2.xAxes.push(new am4charts.DateAxis());
var valueAxis2 = chart2.yAxes.push(new am4charts.ValueAxis());

// Create series
var series2 = chart2.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "value";
series2.dataFields.dateX = "date";
series2.tooltipText = "{value}"
series2.strokeWidth = 2;
series2.minBulletDistance = 15;

// Drop-shaped tooltips
series2.tooltip.background.cornerRadius = 20;
series2.tooltip.background.strokeOpacity = 0;
series2.tooltip.pointerOrientation = "vertical";
series2.tooltip.label.minWidth = 40;
series2.tooltip.label.minHeight = 40;
series2.tooltip.label.textAlign = "middle";
series2.tooltip.label.textValign = "middle";

// Make bullets grow on hover
var bullet2 = series2.bullets.push(new am4charts.CircleBullet());
bullet2.circle.strokeWidth = 2;
bullet2.circle.radius = 4;
bullet2.circle.fill = am4core.color("#fff");

var bullethover2 = bullet2.states.create("hover");
bullethover2.properties.scale = 1.3;

// Make a panning cursor
chart2.cursor = new am4charts.XYCursor();
chart2.cursor.behavior = "panXY";
chart2.cursor.xAxis = dateAxis2;
chart2.cursor.snapToSeries = series2;

// Create vertical scrollbar and place it before the value axis
chart2.scrollbarY = new am4core.Scrollbar();
chart2.scrollbarY.parent = chart2.leftAxesContainer;
chart2.scrollbarY.toBack();

// Create a horizontal scrollbar with previe and place it underneath the date axis
chart2.scrollbarX = new am4charts.XYChartScrollbar();
chart2.scrollbarX.series.push(series2);
chart2.scrollbarX.parent = chart2.bottomAxesContainer;

chart2.events.on("ready", function () {
  dateAxis2.zoom({start:0, end:1});
});

</script>