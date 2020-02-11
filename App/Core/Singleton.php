<?php


namespace App\Core;


abstract class Singleton
{

    /**
     * Instance de l'objet qui hérite de la classe
     */
    public static $instance;


    /**
     * @return mixed
     */
    public static function getInstance()
    {

        if (!self::$instance) {
            $class = get_called_class();
           self::$instance = new $class();

        }

        return self::$instance;

    }


}