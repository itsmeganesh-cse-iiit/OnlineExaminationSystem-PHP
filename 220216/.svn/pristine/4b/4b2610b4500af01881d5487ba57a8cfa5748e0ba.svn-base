<?php 
session_start();
include '../config/dbconnect.php';
if(!isset($_REQUEST['email']))
{
header("Location:index.php");	
}
else {
	$email=md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['email'])));
	$password = md5(htmlspecialchars(mysql_real_escape_string($_REQUEST['password'])));
	
	$query = mysql_query("SELECT * FROM admin WHERE login_type='login_one' AND login_key1='$email' AND login_key2='$password' ") or die(mysql_error());
	$num = mysql_num_rows($query);
	if($num!=1)
	{
		header("Location:index.php");
	}
	else 
	{
		$_SESSION['login_one']=$email;
		$_SESSION['login_user']="Admin";
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eSF Admin Login 2</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <script>
		function adminlogin2()
		{
			var cell = $("#cell").val();
			var secretcode = $("#secretcode").val();
			if(cell==false || secretcode==false){
				$("#lg2status").html("<center><font color=red>Fill Required Fileds</font></cente>");
				return false;
				}
			else
			{
			return true;
			}
			
		}
	</script>

</head>

<body>

    <div class="container" style="padding-top: 10%;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Area 2</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method=post action="admin_login_validate.php" onsubmit="return adminlogin2()">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mobile Number" id=cell name="cell" type="text" autofocus autocomplete=false>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Secretcode" id=secretcode name="secretcode" type="password" value="" autocomplete=false>
                                </div>
                             
                                <!-- Change this to a button or input when using this as a form -->
                                <input type=submit  class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                 <div id="lg2status"></div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php 
}
}
?>