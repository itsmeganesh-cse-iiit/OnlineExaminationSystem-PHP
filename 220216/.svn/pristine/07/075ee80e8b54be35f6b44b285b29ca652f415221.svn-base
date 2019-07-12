<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['sub']))
{
	$sub = htmlspecialchars(mysql_real_escape_string($_REQUEST['sub']));
	$msg=htmlspecialchars(mysql_real_escape_string($_REQUEST['msg']));
	$po_by=htmlspecialchars(mysql_real_escape_string($_REQUEST['po_by']));
	$msg_to=htmlspecialchars(mysql_real_escape_string($_REQUEST['msg_to']));
	$ip=$_SERVER["REMOTE_ADDR"];

	
	$k=mysql_query("INSERT INTO exam_updates VALUES('','$sub','$msg','$po_by','$msg_to','$ip',CURRENT_TIMESTAMP)") or die(mysql_error());

	if($k)
		echo "<center><div class='alert alert-success'style='width:300px;20px;'><h5>Notification Posted Successfully.<h5></div></center>";
	else
		echo "<center><div class='alert alert-success' style='width:300px;20px;'><h5>Notification Post Fail.<h5></div></center>";


}


else
{
	echo "You are in wrong path";
}

?>