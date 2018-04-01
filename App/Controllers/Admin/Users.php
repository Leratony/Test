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
        // User::getUsers();
        // if ($stmt->num_rows > 0) {
            View::renderTemplate('AdminUsers/index.html'); 
        //     while($row) {
        //         $Users = User::getUsers();
        //         View::renderTemplate('AdminUsers/index.html',[
        //             'Users' => $Users
        //         ]);
        //     }
            
        // } else {
        //     echo "No users in database!";
        // }
        
    
     }

     public function editAction()
     {
        echo '<p> Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';

        $user->editUser();

         View::renderTemplate('AdminUsers/edit.html');
     }

     public function deleteAction()
     {
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
         View::renderTemplate('AdminUsers/delete.html');
     }

     public function newAction()
     {
         View::renderTemplate('AdminUsers/new.html');
     }

     

 }




?>