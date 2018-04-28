<?php $this->_page_title = 'Devenir membre du blog de Jean Forteroche'; ?>

<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
    <form class="well center-block" id="regitrationForm" action="index.php?controler=backend&action=addMember" method="post">
        <legend>Inscrivez vous</legend>
        <div class="form-group" id="divName">
            <label for ="name">Entrez votre nom : </label>
            <input type="text" class="form-control" name="memberName" id="name">
        </div>
        <div class="alert alert-block alert-danger" id="emptyName" style="display:none">
            <h4>Erreur !</h4>
            Veuillez renseigner votre nom ! 
        </div>
        <div class="form-group" id="divEmail">
            <label for ="email">Entrez votre email : </label>
            <input type="text" class="form-control" name="memberEmail" id="email">
        </div>
        <div class="alert alert-block alert-danger" id="emailVerif" style="display:none">
            <h4>Erreur !</h4>
            Vous devez entrer une adresse valide ! 
        </div>
        <div class="alert alert-block alert-danger" id="differentEmail" style="display:none">
            <h4>Erreur !</h4>
            Vous devez entrer deux fois la même adresse ! 
        </div>
        <div class="form-group">
            <label for ="emailConfirm">Confirmez votre email : </label>
            <input type="text" class="form-control" name="memberEmailConfirm" id="emailConfirm">
        </div>
        <div class="form-group" id="divPass">
            <label for ="pass">Entrez un mot de passe : </label>
            <input type="password" class="form-control" name="memberPassword" id="pass">
            <p class="help-block">Au moins 6 caractères</p>
        </div>
        <div class="alert alert-block alert-danger" id="passCaracAmount" style="display:none">
            <h4>Erreur !</h4>
            Vous devez entrer au moins 6 caractères ! 
        </div>
        <div class="alert alert-block alert-danger" id="differentPass" style="display:none">
            <h4>Erreur !</h4>
            Veuillez entrer deux fois le même mot de passe ! 
        </div>
        <div class="form-group">
            <label for ="passConfirm">Confirmez votre mot de passe : </label>
            <input type="password" class="form-control" name="memberPasswordConfirm" id="passConfirm">
        </div>
        <button type="submit" class="btn btn-default center-block">Inscription</button>
    </form>
</div>

