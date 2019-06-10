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
      <div class="col-sm-12"><?php echo 'Property Name: '.$pname;?></div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_perday')?>: <?php echo 'P'.$id?></h3>
        <div id="chartdivday"></div>
      </div>
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('an_permonth')?>: <?php echo 'P'.$id?></h3>
        <div id="chartdiv"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
         <h3 style="padding-left: 15px;">
          <select class="optday" id="txtshowby">
            <option <?php if($perday == 1) echo "selected"; else echo ""; ?> value="1">Today</option>
            <option <?php if($perday == 2) echo "selected"; else echo ""; ?> value="2">Yesterday</option>
            <option <?php if($perday == 3) echo "selected"; else echo ""; ?> value="3">Last 3 days</option>
            <option <?php if($perday == 5) echo "selected"; else echo ""; ?> value="5">Last 5 days</option>
            <option <?php if($perday == 7) echo "selected"; else echo ""; ?> value="7">Last 7 days</option>
            <option <?php if($perday == 15) echo "selected"; else echo ""; ?> value="15">Last 15 days</option>
            <option <?php if($perday == 30) echo "selected"; else echo ""; ?> value="30">Last 30 days</option>
            <option <?php if($perday == 60) echo "selected"; else echo ""; ?> value="60">Last 60 days</option>
            <option <?php if($perday == 90) echo "selected"; else echo ""; ?> value="90">Last 90 days</option>
          </select>
          Property Analysis By Channel: <?php echo 'P'.$id?></h3>
        <div id="chartdivchannel"></div>
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
  series.columns.template.tooltipText = "View: [bold]{valueX}[/]";
  series.columns.template.height = am4core.percent(100);
  series.sequencedInterpolation = true;

  var valueLabel = series.bullets.push(new am4charts.LabelBullet());
  valueLabel.label.text = "{valueX}";
  valueLabel.label.horizontalCenter = "left";
  valueLabel.label.dx = 10;
  valueLabel.label.hideOversized = false;
  valueLabel.label.truncate = false;

  var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
  categoryLabel.label.text = "View";
  categoryLabel.label.horizontalCenter = "right";
  categoryLabel.label.dx = -10;
  categoryLabel.label.fill = am4core.color("#fff");
  categoryLabel.label.hideOversized = false;
  categoryLabel.label.truncate = false;
}

createSeries("income", "Income");
//createSeries("expenses", "Expenses");



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

// Create axes
var categoryAxis2 = chart2.yAxes.push(new am4charts.CategoryAxis());
categoryAxis2.dataFields.category = "year";
categoryAxis2.numberFormatter.numberFormat = "#";
categoryAxis2.renderer.inversed = true;
categoryAxis2.renderer.grid.template.location = 0;
categoryAxis2.renderer.cellStartLocation = 0.1;
categoryAxis2.renderer.cellEndLocation = 0.9;

var  valueAxis2 = chart2.xAxes.push(new am4charts.ValueAxis()); 
valueAxis2.renderer.opposite = true;

// Create series
function createSeries2(field, name) {
  var series2 = chart2.series.push(new am4charts.ColumnSeries());
  series2.dataFields.valueX = field;
  series2.dataFields.categoryY = "year";
  series2.name = name;
  series2.columns.template.tooltipText = "View: [bold]{valueX}[/]";
  series2.columns.template.height = am4core.percent(100);
  series2.sequencedInterpolation = true;

  var valueLabel2 = series2.bullets.push(new am4charts.LabelBullet());
  valueLabel2.label.text = "{valueX}";
  valueLabel2.label.horizontalCenter = "left";
  valueLabel2.label.dx = 10;
  valueLabel2.label.hideOversized = false;
  valueLabel2.label.truncate = false;

  var categoryLabel2 = series2.bullets.push(new am4charts.LabelBullet());
  categoryLabel2.label.text = "View";
  categoryLabel2.label.horizontalCenter = "right";
  categoryLabel2.label.dx = -10;
  categoryLabel2.label.fill = am4core.color("#fff");
  categoryLabel2.label.hideOversized = false;
  categoryLabel2.label.truncate = false;
}

createSeries2("income", "Income");


var gdate = '<?php echo $perday?>';
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
        url:"<?php echo site_url('property/property/getViewByChannel/'.$id)?>/"+gdate,
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