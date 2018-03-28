<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand</title>
<link href="css/index_style.css" rel="stylesheet" type="text/css">
</head>
<header>
<div id = "headerInside">
	<div id ="logo"></div>
	<div id ="companyName">Brand</div>
	<div class ="navWrap">
	   <ul class="main-menu">
			<li><a href="/">Main</a></li>
			<li><a href="index.php?page=shop">Shop</a></li>
			<li><a href ="#">Log In</a>
				<ul class = "sub-menu">
					
						<form method = "post" action = "Main.php" name="Enter">
						
							<li><label class = "Login"> Login:<br>
								<input type ="text" name = "login"/>
							</label> </li>

							<li><label class = "Password1"> Enter password:<br>
								<input type ="password" name = "pswd1"/>
							</label></li><br>

                            
							<li><input type = "submit" name = "EnterSend" value = "Log In"><li>
				
							<a href = "index.php?page=register" id = "Register">Register</a>
							

						</form>
						
				</ul>
			</li>
		
	   </ul>	
				
	  </div>
</div>
</header>

<body>


<main>
	<?php
	
	$page = $_GET['page'];
	if (!isset($page))
	{
		require('templates/Main.php');
	}elseif ($page == 'shop'){
		require('templates/Shop.php');
	}elseif ($page == 'register'){
		require('templates/Register.php');
	}
		
	
	?>
</main>
	

<footer>
	<div id ="contacts">
	<ul>
	  <li><img src="images/email.svg">info@brandshop.ru</li>
	  <li><img src="images/phone-call.svg">8 800 *** ** **</li>
	  <li><img src="images/location-pin.svg">Moscow, Some str., # office # </li>
	</ul>
	</div>
	<div id ="navFooter">
	<ul>
		<li><a href="index.php">Main</a></li>
		<li><a href="index.php?page=shop">Shop</a></li>
		
	</ul>	
	</div>
	<div id ="copyrightFooter">
	<ul>
		<li><img src ="images/facebook-logo-button.svg"></li>
		<li><img src ="images/google-plus-logo-button.svg"></li>
		<li><img src ="images/instagram-logo.svg"></li>
	</ul>
		&copy Brand
	</div>
</footer>
</body>
</html>
