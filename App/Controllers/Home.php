<?php

namespace App\Controllers;

/**
 * Home controller
 * 
 * PHP version  7.0.28
 */

 class Home extends \Core\Controller
 {
     public function index()
     {
         echo "Here will be a home (main) page";
     }

     public function login()
     {
         echo "Here will be a redirect on home page after authorisation procedure";
     }

 }




?>