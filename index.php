<?php

use perou\blog\entities\Autoloader;
use perou\blog\controler\Router;

require_once('entities/Autoloader.php');

/* function loadClass($class)
    {
       $class = str_replace('perou\\blog\\', '', $class);
       $class = str_replace('\\', '/', $class);
       $path = $class . '.php';
        if (file_exists($path))
        {
            require_once ($path);
        }
    }

spl_autoload_register('loadClass');*/

/*require_once('controler/Router.php');*/

Autoloader::register();

$routeur = new Router;
$routeur->routerRequete();