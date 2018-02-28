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
        if (isset($_SESSION['sessionMemberName'])) {
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $_SESSION['sessionMemberName'];
        
            return ob_get_clean();
        }
        elseif (isset($_COOKIE['cookieMemberName'])) {
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $_COOKIE['cookieMemberName'];
        
            return ob_get_clean();
        }
        else {
        ob_start();
        
        echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>';
        
        return ob_get_clean();
        }
    }
}
