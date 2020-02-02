<?php


class Autoload
{

    public static function register()
    {
        spl_autoload_register(function($className) {
            require_once (lcfirst(str_replace('\\', DS, $className)))    . '.php';
        });
    }

}