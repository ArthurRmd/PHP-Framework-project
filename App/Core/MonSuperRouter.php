<?php

namespace App\Core;

class MonSuperRouter
{

    public static $routes = array();
    private static $config;
    private static $defaultNamespace = '';


    public static function setDefaultNamespace($defaultNamespace) :void
    {
        self::$defaultNamespace = $defaultNamespace;
    }

    public static function start() :void
    {
        self::$config = $_SERVER;
        $method = self::$config['REQUEST_METHOD'];
        $url = self::$config['REQUEST_URI'];

        foreach (self::$routes as $route) {
            if ($route->match($method, $url)) {
                $route->execute();
            }
        }
    }


    private static function addRoute($method, $url, $callback) :void
    {
        array_push(self::$routes, new Route($method, self::$defaultNamespace . $url, $callback));
    }

    public static function get($url, $callback)
    {
        self::addRoute('GET', $url, $callback);
    }

    public static function post($url, $callback)
    {
        self::addRoute('POST', $url, $callback);
    }

    public static function put($url, $callback)
    {
        self::addRoute('PUT', $url, $callback);
    }

    public static function delete($url, $callback)
    {
        self::addRoute('DELETE', $url, $callback);
    }

    public static function all($url, $callback)
    {
        self::addRoute('ALL', $url, $callback);
    }


}