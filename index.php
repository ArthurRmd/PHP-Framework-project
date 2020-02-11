<?php

use App\Core\Connexion;
use App\Core\Router;

session_start();
require_once 'Autoload.php';
Autoload::register();

require 'config.php';

require 'routes.php';

Router::start($routes);

