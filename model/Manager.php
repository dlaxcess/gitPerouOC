<?php

/**
 * Connect to the data base.
 *
 * This method will instense an object which contains
 * the data of the database.
 * dbname = mvc
 * id = root
 * pass = ''
 *
 * @param void
 *
 * @return PDO $db
 *	Data base in an object
 */

namespace perou\blog\model;

use perou\blog\entities\Autoloader;
use perou\blog\framework\Configuration;

require_once('entities/Autoloader.php');
Autoloader::register();
require_once('framework/Configuration.php');

abstract Class Manager
{
  private static $_bdd;

  protected function executerRequete($sql, $params = null)
  {
    if ($params == null)
    {
      $resultat = $this->getBdd()->query($sql);    // ex�cution directe
    }
    else 
    {
      $resultat = $this->getBdd()->prepare($sql);  // requ�te pr�par�e
      $resultat->execute($params);
    }
    return $resultat;
  }

  // Renvoie un objet de connexion � la BD en initialisant la connexion au besoin
  private static function getBdd()
  {
    if (self::$_bdd == null)
    {
        $dns = Configuration::get('dns');
        $login = Configuration::get('login');
        $mdp = Configuration::get('mdp');
      // Cr�ation de la connexion
        self::$_bdd = new \PDO($dns, $login, $mdp, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
    }
    return self::$_bdd;
  }
}