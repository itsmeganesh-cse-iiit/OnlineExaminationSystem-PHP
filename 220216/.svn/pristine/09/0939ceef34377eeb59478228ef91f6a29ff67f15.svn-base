<?php
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['sub']))
{
	$sub=htmlspecialchars(mysql_real_escape_string($_REQUEST['sub']));
	$message=htmlspecialchars(mysql_real_escape_string($_REQUEST['msg']));
	$ip=htmlspecialchars(mysql_real_escape_string($_SERVER['REMOTE_ADDR']));
	$user=$_SESSION['logged_user'];
	$check_status=mysql_query("INSERT INTO users_feedback VALUES('','$user','$sub','msg','$ip',CURRENT_TIMESTAMP)") or die(mysql_error());
	if($check_status=true)
		echo "succssfull";
		else
			echo "failed";
}

?>