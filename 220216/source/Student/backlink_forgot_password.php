<?php
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['email']))
{
$email=htmlspecialchars(mysql_real_escape_string($_REQUEST['email']));
$password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['password'])));

$k=mysql_query("UPDATE exam_users SET password='$password' WHERE email='$email'") or die(mysql_error());
if($k)
	echo "<h3><font color=green><Center>Password Updated successfully</center></font></h3>";
else
	echo "<h3><font color=red><Center>Updating Password Failed</center></font></h3>";
}

?>