		<style type="text/css">
			.home-tabs.hot-new {
			    border-color: #d84949;
			}
			.home-tabs {
			    border-bottom: 2px solid #555;
			}
			.nav {
			    padding-left: 0;
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
			.nav-tabs>li>a:hover {
			    border-color: transparent;
			    cursor: inherit;
			}
			.btn-project-more{
				font-style: italic;
			    background: #d84949;
			    border: 1px solid #d84949;
			    float: right;
			}
		</style>
		<!-- Begin Main -->
		<div role="main" class="main">
	        <section id="home-search-bg" class="home-search hero lazyload" data-sizes="auto" style="background-image: url('<?php echo site_url('assets/upload/banner/thumb'.'/'.$slide->banner_id.'.png')?>');">
	            <div class="overlay"></div>
	            <div class="rows align-center collapse">
	                <div class="columns smallport-24 small-22 large-18">
	                    <div class="search-form-wrapper clearfix rows show-for-medium">
	                        <div class="smallport-24 medium-20">

	                            <div class="search-field-wrapper search-type desktop-search-type">
	                                <button data-toggle="search-type-dropdown" class="search-field  expanded desktop-search-field">
	                                    <span class="text-label"><?php echo $this->lang->line('search_sale')?></span>
	                                    <span class="icon-down"></span>
	                                </button>
	                                <div class="dropdown-pane search-type" id="search-type-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                	<div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="sale"><?php echo $this->lang->line('search_sale')?></div>
	                                    <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="rent"><?php echo $this->lang->line('search_rent')?></div>
	                                    <div class="dropdown-item" data-dropdown-changer data-target-button=".desktop-search-type" data-target-field="#id_property_type" data-target-value="both"><?php echo $this->lang->line('search_sale_rent')?></div>
	                                </div>
	                            </div>

	                            <div class="search-field-wrapper search-location">
	                                <div class="search-field">
	                                    <span class="text-label"><input id="id_location_autocomplete" class="location-autocomplete" type="text" name="locations" placeholder="<?php echo $this->lang->line('search_text_search')?>" value=""></span>
	                                    <button data-toggle="location-dropdown" class="float-right icon-down"></button>
	                                </div>
	                                <div class="dropdown-pane" id="location-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                    <div class="tabs-content" data-tabs-content="desktop-location-tabs">
	                                        <div class="tabs-panel is-active location-panel" id="desktop-location-panel">
	                                        </div>
	                                        <div class="tabs-panel landmark-panel" id="desktop-landmark-panel"></div>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="search-field-wrapper search-categories">
	                                <button data-toggle="categories-dropdown" class="search-field hollow expanded">
	                                    <span class="text-label" data-default="All Property types"><?php echo $this->lang->line('search_type')?></span>
	                                    <span class="text-label-selected small lbl-cat">
	                                    	<?php echo $this->lang->line('search_type_all')?>
	                                    </span>
	                                    <span class="min-label hide tem-lbl-cat">
	                                    	<?php echo $this->lang->line('search_type_all')?>
	                                    </span>
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
	                                    <span class="text-label"><?php echo $this->lang->line('search_price')?></span>
	                                    <span class="text-label-selected small">
	                                    	<span class="min-label">
	                                    		<?php echo $this->lang->line('search_price_any')?>
	                                    	</span>
	                                    	<span class="tem-lbl-price hide">
	                                    		<?php echo $this->lang->line('search_price_any')?>
	                                    	</span>
	                                    	<span class="tem-lbl-price-no hide">
	                                    		<?php echo $this->lang->line('search_price_no')?>
	                                    	</span>
	                                    	<span class="tem-lbl-price-no-max hide">
	                                    		<?php echo $this->lang->line('search_price_no_max')?>
	                                    	</span>
	                                    	<span class="max-label"></span>
	                                    </span>
	                                    <span class="icon-down"></span>
	                                </button>
	                                <div class="dropdown-pane" id="price-range" data-dropdown data-v-offset="10" data-close-on-click="true">
	                                    <div class="tabs-content" data-tabs-content="desktop-price-tabs">
	                                        <div class="tabs-panel is-active price-panel" id="desktop-price-panel">
	                                            <input type="text" name="minprice" placeholder="<?php echo $this->lang->line('search_price_min')?>" data-price-min-changer data-target-list="#desktop-price-panel .price-min-list" data-target-button=".desktop-search-price"> -
	                                            <input type="text" name="maxprice" placeholder="<?php echo $this->lang->line('search_price_max')?>" data-price-max-changer data-target-list="#desktop-price-panel .price-max-list" data-target-button=".desktop-search-price">
	                                            <div class="price-range-container"></div>
	                                        </div>
	                                        <div class="tabs-panel area-panel" id="desktop-area-panel">
	                                            <input type="text" name="minareaprice" placeholder="<?php echo $this->lang->line('search_price_min')?>" data-area-min-changer data-target-list="#desktop-area-panel .area-min-list" data-target-button=".desktop-search-price"> -
	                                            <input type="text" name="maxareaprice" placeholder="<?php echo $this->lang->line('search_price_max')?>" data-area-max-changer data-target-list="#desktop-area-panel .area-max-list" data-target-button=".desktop-search-price">
	                                            <div class="area-range-container"></div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

	                            

	                            <div class="search-field-wrapper search-refine">
	                                <button data-toggle="refine-dropdown" class="search-field hollow expanded">
	                                    <span class="text-label"><?php echo $this->lang->line('search_customize')?></span>
	                                    <span class="icon-down"></span>
	                                </button>
	                                <div class="dropdown-pane search-refine" id="refine-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                    <div class="rows">
	                                        <div class="columns">

	                                            <div class="search-field-wrapper search-floor-area desktop-search-floor-area">
	                                                <button data-toggle="floor-area-dropdown" class="search-field  expanded">
	                                                    <span class="text-label"><?php echo $this->lang->line('search_floor');?></span>
	                                                    <span class="text-label-selected">
	                                                    	<span class="min-label">
	                                                    		<?php echo $this->lang->line('search_floor_any')?>
	                                                    	</span>
	                                                    	<span class="tem-lbl-floor hide">
	                                                    		<?php echo $this->lang->line('search_floor_any')?>
	                                                    	</span>
	                                                    	<span class="max-label"></span>
	                                                    </span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="floor-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minfloor-area" class="range" placeholder="<?php echo $this->lang->line('search_floor_min')?>" data-range-min-changer data-target-list="#floor-area-range .range-min-list" data-target-button=".desktop-search-floor-area" data-target-field="#id_building_area_total__gte"> -
	                                                    <input type="text" name="maxfloor-area" class="range" placeholder="<?php echo $this->lang->line('search_floor_max')?>" data-range-max-changer data-target-list="#floor-area-range .range-max-list" data-target-button=".desktop-search-floor-area" data-target-field="#id_building_area_total__lte">
	                                                    <div id="floor-area-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_floor_any')?></div>
	                                                            <div data-value="40">40m<sup>2</sup></div>
	                                                            <div data-value="80">80m<sup>2</sup></div>
	                                                            <div data-value="90">90m<sup>2</sup></div>
	                                                            <div data-value="100">100m<sup>2</sup></div>
	                                                            <div data-value="200">200m<sup>2</sup></div>
	                                                            <div data-value="400">400m<sup>2</sup></div>
	                                                            <div data-value="600">600m<sup>2</sup></div>
	                                                        </div>
	                                                        <div class="range-max-list range-list right">
	                                                            <div data-value=""><?php echo $this->lang->line('search_floor_any')?></div>
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
	                                                    <span class="text-label"><?php echo $this->lang->line('search_bedroom')?></span>
	                                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_bedroom_any')?></span><span class="max-label"></span></span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="bedrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minbedrooms" class="range" placeholder="<?php echo $this->lang->line('search_bedroom_min')?>" data-range-min-changer data-target-list="#bedrooms-range .range-min-list" data-target-button=".desktop-search-bedrooms" data-target-field="#id_bedrooms__gte"> -
	                                                    <input type="text" name="maxbedrooms" class="range" placeholder="<?php echo $this->lang->line('search_bedroom_max')?>" data-range-max-changer data-target-list="#bedrooms-range .range-max-list" data-target-button=".desktop-search-bedrooms" data-target-field="#id_bedrooms__lte">
	                                                    <div id="bedrooms-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_bedroom_any')?></div>
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
	                                                            <div data-value=""><?php echo $this->lang->line('search_bedroom_any')?></div>
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
	                                                    <span class="text-label"><?php echo $this->lang->line('search_floor_level')?></span>
	                                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_floor_level_any')?></span><span class="max-label"></span></span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="floor-level-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minfloor-level" class="range" placeholder="<?php echo $this->lang->line('search_floor_level_min')?>" data-range-min-changer data-target-list="#floor-level-range .range-min-list" data-target-button=".desktop-search-floor-level" data-target-field="#id_address_floor_level__gte"> -
	                                                    <input type="text" name="maxfloor-level" class="range" placeholder="<?php echo $this->lang->line('search_floor_level_max')?>" data-range-max-changer data-target-list="#floor-level-range .range-max-list" data-target-button=".desktop-search-floor-level" data-target-field="#id_address_floor_level__lte">
	                                                    <div id="floor-level-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_floor_level_any')?></div>
	                                                            <div data-value="0"><?php echo $this->lang->line('search_floor_level_ground')?></div>
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
	                                                            <div data-value=""><?php echo $this->lang->line('search_floor_level_any')?></div>
	                                                            <div data-value="0"><?php echo $this->lang->line('search_floor_level_ground')?></div>
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
	                                                    <span class="text-label"><?php echo $this->lang->line('search_bathroom')?></span>
	                                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_bathroom_any')?></span><span class="max-label"></span></span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="bathrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minbathrooms" class="range" placeholder="<?php echo $this->lang->line('search_bathroom_min')?>" data-range-min-changer data-target-list="#bathrooms-range .range-min-list" data-target-button=".desktop-search-bathrooms" data-target-field="#id_bathrooms__gte"> -
	                                                    <input type="text" name="maxbathrooms" class="range" placeholder="<?php echo $this->lang->line('search_bathroom_max')?>" data-range-max-changer data-target-list="#bathrooms-range .range-max-list" data-target-button=".desktop-search-bathrooms" data-target-field="#id_bathrooms__lte">
	                                                    <div id="bathrooms-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_bathroom_any')?></div>
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
	                                                            <div data-value=""><?php echo $this->lang->line('search_bathroom_any')?></div>
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
	                                                    <span class="text-label"><?php echo $this->lang->line('search_land_area')?></span>
	                                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_land_area_any')?></span><span class="max-label"></span></span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="land-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minland-area" class="range" placeholder="<?php echo $this->lang->line('search_land_area_min')?>" data-range-min-changer data-target-list="#land-area-range .range-min-list" data-target-button=".desktop-search-land-area" data-target-field="#id_land_area_total__gte"> -
	                                                    <input type="text" name="maxland-area" class="range" placeholder="<?php echo $this->lang->line('search_land_area_max')?>" data-range-max-changer data-target-list="#land-area-range .range-max-list" data-target-button=".desktop-search-land-area" data-target-field="#id_land_area_total__lte">
	                                                    <div id="land-area-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_land_area_any')?></div>
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
	                                                            <div data-value=""><?php echo $this->lang->line('search_land_area_any')?></div>
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
	                                                    <span class="text-label"><?php echo $this->lang->line('search_title_deed')?></span>
	                                                    <span class="text-label-selected">
	                                                    	<?php echo $this->lang->line('search_title_deed_any')?>
	                                                    </span>
	                                                    <span class="tem-lbl-deed hide">
	                                                    	<?php echo $this->lang->line('search_title_deed_any')?>
	                                                    </span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="land-title-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value=""><?php echo $this->lang->line('search_title_deed_any')?></div>
	                                                    <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="hard"><?php echo $this->lang->line('search_title_deed_hard')?></div>
	                                                    <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="long"><?php echo $this->lang->line('search_title_deed_long')?></div>
	                                                    <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".search-title" data-target-field="#id_land_title" data-target-value="soft"><?php echo $this->lang->line('search_title_deed_soft')?></div>
	                                                </div>
	                                            </div>

	                                        </div>
	                                        <div class="columns">

	                                            <div class="search-field-wrapper search-parking desktop-search-parking">
	                                                <button data-toggle="parking-dropdown" class="search-field  expanded">
	                                                    <span class="text-label"><?php echo $this->lang->line('search_parking_space')?></span>
	                                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_parking_any')?></span><span class="max-label"></span></span>
	                                                    <span class="icon-down"></span>
	                                                </button>
	                                                <div class="dropdown-pane" id="parking-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                                    <input type="text" name="minparking" class="range" placeholder="<?php echo $this->lang->line('search_parking_min')?>" data-range-min-changer data-target-list="#parking-range .range-min-list" data-target-button=".desktop-search-parking" data-target-field="#id_garages__gte"> -
	                                                    <input type="text" name="maxparking" class="range" placeholder="<?php echo $this->lang->line('search_parking_max')?>" data-range-max-changer data-target-list="#parking-range .range-max-list" data-target-button=".desktop-search-parking" data-target-field="#id_garages__lte">
	                                                    <div id="parking-range" class="range-container">
	                                                        <div class="range-min-list range-list left">
	                                                            <div data-value=""><?php echo $this->lang->line('search_parking_any')?></div>
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
	                                                            <div data-value=""><?php echo $this->lang->line('search_parking_any')?></div>
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

	                                            <button type="button" class="button hollow" data-reset-button><?php echo $this->lang->line('search_btn_reset')?></button>
	                                            <button type="button" class="button highlight" data-search-button><?php echo $this->lang->line('search_btn_find')?></button>

	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="smallport-24 medium-4">
	                            <div class="search-field-wrapper search-button">
	                                <button class="button highlight expanded" id="search-submit-button" data-search-button><?php echo $this->lang->line('search_btn_search')?></button>
	                            </div>
	                            <div class="search-field-wrapper search-button">
	                                <button class="button highlight expanded btn-search-map">
	                                	<?php echo $this->lang->line('search_btn_search_map')?> <span><img src="<?php echo site_url('assets/img/map.png')?>" style="width: 24px;"></span></button>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- mobile version -->
	                    <div class="search-form-wrapper clearfix rows hide-for-medium js-mobile-search align-center">
	                        <div class="smallport-22 medium-20">

	                            <div class="search-field-wrapper search-location">
	                                <div class="search-field">
	                                    <span class="text-label"><input id="id_mobile_location_autocomplete" class="location-autocomplete" type="text" name="locations" placeholder="<?php echo $this->lang->line('search_text_search')?>"></span>
	                                    <button data-toggle="mobile-location-dropdown" class="float-right icon-down"></button>
	                                </div>
	                                <div class="dropdown-pane" id="mobile-location-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                    <div class="tabs-content" data-tabs-content="mobile-location-tabs">
	                                        <div class="tabs-panel is-active location-panel" id="mobile-location-panel"></div>
	                                        <div class="tabs-panel landmark-panel" id="mobile-landmark-panel"></div>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="search-field-wrapper search-type mobile-search-type">
	                                <button data-toggle="mobile-search-type-dropdown" class="search-field hollow expanded mobile-search-field">
	                                    <span class="text-label"><?php echo $this->lang->line('search_looking_for')?></span>
	                                    <span class="text-label-selected"><?php echo $this->lang->line('search_sale')?></span>
	                                    <span class="icon-down"></span>
	                                </button>
	                                <div class="dropdown-pane search-type" id="mobile-search-type-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                    <!-- <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="all">Property Status</div> -->
	                                    <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="sale"><?php echo $this->lang->line('search_sale')?></div>
	                                    <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="rent"><?php echo $this->lang->line('search_rent')?></div>
	                                    <div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="both"><?php echo $this->lang->line('search_sale_rent')?></div>
	                                    <!--<div class="dropdown-item" data-dropdown-changer data-target-button=".mobile-search-type" data-target-field="#id_property_type" data-target-value="condo">Condo</div>-->
	                                </div>
	                            </div>

	                            <div class="search-field-wrapper search-categories">
	                                <button data-toggle="mobile-categories-dropdown" class="search-field hollow expanded">
	                                    <span class="text-label" data-default=""><?php echo $this->lang->line('search_type')?></span>
	                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_type_all')?></span></span>
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
	                                    <span class="text-label"><?php echo $this->lang->line('search_price')?></span>
	                                    <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_price_any')?></span><span class="max-label"></span></span>
	                                    <span class="icon-down"></span>
	                                </button>
	                                <div class="dropdown-pane" id="mobile-price-range" data-dropdown data-v-offset="10" data-close-on-click="true">
	                                    <div class="tabs-content" data-tabs-content="mobile-price-tabs">
	                                        <div class="tabs-panel is-active price-panel" id="mobile-price-panel">
	                                            <input type="text" name="minprice" placeholder="<?php echo $this->lang->line('search_price_min')?>" data-price-min-changer data-target-list="#mobile-price-panel .price-min-list" data-target-button=".mobile-search-price"> -
	                                            <input type="text" name="maxprice" placeholder="<?php echo $this->lang->line('search_price_max')?>" data-price-max-changer data-target-list="#mobile-price-range .price-max-list" data-target-button=".mobile-search-price">
	                                            <div class="price-range-container"></div>
	                                        </div>
	                                        <div class="tabs-panel area-panel" id="mobile-area-panel">
	                                            <input type="text" name="minareaprice" placeholder="<?php echo $this->lang->line('search_price_min')?>" data-area-min-changer data-target-list="#mobile-area-panel .area-min-list" data-target-button=".mobile-search-price"> -
	                                            <input type="text" name="maxareaprice" placeholder="<?php echo $this->lang->line('search_price_max')?>" data-area-max-changer data-target-list="#mobile-area-panel .area-max-list" data-target-button=".mobile-search-price">
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_bedroom')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_bedroom_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-bedrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minbedrooms" class="range" placeholder="<?php echo $this->lang->line('search_bedroom_min')?>" data-range-min-changer data-target-list="#bedrooms-range .range-min-list" data-target-button=".mobile-search-bedrooms" data-target-field="#id_bedrooms__gte"> -
	                                        <input type="text" name="maxbedrooms" class="range" placeholder="<?php echo $this->lang->line('search_bedroom_max')?>" data-range-max-changer data-target-list="#bedrooms-range .range-max-list" data-target-button=".mobile-search-bedrooms" data-target-field="#id_bedrooms__lte">
	                                        <div id="bedrooms-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_bedroom_any')?></div>
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
	                                                <div data-value=""><?php echo $this->lang->line('search_bedroom_any')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_bathroom')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_bathroom_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-bathrooms-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minbathrooms" class="range" placeholder="<?php echo $this->lang->line('search_bathroom_min')?>" data-range-min-changer data-target-list="#bathrooms-range .range-min-list" data-target-button=".mobile-search-bathrooms" data-target-field="#id_bathrooms__gte"> -
	                                        <input type="text" name="maxbathrooms" class="range" placeholder="<?php echo $this->lang->line('search_bathroom_max')?>" data-range-max-changer data-target-list="#bathrooms-range .range-max-list" data-target-button=".mobile-search-bathrooms" data-target-field="#id_bathrooms__lte">
	                                        <div id="bathrooms-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_bathroom_any')?></div>
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
	                                                <div data-value=""><?php echo $this->lang->line('search_bathroom_any')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_floor_level')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_floor_level_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-floor-level-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minfloor-level" class="range" placeholder="<?php echo $this->lang->line('search_floor_level_min')?>" data-range-min-changer data-target-list="#floor-level-range .range-min-list" data-target-button=".mobile-search-floor-level" data-target-field="#id_address_floor_level__gte"> -
	                                        <input type="text" name="maxfloor-level" class="range" placeholder="<?php echo $this->lang->line('search_floor_level_max')?>" data-range-max-changer data-target-list="#floor-level-range .range-max-list" data-target-button=".mobile-search-floor-level" data-target-field="#id_address_floor_level__lte">
	                                        <div id="floor-level-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_floor_level_any')?></div>
	                                                <div data-value="0"><?php echo $this->lang->line('search_floor_level_ground')?></div>
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
	                                                <div data-value=""><?php echo $this->lang->line('search_floor_level_any')?></div>
	                                                <div data-value="0"><?php echo $this->lang->line('search_floor_level_ground')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_floor')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_floor_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-floor-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minfloor-area" class="range" placeholder="<?php echo $this->lang->line('search_floor_min')?>" data-range-min-changer data-target-list="#floor-area-range .range-min-list" data-target-button=".mobile-search-floor-area" data-target-field="#id_building_area_total__gte"> -
	                                        <input type="text" name="maxfloor-area" class="range" placeholder="<?php echo $this->lang->line('search_floor_max')?>" data-range-max-changer data-target-list="#floor-area-range .range-max-list" data-target-button=".mobile-search-floor-area" data-target-field="#id_building_area_total__lte">
	                                        <div id="floor-area-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_floor_any')?></div>
	                                                <div data-value="40">40m<sup>2</sup></div>
	                                                <div data-value="80">80m<sup>2</sup></div>
	                                                <div data-value="90">90m<sup>2</sup></div>
	                                                <div data-value="100">100m<sup>2</sup></div>
	                                                <div data-value="200">200m<sup>2</sup></div>
	                                                <div data-value="400">400m<sup>2</sup></div>
	                                                <div data-value="600">600m<sup>2</sup></div>
	                                            </div>
	                                            <div class="range-max-list range-list right">
	                                                <div data-value=""><?php echo $this->lang->line('search_floor_any')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_land_area')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_land_area_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-land-area-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minland-area" class="range" placeholder="<?php echo $this->lang->line('search_land_area_min')?>" data-range-min-changer data-target-list="#land-area-range .range-min-list" data-target-button=".mobile-search-land-area" data-target-field="#id_land_area_total__gte"> -
	                                        <input type="text" name="maxland-area" class="range" placeholder="<?php echo $this->lang->line('search_land_area_max')?>" data-range-max-changer data-target-list="#land-area-range .range-max-list" data-target-button=".mobile-search-land-area" data-target-field="#id_land_area_total__lte">
	                                        <div id="land-area-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_land_area_any')?></div>
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
	                                                <div data-value=""><?php echo $this->lang->line('search_land_area_any')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_parking_space')?></span>
	                                        <span class="text-label-selected"><span class="min-label"><?php echo $this->lang->line('search_parking_any')?></span><span class="max-label"></span></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-parking-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <input type="text" name="minparking" class="range" placeholder="<?php echo $this->lang->line('search_parking_min')?>" data-range-min-changer data-target-list="#parking-range .range-min-list" data-target-button=".mobile-search-parking" data-target-field="#id_garages__gte"> -
	                                        <input type="text" name="maxparking" class="range" placeholder="<?php echo $this->lang->line('search_parking_max')?>" data-range-max-changer data-target-list="#parking-range .range-max-list" data-target-button=".mobile-search-parking" data-target-field="#id_garages__lte">
	                                        <div id="parking-range" class="range-container">
	                                            <div class="range-min-list range-list left">
	                                                <div data-value=""><?php echo $this->lang->line('search_parking_any')?></div>
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
	                                                <div data-value=""><?php echo $this->lang->line('search_parking_any')?></div>
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
	                                        <span class="text-label"><?php echo $this->lang->line('search_title_deed')?></span>
	                                        <span class="text-label-selected"><?php echo $this->lang->line('search_title_deed_any')?></span>
	                                        <span class="icon-down"></span>
	                                    </button>
	                                    <div class="dropdown-pane" id="mobile-land-title-dropdown" data-dropdown data-close-on-click="true" data-v-offset="10">
	                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value=""><?php echo $this->lang->line('search_title_deed_any')?></div>
	                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="hard"><?php echo $this->lang->line('search_title_deed_hard')?></div>
	                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="long"><?php echo $this->lang->line('search_title_deed_long')?></div>
	                                        <div class="dropdown-item" data-refine-dropdown-changer data-target-button=".mobile-search-title" data-target-field="#id_land_title" data-target-value="soft"><?php echo $this->lang->line('search_title_soft')?></div>
	                                    </div>
	                                </div>
	                                
	                                <label class="checkbox">
	                                    <!-- <input type="checkbox" name="certified"> Realestate.com.kh Certified Properties Only</label> -->
	                                <label class="checkbox">
	                                    <!-- <input type="checkbox" name="private"> Show Private user properties only</label> -->

	                                <div class="mobile-refine-buttons">
	                                    <button type="button" class="button hollow mobile-reset" data-reset-button><?php echo $this->lang->line('search_btn_reset')?></button>
	                                    <button type="button" class="button highlight mobile-find" data-search-button><?php echo $this->lang->line('search_btn_find')?></button>
	                                </div>
	                            </div>
	                            <div class="mobile-refine-search"><?php echo $this->lang->line('search_customize')?><span class="icon-down"></span></div>
	                        </div>
	                        <div class="smallport-22 medium-4">
	                            <div class="search-field-wrapper search-button">
	                                <button class="button highlight expanded" data-search-button><?php echo $this->lang->line('search_btn_search')?></button>
	                            </div>
	                            <div class="search-field-wrapper search-button">
	                                <button class="button highlight expanded btn-search-map-mobile">
	                                	<?php echo $this->lang->line('search_btn_search_map')?><span><img src="<?php echo site_url('assets/img/map.png')?>" style="width: 24px;"></span></button>
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

	            </div>


	        </section>

		    <form id="hidden-search-form" action="<?php echo site_url('site/site/search')?>" data-view-type="">

		        <select id="id_listing_type" name="available">
		            <option value="0">Sale</option>
		        </select>

		        <select multiple="multiple" id="id_property_type" name="status">
		            <option value="">---------</option>
		            <option value="sale">Sale</option>
		            <option value="rent">Rent</option>
		            <option value="both">Both</option>
		        </select>


		        <select multiple="multiple" id="id_categories" name="categories[]">
		            <optgroup label="Residential">
			            <?php 
							foreach ($type as $type) {
						?>
							<option value="<?php echo $type->typename?>"><?php echo $type->typename?></option>
						<?php
							}
						?>
					</optgroup>
		        </select>

		        <!-- <select multiple="multiple" id="id_features" name="features[]">
		            <option value="swimmingpool">Swimming Pool</option>
		            <option value="gym">Gym/Fitness center</option>
		            <option value="lift">Lift</option>
		            <option value="garden">Garden</option>
		            <option value="furnished">Furnished</option>
		            <option value="balcony">Balcony</option>
		            <option value="airconditioning">Air Conditioning</option>
		            <option value="carparking">Car Parking</option>
		            <option value="nonflooding">Non-Flooding</option>
		            <option value="onmainroad">On main road</option>
		            <option value="internet">Internet</option>
		            <option value="paytv">Pay TV</option>
		            <option value="petfriendly">Pet Friendly</option>
		            <option value="jacuzzi">Jacuzzi</option>
		            <option value="sauna">Sauna</option>
		            <option value="tenniscourt">Tennis Court</option>
		            <option value="alarmsystem">Alarm System</option>
		            <option value="videosecurity">Video Security</option>
		            <option value="reception247">Reception 24/7</option>
		            <option value="firesprinkler">Fire sprinkler system</option>
		            <option value="oceanviews">Ocean Views</option>
		            <option value="cityviews">City Views</option>
		        </select> -->

		        <input id="id_car_spaces__lte" min="0" name="car_spaces__lte" type="number" />

		        <input id="id_car_spaces__gte" min="0" name="car_spaces__gte" type="number" />

		        <input id="id_garages__lte" min="0" name="garages__lte" type="number" />

		        <input id="id_garages__gte" min="0" name="garages__gte" type="number" />

		        <input id="id_rent__lte" name="rent__lte" type="number" />

		        <input id="id_rent__gte" name="rent__gte" type="number" />

		        <input id="id_price__lte" name="price__lte" type="number" />

		        <input id="id_price__gte" name="price__gte" type="number" />

		        <input id="id_bedrooms__lte" min="0" name="bedrooms__lte" type="number" />

		        <input id="id_bedrooms__gte" min="0" name="bedrooms__gte" type="number" />

		        <input id="id_bathrooms__lte" min="0" name="bathrooms__lte" type="number" />

		        <input id="id_bathrooms__gte" min="0" name="bathrooms__gte" type="number" />

		        <input id="id_building_area_total__lte" name="building_area_total__lte" step="any" type="number" />

		        <input id="id_building_area_total__gte" name="building_area_total__gte" step="any" type="number" />

		        <input id="id_land_area_total__lte" name="land_area_total__lte" step="any" type="number" />

		        <input id="id_land_area_total__gte" name="land_area_total__gte" step="any" type="number" />

		        <select id="id_land_title" name="land_title">
		            <option value="" selected="selected">All</option>
		            <option value="hard">Hard Title</option>
		            <option value="soft">Soft Title</option>
		        </select>

		        <input id="id_year_built__lte" name="year_built__lte" type="number" />

		        <input id="id_year_built__gte" name="year_built__gte" type="number" />

		        <input id="id_address_floor_level__lte" name="address_floor_level__lte" type="number" />

		        <input id="id_address_floor_level__gte" name="address_floor_level__gte" type="number" />

		        <input id="id_price_per_sqm__lte" name="price_per_sqm__lte" type="number" />

		        <input id="id_price_per_sqm__gte" name="price_per_sqm__gte" type="number" />

				<input id="id_q" name="q" type="text" />
				
				<input id="list_type" name="list_type" value="lists"/>

				<select id="order-status" name="order" data-placeholder="Order" class="chosen-select order_bys">
					<option value="Desc">Descending</option>
					<option value="Asc">Ascending</option>
				</select>
				<input id="search_map" class="search_map" name="search_map"/>
		    </form>
			
			<!-- Begin Properties -->
			<section class="pgl-properties pgl-bg-grey">
				<div class="container">
					<!-- <h2>Properties</h2> -->
					<div class="wizard row">
						<div class="col-md-12">
							<!-- <div class="col-md-2">
								<a class="current">Properties</a>
							</div> -->
							<div class="col-md-2">
								<a href="<?php echo site_url('site/site/postproperty')?>" class="current"><?php echo $this->lang->line('home_page_post')?></a>
							</div>
							<div class="col-md-2">
								<a class="current" href="<?php echo site_url('site/site/join')?>"><?php echo $this->lang->line('home_page_join')?></a>
							</div>
						</div>
					</div>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs pgl-pro-tabs text-center animation hide" role="tablist">
						<li class="active"><a href="#all" role="tab" data-toggle="tab">All</a></li>
						<li><a href="#house" role="tab" data-toggle="tab">House</a></li>
						<li><a href="#offices" role="tab" data-toggle="tab">Offices</a></li>
						<li><a href="#apartment" role="tab" data-toggle="tab">Apartment</a></li>
						<li><a href="#residential" role="tab" data-toggle="tab">Residential</a></li>
					</ul>
					<?php 
						if(!empty($hot)){
					?>
					<ul class="nav nav-tabs home-tabs hot-new" role="tablist" style="margin-bottom: 30px;">
				        <li class="title font-strong">
				        	<a><?php echo $this->lang->line('home_page_hot')?> 
				        		<div class="corner"></div>
				        	</a>
				    	</li><li></li>
				     </ul>
					<?php } ?>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="all">
							<div class="row">
								<?php 
									foreach ($hot as $hot) {
								?>
								<div class="col-xs-3 animation">

									<div class="pgl-property">
										<div class="property-thumb-info">
											<div class="property-thumb-info-image">
												<a href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?name='.$hot->property_name)?>">
													<?php 
														$img = $this->site->getImage($hot->pid);
													?>
													<?php 
														$extends = pathinfo($img->url, PATHINFO_EXTENSION);
														if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
														{
													?>
														<video style="height: 176px;" class="img-responsive" controls>
														  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>">
														</video>

													<?php 
														}else{
													?>
														<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
													<?php
														}
													?>
												</a>
												<span class="property-thumb-info-label">
													<span class="label price">$<?php echo number_format($hot->price) ?></span>
													<span class="label forrent <?php if($hot->p_type !=0) echo ""; else echo "hide";?>">
														<?php 
															if($hot->p_type == 1)
																echo "Sale";
															if($hot->p_type == 2)
																echo "Rent";
															if($hot->p_type == 3)
																echo "Rent & Sale";	
														?>
													</span>
													<span class="label price"><?php echo 'P'.$hot->pid; ?></span>
												</span>
											</div>
											<div class="property-thumb-info-content" style="height: 120px;">
												<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$hot->pid.'/?name='.$hot->property_name)?>"><?php echo $hot->property_name?></a></h3>
												<address class="module line-clamp"><?php echo $hot->address?></address>
											</div>
											<div class="amenities clearfix" style="height: 40px;">
												<ul class="pull-left">
													<li><strong>Area:</strong> <?php if($hot->housesize !="") echo $hot->housesize; else echo 0;?><sup>m2</sup></li>
												</ul>
												<ul class="pull-right">
													<li class="<?php if($hot->bedroom == "" ) echo "hide";?>"><i class="icons icon-bedroom"></i> <?php echo $hot->bedroom; ?></li>
													<li class="<?php if($hot->bathroom == "" ) echo "hide";?>"><i class="icons icon-bathroom"></i> <?php echo $hot->bathroom; ?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?php 
									}
								?>
						</div>
					</div>

					<ul class="nav nav-tabs home-tabs hot-new" role="tablist" style="margin-bottom: 30px;">
				        <li class="title font-strong">
				        	<a><?php echo $this->lang->line('home_page_recent')?>
				        		<div class="corner"></div>
				        	</a>
				    	</li><li></li>
				     </ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="all">
							<div class="row">
								<?php 
									foreach ($lists as $list) {
								?>
								<div class="col-xs-3 animation">
									<div class="pgl-property">
										<div class="property-thumb-info">
											<div class="property-thumb-info-image">
												<a href="<?php echo site_url('site/site/detail/'.$list->pid.'/?name='.$list->property_name)?>">
													<?php 
														$img = $this->site->getImage($list->pid);
													?>
													<?php 
														$extends = pathinfo($img->url, PATHINFO_EXTENSION);
														if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
														{
													?>
														<video style="height: 176px;" class="img-responsive" controls>
														  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>">
														</video>

													<?php 
														}else{
													?>
														<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url))) echo base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
													<?php
														}
													?>
												</a>
												<span class="property-thumb-info-label">
													<span class="label price">$<?php echo number_format($list->price) ?></span>
													<span class="label forrent <?php if($list->p_type !=0) echo ""; else echo "hide";?>">
														<?php 
															if($list->p_type == 1)
																echo "Sale";
															if($list->p_type == 2)
																echo "Rent";
															if($list->p_type == 3)
																echo "Rent & Sale";	
														?>
													</span>
													<span class="label price"><?php echo 'P'.$list->pid; ?></span>
												</span>
											</div>
											<div class="property-thumb-info-content" style="height: 120px;">
												<h3><a class="module line-clamp" href="<?php echo site_url('site/site/detail/'.$list->pid.'/?name='.$list->property_name)?>"><?php echo $list->property_name?></a></h3>
												<address class="module line-clamp"><?php echo $list->address?></address>
											</div>
											<div class="amenities clearfix" style="height: 40px;">
												<ul class="pull-left">
													<li><strong>Area:</strong> <?php if($list->housesize !="") echo $list->housesize; else echo 0;?><sup>m2</sup></li>
												</ul>
												<ul class="pull-right">
													<li class="<?php if($list->bedroom == "" ) echo "hide";?>"><i class="icons icon-bedroom"></i> <?php echo $list->bedroom; ?></li>
													<li class="<?php if($list->bathroom == "" ) echo "hide";?>"><i class="icons icon-bathroom"></i> <?php echo $list->bathroom; ?></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<?php 
									}
								?>
						</div>

						<?php 
							echo $this->pagination->create_links();
						?>
					</div>

					<?php 
						$hide = "";
						if(count($project) > 0)
							$hide = "";
						else
							$hide = "hide";
					?>
					<ul class="nav nav-tabs home-tabs hot-new <?php echo $hide?>" role="tablist" style="margin-bottom: 30px;">
				        <li class="title font-strong">
				        	<a><?php echo $this->lang->line('home_page_project')?>
				        		<div class="corner"></div>
				        	</a>
				    	</li><li></li>
				     </ul>

				     <div class="tab-content">
						<div class="tab-pane active" id="all">
							<div class="row">
								<?php 
									foreach ($project as $list) {
								?>
								<div class="col-xs-3 animation">
									<div class="pgl-property">
										<div class="property-thumb-info">
											<div class="property-thumb-info-image">
												<a href="<?php echo site_url('project/detail/'.$list->projectid.'/?name='.$list->project_name)?>">
													<?php 
														$img = $this->site->getImageProject($list->projectid);
													?>
													<?php 
														$extends = pathinfo($img->url, PATHINFO_EXTENSION);
														if($extends === "mp4" || $extends === "movie" || $extends === "mpe" || $extends === "qt" || $extends === "mov" || $extends === "avi" || $extends === "mpg" || $extends === "mpeg")
														{
													?>
														<video style="height: 176px;" class="img-responsive" controls>
														  	<source src="<?php if(@ file_get_contents(base_url('assets/upload/project/'.$img->projectid.'_'.$img->url))) echo base_url('assets/upload/project/'.$img->projectid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>">
														</video>

													<?php 
														}else{
													?>
														<img aly="" class="img-responsive" src="<?php if(@ file_get_contents(base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url))) echo base_url('assets/upload/project/thumb/'.$img->projectid.'_'.$img->url); else echo base_url('assets/upload/noimage.jpg')?>"/>
													<?php
														}
													?>
												</a>
												<!-- <span class="property-thumb-info-label hide">
													<span class="label price">$<?php echo number_format($list->price) ?></span>
													<span class="label forrent <?php if($list->p_type !=0) echo ""; else echo "hide";?>">
														<?php 
															if($list->p_type == 1)
																echo "Sale";
															if($list->p_type == 2)
																echo "Rent";
															if($list->p_type == 3)
																echo "Rent & Sale";	
														?>
													</span>
													<span class="label price"><?php echo 'P'.$list->pid; ?></span>
												</span> -->
											</div>
											<div class="property-thumb-info-content" style="height: 120px;">
												<h3><a class="module line-clamp" href="<?php echo site_url('project/detail/'.$list->projectid.'/?name='.$list->project_name)?>"><?php echo $list->project_name?></a></h3>
												<address class="module line-clamp"><?php echo $list->locationname?></address>
											</div>
											<!-- <div class="amenities clearfix" style="height: 40px;">
												<ul class="pull-left">
													<li><strong>Area:</strong> <?php if($list->housesize !="") echo $list->housesize; else echo 0;?><sup>m2</sup></li>
												</ul>
												<ul class="pull-right">
													<li class="<?php if($list->bedroom == "" ) echo "hide";?>"><i class="icons icon-bedroom"></i> <?php echo $list->bedroom; ?></li>
													<li class="<?php if($list->bathroom == "" ) echo "hide";?>"><i class="icons icon-bathroom"></i> <?php echo $list->bathroom; ?></li>
												</ul>
											</div> -->
										</div>
									</div>
								</div>
								<?php 
									}
								?>
								<div class="col-sm-10"></div>
								<div class="col-sm-2"><a href="<?php echo site_url('site/site/listproject')?>" type="button" class="btn btn-success btn-project-more">More...</a></div>
						</div>
					</div>

			</section>
			<!-- End Properties -->

		</div>
		<!-- End Main -->
		<script type="text/javascript">
			$('.btn-search-map').click(function(){
				$('.search_map').val('map');
				var txtsearch = $('#id_location_autocomplete').val();
				$('#id_q').val(txtsearch);
				$('#hidden-search-form').submit();
			});
			$('.btn-search-map-mobile').click(function(){
				$('.search_map').val('map');
				var txtsearch = $('#id_mobile_location_autocomplete').val();
				$('#id_q').val(txtsearch);
				$('#hidden-search-form').submit();
			});
		</script>
		