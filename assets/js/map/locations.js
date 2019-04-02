// var locations = [
//     ['Forest House For Holiday Tour', "3225 George Street, Las Vegas", "$36,000", 36.169941, -115.139830, "property-detail.html", "img/property_grid/property_grid-1.png", "img/map/house.png", "Monthly"],

//     ['New Developed Condos', "3225 George Street, Los Angeles", "$28,000", 34.052234, -118.243685, "property-detail.html", "img/property_grid/property_grid-2.png", "img/map/house.png", "Monthly"],

//     ['Telico Villas House and Condos', "3225 George Street, San Francisco", "$336,000", 37.774929, -122.419416, "property-detail.html", "img/property_grid/property_grid-3.png", "img/map/house.png", "Fixed"],
//     ['Telico Villas House and Condos', "3225 George Street, San Jose", "$288,000", 37.338208, -121.886329, "property-detail.html", "img/property_grid/property_grid-4.png", "img/map/office.png", "Fixed"],
//     ['Telico Villas House and Condos', "3225 George Street, Phoenix", "$28,000", 33.448377, -112.074037, "property-detail.html", "img/property_grid/property_grid-5.png", "img/map/house.png", "Monthly"],
//     ['New Developed Condos', "3225 George Street, Okalahoma", "$366,000", 35.007752, -97.092877, "property-detail.html", "img/property_grid/property_grid-6.png", "img/map/customize.png", "Fixed"],

//     ['New Developed Condos', "3225 George Street, Houston", "$136,000", 29.760427, -95.369803, "property-detail.html", "img/property_grid/property_grid-8.png", "img/map/house.png", "Fixed"],
    
//     ['New Developed Condos', "3225 George Street, Texas", "$12,000", 31.968599, -99.901813, "property-detail.html", "img/property_grid/property_grid-9.png", "img/map/office.png", "Monthly"],
//     ['New Developed Condos', "3225 George Street, Salt Lake City", "$16,000", 40.760779, -111.891047, "property-detail.html", "img/property_grid/property_grid-10.png", "img/map/house.png", "Monthly"],
//     ['New Developed Condos', "3225 George Street, Florida", "$228,000", 27.664827, -81.515754, "property-detail.html", "img/property_grid/property_grid-11.png", "img/map/house.png", "Fixed"],
//     ['New Developed Condos', "3225 George Street, Orlando", "$436,000", 28.538335, -81.379236, "property-detail.html", "img/property_grid/property_grid-12.png", "img/map/office.png", "Fixed"],

//     ['New Developed Condos', "3225 George Street, Kansas City", "$76,000", 39.099727, -94.578567, "property-detail.html", "img/property_grid/property_grid-1.png", "img/map/house.png", "Yearly"],
//     ['New Developed Condos', "3225 George Street, Missouri", "$18,000", 37.964253, -91.831833, "property-detail.html", "img/property_grid/property_grid-2.png", "img/map/house.png", "Monthly"],
//     ['New Developed Condos', "3225 George Street, Cicago", "$26,000", 41.878114, -87.629798, "property-detail.html", "img/property_grid/property_grid-3.png", "img/map/customize.png", "Monthly"],
//     ['New Developed Condos', "3225 George Street, Indiana", "$10,000", 40.267194, -86.134902, "property-detail.html", "img/property_grid/property_grid-4.png", "img/map/house.png", "Fixed"],
//     ['New Developed Condos', "3225 George Street, Kentucky", "$156,000", 37.839333, -84.270018, "property-detail.html", "img/property_grid/property_grid-5.png", "img/map/house.png", "Fixed"],

//     ['New Developed Condos', "3225 George Street, Mississippi", "$832,000", 32.354668, -89.398528, "property-detail.html", "img/property_grid/property_grid-6.png", "img/map/house.png", "Fixed"],
//     ['New Developed Condos', "3225 George Street, Charlotte", "$28,000", 35.227087, -80.843127, "property-detail.html", "img/property_grid/property_grid-7.png", "img/map/office.png"],
//     ['Forest House For Holiday Tour', "3225 George Street, Orlando", "$32,000", 28.538335, -81.379236, "property-detail.html", "img/property_grid/property_grid-8.png", "img/map/house.png", "Monthly"],
//     ['Forest House For Holiday Tour', "3225 George Street, Virginia", "$21,000", 37.431573, -78.656894, "property-detail.html", "img/property_grid/property_grid-9.png", "img/map/house.png", "Monthly"],
//     ['Forest House For Holiday Tour', "3225 George Street, Philadelphia", "$46,000", 39.952584, -75.165222, "property-detail.html", "img/property_grid/property_grid-10.png", "img/map/customize.png", "Monthly"],

//     ['Forest House For Holiday Tour', "3225 George Street, Colorado", "$41,000", 39.550051, -105.782067, "property-detail.html", "img/property_grid/property_grid-11.png", "img/map/house.png", "Monthly"],
//     ['Forest House For Holiday Tour', "3225 George Street, San Diego", "$128,000", 32.715738, -117.161084, "property-detail.html", "img/property_grid/property_grid-12.png", "img/map/house.png", "Yearly"],
//     ['Forest House For Holiday Tour', "3225 George Street, Lubbock", "$536,000", 33.577863, -101.855166, "property-detail.html", "img/property_grid/property_grid-1.png", "img/map/house.png", "Fixed"],
//     ['Forest House For Holiday Tour', "3225 George Street, Amarillo", "$297,500", 35.221997, -101.831297, "property-detail.html", "img/property_grid/property_grid-2.png", "img/map/house.png", "Fixed"],
//     ['Forest House For Holiday Tour', "3225 George Street, Albuqueerque", "$412,000", 35.085334, -106.605553, "property-detail.html", "img/property_grid/property_grid-3.png", "img/map/house.png", "Fixed"],
//     ["Land for Sale in Prek Eng KK","","$358000",11.5261153407,104.913940262,"http://localhost/eastatecambodia/site/site/detail/6/?name=Land for Sale in Prek Eng KK",
//         "http://localhost/eastatecambodia/assets/upload/property/6_property-detail-2.jpg",
//         "",
//         "Rent"
//     ],
// ];

$(function($) {
    var locations = [];
    $.ajax({
        url:"http://localhost/eastatecambodia/site/site/listing_property",
        type:"GET",
        datatype:"Json",
        async:false,
        success:function(data) {
            locations.push(data);
        }
    });
});
