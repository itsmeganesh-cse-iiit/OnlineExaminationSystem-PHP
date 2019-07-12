<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['stu']))
{
$students=htmlspecialchars(mysql_real_escape_string($_REQUEST['stu']));
$students=explode(",",$students);
$ip=$_SERVER['REMOTE_ADDR'];


for($j=0;$j<sizeof($students);$j++)
{
	$student_tmp=$students[$j];
	$check=mysql_query("UPDATE exam_users SET active='0' WHERE email='$student_tmp'") or die(mysql_error());
}


echo "<center><div class='alert alert-success'><h3>Students Banned  Successfully..<h3><br><button class='btn btn-info' onclick=\"admin_load_this('ban_student')\">Back</button></div></center>";

}

?>