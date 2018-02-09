<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace perou\blog\entities;

abstract class Autoloader
{  
    public static function loadClass($class)
    {
       $class = str_replace('perou\\blog\\', '', $class);
       $class = str_replace('\\', '/', $class);
       $path = $class . '.php';
        if (file_exists($path))
        {
            require_once ($path);
        }
    }
    
    public static function register()
    {
        spl_autoload_register('static::loadClass');
    }
}
