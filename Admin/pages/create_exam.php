<?php 
session_start();
?>
<Br>
<script>
$("#submitdiv").hide();
var subject;
var time_based;
var time_limit;
function uppercase(par)
{

$("#"+par).val(($("#"+par).val()).toUpperCase());
}

function post_exam(noq)
{
	var qsts_str="";
	var opts_str="";
	var ans_str="";
	for (var i=1;i<=noq;i++ )
	{
	qsts_str+=$("#q"+i).val();
	ans_str+=$("#q"+i+$("#q"+i+"ans").val().toLowerCase()).val();
	if(i!=noq)
		{
		qsts_str+="~";
		ans_str+="~";
		}
	}
	
	
    all_opts=['a','b','c','d','e','f'];
	for (var j=1;j<=noq ;j++ )
	{
		for (var k=0;k<6 ;k++ )
		{
			tp=$("#q"+j+all_opts[k]).val();
			if(tp!=false)
				opts_str+=tp;
			if(tp!=false)
				opts_str+="~";

		}
		if(j!=noq)
			opts_str+="@";
	}


	subject = $("#exam_subject").val();
	time_based =$("input[name='timebased']:checked").val();
	subject_code=$("subject_code").val();
	if(time_based=="1")
		{
		time_based="Y";
		time_limit =$("#exam_timelimit").val();
		create_questions(noq);
		}
	else
		{
		time_limit="";
		time_based="N";
		create_questions(noq);
		}
	
	var ok =confirm("Are you Sure ?");
	if(ok==true){
		if(noq>0){
			$("#create_status").html("<center><div class='alert alert-success'><h3>Sending ..<h3></div></center>");
			$("#question_paper_div").hide();
			$("#top_div").hide();
			$.post("adding_exam.php?sub_code="+subject_code+"&noq="+noq+"&qsts="+qsts_str+"&options="+opts_str+"&ans="+ans_str+"&subject="+subject+"&timebased="+time_based+"&timelimit="+time_limit,function(exam_add_data){
			
			$("#create_status").html("<center><div class='alert alert-success'><h3>Exam Created Successfully<h3><br><button class='btn btn-info' onclick=\"admin_load_this('create_exam')\">Back</button></div></center>");
			});
		}
	}
	


}


function create_questions(noq)
{
	//$("#question_paper_div").html("");
	var exam_qst_str="<hr style='border-color:green;'>";
	for(i=1;i<=noq;i++)
	{
	exam_qst_str += "<table border=1 style='border-color:red;'  class='table table-striped table-bordered table-hover'><tr><td style='text-align:center'>[<B><font color=red> "+i+"</font> </b>]</td><td><input type=text class='form-control' id='q"+i+"' /></td><td><center><input type=text style='width:40px;' id='q"+i+"ans' class='form-control' onkeyup=\"uppercase('q"+i+"ans')\" maxlength=1/></center></td></tr><tr><td colspan=3><center><table border=0><tr><td>A.</td><td><input type=text id='q"+i+"a' class='form-control'  style='width:150px;'/></td><td style='padding-left:15px;'></td><td>B.</td><td><input type=text id='q"+i+"b' class='form-control' style='width:150px;'/></td><td style='padding-left:15px;'></td><td>C.</td><td><input type=text id='q"+i+"c' class='form-control' style='width:150px;'/></td><td style='padding-left:15px;'></td><td>D.</td><td><input type=text id='q"+i+"d'  style='width:150px;' class='form-control'/></td><td style='padding-left:15px;'></td><td>E.</td><td><input type=text id='q"+i+"e' style='width:150px;' class='form-control'/></td><td style='padding-left:15px;'></td><td>F.</td><td><input type=text id='q"+i+"f' style='width:150px;' class='form-control'/></td><td style='padding-left:20px;'></td></tr></table></tr></table><hr style='border-color:green;'>";

	}
	
	exam_qst_str+="<br> <br><center><button class='btn btn-success' onclick=\"post_exam('"+noq+"')\" >Create Exam</button></center>";

	$("#question_paper_div").html(exam_qst_str);
	$("#submitdiv").show();
}

function exam_questions()
{
subject = $("#exam_subject").val();
var noq = $("#exam_noq").val();
time_based =$("input[name='timebased']:checked").val();
if(time_based=="1")
	{
	time_based="Y";
	time_limit =$("#exam_timelimit").val();
	create_questions(noq);
	}
else
	{
	time_limit="";
	time_based="N";
	create_questions(noq);
	}
}
$("input[name='timebased']").change(function(e){
    if($(this).val() == "1") {
       $("#timelimitid").html("<div class=form-group ><label class=control-label for=input>Time Limit</label><input id='exam_timelimit' type=text class=form-control id=inputSuccess></div>");
       $("#buttonid").html("<button type=button class='btn btn-success' onclick='exam_questions()'>Go</button>");
    } else {
    	$("#buttonid").html("");
    	$("#timelimitid").html("<button type=button class='btn btn-success' onclick='exam_questions()' style='margin-top:10px;'>Go</button>");
    }

});
</script>
<center><div id="create_status"></div></center>
<div id="top_div">
<Center><h2>New Exam -Manual Mode</h2></Center><Br>
<div id="exam_create_status"></div>
  <div class="row" style="border:1px solid;padding-top:10px;">
                <div class="col-lg-2 col-md-6">
                 
				                 
 <div class="form-group ">
                  <label class="control-label" for="input">Subject Name</label>
                   <input type="text" class="form-control" id="exam_subject">
                    </div>

              
                </div>
                <div class="col-lg-2 col-md-6">

                 
						<div class="form-group ">
                  <label class="control-label" for="input">Subject Code</label>
                   <input type="text" class="form-control" id="subject_code">
                    </div>
                
                </div>
				  <div class="col-lg-2 col-md-6">
              
                <div class="form-group ">
                  <label class="control-label" for="input">Number Of Questions</label>
                   <input type="text" class="form-control" id="exam_noq">
                    </div>
                
                </div>
                <div class="col-lg-2 col-md-6">
                <div class="form-group "><center>
                <label class="control-label" for="input">Time Based</label><Br>

             	<input id="exam_timebased" type=radio name=timebased value="1" >&nbsp;Yes &nbsp;&nbsp;&nbsp; <input value="0" type=radio name=timebased>&nbsp;No
                   </center> </div>                 
                </div>
                  <div class="col-lg-2 col-md-6">
                  <div id="timelimitid">
                   
                   </div>
                   
                </div>
                
                <div class="col-lg-2 col-md-6"><Br><center>
                 <div id="buttonid"></div>
                </div>

             
 </div>
  <div class="row">

  <div class="col-lg-4 col-md-6"><Br><center>
              
				  <div class="form-group ">
                  <label class="control-label" for="input">Semester</label>
                   <input type="text" class="form-control" id="sem">
                    </div>
                 

   </div>

   <div class="col-lg-4 col-md-6"><Br><center>
                 <div class="form-group ">
                  <label class="control-label" for="input">Branch</label>
                   <input type="text" class="form-control" id="branch">
                    </div>
                  
   </div>

   <div class="col-lg-4 col-md-6"><Br><center>
              <div class="form-group ">
                  <label class="control-label" for="input">Year</label>
                   <input type="text" class="form-control" id="year">
                    </div>
                     
   </div>
 </div>

 </div>


 <div id="question_paper_div">
 
 </div>


