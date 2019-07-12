<script>
function register_validate()
{
	var firstname = $("#profile_firstname").val();
	var lastname = $("#profile_lastname").val();
	var email = $("#profile_email").val();
	var mobile =$("#profile_mobile").val();
	var branch = $("#profile_branch").val();
	var regclass = $("#profile_class").val();
	var password =$("#profile_password").val();
	var confirm_password = $("#profile_confirm_password").val();
	var year = $("#profile_year").val();
	var dob = $("#profile_dob").val();
	var security_question = $("#profile_security_question").val();
	var security_answer =$("#profile_answer").val();
	var gender =$('input[name=profile_gender]:checked', '#regform').val()
	var address =$("#profile_address").val();
	if(firstname==false || gender==false || lastname==false || email==false || address==false || dob==false || mobile==false || branch==false || regclass==false || password==false || confirm_password==false || year==false ||  security_question==false || security_answer==false)
	{
	alert("Fill required fileds");
	}
	else
	{
		if(password==confirm_password)
		{
			
			$.post("add_student_process.php?fname="+firstname+"&lname="+lastname+"&email="+email+"&mobile="+mobile+"&dob="+dob+"&branch="+branch+"&class="+regclass+"&password="+password+"&year="+year+"&sq="+security_question+"&sqa="+security_answer+"&gender="+gender+"&address="+address,function(data){
				$("#prof_status").html(data);
				
				
				});
		}
		else
		{
			alert("Password and Confirm must be same");
			}
		return false;
	}

		return false;
	
}

var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}


function email_validate()
{
    var value = $("#profile_email").val();
    var valid = validateEmail(value);
	
    if (!valid) {


        $("#profile_email").css({'color':'red','border-color':'red'});

    } else {


        $("#profile_email").css({'color':'#000','border-color':'#d9d9d9'});

    }
}

var validatepassword = function(epwd) {
    var pwd=$("#profile_password").val();
    if(epwd==pwd)
	    return true;
	else
		return false;
		    
}

function password_validate()
{
	 var value = $("#profile_confirm_password").val();
     var pwdvalid = validatepassword(value);
     if(pwdvalid){
	     $("#profile_confirm_password").css({'color':'','border-color':'#d9d9d9'});
	     $("#profile_password").css({'color':'','border-color':'#d9d9d9'});
     }
	 else
	 {
		 $("#profile_confirm_password").css({'color':'red','border-color':'red'});
		 $("#profile_password").css({'color':'red','border-color':'red'});
	 }
		 
}

</script>
<form method=post action="" onsubmit="return register_validate()">
<center><h2>ADD A STUDENT</h2></center>
<br><br>

<table  width=30% style="" align=center>

<tr><td>
First Name
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input class="form-control" id="profile_firstname" type="text" value="" >
    
</div>

</td>
<td style="width:100px;"></td>
<td>
Last Name
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input class="form-control" id="profile_lastname" type="text" value="">
</div>

</td></tr>

<tr><td colspan=3>
Email<br>
<span class="mif-mail prepend-icon"></span>
                
                <input type="text" id=profile_email class="form-control" name=profile_email onKeyup="email_validate()" style="width:450px;">
</td></tr>

<tr><td>
Mobile
<div class="input-control text full-size">
    <span class="mif-mobile prepend-icon"></span><input class="form-control" id="profile_mobile" type="text" value="">
</div>

</td>
<td style="width:100px;"></td>
<td>
Date of Birth
                        <div class="input-control text full-size" >
					   <input type="text" id="profile_dob" value="" class="form-control">
					    

</td></tr>
<tr><td>
Branch
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_branch" type="text" value="" class="form-control">
</div>
</td>
<td style="width:100px;"></td>
<td>
Class
<div class="input-control text full-size">
    <span class="mif-user prepend-icon"></span><input id="profile_class" type="text" value="" class="form-control">
</div>

</td></tr>
<tr><td>
Gender&nbsp;&nbsp;
<input type=radio name="radio">&nbsp;<label >M</label>
&nbsp;&nbsp;
<input type=radio name="radio"><label >F</label>

</td>
<td style="width:100px;"></td>
<td>
Year
                       
                        
                        <div class="input-control select full-size" >
                          
						   <select id=profile_year name=profile_year style="width:175px;" class="form-control">
						   		<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
						        <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I</option>
						        <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II</option>
						        <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III</option>
						        <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV</option>
						        <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V</option>
						        <option value="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI</option>
						    </select>
						</div>

</td></tr>
<tr><td>
Password
<div class="input-control text full-size">
    <span class="mif-key prepend-icon"></span>
		                <input type="password" id=profile_password name=profile_password class="form-control">
		                
    
</div>

</td>
<td style="width:100px;"></td>
<td>
Confirm Password
<div class="input-control text full-size">
    <span class="mif-key prepend-icon"></span>
		                <input type="password" id=profile_confirm_password name=profile_confirm_password onkeyup="password_validate()" class="form-control">
		                </div>

</td></tr>


<tr><td colspan=3>
Address<br>
<div>
<textarea cols=80 rows=6 id=profile_address name=profile_address style="border:1px solid d9d9d9;width:450px;height:80px;" value="" class="form-control"></textarea></div>
</td></tr>
<tr><td colspan=3>
Security Question       
                <div class="input-control select full-size">
			   <span class="mif-question prepend-icon"></span>
			   
			   <select id=profile_security_question name=profile_security_question style="width:450px;" class="form-control">
			   		<option value=0>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Question</option>
			        <option value=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of your first School?</option>
			        <option value=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Childhood Nick name</option>
			        <option value=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Favourite Book</option>
			    </select>
			</div>
</td></tr>
<tr><td colspan=3>Answer
                <div>
<input type=password id=profile_answer name=profile_answer style="border:1px solid d9d9d9;width:450px;height:80px;" value="" class="form-control"></div>
</td></tr>

<tr><td colspan=3><center><br><br>
<input type=submit class="btn btn-success" style="background-color:green;color:white;" value="Submit"  ></center>
</td></tr>
<div id="prof_status"></div>
		
</form>
</table>