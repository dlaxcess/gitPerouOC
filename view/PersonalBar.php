<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\view;

use perou\blog\entities\Member;
use perou\blog\model\CommentManager;

/**
 * Description of PersonalBar
 *
 * @author dlaxc
 */
class PersonalBar {
    
    private $_personalBar;
    
    public function __construct(Member $connectedMember = null) {
        if ($connectedMember != NULL) {
            if ($connectedMember->member_acces() == 'admin') {
                $commentModeration = new CommentManager();
                $reportedComments = $commentModeration->countReportedComment();
                $moderatedComments = $commentModeration->countModeratedComment();
                ob_start();
        
                echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $connectedMember->member_name() . '<a href="index.php?controler=backend&action=profil&id=' . $connectedMember->member_id() . '" title="profil">Gérer mon profil</a>';
                echo '<br />Vous avez <a href="index.php?controler=backend&action=showReportedComments">' . $reportedComments . ' commentaires signalé(s)</a>';
                echo '<br />Vous avez <a href="index.php?controler=backend&action=showModeratedComments">' . $moderatedComments . ' commentaires modéré(s)</a>';
        
                $this->_personalBar = ob_get_clean();
            }
            else {
                ob_start();
        
                echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>  <a href="index.php?controler=backend&action=logout">déconnexion</a><br /> Bienvenue ' . $connectedMember->member_name() . '<a href="index.php?controler=backend&action=profil&id=' . $connectedMember->member_id() . '" title="profil">Gérer mon profil</a>';
        
                $this->_personalBar = ob_get_clean();
            }
        }
        else {
            ob_start();
        
            echo '<a href="index.php">Accueil</a> <a href="index.php?controler=backend&action=connexion">connexion</a>';
        
            $this->_personalBar = ob_get_clean();
        }
    }
    

    public function get() {
        return $this->_personalBar;
    }
}
