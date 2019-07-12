<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['stu']))
{
$students=htmlspecialchars(mysql_real_escape_string($_REQUEST['stu']));
$exams=htmlspecialchars(mysql_real_escape_string($_REQUEST['exams']));
$students=explode(",",$students);
$exams=explode(",",$exams);
$ip=$_SERVER['REMOTE_ADDR'];

for ($i=0;$i<sizeof($exams);$i++)
	{
		for($j=0;$j<sizeof($students);$j++)
		{
			$exam_tmp=$exams[$i];
			$student_tmp=$students[$j];
			$check=mysql_query("SELECT ip FROM students_assosiated_to_exams WHERE examid='$exam_tmp' and student='$student_tmp'") or die(mysql_error());
			if(mysql_num_rows($check)>0)
			{
				// do nothing
			}
			else
				mysql_query("INSERT INTO students_assosiated_to_exams VALUES('$exam_tmp','$student_tmp','$ip',CURRENT_TIMESTAMP)") or die(mysql_error());
		}
	}



echo "<center><div class='alert alert-success'><h3>Students Assosiated Successfully..<h3><br><button class='btn btn-info' onclick=\"admin_load_this('students_assosiated_to_exams')\">Back</button></div></center>";

}

?>