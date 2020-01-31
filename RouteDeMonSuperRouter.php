<?php

use App\Core\MonSuperRouter;


MonSuperRouter::setDefaultNamespace('/PHP-Framework-project');

MonSuperRouter::get('/customer', 'App\Customer@index');
MonSuperRouter::get('/contact', 'App\Contact@index') ;
MonSuperRouter::get('/seller', 'App\Seller@index');

MonSuperRouter::start();

?>