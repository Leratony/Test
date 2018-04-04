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
            View::renderTemplate('AdminUsers/index.html',[
                'Users' => $Users
            ]); 
     }

     public function editAction()
     {
         $Users = User::editUser();

         echo "Users: <pre>";
         var_dump($Users);
         echo "</pre>";
         
        //  echo "POST:<pre>";
        //  var_dump($_POST);
        //  echo "</pre>";

        //  $edit = User::editUser();
        //  echo "QUERY:<pre>";
        //  var_dump($edit) ;
        //  echo "</pre>";

         

         
                
        
        View::renderTemplate('AdminUsers/edit.html',[
                // 's' => 'Selected user was updated successfully',
                'Users'=> $Users
        ]);
                
            

         
     }

     public function deleteAction()
     {
        if(User::deleteUser() === true ){
            View::renderTemplate('AdminUsers/delete.html',[
                's' => 'User deleted successfully!'
            ]);
        } else {
            View::renderTemplate('AdminUsers/delete.html',[
                's' => 'Unable to delete user'
            ]);
        }
        
     }

     public function newAction()
     {
        
        echo "POST: <pre>";
         var_dump($_POST);
         echo "</pre>";
         $ExstLogin = User::newUser();
         print_r($ExstLogin);


       View::renderTemplate('AdminUsers/new.html');
     }

     

 }




?>