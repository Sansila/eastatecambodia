<?php 
	$status = ''; 
	$location = ''; 
	$category = ''; 
	$firstprice = ''; 
	$lastprice = ''; 
	$available = ''; 
	$order =''; 
	$sort=''; 
	$list_type = '';
	$floorarea_first = "";
	$floorarea_last = "";
	$floorlevel_first = "";
	$floorlevel_last = "";
	$landarea_first = "";
	$landarea_last = "";
	$land_title = "";
	$bedroom_first = "";
	$bedroom_last = "";
	$bathroom_first = "";
	$bathroom_last = "";
	$park_first = "";
	$park_last = "";
	$features = "";
	$return_feature = "";
	$agent = "";
	$type = "";
    $cates = "";

    if(isset($_GET['status']))
        $status = $_GET['status'];
    if(isset($_GET['q']))
        $location = $_GET['q'];
    if(isset($_GET['categories']))
        $category = $_GET['categories'];
    if(isset($_GET['price__gte']))
        $firstprice = $_GET['price__gte'];
    if(isset($_GET['price__lte']))
        $lastprice = $_GET['price__lte'];
    if(isset($_GET['available']))
        $available = $_GET['available'];
    if(isset($_GET['order']))
        $order = $_GET['order'];
    if(isset($_GET['sort']))
        $short = $_GET['sort'];
    if(isset($_GET['list_type']))
        $list_type = $_GET['list_type'];
    if(isset($_GET['building_area_total__gte']))
        $floorarea_first = $_GET['building_area_total__gte'];
    if(isset($_GET['building_area_total__lte']))
        $floorarea_last = $_GET['building_area_total__lte'];
    if(isset($_GET['address_floor_level__gte']))
        $floorlevel_first = $_GET['address_floor_level__gte'];
    if(isset($_GET['address_floor_level__lte']))
        $floorlevel_last = $_GET['address_floor_level__lte'];
    if(isset($_GET['land_area_total__gte']))
        $landarea_first = $_GET['land_area_total__gte'];
    if(isset($_GET['land_area_total__lte']))
        $landarea_last = $_GET['land_area_total__lte'];
    if(isset($_GET['land_title']))
        $land_title = $_GET['land_title'];
    if(isset($_GET['bedrooms__gte']))
        $bedroom_first = $_GET['bedrooms__gte'];
    if(isset($_GET['bedrooms__lte']))
        $bedroom_last = $_GET['bedrooms__lte'];
    if(isset($_GET['bathrooms__gte']))
        $bathroom_first = $_GET['bathrooms__gte'];
    if(isset($_GET['bathrooms__lte']))
        $bathroom_last = $_GET['bathrooms__lte'];
    if(isset($_GET['garages__gte']))
        $park_first = $_GET['garages__gte'];
    if(isset($_GET['garages__lte']))
        $park_last = $_GET['garages__lte'];
    if(isset($_GET['features']))
        $features = $_GET['features'];
    if(isset($_GET['agent']))
        $agent = $_GET['agent'];
    if(isset($_GET['type']))
        $type = $_GET['type'];

    if($category !="")
    {
        foreach ($category as $c) {
            $cates.= $c.',';
        }    
    }
?>
<style type="text/css">
	.homepage-map #map {
	    width: 100%;
	    height: 710px;
	}
	.infobox-wrapper .sale_amount {
	    position: absolute;
	    top: 37px;
	    left: 20px;
	    z-index: 10;
	    font-size: 16px;
	    color: red;
	}
	.property-text{
		background: white;
		padding: 10px;
		width: 200px;
	}
</style>
<div role="main" class="main pgl-bg-grey">
	<div class="container">
		<div style="margin-top: 30px"></div>
		<div class="homepage-map">
			<div id="map"></div>
		</div>
		<div style="margin-top: 30px"></div>
	</div>
</div>
<script>
(function($){	
	var _latitude = 11.583903035180196;
	var _longitude = 104.90009201657483;
	var status = '<?php echo $status?>';
	var location = '<?php echo $location?>'; 
    var category = '<?php echo $cates?>'; 
    var firstprice = '<?php echo $firstprice?>'; 
    var lastprice = '<?php echo $lastprice?>'; 
    var available = '<?php echo $available?>'; 
    var order = '<?php echo $order?>'; 
    var sort = '<?php echo $sort?>';
    var list_type = '<?php echo $list_type?>';
    var floorarea_first = "<?php echo $floorarea_first?>";
    var floorarea_last = "<?php echo $floorarea_last?>";
    var floorlevel_first = "<?php echo $floorlevel_first?>";
    var floorlevel_last = "<?php echo $floorlevel_last?>";
    var landarea_first = "<?php echo $landarea_first?>";
    var landarea_last = "<?php echo $landarea_last?>";
    var land_title = "<?php echo $land_title?>";
    var bedroom_first = "<?php echo $bedroom_first?>";
    var bedroom_last = "<?php echo $bedroom_last?>";
    var bathroom_first = "<?php echo $bathroom_first?>";
    var bathroom_last = "<?php echo $bathroom_last?>";
    var park_first = "<?php echo $park_first?>";
    var park_last = "<?php echo $park_last?>";
    var features = "<?php echo $features?>";
    var return_feature = "<?php echo $return_feature?>";
    var type = "<?php echo $type?>";

	createHomepageGoogleMapByCategory(_latitude,_longitude,status,location,category,firstprice,lastprice,available,order,sort,list_type,floorarea_first,floorarea_last,floorlevel_first,floorlevel_last,floorlevel_first,floorlevel_last,landarea_first,landarea_last,land_title,bedroom_first,bedroom_last,bathroom_first,bathroom_last,park_first,park_last,features,return_feature,type);
})(jQuery);
</script>