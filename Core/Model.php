<?php

namespace Core;
use PDO;
use App\Config;

/**
 * Base model
 * PHP version 7.0.28
 */
abstract class Model 
{
    protected static function getDB()
    {
        
        static $servername = "localhost";
        static $username = "admin_bd";
        static $dbname = "Users_Data";
        static $password = "251502html";

        try {
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
            return $db;

    }
    
    
    
}

 ?>
