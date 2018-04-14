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
                
                echo '<nav class="navbar navbar-inverse" id="navbar">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                                    <li><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                    <li><a href="index.php?controler=backend&action=logout">déconnexion</a></li>
                                    <li><a href="index.php?controler=backend&action=profil&id=' . $connectedMember->member_id() . '" title="profil">Gérer mon profil</a></li> 
                                </ul>
                                <span class="navbar-brand navbar-right">Bienvenue ' . $connectedMember->member_name() . '</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><span class="pull-right-sm"><a href="index.php?controler=backend&action=showReportedComments" class="showComments"><span class="badge">' . $reportedComments . '</span> commentaires signalé(s)</a></span></div>
                                <div class="col-xs-12"><span class="pull-right-sm"><a href="index.php?controler=backend&action=showModeratedComments" class="showComments"><span class="badge">' . $moderatedComments . '</span> commentaires modéré(s)</a></span></div>
                            </div>
                        </nav>';
        
                /*echo '<br />Vous avez <a href="index.php?controler=backend&action=showReportedComments">' . $reportedComments . ' commentaires signalé(s)</a>';
                echo '<br />Vous avez <a href="index.php?controler=backend&action=showModeratedComments">' . $moderatedComments . ' commentaires modéré(s)</a>';*/
        
                $this->_personalBar = ob_get_clean();
            }
            else {
                ob_start();
                
                echo '<nav class="navbar navbar-inverse" id="navbar">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Accueil</a></li>
                                    <li><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                    <li><a href="index.php?controler=backend&action=logout">déconnexion</a></li>
                                    <li><a href="index.php?controler=backend&action=profil&id=' . $connectedMember->member_id() . '" title="profil">Gérer mon profil</a></li> 
                                </ul>
                                <span class="navbar-brand navbar-right">Bienvenue ' . $connectedMember->member_name() . '</span>
                            </div>
                        </nav>';
        
                $this->_personalBar = ob_get_clean();
            }
        }
        else {
            ob_start();
            
            echo '<nav class="navbar navbar-inverse" id="navbar">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Accueil</a></li>
                                    <li><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                </ul>
                            </div>
                        </nav>';
        
            $this->_personalBar = ob_get_clean();
        }
    }
    

    public function get() {
        return $this->_personalBar;
    }
}
