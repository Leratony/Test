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
     {
         try {
             $db = static::getDB();
             $stmt = $$db->query('SELECT    id, 
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