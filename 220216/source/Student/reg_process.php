<?php
include '../../config/dbconnect.php';
if(isset($_REQUEST['fname']))
{
	$fname=htmlspecialchars(mysql_real_escape_string($_REQUEST['fname']));
	$lname=htmlspecialchars(mysql_real_escape_string($_REQUEST['lname']));
	$email=htmlspecialchars(mysql_real_escape_string($_REQUEST['email']));
	$mobile=htmlspecialchars(mysql_real_escape_string($_REQUEST['mobile']));
	$dob=htmlspecialchars(mysql_real_escape_string($_REQUEST['dob']));
	$branch=htmlspecialchars(mysql_real_escape_string($_REQUEST['branch']));
	$class=htmlspecialchars(mysql_real_escape_string($_REQUEST['class']));
	$college=htmlspecialchars(mysql_real_escape_string($_REQUEST['college']));
	$university=htmlspecialchars(mysql_real_escape_string($_REQUEST['university']));
	$password=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['password'])));
	$year=htmlspecialchars(mysql_real_escape_string($_REQUEST['year']));
	$security_question=htmlspecialchars(mysql_real_escape_string($_REQUEST['sq']));
	$security_answer=htmlspecialchars(mysql_real_escape_string($_REQUEST['sqa']));
	$gender=htmlspecialchars(mysql_real_escape_string($_REQUEST['gender']));
	$address=htmlspecialchars(mysql_real_escape_string($_REQUEST['address']));
	$ip=htmlspecialchars(mysql_real_escape_string($_SERVER['REMOTE_ADDR']));
	
	
	$register_check = mysql_query("SELECT firstname FROM exam_users WHERE email='$email'") or die(mysql_error());
	$reg_count =mysql_num_rows($register_check);
	if($reg_count>0)
	{
		echo "You have already registered..";
	}
	else
	{
	$check_status=mysql_query("INSERT INTO exam_users VALUES ('$fname','$lname','$gender','$dob','$password','$email','$branch','$year','$class','','1','$mobile','$security_question','$security_answer','$address','$ip',CURRENT_TIMESTAMP,'$college','$university')") or die(mysql_error());
	
	if($check_status=true)
		echo "Registred succssfully";
	else
		echo "Registration failed";
	}
	
	
	
	
	
	
	
	
	
}
else 
	echo "you are in wrong path";

?>