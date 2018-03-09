<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

/**
 * Description of Request
 *
 * @author minibee
 */
class Request
{
  // paramètres de la requête
    private $_parameters;

    public function __construct($parameters)
    {
    $this->_parameters = $parameters;
    }

  // Renvoie vrai si le paramètre existe dans la requête
    public function existParameter($name)
    {
    return (isset($this->_parameters[$name]) && $this->_parameters[$name] != "");
    }

  // Renvoie la valeur du paramètre demandé
  // Lève une exception si le paramètre est introuvable
    public function getParameter($name)
    {
        if ($this->existParameter($name))
        {
            return $this->_parameters[$name];
        }
        else
        {
             throw new \Exception("Paramètre '$name' absent de la requête");
        }
    }
    
    public function getAllParam() {
        return $this->_parameters;
    }
}
