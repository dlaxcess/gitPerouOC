<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$action = 'listPosts';
    if (isset($request) && $request->existParameter('action')) {
        $action = $request->getParameter('action');
    }

if (isset($request) && $request->existParameter('connectedMember')) {
    $connectedMember = $request->getParameter('connectedMember');
    if ($connectedMember->member_acces() === 'admin' OR $connectedMember->member_acces() === 'member' ) {
?>

<nav class="navbar navbar-inverse" id="navbar" role="navigation">
    <div class="navbar-header navbar-right header-padding-sm" id="navHeaderTop">   
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand">Bienvenue <?= $connectedMember->member_name() ?></span>
    </div>
    <div class="collapse navbar-collapse" id="navbarTop">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li<?php if ($action == 'listPosts') { ?> class="active"<?php } ?>><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                <li<?php if ($action == 'connexion') { ?> class="active"<?php } ?>><a href="index.php?controler=backend&action=connexion">connexion</a></li>
                <li><a href="index.php?controler=backend&action=logout">déconnexion</a></li>
                <li<?php if ($action == 'profil') { ?> class="active"<?php } ?>><a href="index.php?controler=backend&action=profil" title="profil">Gérer mon profil</a></li> 
            </ul>
        </div>
    </div>
    <?php } 
    if ($connectedMember->member_acces() === 'admin') {
    ?>
    
    <div class="row" id="navbarDown">
        <div class="col-sm-12 col-xs-8">
            <div class="backgroundWhite">
                <div><span class="pull-right-sm"><a href="index.php?controler=backend&action=showModeratedComments" class="showComments"><span class="badge"><?= $moderatedComments ?></span> commentaires modéré(s)</a></span></div>
                <div><span class="pull-right-sm"><a href="index.php?controler=backend&action=showReportedComments" class="showComments"><span class="badge"><?= $reportedComments ?></span> commentaires signalé(s)</a></span></div>
            </div>
        </div>
        <?php if ($action == 'listPosts') { ?>
            <div class="col-sm-12 col-xs-4" id="newPostBar">
                <div class="pull-right"><button data-toggle="modal" href="#newPost" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-pencil"></span></button></div>
            </div>
        <?php 
        }
    } ?>
    </div>
</nav>

<?php }
else {       
?>

<nav class="navbar navbar-inverse" id="navbar" role="navigation">
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
                <li<?php if ($action == 'listPosts') { ?> class="active"<?php } ?>><a href="index.php"><i class="fa fa-home" style="color: #9d9d9d"></i> Accueil</a></li>
                <li<?php if ($action == 'connexion') { ?> class="active"<?php } ?>><a href="index.php?controler=backend&action=connexion">connexion</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php } ?>