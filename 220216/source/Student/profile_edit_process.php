 <?php
session_start();
include '../../config/dbconnect.php';
$user=$_SESSION['logged_user'];

	$fname=htmlspecialchars(mysql_real_escape_string($_REQUEST['fname']));
	$lname=htmlspecialchars(mysql_real_escape_string($_REQUEST['lname']));
	$mobile=htmlspecialchars(mysql_real_escape_string($_REQUEST['mobile']));
	$dob=htmlspecialchars(mysql_real_escape_string($_REQUEST['dob']));
	$branch=htmlspecialchars(mysql_real_escape_string($_REQUEST['branch']));
	$class=htmlspecialchars(mysql_real_escape_string($_REQUEST['class']));
	$year=htmlspecialchars(mysql_real_escape_string($_REQUEST['year']));
	$address=htmlspecialchars(mysql_real_escape_string($_REQUEST['address']));
	
	
	$check_status=mysql_query("UPDATE exam_users SET firstname='$fname',lastname='$lname',mobile='$mobile',dob='$dob',branch='$branch',class='$class',year='$year',address='$address' WHERE email='$user'") or die(mysql_error());
	
	if($check_status==true)
		echo "<font color=green><Center>Profile Updated succssfully</center></font>";
	else
		echo "<font color=red><Center>Profile Updation Failed .</center></font>";
?>	
