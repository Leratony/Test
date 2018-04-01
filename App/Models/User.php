<?php

namespace App\Models;
use PDO;

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
             $stmt = $db->query('SELECT  *  FROM Users');
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

             
             return $results;
                } catch (PDOException $e) {
                  echo $e->getMessage();
                 }
     }

     // Edit

     public static function editUser()
     {
        try {
            $db = static::getDB();



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