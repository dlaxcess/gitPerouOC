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
    
    public function __construct($action, Member $connectedMember = null) {
        if ($connectedMember != NULL) {
            if ($connectedMember->member_acces() == 'admin') {
                $commentModeration = new CommentManager();
                $reportedComments = $commentModeration->countReportedComment();
                $moderatedComments = $commentModeration->countModeratedComment();
                ob_start();
                
                echo '<nav class="navbar navbar-inverse" id="navbar" role="navigation">
                            <div class="navbar-header navbar-right header-padding-sm" id="navHeaderTop">   
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
                                <span class="navbar-brand">Bienvenue ' . $connectedMember->member_name() . '</span>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarTop">
                                <div class="container-fluid">
                                    <ul class="nav navbar-nav">
                                        <li';
                                            if ($action == 'listPosts') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                                        <li';
                                            if ($action == 'connexion') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                        <li><a href="index.php?controler=backend&action=logout">déconnexion</a></li>
                                        <li';
                                            if ($action == 'profil') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php?controler=backend&action=profil" title="profil">Gérer mon profil</a></li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="row" id="navbarDown">
                                <div class="col-sm-12 col-xs-8">
                                    <div class="container-fluid backgroundWhite">
                                        <div><span class="pull-right-sm"><a href="index.php?controler=backend&action=showModeratedComments" class="showComments"><span class="badge">' . $moderatedComments . '</span> commentaires modéré(s)</a></span></div>
                                        <div><span class="pull-right-sm"><a href="index.php?controler=backend&action=showReportedComments" class="showComments"><span class="badge">' . $reportedComments . '</span> commentaires signalé(s)</a></span></div>
                                    </div>
                                </div>';
                        if ($action == 'listPosts') {
                            echo '<div class="col-sm-12 col-xs-4" id="newPostBar">
                                        <div class="container-fluid pull-right-sm"><button data-toggle="modal" href="#newPost" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-pencil"></span></button></div>
                                    </div>';
                        }
                        echo '</div>
                        </nav>';
        
                $this->_personalBar = ob_get_clean();
            }
            else {
                ob_start();
                
                echo '<nav class="navbar navbar-inverse" id="navbar" role="navigation">
                            <div class="navbar-header navbar-right header-padding-sm" id="navHeaderTop">   
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
                                <span class="navbar-brand">Bienvenue ' . $connectedMember->member_name() . '</span>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarTop">
                                <div class="container-fluid">
                                    <ul class="nav navbar-nav">
                                        <li';
                                            if ($action == 'listPosts') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                                        <li';
                                            if ($action == 'connexion') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                        <li><a href="index.php?controler=backend&action=logout">déconnexion</a></li>
                                        <li';
                                            if ($action == 'profil') {
                                                echo ' class="active"';
                                            }
                                    echo '><a href="index.php?controler=backend&action=profil" title="profil">Gérer mon profil</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </nav>';
        
                $this->_personalBar = ob_get_clean();
            }
        }
        else {
            ob_start();
            
            echo '<nav class="navbar navbar-inverse" id="navbar" role="navigation">
                        <div class="navbar-header navbar-right header-padding-sm" id="navHeaderTop"> 
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarTop">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav">
                                    <li';
                                        if ($action == 'listPosts') {
                                            echo ' class="active"';
                                        }
                                echo '><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                                    <li';
                                        if ($action == 'connexion') {
                                            echo ' class="active"';
                                        }
                                echo '><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>';
        
            $this->_personalBar = ob_get_clean();
        }
    }
    

    public function get() {
        return $this->_personalBar;
    }
}
