<div id="exam_display_div">

<?php
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['exam_code']))
{
$user = $_SESSION['logged_user'];
$exam_code=htmlspecialchars(mysql_real_escape_string($_REQUEST['exam_code']));
$_SESSION['exam_code']=$exam_code;
$noq=htmlspecialchars(mysql_real_escape_string($_REQUEST['noq']));;
$_SESSION['noq']=$noq;
$exam_details=mysql_query("SELECT subject_name,year,branch,sem FROM exams_available WHERE exam_code='$exam_code'") or die(mysql_error());
$exam_details_arr=mysql_fetch_array($exam_details);
$total_ques=mysql_query("SELECT * FROM exam_questions WHERE exam_code='$exam_code'") or die(mysql_error());
$num_total_ques = mysql_num_rows($total_ques);
$user_questions=range(1,$num_total_ques);
shuffle($user_questions);
$user_questions=array_slice($user_questions,0,($noq));;
$_SESSION['user_questions']=$user_questions;
$_SESSION['qst_count']=1;
$_SESSION['marked_qsts']=array();
$_SESSION['marked_count']=0;
$_SESSION['qst-dbqst']=array();
for($i=0;$i<=$noq;$i++)
{
	$_SESSION['marked_qsts'][$i]="no";
}
for($j=0;$j<=$noq;$j++)
{
	$_SESSION['qst-dbqst'][$j]="";
}
?>



<br> 
<div id="submit_div" style="float: right;padding-right:18%;">

<button class='button success loading-pulse' onclick="submit_stu_exam()">Submit Exam</button>

</div>
<table width="100%"><tr><td>
<table border=0 cellpadding="10px" cellspacing="2px" width="100%;">
<tr style="background-color:#4da6ff;color:white;">
	<td>&nbsp;&nbsp;&nbsp;Questions <b><span id="qno_head"><?php echo $_SESSION['qst_count'];?></span></b> of <?php echo $noq;?></td>
	
	<td><center>Marked Questions  <b><span id="mark_head">0</span></b> of <?php echo $noq;?> </center></td>

	<td>Time Remaining : 00:00:00</td>
</tr>
</table>
</CENTER>
<br><br>
<table border=0 style="margin-left: 100px;">
<tr><td><b>
<div id="qno">
<?php
echo "(  ".$_SESSION['qst_count']."  )";
?>
</div>
</b></td><Td> 
<div id="question_div">
<?php
$tmp=$_SESSION['qst_count'];
$qst_num=$_SESSION['user_questions'][$tmp-1];
$question=mysql_query("SELECT * FROM exam_questions WHERE exam_code='$exam_code' and ques_no='$qst_num '") or die(mysql_error());
$question_data = mysql_fetch_array($question);
echo $question_data['question'];
$options=array();
$one=$question_data['option_a'];
$two=$question_data['option_b'];
$three=$question_data['option_c'];
$four=$question_data['option_d'];
$db_qst_no=$question_data['ques_no'];
$_SESSION['db_qst_no']=$db_qst_no;
array_push($options, $one);
array_push($options, $two);
array_push($options, $three);
array_push($options, $four);
shuffle($options);
?>
</div>
</Td></tr>
</table>
<br>
<div id="options_div">
<table style="margin-left:100px;">

	<?php 

	$k=mysql_query("SELECT ans from student_tmp_answers WHERE exam_code='$exam_code' and student_id='$user' and ques_no='$db_qst_no'") or die(mysql_error());
	$k_arr = mysql_fetch_array($k);
	?>
	<tr><td><input type=radio value="<?php echo $options[0];?>" name="<?php echo 'qst'.$db_qst_no;?>" <?php if($k_arr['ans']==$options[0]) echo "checked";?> ></td><td>a)</td><td><?php echo $options[0];?></td></tr>
	<tr><td><input type=radio value="<?php echo $options[1];?>" name="<?php echo 'qst'.$db_qst_no;?>" <?php if($k_arr['ans']==$options[1]) echo "checked";?> ></td><td>b)</td><td><?php echo $options[1];?></td></tr>
	<tr><td><input type=radio value="<?php echo $options[2];?>" name="<?php echo 'qst'.$db_qst_no;?>" <?php if($k_arr['ans']==$options[2]) echo "checked";?> ></td><td>c)</td><td><?php echo $options[2];?></td></tr>
	<tr><td><input type=radio value="<?php echo $options[3];?>" name="<?php echo 'qst'.$db_qst_no;?>" <?php if($k_arr['ans']==$options[3]) echo "checked";?> ></td><td>d)</td><td><?php echo $options[3];?></td></tr>
</table>
</div>

<br><Br><br><br><br><br>
<table border=0 width="70%" >
<tr><td><center>
<div id="pre_div">
<button class="button" disabled>Previous</button>
</div>

</center></td><td style="padding-right: 30px;"></td><td>
<div id="next_div">
<button class="button primary" onclick="each_question('next','<?php echo $db_qst_no;?>')" >Next</button>
</div>

</td><td style="padding-left: 50px;"></td><td>
<div id="marked_div">
<button class='button' onclick="check_marked('<?php echo $_SESSION['qst_count'];?>')" id="mark">Mark</button>
</div>
</td></tr>
</table>


</td><td style="margin-top:0px;">
<table class="table  cell-hovered border bordered" style="width:300px;border-radius: 10px;">
<tr><th>Suject</th><Td><?php echo $exam_details_arr['subject_name'];?></Td></tr>
<tr><th>Semester</th><Td><?php echo $exam_details_arr['sem'];?></Td></tr>
<tr><th>Branch</th><Td><?php echo $exam_details_arr['branch'];?></Td></tr>
<tr><th>Year</th><Td><?php echo $exam_details_arr['year'];?></Td></tr>
</table>
Marked Questions :<br><br>
<div id="marked_questions_area" style='border-radius:10px;width:300px;border:1px solid black;height:130px;overflow:scroll-y;'>
</div>
</td></tr></table>

<br><br><br>



<?php 
}
else 
	exit;
?>

</div>
</div>