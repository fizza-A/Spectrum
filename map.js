(function() {
   window.onload = function() {
      var myLatLng = {lat: 47.578793, lng: -122.165398};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: 47.578793, lng: -122.165398}
      });
      var input = document.getElementById('pac-input');

      var image = 'industry-icons/mobilephonetower.png';

      var contentString = '<div id="content">'+
         '<div id="siteNotice">'+
         '</div>'+
         '<h1 id="firstHeading" class="firstHeading">License KA001</h1>'+
         '<div id="bodyContent">'+
            '<ul>'+
               '<li><b>Band range:</b> 400-430 MHz</li>' +
               '<li><b>Sub-bands or channels:</b> 3x 10MHz </li> ' +
               '<li><b>Licensed or Unlicensed:</b> Licensed</li>' +
               '<li><b>Usage type:</b>  commercial</li>' +
               '<li><b>Users:</b>  T-Mobile Inc</li>'+
               '<li><b>Duplex Operation:</b>  TDD</li>'+
            '</ul>'+
         '</div>'+
         '</div>';

      var infowindow = new google.maps.InfoWindow({
         content: contentString
      });
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
      markers = [];

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

     var infowindow = new google.maps.InfoWindow({
      content: contentString
     });
     plotPoints([myLatLng], map);

   }

   function plotPoints(markers, map) {
     var avgLat = 0.0, avgLng = 0.0;
     var count = 0;
     markers.forEach((marker) => {
       count++;
       avgLat += marker['lat'];
       avgLng += marker['lng'];
       console.log(avgLat, avgLng);
       // Find way to determine what icon. Probably based on radio service
       var image = 'industry-icons/mobilephonetower.png';
       var marker = new google.maps.Marker({
         position: marker,
         map: map,
         title: 'T-Mobile HQ',
         icon: image
       });
       // Retrieve from SQL Database
       var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">License KA001</h1>'+
          '<div id="bodyContent">'+
             '<ul>'+
                '<li><b>Band range:</b> 400-430 MHz</li>' +
                '<li><b>Sub-bands or channels:</b> 3x 10MHz </li> ' +
                '<li><b>Licensed or Unlicensed:</b> Licensed</li>' +
                '<li><b>Usage type:</b>  commercial</li>' +
                '<li><b>Users:</b>  T-Mobile Inc</li>'+
                '<li><b>Duplex Operation:</b>  TDD</li>'+
             '</ul>'+
          '</div>'+
          '</div>';

       var infowindow = new google.maps.InfoWindow({
          content: contentString
       });
       marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
     });
     avgLat /= count;
     avgLng /= count;
   }
}());

// function setupDrawing() {
//    var input = document.getElementById('pac-input');
//    var drawingManager = new google.maps.drawing.DrawingManager({
//       drawingMode: google.maps.drawing.OverlayType.MARKER,
//       drawingControl: true,
//       drawingControlOptions: {
//         position: google.maps.ControlPosition.TOP_CENTER,
//         drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
//       },
//       markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
//       circleOptions: {
//         fillColor: '#ffff00',
//         fillOpacity: 1,
//         strokeWeight: 5,
//         clickable: false,
//         editable: true,
//         zIndex: 1
//       }
//     });
//     drawingManager.setMap(map);
// }

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
