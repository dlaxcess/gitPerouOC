<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\view;

/**
 * Description of PersonalBar
 *
 * @author dlaxc
 */
class PersonalBar {
    
    private $_connectedMember;
    
    public function __construct(Member $member = null) {
        if ($member != null) {
            $this->_connectedMember = $member;
        }
    }
    
    public function get() {
        if (isset($this->_connectedMember)) {
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $this->_connectedMember->member_name() . '<a href="index.php?controler=backend&action=profil&memberId=' . $this->_connectedMember->member_id() . '" title="profil">Gérer mon profil</a>';
        
            return ob_get_clean();
        }
        else {
        ob_start();
        
        echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>';
        
        return ob_get_clean();
        }
    }
}
