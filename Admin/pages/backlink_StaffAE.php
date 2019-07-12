<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['staff']))
{
$staff=htmlspecialchars(mysql_real_escape_string($_REQUEST['staff']));
$exams=htmlspecialchars(mysql_real_escape_string($_REQUEST['exams']));
$staff=explode(",",$staff);
$exams=explode(",",$exams);
$ip=$_SERVER['REMOTE_ADDR'];

for ($i=0;$i<sizeof($exams);$i++)
	{
		for($j=0;$j<sizeof($staff);$j++)
		{
			$exam_tmp=$exams[$i];
			$staff_tmp=$staff[$j];
			$check=mysql_query("SELECT ip FROM staff_assosiated_to_exams WHERE exam_id='$exam_tmp' and staff='$staff_tmp'") or die(mysql_error());
			if(mysql_num_rows($check)>0)
			{
				// do nothing
			}
			else
				mysql_query("INSERT INTO staff_assosiated_to_exams VALUES('$exam_tmp','$staff_tmp','$ip',CURRENT_TIMESTAMP)") or die(mysql_error());
		}
	}



echo "<center><div class='alert alert-success'><h3>Staff Assosiated Successfully..<h3><br><button class='btn btn-info' onclick=\"admin_load_this('staff_assosiated_to_exams')\">Back</button></div></center>";

}

?>