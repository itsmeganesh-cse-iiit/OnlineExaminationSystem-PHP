<?php

if(isset($_REQUEST['uname']))
{

$username =$_REQUEST['uname'];
$password = $_REQUEST['password'];


$k=mysql_connect("localhost","root","") or die("Connection failed to the server");
mysql_select_db("pavani") or die("Database connection failed");

$p = mysql_query("SELECT * FROM credentials WHERE username='$username' AND password='$password'") or die(mysql_error());
$k=mysql_num_rows($p);
if($k==1)
	echo "wekcine user";
else
	echo "invalid";
}
else
	echo "you are in wrong path";

?>