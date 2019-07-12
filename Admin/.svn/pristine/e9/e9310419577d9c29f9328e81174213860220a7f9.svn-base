<?php
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['uname']))
{
	$username=htmlspecialchars(mysql_real_escape_string($_REQUEST['uname']));
	$password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['pwd'])));
	
	$user=mysql_query("SELECT active FROM exam_users WHERE email='$username' AND password='$password'") or die(mysql_error()); 
	$arr = mysql_fetch_array($user);
	$num=mysql_num_rows($user);
	if($num==1)
	{
		if($arr['active']=="1")
		{
			$_SESSION['logged_user']=$username;
			echo "1";
		}
		else 
		{
			echo "2";
		}
			
		
		
	}
	else
		echo "0";
}

?>