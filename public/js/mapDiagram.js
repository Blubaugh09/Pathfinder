var previousState = { position: null, scale: null };

/* function makeDraggable(element, handle) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    handle.onmousedown = dragMouseDown;
  
    function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      pos3 = e.clientX;
      pos4 = e.clientY;
      document.onmouseup = closeDragElement;
      document.onmousemove = elementDrag;
    }
  
    function elementDrag(e) {
      e = e || window.event;
      e.preventDefault();
      pos1 = pos3 - e.clientX;
      pos2 = pos4 - e.clientY;
      pos3 = e.clientX;
      pos4 = e.clientY;
      element.style.top = (element.offsetTop - pos2) + "px";
      element.style.left = (element.offsetLeft - pos1) + "px";
    }
  
    function closeDragElement() {
      document.onmouseup = null;
      document.onmousemove = null;
    }
  } 
  
  // Call makeDraggable and pass in the map container and the header as the handle
  makeDraggable(document.getElementById("map-container"), document.getElementById("map-header"));
*/


  var map;
  function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 31.7683, lng: 35.2137}, // Coordinates for Jerusalem
          zoom: 8
      });
  }

  // This function places a marker on the map at the given location and pans to it
function placeMarkerAndPanTo(latLng, map) {
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(latLng.latitude, latLng.longitude),
        map: map
    });
    map.panTo(marker.getPosition());
}
  