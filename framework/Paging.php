<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

/**
 * Description of Paging
 *
 * @author Administrateur
 */
class Paging {
    private $_PostAmount,
              $_pagesAmount,
              $_paging;
    
    public function __construct($postAmount) {
        if (is_int($postAmount) && $postAmount > 0 && $postAmount < 1000) {
            $this->_PostAmount = $postAmount;
        }
        else {
            throw new Exception("Le nombre de posts renseigné n'est pas un entier positif ou est trop important");
        }
        $this->_pagesAmount = ceil(($postAmount)/5);
        for ($i = 1; $i <= $this->_pagesAmount; $i++) {
            $this->_paging = $this->_paging . '<a href="index.php?id=' . strval($i) . '">[ ' . strval($i) . ' ]</a> ';
        }
    }
    
    public function __toString() {
        return $this->_paging;
    }
}
