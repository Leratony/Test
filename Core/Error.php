<?php
namespace Core;
use App\Config;

/**
 * Error handler
 * PHP version 7.0.28
 */

 class Error
 {
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message,0, $level, $file, $line);
        }
    }


    public static function exceptionHandler($exception)
    {
        //Code is 404
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);



        if (\App\Config::SHOW_ERRORS){
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line" . $exception->getLine() .  "</p>"; 
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . 'txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message '" . $exception->getMessage() . "'";
            $message .= "n\Stack trace: " . $exception->getTraceAsString();
            $message .= "n\Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine();
            
            error_log($message);
            
            // if ($code == 404) {
            //     echo "<h1>Page not found</h1>";
            // } else {
            //     echo "<h1>An error occurred</h1>";
            // }
            View::renderTemplate("$code.html");


        }
        
    }



 }




?>