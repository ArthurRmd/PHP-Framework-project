<?php

use App\Core\Router;

require 'vendor/autoload.php';

require_once 'Autoload.php';
Autoload::register();


require 'config.php';
require 'routes.php';

Router::start($routes);

