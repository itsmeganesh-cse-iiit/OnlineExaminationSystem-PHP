<?php
session_start();
include '../../config/dbconnect.php';

$user=$_SESSION['logged_user'];
$old_password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['old_pass'])));
$new_password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['new_pass'])));
$confirm_password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['confirm_pass'])));

$pass=mysql_query("SELECT password FROM exam_users WHERE email='$user'") or die(mysql_error());
$pass_arr=mysql_fetch_array($pass);
if($pass_arr['password']==$old_password)
{
	mysql_query("UPDATE exam_users SET password='$new_password' WHERE email='$user'") or die(mysql_error());
	echo "<center><font color=green>Your new password saved successfully</font></center>";
}
else 
{
	echo "<center><font color=red>Enter old password correctly..</font></center>";
}

?>