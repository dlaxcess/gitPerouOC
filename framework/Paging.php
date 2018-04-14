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
    
    public function __construct($postAmount, $pageId) {
        if (is_int($postAmount) && $postAmount > 0 && $postAmount < 1000) {
            $this->_PostAmount = $postAmount;
        }
        else {
            throw new Exception("Le nombre de posts renseigné n'est pas un entier positif ou est trop important");
        }
        $this->_pagesAmount = ceil(($postAmount)/5);
        $this->_paging = '<ul class="pagination pagination-sm">';
        if ($pageId > 1) {
            $this->_paging .= '<li><a href="index.php?id=' . strval($pageId - 1) . '">&laquo;</a></li>';
        }
        else {
            $this->_paging .= '<li class="disabled"><span style="background-color: lightgrey">&laquo;</span></li>';
        }
        for ($i = 1; $i <= $this->_pagesAmount; $i++) {
            if ($i == $pageId) {
                $this->_paging .=  '<li class="active"><a href="index.php?id=' . strval($i) . '">' . strval($i) . '</a></li> ';
            }
            else {
                $this->_paging .=  '<li><a href="index.php?id=' . strval($i) . '">' . strval($i) . '</a></li> ';
            }
        }
        if ($pageId != $this->_pagesAmount) {
            $this->_paging .= '<li><a href="index.php?id=' . strval($pageId + 1) . '">&raquo;</a></li>';
        }
        else {
            $this->_paging .= '<li class="disabled"><span style="background-color: lightgrey">&raquo;</span></li>';
        }
        $this->_paging .= '</ul>';
    }
    
    public function __toString() {
        return $this->_paging;
    }
}
