<?php $this->_page_title = 'Devenir membre de mon Blog'; ?>

<p>Inscrivez vous : </p>

<form action="index.php?controler=backend&action=addMember" method="post">
    <label for ="name">Entrez votre nom : </label><br />
    <input type="text" name="memberName" id="name"><br />
    <label for ="email">Entrez votre email : </label><br />
    <input type="text" name="memberEmail" id="email"><br />
    <label for ="pass">Entrez un mot de passe : </label><br />
    <input type="password" name="memberPassword" id="pass"><br />
    <label for ="passConfirm">Confirmez votre mot de passe : </label><br />
    <input type="password" name="memberPasswordConfirm" id="passConfirm"><br />
    <input type="submit" value="Inscription">
</form>