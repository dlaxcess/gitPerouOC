<?php

use perou\blog\entities\Autoloader;
use perou\blog\controler\Router;

require_once('entities/Autoloader.php');
Autoloader::register();
/*require_once('controler/Router.php');*/

$routeur = new Router;
$routeur->routerRequete();