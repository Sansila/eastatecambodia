<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>
<!-- HTML -->
<?php 
  $userid = $this->session->userdata('userid');
  $roleid=$this->session->userdata('roleid'); 
?>
<div id="chartdiv"></div>
<script type="text/javascript">

    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.PieChart);
    chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

    $.ajax({ 
        type: 'GET', 
        url:"<?php echo site_url('greenadmin/home/getChart/'.$userid.'/'.$roleid)?>",
        dataType: 'json',
        success: function (data) { 
            chart.data = data;
            console.log(data);
        }
    });

    chart.radius = am4core.percent(70);
    chart.innerRadius = am4core.percent(40);
    chart.startAngle = 180;
    chart.endAngle = 360;
    chart.responsive.enabled = true;

    var series = chart.series.push(new am4charts.PieSeries());
    series.dataFields.value = "value";
    series.dataFields.category = "country";
    series.legendSettings.labelText = '{country}';
    series.legendSettings.valueText = '{value}';

    series.slices.template.cornerRadius = 10;
    series.slices.template.innerCornerRadius = 7;
    series.slices.template.draggable = true;
    series.slices.template.inert = true;
    series.alignLabels = false;

    series.hiddenState.properties.startAngle = 90;
    series.hiddenState.properties.endAngle = 90;

    chart.legend = new am4charts.Legend();
</script>