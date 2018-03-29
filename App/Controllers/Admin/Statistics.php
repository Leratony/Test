<?php

namespace App\Controllers\Admin;

/**
 * Admin/Statistics controller
 * 
 * PHP version  7.0.28
 */

 class Statistics extends \Core\Controller
 {
    protected function before()
    {
        echo "(before)"; // это те методы, которые вызываются до запуска какого-то контроллера.
        // тут надо убедиться в авторизации
        // return false; - если это выставить, то пользователь не сможет видеть страницу, не авторизовавшись, например
    }


     public function indexAction()
     {
         echo "Here will be shown an any statistics";
     }

     

 }




?>