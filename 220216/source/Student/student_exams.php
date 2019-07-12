
	<?php
session_start();
include '../../config/dbconnect.php';
$today_date=date('d-m-Y');
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
{
	$today_time=date('H:i:s');
	$today_hour=date('H');
	$today_minute=date('i');
	$today_second=date('s');
}
$user=$_SESSION['logged_user'];
$exams_check = mysql_query("SELECT subject_name,timelimit,exam_code,display_time,noq from exams_available WHERE display_date='$today_date'") or die(mysql_error());
$num_exams=mysql_num_rows($exams_check);
if($num_exams==0)
{
	echo "<br><br><center><font color=red>No exams to Display</font></center>";
	
}
else 
{
	
	?>
		<center>
			<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" style="width:80%">
                        <thead>
                        <tr>
                          
                            <td class="sortable-column sort-asc" width="100px"><center>Sno</center></td>
                            <td class="sortable-column"><center>Exam Name</center></td>
                         	<td class="sortable-column" width=100px><center>Time Limit</center></td>
                            <td width=100px><center>Status</center></td>
                            <td width=150px><center>STARTS AT</center></td>
                        </tr>
                        </thead>
                        
                        <tbody>
		<?php 
		$i=1;
		while($examslist=mysql_fetch_array($exams_check))
		{
			
		?>
	
	
                        <tr>
                        
                            <?php
                            	$e_code =$examslist['exam_code'];
                            	$check_user_exam = mysql_query("SELECT * FROM student_exam_flags WHERE exam_code='$e_code' and student_id='$user' and flag=1") or die(mysql_error());
                            	$exam_stat = mysql_num_rows($check_user_exam);
                            ?>
                            <td><?php echo $i; $i++;?></td>
                            <td><?php echo $examslist['subject_name'];?></td>
                             <td><?php echo $examslist['timelimit'];?></td>
                            
                            <td class="align-center">

                            <?php
                            if($exam_stat!=0)
                            {
                            	echo " <span class='mif-checkmark fg-green'></span>";
                            }
                            else
                            {
                            	echo " <span class='mif-cross fg-red'></span>";
                            }
                            ?>
                           

                            </td>
                            <td>
                            <?php 
                          if(strtotime($examslist['display_time'])<=time())
                            {
                            
                            ?>
                            <?php
                            	
                            	
                            	if($exam_stat!=0)
                            	{
?>
<center>
<button class="button" disabled onclick="alert('Exam Finished')" >
		    								 Finished
										</button>
										</center> 
<?php
                            	}	
                            	else
                            		{
                            	?>
                            	<center>
                                 <button class="button success rounded" onclick="exam_start_check('<?php echo $examslist['exam_code'];?>','<?php echo $examslist['noq']?>')" >
		    								 Start
										</button>
										</center> 
										<?php 
                            }}
										else{
											echo "<center><b>".$examslist['display_time']."</b></center>";
										}
										?>
										
                            </td>
                        </tr>
                        
             

 <?php 
		}
		?>
		    </table>
		<?php 
	}
 ?>
 
 