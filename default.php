<?php
session_start();
include_once 'dbconnect.php';

//Modified example from OpenWeather
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

// Must point to composer's autoload file.
require 'vendor/autoload.php';

// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'imperial';

// Create OpenWeatherMap object. 
$owm = new OpenWeatherMap('8005c4395e2376df5c9340f6864fd905');

try {
    $weather = $owm->getWeather('Boston', $units, $lang);
} catch(OWMException $e) {
    echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
} catch(\Exception $e) {
    echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
}


echo "<div style ='font:24px Arial;color:#000000'> Current weather conditions: </div>";
echo "<br>";

echo "<div style ='font:20px Arial;color:#ffffff'> Temperature: </div>".$weather->temperature;
echo "<br>";
echo "<div style ='font:20px Arial;color:#ffffff'> Clouds: </div>".$weather->clouds->getDescription();
echo "<br>";
echo "<div style ='font:20px Arial;color:#ffffff'> Precipation: </div>".$weather->precipitation->getDescription();
echo "<br>";
//echo $weather-> 


if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
if(isset($_POST['btn-search'])){
	$lname = mysql_real_escape_string($_POST['lname']);
	$found = mysql_query("SELECT COUNT(*) FROM professors WHERE lname = '$lname'");
	$foundRow = mysql_fetch_array($found); 
	if($foundRow[0] > 0){
		$res=mysql_query("SELECT * FROM professors WHERE lname='$lname'");
		?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Default</title>
		<style>
			body{
				background-image: url("dumb1.jpg");
				background-size: cover;
				background-repeat: no-repeat;
			}
			h2{
				text-shadow: 4px 4px black;
				color:white;
				font-family: Arial;					
				text-align: center;
				font-size: 60px;
			}
			input[type=text], select {
			    width: 100%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			#logout{
					font-size: 16pt;
					background-color:#ffffff; 
				}

		</style>
		</head>
		<body>
		<script>api.openweathermap.org/data/2.5/weather?q=London&mode=html</script>


		<h2>Find Your Professor!</h2>
		<center>
		<div id="search-form">
		<form method="post">
		<table align="center" border="0">
			<tr>
			<td><input type="text" name="lname" placeholder="Professor's last name" required /></td>
			</tr>
			<tr>
			<td><button type="submit" name="btn-search">Search</button></td>
			</tr>
			<tr>
			<td><a id="logout" href="Logout.php?logout">Log out here</a></td>
			</tr>
		</table>
		</form>
		</div>
		</center>
		</body>
		</html>
<?php
		echo "<br>";
		echo "<div style ='font:24px Arial;color:#000000'> Results: </div>";
		echo "<br>";

		?> 
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
      	float: right;
        height: 48%;
        width: 50%;
      }
      #floating-panel {
      	position: absolute;
      	float: right;
      	height: 125px;
      	width: 200px;
        top: 300px;
        left: 1025px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
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
      <option value="518 Park Drive Boston, MA">South Campus</option>
      <option value="Packard's Corner Boston, MA">Packard's Corner</option>
      <option value="Kenmore Square Boston, MA">Kenmore Square</option>
      <option value="72 E Concord St. Boston, MA">Med Campus</option>

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

		<?php
		while($profRow=mysql_fetch_array($res)){
			echo "<div style ='font:20px Arial;color:#ffffff'> Name: </div>". $profRow['fname'];
			echo " ". $profRow['lname'];
			echo "<br>";
			echo "<div style ='font:20px Arial;color:#ffffff'>Office Location: </div>". $profRow['office'];
			echo "<br>";
			echo "<div style ='font:20px Arial;color:#ffffff'>Office Hours: </div>". $profRow['hours'];
			echo "<br>";
			echo "<div style ='font:20px Arial;color:#ffffff'> Courses: </div>". $profRow['courses'];
			echo "<br>";
			echo "<div style ='font:20px Arial;color:#ffffff'> Website: </div> <a style='background-color:#ffffff' href='". $profRow['website']."' target='_blank' > Professor's Homepage </a>";
			echo "<br>";
			echo "<div style ='font:20px Arial;color:#ffffff'> Professor's Image: </div> <img src='".$profRow['img']."' height = '200' width = '160' />";
		}
	} 	
	else if($foundRow[0] == 0)
	{
		mysql_query("INSERT INTO newProfs(lname) VALUES('$lname')");

		?>
     		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Default</title>
			<style>
				body{
					background-image: url("dumb2.jpg");
					background-size: cover;
					background-repeat: no-repeat;
				}
				h2{
					text-shadow: 4px 4px black;
					color:white;
					font-family: Arial;
					text-align: center;
					font-size: 60px;
				}
				input[type=text], select {
				    width: 100%;
				    padding: 12px 20px;
				    margin: 8px 0;
				    display: inline-block;
				    border: 1px solid #ccc;
				    border-radius: 4px;
				    box-sizing: border-box;
				}
				#logout{
					font-size: 16pt;
					background-color:#ffffff; 
				}
			</style>
			</head>
			<body>
			<script>api.openweathermap.org/data/2.5/weather?q=London&mode=html</script>


			<h2>Find Your Professor!</h2>
			<center>
			<div id="search-form">
			<form method="post">
			<table align="center" border="0">
				<tr>
				<td><input type="text" name="lname" placeholder="Professor's last name" required /></td>
				</tr>
				<tr>
				<td><button type="submit" name="btn-search">Search</button></td>
				</tr>
				<tr>
				<td><a id="logout" href="Logout.php?logout">Log out here</a></td>
				</tr>
			</table>
			</form>
			</div>
			</center>
			</body>
			</html>
			<script>alert('Professor is not currently in our database! He/She has been recorded for addition.');</script>
			      		<?php	
				}
			}
			else {
					?>
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Default</title>
			<style>
				body{
					background-image: url("dumb2.jpg");
					background-size: cover;
					background-repeat: no-repeat;
				}
				h2{
					text-shadow: 4px 4px black;
					color:white;
					font-family: Arial;
					text-align: center;
					font-size: 60px;
				}
				input[type=text], select {
				    width: 100%;
				    padding: 12px 20px;
				    margin: 8px 0;
				    display: inline-block;
				    border: 1px solid #ccc;
				    border-radius: 4px;
				    box-sizing: border-box;
				}
				#logout{
					font-size: 16pt;
					background-color:#ffffff; 
				}
			</style>
			</head>
			<body>
			<script>api.openweathermap.org/data/2.5/weather?q=London&mode=html</script>


			<h2>Find Your Professor!</h2>
			<center>
			<div id="search-form">
			<form method="post">
			<table align="center" border="0">
				<tr>
				<td><input type="text" name="lname" placeholder="Professor's last name" required /></td>
				</tr>
				<tr>
				<td><button type="submit" name="btn-search">Search</button></td>
				</tr>
				<tr>
				<td><a id="logout" href="Logout.php?logout">Log out here</a></td>
				</tr>
			</table>
			</form>
			</div>
			</center>
			</body>
			</html>
		<?php
	}

?>

