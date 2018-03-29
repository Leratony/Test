<?php 

/**
 * 
 * Router
 * 
 * PHP version  7.0.28
 */

class Router
{
    protected $routes = [];

    public function add($route, $params) 
    {
        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }


}


