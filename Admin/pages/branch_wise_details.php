<?php
session_start();
include '../config/dbconnect.php';
if(isset($_REQUEST['type']))
{
$staff_year_details=array("First Year","Second Year","Third Year","Fourth Year");
$type=htmlspecialchars(mysql_real_escape_string($_REQUEST['type']));
$branch_type=htmlspecialchars(mysql_real_escape_string($_REQUEST['type2']));
if($type=='students' )
	{

	$heading_name="Student Year Wise Details";
	$first_year=mysql_query("SELECT gender FROM exam_users WHERE year='1' AND branch='$branch_type'") or die(mysql_error());
	$first_year_num=mysql_num_rows($first_year);
	$second_year=mysql_query("SELECT gender FROM exam_users WHERE year='2' AND branch='$branch_type'") or die(mysql_error());
	$second_year_num=mysql_num_rows($second_year);
	$third_year=mysql_query("SELECT gender FROM exam_users WHERE year='3' AND branch='$branch_type'") or die(mysql_error());
	$third_year_num=mysql_num_rows($third_year);
	$fourth_year=mysql_query("SELECT gender FROM exam_users WHERE year='4' AND branch='$branch_type'") or die(mysql_error());
	$fourth_year_num=mysql_num_rows($fourth_year);
	$details=array("First Year","Second Year","Third Year","Fourth Year");
	}
else if($type=='staff')
	{
	$heading_name="Staff alloted Year Wise Details";
	$first_year=mysql_query("SELECT gender FROM exam_staff WHERE year_deal='I' AND branch_deal='$branch_type'") or die(mysql_error());
	$first_year_num=mysql_num_rows($first_year);
	$second_year=mysql_query("SELECT gender FROM exam_staff WHERE year_deal='II' AND branch_deal='$branch_type'") or die(mysql_error());
	$second_year_num=mysql_num_rows($second_year);
	$third_year=mysql_query("SELECT gender FROM exam_staff WHERE year_deal='III' AND branch_deal='$branch_type'") or die(mysql_error());
	$third_year_num=mysql_num_rows($third_year);
	$fourth_year=mysql_query("SELECT gender FROM exam_staff WHERE year_deal='IV' AND branch_deal='$branch_type'") or die(mysql_error());
	$fourth_year_num=mysql_num_rows($fourth_year);
	$details=array("View Details","View Details","View Details","View Details");
	$staff_name=mysql_query("SELECT firstname,lastname FROM exam_staff WHERE year_deal='I' AND branch_deal='$branch_type'") or die(mysql_error());
	$staff_name_arr=mysql_fetch_array($staff_name);
	}
?>

<center>
        <div id="admin_maindiv">


		<div class="row">
		<div class="col-lg2 col-md-7"></div>
		<div class="col-lg14 col-md-7">
		<center>
		<h2>
               <?php echo $branch_type," ",$heading_name;
			   ?>
            </h2></center></div>
		</div>
            <div class="row"><div class="col-lg-2 col-md-7" style="width:300px;">
 </div>
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div></div>
			</div>
			<Br><br><br>

		<div class="row">
		 <div class="col-lg-2 col-md-7" style="width:300px;">
 </div>
       
                <div class="col-lg-3 col-md-7" style="width:300px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $first_year_num ?></div>
                                    <?php 
									if($type=="staff")
										echo $staff_year_details[0];
										?>
                                </div>
                            </div>
                        </div>


                        <a href="#" <?php 
						if($type=="staff")
							echo "onclick=\"alert(1);\"";
						
						?>>
						
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $details[0];?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7" style="width:300px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $second_year_num ?></div>
                                    <?php 
									if($type=="staff")
										echo $staff_year_details[1];
										?>
                                </div>
                            </div>
                        </div>
                        <a href="#"<?php 
						if($type=="staff")
							echo "onclick=\"alert(1);\"";
						
						?>>
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $details[1];?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
          </div>
		  </div>
				<div class="row" >
				 <div class="col-lg-2 col-md-7" style="width:300px;">
 </div>
                <div class="col-lg-3 col-md-7" style="width:300px;">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $third_year_num ?></div>
                                    <?php 
									if($type=="staff")
										echo $staff_year_details[2];
										?>
                                </div>
                            </div>
                        </div>
                        <a href="#" <?php 
						if($type=="staff")
							echo "onclick=\"alert(1);\"";
						
						?>>
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $details[2];?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
               </div>

                <div class="col-lg-3 col-md-7" style="width:300px;">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
									<div class="huge"><?php echo $fourth_year_num ?></div>
                                    <?php 
									if($type=="staff")
										echo $staff_year_details[3];
										?>
                                </div>
                            </div>
                        </div>
                        <a href="#" <?php 
						if($type=="staff")
							echo "onclick=\"alert(1);\"";
						
						?>>
						<i onclick="admin_load_this('student_details')">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo $details[3];?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></div>
                
             
            </center><br><br><br>
            <table border="1" style="width:250px;height:30px"> <tr><td>
            <h3>First Year Faculty</h3></td></tr>
            <tr><td> <?php 
            echo $staff_name_arr['firstname'];
            
            ?>
             </td></tr>
            
            
            
            </table>




<?php
}
else
{
	echo "Wrong path";
}
?>