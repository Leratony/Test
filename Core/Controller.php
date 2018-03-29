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
 }