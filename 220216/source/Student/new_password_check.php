<script>
var validateEmail = function(elementValue) {
	    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	    return emailPattern.test(elementValue);
	}

	function email_validate()
	{
        var value = $("#register_email").val();
        var valid = validateEmail(value);
		
        if (!valid) {


            $("#register_email").css({'color':'red','border-color':'red'});

        } else {


            $("#register_email").css({'color':'#000','border-color':'#d9d9d9'});

        }
	}

var validatepassword = function(epwd) {
		    var pwd=$("#register_password").val();
		    if(epwd==pwd)
			    return true;
			else
				return false;
				    
		}

		function password_validate()
		{
			 var value = $("#register_confirm_password").val();
		     var pwdvalid = validatepassword(value);
		     if(pwdvalid){
			     $("#register_confirm_password").css({'color':'','border-color':'#d9d9d9'});
			     $("#register_password").css({'color':'','border-color':'#d9d9d9'});
		     }
			 else
			 {
				 $("#register_confirm_password").css({'color':'red','border-color':'red'});
				 $("#register_password").css({'color':'red','border-color':'red'});
			 }
				 
		}

function pwd_validate(email)
{
	var pwd=$("#register_password").val();
	var cpwd=$("#register_confirm_password").val();
	if(pwd==false || cpwd==false)
		alert("Fill required Fields");
	else
	{
		if(pwd!=cpwd)
			alert("pasword and confirm password must be same");
		else
		{
			$.post("backlink_forgot_password.php?email="+email+"&password="+pwd,function(pwd_data){
			$("#status").html(pwd_data);
			});
		}
	}
	return false;
}
</script>

<?php 
session_start();
include '../../config/dbconnect.php';
if(isset($_REQUEST['email']))
{

	$email=htmlspecialchars(mysql_real_escape_string($_REQUEST['email']));
	$security_question=htmlspecialchars(mysql_real_escape_string($_REQUEST['sq']));
	$security_answer=htmlspecialchars(mysql_real_escape_string($_REQUEST['sqa']));
	$email_check=mysql_query("SELECT email FROM exam_users WHERE email='$email'") or die(mysql_error());
	$email_check_arr=mysql_fetch_array($email_check);
	$sq_check=mysql_query("SELECT securityques FROM exam_users WHERE email='$email'") or die(mysql_error());
	$sq_check_arr=mysql_fetch_array($sq_check);
	$sqa_check=mysql_query("SELECT securityans FROM exam_users WHERE email='$email'") or die(mysql_error());
	$sqa_check_arr=mysql_fetch_array($sqa_check);
	if($email_check_arr['email']==$email && $sq_check_arr['securityques']==$security_question && $sqa_check_arr['securityans']==$security_answer)
	{
		echo " <body><body background='../../images/back.jpg'><br><br><br><br><br><br><br><br><br><br><br><br><br><div style='padding-top:0%;margin-left:30%;' >
				<div class='padding20 block-shadow' id='registerform' style='width:50%;background-color:white;border-radius:25px;'>
				<form method=post action='' onsubmit=\"return pwd_validate('".$email."')\" id=regform>
					<h1 class='text-light'>Forgot Password</h1>
					<hr class='thin'/>
					<br />
					<div class='grid'>
					<div class='row cells2'>
					<label>New Password</label>
                        <div class='input-control password full-size' data-role='input'>
                
		                <span class='mif-key prepend-icon'></span>
		                <input type='password' id=register_password name=register_password>
		                <button class='button helper-button reveal'><span class='mif-looks'></span></button>
                        </div>
					<label>Confirm Password</label>
                        <div class='input-control password full-size' data-role='input'>
                
		                <span class='mif-key prepend-icon'></span>
		                <input type='password' id=register_confirm_password name=register_confirm_password onkeyup='password_validate()'>
		                <button class='button helper-button reveal'><span class='mif-looks'></span></button>
                        </div>
						<center>
		                		                <input type=submit value=\"Submit\" class='button success' >
					</center>
				</div></div></form></div></div><br><br><br><br>
				<div id='status'></div>
				";
	}
	else
	{
		header("Location:forgot_password.php");
	}


}

?>