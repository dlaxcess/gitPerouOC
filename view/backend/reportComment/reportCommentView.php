<?php $this->_page_title = 'Signaler un commentaire'; ?>

<p>Signaler le commentaire de : <strong><?= $commentToReport->comment_author() ?></strong></p>
<p>Commentaire : <?= $commentToReport->comment() ?></p>
 
<div>
    <form action="index.php?controler=backend&amp;action=sendCommentedReport&amp;commentId=<?= $commentToReport->comment_id() ?>" method="post">
        <label for="report">Précisez la raison du signalement :</label><br />
        <Textarea name="reportContent" id="report"></textarea><br />
        <input type="submit" value="Signaler le commentaire">
    </form>
</div>
 
<a href="index.php?controler=backend&action=post&id=<?= $commentToReport->post_id() ?>">Retour à l'article</a>