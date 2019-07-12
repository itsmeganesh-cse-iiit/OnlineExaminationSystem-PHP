<script type="text/javascript">
        function submitForm() {
			$("#output").html("<center><img src='../images/loading.gif' /></center>");
            console.log("submit event");
            var fd = new FormData(document.getElementById("fileinfo"));
            fd.append("label", "esfonlinexam_");
            $.ajax({
              url: "upload_exam.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
				$("#btn_hide").show();
				process_exam_file()
            });
            return false;
        }

		function process_exam_file()
		{
			$("#output").html("<center><img src='../images/loading.gif' /></center>");
			$.post("exam_file_process.php",function(prodata){
			$("#output").html(prodata);
			$("#btn_hide").show();
			});
		}
    </script>
<br>
<Center><h2>New Exam -Excel Mode</h2></Center><Br>
  
 <div class="row" style="border:1px solid;padding-top:10px;height:55px;">
                <div class="col-lg-7 col-md-6">
					 <form action="" method="POST" enctype="multipart/form-data" id="fileinfo" name="fileinfo" onsubmit="return submitForm();"">

					 <table><Tr><td>
					<input type=file style="border:1px solid #ccc" name="file" id="file" required></td>
					<td style="padding-left:200px;"></td>
					
					<td>
					<div id="btn_hide">
					<input type=submit value="Create Exam" class="btn btn-success" id="sub_btn">
					</div>
					</form></table>
              
                </div>
              


				<div class="col-lg-2 col-md-6">
                
					


				<div class="col-lg-3 col-md-6" >
               

                    </div>




</div>

<div class="row">

				<div class="col-lg-12 col-md-6" >
                <Br><br><Br>
                 
				<div id="output" style="font-size:20px;">.
				</div>

                    </div>

</div>