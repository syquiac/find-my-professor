<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
if(isset($_POST['btn-search'])){
	$lname = mysql_real_escape_string($_POST['lname']);
	$found = mysql_query("SELECT COUNT(*) FROM profs WHERE lname = '$lname'");
	$foundRow = mysql_fetch_array($found); 
	if($foundRow[0] > 0){
		$res=mysql_query("SELECT * FROM profs WHERE lname='$lname'");
		while($profRow=mysql_fetch_array($res)){
			echo "Name: ". $profRow['fname'];
			echo " ". $profRow['lname'];
			echo "<br>";
			echo "Office Location: ". $profRow['office'];
			echo "<br>";
			echo "Courses: ". $profRow['courses'];
			echo "<br>";
			echo "Website: ". $profRow['website'];
		}
	} 	
	else
	{
		?>
        	<script>alert('Professor is not currently in our database!');</script>
      		<?php	
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Default</title>
<style>
	body{
		background-color: #cc0000;
	}
	h2{
		background-color: white;
		color:black;
		font-family: Arial;
		text-align: center;
		font-size: 36pt;
	}
</style>
</head>
<body>
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
<td><a href="Logout.php?logout">Log out here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>