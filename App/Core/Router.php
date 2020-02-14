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

            self::customRoute($routes);

        }

    }


    private static function customRoute($routes)
    {
        //Tableau route actuel
        $urlRoute = explode('/', self::$config['REQUEST_URI']);
        unset($urlRoute[0]);
        $find = false;

        // Boucle sur toutes les routes
        foreach ($routes as $key => $route) {

            if (strpos($key, '{') && strpos($key, '}')) {

                //Detecte si il a un paramètre dynamique
                $launchRoute = true;
                $actualRoute = explode('/', $key);
                unset($actualRoute[0]);
                $params = array();

                foreach ($actualRoute as $key => $route) {

                    $firstCarac = substr($route, 0, 1);
                    $lastCarac = substr($route, -1);

                    if ($firstCarac != '{' && $lastCarac != '}') {

                        if ($route != $urlRoute[$key]) {
                            $launchRoute = false;
                        }
                    } else {
                        $params = substr($route,1, -1);
                        $params[$params] = $urlRoute[$key];
                    }
                }

                // Si la route correspond

                if ($launchRoute) {

                    dump($params);
                    $_SESSION['param'] = $urlRoute[count($actualRoute) - 1];

                    $controller = array_keys($route)[0];
                    $method = $route[$controller];
                    if (method_exists($controller, $method)) {
                        $find = true;
                        call_user_func(array(new $controller, $method));
                    }
                    break;
                }
            }
        }

        if ($find == false) {
            (new Error())->showError(404, 'Sorry , page not found');
        }
    }


}