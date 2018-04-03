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
             $stmt = $db->query("SELECT  *  FROM Users ORDER BY id");
             $i = 0;
             while ($User = $stmt->fetch()) {
                    
                $Users[$i]['id'] = $User['id']; 
                $Users[$i]['user_name'] = $User['user_name']; 
                $Users[$i]['user_surname'] = $User['user_surname']; 
                $Users[$i]['user_gender'] = $User['user_gender']; 
                $Users[$i]['user_bday'] = $User['user_bday']; 
                $Users[$i]['user_login'] = $User['user_login']; 
                $Users[$i]['user_password'] = $User['user_password']; 
                $Users[$i]['admin_access'] = $User['admin_access'];
                $i++;
                }
		
                return $Users;
             
              } catch (PDOException $e) {
                  echo $e->getMessage();
              }
     }

     // Edit

     public static function editUser()
     {  
        
        try {
            $db = static::getDB(); 
            $a = key($_GET);
            $id = preg_replace('/[^0-9]/', '', $a);
            settype($id, 'integer');

            $stmt = $db->query("SELECT  user_name, 
                                        user_surname, 
                                        user_gender, 
                                        user_bday, 
                                        user_login, 
                                        user_password, 
                                        admin_access  
                                FROM Users WHERE id= $id ");
                
            
            $Users = [];
            while ($User = $stmt->fetch()) { $Users = [
                        
                        // $Users[$i]['user_name'] = $User['user_name']; 
                        // $Users[$i]['user_surname'] = $User['user_surname']; 
                        // $Users[$i]['user_gender'] = $User['user_gender']; 
                        // $Users[$i]['user_bday'] = $User['user_bday']; 
                        // $Users[$i]['user_login'] = $User['user_login']; 
                        // $Users[$i]['user_password'] = $User['user_password']; 
                        // $Users[$i]['admin_access'] = $User['admin_access'];
                        // $i++;

                      "user_name"  => $User['user_name'], 
                      "user_surname" => $User['user_surname'], 
                      "user_gender" => $User['user_gender'], 
                      "user_bday" => $User['user_bday'], 
                      "user_login" => $User['user_login'], 
                      "user_password" => $User['user_password'], 
                      "admin_access" => $User['admin_access']];
                        
                        }
            
            return $Users;
            
            
            if ((isset($_POST['save'])) /*&& ($_SERVER["REQUEST_METHOD"] == "POST")*/) {
		            $username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
		            $usersurname = htmlspecialchars(strip_tags(trim($_POST['SurName']))) ;
		            $Gender = $_POST['Gender'];
		            $bday = $_POST['Birthday'];
		            $login = htmlspecialchars(strip_tags(trim($_POST['Login'])));
		            $password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;
                    $adminaccess = $_POST['Admin'];


                    $db = static::getDB();
                    $db->beginTransaction();

                    $stmt_edit = "UPDATE Users SET 
                                                user_name = '$username',
                                                user_surname = '$usersurname',
                                                user_gender = '$Gender',
                                                user_bday = '$bday',
                                                user_login = '$login',
                                                user_password = '$password',
                                                admin_access = '$adminaccess'
                                                WHERE id = $id ";

                    // $stmt_edit = "INSERT INTO Users(user_name, 
                    //                                 user_surname, 
                    //                                 user_gender, 
                    //                                 user_bday, 
                    //                                 user_login, 
                    //                                 user_password, 
                    //                                 admin_access)
                    //                VALUES ('$username', '$usersurname', '$Gender', '$bday', '$login', '$password', '$adminaccess') WHERE id = $id  ";
                    
                    $edit = $db->exec($stmt_edit);
                    $db->commit();
                    

                    // if ($edit == true) {
                    //     $s = "User updated successfully!";
                    // } else {
                    //     $s = "Check your query, please. Not available";
                    // }

                    
                 //else {
                   // $s =  "Edit error";
                }
                
        } catch (PDOException $e) {
            echo $e->getMessage();
           } 


     }

     //delete

     public static function deleteUser()
     {  
        $db = static::getDB(); 
        $a = key($_GET);
        $id = preg_replace('/[^0-9]/', '', $a);
        settype($id, 'integer');
        

        try {

            $delete_stmt = $db->prepare("DELETE FROM Users WHERE id = $id ");
            $delete_stmt->execute();

            if (isset($id)) {
                if (is_int($id) === true){

                    $s = true;
                    header('Location:http://localhost/admin/users/index');   
                    exit;
                    
                } else {
                    $s = false;
                }
            }
             

        } catch (PDOException $e) {
            echo $e->getMessage();
           } 
     }

     //addNew
     public static function newUser()
     {
        $db = static::getDB();

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
                $usersurname = htmlspecialchars(strip_tags(trim($_POST['Surname']))) ;
                $Gender = $_POST['Gender'];
                $bday = $_POST['Birthday'];
                $login = htmlspecialchars(strip_tags(trim($_POST['Login']))) ;
                $password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;
                $adminaccess = $_POST['Admin'];
        
                $stmt_add = $db->prepare("INSERT INTO `Users` (
                                                        `user_name`,
                                                        `user_surname`,
                                                        `user_gender`,
                                                        `user_bday`,
                                                        `user_login`, 
                                                        `user_password`,
                                                        `admin_access`) 
                                           VALUES  
    
                                                        (
                                                        '$username',
                                                        '$usersurname',
                                                        '$Gender',
                                                        '$bday',
                                                        '$login',
                                                        '$password', 
                                                        '$adminaccess') ");
                $stmt->execute();
                // $db->close();
                } 
            } catch (PDOException $e) {
                echo $e->getMessage();
               } 
            



        }
 }

 ?>