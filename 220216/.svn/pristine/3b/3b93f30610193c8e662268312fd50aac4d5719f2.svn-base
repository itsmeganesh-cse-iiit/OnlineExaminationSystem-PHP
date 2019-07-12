<?php 
session_start();
include '../config/dbconnect.php';
if(!isset($_REQUEST['cell']))
{
header("Location:index.php");	
}
else {
	$cell=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['cell'])));
	$secretcode= md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['secretcode'])));
	
	$query = mysql_query("SELECT * FROM admin WHERE login_type='login_two' AND login_key1='$cell' AND login_key2='$secretcode' ") or die(mysql_error());
	$num = mysql_num_rows($query);
	if($num!=1)
	{
		header("Location:index.php");
	}
	else 
	{
		$_SESSION['login_two']="Created";
		header("Location:admin_main.php");
		
		
	}
}
	?>