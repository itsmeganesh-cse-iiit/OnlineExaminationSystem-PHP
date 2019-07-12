<script>
function add_notifications()
{

var sub = $("#subject").val();
var msg = $("#msg").val();
var po_by = $("#posted_by").val();
var msg_to =$("#message_to").val();

if(sub==false || msg==false || po_by==false || msg_to==false)
	{
	$("#notification_status").html("<center><div class='alert alert-danger' style='width:300px;20px;'><h5>Fill Required Fields<h5></div></center>");
	}
else
	{
	$.post("backlink_addnotification.php?sub="+sub+"&msg="+msg+"&po_by="+po_by+"&msg_to="+msg_to,function(notif_data){
	
	$("#notification_status").html(notif_data);
	});
	}

}

</script>

<div class="row">
                <div class="col-lg-12 col-md-6">
                  <center>
			<h2>Add notification</h2></center>
				  </div>

</div>
<div id="notification_status"></div>
<Center>
<table  style="width:100%;"><tr><td>
<div class="row" >
   <div class="col-lg-4 col-md-6">
					
				  </div>
                <div class="col-lg-4 col-md-6">
					<label>Subject</label>
					<input type="text" class="form-control" id=subject name=subject />
				  </div>

</div>
<Br>
<div class="row">
   <div class="col-lg-4 col-md-6">
					
				  </div>
  <div class="col-lg-4 col-md-6">
                <label>Message</label>
					<textarea cols=20 rows=5 placeholder="Message here" class="form-control" id="msg"></textarea>
</div>
</div>


<br>
<div class=row>
   <div class="col-lg-4 col-md-6">
					
				  </div>
<div class="col-lg2 col-md-2">
				<label>Posted By</label>
				<input type=text class="form-control" id="posted_by" name="posted_by" />

</div>

<div class="col-lg2 col-md-2">
				<label>Message To</label>
				<input type=text class="form-control" id="message_to" name="message_to" />

</div>
</div>
<Br>
<div class="row">
   <div class="col-lg-4 col-md-6">
					
				  </div>
  <div class="col-lg-4 col-md-6">
					<center>
					
	                <input type=button onclick="add_notifications()" class="btn btn-primary" value="Add Notification">
					</center>
</div>
</div>

<td></tr>

</table>






