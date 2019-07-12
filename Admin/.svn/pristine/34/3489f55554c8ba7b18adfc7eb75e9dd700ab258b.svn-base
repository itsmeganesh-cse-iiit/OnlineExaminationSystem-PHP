<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['noq']))
{
	$qsts=htmlspecialchars(mysql_real_escape_string($_REQUEST['qsts']));
	$opts=htmlspecialchars(mysql_real_escape_string($_REQUEST['options']));
	$timebased=htmlspecialchars(mysql_real_escape_string($_REQUEST['timebased']));
	$timelimit=htmlspecialchars(mysql_real_escape_string($_REQUEST['timelimit']));
	$noq=htmlspecialchars(mysql_real_escape_string($_REQUEST['noq']));
	$ans=htmlspecialchars(mysql_real_escape_string($_REQUEST['ans']));
	$subject=htmlspecialchars(mysql_real_escape_string($_REQUEST['subject']));
	$subject_code=htmlspecialchars(mysql_real_escape_string($_REQUEST['sub_code']));
	$ip=$_SERVER['REMOTE_ADDR'];
	$created="Ganesh Koilada";
	$staff_id="";
	$sem="";
	$branch="";
	$year="";

	// unique id generator
	$d=date ("d");
	$m=date ("m");
	$y=date ("Y");
	$t=time();
	$dmt=$d+$m+$y+$t;    
	$ran= rand(0,10000000);
	$dmtran= $dmt+$ran;
	$un=  uniqid();
	$dmtun = $dmt.$un;
	$mdun = md5($dmtran.$un);
	//$sort=substr($mdun, 20);

	$exam_id=$mdun;



	//Available Exams
	$exam_query = mysql_query("INSERT INTO exams_available VALUES('$subject','','$timebased','$timelimit','$created','$ip',CURRENT_TIMESTAMP,'$staff_id','$sem','$branch','$year','$subject_code','1')") or die(mysql_error());
	

	//Questions
	$all_questions=explode('~',$qsts);
	for($i=1;$i<=$noq;$i++)
	{
		$q_no=$i;
		$question=$all_questions[$i-1];
		mysql_query("INSERT INTO exam_questions VALUES('$exam_id','$q_no','$question') ") or die(mysql_error());
	}

	// Answers
	$all_answers=explode('~',$ans);
	for($i=1;$i<=$noq;$i++)
	{
		$q_no=$i;
		$each_answer=$all_answers[$i-1];
		mysql_query("INSERT INTO exam_real_answers VALUES('$exam_id','$q_no','$each_answer') ") or die(mysql_error());
	}

	

	//options


	$all_options_list = explode('@',$opts);

	for($p=1;$p<=$noq;$p++)
		{
		$each=$all_options_list[$p-1];
		$tmp=explode('~',$each);
		$qno=$p;
		for($l=1;$l<sizeof($tmp);$l++)
			{
			$an=$tmp[$l-1];
			mysql_query("INSERT INTO exam_question_options VALUES ('$exam_id','$qno','$an')") or die(mysql_error());
			}


		}


}
else
	echo "You are in wrong path";

?>