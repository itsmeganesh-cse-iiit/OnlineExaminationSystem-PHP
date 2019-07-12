<?php 
session_start();
include '../../config/dbconnect.php';
$email=$_SESSION['logged_user'];		
$password = mysql_query("SELECT password FROM exam_users WHERE email='$email'") or die(mysql_error());

while($row=mysql_fetch_array($password))
{
?>

<center><h3> CHANGE PASSWORD</h3></center>
<script>
var validatepassword = function(epwd) {
    var pwd=$("#profile_new_password").val();
    if(epwd==pwd)
	    return true;
	else
		return false;
		    
}

function profile_password_validate()
{
	 var value = $("#profile_confirm_password").val();
     var pwdvalid = validatepassword(value);
     if(pwdvalid){
	     $("#profile_confirm_password").css({'color':'','border-color':'#d9d9d9'});
	     $("#profile_new_password").css({'color':'','border-color':'#d9d9d9'});
     }
	 else
	 {
		 $("#profile_confirm_password").css({'color':'red','border-color':'red'});
		 $("#profile_new_password").css({'color':'red','border-color':'red'});
	 }
		 
}






</script>
<form method=post action="" onsubmit="return change_password()">
<div id=confirm_password_div ></div>
<table width=20% style="" align=center >



<tr><td>

<label>Old Password</label>
                        <div class="input-control password full-size" data-role="input">
                
		                <span class="mif-key prepend-icon"></span>
		                <input type="password" id=profile_old_password name=profile_old_password ">
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div></td></tr>
<tr><td>
<label>New Password</label>

                        <div class="input-control password full-size" data-role="input">
                
		                <span class="mif-key prepend-icon"></span>
		                <input type="password" id=profile_new_password name=profile_new_password >
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
</td></tr>
<tr><td>
<label>Confirm Password</label>

                        <div class="input-control password full-size" data-role="input">
                
		                <span class="mif-key prepend-icon"></span>
		                <input type="password" id=profile_confirm_password name=profile_confirm_password onkeyup="profile_password_validate()">
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
</td></tr>
<tr><td colspan=3><center><br><br>
<input type=submit value=Submit class="button primary text-primary">&nbsp;&nbsp;&nbsp;
</center>

</td></tr>
</table>
</form>
<?php 
}
?>
