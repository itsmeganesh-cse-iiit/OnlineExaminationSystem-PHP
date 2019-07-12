<?php 
session_start();
include '../../config/dbconnect.php';

$updates = mysql_query("SELECT * FROM exam_updates ORDER BY update_created_time DESC LIMIT 10") or die(mysql_error());


?> 

<script>
function view_message()
{
}


</script>

    <script>
        function showDialog(id){
            var dialog = $("#"+id).data('dialog');
            if (!dialog.element.data('opened')) {
                dialog.open();
            } else {
                dialog.close();
            }
        }
    </script>
    
    
   
<table class="table striped hovered cell-hovered border bordered">

<tr>
<th>Sno</th>
<th width=70%>Subject</th><th>Message To</th>
</tr>

<?php
$i=1;
while($row=mysql_fetch_array($updates))
{
	?>
	
	
	      <div  data-role="dialog" id="<?php echo $row['sno'];?>" class="padding30" data-close-button="true" data-type="info" style="top:30px;">
            <div style="width:800px;">
            <h1><?php echo $row['subject'];?></h1>
            <p>
                <?php echo $row['msg'];?>
                
            </p>
            <br>
                <?php echo "<b>Posted By : </b>".$row['posted_by']." &nbsp;&nbsp;&nbsp;<B> Time : </b>".$row['update_created_time'];?>
                </div>
        </div>
    
<tr onclick="showDialog('<?php echo $row['sno'];?>')"><td ><?php echo $i; $i++;?></td><Td ><?php echo $row['subject'];
if(date('Ymd') == date('Ymd', strtotime($row['update_created_time'])))
	echo "&nbsp;&nbsp;&nbsp;<img src='../../images/new.gif' />";

?></Td><td><Center><?php echo $row['msg_to'];?></Center></td></tr>	
	
	<?php 
	
}

?>	



</table>

