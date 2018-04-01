<?php

namespace Core;
use PDO;

/**
 * Base model
 * PHP version 7.0.28
 */
abstract class Model 
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {

            $host = 'localhost';
            $dbname = 'Users_Data';
            $username = 'admin_bd';
            $password = '251502html';

            try {
                $db = new PDO("mysql:host = $host;dbname = $dbname", $username, $password);
                return $db;
            }catch (PDOException $e){
                echo $e->getMessage();
            } 
        }


    }
    
    
    
}

 ?>
