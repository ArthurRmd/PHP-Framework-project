<?php


namespace App\Controller;

class Customer
{
    public static function test()
    {
        echo 'Customer <br>';
    }

    public function index()
    {
        dump('Customer');
    }

    public function get()
    {
        echo 'get';
    }


    public function post()
    {
        echo 'post';
    }
}