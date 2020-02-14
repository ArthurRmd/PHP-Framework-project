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
        foreach ($routes as $key => $routeRouter) {

            if (strpos($key, '{') && strpos($key, '}')) {

                //Detecte si il a un paramètre dynamique
                $launchRoute = true;

                $actualRoute = explode('/', $key);
                unset($actualRoute[0]);
                $params = array();


                if (count($actualRoute) == count($urlRoute)) {
                    foreach ($actualRoute as $key => $route) {

                        $firstCarac = substr($route, 0, 1);
                        $lastCarac = substr($route, -1);

                        if ($firstCarac != '{' && $lastCarac != '}') {

                            if ($route != $urlRoute[$key]) {
                                $launchRoute = false;
                            }

                        } else {
                            $paramsName = substr($route, 1, -1);
                            $request[$paramsName] = $urlRoute[$key];
                        }
                    }

                    // Si la route correspond

                    if ($launchRoute) {
                        $controller = array_keys($routeRouter)[0];
                        $method = $routeRouter[$controller];

                        if (method_exists($controller, $method)) {
                            $find = true;
                            (new $controller)->$method($request);
                        }
                        break;
                    }
                }


            }
        }

        if ($find == false) {
            (new Error())->showError(404, 'Sorry , page not found');
        }
    }


}