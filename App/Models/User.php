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
            // постраничный вывод

             $on_page = 5;

             $stmt = $db->query("SELECT  *  FROM Users ORDER BY id");
             $i = 0;
             while ($User = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    
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

                global $count_records;
                $count_records = count($Users);
                
		
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

            $stmt = $db->query("SELECT  id,
                                        user_name, 
                                        user_surname, 
                                        user_gender, 
                                        user_bday, 
                                        user_login, 
                                        user_password, 
                                        admin_access  
                                FROM Users WHERE id= $id ");
                
            
            $Users = [];
            while ($User = $stmt->fetch()) { $Users = [
          
                      "id"     => $User['id'],
                      "user_name"  => $User['user_name'], 
                      "user_surname" => $User['user_surname'], 
                      "user_gender" => $User['user_gender'], 
                      "user_bday" => $User['user_bday'], 
                      "user_login" => $User['user_login'], 
                      "user_password" => $User['user_password']];
                        
            }
            
            global $checkM;
            global $checkF;
            if (isset($Users["user_gender"])) {
            
                if ($Users["user_gender"] == 'M') {
                    $checkM = " checked";
                    $checkF = "";
                    
                }
                if ($Users["user_gender"] == "F") {
                    $checkM = " ";
                    $checkF = "checked";
                }
            }   
            
            
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                
                    $id = htmlspecialchars(strip_tags(trim($_POST['id']))) ;
		            $username = htmlspecialchars(strip_tags(trim($_POST['Name']))) ;
		            $usersurname = htmlspecialchars(strip_tags(trim($_POST['Surname']))) ;
		            $Gender = $_POST['Gender'];
		            $bday = $_POST['Birthday'];
		            $login = htmlspecialchars(strip_tags(trim($_POST['Login'])));
		            $password = htmlspecialchars(strip_tags(trim($_POST['Password'])))	;

                    $db = static::getDB();
                    $db->beginTransaction();

                    $stmt_edit = "UPDATE Users SET 
                                                user_name = '$username',
                                                user_surname = '$usersurname',
                                                user_gender = '$Gender',
                                                user_bday = '$bday',
                                                user_login = '$login',
                                                user_password = '$password'
                                                WHERE id = $id ";
                    
                    $edit = $db->exec($stmt_edit);
                    $db->commit();
                    header("Location:http://localhost/admin/users/index");
                    exit; 
                    
                }
                return $Users;
                
                
            }catch (PDOException $e) {
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

            if (isset($id)) {
                if (is_int($id) === true){

                    $delete_stmt = $db->prepare("DELETE FROM Users WHERE id = $id ");
                    $delete_stmt->execute();

                    header('Location:http://localhost/admin/users/index');   
                    exit;   
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
        $db->beginTransaction();

        try {
            if (isset($_POST['Register'])) {


                if (isset($_POST["Name"]) && isset($_POST["Surname"]) && isset($_POST["Birthday"]) && isset($_POST["Login"]) && isset($_POST["Password"])) {

                    $username = htmlspecialchars(strip_tags(trim($_POST["Name"])));
                    $usersurname = htmlspecialchars(strip_tags(trim($_POST["Surname"]))) ;
                    $bday = $_POST["Birthday"];
                    $login = htmlspecialchars(strip_tags(trim($_POST["Login"])));
                    $password = htmlspecialchars(strip_tags(trim($_POST["Password"])));

                    //login check

                    $stmt_check = $db->query("SELECT user_login FROM Users ORDER BY id");
                    while ($Exst = $stmt_check->fetch(/*PDO::FETCH_ASSOC*/)) {
                        $ExstLogin = $Exst['user_login'];
                        //return $Exst;
                    }

                    if ($ExstLogin == $login) {// verifying whether login is same
                        echo "User with same login already exist!";
                        header('Location:/admin/users/new');
                    } else {
                        
                        $adminaccess = (isset($_POST['Admin']))? '1' : '0';
                        $Gender = $_POST['Gender'];

                        if (isset($_POST["Gender"]) or isset($_POST["Admin"])) {

                            $stmt_add = $db->exec("INSERT INTO `Users` (`user_name`,
                                                                 `user_surname`,
                                                                 `user_gender`,
                                                                 `user_bday`,
                                                                 `user_login`,
                                                                 `user_password`,
                                                                 `admin_access`)
                                            VALUES

                                                                ('$username',
                                                                 '$usersurname',
                                                                 '$Gender',
                                                                 '$bday',
                                                                 '$login',
                                                                 '$password',
                                                                 '$adminaccess') ");

                            $db->commit();

                            header('Location:/admin/users/index');
                            print_r($ExstLogin);


                        }

                    }


                    
                } 
                
            }



        } catch (PDOException $e) {
            echo $e->getMessage();
        } 

    }    
                   

        
 }

 ?>