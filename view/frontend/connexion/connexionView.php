<?php $this->_page_title = 'Connexion à mon Blog'; ?>

<p>Connectez vous : </p>

<form action="index.php?controler=backend&action=connect" method="post">
    <label for ="name">Entrez votre nom : </label><br />
    <input type="text" name="memberName" id="name" autofocus required><br />
    <label for ="email">Entrez votre email : </label><br />
    <input type="text" name="memberEmail" id="email" required><br />
    <label for ="pass">Entrez votre mot de pass : </label><br />
    <input type="text" name="memberPassword" id="pass" required><br />
    <label for="autoconnect">Connexion automatique</label><input type="checkbox" name="autoconnect" id="autoconnect">
    <input type="submit" value="Connexion">
</form>

<p>Pas encore membre? <a href="index.php?controler=backend&action=registration" title="Inscription">Inscrivez vous</a></p>