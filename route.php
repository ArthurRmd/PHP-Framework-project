<?php


use App\Core\Router;

Router::setDefaultNamespace('/licence');

/*
//Router::get('/customer', 'App\Customer@index');
Router::get('/contact', 'App\Contact@index') ;
Router::get('/seller', 'App\Seller@index');

Router::get('/customer', 'App\Customer@get');
Router::post('/customer', 'App\Customer@post');
*/

$routes = [
    '/licence/contact' => [
        'App\Controller\Contact' => 'index'
    ],

    '/licence/customer' => [
        'App\Controller\Customer' => 'index'
    ],

    '/licence/seller' => [
        'App\Controller\Seller' => 'index'
    ],


];

