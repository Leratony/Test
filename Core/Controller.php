<?php

namespace Core;

/**
 * Base controller
 * 
 * PHP version 7.0.28
 * 
 */

 abstract class Controller
 {
     protected $route_params = [];

     public function __construct($route_params)
     {
         $this->route_params = $route_params;
     }

     public function __call($name, $args)
    {
        $method = $name . 'Action'; //проверяем существование методов, которые не публичны и запускаются до или после. Авторизация, например

        if (method_exists($this, $method)) {
            if ($this -> before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this -> after();
            }
        } else {
            throw new \Exception("Method $method not found in controller " .get_class($this));
        }
    }
//Before filter - called before an action method
//@return void

    protected function before() 
    {
        
    }
 //After filter - called afer an action method
 //@return void
    protected function after()
    {
        
    }  








 }