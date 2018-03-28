<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand || Admin ||Edit User</title>
<link href="css/Admin_styles.css" rel="stylesheet" type="text/css">
</head>

<body>


	<?php
	
	require_once("DBConnect.php");
	
	$id = $_GET['id'];
	$result=mysql_query("SELECT  
								user_name,
								user_surname,
								user_gender,
								user_bday,
								user_login, 
								user_password,
								admin_access 
						FROM Users 
						WHERE id = '$id' ");
	
	$row = mysql_fetch_assoc($result); 
	
	if (isset($_POST['save']))
	{
		$username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
		$usersurname = htmlspecialchars(strip_tags(trim($_POST['Surname']))) ;
		$Gender = $_POST['Gender'];
		$bday = $_POST['Birthday'];
		$login = htmlspecialchars(strip_tags(trim($_POST['Login']))) ;
		$password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;
		$adminaccess = $_POST['Admin'];
		
		$result_change = mysql_query("UPDATE Users SET 
												user_name = '$username',
												user_surname = '$usersurname',
												user_gender = '$Gender',
												user_bday = '$bday',
												user_login = '$login',
												user_password = '$password',
												admin_access = '$adminaccess'
									  WHERE id = '$id' ");
	 if ($result_change == 'true')  
   		{  
			echo '<p> Selected user was edit successfull </p>';
   		}
  		else  
  		{  
	  		echo '<p> Edit error </p>';  
		}
	}

	?>	
    <div class ='HeaderForm'>
		<div class = 'CaptionRegister'>
		<h1>Edit Userinfo</h1>
		</div>
	</div>
	
<div class = 'formWrapper'>
	
	
	
		<form method = 'post' action = 'Edit.php?id=<?php echo $id; ?>' name='NewUser'>
           
            <div class='GenderDiv'>
            
				<label class = 'Name'> Name: <br>
				<input type ='text' name = 'Name' value = "<?php echo $row['user_name'];?>">
				</label> 


				<label> Surame: <br>
				<input type ='text' name = 'Surname' value = "<?php echo $row['user_surname'];?>">
				</label>

				<label> Gender: </label>
					<input type='radio' name='Gender' value='m' > Male 
					<input type='radio' name='Gender' value='f' > Female 
				 
			</div>
			
			<div class = 'BDayDiv'>		
			
	        	<label>Birthday:</label>
				<input type = 'date' name = 'Birthday' value = "<?php echo $row['user_bday'];?>">
			</div>
			
			<div class = 'LogPassDiv'>
				<label> Login: <br>
				<input type = 'text' name = 'Login' value = "<?php echo $row['user_login']; ?>">
				</label> 

				<label> Enter password:<br>
				<input type = 'password' name = 'Password' value = "<?php echo $row['user_password']; ?>">
				</label>

<!--
				<label> Confirm password:<br>
					<input type ='password' name = 'Password_confirm'><br>
				</label>
-->
				
				
			</div>
			<div class = 'Register'>
				
				<input type = 'submit' name = 'save' value = 'Save Changes'>
				<input type ='reset' name ='clear' value='Clear'>

				<div class ='Privileg'>
				<label> Administrator:
				<input type = 'checkbox' name = 'Admin' value = "<?php echo $row['admin_access']; ?>">
				</label>
					
				</div>
			</div>	
        </form>
	</div>"
 ?>
</body>
</html>