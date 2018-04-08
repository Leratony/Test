<?php

namespace App\Controllers\Admin;
use PDO;
use \Core\View;
use App\Models\User; 

/**
 * Admin/Users controller
 * 
 * PHP version  7.0.28
 */

 class Users extends \Core\Controller
 {
    protected function before()
    {
        if (!empty($_SESSION)) {
            return true;
        } else {/*return false;*/}
    }

    


     public function indexAction()
     {  
            $Users = User::getUsers();
            global $count_records;    
            View::renderTemplate('AdminUsers/index.html',[
                'Users' => $Users,
                'all' => $count_records
            ]); 
     }

     public function editAction()
     {
        
        $Users = User::editUser();
        global $checkM;
        global $checkF;
        global $check;
        

        View::renderTemplate('AdminUsers/edit.html',[
                'Users'=> $Users,
                'checkM'=> $checkM,
                'checkF'=> $checkF,
                'check' => $check
        ]);
                
         
     }

     public function deleteAction()
     {
         
        User::deleteUser();
        View::renderTemplate('AdminUsers/delete.html');
        
     }

     public function newAction()
     {
         $ExstLogin = User::newUser();
         print_r($ExstLogin);


       View::renderTemplate('AdminUsers/new.html');
     }

     

 }




?>