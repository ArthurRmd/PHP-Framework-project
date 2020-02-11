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

            $urlRoute = explode('/', self::$config['REQUEST_URI']);
            $find = false;
            foreach ($routes as $key => $route) {
                if (strpos($key, '{') && strpos($key, '}')) {
                    // route a parametre
                    $launchRoute = true;
                    $actualRoute = explode('/', $key);
                    for ($i = 0; $i < count($actualRoute) - 1; ++$i) {
                        if ($actualRoute[$i] != $urlRoute[$i]) {
                            $launchRoute = false;
                        }
                    }

                    if ($launchRoute) {
                        //dump('Je lance la route');
                        //dump(self::$config['REQUEST_URI']);

                        $_SESSION['param'] = $urlRoute[count($actualRoute) - 1];

                        $controller = array_keys($route)[0];
                        $method = $route[$controller];
                        if (method_exists($controller, $method)) {
                            $find = true;
                            call_user_func(array(new $controller, $method));
                        }
                    }
                }
            }

            if ($find == false) {
                (new Error())->showError(404, 'Sorry , page not found');
            }
        }

    }


}