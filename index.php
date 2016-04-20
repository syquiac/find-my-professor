<?php
session_start();
include_once 'dbconnect.php';


//if(isset($_SESSION['user']) == "admin"){
//	header("Location: add.php");
//}
//if(isset($_SESSION['user'])!="")
//{
 //header("Location: default.php");
//}
if(isset($_POST['btn-login']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE username ='$uname'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
 	if($row['username'] == 'admin'){
 	$_SESSION['user'] = $row['user_id'];
 	header("Location: add.php");
 	}
 	else {	
  	$_SESSION['user'] = $row['user_id'];
  	header("Location: default.php");
 }
}
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cleartuts - Login & Registration System</title>
<!--<link rel="stylesheet" href="style.css" type="text/css" />-->
<style>
	body{
		background-color: #cc0000;
	}
	h2{
		color:white;
		font-family: Arial;
		text-align: center;
		font-size: 72pt;
	}
</style>
</style>
</head>
<body>
<h2>Welcome to Find My Professor!</h2>
<center>
<div id="login-form">
<form method="post">
<table align="center" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Your User Name" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="Register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>