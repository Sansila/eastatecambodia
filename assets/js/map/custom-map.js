var mapStyles = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#008eff"
            }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#462525"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-17"
            },
            {
                "visibility": "off"
            },
            {
                "color": "#8e5fb3"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "0"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#00a9ff"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ba1313"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#e1e1d4"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "gamma": "1.92"
            },
            {
                "saturation": "57"
            },
            {
                "lightness": "-51"
            },
            {
                "visibility": "on"
            },
            {
                "color": "#9be3c5"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "0"
            },
            {
                "color": "#1e78ff"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -70
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "saturation": -60
            },
            {
                "color": "#cce4f4"
            }
        ]
    }
];

$.ajaxSetup({
    cache: true
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createHomepageGoogleMap(_latitude,_longitude){
    /* setMapHeight(); */
    if( document.getElementById('map') != null ){
        $(function(){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                scrollwheel: true,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            //var locations = [];
            $.ajax({
                url:"http://estatecambodia.com/site/site/listing_property",
                type:"GET",
                datatype:"Json",
                async:false,
                success:function(locations) {
                    var i;
                    var newMarkers = [];
                    for (i = 0; i < locations.length; i++) {
                        var pictureLabel = document.createElement("img");
                        pictureLabel.src = locations[i][7];
                        var boxText = document.createElement("div");
                        infoboxOptions = {
                            content: boxText,
                            disableAutoPan: false,
                            //maxWidth: 150,
                            pixelOffset: new google.maps.Size(-100, 0),
                            zIndex: null,
                            alignBottom: true,
                            boxClass: "infobox-wrapper",
                            enableEventPropagation: true,
                            closeBoxMargin: "0px 0px -8px 0px",
                            closeBoxURL: "http://estatecambodia.com/assets/js/map/img/close.png",
                            infoBoxClearance: new google.maps.Size(1, 1)
                        };
                        var marker = new MarkerWithLabel({
                            title: locations[i][1],
                            position: new google.maps.LatLng(locations[i][3], locations[i][4]),
                            map: map,
                            icon: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            labelContent: pictureLabel,
                            labelAnchor: new google.maps.Point(50, 0),
                            labelClass: "marker-style"
                        });
                        newMarkers.push(marker);
                        boxText.innerHTML =
                            '<div class="property_grid">' +
                                '<div class="img_area">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<img src="' + locations[i][6] + '" alt="" width="200" height="100">' +
                                    '</a>' +
                                    '<div class="sale_amount">' + locations[i][2] + '<span>  - ' + locations[i][8] + '</span></div>' +
                                '</div>' +
                                '<div class="property-text p-3 module line-clamp">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<h5 class="property-title pb-2">' + locations[i][0] + '</h5>' +
                                    '</a>' +
                                    // '<span><i class="fa fa-map-marker text_primary" aria-hidden="true"></i> ' + locations[i][1] + '</span>' +
                                '</div>' +
                            '</div>';
                        //Define the infobox
                        newMarkers[i].infobox = new InfoBox(infoboxOptions);
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                for (h = 0; h < newMarkers.length; h++) {
                                    newMarkers[h].infobox.close();
                                }
                                newMarkers[i].infobox.open(map, this);
                            }
                        })(marker, i));

                    }
                    var clusterStyles = [
                        {
                            url: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            height: 60,
                            width: 60
                        }
                    ];
                    var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
                    $('body').addClass('loaded');
                    setTimeout(function() {
                        $('body').removeClass('has-fullscreen-map');
                    }, 1000);
                    $('#map').removeClass('fade-map');

                    //  Dynamically show/hide markers --------------------------------------------------------------

                    google.maps.event.addListener(map, 'idle', function() {

                        for (var i=0; i < locations.length; i++) {
                            if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                                // newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(map);
                                //markerCluster.setMap(map);
                            } else {
                                // newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(null);
                                //markerCluster.setMap(null);
                            }
                        }
                    });
                }
            });

            // Function which set marker to the user position
            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }

        });
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}

function createHomepageGoogleMapBySearch(_latitude,_longitude,status,location,category,firstprice,lastprice,available,order,sort,list_type,floorarea_first,floorarea_last,floorlevel_first,floorlevel_last,floorlevel_first,floorlevel_last,landarea_first,landarea_last,land_title,bedroom_first,bedroom_last,bathroom_first,bathroom_last,park_first,park_last,features,return_feature,type,agent){
    /* setMapHeight(); */
    if( document.getElementById('map') != null ){
        $(function(){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                scrollwheel: true,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            //var locations = [];
            $.ajax({
                url:"http://estatecambodia.com/listmap/showToMap",
                type:"GET",
                datatype:"Json",
                async:false,
                data:{
                    status: status,
                    location: location,
                    category: category,
                    firstprice: firstprice,
                    lastprice: lastprice,
                    available: available,
                    order: order,
                    sort: sort,
                    list_type: list_type,
                    floorarea_first: floorarea_first,
                    floorarea_last: floorarea_last,
                    floorlevel_first: floorlevel_first,
                    floorlevel_last: floorlevel_last,
                    landarea_first: landarea_first,
                    landarea_last: landarea_last,
                    land_title: land_title,
                    bedroom_first: bedroom_first,
                    bedroom_last: bedroom_last,
                    bathroom_first: bathroom_first,
                    bathroom_last: bathroom_last,
                    park_first: park_first,
                    park_last: park_last,
                    features: features,
                    return_feature: return_feature,
                    agent:agent
                },
                success:function(locations) {
                    var i;
                    var newMarkers = [];
                    for (i = 0; i < locations.length; i++) {
                        var pictureLabel = document.createElement("img");
                        pictureLabel.src = locations[i][7];
                        var boxText = document.createElement("div");
                        infoboxOptions = {
                            content: boxText,
                            disableAutoPan: false,
                            //maxWidth: 150,
                            pixelOffset: new google.maps.Size(-100, 0),
                            zIndex: null,
                            alignBottom: true,
                            boxClass: "infobox-wrapper",
                            enableEventPropagation: true,
                            closeBoxMargin: "0px 0px -8px 0px",
                            closeBoxURL: "http://estatecambodia.com/assets/js/map/img/close.png",
                            infoBoxClearance: new google.maps.Size(1, 1)
                        };
                        var marker = new MarkerWithLabel({
                            title: locations[i][1],
                            position: new google.maps.LatLng(locations[i][3], locations[i][4]),
                            map: map,
                            icon: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            labelContent: pictureLabel,
                            labelAnchor: new google.maps.Point(50, 0),
                            labelClass: "marker-style"
                        });
                        newMarkers.push(marker);
                        boxText.innerHTML =
                            '<div class="property_grid">' +
                                '<div class="img_area">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<img src="' + locations[i][6] + '" alt="" width="200" height="100">' +
                                    '</a>' +
                                    '<div class="sale_amount"> <span class="m-price">' + locations[i][2] + '</span><span class="m-type">' + locations[i][8] + '</span></div>' +
                                '</div>' +
                                '<div class="property-text p-3 module line-clamp">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<h5 class="property-title pb-2 module line-clamp" style="font-weight:100; line-height: 1em; font-size:12px; height: 46px;">' + locations[i][0] + '</h5>' +
                                    '</a>' +
                                    '<span><i class="fa fa-map-marker text_primary" aria-hidden="true"></i> ' + locations[i][1] + '</span>' +
                                '</div>' +
                            '</div>';
                        //Define the infobox
                        newMarkers[i].infobox = new InfoBox(infoboxOptions);
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                for (h = 0; h < newMarkers.length; h++) {
                                    newMarkers[h].infobox.close();
                                }
                                newMarkers[i].infobox.open(map, this);
                            }
                        })(marker, i));

                    }
                    var clusterStyles = [
                        {
                            url: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            height: 60,
                            width: 60
                        }
                    ];
                    var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
                    $('body').addClass('loaded');
                    setTimeout(function() {
                        $('body').removeClass('has-fullscreen-map');
                    }, 1000);
                    $('#map').removeClass('fade-map');

                    //  Dynamically show/hide markers --------------------------------------------------------------

                    google.maps.event.addListener(map, 'idle', function() {

                        for (var i=0; i < locations.length; i++) {
                            if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                                // newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(map);
                                //markerCluster.setMap(map);
                            } else {
                                // newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(null);
                                //markerCluster.setMap(null);
                            }
                        }
                    });
                }
            });

            // Function which set marker to the user position
            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }

        });
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}

function createHomepageGoogleMapByCategory(_latitude,_longitude,status,location,category,firstprice,lastprice,available,order,sort,list_type,floorarea_first,floorarea_last,floorlevel_first,floorlevel_last,floorlevel_first,floorlevel_last,landarea_first,landarea_last,land_title,bedroom_first,bedroom_last,bathroom_first,bathroom_last,park_first,park_last,features,return_feature,type){
    /* setMapHeight(); */
    if( document.getElementById('map') != null ){
        $(function(){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                scrollwheel: true,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            //var locations = [];
            $.ajax({
                url:"http://estatecambodia.com/listmap/showByCategory",
                type:"GET",
                datatype:"Json",
                async:false,
                data:{
                    status: status,
                    location: location,
                    category: category,
                    firstprice: firstprice,
                    lastprice: lastprice,
                    available: available,
                    order: order,
                    sort: sort,
                    list_type: list_type,
                    floorarea_first: floorarea_first,
                    floorarea_last: floorarea_last,
                    floorlevel_first: floorlevel_first,
                    floorlevel_last: floorlevel_last,
                    landarea_first: landarea_first,
                    landarea_last: landarea_last,
                    land_title: land_title,
                    bedroom_first: bedroom_first,
                    bedroom_last: bedroom_last,
                    bathroom_first: bathroom_first,
                    bathroom_last: bathroom_last,
                    park_first: park_first,
                    park_last: park_last,
                    features: features,
                    return_feature: return_feature,
                    type:type
                },
                success:function(locations) {
                    var i;
                    var newMarkers = [];
                    for (i = 0; i < locations.length; i++) {
                        var pictureLabel = document.createElement("img");
                        pictureLabel.src = locations[i][7];
                        var boxText = document.createElement("div");
                        infoboxOptions = {
                            content: boxText,
                            disableAutoPan: false,
                            //maxWidth: 150,
                            pixelOffset: new google.maps.Size(-100, 0),
                            zIndex: null,
                            alignBottom: true,
                            boxClass: "infobox-wrapper",
                            enableEventPropagation: true,
                            closeBoxMargin: "0px 0px -8px 0px",
                            closeBoxURL: "http://estatecambodia.com/assets/js/map/img/close.png",
                            infoBoxClearance: new google.maps.Size(1, 1)
                        };
                        var marker = new MarkerWithLabel({
                            title: locations[i][1],
                            position: new google.maps.LatLng(locations[i][3], locations[i][4]),
                            map: map,
                            icon: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            labelContent: pictureLabel,
                            labelAnchor: new google.maps.Point(50, 0),
                            labelClass: "marker-style"
                        });
                        newMarkers.push(marker);
                        boxText.innerHTML =
                            '<div class="property_grid">' +
                                '<div class="img_area">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<img src="' + locations[i][6] + '" alt="" width="200" height="100">' +
                                    '</a>' +
                                    '<div class="sale_amount"><span class="m-price">' + locations[i][2] + '</sapn><span class="m-type">  - ' + locations[i][8] + '</span></div>' +
                                '</div>' +
                                '<div class="property-text p-3 module line-clamp">' +
                                    '<a href="'+ locations[i][5] +'" class="d-block">' +
                                    '<h5 class="property-title pb-2 module line-clamp" style="font-weight:100; line-height: 1em; font-size:12px; height: 46px;">' + locations[i][0] + '</h5>' +
                                    '</a>' +
                                    // '<span><i class="fa fa-map-marker text_primary" aria-hidden="true"></i> ' + locations[i][1] + '</span>' +
                                '</div>' +
                            '</div>';
                        //Define the infobox
                        newMarkers[i].infobox = new InfoBox(infoboxOptions);
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                for (h = 0; h < newMarkers.length; h++) {
                                    newMarkers[h].infobox.close();
                                }
                                newMarkers[i].infobox.open(map, this);
                            }
                        })(marker, i));

                    }
                    var clusterStyles = [
                        {
                            url: 'http://estatecambodia.com/assets/js/map/img/marker.png',
                            height: 60,
                            width: 60
                        }
                    ];
                    var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
                    $('body').addClass('loaded');
                    setTimeout(function() {
                        $('body').removeClass('has-fullscreen-map');
                    }, 1000);
                    $('#map').removeClass('fade-map');

                    //  Dynamically show/hide markers --------------------------------------------------------------

                    google.maps.event.addListener(map, 'idle', function() {

                        for (var i=0; i < locations.length; i++) {
                            if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                                // newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(map);
                                //markerCluster.setMap(map);
                            } else {
                                // newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                                //newMarkers[i].setMap(null);
                                //markerCluster.setMap(null);
                            }
                        }
                    });
                }
            });

            // Function which set marker to the user position
            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }

        });
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}

