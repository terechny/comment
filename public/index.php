<?php

require_once  '../config.php';
require_once  '../vendor/autoload.php';

$router = new \Core\Router( \Routes\Routes::list());

$router->exec();
