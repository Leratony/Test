<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register Account</title>

<link href="../css/Register_style.css" rel="stylesheet" type="text/css">
</head>


<body>


<div id ="main">
	<div class ="mainHeaderForm">
		<div id ="logoRegister"></div>
		<div id = "CaptionRegister">
		<h1>Register Account</h1>
		</div>
	</div>
	
	<div class = "formWrapper">
	
		<form method = "post" action = "LogIn.htm" name="New">
	    
		   <div class = "NameSurnameDiv">
		    	<label class = "Name"> Name: <br>
					<input type ="text" name = "UserName">
			    </label> 
			
			
			    <label> Surame: <br>
					<input type ="text" name = "UserSurName">
			    </label> 
			    
		   </div>
		   
		   <div class="GenderDiv">
				<label> Gender: </label>
					<input type="radio" name="Gendr1" value="m" > Male 
					<input type="radio" name="Gendr2" value="f" > Female 
				 
			</div>
			
			<div class = "BDayDiv">		
			
	        	<label>Birthday:</label>
					<input type = "date" name = "date">
			</div>
			
			<div class = "LogPassDiv">
				<label> Login: <br>
					<input type ="text" name = "Login">
				</label> 

				<label> Enter password:<br>
					<input type ="password" name = "pswd">
				</label>

				<label> Confirm password:<br>
					<input type ="password" name = "pswd_confirm"><br>
				</label>
			</div>
			<div class = "Register">
				
				<input type = "submit" name = "Register" value = "Register">
				

				<div class ="Warn">
					By clicking Create an account, you agree to our Terms and confirm that you have read our Data Policy, including our Cookie Use Policy
				</div>
			</div>	
        </form>
	</div>
	
</div>





</body>
</html>