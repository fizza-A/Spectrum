<!DOCTYPE html>
<html>
   <head>
      <title>Radio Spectrum</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
      <link rel="stylesheet" type="text/css" href="map.css">
   </head>
   <body>
      <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $con = mysqli_connect("localhost","daniel","HX7eCGaYG9yTQuen","db_bands");

             // Check connection
             if (mysqli_connect_errno()) {
                 echo "Failed to connect to MySQL: " . mysqli_connect_error();
             } else {
                 //echo "connection established <br>";
             }

             $RS         = $_POST["Radio_Service"];
             $start_freq = $_POST["freqInputLower"];
             $end_freq   = $_POST["freqInputUpper"];
             $company    = $_POST["Licensee"];

             $sql = sprintf("SELECT * FROM bands_info WHERE (`Licensee` LIKE '%%%s%%') AND (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')",
               mysqli_real_escape_string($con, $company), mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);

             $results = mysqli_query($con, $sql);
             if (!$results) {
                 die('SQL Error: ' . mysqli_error($con));
             }
         }
         ?>
      <!-- Top menu on small screens -->
      <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
         <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
         <span>T-Mobile</span>
      </header>
      <!-- Overlay effect when opening sidebar on small screens -->
      <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
      <!-- !PAGE CONTENT! -->
      <!-- Header -->
      <div class="w3-container" style="margin-top:80px" id="showcase">
         <h1 class="w3-w3-xxxlarge"><b>Interactive 5G Spectrum Tool</b></h1>
         <hr style="width:580px;border:2px solid red" class="w3-round">
      </div>
      <head>
         <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
         <meta charset="utf-8">
         <title>Places Searchbox</title>
      </head>
      <body>
         <input id="pac-input" class="controls" type="text" placeholder="Search Box">
         <div id="map"></div>
         <script>
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 4,
              center: {
                 lat: 39.83333,
                 lng: -98.585522
              }
           });
           // Create the search box and link it to the UI element.
           var input = document.getElementById('pac-input');
           var searchBox = new google.maps.places.SearchBox(input);
           map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
           // Bias the SearchBox results towards current map's viewport.
           map.addListener('bounds_changed', function() {
              searchBox.setBounds(map.getBounds());
           });
           var results = <?php echo json_encode($results->fetch_all(MYSQLI_ASSOC))?>;
           console.log(results);
           var infoWindow = new google.maps.InfoWindow({
              content: "",
              pixelOffset: new google.maps.Size(0, 0)
           });
           for (var i = 0; i < results.length; i++) {
              if (results[i]["State"] != "" && results[i]["State"] != "USA" && results[i]["State"] != "United States" && results[i]["State"] != "Washington DC" && results[i]["State"] != null) {
                 (function(i) {
                    var url = 'https://raw.githubusercontent.com/glynnbird/usstatesgeojson/master/' + results[i]["State"].toLowerCase() + '.geojson';
                    var info = results[i];
                    $.getJSON(url, function(data) {
                       data['properties']['fcc'] = info;
                       var features = map.data.addGeoJson(data);
                    });
                    // Setup event handler to remove GeoJSON features
                    map.data.addListener('click', function(event) {
                       var info = event.feature.getProperty('fcc');
                       var federal = info["Federal and/or Non-Federal"]
                       const markup = `
                     <div class="info">
                        <h2>
                           ${info.Call_sign}
                        </h2>
                        <ul>
                           <li><b>Band range:</b> ${info.freqInputLower}-${info.infoFreqUpper}</li>
                           <li><b>Licensee:</b> ${info.Licensee}</li>
                           <li><b>Federal:</b> ${info["Federal and/or Non-Federal"]}</li>
                           <li><b>Radio Serivce:</b> ${info.Radio_Service}</li>
                           <li><b>Usage:</b> ${info.Usage}</li>
                        </ul>
                     </div>
                    `;
                       infoWindow.setContent(markup);
                       var anchor = new google.maps.MVCObject();
                       anchor.setValues({ //position of the point
                          position: event.latLng,
                          anchorPoint: new google.maps.Point(0, 0)
                       });
                       infoWindow.open(map, anchor);
                    }, {
                       passive: true
                    });

                 })(i)
              } else if (results[i]["location"]) {
                 (function(i) {
                       var array = results[i]["location"].split(/[\s|]+/);
                       var coordinates = [];
                       for (var j = 0; j < array.length; j++) {
                          array[j] = array[j].replace(/[{()}]/g, '');
                          var point = array[j].split(',').map(function(item) {
                             return parseFloat(item, 10);
                          });
                          var latlng = {lat: point[1], lng: point[0]};
                          coordinates.push(point);
                       }
                       console.log("added coordinates");
                       console.log(coordinates);
                 })(i)
                 console.log(results[i]["location"]);
              }
           }
        }
         </script>
         <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc2i-6d-R264yOYJKm6h-TukyaTipf_bc&libraries=drawing,places&callback=initMap" type="text/javascript"></script>
         <script src="jquery-3.3.1.js"></script>
   </body>
   <!-- End page content -->
   <div> <a href="https://mapicons.mapsmarker.com" title ="Maps Icons Collection">Maps Icons Collection</a> </div>
   <!-- W3.CSS Container -->
   <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
      <p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
      </p>
   </div>
   </body>
</html>
