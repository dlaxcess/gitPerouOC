<?php $this->_page_title = 'Modification du commentaire'; ?>

<a href="index.php?controler=frontend&action=post&post_id=<?= $post->post_id() ?>">Retour à l'article</a>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="row">
                    <div class="col-md-6">
                        <span class="pull-left" style="text-align: left"><?= $post->post_title() ?></span>
                    </div>
                    <div class="col-md-6">
                        <em class="pull-right"><small>le <?= $post->post_creation_date() ?></small></em>
                    </div>
                </div>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <?= $post->post_content() ?>
                </div>
            </div>
            <small class="pull-right"><strong><?= $post->post_author() ?></strong></small>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <strong>Commentaire de <?= $toModifyComment->comment_author() ?></strong>
        <form class="well center-block" action="index.php?controler=backend&action=modifyComment&amp;post_id=<?= $post->post_id() ?>&amp;comment_id=<?= $toModifyComment->comment_id() ?><?php if (isset($oldAction)){echo '&oldAction=' . $oldAction;} ?>" method="post">
            <legend>Entrez le nouveau commentaire</legend>
            <div class="form-group">
                <label for="new_comment">Nouveau commentaire :</label>
                <textarea name="new_comment" class="form-control" id="new_comment" autofocus/><?= $toModifyComment->comment() ?></textarea>
            </div>
            <button type="submit" class="btn btn-default center-block">Poster le nouveau commentaire</button>
        </form>
        </div>
    </div>
</div>