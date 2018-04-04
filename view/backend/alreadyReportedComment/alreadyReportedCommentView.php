<?php $this->_page_title = 'Commentaire déja signalé'; ?>

<p>Ce commentaire a déjà été signalé</p>
<a href="index.php?controleur=frontend&action=post&id=<?= $commentToReport->post_id() ?>">Retour à l'article</a>