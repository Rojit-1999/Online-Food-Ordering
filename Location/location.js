var map, marker, watchId;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6
  });

  marker = new google.maps.Marker({
    map: map,
    position: { lat: -34.397, lng: 150.644 }
  });
}

function startTracking() {
  if (navigator.geolocation) {
    watchId = navigator.geolocation.watchPosition(
      function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        marker.setPosition(pos);
        map.setCenter(pos);
      },
      function() {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function stopTracking() {
  if (navigator.geolocation) {
    navigator.geolocation.clearWatch(watchId);
  }
}

document.getElementById("startBtn").addEventListener("click", startTracking);
document.getElementById("stopBtn").addEventListener("click", stopTracking);

initMap();
