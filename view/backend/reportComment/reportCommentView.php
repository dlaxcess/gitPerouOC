<?php $this->_page_title = 'Signaler un commentaire'; ?>

<a href="index.php?controler=frontend&action=post&id=<?= $commentToReport->post_id() ?>">Retour à l'article</a>
 
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <p>Signaler le commentaire de : <strong><?= $commentToReport->comment_author() ?></strong></p>
        
        <form class="well center-block" id="reportForm" action="index.php?controler=backend&amp;action=sendCommentedReport&amp;commentId=<?= $commentToReport->comment_id() ?>" method="post">
            <legend>
                <p>Commentaire :<br /><?= $commentToReport->comment() ?></p>
            </legend>
            <div class="form-group">
                <label for="report">Précisez la raison du signalement</label>
                <Textarea name="reportContent" id="report" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default center-block">Signaler le commentaire</button>
        </form>
    </div>
</div>