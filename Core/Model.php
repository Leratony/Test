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
        static $db = null;

        if ($db === null) {
                
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
            $db = new PDO($dsn, Config::DB_USER, Config:: DB_PASSWORD);
            return $db;

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }


    }
    
    
    
}

 ?>
