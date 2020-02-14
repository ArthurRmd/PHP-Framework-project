<?php

$routes = [

    '/PHP-Framework-project/' => [
        'App\Controller\Home' => 'index',
    ],

    '/PHP-Framework-project/contact' => [
        'App\Controller\Contact' => 'index',
    ],

    '/PHP-Framework-project/show-contact' => [
        'App\Controller\Contact' => 'show'
    ],

    '/PHP-Framework-project/show-all-contact' => [
        'App\Controller\Contact' => 'showAll'
    ],

    '/PHP-Framework-project/contact/{id}' => [
        'App\Controller\Contact' => 'getById',
        'option' => [
            'id'=> 'number'
        ]
    ],

    '/PHP-Framework-project/contact_1/{id}/contact_2/{id_2}' => [
        'App\Controller\Contact' => 'getByTwoId'
    ],


];

