<?php

require_once  '../vendor/autoload.php';

$routes = require_once  '../routes/api.php';

$router = new Core\Router($routes);
$router->exec();