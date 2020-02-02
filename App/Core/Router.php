<?php

namespace App\Core;

use App\Controller\Error;

class Router
{

    private static $config;


    public static function start(array $routes)
    {
        self::$config = $_SERVER;
        $url = self::$config['REQUEST_URI'];


        if (array_key_exists($url, $routes)) {
            $route = $routes[$url];
            $controller = array_keys($route)[0];
            $method = $route[$controller];

            if (method_exists($controller, $method)) {
                call_user_func(array(new $controller, $method));
            }
        } else {
            (new Error())->showError(404);
        }


    }

}