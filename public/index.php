<?php

/**
 * Front controller
 * 
 * PHP version  7.0.28
 */

require '../Core/Router.php';

$router = new Router();

// Add the routing table
$router -> add('', ['controller' => 'Home', 'action' => 'index']);
$router -> add('/login', ['controller' => 'Home', 'action' => 'login']);
$router -> add('register', ['controller' => 'Register', 'action' => 'reg']);
$router -> add('shop', ['controller' => 'Shop', 'action' => 'index']);
$router -> add('/admin/enter', ['admin/controller' => 'Enter', 'action' => 'login']);
$router -> add('/admin/users', ['admin/controller' => 'Users', 'action' => 'index']);
$router -> add('/admin/users/edit', ['admin/controller' => 'Users', 'action' => 'edit']);
$router -> add('/admin/users/delete', ['admin/controller' => 'Users', 'action' => 'delete']);
$router -> add('/admin/new', ['admin/controller' => 'New', 'action' => 'create']);
$router -> add('/admin/stats', ['admin/controller' => 'Stats', 'action' => 'index']);






// Match 

$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}


?>