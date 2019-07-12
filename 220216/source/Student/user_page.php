<?php
session_start();
include '../../config/dbconnect.php';
if(!isset($_SESSION['logged_user']))
{

	header("Location:../index.php");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>eSF Online Exam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/metro.css" rel="stylesheet">
    <link href="../../css/metro-icons.css" rel="stylesheet">
    <link href="../../css/metro-responsive.css" rel="stylesheet">

    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/script.js" ></script>
    <script src="../../js/metro.js"></script>




    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>




	$(document).ready(function(){
		$.Notify({
	        caption: 'Welcome',
	        content: 'Login Successfull',
	        type: 'success',
	        icon:"<span class='mif-flag'></span>"
	    });

		});

        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })




    </script>
</head>
<body class="bg-steel" >
    <div class="app-bar fixed-top darcula" data-role="appbar">
        <a class="app-bar-element branding">GFSU University</a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="">Home</a></li>
            <li onclick="load_this('student_exams')">
                <a href="#">Exams</a>

            </li>

            <li onclick="load_this('notifications') "><a href="#">Notifications
&nbsp;<sup style='background-color:red;width:100px;height:20px;border:1px solid red;border-radius:50px;'>&nbsp;
<?php
$updates = mysql_query("SELECT * FROM exam_updates ORDER BY update_created_time") or die(mysql_error());
$notif_count=0;
while($count=mysql_fetch_array($updates))
{
    if(date('Ymd') == date('Ymd', strtotime($count['update_created_time'])))
        $notif_count++;
}
echo $notif_count;
?>
&nbsp;&nbsp;</sup>
            </a></li>
            <li onclick="load_this('results') "><a href="#">Results</a></li>

            <li>
                <a href="" class="dropdown-toggle">Help</a>
                <ul class="d-menu" data-role="dropdown">
                    <li onclick="load_this('contact_us') "><a href="#">Contact us</a></li>
                    <li onclick="load_this('feedback')"><a href="#">Feed Back</a></li>

                </ul>
            </li>
        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span>

			<?php
			$tmp_username=$_SESSION['logged_user'];
			$get_user_details=mysql_query("SELECT * FROM exam_users WHERE email='$tmp_username'") or die(mysql_error());
			$user_data=mysql_fetch_array($get_user_details);
			echo $user_data['firstname']." ".$user_data['lastname'];
			$profile_pic=$user_data['photo'];
			?>


            </span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <h2 class="text-light">Quick settings</h2>
                <ul class="unstyled-list fg-dark">
                    <li onclick="load_this('edit_profile')" ><a href="#" class="fg-white1 fg-hover-yellow"  >Profile</a></li>
                    <li onclick="load_this('change_password')" ><a href="#" class="fg-white3 fg-hover-yellow"   >Change Password</a></li>
					   <li onclick="load_this('change_profile_pic')" ><a href="#" class="fg-white3 fg-hover-yellow"   >Profile Pic</a></li>



                    <li><a href="" class="fg-white3 fg-hover-yellow" onclick="logout()" >Logout</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" id="cell-sidebar" style="background-color: #66b3ff; height: 100%">
                <table border=0 style="width:200px;"><tr>

                <td style="padding-left:20px;padding-top:30px;padding-down:20px;">



                <img id="myImg" src="<?php echo $profile_pic;?>" style="width:150px;height:150px;border-radius:300px;border:1px solid white;" />
                </td></tr></table>

                    <ul class="sidebar" style="padding-top:20px;background-color: #66b3ff;">
                        <li  onclick="load_this('dashboard')" class="active" ><a href="#">
                            <span class="mif-home icon"></span>
                            <span class="title" style='padding-top:10px;'>Home</span>

                        </a></li>
                        <li onclick="load_this('student_exams')"><a href="#">
                            <span class="mif-pencil icon"></span>
                            <span class="title">Exams</span>

                        </a></li>

                        <li onclick="load_this('notifications') "><a href="#">
                            <span class="mif-flag icon"></span>
                            <span class="title">notifications &nbsp;<sup style='background-color:red;width:100px;height:20px;border:1px solid red;border-radius:50px;color:white;'>&nbsp;&nbsp;<?php echo $notif_count;?>&nbsp;&nbsp;</sup></span>

                        </a></li>

                        <li onclick="load_this('results') "><a href="#">
                            <span class="mif-clipboard icon"></span>
                            <span class="title" style="padding-top:10px;">results</span>
                        </a></li>
                        <li onclick="load_this('contact_us') "><a href="#">
                            <span class="mif-contacts-mail icon"></span>
                            <span class="title" style="padding-top:10px;">contact us</span>

                        </a></li>
                        <li onclick="load_this('feedback')"><a href="#">
                            <span class="mif-user icon"></span>
                            <span class="title" style="padding-top:10px;">feed back</span>

                        </a></li>

                    </ul>
                </div>


                        <div data-role="charm" data-position="top" id="top-charm"><h1 class="text-light"></h1></div>
                        <div data-role="charm" data-position="left" id="left-charm"><h1 class="text-light"></h1></div>




                <div class="cell auto-size padding20 bg-white" id="cell-content" >
                    <h1 class="text-light">ONLINE EXAMINATION<!--  <span class="mif-drive-eta place-right"></span> --></h1>
                   <hr class="thin bg-grayLighter">
                    <!--
                    <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Create...</button>
                    <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Start</button>
                    <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Restart</button>
                    <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
                    -->
                    <hr class="thin bg-grayLighter">
                    <div id=main_div  >



            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
}
?>
