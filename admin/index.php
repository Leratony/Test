<?php
session_start();// required to note session id and another data to verify whether current session is session from Brand's login form
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand || Admin </title>

<link href="css/Admin_Enter_styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
	if (empty($_SESSION['login']) or empty($_SESSION['password']))
    {
	?>
<header>
	<div class = "linkBack">
		<a href = "/">
			<img src ="images/left-arrow-button.svg">
		</a>
	</div>
	<div class = "selectLanguage">Ru</div>
</header>


<main>

	<h1>Authorization</h1>
	<div class = "formWrapper">
<form method = "post" action = "verification.php" name="Enter">

		<div class = "Log">
				<label> Login: <br>
					<input type ="text" name = "login" required autofocus><br>
				</label>

				<label> Enter password:<br>
					<input type ="password" name = "pswd" required>
				</label>
			</div>

			<div class = "RegisterButton_Rem">

				<button type = "submit" name = "Enter"><img src = "images/enter.svg" ></button>


				<div class ="RememberMe">
					<label>Remember me in this computer
					<input type ="checkbox" >
					</label>
				</div>
			</div>
        </form>
	</div>
</main>
</body>
</html>
<?php
	}
		if (!empty($_SESSION['login'] or $_SESSION['password'])) //Not empty session means that authorisation made in authorisation form of site "Brand" from one of pages and saved in session

			{   $login = $_SESSION['login'];
		        $password = $_SESSION['password'];
//				$connect_db = mysql_connect('localhost', 'admin_bd', '251502html');
//				mysql_select_db("Users_Data", $connect_db);
//				if (!$conn) {
//        			echo "Unable to connect to DB: ". mysql_error();
//        			session_unset();
//							}
//
//    			if (!mysql_select_db("Users_Data")) {
//        			echo "Unable to select mydbname: ". mysql_error();
//        			session_unset();
//
//				}
//				$login = user_login;
//				$password = user_password;
//
//				$sort_query = mysql_query("SELECT *
//				                           FROM Users
//							   			   WHERE admin_access = 1");
//
//				$count = mysql_num_rows($sort_query);
//
//				if ($count == 1)
//				{
//					if ($login = $_SESSION['login']
//						&&
//						$password = $_SESSION['password'])
//					{
//						header("Location:templates/index.php?page=home");
//					}
//					else {session_unset();}
//
//				}
//				elseif($count > 1)
//				{
//					while ($row = mysql_fetch_assoc($count))
//					{
//						if ($row['user_login'] = $_SESSION['login']
//													&&
//							$row['user_password'] = $_SESSION['password'])
//						{
//							header("Location:templates/index.php?page=home");
//						}
//						else {session_unset();}
//					}
//				}
//				else {
//				echo "No admin users";
//				session_unset();
//		  			 }
//			}

			}



?>
