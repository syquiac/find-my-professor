<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Find My Professor</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map{
        height:50%;
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
      #��ɫ{
      background-color:#99ffff;
      }


      #head{
            font-size:40px;
            text-align:center;
            font-family:verdana;
            background-color:#02f78e;
      }

      #click{
      }
      #register{
              width:1350px;
              height:250px;
      }


      #sel{
      }
      #b{
      }
      #name{
      width:400px;
      }


      #professors{
                  width:1350px;
                  height:250px;
                  overflow-x:scroll;
                  overflow-y:hidden;
                  
       }
       *{
			padding: 0;
			margin-bottom:0;
			//border: 0; 
		}
		ul{
			display:inline;
			white-space: nowrap;
		}
		ul li{
			padding: 8px 20px;
			display: inline-block;
			background:pink;
			white-space:nowrap;
           }
    </style> 
  </head>


  <div id="head">
  <h>Find My Professor</h>
  </div>
 

  <body>
    <a href="Logout.php?logout">Sign Out</a>
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
 </body>


  <div id="click">
  <button onclick="getLocation()">Your rough location</button>
  </div>




  <h style="color:red;font-size:40px">BU Computer Science Professors</h><br>
<select id="sel">
       <option value="Office Hours:M,T,W,Th:3-4:30  Location:PSY228A">PERRY DONHAM</option>
      <option value="Office Hours:M:By appt.  Location:MCS284">Jonathan Appavo</option>
      <option value="By appt.  Location:LSEB903">Gary Benson</option>
      <option value="Office Hours:M:9:30-11&T:5-6:30  Location:MCS276">Azer Bestavros</option>
      <option value="Office Hours:T:2-3;30&Th:3-4:30  Location:MCS286">Margrit Betke</option>
      <option value="Office Hours:T:2-4&W:10-11  Location:MCS270">John Byers</option>
      <option value="Office Hours:M:On sabbatical  Location:MCS135D">Ran Canetti</option>
      <option value="Office Hours:M:By appt.  Location:PSY230">Sang (Peter) Chin</option>
      <option value="Office Hours:W:3-4&F:2-3  Location:MCS274">Mark Crovella</option>
      <option value="Office Hours:T:2:30-4&F:10:30-12  Location:MCS277">Peter Gacs</option>
      <option value="Office Hours:T:4:15-7:15  Location:MCS 135C">Sharon Goldberg</option>
      <option value="Office Hours:M:11-12&Th:11-12:30  Location:MCS281">Steve Homer</option>
      <option value="Office Hours:T:2:30-4:30&Th2:30-4:30  Location:MCS288">Assaf Kfoury</option>
      <option value="Office Hours:M:2:30-4&W:1-2:30  Location:MCS283">George Kollios</option>
      <option value="Office Hours:N/A  Location:MCS177">Orran Krieger</option>
      <option value="Office Hours:M:1:30-2:20,4-4:50&W:1:30-2:20  Location:MCS273">Leonid Levin</option>
      <option value="Office Hours:M:2-3:30&Th:3:30-5  Location:MCS271">Abraham Matta</option>
      <option value="Office Hours:M:9:30-11&T:5-6:30  Location:MCS276">Lorenzo Orecchia</option>
      <option value="Office Hours:M:2:30-4&T:12-1:30  Location:MCS135B">Leonid Reyzin</option>
      <option value="Office Hours:By appt.  Location:MCS279">Stan Sclaroff</option>
      <option value="Office Hours:T:2:30-3:30&W:1:30-4:30  Location:MCS276">Wayne Snyder</option>
      <option value="Office Hours:M:4:30-7&T:9:30-11  Location:MCS280">Evimaria Terzi</option>
      <option value="Office Hours:T:5-6:30&T:5:30-7  Location:MCS289">Richard West</option>
      <option value="Office Hours:M/W:4-5&Th:1-2  Location:MCS287">Hongwei Xi</option>
      <option value="Office Hours:M:N/A  Location:LSEB902">Simon Kasif</option>
      <option value="Office Hours:T:11:15-12:15&Th:2-4(EMA 302)  Location:MCS178">Andrei Lapets</option>
      <option value="Office Hours:N/A  Location:PSY228C">Shereif Elsheikh</option>
      <option value="Office Hours:T:3:30-4:15&W:3-4&Th:11:00-11:45  Location:PSY228B">Aaron Stevens</option>
      <option value="Office Hours:M:3-5&W:2-4  Location:PSY228D">David Sullivan</option>
      <option value="Office Hours:N/A  Location:MCS175">Nikos Triandopoulos</option>
      <option value="Office Hours:M:7:30-8:30&T:6-7&W:7:30-8:30  Location:PSY228A">Susan Worst</option>
      <option value="Office Hours:N/A  Location:MET">Tanya Zlateva</option>
  </select>


<INPUT id="b" TYPE="button" VALUE="check office hour information" ONCLICK="getInf()"></br>
<INPUT id="name" TYPE="text"/><br>
<SCRIPT LANGUAGE="JavaScript">
	function getInf()
	{
		var n = document.getElementById("sel").value;
    		document.getElementById("name").value = n;   
	}
 </SCRIPT>



<div id="��ɫ">
<a style=";color:Blue;font-size:20px" href="findcourse.php">Don't know the professors' names? Click here to check office hours and more information with your course numbers.</a>
</div>

  <a style="text-decoration:none;color:white;float:right" href="http://www.bu.edu/cs/people/directory/">post-credits scene</a>


  <div id="professors">
  <ul>
      <li><a href="http://www.cs.bu.edu/~jappavoo/jappavoo.github.com/index.html">Jonathan Appavoo</a></li>
      <li><a href="http://www.bu.edu/biology/people/profiles/gary-benson/">Gary Benson</a></li>
      <li><a href="http://azer.bestavros.net/">Azer Bestavros</a></li>
      <li><a href="http://www.cs.bu.edu/~betke/">Margrit Betke</a></li>
      <li><a href="http://www.cs.bu.edu/~byers/">John Byers</a></li>
      <li><a href="http://www.cs.bu.edu/~canetti/">Ran Canetti</a></li>
      <li><a href="http://www.cs.bu.edu/~crovella/">Mark Crovella</a></li>
      <li><a href="http://www.cs.bu.edu/faculty/spchin/Welcome.html">Sang "Peter" Chin</a></li>
      <li><a href="http://www.bu.edu/cs/shereif-el-sheikh/">Shereif El-Sheikh</a></li>
  </ul>

<div>
&nbsp
 <div id="professors">
  <ul>
      <li><a href="http://sites.bu.edu/perryd/">PERRY DONHAM!</a></li>
      <li><a href="http://www.cs.bu.edu/fac/gacs/">Peter Gacs</a></li>
      <li><a href="http://www.cs.bu.edu/fac/goldbe/">Sharon Goldberg</a></li>
      <li><a href="http://www.cs.bu.edu/fac/homer/">Steve Homer</a></li>
      <li><a href="http://www.cs.bu.edu/fac/kfoury/">Assaf Kfoury</a></li>
      <li><a href="http://www.cs.bu.edu/fac/gkollios/">George Kollios</a></li>
     <li><a href="http://www.cs.bu.edu/fac/lnd/">Leonoid Levin</a></li>
     <li><a href="http://www.cs.bu.edu/fac/matta/">Ibrahim Matta</a></li>
     <li><a href="http://cs-people.bu.edu/orecchia/">Lorenzo Orecchia</a></li>
  </ul>

 <div>
&nbsp
 <div id="professors">
  <ul>
     <li><a href="http://www.cs.bu.edu/fac/reyzin/">Leonid Reyzin</a></li>
     <li><a href="http://www.cs.bu.edu/fac/sclaroff/">Stan Sclaroff</a></li>
     <li><a href="http://www.cs.bu.edu/fac/snyder/">Wayne Snyder</a></li>
     <li><a href="http://people.bu.edu/azs/">Aaron Stevens</a></li>
     <li><a href="http://cs-people.bu.edu/dgs/index.html">David Sullivan</a></li>
     <li><a href="http://www.cs.bu.edu/fac/evimaria/">Evimaria Terzi</a></li>
     <li><a href="http://www.cs.bu.edu/~nikos/">Nikos Triandopoulos</a></li>
     <li><a href="http://www.cs.bu.edu/fac/richwest/index.html">Richard West</a></li>
     <li><a href="http://cs-people.bu.edu/sworst/index.html">Susan Worst</a></li>
  </ul>

 <div>
 &nbsp
 <div id="professors">
  <ul> 
     <li><a href="http://www.cs.bu.edu/fac/hwxi/">Hongwei Xi</a></li>
     <li><a href="http://www.bu.edu/ece/people/faculty/a-g/manuel-egele/">Manuel Egele</a></li>
     <li><a href="http://www.bu.edu/cci/okrieg/">Orran Kreiger</a></li>
     <li><a href="http://www.bu.edu/cs/people/faculty/people.bu.edu/bkulis">Brian Kulis</a></li>
     <li><a href="http://sites.bu.edu/data/">Venkatesh Saligrama</a></li>
     <li><a href="http://www.bu.edu/ece/people/faculty/o-z/david-starobinski/">David Starobinski</a></li>
     <li><a href="http://www.bu.edu/ece/people/faculty/o-z/ari-trachtenberg/">Ari Trachtenberg</a></li>
     <li><a href="http://people.bu.edu/zg/">Giorgos Zervas</a></li>
  </ul>
</div>
</div>




</html>