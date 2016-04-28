<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 50px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Start: </b>
    <select id="start">
      <option value="700 Commonwealth Ave, Boston, MA">Warren Towers</option>
      <option value="275 Babcock St. Boston, MA">West Campus</option>
      <option value="10 Buick St. Boston, MA">StuVi I</option>
      <option value="33 Harry Agganis Way, Boston, MA">StuVi II</option>
      <option value="140 Bay State Rd. Boston, MA">Towers</option>
      <option value="610 Beacon St. Boston, MA">Myles Standish Hall</option>
      <option value="512 Beacon St. Boston, MA">Danielsen Hall</option>
      <option value="1019 Commonwealth Ave. Boston, MA">1019 Comm. Ave</option>
      <option value="575 Commonwealth Ave. Boston, MA">HoJo</option>

    </select>
    <b>End: </b>
    <select id="end">
      <option value="111 Cummington Mall, boston, MA">Wayne Synder</option>
   	  <option value="111 Cummington Mall, boston, MA">Peter Gacs</option> 
   	  <option value="111 Cummington Mall, boston, MA">John Byers</option>
   	  <option value="111 Cummington Mall, boston, MA">Azer Bestavros</option>
   	  <option value="86 Cummington Mall, boston, MA">Perry Donham</option>
    </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 42.349568, lng: -71.105403}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: google.maps.TravelMode.WALKING
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtWhaTQ7mAGHzXkp-XroT6YMk6i-F8X7w&callback=initMap">
    </script>
  </body>
</html>