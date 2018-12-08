$.ajax({
                        url: "/api/location-funnel/?popular_location=1",
                        type: "GET",
                        dataType: "json",
                        success: function(locations) {
                            var key, obj, prop, owns = Object.prototype.hasOwnProperty,
                                checkboxes = '<div class="location-content"><ul>';
                            for (key in locations) {
                                if (checkboxes += '<li><label><input type="checkbox" name="location" value="location:' + key + '" data-checkbox-changer data-target-field="#id_location_autocomplete" data-target-value="location:' + key + '">' + gettext(key) + "</label>", owns.call(locations, key)) {
                                    obj = locations[key], checkboxes += "<ul>";
                                    for (prop in obj) {
                                        if (checkboxes += '<li><label><input type="checkbox" name="location" value="location:' + prop + '" data-checkbox-changer data-target-field="#id_location_autocomplete" data-target-value="location:' + key + " > " + prop + '">' + gettext(prop) + "</label>", owns.call(obj, prop)) {
                                            checkboxes += "<ul>";
                                            for (val in obj[prop]) checkboxes += '<li><label><input type="checkbox" name="location" value="location:' + obj[prop][val] + '" data-checkbox-changer data-target-field="#id_location_autocomplete" data-target-value="location:' + key + " > " + prop + " > " + obj[prop][val] + '">' + gettext(obj[prop][val]) + "</label></li>";
                                            checkboxes += "</ul>"
                                        }
                                        checkboxes += "</li>"
                                    }
                                    checkboxes += "</ul>"
                                }
                                checkboxes += "</li>"
                            }
                            checkboxes += "</ul></div>", $(el).hasClass("js-mobile-search") ? $(checkboxes).appendTo($("#mobile-location-dropdown .location-panel")) : $(checkboxes).appendTo($("#location-dropdown .location-panel"))
                        }
                    }), $.ajax({
                        url: "/api/portal/landmarks/",
                        type: "GET",
                        dataType: "json",
                        success: function(locations) {
                            var city = "",
                                radiobuttons = '<div class="location-content"><ul>';
                            for (key in locations) locations[key].get_city_display != city && (city = locations[key].get_city_display, radiobuttons += "<li><b>" + gettext(city) + "</b></li>"), radiobuttons += '<li><label><input type="radio" name="landmark:" value="landmark:' + locations[key].name + '" data-radiobutton-changer data-target-field="#id_location_autocomplete" data-target-value="landmark:' + locations[key].name + '">' + gettext(locations[key].name) + "</label>", radiobuttons += "</li>";
                            radiobuttons += "</ul></div>", $(el).hasClass("js-mobile-search") ? $(radiobuttons).appendTo($("#mobile-location-dropdown .landmark-panel")) : $(radiobuttons).appendTo($("#location-dropdown .landmark-panel"))
                        }
                    }), 