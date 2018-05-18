<!DOCTYPE html>
<html>
   <head>
      <title>Radio Spectrum</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
      <link rel="stylesheet" type="text/css" href="map.css">
      <script type="text/javascript" src="map_receive.js"></script>
   </head>

   <body>

   <!-- Sidebar/menu -->
   <!-- <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
     <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
     <div class="w3-container">
       <h3 class="w3-padding-64"><b>UW EE Capstone<br>with T-mobile</b></h3>
     </div>
     <div class="w3-bar-block">
       <a href="file:///C:/Users/Fizza/Desktop/test.html#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Spectrum Interface</a>
       <a href="https://www.w3schools.com/html/" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Tables</a>
       <a href="file:///C:/Users/Fizza/Desktop/Map.html#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Map Interface</a>
     </div>
   </nav> -->

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

       <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc2i-6d-R264yOYJKm6h-TukyaTipf_bc&libraries=drawing,places&callback" type="text/javascript"></script>

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

   <script src="map_receive.js"></script>
   </body>

</html>
