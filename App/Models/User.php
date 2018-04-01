<?php

namespace App\Models;
use PDO;
use App\Config;

/**
 * User model
 * PHP version 7.0.28
 */

 class User extends \Core\Model
 {
     // Get all users as an associative array

     public static function getUsers()
     {  
        
         try {
             $db = static::getDB();
             $stmt = $db->query("SELECT  *  FROM Users");
             $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
             return $row;
             $db->close();
             
              } catch (PDOException $e) {
                  echo $e->getMessage();
              }
     }

     // Edit

     public function editUser()
     {  

        //$id = $_GET['id'];  

        User::getUsers();
        try {
            $db = static::getDB();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
		            $username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
		            $usersurname = htmlspecialchars(strip_tags(trim($_POST['Surname']))) ;
		            $Gender = $_POST['Gender'];
		            $bday = $_POST['Birthday'];
		            $login = htmlspecialchars(strip_tags(trim($_POST['Login']))) ;
		            $password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;
                    $adminaccess = $_POST['Admin'];

                    $stmt_change = mysql_query("UPDATE Users SET 
                                                user_name = '$username',
                                                user_surname = '$usersurname',
                                                user_gender = '$Gender',
                                                user_bday = '$bday',
                                                user_login = '$login',
                                                user_password = '$password',
                                                admin_access = '$adminaccess'
                                                WHERE id = '$id' ");
                    if ($stmt_change == 'true')  
                    {  
                    echo '<p> Selected user was edit successfull </p>';
                    }
                    else  
                    {  
                    echo '<p> Edit error </p>';  
                    }
            }        
            
        } catch (PDOException $e) {
            echo $e->getMessage();
           } 


     }

     //delete

     public static function deleteUser()
     {

     }

     //addNew
     public static function newUser()
     {

     }
 }

 ?>