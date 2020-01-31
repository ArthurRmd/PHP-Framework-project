<?php

use App\Core\Router2;
use App\Core\Route;
use App\Core\Router;

require 'vendor/autoload.php';

require_once 'Autoload.php';
Autoload::register();



//require 'App/Core/Router.php';
//require 'App/Core/Route.php';

require 'route.php';

//Router::start();

Router2::start($routes);
