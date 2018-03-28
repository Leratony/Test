<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Brand || Admin || User List</title>

</head>

<body>
<?php
	require_once("DBConnect.php");
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
$result=mysql_query("SELECT id, 
                            user_name,
							user_surname,
						    user_gender,
						    user_bday,
						    user_login, 
							user_password,
							admin_access FROM Users"); 
while ($row=mysql_fetch_array($result))
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
		$num_rows = mysql_num_rows($result); 
		print("<p class = 'totalUsers'>Всего пользователей: $num_rows </p>");
	echo "</table>";
	
//echo "<table>"; 
//echo "<caption>Users</caption>";
//echo "<tr>
// 		<th>Id</th>
//		<th>Name</th>
//		<th>Surname</th>
//		<th>Gender</th>
//		<th>Birthday</th>
//		<th>Login</th>
//		<th>Password</th>
//		<th>Admin</th>
//		<th>Edit</th>
//		<th>Delete</th>  
//	</tr>";


//class TableRows extends RecursiveIteratorIterator { //constructing table of users
//    function __construct($it) { 
//        parent::__construct($it, self::LEAVES_ONLY); 
//    }
//
//    function current() {
//        return "<td>" . parent::current(). "</td>";
//    }
//
//    function beginChildren() { 
//        echo "<tr>"; 
//    } 
//
//    function endChildren() { 
//        echo "</tr>" . "\n";
//    } 
//} 
//$servername = "localhost"; //applying to database
//$username = "admin_bd";
//$password = "251502html";
//$dbname = "Users_Data";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $conn->prepare("SELECT id, 
//	                               user_name,
//								   user_surname,
//								   user_gender,
//								   user_bday,
//								   user_login, 
//								   user_password,
//								   admin_access
//								   
//						    FROM Users"); 
//    $stmt->execute();
//
//    // set the resulting array to associative massive and making recursive 
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
//    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
//        echo $v; 
//    }
//}
//catch(PDOException $e) { //errors 
//    echo "Error: " . $e->getMessage();
//}
//$conn = null;
//echo "</table>";
?>
	
	</div>
	
</body>
</html>
