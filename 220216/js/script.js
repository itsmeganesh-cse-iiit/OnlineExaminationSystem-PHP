function login_validate()
{
	var username = $("#login_user_name").val();
	var password = $("#login_user_password").val();
	$("#login_status").html("");
	if(username==false || username==null || username=="")
			{
		    $("#login_status").html("");
			$( "#password_status" ).removeClass( "input-control text full-size error" ).addClass( "input-control text full-size" );	
			$("#login_status").html("<font color=red>Please Enter Username</font>");
			$( "#username_status" ).removeClass( "input-control text full-size" ).addClass( "input-control text full-size error" );

			}
	else if(password==false || password==null || password=="")
			{
		    $("#login_status").html("");
		    $( "#username_status" ).removeClass( "input-control text full-size error" ).addClass( "input-control text full-size" );
			$("#login_status").html("<font color=red>Please Enter Password</font>");
			$( "#password_status" ).removeClass( "input-control text full-size" ).addClass( "input-control text full-size error" );
			}
	else
		{
		$("#login_status").html("");
		$.post("student/login_check.php?uname="+username+"&pwd="+password,function(logindata){
			if(logindata==1)
				window.location.href="Student/user_page.php";
			else if(logindata==2)
				$("#login_status").html("<font color=red>You are Tempararly Banned !!</font>");
			else
				$("#login_status").html("<font color=red>Login Failed..</font>");
				
				
		});
		return false;
		}
	
	return false;
}


function register_validate()
{
	var firstname = $("#register_firstname").val();
	var lastname = $("#register_lastname").val();
	var email = $("#register_email").val();
	var mobile =$("#register_mobile").val();
	var branch = $("#register_branch").val();
	var regclass = $("#register_class").val();
	var college = $("#register_college").val();
	var university = $("#register_university").val();
	var password =$("#register_password").val();
	var confirm_password = $("#register_confirm_password").val();
	var year = $("#register_year").val();
	var dob = $("#register_dob").val();
	var security_question = $("#register_security_question").val();
	var security_answer =$("#register_security_answer").val();
	var gender =$('input[name=register_gender]:checked', '#regform').val()
	var address =$("#register_address").val();
	if(firstname==false || college==false || university==false || gender==false || lastname==false || email==false || address==false || dob==false || mobile==false || branch==false || regclass==false || password==false || confirm_password==false || year==false ||  security_question==false || security_answer==false)
			{
			alert("Fill required fileds");
			}
	else
		{
		if(password==confirm_password)
		{
		$.post("student/reg_process.php?fname="+firstname+"&lname="+lastname+"&email="+email+"&mobile="+mobile+"&dob="+dob+"&branch="+branch+"&class="+regclass+"&college="+college+"&university="+university+"&password="+password+"&year="+year+"&sq="+security_question+"&sqa="+security_answer+"&gender="+gender+"&address="+address,function(regdata){
			var ok=confirm(regdata);
			if(ok==true)
				{
				window.location.href='index.php';
				}
	
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

function profile_validate()
{

	var firstname = $("#profile_firstname").val();
	var lastname = $("#profile_lastname").val();
	var mobile =$("#profile_mobile").val();
	var branch = $("#profile_branch").val();
	var regclass = $("#profile_class").val();
	var year = $("#profile_year").val();
	var dob = $("#profile_dob").val();
	var address =$("#profile_address").val();
	
	if(firstname==false || lastname==false || address==false || dob==false || mobile==false || branch==false || regclass==false || year==false)
			{
			alert("Fill all fileds");
			return false;
			}
	else
		{
		
		$.post("profile_edit_process.php?fname="+firstname+"&lname="+lastname+"&mobile="+mobile+"&dob="+dob+"&branch="+branch+"&class="+regclass+"&year="+year+"&address="+address,function(edited_data){
			
			$("#prof_status").html(edited_data);
			
			});
	
		return false;
	
		}
}

function logout()
{
$.post("logout.php",function(){
	
	window.location.href="../index.php";
});	
}
function load(event)
{
    
$("#questions_div").html("<div data-role=preloader data-type=metro data-style=color style=margin-top:20% ></div>").load(event+".php");	
$("#q1").css({"background-color":"white"});
}

function load_this(event)
{
	$("#main_div").html("<div data-role=preloader data-type=metro data-style=color style=margin-top:20% ></div>").load(event+".php");
}


function feedback_validate()
{
	
	var feed_sub = $("#feedback_subject").val();
	var feed_msg = $("#feedback_msg").val();
	if(feed_sub == false || feed_msg==false)
			{
			
			alert("Fill required Fields");
						
			
			
			}
	else
		{
		$.post("feedback_db_connection.php?sub="+feed_sub+"&msg="+feed_msg,function(feeddata){
			$("#feedback_status").html(feeddata);
		});
		}
			
}

function showCharm(id){
    var  charm = $("#"+id+"-charm").data("charm");
   charm.open();
    
}

function charms_close()
{
	$("#top-charm").data("charm").close();
	$("#left-charm").data("charm").close();

}

function exam_start_check(exam_code,noq) {
    var person = confirm("Do you want to start exam now ?");
    
    if(person==true)
    {
    	$.post("exam_pattern.php?exam_code="+exam_code+"&noq="+noq,function(exam_data){
    		$("#main_div").html(exam_data);
    		showCharm('left');
    		showCharm('top');
    		
    	});
    }
    	
}

function change_password()
{
 
 var old_password=$("#profile_old_password").val();	
 var new_password=$("#profile_new_password").val();
 var confirm_password=$("#profile_confirm_password").val();
 if(old_password==false || new_password==false || confirm_password==false)
	 {
	 alert("Fill required fields" );
	 return false;
	 }
 else
	 {
	 if(new_password==confirm_password)
		 {
		 
		 $.post("password_change_process.php?old_pass="+old_password+"&new_pass="+new_password+"&confirm_pass="+confirm_password,function(change_data){
			 
			 $("#confirm_password_div").html(change_data);
		 });
		 return false;
		 }
	 else
		 {
		 alert("new passowrd and confirm password must be same");
		 return false;
		 }
	 
	 return false;
	 }
}



function submit_stu_exam()
{
	$.post("marked.php?count=yes",function(data){
		if(data==0)
		{
			// Submit Exam
			var ok = confirm("Want to Submit Exam ?");
			if(ok)
			{
				$.post("exam_submit.php",function(submit_data){

					$("#exam_display_div").html(submit_data);
				});
				
			}
		}
		else
		{
			var ok = confirm("    "+data+" Review Questions \n Want to Submit Exam ?");
			if(ok)
			{
					$.post("exam_submit.php",function(submit_data){

					$("#exam_display_div").html(submit_data);
				});
				
			}
		}

	});
}

function each_question(par,qno)
{
	ans=$("input[name=qst"+qno+"]:checked").val();
	$.post("each_question.php?type="+par+"&ans="+ans,function(nqdata){
		;
			var tmp_str=nqdata;
			if(tmp_str=="over")
			{
					$("#next_div").html("<button class='button' disabled>Next</button>");
					$("#submit_div").html("<button class='button success loading-pulse' onclick='submit_stu_exam()'>Submit Exam</button>");
			}
			else if(tmp_str=="previous")
			{
					$("#pre_div").html("<button class='button' disabled>Previous</button>");
					//$("#submit_div").html("");
			}
			else
			{
			
			$("#question_div").html("<center>Loading ....</center>");
			//$("#submit_div").html("");
			tmp_str=tmp_str.split("~");
			var opt_arr = tmp_str[2].split("-");
			$("#question_div").html(tmp_str[1]);
			$("#qno").html("(  "+tmp_str[0]+"  )");
			$("#qno_head").html(tmp_str[0]);
			var main_ans=tmp_str[5];
			all_opt_data="<table style='margin-left:100px;'><tr><td>";
			
			// option a
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[0]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[0]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>a)</td><td>"+opt_arr[0]+"</td></tr><tr><td>";

			//option b
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[1]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[1]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>b)</td><td>"+opt_arr[1]+"</td></tr><tr><td>";

			//option c
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[2]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[2]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>c)</td><td>"+opt_arr[2]+"</td></tr><tr><td>";

			//option d
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[3]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[3]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>d)</td><td>"+opt_arr[3]+"</td></tr></table>";



			$("#options_div").html(all_opt_data);

			$("#pre_div").html("<button class='button primary' onclick=\"each_question('previous','"+tmp_str[3]+"')\">Previous</button>");
			$("#next_div").html("<button class='button primary' onclick=\"each_question('next','"+tmp_str[3]+"')\">Next</button>");

			if(tmp_str[4]=="no")
				$("#marked_div").html("<button  id='mark' class='button' onclick=\"check_marked('"+tmp_str[0]+"')\">Mark</button>");
			else if(tmp_str[4]=="yes")
				$("#marked_div").html("<button id='mark' class='button warning' onclick=\"check_marked('"+tmp_str[0]+"')\">Mark</button>");
		}

	});
}
function check_marked(qno)
{

	$.post("marked.php?qno="+qno,function(mark_data){
		mark_data=mark_data.split("~");
		mrk_qst_arr= mark_data[2].split("-");
		mrk_qst_arr.pop();
		btn_array="";
		for (j=0;j<mrk_qst_arr.length;j++)
		{
			tmp_btn = mrk_qst_arr[j].split("@");
			btn_array=btn_array+"&nbsp;<button class='button warning mini-button cycle-button' onclick=\"marked_load('"+tmp_btn[0]+"','"+tmp_btn[1]+"')\"><font size='2'>"+tmp_btn[0]+"</font></button>";
		}
		if(mark_data[0]=="yes")
		{
			$("#mark").addClass("button warning");
			$("#mark_head").html(mark_data[1]);
			$("#marked_questions_area").html(btn_array);
		}
		else if(mark_data[0]=="no")
		{
			$("#mark").removeClass("button warning").addClass("button");
			$("#mark_head").html(mark_data[1]);
			$("#marked_questions_area").html(btn_array);
		}

	});
}

function exam_submit_load_this(event)
{
	$("#main_div").html("<div data-role=preloader data-type=metro data-style=color style=margin-top:20% ></div>").load(event+".php");
	charms_close();
}

function marked_load(qno,dqno)
{
$.post("backlink_marked_qst.php?qno="+qno+"&dqno="+dqno,function(mark_qst_data){
			tmp_str=mark_qst_data;
			$("#question_div").html("<center>Loading ....</center>");
			//$("#submit_div").html("");
			tmp_str=tmp_str.split("~");
			var opt_arr = tmp_str[2].split("-");
			$("#question_div").html(tmp_str[1]);
			$("#qno").html("(  "+tmp_str[0]+"  )");
			$("#qno_head").html(tmp_str[0]);
			var main_ans=tmp_str[5];
			all_opt_data="<table style='margin-left:100px;'><tr><td>";
			
			// option a
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[0]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[0]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>a)</td><td>"+opt_arr[0]+"</td></tr><tr><td>";

			//option b
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[1]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[1]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>b)</td><td>"+opt_arr[1]+"</td></tr><tr><td>";

			//option c
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[2]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[2]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>c)</td><td>"+opt_arr[2]+"</td></tr><tr><td>";

			//option d
			all_opt_data=all_opt_data+"<input type=radio value='"+opt_arr[3]+"' name='qst"+tmp_str[3]+"'";
			if(opt_arr[3]==main_ans)
				all_opt_data=all_opt_data+" checked />";
			else
				all_opt_data=all_opt_data+" />";

			all_opt_data=all_opt_data+"</td><td>d)</td><td>"+opt_arr[3]+"</td></tr></table>";



			$("#options_div").html(all_opt_data);

			$("#pre_div").html("<button class='button primary' onclick=\"each_question('previous','"+tmp_str[3]+"')\">Previous</button>");
			$("#next_div").html("<button class='button primary' onclick=\"each_question('next','"+tmp_str[3]+"')\">Next</button>");

			if(tmp_str[4]=="no")
				$("#marked_div").html("<button  id='mark' class='button' onclick=\"check_marked('"+tmp_str[0]+"')\">Mark</button>");
			else if(tmp_str[4]=="yes")
				$("#marked_div").html("<button id='mark' class='button warning' onclick=\"check_marked('"+tmp_str[0]+"')\">Mark</button>");

});
}

