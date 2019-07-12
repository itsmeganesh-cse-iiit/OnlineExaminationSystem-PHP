<?php 
session_start();
if(isset($_SESSION['logged_user']))
{
	header("Location:student/user_page.php");
}
else 
{
?>

<DOCTYPE HTML>
<html lang=en>
	<head>
		<title>eSF Online Exam</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel=stylesheet href="css/style.css" type="text/css" />
		<script type="text/javascript" src="../js/jquery.js"  ></script>
		<script type="text/javascript" src="../js/script.js"  ></script>
		<link rel=stylesheet href="../css/metro.css"  type="text/css" />
		<link rel=stylesheet href="../css/metro-icons.css">
		<script type="text/javascript" src="../js/metro.js"></script>
		<script src="../js/picker.js"></script>
	    <script src="../js/picker.date.js"></script>
	    <script src="../js/legacy.js"></script>
	    <script src="../js/alertify.js"></script>
	    
		<link rel="stylesheet" href="../css/default.css">
		<link rel="stylesheet" href="../css/default.date.css">
			    
				
		
		
		<style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 60%;
            margin-top: -9.375rem;
            left: 80%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

    var validateEmail = function(elementValue) {
	    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	    return emailPattern.test(elementValue);
	}

	function email_validate()
	{
        var value = $("#register_email").val();
        var valid = validateEmail(value);
		
        if (!valid) {


            $("#register_email").css({'color':'red','border-color':'red'});

        } else {


            $("#register_email").css({'color':'#000','border-color':'#d9d9d9'});

        }
	}
    
    function numericFilter(txb)
    {
    txb.value= txb.value.replace(/[^\0-9]/ig,"");
    }

        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });

		$(document).ready(function(){
			$("#registerform").hide();

			
			});
		


		var validatepassword = function(epwd) {
		    var pwd=$("#register_password").val();
		    if(epwd==pwd)
			    return true;
			else
				return false;
				    
		}

		function password_validate()
		{
			 var value = $("#register_confirm_password").val();
		     var pwdvalid = validatepassword(value);
		     if(pwdvalid){
			     $("#register_confirm_password").css({'color':'','border-color':'#d9d9d9'});
			     $("#register_password").css({'color':'','border-color':'#d9d9d9'});
		     }
			 else
			 {
				 $("#register_confirm_password").css({'color':'red','border-color':'red'});
				 $("#register_password").css({'color':'red','border-color':'red'});
			 }
				 
		}
      
    </script>
	
	</head>
	
	<body><img src="../images/back.jpg" class="actor" data-position="0,0" style="height:100%;width:100%;">
	<!--  home screen-->
	

    <div  style="height:400px;" id="home">
    			<div  data-position="10,10">
				<img src="../images/only_logo.png" class="actor" style="height: 200px;">
				</div>
            <div class="presenter" data-role="presenter" data-height="700" data-easing="swing" id="homescreen">
                <div class="scene">
						<div class="act fg-white">

                        <img src="../images/geo1.jpg" class="actor" data-position="0,0" style="height:1200px;">
                        <img src="../images/only_logo.png" class="actor" data-position="10,10" style="height: 200px">
                        <h1 class="actor" data-position="10,450" style="color:black">ONLINE EXAMINATION</h1>
                        <p class="actor" data-position="60,450" style="color:black">The server of this system is mostly configured with proper security  measures. Students can connect yourself through <br>the internet to the server and take the exam.The one most important thing about this system is that examiners can also <br>connect to the server with the help of the internet for setting up papers and to do other related tasks.</p>
                        
                    </div>
                    <div class="act fg-white">
						
                        
                        <h1 class="actor" data-position="10,300">eSF Labs Private Limited</h1>
                        <h4 class="actor" data-position="70,300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Where Investigation meets Innovation</h4>
                        <p class="actor" data-position="130,300">eSF Labs is a recognised Research Centre of Institute of Research and Development, GFSU, Government of Gujarat, India.<br> eSF Labs is dedicated to advancing in the field of Digital Forensics, Cyber Intelligence, Incident Response and e-Discovery.<br> It aims to create innovative solutions and provide training founded on the advancements. Our association with leading <br>universities combined with a team of highly qualified and experienced professionals enable us to provide quality solutions<br> to different organizations. We value the passion and dedication of students and researchers to work closely with corporate <br>and Government sector to promote long term relationship and deliver innovative solutions. We are keen on protecting our<br>organizations' privacy and information that needs to be confidential.</p>
						<h3 class="actor" data-position="250,300">Mission</h3>
						<p class="actor" data-position="290,300">To become the leading Research Laboratory with the goal of bringing Corporate, Government and Universities together <br>to combat Cyber Crime by delivering quality solutions, training and services to customer in the field of Cyber Security and Digital Forensics.</p>
						<img src="../images/1.jpg" class="actor" data-position="400,300" style="height: 200px">
						<img src="../images/2.jpg" class="actor" data-position="400,600" style="height: 200px">
						<img src="../images/3.jpg" class="actor" data-position="400,900" style="height: 200px">
                    </div>
					
                </div>
				
            </div>
        </div>
		
	
	
	
	
	
	<!--end home screen -->
	
	<!-- Login form start -->
	<div id="index_div" >
    <div class="login-form padding20 block-shadow" id="loginform" style="border-radius: 15px;">
    <div id="login_status" align="center" ></div>
        <form method=post action="" onsubmit="return login_validate()">
            <h1 class="text-light">Login for Online Exam</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size " data-role="input" id="username_status">
                <label for="user_login">User ID:</label>
                <span class="mif-user prepend-icon"></span>
                <input type="text" name="login_user_name" id="login_user_name">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            
            <br />
            <br />
            <div class="input-control password full-size" data-role="input" id="password_status">
                <label for="user_password">User password:</label>
                <span class="mif-key prepend-icon"></span>
                <input type="password" name="login_user_password" id="login_user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary" >Login</button>
                <button type="reset" class="button info">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
        </form>
        <center>
	        
		</center>
    </div><div style="padding-left:1330px;padding-top:270px" id="forgot">
		<button type="text" class="button success" onclick="window.location.href='student/forgot_password.php';" style="position:fixed;top:80%;right:15%;">Forgot Password</button>
		
	        <button class="command-button warning " onclick="window.location.href='register.php';" style="position:absolute;top:80%;left:35%;">
		    <span class="icon mif-user-plus"></span>
		    Register Here
		    <small >For eSF Online Exam</small>
			</button>
			
          </div>  
		  
    </div>
			
    <!-- Login form end --><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="act fg-white" style="padding-left:230px;"><label data-position="400,600">
						
						eSF Labs Ltd.
						38-8-7, M.G. Road, Kasturibaipet,
						Opp. All India Radio Station, Vijayawada,
						Andhra Pradesh, India. Pin code-520010

						Ph: 0866 6550777
						e-mail: support@esflabs.com
				</label></div>
	
</body>
</html>

<?php 
}
?>