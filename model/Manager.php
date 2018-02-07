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

abstract Class Manager
{
  private $bdd;

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
  protected function getBdd()
  {
    if ($this->bdd == null)
    {
      // Cr�ation de la connexion
      $this->bdd = new \PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }

}





/*
	protected function dbConnect()
	{
	        $db = new \PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '');

	    return $db;
	}
}*/