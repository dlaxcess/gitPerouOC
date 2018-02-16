<?php

use perou\blog\entities\Autoloader;
use perou\blog\framework\Router;

require_once('entities/Autoloader.php');
Autoloader::register();

$router = new Router;
$router->routRequest();