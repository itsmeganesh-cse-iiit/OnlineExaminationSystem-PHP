<?php
session_start();
$user=$_SESSION['login_user'];
require("reader.php"); 
include '../config/dbconnect.php';
@$file=$_SESSION['exam_file'];
@$exam_code=$_SESSION['exam_file_name'];
$connection=new Spreadsheet_Excel_Reader(); 
$connection->read($file);

@$exam_created_date=$connection->sheets[0]["cells"][1][8];
@$subject=$connection->sheets[0]["cells"][2][8];
@$timelimit=$connection->sheets[0]["cells"][3][8];
@$exam_display_date=$connection->sheets[0]["cells"][4][6];
@$staff_id=$connection->sheets[0]["cells"][4][8];
@$semester =$connection->sheets[0]["cells"][1][6];
@$branch =$connection->sheets[0]["cells"][2][6];
@$year =$connection->sheets[0]["cells"][3][6];
$ip=$_SERVER['REMOTE_ADDR'];
$review_flag=0;


if($exam_created_date==false || $subject==false || $timelimit==false || $exam_display_date==false || $staff_id==false || $semester==false || $branch==false || $year==false)
	$review_flag=1;




if($review_flag==0)
{
	$check_staff=mysql_query("SELECT ip,exam_created_time FROM exams_available WHERE exam_code='$exam_code'") or die(mysql_error());
	$staff_det=mysql_fetch_array($check_staff);

	if(mysql_num_rows($check_staff)>0)
	{
		echo "<Br><Br><br><br><br><center><font color=red>You have Already Submitted the Exam<font><br><B>IP : ".$staff_det['ip']."</b><br><b>TIME : ".$staff_det['exam_created_time']."</b></center><Br>";
		$exam_load_file= $_SESSION['exam_file'];
		unlink($exam_load_file);
		unset($_SESSION['exam_file']);
		unset($_SESSION['exam_file_name']);
	}
	else
	{

		if($timelimit==0)
			mysql_query("INSERT INTO exams_available VALUES('$subject','$exam_display_date','N','$timelimit','$user','$ip','$exam_created_date','$staff_id','$semester','$branch','$year','$exam_code','1',CURRENT_TIMESTAMP,'')") or die(mysql_error());
		else
			mysql_query("INSERT INTO exams_available VALUES('$subject','$exam_display_date','Y','$timelimit','$user','$ip','$exam_created_date','$staff_id','$semester','$branch','$year','$exam_code','1',CURRENT_TIMESTAMP,'')") or die(mysql_error());

		for($i=6;$i<=106;$i++)
		{
			@$sno=$connection->sheets[0]["cells"][$i][1];
			@$question=$connection->sheets[0]["cells"][$i][2];
			@$answer=$connection->sheets[0]["cells"][$i][8];
			@$option_a=$connection->sheets[0]["cells"][$i][3];
			@$option_b=$connection->sheets[0]["cells"][$i][4];
			@$option_c=$connection->sheets[0]["cells"][$i][5];
			@$option_d=$connection->sheets[0]["cells"][$i][6];
			
			if($question!=false)
			{
				// Exams_available Table
				mysql_query("INSERT INTO exam_questions VALUES('$exam_code','$sno','$question','$option_a','$option_b','$option_c','$option_d')") or die(mysql_error());

				

				//Answers Table
				mysql_query("INSERT INTO exam_real_answers VALUES('$exam_code','$sno','$answer')") or die(mysql_error());


				
			}
			else
			{
				// These are empty rows
			}

		}
	echo "<font color=green>Exam Submitted Succssfully...</font><br><Br><img src='../images/done.png' />";
	$exam_load_file= $_SESSION['exam_file'];
	unlink($exam_load_file);
	unset($_SESSION['exam_file']);
	unset($_SESSION['exam_file_name']);
		
	}
	
}
else
{
	echo "<font color=red>Fields are Empty / File may be Password Protected</font>";
	$exam_load_file= $_SESSION['exam_file'];
	unlink($exam_load_file);
	unset($_SESSION['exam_file']);
	unset($_SESSION['exam_file_name']);
}


// End this video.thank you for watch :) 
// Soppy


?>