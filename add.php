<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user']) != '7')
{
 header("Location: index.php");
}
if(isset($_POST['btn-add']))
{
 $fname = mysql_real_escape_string($_POST['fname']);
 $lname = mysql_real_escape_string($_POST['lname']);
 $office = mysql_real_escape_string($_POST['office']);
 $hours = mysql_real_escape_string($_POST['hours']);
 $courses = mysql_real_escape_string($_POST['courses']);
 $website = mysql_real_escape_string($_POST['website']);
 $img = mysql_real_escape_string($_POST['img']);
 
 if(mysql_query("INSERT INTO professors(fname,lname,office,hours,courses,website,img) VALUES('$fname','$lname','$office','$hours', '$courses','$website','$img')"))
 {
  ?>
        <script>alert('Successfully added!');</script>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Cummington2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;
		text-align: center;
		font-size: 48px;
		padding-right: 70px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#icon{
 		float: right;
 	}
 	#logout{
 		background-color:#ffffff;
 		font-size: 14pt;
 	}

</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a id="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error while adding Professor.');</script>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Cummington2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;
		text-align: center;
		font-size: 48px;
		padding-right: 70px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#icon{
        float: right;
    }
    #logout{
    	background-color:#ffffff;
    	font-size: 14pt;
    }

</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a id="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
        <?php
 }
}
else if(isset($_POST['btn-view'])){
	$res = mysql_query("SELECT * FROM newProfs");
	echo "<div style ='font:20px Arial;color:#ffffff'> Professors not yet in Database: </div>";
	echo "<br>";

	while($newRow=mysql_fetch_array($res)){
		echo "Last Name: ".$newRow['lname'];
		echo "<br>";
	}
	?>
	<a style="background-color:#ffffff" href="http://www.bu.edu/cs/people/directory/" target="_blank">View list of CS Professors</a>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Slide2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;
		text-align: center;
		font-size: 48px;
		padding-right: 70px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#logout{
 		background-color:#ffffff;
 		font-size: 14pt; 
 	}

</style>
</head>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a id="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
	
	<?php
}
else if(isset($_POST['btn-remove'])){
	$count = mysql_query("SELECT COUNT(*) FROM newProfs");
	$res = mysql_fetch_array($count);
	$total = $res[0];
	if($total > 0){
		while($total > 0){
			mysql_query("DELETE FROM newProfs");
			$total--;
	}
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Cummington2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;					
		text-align: center;
		font-size: 48px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#icon{
 		float: right;
 	}
 	#logout{
 		background-color:#ffffff;
 		font-size: 14pt;  
 	}

</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a id="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
<?php
}
	else{
		?>
		<script>alert('There are no more Professors that need to be added.')</script>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Cummington2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;					
		text-align: center;
		font-size: 48px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#icon{
 		float: right;
 	}
 	#logout{
 		background-color:#ffffff;
 		font-size: 14pt; 
 	}

</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a style="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
		<?php
	}
}
else{
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
<style>
	body{
		background-image: url("Cummington2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	h2{
		text-shadow: 4px 4px black;
		color:white;
		font-family: Arial;					
		text-align: center;
		font-size: 48px;
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
 	#add-form{
 		padding-right: 90px;
 	}
 	#icon{
 		float: right;
 	}
 	#logout{
 		background-color:#ffffff;
 		font-size: 14pt;
 	}

</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Add a Professor</h2>
<center>
<div id="add-form">
<form method="post">
<table align="center" border="0">
	<tr>
	<td><input type="text" name="fname" placeholder="Professor's First Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="lname" placeholder="Professor's Last Name" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="office" placeholder="Professor's Office Location" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="hours" placeholder="Professor's Office Hours" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
	</tr>
	<tr>
	<td><input type="text" name="img" placeholder="File path to Professor's Image" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-add">Add</button></td>
	</tr>
</table>
</form>
</div>
<form method="post">
<table align="center" border="0">
	<tr>
	<td><button type="submit" name="btn-view">View Professors</button></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-remove">Remove the first person from Need to Add-List</button></td>
	</tr>
	<tr>
	<td><a id="logout" href="Logout.php?logout">Log out</a></td>
	</tr>
</table>
</center>
</body>
</html>
<?php
}
?>
