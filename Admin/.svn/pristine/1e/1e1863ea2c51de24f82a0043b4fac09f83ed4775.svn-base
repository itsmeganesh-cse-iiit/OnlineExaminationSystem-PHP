<?php
session_start();
include '../config/dbconnect.php';

?>
 <script type="text/javascript" src="../js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jquery.tokenize.css" />

<?php
	$students = mysql_query("SELECT firstname,lastname,email FROM exam_users") or die(mysql_error());
	$exams = mysql_query("SELECT * FROM exams_available") or die(mysql_error());

?>
<Br>>
<Center><h2>Ban Students</h2></center><br><br>
<div id="asediv_status">
</div>
<br>


<div class="row" id="studiv">
                <div class="col-lg-3 col-md-6" style='padding-left:10%;'>
                 
                </div>
                <div class="col-lg-4 col-md-6 " style='padding-left:10%;'>
					<label>Select Students</label><br>
                    <select id="tokenize" multiple="multiple" class="tokenize-sample" newElements="false">
				
					<?php
				
					while($each_student = mysql_fetch_array($students))
					{
					?>

					<option value="<?php echo $each_student['email'];?>"><?php echo $each_student['firstname']." ",$each_student['lastname']; ?></option>
					

					<?php
					}
					?>
					</select>

                </div>
              
             
</div>


<div class="row" id="btdiv">
	<div class="col-lg-12 col-md-6">
	<br>
	<center><button onclick="getthis()" class='btn btn-primary'>Ban</button></center>
	</div>

</div>

 <script>
function getthis()
{
	var students_array=$('#tokenize').tokenize().toArray();
	

	$.post("backlink_ban_student.php?stu="+students_array,function(da){
	$("#asediv_status").html(da);
	$("#studiv").hide();
	$("#btdiv").hide();

	});

}

 </script>

<script type="text/javascript">
$(document).ready(function(){
$('#tokenize').tokenize();
});
    
	
</script>
