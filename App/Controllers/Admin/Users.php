<?php

namespace App\Controllers\Admin;

/**
 * Admin/Users controller
 * 
 * PHP version  7.0.28
 */

 class Users extends \Core\Controller
 {
    protected function before()
    {
        echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо убедиться в авторизации
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }

    protected function after()
    {
        echo "(after)"; // это те методы, которые вызываются после запуска какого-то контроллера.
        // тут надо убедиться в авторизации, сессии, куки, все дела
        // тут можно собрать какую-нибудь статистику, но отложим это дело
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }


     public function indexAction()
     {
         echo "Here will be a list of users";
     }

     public function editAction()
     {
         echo "Here will be a page for edition of users";
     }

     public function deleteAction()
     {
         echo "Here will be a page with message about deleting progress";
     }

     public function newAction()
     {
         echo "Here will be a page for creating a new user";
     }

     

 }




?>