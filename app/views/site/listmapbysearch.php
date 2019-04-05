<?php 
	$status = ''; 
	$location = ''; 
	$category = ''; 
	$firstprice = ''; 
	$lastprice = ''; 
	$available = ''; 
	$order =''; 
	$sort=''; 
    $return_cats = ''; 
    $return_locs = '';
    $activelist = ''; 
    $activegrid = '';
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
	$types = "";
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
        $types = $_GET['type'];

    if($category !="")
    {
        foreach ($category as $c) {
            $cates.= $c.',';
        }    
    }

    if($location != "")
    {
        $location = trim($location, ';');
        $arr = explode(';', $location);
        $num = count($arr);$i=0;
        foreach ($arr as $arr) {
            $comma = urlencode(";");
            if(++$i == $num)
            {
                $comma = "";
            }
            $return_locs.= $arr.''.$comma;
        }
    }

    if($list_type !="")
    {
        if($list_type == "grid")
        {
            $activegrid = "active";
            $hideg = "";
            $hidel = "hide";
        }
        if($list_type == "lists")
        {
            $activelist = "active";
            $hidel = "";
            $hideg = "hide";
        }
    }
    
    if($category !="")
    {
        $ar = urlencode('[]');
        foreach ($category as $cat) {
            $return_cats .= "categories".$ar."=".$cat."&";
        }
    }else{
        $return_cats .= "categories=&";
    }
    // =================== get all result

    $where = ""; $order_by = ""; $return_cat = ""; $return_loc = ""; $limit="";

        if($status !="" || $location !="" || $category !="" || $firstprice !="" ||$lastprice !="")
        {
                $where.= " AND 1=1 ";
            if($firstprice !="" && $lastprice !=""){
                $where.= " AND p.price BETWEEN $firstprice AND $lastprice";
            }else if($firstprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $firstprice";
            }else if($lastprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $lastprice";
            }
            if($status !="")
            {
                if($status == "rent")
                    $where.= " AND p.p_type = 2 ";
                if($status == "sale")
                    $where.= " AND p.p_type = 1 ";
                if($status == "both")
                    $where.= " AND p.p_type = 3 ";
            }
            if($location != "")
            {
                $location = trim($location, ';');
                $arr = explode(';', $location);
                $num = count($arr);
                $i=0;
                $where.= " AND (";
                foreach ($arr as $arr) {
                    $lid = $this->db->query("SELECT * FROM tblpropertylocation WHERE locationname = '$arr' ")->row();
                    $and = "AND";
                    $or = "OR";
                    if(++$i == $num)
                    {
                        $and = "";
                        $or = "";
                    }
                    if($lid)
                    {
                        $where.= " lp.lineage LIKE '%$lid->propertylocationid%' OR p.property_name LIKE '%$arr%' $and ";
                    }else{
                        $where.= " (p.property_name LIKE '%$arr%' OR p.pid = '".substr($arr,1)."' OR p.property_tag LIKE '%$arr%') $and ";
                    }    
                }
                $where.= ")";
            }
            
            if($category !="")
            {
                $where.= " AND (";
                $num = count($category);$i=0;
                foreach ($category as $cat) {
                    $or = "OR";
                    if(++$i == $num)
                    {
                        $or = "";
                    }
                    $where.= " pt.typename = '$cat' $or ";
                }
                $where.= ")";
            }
        }else{
            $where.= "";
        }

        if($floorarea_first !="" && $floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $floorarea_first AND $floorarea_last";
        }else if($floorarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_first";
        }else if($floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_last";
        }

        if($floorlevel_first !="" && $floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN $floorlevel_first AND $floorlevel_last";
        }else if($floorlevel_first !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_first";
        }else if($floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_last";
        }

        if($landarea_first !="" && $landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $landarea_first AND $landarea_last";
        }else if($landarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_first";
        }else if($landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_last";
        }

        if($land_title != "")
        {
            if($land_title == "hard")
                $where.= " AND p.title = 2 ";
            if($land_title == "soft")
                $where.= " ANd p.title = 1 ";
        }

        if($bedroom_first !="" && $bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN $bedroom_first AND $bedroom_last";
        }else if($bedroom_first !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_first";
        }else if($bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_last";
        }

        if($bathroom_first !="" && $bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN $bathroom_first AND $bathroom_last";
        }else if($bathroom_first !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_first";
        }else if($bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_last";
        }

        if($park_first !="" && $park_first !="")
        {
            $where.= " AND p.parking BETWEEN $park_first AND $park_last";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }

        if($agent !="")
        {
            $where.= " AND p.agent_id = '$agent' ";
        }

        // ============= Order by =============//

        if($order != "" && $sort == null)
        {
            $order_by.= " ORDER BY p.create_date $order";
        }else if($sort !="" && $order != ""){
            if($sort == "Price")
                $order_by.= " ORDER BY p.price $order ";
            if($sort == "Area")
                $order_by.= " ORDER BY p.housesize $order ";
            if($sort == "Date")
                $order_by.= " ORDER BY p.create_date $order ";
        }else{
            $order_by.= " ORDER BY p.create_date desc, p.pid desc";
        }

        // ============ configure pagination =====//

        $query = "SELECT p.pid,
                         p.type_id,
                         p.lp_id,
                         p.p_status,
                         p.property_name,
                         p.price,
                         p.housesize,
                         p.description,
                         p.create_date,
                         p.p_type,
                         p.bedroom,
                         p.bathroom,
                         p.address,
                         p.parking,
                         p.title,
                         p.floor,
                         p.property_tag,
                         lp.propertylocationid,
                         lp.locationname,
                         lp.lineage,
                         pt.typeid,
                         pt.menu,
                         pt.typename 
                        FROM tblproperty as p
                        LEFT JOIN tblpropertylocation as lp 
                        ON p.lp_id = lp.propertylocationid
                        LEFT JOIN tblpropertytype as pt
                        ON p.type_id = pt.typeid
                        WHERE p.p_status = 1 {$where} {$order_by}
            ";

        $all = $this->db->query($query)->result();


?>
        <div role="main" class="main pgl-bg-grey">
            <section id="home-search-bg" class="home-search hero lazyload" data-sizes="auto" style="background-image: url('<?php echo site_url('assets/upload/banner/thumb'.'/'.$slide->banner_id.'.png')?>'); ">
                <div class="overlay"></div>
                <div class="rows align-center collapse">
                    <div class="columns smallport-24 small-22 large-18">
                        <div class="search-form-wrapper clearfix rows show-for-medium">
                            <div class="smallport-24 medium-20">

                                <div class="search-field-wrapper search-type desktop-search-type">
                                    <button data-toggle="search-type-dropdown" class="search-field  expanded desktop-search-field">
                                        <span class="text-label" style="text-transform: capitalize;"><?php if($status == "all") echo "Sale"; else echo $status;?></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane search-type" id="search-type-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <!-- <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="all">Property Status</div> -->
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="sale">Sale</div>
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="rent">Rent</div>
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="both">Rent & Sale</div>
                                        <!--<div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="condo">Condo</div>-->
                                    </div>
                                </div>

                                <div class="search-field-wrapper search-location">
                                    <div class="search-field">
                                        <span class="text-label"><input id="id_location_autocomplete" class="location-autocomplete" type="text" name="locations" placeholder="Enter any location, Property name" value=""></span>
                                        <button data-toggle="location-dropdown" class="float-right icon-down"></button>
                                    </div>
                                    <div class="dropdown-pane" id="location-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <div class="tabs-content" data-tabs-content="desktop-location-tabs">
                                            <div class="tabs-panel is-active location-panel" id="desktop-location-panel">
                                            <!-- <div class="location-content"><?php //echo $data;?></div> -->
                                            </div>
                                            <div class="tabs-panel landmark-panel" id="desktop-landmark-panel"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-field-wrapper search-categories">
                                    <button data-toggle="categories-dropdown" class="search-field hollow expanded">
                                        <span class="text-label" data-default="All Property types">Property type</span>
                                        <span class="text-label-selected small"><span class="min-label">All</span></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane" id="categories-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <div class="tabs-content" data-tabs-content="example-tabs">
                                            <div class="tabs-panel is-active residential-panel" id="residential-panel"></div>
                                            <div class="tabs-panel commercial-panel" id="commercial-panel"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-field-wrapper search-price desktop-search-price">
                                    <button data-toggle="price-range" class="search-field hollow expanded">
                                        <span class="text-label">Price Range</span>
                                        <span class="text-label-selected small"><span class="min-label">Any</span><span class="max-label"></span></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane" id="price-range" data-dropdown data-v-offset="10" data-close-on-click="true">
                                        <div class="tabs-content" data-tabs-content="desktop-price-tabs">
                                            <div class="tabs-panel is-active price-panel" id="desktop-price-panel">
                                                <input type="text" name="minprice" placeholder="Min Price" data-price-min-changer data-target-list="#desktop-price-panel .price-min-list" data-target-button=".desktop-search-price"> -
                                                <input type="text" name="maxprice" placeholder="Max Price" data-price-max-changer data-target-list="#desktop-price-panel .price-max-list" data-target-button=".desktop-search-price">
                                                <div class="price-range-container"></div>
                                            </div>
                                            <div class="tabs-panel area-panel" id="desktop-area-panel">
                                                <input type="text" name="minareaprice" placeholder="Min Price" data-area-min-changer data-target-list="#desktop-area-panel .area-min-list" data-target-button=".desktop-search-price"> -
                                                <input type="text" name="maxareaprice" placeholder="Max Price" data-area-max-changer data-target-list="#desktop-area-panel .area-max-list" data-target-button=".desktop-search-price">
                                                <div class="area-range-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="search-field-wrapper search-refine">
                                    <button data-toggle="refine-dropdown" class="search-field hollow expanded">
                                        <span class="text-label">Customize Your Search</span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane search-refine" id="refine-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <div class="rows">
                                            <div class="columns">

                                                <div class="search-field-wrapper search-floor-area desktop-search-floor-area">
                                                    <button data-toggle="floor-area-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Floor Area</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="floor-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minfloor-area" class="range" placeholder="Min Floor Area" data-range-min-changer data-target-list="#floor-area-range .range-min-list" data-target-button=".desktop-search-floor-area" data-target-field="#id_building_area_total__gte"> -
                                                        <input type="text" name="maxfloor-area" class="range" placeholder="Max Floor Area" data-range-max-changer data-target-list="#floor-area-range .range-max-list" data-target-button=".desktop-search-floor-area" data-target-field="#id_building_area_total__lte">
                                                        <div id="floor-area-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="40">40m<sup>2</sup></div>
                                                                <div data-value="80">80m<sup>2</sup></div>
                                                                <div data-value="90">90m<sup>2</sup></div>
                                                                <div data-value="100">100m<sup>2</sup></div>
                                                                <div data-value="200">200m<sup>2</sup></div>
                                                                <div data-value="400">400m<sup>2</sup></div>
                                                                <div data-value="600">600m<sup>2</sup></div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="40">40m<sup>2</sup></div>
                                                                <div data-value="80">80m<sup>2</sup></div>
                                                                <div data-value="90">90m<sup>2</sup></div>
                                                                <div data-value="100">100m<sup>2</sup></div>
                                                                <div data-value="200">200m<sup>2</sup></div>
                                                                <div data-value="400">400m<sup>2</sup></div>
                                                                <div data-value="600">600m<sup>2</sup></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="columns">

                                                <div class="search-field-wrapper search-bedrooms desktop-search-bedrooms">
                                                    <button data-toggle="bedrooms-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Bedrooms</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="bedrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minbedrooms" class="range" placeholder="Min Bedrooms" data-range-min-changer data-target-list="#bedrooms-range .range-min-list" data-target-button=".desktop-search-bedrooms" data-target-field="#id_bedrooms__gte"> -
                                                        <input type="text" name="maxbedrooms" class="range" placeholder="Max Bedrooms" data-range-max-changer data-target-list="#bedrooms-range .range-max-list" data-target-button=".desktop-search-bedrooms" data-target-field="#id_bedrooms__lte">
                                                        <div id="bedrooms-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="rows">
                                            <div class="columns">

                                                <div class="search-field-wrapper search-floor-level desktop-search-floor-level">
                                                    <button data-toggle="floor-level-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Floor Level</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="floor-level-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minfloor-level" class="range" placeholder="Min Floor Level" data-range-min-changer data-target-list="#floor-level-range .range-min-list" data-target-button=".desktop-search-floor-level" data-target-field="#id_address_floor_level__gte"> -
                                                        <input type="text" name="maxfloor-level" class="range" placeholder="Max Floor Level" data-range-max-changer data-target-list="#floor-level-range .range-max-list" data-target-button=".desktop-search-floor-level" data-target-field="#id_address_floor_level__lte">
                                                        <div id="floor-level-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="0">Ground</div>
                                                                <div data-value="10">10</div>
                                                                <div data-value="20">20</div>
                                                                <div data-value="30">30</div>
                                                                <div data-value="40">40</div>
                                                                <div data-value="50">50</div>
                                                                <div data-value="60">60</div>
                                                                <div data-value="70">70</div>
                                                                <div data-value="80">80</div>
                                                                <div data-value="90">90</div>
                                                                <div data-value="100">100</div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="0">Ground</div>
                                                                <div data-value="10">10</div>
                                                                <div data-value="20">20</div>
                                                                <div data-value="30">30</div>
                                                                <div data-value="40">40</div>
                                                                <div data-value="50">50</div>
                                                                <div data-value="60">60</div>
                                                                <div data-value="70">70</div>
                                                                <div data-value="80">80</div>
                                                                <div data-value="90">90</div>
                                                                <div data-value="100">100</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="columns">

                                                <div class="search-field-wrapper search-bathrooms desktop-search-bathrooms">
                                                    <button data-toggle="bathrooms-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Bathrooms</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="bathrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minbathrooms" class="range" placeholder="Min Bathrooms" data-range-min-changer data-target-list="#bathrooms-range .range-min-list" data-target-button=".desktop-search-bathrooms" data-target-field="#id_bathrooms__gte"> -
                                                        <input type="text" name="maxbathrooms" class="range" placeholder="Max Bathrooms" data-range-max-changer data-target-list="#bathrooms-range .range-max-list" data-target-button=".desktop-search-bathrooms" data-target-field="#id_bathrooms__lte">
                                                        <div id="bathrooms-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="rows">
                                            <div class="columns">

                                                <div class="search-field-wrapper search-land-area desktop-search-land-area">
                                                    <button data-toggle="land-area-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Land Area</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="land-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minland-area" class="range" placeholder="Min Land Area" data-range-min-changer data-target-list="#land-area-range .range-min-list" data-target-button=".desktop-search-land-area" data-target-field="#id_land_area_total__gte"> -
                                                        <input type="text" name="maxland-area" class="range" placeholder="Max Land Area" data-range-max-changer data-target-list="#land-area-range .range-max-list" data-target-button=".desktop-search-land-area" data-target-field="#id_land_area_total__lte">
                                                        <div id="land-area-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="80">80m<sup>2</sup></div>
                                                                <div data-value="90">90m<sup>2</sup></div>
                                                                <div data-value="100">100m<sup>2</sup></div>
                                                                <div data-value="200">200m<sup>2</sup></div>
                                                                <div data-value="400">400m<sup>2</sup></div>
                                                                <div data-value="600">600m<sup>2</sup></div>
                                                                <div data-value="800">800m<sup>2</sup></div>
                                                                <div data-value="1000">1000m<sup>2</sup></div>
                                                                <div data-value="2000">2000m<sup>2</sup></div>
                                                                <div data-value="4000">4000m<sup>2</sup></div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="80">80m<sup>2</sup></div>
                                                                <div data-value="90">90m<sup>2</sup></div>
                                                                <div data-value="100">100m<sup>2</sup></div>
                                                                <div data-value="200">200m<sup>2</sup></div>
                                                                <div data-value="400">400m<sup>2</sup></div>
                                                                <div data-value="600">600m<sup>2</sup></div>
                                                                <div data-value="800">800m<sup>2</sup></div>
                                                                <div data-value="1000">1000m<sup>2</sup></div>
                                                                <div data-value="2000">2000m<sup>2</sup></div>
                                                                <div data-value="4000">4000m<sup>2</sup></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="search-field-wrapper search-completed-year search-year">
                                                    <button data-toggle="year-completed-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Year Completed</span>
                                                        <span class="text-label-selected">Any</span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane completed-list-container" id="year-completed-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                                </div>

                                                <div class="search-field-wrapper search-completion-year search-year">
                                                    <button data-toggle="completion-year-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Completion Year</span>
                                                        <span class="text-label-selected">Any</span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane completion-list-container" id="completion-year-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                                </div>

                                            </div>
                                            <div class="columns hide">

                                                <div class="search-field-wrapper search-features">
                                                    <button data-toggle="features-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Main Features</span>
                                                        <span class="text-label-selected">Any</span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="features-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="rows">
                                            <div class="columns">

                                                <div class="search-field-wrapper search-land-title search-title">
                                                    <button data-toggle="land-title-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Title Deed</span>
                                                        <span class="text-label-selected">Any</span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="land-title-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="">Any</div>
                                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="hard">Hard Title</div>
                                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="soft">Soft Title</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="columns">

                                                <div class="search-field-wrapper search-parking desktop-search-parking">
                                                    <button data-toggle="parking-dropdown" class="search-field  expanded">
                                                        <span class="text-label">Parking Spaces</span>
                                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                                        <span class="icon-down"></span>
                                                    </button>
                                                    <div class="dropdown-pane" id="parking-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                                        <input type="text" name="minparking" class="range" placeholder="Min Parking" data-range-min-changer data-target-list="#parking-range .range-min-list" data-target-button=".desktop-search-parking" data-target-field="#id_garages__gte"> -
                                                        <input type="text" name="maxparking" class="range" placeholder="Max Parking" data-range-max-changer data-target-list="#parking-range .range-max-list" data-target-button=".desktop-search-parking" data-target-field="#id_garages__lte">
                                                        <div id="parking-range" class="range-container">
                                                            <div class="range-min-list range-list left">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                            <div class="range-max-list range-list right">
                                                                <div data-value="">Any</div>
                                                                <div data-value="1">1</div>
                                                                <div data-value="2">2</div>
                                                                <div data-value="3">3</div>
                                                                <div data-value="4">4</div>
                                                                <div data-value="5">5</div>
                                                                <div data-value="6">6</div>
                                                                <div data-value="7">7</div>
                                                                <div data-value="8">8</div>
                                                                <div data-value="9">9</div>
                                                                <div data-value="10">10</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="rows">
                                            <div class="columns align-self-bottom text-right">

                                                <button type="button" class="button hollow" data-reset-button>Reset</button>
                                                <button type="button" class="button highlight" data-search-button>Find</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="smallport-24 medium-4">
                                <div class="search-field-wrapper search-button">
                                    <button class="button highlight expanded" id="search-submit-button" data-search-button>Search</button>
                                </div>
                                <div class="search-field-wrapper search-button hide">
                                    <a href="<?php echo site_url('site/site/listmap')?>">
                                        <button data-search-button style="color: red;font-style: italic; text-decoration: underline red;">
                                            Search by map
                                        </button>
                                    </a>
                                </div>
                                <div class="search-field-wrapper search-button">
                                    <button class="button highlight expanded btn-search-map">
                                        Search map <span><img src="<?php echo site_url('assets/img/map.png')?>" style="width: 24px;"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="search-form-wrapper clearfix rows hide-for-medium js-mobile-search align-center">
                            <div class="smallport-22 medium-20">

                                <div class="search-field-wrapper search-location">
                                    <div class="search-field">
                                        <span class="text-label"><input id="id_mobile_location_autocomplete" class="location-autocomplete" type="text" name="locations" placeholder="Enter any location, Property name" value=""></span>
                                        <button data-toggle="mobile-location-dropdown" class="float-right icon-down"></button>
                                    </div>
                                    <div class="dropdown-pane" id="mobile-location-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <div class="tabs-content" data-tabs-content="mobile-location-tabs">
                                            <div class="tabs-panel is-active location-panel" id="mobile-location-panel">
                                                <!-- <div class="location-content"><?php //echo $data;?></div> -->
                                            </div>
                                            <div class="tabs-panel landmark-panel" id="mobile-landmark-panel"></div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="search-field-wrapper search-type mobile-search-type">
                                    <button data-toggle="mobile-search-type-dropdown" class="search-field hollow expanded mobile-search-field">
                                        <span class="text-label">Looking to</span>
                                        <span class="text-label-selected" style="text-transform: capitalize;"><?php if($status == "all") echo "Sale"; else echo $status;?></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane search-type" id="mobile-search-type-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <!-- <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="all">Property Status</div> -->
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="sale">Sale</div>
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="rent">Rent</div>
                                        <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="both">Rent & Sale</div>
                                        <!--<div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="condo">Condo</div>-->
                                    </div>
                                </div>


                                <div class="search-field-wrapper search-categories">
                                    <button data-toggle="mobile-categories-dropdown" class="search-field hollow expanded">
                                        <span class="text-label" data-default="">Property type</span>
                                        <span class="text-label-selected"><span class="min-label">All</span></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane" id="mobile-categories-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                        <div class="tabs-content" data-tabs-content="example-tabs">
                                            <div class="tabs-panel is-active residential-panel" id="mobile-residential-panel"></div>
                                            <div class="tabs-panel commercial-panel" id="mobile-commercial-panel"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="search-field-wrapper search-price mobile-search-price">
                                    <button data-toggle="mobile-price-range" class="search-field hollow expanded">
                                        <span class="text-label">Price</span>
                                        <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                        <span class="icon-down"></span>
                                    </button>
                                    <div class="dropdown-pane" id="mobile-price-range" data-dropdown data-v-offset="10" data-close-on-click="true">
                                        <div class="tabs-content" data-tabs-content="mobile-price-tabs">
                                            <div class="tabs-panel is-active price-panel" id="mobile-price-panel">
                                                <input type="text" name="minprice" placeholder="Min Price" data-price-min-changer data-target-list="#mobile-price-panel .price-min-list" data-target-button=".mobile-search-price"> -
                                                <input type="text" name="maxprice" placeholder="Max Price" data-price-max-changer data-target-list="#mobile-price-range .price-max-list" data-target-button=".mobile-search-price">
                                                <div class="price-range-container"></div>
                                            </div>
                                            <div class="tabs-panel area-panel" id="mobile-area-panel">
                                                <input type="text" name="minareaprice" placeholder="Min Price" data-area-min-changer data-target-list="#mobile-area-panel .area-min-list" data-target-button=".mobile-search-price"> -
                                                <input type="text" name="maxareaprice" placeholder="Max Price" data-area-max-changer data-target-list="#mobile-area-panel .area-max-list" data-target-button=".mobile-search-price">
                                                <div class="area-range-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script id="price-list-template" type="text/x-handlebars-template">
                                    <div id="price-min-list" class="price-min-list price-list left">
                                        {{#each min}}
                                        <div data-value="{{this.value}}">{{ this.label }}</div>{{/each}}
                                    </div>
                                    <div id="price-max-list" class="price-max-list price-list right">
                                        {{#each max}}
                                        <div data-value="{{this.value}}">{{ this.label }}</div>{{/each}}
                                    </div>
                                </script>
                                <script id="area-list-template" type="text/x-handlebars-template">
                                    <div id="area-min-list" class="area-min-list area-list left">
                                        {{#each min}}
                                        <div data-value="{{this.value}}">{{ this.label }}</div>{{/each}}
                                    </div>
                                    <div id="area-max-list" class="area-max-list area-list right">
                                        {{#each max}}
                                        <div data-value="{{this.value}}">{{ this.label }}</div>{{/each}}
                                    </div>
                                </script>
                                <script id="year-list-template" type="text/x-handlebars-template">
                                    {{#each min}}
                                    <div class="dropdown-item" data-year-dropdown-changer data-target-field="#id_year_built__gte" data-target-value="{{this.value}}">{{ this.label }}</div>{{/each}}
                                </script>

                                <div class="mobile-additional-options">

                                    <div class="search-field-wrapper search-bedrooms mobile-search-bedrooms">
                                        <button data-toggle="mobile-bedrooms-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Bedrooms</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-bedrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minbedrooms" class="range" placeholder="Min Bedrooms" data-range-min-changer data-target-list="#bedrooms-range .range-min-list" data-target-button=".mobile-search-bedrooms" data-target-field="#id_bedrooms__gte"> -
                                            <input type="text" name="maxbedrooms" class="range" placeholder="Max Bedrooms" data-range-max-changer data-target-list="#bedrooms-range .range-max-list" data-target-button=".mobile-search-bedrooms" data-target-field="#id_bedrooms__lte">
                                            <div id="bedrooms-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-bathrooms mobile-search-bathrooms">
                                        <button data-toggle="mobile-bathrooms-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Bathrooms</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-bathrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minbathrooms" class="range" placeholder="Min Bathrooms" data-range-min-changer data-target-list="#bathrooms-range .range-min-list" data-target-button=".mobile-search-bathrooms" data-target-field="#id_bathrooms__gte"> -
                                            <input type="text" name="maxbathrooms" class="range" placeholder="Max Bathrooms" data-range-max-changer data-target-list="#bathrooms-range .range-max-list" data-target-button=".mobile-search-bathrooms" data-target-field="#id_bathrooms__lte">
                                            <div id="bathrooms-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-features hide">
                                        <button data-toggle="mobile-features-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Main Features</span>
                                            <span class="text-label-selected">Any</span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-features-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                    </div>

                                    <div class="search-field-wrapper search-floor-level mobile-search-floor-level">
                                        <button data-toggle="mobile-floor-level-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Floor Level</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-floor-level-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minfloor-level" class="range" placeholder="Min Floor Level" data-range-min-changer data-target-list="#floor-level-range .range-min-list" data-target-button=".mobile-search-floor-level" data-target-field="#id_address_floor_level__gte"> -
                                            <input type="text" name="maxfloor-level" class="range" placeholder="Max Floor Level" data-range-max-changer data-target-list="#floor-level-range .range-max-list" data-target-button=".mobile-search-floor-level" data-target-field="#id_address_floor_level__lte">
                                            <div id="floor-level-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="0">Ground</div>
                                                    <div data-value="10">10</div>
                                                    <div data-value="20">20</div>
                                                    <div data-value="30">30</div>
                                                    <div data-value="40">40</div>
                                                    <div data-value="50">50</div>
                                                    <div data-value="60">60</div>
                                                    <div data-value="70">70</div>
                                                    <div data-value="80">80</div>
                                                    <div data-value="90">90</div>
                                                    <div data-value="100">100</div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="0">Ground</div>
                                                    <div data-value="10">10</div>
                                                    <div data-value="20">20</div>
                                                    <div data-value="30">30</div>
                                                    <div data-value="40">40</div>
                                                    <div data-value="50">50</div>
                                                    <div data-value="60">60</div>
                                                    <div data-value="70">70</div>
                                                    <div data-value="80">80</div>
                                                    <div data-value="90">90</div>
                                                    <div data-value="100">100</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-floor-area mobile-search-floor-area">
                                        <button data-toggle="mobile-floor-area-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Floor Area</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-floor-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minfloor-area" class="range" placeholder="Min Floor Area" data-range-min-changer data-target-list="#floor-area-range .range-min-list" data-target-button=".mobile-search-floor-area" data-target-field="#id_building_area_total__gte"> -
                                            <input type="text" name="maxfloor-area" class="range" placeholder="Max Floor Area" data-range-max-changer data-target-list="#floor-area-range .range-max-list" data-target-button=".mobile-search-floor-area" data-target-field="#id_building_area_total__lte">
                                            <div id="floor-area-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="40">40m<sup>2</sup></div>
                                                    <div data-value="80">80m<sup>2</sup></div>
                                                    <div data-value="90">90m<sup>2</sup></div>
                                                    <div data-value="100">100m<sup>2</sup></div>
                                                    <div data-value="200">200m<sup>2</sup></div>
                                                    <div data-value="400">400m<sup>2</sup></div>
                                                    <div data-value="600">600m<sup>2</sup></div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="40">40m<sup>2</sup></div>
                                                    <div data-value="80">80m<sup>2</sup></div>
                                                    <div data-value="90">90m<sup>2</sup></div>
                                                    <div data-value="100">100m<sup>2</sup></div>
                                                    <div data-value="200">200m<sup>2</sup></div>
                                                    <div data-value="400">400m<sup>2</sup></div>
                                                    <div data-value="600">600m<sup>2</sup></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-land-area mobile-search-land-area">
                                        <button data-toggle="mobile-land-area-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Land Area</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-land-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minland-area" class="range" placeholder="Min Land Area" data-range-min-changer data-target-list="#land-area-range .range-min-list" data-target-button=".mobile-search-land-area" data-target-field="#id_land_area_total__gte"> -
                                            <input type="text" name="maxland-area" class="range" placeholder="Max Land Area" data-range-max-changer data-target-list="#land-area-range .range-max-list" data-target-button=".mobile-search-land-area" data-target-field="#id_land_area_total__lte">
                                            <div id="land-area-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="80">80m<sup>2</sup></div>
                                                    <div data-value="90">90m<sup>2</sup></div>
                                                    <div data-value="100">100m<sup>2</sup></div>
                                                    <div data-value="200">200m<sup>2</sup></div>
                                                    <div data-value="400">400m<sup>2</sup></div>
                                                    <div data-value="600">600m<sup>2</sup></div>
                                                    <div data-value="800">800m<sup>2</sup></div>
                                                    <div data-value="1000">1000m<sup>2</sup></div>
                                                    <div data-value="2000">2000m<sup>2</sup></div>
                                                    <div data-value="4000">4000m<sup>2</sup></div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="80">80m<sup>2</sup></div>
                                                    <div data-value="90">90m<sup>2</sup></div>
                                                    <div data-value="100">100m<sup>2</sup></div>
                                                    <div data-value="200">200m<sup>2</sup></div>
                                                    <div data-value="400">400m<sup>2</sup></div>
                                                    <div data-value="600">600m<sup>2</sup></div>
                                                    <div data-value="800">800m<sup>2</sup></div>
                                                    <div data-value="1000">1000m<sup>2</sup></div>
                                                    <div data-value="2000">2000m<sup>2</sup></div>
                                                    <div data-value="4000">4000m<sup>2</sup></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-completed-year mobile-search-year">
                                        <button data-toggle="mobile-year-completed-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Year Completed</span>
                                            <span class="text-label-selected">Any</span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane completed-list-container" id="mobile-year-completed-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                    </div>

                                    <div class="search-field-wrapper search-completion-year mobile-search-year">
                                        <button data-toggle="mobile-completion-year-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Completion Year</span>
                                            <span class="text-label-selected">Any</span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane completion-list-container" id="mobile-completion-year-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10"></div>
                                    </div>

                                    <div class="search-field-wrapper search-parking mobile-search-parking">
                                        <button data-toggle="mobile-parking-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Parking Spaces</span>
                                            <span class="text-label-selected"><span class="min-label">Any</span><span class="max-label"></span></span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-parking-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <input type="text" name="minparking" class="range" placeholder="Min Parking" data-range-min-changer data-target-list="#parking-range .range-min-list" data-target-button=".mobile-search-parking" data-target-field="#id_garages__gte"> -
                                            <input type="text" name="maxparking" class="range" placeholder="Max Parking" data-range-max-changer data-target-list="#parking-range .range-max-list" data-target-button=".mobile-search-parking" data-target-field="#id_garages__lte">
                                            <div id="parking-range" class="range-container">
                                                <div class="range-min-list range-list left">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                                <div class="range-max-list range-list right">
                                                    <div data-value="">Any</div>
                                                    <div data-value="1">1</div>
                                                    <div data-value="2">2</div>
                                                    <div data-value="3">3</div>
                                                    <div data-value="4">4</div>
                                                    <div data-value="5">5</div>
                                                    <div data-value="6">6</div>
                                                    <div data-value="7">7</div>
                                                    <div data-value="8">8</div>
                                                    <div data-value="9">9</div>
                                                    <div data-value="10">10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-field-wrapper search-land-title mobile-search-title">
                                        <button data-toggle="mobile-land-title-dropdown" class="search-field hollow expanded">
                                            <span class="text-label">Title Deed</span>
                                            <span class="text-label-selected">Any</span>
                                            <span class="icon-down"></span>
                                        </button>
                                        <div class="dropdown-pane" id="mobile-land-title-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
                                            <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="">Any</div>
                                            <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="hard">Hard Title/Freehold</div>
                                            <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="long">Long-Term Leasehold</div>
                                            <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="soft">Soft Title</div>
                                        </div>
                                    </div>

                                    <label class="checkbox">
                                        <!-- <input type="checkbox" name="certified"> Realestate.com.kh Certified Properties Only</label> -->
                                    <label class="checkbox">
                                        <!-- <input type="checkbox" name="private"> Show Private user properties only</label> -->

                                    <div class="mobile-refine-buttons">
                                        <button type="button" class="button hollow mobile-reset" data-reset-button>Reset</button>
                                        <button type="button" class="button highlight mobile-find" data-search-button>Find</button>
                                    </div>
                                </div>
                                <div class="mobile-refine-search">Customize Your Search <span class="icon-down"></span></div>
                            </div>
                            <div class="smallport-22 medium-4">
                                <div class="search-field-wrapper search-button">
                                    <button class="button highlight expanded" data-search-button>Search</button>
                                </div>
                                <div class="search-field-wrapper search-button hide">
                                    <a href="<?php echo site_url('site/site/listmap')?>">
                                        <button data-search-button style="color: red;font-style: italic; text-decoration: underline red;">
                                            Search by map
                                        </button>
                                    </a>
                                </div>
                                <div class="search-field-wrapper search-button">
                                    <button class="button highlight expanded btn-search-map">
                                        Search map <span><img src="<?php echo site_url('assets/img/map.png')?>" style="width: 24px;"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="rows align-center collapse">
                    <div class="columns smallport-24 small-22 large-18">
                        <div class="search-form-wrappers clearfix rows show-for-medium" style="top:50px">
                            <div class="smallport-24 medium-24">
                                <div class="wizard">
                                    <a href="<?php echo site_url('site/site/postproperty')?>" class="current">Post Property</a>
                                    <a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="search-form-wrappers clearfix rows hide-for-medium js-mobile-search align-center">
                            <div class="smallport-22 medium-24">
                                <div class="wizard">
                                    <a class="current" href="<?php echo site_url('site/site/postproperty')?>">Post Property</a>
                                    <a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </section>
            


            <form id="hidden-search-form" class="search_all_form" action="<?php echo site_url('site/site/search')?>" data-view-type="">

                <select id="available" name="available">
                    <option value="0">Sale</option>
                </select>

                <select multiple="multiple" method="get" id="id_property_type" name="status">
                    <option value="">---------</option>
                    <!-- <option <?php if($status == "all") //echo "selected"; else echo "";?> value="all">Property Status</option> -->
                    <option <?php if($status == "sale") echo "selected"; else echo "";?> value="sale">Sale</option>
                    <option <?php if($status == "rent") echo "selected"; else echo "";?> value="rent">Rent</option>
                    <option <?php if($status == "both") echo "selected"; else echo "";?> value="both">Both</option>
                </select>

                <input type="text" name="agent" id="agent" value="<?php if($agent!="") echo $agent; else echo "";?>">

                <select multiple="multiple" id="id_categories" name="categories[]">
                    <optgroup label="Residential">
                        <?php
                            $title = array(); $sel = "";
                            foreach ($category as $arr) {
                                $title[$arr] = $arr;
                            }
                            foreach ($typecate as $type) {
                                if($title[$type->typename] == $type->typename)
                                    $sel = "selected";
                                else
                                    $sel = "";
                        ?>
                            <option <?php echo $sel;?> value="<?php echo $type->typename?>"><?php echo $type->typename?></option>
                        <?php
                            }
                        ?>
                    </optgroup>
                </select>

                <!-- <select multiple="multiple" id="id_features" name="features[]">
                    <?php 
                        $f_title = array();
                        foreach ($features as $feat) {
                            $f_title[$feat] = $feat;
                        }
                    ?>
                    <option <?php if(isset($f_title['swimmingpool'])) echo "selected"; else echo "";?> value="swimmingpool">Swimming Pool</option>
                    <option <?php if(isset($f_title['gym']))echo "selected"; else echo "";?> value="gym">Gym/Fitness center</option>
                    <option <?php if(isset($f_title['lift'])) echo "selected"; else echo "";?> value="lift">Lift</option>
                    <option <?php if(isset($f_title['garden'])) echo "selected"; else echo "";?> value="garden">Garden</option>
                    <option <?php if(isset($f_title['furnished'])) echo "selected"; else echo "";?> value="furnished">Furnished</option>
                    <option <?php if(isset($f_title['balcony'])) echo "selected"; else echo "";?> value="balcony">Balcony</option>
                    <option <?php if(isset($f_title['airconditioning'])) echo "selected"; else echo "";?> value="airconditioning">Air Conditioning</option>
                    <option <?php if(isset($f_title['carparking'])) echo "selected"; else echo "";?> value="carparking">Car Parking</option>
                    <option <?php if(isset($f_title['nonflooding'])) echo "selected"; else echo "";?> value="nonflooding">Non-Flooding</option>
                    <option <?php if(isset($f_title['onmainroad'])) echo "selected"; else echo "";?> value="onmainroad">On main road</option>
                    <option <?php if(isset($f_title['internet'])) echo "selected"; else echo "";?> value="internet">Internet</option>
                    <option <?php if(isset($f_title['paytv'])) echo "selected"; else echo "";?> value="paytv">Pay TV</option>
                    <option <?php if(isset($f_title['petfriendly'])) echo "selected"; else echo "";?> value="petfriendly">Pet Friendly</option>
                    <option <?php if(isset($f_title['jacuzzi'])) echo "selected"; else echo "";?> value="jacuzzi">Jacuzzi</option>
                    <option <?php if(isset($f_title['sauna'])) echo "selected"; else echo "";?> value="sauna">Sauna</option>
                    <option <?php if(isset($f_title['tenniscourt'])) echo "selected"; else echo "";?> value="tenniscourt">Tennis Court</option>
                    <option <?php if(isset($f_title['alarmsystem'])) echo "selected"; else echo "";?> value="alarmsystem">Alarm System</option>
                    <option <?php if(isset($f_title['videosecurity'])) echo "selected"; else echo "";?> value="videosecurity">Video Security</option>
                    <option <?php if(isset($f_title['reception247'])) echo "selected"; else echo "";?> value="reception247">Reception 24/7</option>
                    <option <?php if(isset($f_title['firesprinkler'])) echo "selected"; else echo "";?> value="firesprinkler">Fire sprinkler system</option>
                    <option <?php if(isset($f_title['oceanviews'])) echo "selected"; else echo "";?> value="oceanviews">Ocean Views</option>
                    <option <?php if(isset($f_title['cityviews'])) echo "selected"; else echo "";?> value="cityviews">City Views</option>
                </select> -->

                <input id="id_car_spaces__lte" min="0" name="car_spaces__lte" type="number" value="<?php echo $park_last;?>" />

                <input id="id_car_spaces__gte" min="0" name="car_spaces__gte" type="number" value="<?php echo $park_first;?>" />

                <input id="id_garages__lte" min="0" name="garages__lte" type="number" value="<?php echo $park_last;?>" />

                <input id="id_garages__gte" min="0" name="garages__gte" type="number" value="<?php echo $park_first;?>" />

                <!-- <input id="id_rent__lte" name="rent__lte" type="number" />

                <input id="id_rent__gte" name="rent__gte" type="number" /> -->

                <input id="id_price__lte" name="price__lte" type="number" value="<?php echo $lastprice;?>"/>

                <input id="id_price__gte" name="price__gte" type="number" value="<?php echo $firstprice;?>"/>

                <input id="id_bedrooms__lte" min="0" name="bedrooms__lte" type="number" value="<?php echo $bedroom_first;?>" />

                <input id="id_bedrooms__gte" min="0" name="bedrooms__gte" type="number" value="<?php echo $bedroom_last;?>" />

                <input id="id_bathrooms__lte" min="0" name="bathrooms__lte" type="number" value="<?php echo $bathroom_last;?>" />

                <input id="id_bathrooms__gte" min="0" name="bathrooms__gte" type="number" value="<?php echo $bathroom_first?>" />

                <input id="id_building_area_total__lte" name="building_area_total__lte" step="any" type="number" value="<?php echo $floorarea_first;?>" />

                <input id="id_building_area_total__gte" name="building_area_total__gte" step="any" type="number" value="<?php echo $floorarea_last;?>" />

                <input id="id_land_area_total__lte" name="land_area_total__lte" step="any" type="number" value="<?php echo $landarea_last;?>" />

                <input id="id_land_area_total__gte" name="land_area_total__gte" step="any" type="number" value="<?php echo $landarea_first;?>" />

                <select id="id_land_title" name="land_title">
                    <option value="" selected="selected">All</option>
                    <option <?php if($land_title == "hard") echo "selected"; else echo "";?> value="hard">Hard Title</option>
                    <option <?php if($land_title == "soft") echo "selected"; else echo "";?> value="soft">Soft Title</option>
                </select>

                <!-- <input id="id_year_built__lte" name="year_built__lte" type="number" />

                <input id="id_year_built__gte" name="year_built__gte" type="number" /> -->

                <input id="id_address_floor_level__lte" name="address_floor_level__lte" type="number" value="<?php echo $floorlevel_last;?>" />

                <input id="id_address_floor_level__gte" name="address_floor_level__gte" type="number" value="<?php echo $floorlevel_first;?>" />

                <!-- <input id="id_price_per_sqm__lte" name="price_per_sqm__lte" type="number" />

                <input id="id_price_per_sqm__gte" name="price_per_sqm__gte" type="number" /> -->

                <input id="id_q" name="q" type="text" value="<?php echo $location?>"/>
                
                <input id="list_type" name="list_type" value="<?php echo $list_type?>"/>

                <select id="order-status" name="order" data-placeholder="Order" class="chosen-select order_bys">
                    <option <?php if($order == "Desc") echo "selected"; else echo "";?> value="Desc">Descending</option>
                    <option <?php if($order == "Asc") echo "selected"; else echo "";?> value="Asc">Ascending</option>
                </select>

                <select id="sortby-status" name="sort" data-placeholder="Sort by" class="chosen-select short_bys">
                    <option value="">-Select-</option>
                    <option <?php if($sort == 'Price') echo "selected"; else echo "";?> value="Price">Price</option>
                    <option <?php if($sort == 'Area') echo "selected"; else echo "";?> value="Area">Area</option>
                    <option <?php if($sort == 'Date') echo "selected"; else echo "";?> value="Date">Date</option>
                </select>

                <input id="search_map" name="search_map"/>
            </form>
<style type="text/css">
	.homepage-map #map {
	    width: 100%;
	    height: 710px;
	}
	.infobox-wrapper .sale_amount {
	    position: absolute;
	    top: 30px;
	    left: 10px;
	    z-index: 10;
	    font-size: 16px;
	    color: red;
	}
	.property-text{
		background: white;
		padding: 7px 10px;
		width: 200px;
        height: 49px;
	}
    .marker-style {
        width: 24px;
        height: 20px;
        margin-left: -12px !important;
        margin-top: -50px !important;
    }
    .m-price{
        border-radius: 0;
        color: white;
        display: inline-block;
        font-size: 12px;
        padding: 6px;
        background: #d84949;
    }
    .m-type{
        border-radius: 0;
        color: white;
        display: inline-block;
        font-size: 12px;
        margin-right: -4px;
        padding: 6px;
        background: #333;
    }
    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
</style>
<div role="main" class="pgl-properties pgl-bg-grey">
	<div class="container">
        <div class="wizard row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <a class="current">Search Result<?php echo '('.count($all).')';?></a>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo site_url('site/site/postproperty')?>" class="current">Post Property</a>
                </div>
                <div class="col-md-2">
                    <a class="current" href="<?php echo site_url('site/site/join')?>">Join Us</a>
                </div>
            </div>
        </div>
        <div class="properties-full properties-listing properties-listfull">
            <div class="listing-header clearfix">
                <ul class="list-inline list-icons pull-left">
                    <li class="<?php echo $activegrid;?>">
                        <a href="<?php echo site_url('site/site/search?available='.$available.'&status='.$status.'&'.$return_cats.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_locs.'&order='.$order.'&sort='.$sort.'&list_type=grid');?>">
                            <i class="fa fa-th"></i>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo site_url('site/site/search?available='.$available.'&status='.$status.'&'.$return_cats.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_locs.'&order='.$order.'&sort='.$sort.'&list_type=lists');?>">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </li>
                    <li class="<?php echo $activelist;?>">
                    	<a href="<?php echo site_url('listmap/searchmap?available='.$available.'&status='.$status.'&'.$return_cats.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_locs.'&order='.$order.'&sort='.$sort.'&list_type=lists');?>"><i class="fa fa-map-marker"></i></a></li>
                </ul>
            </div>
        </div>
		<div style="margin-top: 20px"></div>
		<div class="homepage-map">
			<div id="map"></div>
		</div>
		<div style="margin-top: 30px"></div>
	</div>
</div>
<script>
(function($){	
    $('.btn-search-map').click(function(){
        $('#search_map').val('map');
        $('#hidden-search-form').submit();
    });
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
    var type = "<?php echo $types?>";
    var agent = "<?php echo $agent?>";

	createHomepageGoogleMapBySearch(_latitude,_longitude,status,location,category,firstprice,lastprice,available,order,sort,list_type,floorarea_first,floorarea_last,floorlevel_first,floorlevel_last,floorlevel_first,floorlevel_last,landarea_first,landarea_last,land_title,bedroom_first,bedroom_last,bathroom_first,bathroom_last,park_first,park_last,features,return_feature,type,agent);
})(jQuery);
</script>