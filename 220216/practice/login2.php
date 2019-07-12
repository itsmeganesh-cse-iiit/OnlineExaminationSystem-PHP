<?php


$username =$_REQUEST['firstname'];
$password = $_REQUEST['password'];


$k=mysql_connect("localhost","root","") or die("Connection failed to the server");
mysql_select_db("registration") or die("Database connection failed");

$p = mysql_query("SELECT * FROM registration_form WHERE firstname='$username' AND password='$password'") or die(mysql_error());
$k=mysql_num_rows($p);
if($k)
	echo "Welcome $username !!!";
else
	echo "invalid login";


?>