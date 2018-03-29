<?php

namespace App\Controllers;

use \Core\View;
/**
 * Shop controller
 * 
 * PHP version  7.0.28
 */

 class Shop extends \Core\Controller
 {
     public function indexAction()
     {
         
         //echo '<pre>Query string parameters:<pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
            View::renderTemplate('Shop/index.html');
        }

     public function editAction() //это не нужный метод, только для примера. Надо применить его в Users/index
     {
         echo 'Here you may edit some good';
         echo '<p>Route parameters: <pre>' . 
         htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
     }
 }




?>