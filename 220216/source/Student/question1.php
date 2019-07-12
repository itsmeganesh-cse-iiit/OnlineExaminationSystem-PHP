<?php 
session_start();
include '../../config/dbconnect.php';
$exam_id=mysql_query("SELECT * FROM exams_available") or die(mysql_error());
$questions=mysql_query("SELECT * FROM exam_questions LIMIT 1") or die(mysql_error());
$options=mysql_query("SELECT * FROM exam_question_options LIMIT 1,5") or die(mysql_error());
while($row=mysql_fetch_array($questions))
{
?>
<label ><font color=black></font><?php echo $row['question'];?></label><Br>

<?php
}
while($row2=mysql_fetch_array($options))
{
?>
<input type=radio name="radio">
<label ><font color=black></font><?php echo $row2['qoptions'];?></label><Br>	

<?php 
}
?>








