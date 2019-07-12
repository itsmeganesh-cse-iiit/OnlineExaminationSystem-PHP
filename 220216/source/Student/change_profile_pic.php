<script type="text/javascript">
        function submitForm() {
			$("#output").html("<center><img src='../../images/loading.gif' /></center>");
            console.log("submit event");
            var fd = new FormData(document.getElementById("fileinfo"));
            fd.append("label", "profile");
            $.ajax({
              url: "upload_pic.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
				$("#output").html(data);
            });
            return false;
        }

		
    </script>
<br>
<Center><h2></h2></Center><Br>
  
 <div class="row" style="border:0px solid;padding-top:10px;height:55px;padding-left:20%;">
                <div class="col-lg-7 col-md-6">
					 <form action="" method="POST" enctype="multipart/form-data" id="fileinfo" name="fileinfo" onsubmit="return submitForm();"">

					 <table><Tr><td>
					<input type=file style="border:1px solid #ccc" name="file" id="file" required></td>
					<td style="padding-left:200px;"></td>
					
					<td>
				
					<input type=submit value="Upload" class="btn btn-success" id="sub_btn">
					</div>
					</form></table>
              
                </div>
              


				<div class="col-lg-2 col-md-6">
                
					


				<div class="col-lg-3 col-md-6" >
               

                    </div>




</div>
</div>
<br><br>
<br>			<center><div id="output" style="font-size:20px;"></center>
	