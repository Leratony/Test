<?php

$servername = "localhost";
$username = "admin_bd";
$dbname = "Users_Data";
$password = "251502html";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }





?>
<div class ="UserDataTable">
	<table>
<caption>Users</caption>
<tr>
		<th>id</th>
		<th>Name</th>
		<th>Surname</th>
	    <th>Gender</th>
		<th>Birthday</th>
		<th>Login</th>
		<th>Password</th>
		<th>Admin</th>
		<th></th>
		<th></th>  
    </tr>
    
<?php
$stmt = $db->query("SELECT  *  FROM Users");

while ($row = $stmt->fetch())
{
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['user_name'] . "</td>";
	echo "<td>" . $row['user_surname'] . "</td>";
	echo "<td>" . $row['user_gender'] . "</td>";
	echo "<td>" . $row['user_bday'] . "</td>";
	echo "<td>" . $row['user_login'] . "</td>";
	echo "<td>" . $row['user_password'] . "</td>";
	echo "<td>" . $row['admin_access'] . "</td>";
	echo "<td><a class = 'editLink' href='Main.php?page=edit&?id=" . $row['id'] . "'>Edit User</a></td>";
	echo "<td><a class = 'deleteLink' href='Main.php?page=delete&?id=" . $row['id'] . "'>Delete User</a></td>";
	echo "</tr>";
}
		print "</table>"; 
		$num_rows = mysqli_num_rows($stmt); 
		print("<p class = 'totalUsers'>Всего пользователей: $num_rows </p>");
	echo "</table>";



?>