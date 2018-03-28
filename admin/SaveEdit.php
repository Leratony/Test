<html> <body>
 <?php
  include_once("DBConnect.php");
	
  $zapros="UPDATE Users SET 
  user_name='".$_GET['name']. "',
  user_login='".$_GET['login']."', 
  user_password='" .$_GET['password']."', 
  user_e_mail='".$_GET['e_mail']. "', 
  user_info='".$_GET['info']."' WHERE id_user=" .$_GET['id_user'];
  mysql_query($zapros);
if (mysql_affected_rows()>0) {
    echo 'Все сохранено. <a href="Main.php?page=list"> Вернуться к списку пользователей </a>';  }
  else  {  echo 'Ошибка сохранения';  }
 ?>
</body> </html>
