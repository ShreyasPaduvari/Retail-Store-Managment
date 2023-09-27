<?php
session_start();
?>

<html>
<head>
<style>
	body{
  margin: 10;
  padding: 0;
  background-image: url('ozan-oztaskiran-f3u87ifZZPk-unsplash.jpg');
	background-size: cover;
  /* background: linear-gradient(120deg,#2980b9, #8e44ad); */
  height: 100vh;
  /* overflow: hidden; */
}
</style>
<title>Login</title>
</head>

<body bgcolor="#e2e8f0">

<h1 align="center"> RETAIL STORE MANAGEMENT SYSTEM </h1>

<form method='post'>
<?php

	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location: http://localhost/dbms%20code/retailindex.php");
	exit();
}
echo "<input type='submit' name='logout' value='Logout'>"
	."<div align='right'>Welcome ".$username." <br>". $email."</div>";



?>
</form>

	<h2 align="center">Connecting to Online Transaction Portal . . .</h2>