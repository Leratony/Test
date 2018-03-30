<?php

namespace App\Controllers\Admin;
use \Core\View;


/**
 * Admin/Main controller
 * 
 * PHP version  7.0.28
 */

 class Main extends \Core\Controller
 {
    protected function before()
    {
        // echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо бы поместить авторизацию, наверное
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }

    protected function after()
    {
        // echo "(after)"; // это те методы, которые вызываются после какого-то контроллера
    }

     public function indexAction()
     {
        View::renderTemplate('AdminMain/index.html');
     }

     public function logoutAction()
     {
         echo "Here will be a redirect on admin/login page";
     }

 }




?>