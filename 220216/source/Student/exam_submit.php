<?php
session_start();
include '../../config/dbconnect.php';
$exam_code=$_SESSION['exam_code'];
$user=$_SESSION['logged_user'];
$ip=$_SERVER['REMOTE_ADDR'];
$submit_flag=mysql_query("INSERT INTO student_exam_flags VALUES('$user','$exam_code','1',CURRENT_TIMESTAMP,'$ip')") or die(mysql_error());
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo "<br><br><br><br><center><H2>Exam Submitted Successfully.</h2><br><br><table class='table striped hovered cell-hovered border bordered' style='width:60%;'><tr><Th>Exam Submission Time</th><td><center>". $date->format('d-m-Y H:i:s')."</center></td></tr><tr><Th>IP Address</th><td><center>".$ip."</center></td></tr></table><h5><button class='button info' onclick=\"exam_submit_load_this('student_exams')\">Back</button></h5></center>";

?>