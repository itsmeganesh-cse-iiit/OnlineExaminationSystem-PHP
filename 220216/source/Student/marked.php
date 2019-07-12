<?php
session_start();
if(isset($_REQUEST['qno']))
{
@$qno=htmlspecialchars(mysql_real_escape_string($_REQUEST['qno']));
$val=$_SESSION['marked_qsts'][$qno];
$str="";
$all_marked_qsts="";
$noq=$_SESSION['noq'];
$db_question=$_SESSION['db_qst_no'];
$_SESSION['qst-dbqst'][$qno]=$db_question;
if($val=="yes"){
	$_SESSION['marked_qsts'][$qno]="no";
	$_SESSION['marked_count']=$_SESSION['marked_count']-1;

	for($i=0;$i<=$noq;$i++)
	{
		if($_SESSION['marked_qsts'][$i]=="yes")
		{

			$all_marked_qsts=$all_marked_qsts.$i."@".$_SESSION['qst-dbqst'][$i]."-";
		}
	}
	$str=$str.$_SESSION['marked_qsts'][$qno]."~".$_SESSION['marked_count']."~".$all_marked_qsts;
	echo $str;
}
else if($val=="no"){
	$_SESSION['marked_qsts'][$qno]="yes";
	$_SESSION['marked_count']=$_SESSION['marked_count']+1;
	for($i=0;$i<=$noq;$i++)
	{
		if($_SESSION['marked_qsts'][$i]=="yes"){
			$all_marked_qsts=$all_marked_qsts.$i."@".$_SESSION['qst-dbqst'][$i]."-";
		}
	}
	$str=$str.$_SESSION['marked_qsts'][$qno]."~".$_SESSION['marked_count']."~".$all_marked_qsts;
	echo $str;
}
else
{
	// do nothing
}
}
if(isset($_REQUEST['count']))
{
	echo $_SESSION['marked_count'];
}
?>