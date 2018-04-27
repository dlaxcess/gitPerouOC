<?php $this->_page_title = 'Devenir membre du blog de Jean Forteroche'; ?>

<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
    <form class="well center-block" action="index.php?controler=backend&action=addMember" method="post">
        <legend>Inscrivez vous</legend>
        <div class="form-group">
            <label for ="name">Entrez votre nom : </label>
            <input type="text" class="form-control" name="memberName" id="name">
        </div>
        <div class="form-group">
            <label for ="email">Entrez votre email : </label>
            <input type="text" class="form-control" name="memberEmail" id="email">
        </div>
        <div class="form-group">
            <label for ="emailConfirm">Confirmez votre email : </label>
            <input type="text" class="form-control" name="memberEmailConfirm" id="emailConfirm">
        </div>
        <div class="form-group">
            <label for ="pass">Entrez un mot de passe : </label>
            <input type="password" class="form-control" name="memberPassword" id="pass">
        </div>
        <div class="form-group" id="divPass">
            <label for ="passConfirm">Confirmez votre mot de passe : </label>
            <input type="password" class="form-control" name="memberPasswordConfirm" id="passConfirm">
        </div>
        <button type="submit" class="btn btn-default center-block">Inscription</button>
        <div class="alert alert-block alert-danger" style="display:none">
            <h4>Erreur !</h4>
            Vous devez entrer au moins 4 caractères ! 
        </div>
    </form>
</div>

