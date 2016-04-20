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
 $courses = mysql_real_escape_string($_POST['courses']);
 $website = mysql_real_escape_string($_POST['website']);
 
 if(mysql_query("INSERT INTO profs(fname,lname,office,courses,website) VALUES('$fname','$lname','$office','$courses','$website')"))
 {
  ?>
        <script>alert('Successfully added!');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error while adding Professor.');</script>
        <?php
 }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Professor to Database</title>
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
<td><input type="text" name="courses" placeholder="Professor's Courses" required /></td>
</tr>
<tr>
<td><input type="text" name="website" placeholder="Professor's Website" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-add">Add</button></td>
</tr>
<tr>
<td><a href="Logout.php?logout">Log out</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>