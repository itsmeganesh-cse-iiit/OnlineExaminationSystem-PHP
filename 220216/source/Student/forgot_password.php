		<link rel=stylesheet href="css/style.css" type="text/css" />
		<script type="text/javascript" src="../../js/jquery.js"  ></script>
		<script type="text/javascript" src="../../js/script.js"  ></script>
		<link rel=stylesheet href="../../css/metro.css"  type="text/css" />
		<link rel=stylesheet href="../../css/metro-icons.css">
		<script type="text/javascript" src="../../js/metro.js"></script>
			<style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

<script>
function register_validate(){
	var email = $("#register_email").val();
	var security_question = $("#register_security_question").val();
	var security_answer =$("#register_security_answer").val();

	if(email==false || security_question==false || security_answer==false)
			{
			alert("Fill all fileds");
			return false;
			}
	else
		{
		
		$.post("new_password_check.php?email="+email+"&sq="+security_question+"&sqa="+security_answer,function(edited_data){
			
			$("#index_div").html(edited_data);
			return false;
			
			});
	
		return false;
	
		}

}
</script>
<body background="../../images/back.jpg">
<div id="index_div">
<div style="padding-top:0%;margin-left:30%;" >
    <div class="padding20 block-shadow" id="registerform" style="width:35%;height:47%;background-color: white;position:absolute;top:20%;left:32%;border-radius: 25px;">
        <form method=post action="" onsubmit="return register_validate()" id=regform>
            <h1 class="text-light">Forgot Password</h1>
            <hr class="thin"/>
            <br />
             <div class="grid">
                <div class="row cells2">

<label style="text-align: left">Email</label>
                <div class="input-control text full-size">
				<span class="mif-mail prepend-icon"></span>
                
                <input type="text" id=register_email name=register_email>
                </div>

 <h5>Security Question</h5>       
                <div class="input-control select full-size">
			   <span class="mif-question prepend-icon"></span>
			   <select id=register_security_question name=register_security_question>
			   		<option value=0>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Question</option>
			        <option value=1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of your first School?</option>
			        <option value=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Childhood Nick name</option>
			        <option value=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Favourite Book</option>
			    </select>
			</div>
			
			<label >Answer</label>
                <div class="input-control password full-size" data-role="input">
                	
		                <span class="mif-lock prepend-icon"></span>
		                <input type="password" id=register_security_answer name=register_security_answer>
		                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
		                </div><br><br>

						<center>
		                		                <button class="button success" >
		    Submit
			</button></center>
			
          
</div></div>
</form>
</div></div>
</div>
