<?php

namespace Alialbair\BelajarPhpMvc\App;

class Router
{
    //URL MAPPING
    private static array $routes = [];

    public static function add(string $method,
                                string $path,
                                string $controller, 
                                string $function,
                                array $middlewares = []):void
    {
        //TODO add URL Mapping
        self::$routes[] =[
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middlewares
        ];
    }

    public static function run():void
    {
        //TODO run controller
        $path = '/';

        if(isset($_SERVER['PATH_INFO']))
        {
            $path = $_SERVER['PATH_INFO'];
        }
            $method = $_SERVER['REQUEST_METHOD'];

            foreach(self::$routes as $route){
                //mengubah path ke regex
                $pattern = "#^" . $route['path'] .  "$#";
                // tidak mengguakan if($path == $route['path'] tapi menggunakan pengecekan regex preg_match($pattern, $path, $variables)
                // if($path == $route['path'] && $method == $route['method']){
                if(preg_match($pattern, $path, $variables) && $method == $route['method']){
                    // echo 'Controller : ' . $route['controller'] . ', Function : ' . $route['function'];

                    //call middleware
                    foreach($route['middleware'] as $middleware)
                    {
                        $instance = new $middleware;
                        $instance->before();
                    }

                    //implementasi object controller
                    $function = $route['function']; 
                    $controller = new $route['controller'];
                    // $controller->$function(); manggilnya tidak seperti ini lagi, 
                    
                    array_shift($variables); //hilangkan index pertama /pathnya 
                    call_user_func_array([$controller,$function], $variables);
                   
                    return;
                }
            }

            http_response_code(404);
            echo "CONTROLLER NOT FOUND";
    }
}
?>