<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: default.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));
 
 if(mysql_query("INSERT INTO users(username, password) VALUES('$uname','$upass')"))
 {
  ?>
        <script>alert('Successfully registered!');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('Error while registering you. Username is in use.');</script>
        <?php
 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<style>

	body{
		background-image: url("Cummington2.jpg");
		background-size: 1300px, 760px;
		background-repeat: no-repeat;
	}

	h2{
		padding-left: 100px;
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
	input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
	#icon{
        float: right;
    }

    #sign{

    	font-size: 20pt;
    	background-color:#ffffff;
    }
</style>
</head>
<div id="icon">
    <img src="LOGO.gif" height = "90" width = "90">
</div>
<body>
<h2>Enter Your Info Here</h2>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
	<tr>
	<td><input type="text" name="uname" placeholder="User Name" required /></td>
	</tr>
	<tr>
	<td><input type="password" name="pass" placeholder="Your Password" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
	</tr>
	<tr>
	<td><a id = "sign" href="index.php">Sign In Here</a></td>
	</tr>
</table>
</form>
</div>
</center>
</body>
</html>