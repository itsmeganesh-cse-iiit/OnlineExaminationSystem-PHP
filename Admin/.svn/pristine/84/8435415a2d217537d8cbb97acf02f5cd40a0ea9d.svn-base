<?php
session_start();
include '../config/dbconnect.php';

?>
 <script type="text/javascript" src="../js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jquery.tokenize.css" />

<?php
	$staff = mysql_query("SELECT firstname,lastname,staff_id FROM exam_staff") or die(mysql_error());
	$exams = mysql_query("SELECT * FROM exams_available") or die(mysql_error());

?>
<Center><h2>Assosiate Staff to Exams</h2></center><br><br><br>

<div id="asediv_status">
</div>
<br>


<div class="row" id="studiv">
                <div class="col-lg-6 col-md-6" style='padding-left:10%;'>
                    <label>Select Exams</label><br>
					<select id="tokenize2" multiple="multiple" class="tokenize-sample">
					
					<?php
				
					while($each_exam = mysql_fetch_array($exams))
					{
					?>

					<option value="<?php echo $each_exam['examid']; ?>"><?php echo $each_exam['subject_name']; ?></option>
				
					<?php
					}
					?>
					</select>

					

					</select>

                </div>
                <div class="col-lg-6 col-md-6 " style='padding-left:10%;'>
					<label>Select Staff</label><br>
                    <select id="tokenize" multiple="multiple" class="tokenize-sample" newElements="false">
				
					<?php
				
					while($each_staff = mysql_fetch_array($staff))
					{
					?>

					<option value="<?php echo $each_staff['staff_id'];?>"><?php  echo $each_staff["firstname"]." ".$each_staff["lastname"];?></option>
					

					<?php
					}
					?>
					</select>
                </div>
              
             
</div>


<div class="row" id="btdiv">
	<div class="col-lg-12 col-md-6">
	<br>
	<center><button onclick="getthis()" class='btn btn-primary'>Click to Add</button></center>
	</div>

</div>

 <script>
function getthis()
{
	var staff_array=$('#tokenize').tokenize().toArray();
	var staff_exams_array=$('#tokenize2').tokenize().toArray();

	$.post("backlink_StaffAE.php?staff="+staff_array+"&exams="+staff_exams_array,function(da){
	$("#asediv_status").html(da);
	$("#studiv").hide();
	$("#btdiv").hide();

	});

}

 </script>

<script type="text/javascript">
$(document).ready(function(){
$('#tokenize').tokenize();
$('#tokenize2').tokenize();

});
    
	
</script>
