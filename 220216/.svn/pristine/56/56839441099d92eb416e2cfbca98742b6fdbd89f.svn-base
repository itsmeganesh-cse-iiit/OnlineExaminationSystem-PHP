<?php

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$mobile=$_REQUEST['mobile'];
$email=$_REQUEST['email'];
$dob=$_REQUEST['dob'];
$add=$_REQUEST['address'];
$gender=$_REQUEST['gender'];
$password=$_REQUEST['pass'];
$confirmpassword=$_REQUEST['confirm'];

mysql_connect("localhost","root","") or die("Connection failed to server");
mysql_select_db("registration") or die("Database connction failed");
if($password==$confirmpassword)
{
$details=mysql_query("INSERT INTO `registration_form` (`firstname`, `lastname`, `mobile`, `email`, `dob`, `address`, `gender`, `password`, `con_password`) VALUES ('$firstname', '$lastname', '$mobile', '$email', '$dob', '$add', '$gender', '$password', '$confirmpassword')");
}
else
	echo "plzz confirm your password !!! and re-register";
echo "First name : $firstname<br>";
echo "Last name  : $lastname<br>";
echo "Mobile     : $mobile<br>";
echo "Email      : $email<br>";
echo "Date-birth : $dob<br>";
echo "Address    : $add<br>";
echo "Gender     : $gender<br>";


?>