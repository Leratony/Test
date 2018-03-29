<?php

namespace App\Controllers;

/**
 * Shop controller
 * 
 * PHP version  7.0.28
 */

 class Shop
 {
     public function index()
     {
         echo "Here will be a shop page";
         echo '<pre>Query string parameters:<pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
     }
 }




?>