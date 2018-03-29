<?php

namespace App\Controllers\Admin;

use \Core\View;

/**
 * Admin/Login controller
 * 
 * PHP version  7.0.28
 */

 class Login extends \Core\Controller
 {
    protected function before()
    {
        //echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо убедиться в авторизации
        // проверить, запущена ли сессия
        // куки
        // смена языка мб
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }

    protected function after()
    {
        //echo "(after)"; // это те методы, которые вызываются после запуска какого-то контроллера.
        // тут надо убедиться в авторизации
        // еще какие-нибудь проверки
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }





     public function indexAction()
     {
         echo "Here you can log in admin panel";
     }

     

     

 }




?>