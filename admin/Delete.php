<?php
require_once('DBConnect.php');
$id = $_GET['id'];
$delete_q = mysql_query(" DELETE FROM Users WHERE id = '$id' ");
echo "Note deleted successfully";
//  header("Location: Main.php?page=home");
 
 ?>
