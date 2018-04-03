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
        // echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо убедиться в авторизации
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }

    protected function after()
    {
        // echo "(after)"; // это те методы, которые вызываются после запуска какого-то контроллера.
        // тут надо убедиться в авторизации, сессии, куки, все дела
        // тут можно собрать какую-нибудь статистику, но отложим это дело
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
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
        // User::editUser();

         View::renderTemplate('AdminUsers/edit.html');
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
         View::renderTemplate('AdminUsers/new.html');
     }

     

 }




?>