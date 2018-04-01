<?php

namespace App\Models;
use PDO;

/**
 * User model
 * PHP version 7.0.28
 */

 class User 
 {
     // Get all users as an associative array

     public static function getUsers()
     {  $host = 'localhost';
        $dbname = 'Users_Data';
        $username = 'root';
        $password = 'admin';
        
         try {
            //  $db = static::getDB();
            $db = new PDO("mysql:host = $host;dbname = $dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->query('SELECT    id, 
                                            user_name,
                                            user_surname,
                                            user_gender,
                                            user_bday,
                                            user_login, 
                                            user_password,
                                            admin_access
             
                                            FROM Users');
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             
             return $results;
         } catch (PDOException $e) {
             echo $e->getMessage();
         }
     }
 }