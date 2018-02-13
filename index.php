<?php

use perou\blog\entities\Autoloader;
use perou\blog\controler\Router;

require_once('entities/Autoloader.php');
Autoloader::register();

$routeur = new Router;
$routeur->routerRequete();