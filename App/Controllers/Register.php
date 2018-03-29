<?php

namespace App\Controllers;

use \Core\View;


/**
 * Register controller
 * 
 * PHP version  7.0.28
 */

 class Register extends \Core\Controller
 {
     public function new()
     {
         
         View::renderTemplate('Register/index.html');
     }
 }




?>