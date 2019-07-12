<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['type']))
{
$type=htmlspecialchars(mysql_real_escape_string($_REQUEST['type']));

if($type=="students")
	{
	$heading_name="Student Branch Details";
	$cse=mysql_query("SELECT gender FROM exam_users WHERE branch='CSE'") or die(mysql_error());
	$cse_num=mysql_num_rows($cse);
	$ece=mysql_query("SELECT gender FROM exam_users WHERE branch='ECE'") or die(mysql_error());
	$ece_num=mysql_num_rows($ece);
	$mech=mysql_query("SELECT gender FROM exam_users WHERE branch='MECH'") or die(mysql_error());
	$mech_num=mysql_num_rows($mech);
	$civil=mysql_query("SELECT gender FROM exam_users WHERE branch='CIVIL'") or die(mysql_error());
	$civil_num=mysql_num_rows($civil);
	$eee=mysql_query("SELECT gender FROM exam_users WHERE branch='EEE'") or die(mysql_error());
	$eee_num=mysql_num_rows($eee);
	$mme=mysql_query("SELECT gender FROM exam_users WHERE branch='MME'") or die(mysql_error());
	$mme_num=mysql_num_rows($mme);
	}

else if($type=="staff")
	{
	$heading_name="Availble Staff Details";
	$cse=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='CSE'") or die(mysql_error());
	$cse_num=mysql_num_rows($cse);
	$ece=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='ECE'") or die(mysql_error());
	$ece_num=mysql_num_rows($ece);
	$mech=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='MECH'") or die(mysql_error());
	$mech_num=mysql_num_rows($mech);
	$civil=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='CIVIL'") or die(mysql_error());
	$civil_num=mysql_num_rows($civil);
	$eee=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='EEE'") or die(mysql_error());
	$eee_num=mysql_num_rows($eee);
	$mme=mysql_query("SELECT gender FROM exam_staff WHERE branch_deal='MME'") or die(mysql_error());
	$mme_num=mysql_num_rows($mme);
	}

}
else
	echo "wrong path";

?>

<script>

function admin_load_this_with_two_par(par,branch_par)
{
	$.post("branch_wise_details.php?type="+par,"&type2="+branch_par,function(branch_detdata){
	$("#admin_maindiv").html(branch_detdata);
	});
}

</script>

<center>
        <div id="admin_maindiv">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $heading_name;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			</div>
			<Br><br><br></center>

		<div class="row">
		 <div class="col-lg-4 col-md-6" style="width:300px;">
 </div>
       
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ece_num; ?></div>
                                    <div>ECE</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','ECE')">
						
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cse_num; ?></div>
                                    <div>CSE</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','CSE')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $mech_num; ?></div>
                                    <div>MECH</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','MECH')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
             
            </div>

<div class="row" >
 <div class="col-lg-4 col-md-6" style="width:300px;">
 </div>
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $civil_num; ?></div>
                                    <div>CIVIL</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','CIVIL')">
						<i onclick="admin_load_this('student_details')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $eee_num; ?></div>
                                    <div>EEE</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','EEE')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="width:300px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $mme_num; ?></div>
                                    <div>MME</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_two_par('<?php echo $type;?>','MME')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
             
            </div></center>