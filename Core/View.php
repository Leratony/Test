<?php 

namespace Core;

// View
// PHP version 7.0.28

class View 
{

// Render a view file
// @param string $view the view file
// @return void

    public static function render($view, $args = [])
    {   
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view"; //relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

// Render a view template using Twig

    public static function renderTemplate($template, $args = []) 
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        echo $twig -> render($template, $args);
    }

}

?>