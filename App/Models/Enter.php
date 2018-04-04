<?php

namespace App\Models;
use PDO;
use App\Config;

/**
 * Admin enter model
 * PHP version 7.0.28
 */

 class Enter extends \Core\Model
 {

    
     public static function Authorize()
     {
        

        try {

            if (isset($_POST["login"]))
	        { $loginA = trim(htmlspecialchars(stripslashes($_POST["login"])));}
            

            if (isset($_POST["pswd"])) 
	        { $passwordA=trim(htmlspecialchars(stripslashes($_POST['password'])));}

            $db = static::getDB();
        

            $stmt = $db->query("SELECT * FROM `Users` WHERE `user_login` = $loginA AND `admin_access` = 1");
            $myrow = $stmt->fetch(PDO::FETCH_ASSOC);

            if (empty($myrow["user_password"])) {
                header('Location:http://localhost/admin/login');
            } else {
                if ($myrow["password"]==$passwordA) {
                    $_SESSION['login']=$myrow["user_login"];
                    $_SESSION['id']=$myrow["id"];


                    if ($_POST['set']) {
                        setcookie("test","Hello",time()+36000000);
                    }
                }

            }
            

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        


     }
 }



?>