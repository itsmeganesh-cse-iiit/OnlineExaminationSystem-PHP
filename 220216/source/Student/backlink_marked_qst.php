<?php
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['qno']))
{
$user=$_SESSION['logged_user'];
$exam_code=$_SESSION['exam_code'];
@$qno = htmlspecialchars(mysql_real_escape_string($_REQUEST['qno']));
@$dbno = htmlspecialchars(mysql_real_escape_string($_REQUEST['dqno']));

$marked_qst = mysql_query("SELECT * FROM exam_questions WHERE exam_code='$exam_code' and ques_no='$dbno'") or die(mysql_error());
$qst_data = mysql_fetch_array($marked_qst);



$tmp=$qno;
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
$total_string="";
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

$total_string=$total_string.$qno."~";
$total_string=$total_string.$qst_data['question']."~";

$opt_str=$options[0]."-".$options[1]."-".$options[2]."-".$options[3]."~";
$total_string=$total_string.$opt_str.$db_qst_no."~".$mark_flag."~".$db_ans_arr['ans'];
$_SESSION['qst_count']=$qno;

echo $total_string;

}
else
exit;
?>