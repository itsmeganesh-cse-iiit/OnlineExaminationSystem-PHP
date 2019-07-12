<form method=post action="" onsubmit="return profile_validate()" id=edited_form >
<?php 
session_start();
include '../../config/dbconnect.php';
$email=$_SESSION['logged_user'];

$updates = mysql_query("SELECT * FROM exam_users WHERE email='$email'") or die(mysql_error());

while($row=mysql_fetch_array($updates))
{
?>

<center><h2>PROFILE</h2></center>


<table  width=30% style="" align=center>

<tr><td>
<label>First Name</label>
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_firstname" type="text" value="<?php echo $row['firstname'];?>">
    
</div>

</td>
<td style="width:20px;"></td>
<td>
<label>Last Name</label>
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_lastname" type="text" value="<?php echo $row['lastname'];?>">
</div>

</td></tr>

<tr><td>
<label>Mobile</label>
<div class="input-control text full-size">
    <span class="mif-mobile prepend-icon"></span><input id="profile_mobile" type="text" value="<?php echo $row['mobile'];?>">
</div>

</td>
<td style="width:20px;"></td>
<td>
<label>Date of Birth</label>
                        <div class="input-control text full-size" data-role="datepicker">
					   <input type="text" id="profile_dob" value="<?php echo $row['dob'];?>">
					    <button class="button"><span class="mif-calendar"></span></button>

</td></tr>
<tr><td>
<label>Branch</label>
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_branch" type="text" value="<?php echo $row['branch'];?>">
</div>

</td>
<td style="width:20px;"></td>
<td>
<label>Class</label>
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_class" type="text" value="<?php echo $row['class'];?>">
</div>

</td></tr>
<tr>
<td colspan=3>
<label>Year</label>
                       
                        
                        <div class="input-control select full-size">
                         
						   <select id=profile_year name=profile_year>
						   		<option value="<?php 
						   		
						   		if( $row['year']=="1")
						   			echo  "I";
					   			else if( $row['year']=="2")
					   				echo  "II";
				   				else if( $row['year']=="3")
				   					echo  "III";
				   				else if( $row['year']=="4")
				   					echo  "IV";
			   					else if( $row['year']=="5")
			   						echo  "V";
		   						else
		   							echo  "VI";
	   							
						   		?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
						   		if( $row['year']=="1")
						   			echo  "I";
					   			else if( $row['year']=="2")
					   				echo  "II";
				   				else if( $row['year']=="3")
				   					echo  "III";
			   					else if( $row['year']=="4")
			   						echo  "IV";
		   						else if( $row['year']=="5")
		   							echo  "V";
	   							else
	   								echo  "VI";
						   		
						   		
						   		?></option>
						        <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I</option>
						        <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II</option>
						        <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III</option>
						        <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV</option>
						        <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V</option>
						        <option value="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI</option>
						    </select>
						</div>
</td></tr>
<tr><td colspan=3>
<label>Address</label><br>
<div>
<textarea cols=80 rows=6 id=profile_address name=profile_address style="border:1px solid d9d9d9;" value="<?php echo $row['address'];?>"><?php echo $row['address'];?></textarea></div>
</td></tr>
<tr><td colspan=3><center><br><br>
<input type=submit class="button success block-shadow-success text-shadow loading-pulse" value="Submit"  ></center>
</td></tr>		
</form>
</table>
<Br>
<div id="prof_status"></div>

<?php 
}
?> 


