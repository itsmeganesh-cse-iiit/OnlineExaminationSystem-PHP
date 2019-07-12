<html>		<head>
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


<!-- Registration form -->
 <body>   



    <div><img src="../images/background.jpeg" class="actor" data-position="0,0" style="height: 1200px">
    <div style="padding-top:0%;margin-left:30%;" >
    <div class="padding20 block-shadow" id="registerform" style="width:50%;">
        <form method=post action="" onsubmit="return register_validate()" id=regform >
			
<div class="grid">
                <div class="row cells2">
                    <div class="cell">
                    
                       <h2 style="color:white;">Registration Form</h2><br>
                    </div>
                    <div class="cell">
                        
					</div>
	

                    </div>
                    
                </div>

           		<div class="grid">
                <div class="row cells2">
                    <div class="cell">

                        <label style="color:white">First Name</label>
                        <div class="input-control text full-size">
                                        <span class="mif-user prepend-icon"></span>
                
                						<input type="text" maxlength="10" id=register_firstname name=register_lastname">
                        </div>
                    </div>
                    <div class="cell">
                        <label style="color:white">Last Name</label>
                        <div class="input-control text full-size">
                                        <span class="mif-user prepend-icon"></span>
                
                						<input type="text" maxlength="10" id=register_lastname name=register_lastname">
					</div>
					</div>

                    </div>
                    
                </div>

                
                <label style="text-align: left;color:white;">Email</label>
                <div class="input-control text full-size">
				<span class="mif-mail prepend-icon"></span>
                
                <input type="text" id=register_email name=register_email onKeyup="email_validate()">
                </div>
                
                
                
                
                
                
                
                
                <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label style="color:white">Mobile</label>
                        <div class="input-control text full-size">
                                        <span class="mif-mobile prepend-icon"></span>
                
                						<input type="text" maxlength="10" id=register_mobile name=register_mobile onKeyup="numericFilter(this);">
                        </div>
                    </div>
                    <div class="cell">
                        <label style="color:white">Date of Birth</label>
                        <div class="input-control text full-size" data-role="datepicker">
					   <input type="text" id="register_dob">
					    <button class="button"><span class="mif-calendar"></span></button>
					</div>
					</div>

                    </div>
                    
                </div>
                
                
                
                <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label style="color:white">Branch</label>
                        <div class="input-control text full-size">
                            <input type="text" id=register_branch name=register_branch>
                        </div>
                    </div>
                    <div class="cell">
                        <label style="color:white">Class</label>
                        <div class="input-control text full-size">
	                           <input type="text" id=register_class name=register_class>
                        </div>
                    </div>
                    
                </div>
                
               <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label style="color:white">College</label>
                        <div class="input-control text full-size">
                            <input type="text" id=register_college name=register_college>
                        </div>
                    </div>
                    <div class="cell">
                        <label style="color:white">University</label>
                        <div class="input-control text full-size">
	                           <input type="text" id=register_university name=register_university>
                        </div>
                    </div>
                    
                </div>
                
                
                 <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <label style="color:white">Password</label>
                        <div class="input-control password full-size" data-role="input">
                
		                <span class="mif-key prepend-icon"></span>
		                <input type="password" id=register_password name=register_password>
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
                    </div>
                    <div class="cell">
                        <label style="color:white">Confirm Password</label>
                        <div class="input-control password full-size" data-role="input">
                
		                <span class="mif-key prepend-icon"></span>
		                <input type="password" id=register_confirm_password name=register_confirm_password onkeyup="password_validate()">
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                        </div>
                    </div>
                </div>
                
                     
                        
              
                
                
                
                
                <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                       <h5 style="color:white">Gender</h5>
                        <label class="input-control radio">
                            <input type="radio" name="register_gender" value="M">
                            <span class="check"></span>
                            <span class="caption" style="color:white">Male</span>
                        </label>
                        <label class="input-control radio">
                            <input type="radio" name="register_gender" value="F">
                            <span class="check"></span>
                            <span class="caption" style="color:white">Female</span>
                        </label> 	
                    </div>
                    <div class="cell">
                        <label style="color:white">Year</label>
                       
                        
                        <div class="input-control select full-size">
                         
						   <select id=register_year name=register_year>
						   		<option value=0>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Year</option>
						        <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I</option>
						        <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II</option>
						        <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III</option>
						        <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV</option>
						        <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V</option>
						        <option value="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI</option>
						    </select>
						</div>
                    </div>
                </div>
                

                
 <h5 style="color:white">Address</h5>          
 <textarea cols=60 rows=6 id=register_address name=register_address></textarea>


                 
                        
                 <h5 style="color:white">Security Question</h5>       
                <div class="input-control select full-size">
			   <span class="mif-question prepend-icon"></span>
			   
			   <select id=register_security_question name=register_security_question>
			   		<option value=0>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Question</option>
			        <option value=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of your first School?</option>
			        <option value=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Childhood Nick name</option>
			        <option value=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Favourite Book</option>
			    </select>
			</div>
			
			<label style="color:white">Answer</label>
                <div class="input-control password full-size" data-role="input">
                	
		                <span class="mif-lock prepend-icon"></span>
		                <input type="password" id=register_security_answer name=register_security_answer>
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
		                </div>
		                <Br><Br>	<center>
		                		                <button class="command-button warning" >
		    <span class="icon mif-user"></span>
		    Register
		    <small >To eSF Online Exam</small>
			</button></center>
			
          </form>
          <br><br>
         			
    </div>
    <center>
	        
			
		</center>
    </div>
    </div>
    
    <!-- Registration form end -->
	</body></html>