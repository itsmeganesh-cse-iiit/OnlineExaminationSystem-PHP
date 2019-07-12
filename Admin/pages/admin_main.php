<?php
session_start();
include '../config/dbconnect.php';

$total_students = mysql_query("SELECT firstname FROM exam_users") or die(mysql_error());
$num_of_students = mysql_num_rows($total_students);

$total_staff = mysql_query("SELECT firstname FROM exam_staff") or die(mysql_error());
$num_of_staff = mysql_num_rows($total_staff);

$total_exams = mysql_query("SELECT exam_code FROM exams_available") or die(mysql_error());
$num_of_exams = mysql_num_rows($total_exams);


if(!isset($_SESSION['login_one']) &&!isset($_SESSION['login_two'])) // removed !- for testing we should remove this
{
	header("Location:index.php");
}
else
{
?>

<script>

function admin_load_this(par)
{
	$("#admin_maindiv").html("").load(par+".php");
}

function admin_load_this_with_par(par)
{
	$.post("total_details.php?type="+par,function(detdata){
	$("#admin_maindiv").html(detdata);
	});
}

</script>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eSF Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">eSF Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Msg1</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>esf labs limited</div>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li onclick="admin_logout()"><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="admin_main.php"><i class="fa fa-home  fa-fw"></i> &nbsp;&nbsp;&nbsp;Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-users "></i>&nbsp;&nbsp;&nbsp; Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li onclick="admin_load_this('add_student')">
                                    <a href="#"><i class="fa fa-plus-circle "></i>   Add Student</a>
                                </li>
                                <li onclick="admin_load_this('ban_student')">
                                    <a href="#"><i class="fa  fa-ban"></i>   Ban Student</a>
                                </li>

								<li onclick="admin_load_this('active_student')">
                                    <a href="#"><i class="fa  fa-user"></i>   Activate Student</a>
                                </li>
                                <li onclick="admin_load_this('list_of_student')">
                                    <a href="#"><i class="fa  fa-list-alt "></i>   List Of Students</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                         <li>
                         <a href="#"><i class="fa fa-list-alt "></i>&nbsp;&nbsp;&nbsp; Exams<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li onclick="admin_load_this('exam_create_type')">
                                    <a href="#"><i class="fa fa-plus-circle "></i>   Create Exam</a>
                                </li>
                                <li onclick="admin_load_this('disable_exam')">
                                    <a href="#"><i class="fa  fa-times-circle"></i>   Disable Exam</a>
                                </li>

                                 <li onclick="admin_load_this('delete_exam')">
                                    <a href="#"><i class="fa  fa-minus-circle "></i>   Delete Exam</a>
                                </li>

                                <li onclick="admin_load_this('list_of_exams')">
                                    <a href="#"><i class="fa  fa-list-alt "></i>   List Of Exams</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa   fa-database"></i>&nbsp;&nbsp;&nbsp; Assosiations<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li onclick="admin_load_this('students_assosiated_to_exams')">
                                    <a href="#"><i class="fa fa-user "></i> Students-Exam</a>
                                </li>
                                <li onclick="admin_load_this('staff_assosiated_to_exams')">
                                    <a href="#"><i class="fa  fa-ban"></i> Staff-Exam</a>
                                </li>

                                 <li onclick="admin_load_this('assosiate_list_staff_exam')">
                                    <a href="#"><i class="fa  fa-minus-circle "></i>List of Staff-Exam</a>
                                </li>

                                <li  onclick="admin_load_this('assosiate_list_student_exam')">
                                    <a href="#"><i class="fa  fa-list-alt "></i>   List Of Students-Exam</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                           <li >
                            <a href="#"><i class="fa    fa-bookmark-o "></i>&nbsp;&nbsp;&nbsp; Results<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-user "></i> Total Results</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

						<li >
                            <a href="#"><i class="fa    fa-bookmark-o "></i>&nbsp;&nbsp;&nbsp; Notifications<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li onclick="admin_load_this('add_notifications')">
                                    <a href="#"><i class="fa fa-user "></i> Add Notification</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>





                        </ul>


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
        <div id="admin_maindiv">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Available Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_of_students;?></div>
                                    <div>Total Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_par('students')">

                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_of_staff;?></div>
                                    <div>Availble Staff</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="admin_load_this_with_par('staff')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_of_exams;?></div>
                                    <div>Total Exams</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Examination System
                            <div class="pull-right">

                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						 <div id="Total-college"></div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Exam Created
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> 2016 Results out
                                    <span class="pull-right text-muted small"><em>1 hour ago</em>
                                    </span>
                                </a>


                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel -->

                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script>
	function admin_logout()
	{
	$.post("admin_logout.php",function(logdata){
		window.location.href=logdata+".php";
		});
	}

	$(function() {
		    Morris.Donut({
		        element: 'Total-college',
		        data: [{
		            label: "Exams",
		            value: <?php echo $num_of_exams;?>
		        }, {
		            label: "Students",
		            value: <?php echo $num_of_students;?>
		        }, {
		            label: "Staff",
		            value: <?php echo $num_of_staff;?>
		        }],
		        resize: true
		    });

		});


    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
   <!-- <script src="../js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php
}
?>
