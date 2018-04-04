<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Enter;

/**
 * Admin/Login controller
 * 
 * PHP version  7.0.28
 */

 class Admin extends \Core\Controller
 {
    protected function before()
    {   
        
        if (empty($_SESSION)) {
            session_start();
            return true;
        } else {
            if (!empty($_COOKIE['test'])) {echo $_COOKIE['test'];}}
        
        
        //return false;
        // смена языка мб
    }
    
     public function loginAction()
        {
            Enter::Authorize();
            View::renderTemplate('Admin/index.html');
        }    
        
    protected function after()
    {
        header("Location:http://localhost/admin/main/index");
    }





     

     

     

 }




?>