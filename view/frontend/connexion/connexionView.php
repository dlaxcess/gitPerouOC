<?php $this->_page_title = 'Connexion à mon Blog'; ?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <form class="well center-block" action="index.php?controler=backend&action=connect" method="post">
            <legend>Connectez vous</legend>
            <div class="form-group">
                <label for ="name">Entrez votre nom : </label>
                <input type="text" class="form-control" name="memberName" id="name" autofocus required>
            </div>
            <div class="form-group">
                <label for ="email">Entrez votre email : </label>
                <input type="email" class="form-control" name="memberEmail" id="email" required>
            </div>
            <div class="form-group">
                <label for ="pass">Entrez votre mot de pass : </label>
                <input type="password" class="form-control" name="memberPassword" id="pass" required>
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