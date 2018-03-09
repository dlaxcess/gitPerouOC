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

    public function get() {
        if (isset($_SESSION['sessionMember'])) {
            $connectedMember = $_SESSION['sessionMember'];
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $connectedMember->member_name() . '<a href="index.php?controler=backend&action=profil&id=' . $connectedMember->member_id() . '" title="profil">Gérer mon profil</a>';
        
            return ob_get_clean();
        }
        elseif (isset($_COOKIE['cookieMember'])) {
            $connectedMember = $_COOKIE['cookieMember'];
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $connectedMember->member_name();
        
            return ob_get_clean();
        }
        else {
        ob_start();
        
        echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>';
        
        return ob_get_clean();
        }
    }
}
