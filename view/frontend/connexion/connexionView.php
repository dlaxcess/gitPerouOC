<?php $this->_page_title = 'Connexion à mon Blog'; ?>

<p>Connectez vous : </p>

<form action="" method="post">
    <label for ="name">Entrez votre nom : </label><br />
    <input type="text" name="memberName" id="name"><br />
    <input type="submit" value="Connexion">
</form>

<p>Pas encore membre? <a href="index.php?controler=backend&action=registration" title="Inscription">Inscrivez vous</a></p>