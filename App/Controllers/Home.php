<?php

namespace App\Controllers;

/**
 * Home controller
 * 
 * PHP version  7.0.28
 */

 class Home extends \Core\Controller
 {
    protected function before()
    {
        echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо бы поместить авторизацию, наверное
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }

    protected function after()
    {
        echo "(after)"; // это те методы, которые вызываются после какого-то контроллера
    }






     public function indexAction()
     {
         echo "Here will be a home (main) page";
     }

     public function loginAction()
     {
         echo "Here will be a redirect on home page after authorisation procedure";
     }

 }




?>