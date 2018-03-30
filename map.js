// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {


  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: 47.578793, lng: -122.165398}
  });
	 TMHQ = new google.maps.LatLng(-33.890, 151.274);
	plotPoints([TMHQ]);
  var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: 47.578793, lng: -122.165398},
    map: map,
    icon: image
  });
  //setupDrawing()
}

function plotPoints(markers) {
	var avgLat, avgLng = 0.0;
  var count = 0;
  for (var i = 0, len = markers.length; i < len; i++) {
  	count++;
    console.log(markers[i]);
	}
}

function setupDrawing() {
   var input = document.getElementById('pac-input');
   var drawingManager = new google.maps.drawing.DrawingManager({
      drawingMode: google.maps.drawing.OverlayType.MARKER,
      drawingControl: true,
      drawingControlOptions: {
        position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
      },
      markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
      circleOptions: {
        fillColor: '#ffff00',
        fillOpacity: 1,
        strokeWeight: 5,
        clickable: false,
        editable: true,
        zIndex: 1
      }
    });
    drawingManager.setMap(map);
}

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
