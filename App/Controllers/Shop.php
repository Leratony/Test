<?php

namespace App\Controllers;

/**
 * Shop controller
 * 
 * PHP version  7.0.28
 */

 class Shop extends \Core\Controller
 {
     public function indexAction()
     {
         echo "Here will be a shop page";
         echo '<pre>Query string parameters:<pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
     }

     public function editAction() //это не нужный метод, только для примера. Надо применить его в Users/index
     {
         echo 'Here you may edit some good';
         echo '<p>Route parameters: <pre>' . 
         htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
     }
 }




?>