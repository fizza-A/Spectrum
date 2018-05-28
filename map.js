'use strict';
(
   function() {
    window.onload = function() {
        var myLatLng = {
            lat: 47.578793,
            lng: -122.165398
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {
                lat: 39.83333,
                lng: -98.585522
            }
        });
        var input = document.getElementById('pac-input');

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.


       // Draws initial map
        $.getJSON('https://raw.githubusercontent.com/PublicaMundi/MappingAPI/master/data/geojson/us-states.json', function(data) {
            var features = map.data.addGeoJson(data);
            // Setup event handler to remove GeoJSON features
            google.maps.event.addDomListener(document.getElementById('mapview'), 'click', function() {
                for (var i = 0; i < features.length; i++)
                    map.data.remove(features[i]);
            });
        });
        $(document).ready(function() {
             $('input:radio[name=contact]').change(function() {
                var url = '';
               if (this.value == 'county') {
                  url = 'https://raw.githubusercontent.com/kjhealy/us-county/master/data/geojson/gz_2010_us_050_00_500k.json';
               } else if (this.value == 'state') {
                  url = 'https://raw.githubusercontent.com/PublicaMundi/MappingAPI/master/data/geojson/us-states.json';
               }
               $.getJSON(url, function(data) {
                   var features = map.data.addGeoJson(data);
                   // Setup event handler to remove GeoJSON features
                   google.maps.event.addDomListener(document.getElementById('mapview'), 'click', function() {
                       for (var i = 0; i < features.length; i++)
                           map.data.remove(features[i]);
                   });
               });
             });
         });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }

            });
            map.fitBounds(bounds);
        });

        var infoWindow = new google.maps.InfoWindow({
            content: "",
            pixelOffset: new google.maps.Size(0, 0)
        });

        map.data.addListener('click', function(event) {
            event.feature.setProperty('isColorful', true);
            var radio = $("input[name=contact]:checked").val();
            var name = '';
            var display_name = '';
            if (radio == 'state') {
               name = event.feature.getProperty('name');
               display_name = name;
            }
            else if (radio == 'county') {
               name = event.feature.getProperty('NAME');
               display_name = name + ' County';
            }
            infoWindow.setContent("<form name='search_region' method=\"POST\" action=\"map.php\"> \
                                    " + display_name + "<br>\
                                    <button name='subject' type='submit' value='" + name + "'>Search Licensees</button>\
                                    </form>");
            var anchor = new google.maps.MVCObject();
            anchor.setValues({ //position of the point
                position: event.latLng,
                anchorPoint: new google.maps.Point(0, 0)
            });
            infoWindow.open(map, anchor);
        }, {passive: true});
    }

    // regions: list of GeoJSON Objects
    function plotRegion(regions, map) {
        regions.forEach((region) => {

            // Retrieve from SQL Database
            var contentString = 'made';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        });
    }

}());

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("modal01").style.display = "block";
    var captionText = document.getElementById("caption");
    captionText.innerHTML = element.alt;
}
