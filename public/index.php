<?php

/**
 * Front controller
 * 
 * PHP version  7.0.28
 */

// Twig
require_once '../vendor/autoload.php';

// Require controllers

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' .str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' .str_replace('\\', '/', $class) . '.php';
    }

} );

// Error and exception handlind

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */

$router = new Core\Router();

/** Add the routing table */


$router -> add('', ['controller' => 'Home', 'action' => 'index']);
$router -> add('login', ['controller' => 'Home', 'action' => 'login']);
// $router -> add('register', ['controller' => 'Register', 'action' => 'new']);
// $router -> add('shop', ['controller' => 'Shop', 'action' => 'index']);
// $router -> add('admin/enter', ['admin/controller' => 'Enter', 'action' => 'login']);
// $router -> add('admin/users', ['admin/controller' => 'Users', 'action' => 'index']);
// $router -> add('admin/users/edit', ['admin/controller' => 'Users', 'action' => 'edit']);
// $router -> add('admin/users/delete', ['admin/controller' => 'Users', 'action' => 'delete']);
// $router -> add('admin/users/new', ['admin/controller' => 'New', 'action' => 'create']);
// $router -> add('admin/statistics', ['admin/controller' => 'Stats', 'action' => 'index']);



$router->add('{controller}/{action}');
$router -> add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}');
$router -> add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router -> add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);

// // Display the routing table

// echo '<pre>';
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';

// // Match 

// $url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }

$router->dispatch($_SERVER['QUERY_STRING']);


?>