<style>
  #first{
   background-color:#02f78e
  }
  #sel
     {
     height:30px;
     width:100px;
     background-color:#ff8000;
     }
  #b{
     height:30px;
     background-color:#ff8000;
  }
  #name{
       height:30px;
       width:700px;
       background-color:#00FFFF;
       }
  #second{
   background-color:#84c1ff;
  }
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map{
        height:70%;
        width:100%;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
     


      #head{
            font-size:40px;
            text-align:center;
            font-family:verdana;
            background-color:#02f78e;
      }
</style>
<BODY>
  <div id="first">
  <h>Choose the course you are searching for in the task bar below to search the courses. Click search, then the corresponding professors and their office hours information will be shown below.</h></br>
  </div>

  <select id="sel">
      <option value="Name:Susan Worst   Office Hours:M/W:7:30-8:30&T:6-7   Location:PSY228A(64-68 Cummington Mall)">CS103</option>
	<option value="Name:David Sullivan   Office Hours:M:3-5&W:2-4   Location:PSY228B(64-68 Cummington Mall)">CS105</option>
      <option value="Name:Aaron Stevens   Office Hours:T:3:30-4:15   Location:PSY228B(64-68 Cummington Mall)">CS108</option>
	<option value="Name:David Sullivan   Office Hours:M:3-5&W:2-4   Location:PSY228B(64-68 Cummington Mall)">CS111</option>
      <option value="Name:Wayne Snyder   Office Hours:T:2:30-3:30&W:1:30-4:30   Location:MCS276(111 Cummington Mall)">CS112</option>
	<option value="Name:Hongwei Xi   Office Hours:M/W:4-5&TH:1-2   Location:MCS287(111 Cummington Mall)">CS320</option>
      <option value="Name:Wayne Snyder   Office Hours:T:5-6:30&W:5:30-7   Location:MCS289(111 Cummington Mall)">CS402</option>
      <option value="Name:Rich West   Office Hours:T:2:30-3:30&W:1:30-4:30   Location:MCS276(111 Cummington Mall)">CS552</option>
     	<option value="Name:Orran Kreiger   Office Hours:N/A   Location:MCS177(111 Cummington Mall)">CS591 K2</option>
      <option value="Name:Wayne Snyder   Office Hours:T:2:30-3:30&W:1:30-4:30   Location:MCS276(111 Cummington Mall)">CS591 S1</option>
	<option value="Name:Lorenzo Orecchia   Office Hours:Appt. Only   Location:MCS135D(111 Cummington Mall)">KHC HC504 C7</option>
      <option value="Name:Manuel Egele   Office Hours:Appt. Only   Location:PHO337(8 St Mary's Street)">ENG EC700</option>
	<option value="Name:David Starobinski   Office Hours:T/TH:2-3   Location:PHO431(8 St Mary's Street)">ENG EC541</option>


  </select>
  <INPUT id="b" TYPE="button" VALUE="search" ONCLICK="getInf()"></br>
  <INPUT id="name" TYPE="text"/>

<div id="second">
 Already know the office hour, but need to find where the office is? Use the Search Box below.
 </div>




    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>

  var doc=document.getElementById("demo");
    function getLocation()
    {
        if (navigator.geolocation)
        {
        navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
    }
//cited from google show location
    function showPosition(position)
    {
        var latlon=position.coords.latitude+","+position.coords.longitude;

        var img_url="http://maps.googleapis.com/maps/api/staticmap?center="
        +latlon+"&zoom=18&size=600x500&sensor=false";
        document.getElementById("map").innerHTML="<img src='"+img_url+"'>";
    }
//some cases are written by me
    function showError(error)
    {
        switch(error.code) 
        {
        case error.PERMISSION_DENIED:
          doc.innerHTML="Request for Geolocation denied by the user."
          break;
        case error.POSITION_UNAVAILABLE:
          doc.innerHTML="Unavailable location information."
          break;
        case error.TIMEOUT:
          doc.innerHTML="Location request timed out."
          break;
        case error.UNKNOWN_ERROR:
          doc.innerHTML="UNKNOWN_ERROR."
          break;
        }
    }


//Cited from google API
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 42.3536, lng: -71.1229},
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
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
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtWhaTQ7mAGHzXkp-XroT6YMk6i-F8X7w&libraries=places&callback=initAutocomplete"
         async defer></script>

 
 </BODY>
 <SCRIPT LANGUAGE="JavaScript">
	function getInf()
	{
		var n = document.getElementById("sel").value;
    		document.getElementById("name").value = n;   
	}
 </SCRIPT>
