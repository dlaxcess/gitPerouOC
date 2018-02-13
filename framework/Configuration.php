<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuration
 *
 * @author minibee
 */
namespace perou\blog\framework;

class Configuration 
{
    private static $_parameters;
    
    public static function get($name, $defaultValue = null)
    {
        if(isset(self::getParameters() [$name]))
        {
            $value = self::getParameters() [$name];
        }
        else 
        {
            $value = $defaultValue;
        }
        
        return $value;
    }
    
    private static function getParameters()
    {
        if (self::$_parameters == null)
        {
            $filePath = "config/prod.ini";
            if (!file_exists($filePath))
            {
                $filePath = "config/dev.ini";
            }
            if (!file_exists($filePath))
            {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else
            {
                self::$_parameters = parse_ini_file($filePath);
            }
        }
        
        return self::$_parameters;
    }
}
