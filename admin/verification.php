<?php
header('Content-Type: text/html; charset=utf-8');

    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login']))
	{ $login = $_POST['login'];
	   if ($login == '') { unset($login);} 
	} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) 
	{ $password=$_POST['password']; 
	 if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

    
    $login = trim(htmlspecialchars(stripslashes($login)));
    $password = trim(htmlspecialchars(stripslashes($password)));
    
    require_once("DBConnect.php");

 //insert all data about logged user from database
$result = mysql_query("SELECT * FROM `Users` WHERE `user_login` ='$login' AND admin_access = 1");
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["user_password"]))
    {
    //whether user with entered login exists
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Sorry, input login or password incorrect" . "<a href='index.php'> <b>Try again</b> </a></h3></div></body>");
    }
    else {
    //if exists -> compariong passwords
    if ($myrow["password"]==$password) {
    //if passwords are equal -> start session
    $_SESSION['login']=$myrow["user_login"]; 
    $_SESSION['id']=$myrow["id"];//need to remember for verifying sessions from different pages
//   header("Location:Main.php?page=home");
		echo "
		
		<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Brand || Admin</title>
<link href='css/Admin_styles.css' rel='stylesheet' type='text/css'>
</head>

<body>
<header>
<div id = 'headerInside'>
	<div id ='logo'></div>
	<div id ='companyName'>Brand Admin</div>
	<div id ='navWrap'>
		<a href='/'>Main</a>
		
		
	</div>
	
</div>
</header>


<main>";
		
		$sqlCart = mysql_query("SELECT `user_name` FROM `Users` WHERE `user_login` = '$login' AND admin_access = 1");
while($row = mysql_fetch_array($sqlCart))
	
//Присваивание записей 
$name = $row["user_name"];
  
  echo "


	<nav id ='SideBar'>
	 	<ul>
	 		<li>
	 			<div class = 'ItemNav'>
					<div id = 'AvatarDefault'></div>
					<div class = 'CurrentAdmin'> <font color='red'>$name</font></div>
					<div class = 'OnlineStatus'> Online status</div>
					
	 			</div>
	 		</li>
	 		<li>
 				<div class = 'MainNav'>
 					<div class = 'Notice'><a href = 'Main.php?page=home'>HOME</a></div>
 				</div>
	 		</li>
	 		<li>
	 		     <div class = 'ItemNav'>
					<div class = 'ItemTitle_Icon'><a href = '#'>Users</a>
					<ul class = 'UsersMenu'>
					   
							<li><a href = 'Main.php?page=list' >List</a></li>
							<li><a href = 'Main.php?page=create' >Create new user</a></li>
						
					</ul>
					
			
               	     </div>
            	</div>
	 		</li>
	 		<li>
		 		<div class = 'ItemNav'>
					<div class = 'ItemTitle_Icon'><a href = '#'>Admin Panel</a>
						<ul class = 'UsersMenu'>
					   
							<li><a href = 'Main.php?page=stats' >Stats</a></li>
							<li><a href = '#'>Settings</a></li>
						
					</ul>
           	         </div>
            	</div>
	 		</li>
	 		
	 		<li>
	 			<div class = 'ItemNav'>
	 				<div class ='ItemTitle_Icon'>Developers</div>
	 				</div>
	 		</li>
	 		<li>
	 			<div class = 'ItemNav'>
	 			<div class ='ItemTitle_Icon'>FAQ</div>
	 			</div>
	 		</li>
	 		<li>
				<div class = 'Out'>
				<div class = 'ItemTitle_Icon'>
				<a href = 'logout.php'>Sign Out</a>
				</div>
				</div>
	 		</li>
	 		
	 	</ul>
	</nav>
	
	<div class = 'content'>";
	$page = $_GET['page'];
	if ($page == 'home'){
		require('templates/Home.php');
	}elseif ($page == 'list'){
	require('templates/List.php');
	}elseif ($page == 'create'){
	require('templates/Create.php');	
	}elseif ($page == 'stats'){
	require('templates/Stats.php');
	}
	echo "
	</div	<div id ='copyrightFooter'>
r>
	<div id ='copyrightFooter'>
		&copy Brand
	</div>
	
</footer>
</body>
</html>";
		
	
	
		
    }
 else {
    //если пароли не сошлись

    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Sorry, input login or password incorrect" . "<a href='index.php'> <b>Try again</b> </a></h3></div></body>");
    }
    }
    ?>
    
