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
              echo "connection established <br>";
          }

          $RS         = $_POST["Radio_Service"];
          $start_freq = $_POST["freqInputLower"];
          $end_freq   = $_POST["freqInputUpper"];
          $company    = $_POST["Licensee"];

          $sql = sprintf("SELECT * FROM `bands_info` WHERE (`Licensee` LIKE '%%%s%%') AND (Radio_Service='%s' AND freqInputLower='%f' AND freqInputUpper='%f')", mysqli_real_escape_string($con, $company), mysqli_real_escape_string($con, $RS), $start_freq, $end_freq);

          $results = mysqli_query($con, $sql);
          echo $results;
          if (!$results) {
              die('SQL Error: ' . mysqli_error($con));
          }
          while ($row = mysqli_fetch_array($results)) {
             if ($row[6] != '') {
                $data_arr = array();
             }
          }
      }
      ?>
               <!-- Top menu on small screens -->
      <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
        <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
        <span>Company Name</span>
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
            var map;
            var usStates = [
    { name: 'ALABAMA', abbreviation: 'AL'},
    { name: 'ALASKA', abbreviation: 'AK'},
    { name: 'AMERICAN SAMOA', abbreviation: 'AS'},
    { name: 'ARIZONA', abbreviation: 'AZ'},
    { name: 'ARKANSAS', abbreviation: 'AR'},
    { name: 'CALIFORNIA', abbreviation: 'CA'},
    { name: 'COLORADO', abbreviation: 'CO'},
    { name: 'CONNECTICUT', abbreviation: 'CT'},
    { name: 'DELAWARE', abbreviation: 'DE'},
    { name: 'DISTRICT OF COLUMBIA', abbreviation: 'DC'},
    { name: 'FEDERATED STATES OF MICRONESIA', abbreviation: 'FM'},
    { name: 'FLORIDA', abbreviation: 'FL'},
    { name: 'GEORGIA', abbreviation: 'GA'},
    { name: 'GUAM', abbreviation: 'GU'},
    { name: 'HAWAII', abbreviation: 'HI'},
    { name: 'IDAHO', abbreviation: 'ID'},
    { name: 'ILLINOIS', abbreviation: 'IL'},
    { name: 'INDIANA', abbreviation: 'IN'},
    { name: 'IOWA', abbreviation: 'IA'},
    { name: 'KANSAS', abbreviation: 'KS'},
    { name: 'KENTUCKY', abbreviation: 'KY'},
    { name: 'LOUISIANA', abbreviation: 'LA'},
    { name: 'MAINE', abbreviation: 'ME'},
    { name: 'MARSHALL ISLANDS', abbreviation: 'MH'},
    { name: 'MARYLAND', abbreviation: 'MD'},
    { name: 'MASSACHUSETTS', abbreviation: 'MA'},
    { name: 'MICHIGAN', abbreviation: 'MI'},
    { name: 'MINNESOTA', abbreviation: 'MN'},
    { name: 'MISSISSIPPI', abbreviation: 'MS'},
    { name: 'MISSOURI', abbreviation: 'MO'},
    { name: 'MONTANA', abbreviation: 'MT'},
    { name: 'NEBRASKA', abbreviation: 'NE'},
    { name: 'NEVADA', abbreviation: 'NV'},
    { name: 'NEW HAMPSHIRE', abbreviation: 'NH'},
    { name: 'NEW JERSEY', abbreviation: 'NJ'},
    { name: 'NEW MEXICO', abbreviation: 'NM'},
    { name: 'NEW YORK', abbreviation: 'NY'},
    { name: 'NORTH CAROLINA', abbreviation: 'NC'},
    { name: 'NORTH DAKOTA', abbreviation: 'ND'},
    { name: 'NORTHERN MARIANA ISLANDS', abbreviation: 'MP'},
    { name: 'OHIO', abbreviation: 'OH'},
    { name: 'OKLAHOMA', abbreviation: 'OK'},
    { name: 'OREGON', abbreviation: 'OR'},
    { name: 'PALAU', abbreviation: 'PW'},
    { name: 'PENNSYLVANIA', abbreviation: 'PA'},
    { name: 'PUERTO RICO', abbreviation: 'PR'},
    { name: 'RHODE ISLAND', abbreviation: 'RI'},
    { name: 'SOUTH CAROLINA', abbreviation: 'SC'},
    { name: 'SOUTH DAKOTA', abbreviation: 'SD'},
    { name: 'TENNESSEE', abbreviation: 'TN'},
    { name: 'TEXAS', abbreviation: 'TX'},
    { name: 'UTAH', abbreviation: 'UT'},
    { name: 'VERMONT', abbreviation: 'VT'},
    { name: 'VIRGIN ISLANDS', abbreviation: 'VI'},
    { name: 'VIRGINIA', abbreviation: 'VA'},
    { name: 'WASHINGTON', abbreviation: 'WA'},
    { name: 'WEST VIRGINIA', abbreviation: 'WV'},
    { name: 'WISCONSIN', abbreviation: 'WI'},
    { name: 'WYOMING', abbreviation: 'WY' }
];
            function initMap() {
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
            }
         </script>

       <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc2i-6d-R264yOYJKm6h-TukyaTipf_bc&libraries=drawing,places&callback=initMap" type="text/javascript"></script>

     <script src="jquery-3.3.1.js"></script>

    <div id="instructions"></div>
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
