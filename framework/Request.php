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
    private $parameters;

    public function __construct($parameters)
    {
    $this->parameters = $parameters;
    }

  // Renvoie vrai si le paramètre existe dans la requête
    public function existParameter($name)
    {
    return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

  // Renvoie la valeur du paramètre demandé
  // Lève une exception si le paramètre est introuvable
    public function getParameter($name)
    {
        if ($this->existParameter($name))
        {
            return $this->parametres[$name];
        }
        else
        {
             throw new Exception("Paramètre '$name' absent de la requête");
        }
    }
}
