<?php

use perou\blog\entities\Autoloader;
use perou\blog\framework\Router;

require_once('Autoloader.php');
Autoloader::register();

session_start();
var_dump($_COOKIE['cookieMember']);
var_dump($_SESSION['sessionMember']);
$router = new Router;
$router->routRequest();