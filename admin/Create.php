<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand || Admin ||New user</title>
<link href="css/Admin_styles.css" rel="stylesheet" type="text/css">
</head>

<body>

	<div class ="HeaderForm">
		<div class = "CaptionRegister">
		<h1>New User</h1>
		</div>
	</div>

		<div class = "formWrapper">

		<form method = "post" action = "Main.php?page=create" name = "NewUser">

            <div class="GenderDiv">

				<label class = "Name"> Name: <br>
						<input type ="text" name = "Name">
				</label>


				<label> Surame: <br>
						<input type ="text" name = "Surname">
				</label>

				<label> Gender: </label>
					<input type="radio" name="Gender" value="M" > Male
					<input type="radio" name="Gender" value="F" > Female

			</div>

			<div class = "BDayDiv">

	        	<label>Birthday:</label>
					<input type = "date" name = "Birthday">
			</div>

			<div class = "LogPassDiv">
				<label> Login: <br>
					<input type ="text" name = "Login">
				</label>

				<label> Enter password:<br>
					<input type ="password" name = "Password">
				</label>

<!--
				<label> Confirm password:<br>
					<input type ="password" name = "Password_confirm"><br>
				</label>
-->


			</div>
			<div class = "Register">

				<input type = "submit" name = "Register" value = "Register">
				<input type="reset" name="clear" value="Clear">

				<div class ="Privileg">
				<label> Administrator:
					<input type = "checkbox" name = "Admin">
				</label>

				</div>
			</div>
        </form>
	</div>

<?php
	require_once('DBConnect.php');

	if (isset($_POST['Register']))
	{
	$username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
	$usersurname = htmlspecialchars(strip_tags(trim($_POST['Surname']))) ;
	$Gender = $_POST['Gender'];
	$bday = $_POST['Birthday'];
	$login = htmlspecialchars(strip_tags(trim($_POST['Login']))) ;
	$password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;
	$adminaccess = $_POST['Admin'];

	$result_add = mysql_query( "INSERT INTO `Users` (
	                                                 `user_name`,
												     `user_surname`,
												   	 `user_gender`,
												     `user_bday`,
												     `user_login`,
												     `user_password`,
												     `admin_access`)
							    VALUES

													   (`0`,
													   '$username',
													   '$usersurname',
													   '$Gender',
													   '$bday',
													   '$login',
													   '$password',
													   '$adminaccess') ");


	if ($result_add == 'true')
   		{
			echo '<p> New user created in base </p>';
   		}
  else
  	{
	  echo '<p> Saving error </p>';
	}

	}



?>




<!--
//$servername = "localhost";
//$username = "admin_bd";
//$password = "251502html";
//$dbname = "Users_Data";
//    try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//	if(isset ($_POST[Register])){
//		// begin the transaction
//    $conn->beginTransaction();
//    // our SQL statements
//    $conn->exec("INSERT INTO Users
//	             VALUES
//
//	            (user_login = '" . $_POST['Login']."'),
//				(user_password = '" . $_POST['Password']."'),
//				(user_bday = '" . $_POST['Birthday']."'),
//				(user_gender = '" . $_POST['Gender']."'),
//				(user_name = '" . $_POST['Name']."'),
//				(user_surname = '" . $_POST['Surname']."'),
//				(admin_access = '" . $_POST['Admin']."')");
//
//    $conn->commit();
//	 "New records created successfully";
//    }
//
//}
//
//
//catch(PDOException $e)
//
//    {
//    $conn->rollback();
//		echo "Error: " . $e->getMessage();
//    $e -> getMessage();
//    }
//
-->


</body>
</html>
