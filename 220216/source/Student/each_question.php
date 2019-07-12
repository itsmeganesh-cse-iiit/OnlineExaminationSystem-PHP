<?php
session_start();
$user=$_SESSION['logged_user'];
include '../../config/dbconnect.php';
if(isset($_REQUEST['type']))
{
$noq=$_SESSION['noq'];
@$type=htmlspecialchars(mysql_real_escape_string($_REQUEST['type']));
$ans=htmlspecialchars(mysql_real_escape_string($_REQUEST['ans']));

if($type=="next"){
	if($noq>=$_SESSION['qst_count'])
		$_SESSION['qst_count']=$_SESSION['qst_count']+1;
}
else if($type=="previous"){
	if(1<=$_SESSION['qst_count'])
		$_SESSION['qst_count']=$_SESSION['qst_count']-1;
}
$tmp=$_SESSION['qst_count'];
@$val=$_SESSION['marked_qsts'][$tmp];
$mark_flag="no";
if($val=="yes")
	$mark_flag="yes";
else if($val=="no")
	$mark_flag="no";
else
{
	// do nothing
}
$db_qst_no=$_SESSION['db_qst_no'];
@$question_num=$_SESSION['user_questions'][$tmp-1];
$exam_code=$_SESSION['exam_code'];


// submit answer

$k = mysql_query("SELECT * FROM student_tmp_answers WHERE ques_no='$db_qst_no' and student_id='$user' and exam_code='$exam_code'") or die(mysql_error());
$ip=$_SERVER['REMOTE_ADDR'];
$num = mysql_num_rows($k);
if($num==0)
{
	mysql_query("INSERT INTO student_tmp_answers VALUES('$user','$exam_code','$db_qst_no','$ans',CURRENT_TIMESTAMP,'$ip')") or die(mysql_error());
}
else
{
	mysql_query("UPDATE student_tmp_answers SET ans='$ans'  WHERE ques_no='$db_qst_no' and student_id='$user' and exam_code='$exam_code' ") or die(mysql_error());
}
// process end


$total_string="";
if($tmp<=$noq && $tmp>=1)
{
$qst = mysql_query("SELECT * FROM exam_questions WHERE exam_code='$exam_code' AND ques_no='$question_num'") or die(mysql_error());
$qst_data = mysql_fetch_array($qst);
$options=array();
$one=$qst_data['option_a'];
$two=$qst_data['option_b'];
$three=$qst_data['option_c'];
$four=$qst_data['option_d'];
$db_qst_no=$qst_data['ques_no'];
$_SESSION['db_qst_no']=$db_qst_no;
array_push($options, $one);
array_push($options, $two);
array_push($options, $three);
array_push($options, $four);
shuffle($options);

$db_ans=mysql_query("SELECT ans from student_tmp_answers WHERE exam_code='$exam_code' and student_id='$user' and ques_no='$db_qst_no'") or die(mysql_error());
$db_ans_arr = mysql_fetch_array($db_ans);

$total_string=$total_string.$tmp."~";
$total_string=$total_string.$qst_data['question']."~";

$opt_str=$options[0]."-".$options[1]."-".$options[2]."-".$options[3]."~";
$total_string=$total_string.$opt_str.$db_qst_no."~".$mark_flag."~".$db_ans_arr['ans'];


echo $total_string;
}
else
{
	if($tmp==1 || $tmp<=1)
		{
			echo "previous";
		}
	else 
		echo "over";
}
}
else
exit;
?>