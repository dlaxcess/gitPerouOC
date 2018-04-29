<?php $this->_page_title = 'Connexion à mon Blog'; ?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <form class="well center-block" id="connexionForm" action="index.php?controler=backend&action=connect" method="post">
            <span class="label label-danger center-block"><?= $connexionMsg ?></span>
            <legend>Connectez vous</legend>
            <div class="form-group"" id="divEmail">
                <label for ="email">Entrez votre email</label>
                <input type="email" class="form-control" name="memberEmail" id="email">
            </div>
            <div class="alert alert-block alert-danger" id="emailVerif" style="display:none">
                <h4>Erreur !</h4>
                Vous devez entrer une adresse valide ! 
            </div>
            <div class="form-group" id="divPass">
                <label for ="pass">Entrez votre mot de pass</label>
                <input type="password" class="form-control" name="memberPassword" id="pass">
            </div>
            <div class="alert alert-block alert-danger" id="passCaracAmount" style="display:none">
                <h4>Erreur !</h4>
                Vous devez entrer au moins 6 caractères ! 
            </div>
            <div class="form-group" id="divAutoConnect">
                <label for="autoconnect">Connexion automatique</label><input type="checkbox" name="autoconnect" id="autoconnect">
            </div>
            <button type="submit" class="btn btn-default center-block">Connexion</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <p>Pas encore membre? <a href="index.php?controler=backend&action=registration" title="Inscription">Inscrivez vous</a></p>
    </div>
</div>