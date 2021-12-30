<?php

namespace Alialbair\BelajarPhpMvc\Middleware;

class AuthMiddleware implements Middleware
{
    //TODO Implement Before Method
    function before():void
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            header('Location: /login');
            exit();
        }
    }
}
?>