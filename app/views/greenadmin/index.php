<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivb {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivs {
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivcat{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
.chartdivcatd{
  width: 100%;
  height: auto;
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
#chartpropertystatus{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
#chartdivchannel{
  width: 100%;
  height: 500px;
  border: 1px solid #a6a6c1;
}
</style>
<!-- HTML -->
<?php 
  $userid = $this->session->userdata('userid');
  $roleid=$this->session->userdata('roleid'); 
?>
<div class="container-fluid">
  <div class="bd-example">
    <div class="row" style="padding-bottom: 20px;">
      <?php
          $i = 1; $class = "";
          $gmod = $this->db->query("SELECT * FROM z_page p WHERE p.moduleid = 18 ")->result();
          foreach ($gmod as $gmod) {
            if($i == 1){
              $class = "btns btn btn-primary";
              if($this->green->gAction("C")){
              ?>
                    <div class="col-sm-4">
                      <a href="<?php echo site_url($gmod->link).'?m='.$gmod->moduleid.'&p='.$gmod->pageid?>" type="button" class="<?php echo $class?>">
                        <?php 
                          if($this->session->userdata('site_lang') == "khmer")
                            echo $gmod->page_namekh;
                          else
                            echo $gmod->page_name; 
                        ?>
                        </a>
                    </div>
              <?php
              }
            }else{
              $class = "btns btn btn-secondary vp";
              if($this->green->gAction("R")){
            ?>
                <div class="col-sm-4">
                  <a href="<?php echo site_url($gmod->link).'?m='.$gmod->moduleid.'&p='.$gmod->pageid?>" type="button" class="<?php echo $class?>">
                      <?php 
                          if($this->session->userdata('site_lang') == "khmer")
                            echo $this->lang->line('dashboard_top_view').' '.$gmod->page_namekh;
                          else
                            echo $gmod->page_name; 
                        ?>
                    </a>
                </div>
            <?php
            }
            } 
        $i++;
        }
      ?>
      <?php 
        $where = "";
        $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
        if($rol->is_admin == 1 || $rol->is_admin == 2)
            $where.= "";
        else
            $where.= " AND p.agent_id = $userid";
        $row = $this->db->query("SELECT count(p.pid) as alls, p.pid,p.p_status,p.agent_id FROM tblproperty as p WHERE p.p_status = 1 {$where} ")->row();
      ?>
      <div class="col-sm-4">
        <div type="button" class="btns btn unlink">Total: <?php echo $row->alls?> Propeties</div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('chart_sale')?></h3>
        <div id="chartdiv"></div>
      </div>
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('chart_rent')?></h3>
        <div id="chartdivb"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('chart_sale_rent')?></h3>
        <div id="chartdivs"></div>
      </div>
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('chart_cat')?></h3>
        <div id="chartdivcat"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;">
          <select class="optday" id="txtshowby">
            <option value="1"><?php echo $this->lang->line('dashboard_channel_today')?></option>
            <option value="2"><?php echo $this->lang->line('dashboard_channel_yesteray')?></option>
            <option value="3"><?php echo $this->lang->line('dashboard_channel_3today')?></option>
            <option value="7"><?php echo $this->lang->line('dashboard_channel_7today')?></option>
            <option value="15"><?php echo $this->lang->line('dashboard_channel_15today')?></option>
            <option value="30"><?php echo $this->lang->line('dashboard_channel_30today')?></option>
            <option value="60"><?php echo $this->lang->line('dashboard_channel_60today')?></option>
            <option value="90"><?php echo $this->lang->line('dashboard_channel_90today')?></option>
          </select>
          <?php echo $this->lang->line('dashboard_view_channel')?>
        </h3>                  
        <div id="chartdivchannel"></div>
      </div>
      <div class="col-sm-6">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('dashboard_prop_status')?></h3>
        <div id="chartpropertystatus"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('chart_loc')?></h3>
        <div id="chartdivloc"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h3 style="padding-left: 15px;"><?php echo $this->lang->line('dashboard_top_15')?></h3>
        <div class="chartdivcatd">
          <div class="wrapper">
            <div class="clearfix" id="main_content_outer">
                <div id="main_content">
                    <div class="form-group" style="border-top: none; border-bottom: none;">
                        <label class='col-lg-2 control-label' style="text-align: right;padding-top: 10px;"><?php echo $this->lang->line('dashboard_view_last')?></label>
                        <div class="col-lg-5"> 
                            <div class="col-md-12">
                                <select class="form-control txtshowby" id="txtshowby">
                                  <option value="1"><?php echo $this->lang->line('dashboard_channel_today')?></option>
                                  <option value="2"><?php echo $this->lang->line('dashboard_channel_yesteray')?></option>
                                  <option value="3"><?php echo $this->lang->line('dashboard_channel_3today')?></option>
                                  <option value="5"><?php echo $this->lang->line('dashboard_channel_5today')?></option>
                                  <option value="7"><?php echo $this->lang->line('dashboard_channel_7today')?></option>
                                  <option value="15"><?php echo $this->lang->line('dashboard_channel_15today')?></option>
                                  <option value="30"><?php echo $this->lang->line('dashboard_channel_30today')?></option>
                                  <option value="60"><?php echo $this->lang->line('dashboard_channel_60today')?></option>
                                  <option value="90"><?php echo $this->lang->line('dashboard_channel_90today')?></option>
                                </select>
                            </div>                   
                        </div>
                    </div>
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="widget-box table-responsive">
                            <div class="img-show hide">
                              <img src="<?php echo site_url('assets/img/ld.gif')?>" style="position: absolute;z-index: 9999; width: 100px; left: 50%;">
                            </div>
                            <div class="widget-content nopadding" id='tap_print'>
                              <table class="table table-bordered table-striped table-hover">
                                <thead>
                                </thead>
                                <tbody class='list'>
                                </tbody>
                              </table> 
                            </div>
                        </div>
                      </div>          
                    </div> 
                </div>
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


  var perdate = 1;
  gettopproperty(perdate); 
  $('.txtshowby').change(function(){
      gettopproperty($(this).val()); 
  });

  function gettopproperty(perdate){
    $(".list").html('');
    var url="<?php echo site_url('greenadmin/home/getdata_proview')?>/"+perdate;
    $('.img-show').removeClass('hide');
    $.ajax({
      url:url,
      type:"GET",
      datatype:"Json",
      success:function(data){
        $(".list").html(data.data);
        setTimeout(function(){
          $('.img-show').addClass('hide');
        },2000);
      }
    });
  }

  am4core.useTheme(am4themes_animated);

  var chart = am4core.create("chartdiv", am4charts.PieChart);
  chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
  chart.fontSize = 10;

  $.ajax({ 
      type: 'GET', 
      url:"<?php echo site_url('greenadmin/home/getCountStatusBySale/'.$userid.'/'.$roleid)?>",
      dataType: 'json',
      success: function (data) { 
          chart.data = data;
          console.log(data);
      }
  });

  chart.radius = am4core.percent(70);
  chart.innerRadius = am4core.percent(40);
  // chart.startAngle = 180;
  // chart.endAngle = 360;
  chart.responsive.enabled = true;

  var series = chart.series.push(new am4charts.PieSeries());
  series.dataFields.value = "value";
  series.dataFields.category = "country";
  series.legendSettings.labelText = '{country}';
  series.legendSettings.valueText = '{value}';

  series.slices.template.cornerRadius = 10;
  series.slices.template.innerCornerRadius = 7;
  series.slices.template.draggable = false;
  series.slices.template.inert = true;
  series.alignLabels = false;

  series.hiddenState.properties.startAngle = 90;
  series.hiddenState.properties.endAngle = 90;

  chart.legend = new am4charts.Legend();


  var chart1 = am4core.create("chartdivb", am4charts.PieChart);
  chart1.hiddenState.properties.opacity = 0; // this creates initial fade-in
  chart1.fontSize = 10;

  $.ajax({ 
      type: 'GET', 
      url:"<?php echo site_url('greenadmin/home/getCountStatusByRent/'.$userid.'/'.$roleid)?>",
      dataType: 'json',
      success: function (data) { 
          chart1.data = data;
          console.log(data);
      }
  });

  chart1.radius = am4core.percent(70);
  chart1.innerRadius = am4core.percent(40);
  // chart1.startAngle = 180;
  // chart1.endAngle = 360;
  chart1.responsive.enabled = true;

  var series1 = chart1.series.push(new am4charts.PieSeries());
  series1.dataFields.value = "value";
  series1.dataFields.category = "country";
  series1.legendSettings.labelText = '{country}';
  series1.legendSettings.valueText = '{value}';

  series1.slices.template.cornerRadius = 10;
  series1.slices.template.innerCornerRadius = 7;
  series1.slices.template.draggable = false;
  series1.slices.template.inert = true;
  series1.alignLabels = false;

  series1.hiddenState.properties.startAngle = 90;
  series1.hiddenState.properties.endAngle = 90;

  chart1.legend = new am4charts.Legend();


  var chart2 = am4core.create("chartdivs", am4charts.PieChart);
  chart2.hiddenState.properties.opacity = 0; // this creates initial fade-in
  chart2.fontSize = 10;

  $.ajax({ 
      type: 'GET', 
      url:"<?php echo site_url('greenadmin/home/getCountStatusByRentAndSale/'.$userid.'/'.$roleid)?>",
      dataType: 'json',
      success: function (data) { 
          chart2.data = data;
      }
  });

  chart2.radius = am4core.percent(70);
  chart2.innerRadius = am4core.percent(40);
  // chart2.startAngle = 180;
  // chart2.endAngle = 360;
  chart2.responsive.enabled = true;

  var series2 = chart2.series.push(new am4charts.PieSeries());
  series2.dataFields.value = "value";
  series2.dataFields.category = "country";
  series2.legendSettings.labelText = '{country}';
  series2.legendSettings.valueText = '{value}';

  series2.slices.template.cornerRadius = 10;
  series2.slices.template.innerCornerRadius = 7;
  series2.slices.template.draggable = false;
  series2.slices.template.inert = true;
  series2.alignLabels = false;

  series2.hiddenState.properties.startAngle = 90;
  series2.hiddenState.properties.endAngle = 90;

  chart2.legend = new am4charts.Legend();


  var chart3 = am4core.create("chartdivloc", am4charts.XYChart);
  chart3 .fontSize = 10;
  $.ajax({ 
      type: 'GET', 
      url:"<?php echo site_url('greenadmin/home/getCountLocation/'.$userid.'/'.$roleid)?>",
      dataType: 'json',
      success: function (data) { 
          chart3.data = data;
          console.log(data);
      }
  });

  // Create axes
  var categoryAxis = chart3.yAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "country";
  categoryAxis.numberFormatter.numberFormat = "#";
  categoryAxis.renderer.inversed = true;
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.cellStartLocation = 0.1;
  categoryAxis.renderer.cellEndLocation = 0.9;

  var  valueAxis = chart3.xAxes.push(new am4charts.ValueAxis()); 
  valueAxis.renderer.opposite = true;

  // Create series
  function createSeries(field, name) {
    var series3 = chart3.series.push(new am4charts.ColumnSeries());
    series3.dataFields.valueX = field;
    series3.dataFields.categoryY = "country";
    series3.dataFields.value = "value";
    series3.name = name;
    series3.columns.template.tooltipText = "{country}: [bold]{value}";
    series3.columns.template.height = am4core.percent(100);
    series3.sequencedInterpolation = true;

    var valueLabel = series3.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{value}";
    valueLabel.label.horizontalCenter = "left";
    valueLabel.label.dx = 10;
    valueLabel.label.hideOversized = false;
    valueLabel.label.truncate = false;
  }

  createSeries("value", "country");


  var chart4 = am4core.create("chartdivcat", am4charts.PieChart);
    chart4.hiddenState.properties.opacity = 0; // this creates initial fade-in
    chart4.fontSize = 10;
    $.ajax({ 
        type: 'GET', 
        url:"<?php echo site_url('greenadmin/home/getChart/'.$userid.'/'.$roleid)?>",
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