<?php

use perou\blog\entities\Autoloader;
use perou\blog\framework\Router;

require_once('Autoloader.php');
Autoloader::register();

session_start();
$router = new Router;
$router->routRequest();