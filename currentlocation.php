
<style>
		#map{
			width: 100%;
			height: 100%;
			margin: no;
		}
	</style>

<div id="map"></div>

<script src="http://www.google.com/jsapi?key=ABQIAAAAlJFc1lrstqhgTl3ZYo38bBQcfCcww1WgMTxEFsdaTsnOXOVOUhTplLhHcmgnaY0u87hQyd-n-kiOqQ"></script>
<script>
(function () {
google.load("maps", "2");
google.setOnLoadCallback(function () {
var map = new google.maps.Map2(document.getElementById("map")),
markerText = "<h2>You are here</h2><p></p>",
markOutLocation = function (lat, long) {
var latLong = new google.maps.LatLng(lat, long),
marker = new google.maps.Marker(latLong);
map.setCenter(latLong, 18);
map.addOverlay(marker);
marker.openInfoWindow(markerText);
google.maps.Event.addListener(marker, "click", function () {
marker.openInfoWindow(markerText);
});
};
map.setUIToDefault();
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function (position) {
markOutLocation(position.coords.latitude, position.coords.longitude);
},
function () {
markerText = "<p>Please accept geolocation for me to be able to find you. <br>I've put you in Stockholm for now.</p>";
markOutLocation(59.3325215, 18.0643818);
}
);
}
else {
markerText = "<p>No location support. Try Easter Island for now. :-)</p>";
markOutLocation(-27.121192, -109.366424);
}
});
})();
</script>