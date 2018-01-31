<?php

namespace perou\blog\model;

class View
{
	private $_fichier;
	private $_title;

	public function __construct($action)
	{
		$this->_fichier = 'view/frontend/' . $action . 'View.php';
	}

	public function generer($donnees)
	{
		$page_content = $this->genererFichier($this->_fichier, $donnees);

		$vue = $this->genererFichier('view/frontend/template.php', array('page_title' =>$this->_title, 'page_content' =>$page_content));
		echo $vue;
	}

	private function genererFichier($_fichier, $donnees)
	{
		if (file_exists($_fichier))
		{
			extract($donnees);

			ob_start();
			require($_fichier);

			return ob_get_clean();
		}
		else
		{
			throw new Exception("Fichier : '$_fichier' introuvable");
			
		}
	}
}