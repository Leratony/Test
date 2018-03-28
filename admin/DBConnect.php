<?php
mysql_connect("localhost", "admin_bd", "251502html") or die ("Unable connection" . mysql_error());

mysql_query(" SET NAMES 'utf8");
mysql_select_db("Users_Data") or die ("There is not this table!");
	
	
?>	