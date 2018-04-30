<?php $this->_page_title = 'Modifier un post'; ?>

<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <a href="index.php?controler=frontend&action=listPosts" title="retour au post">Retour au posts</a>
        <form class="well center-block" action="index.php?controler=backend&action=updatePost&id=<?= $postToModify->post_id() ?>" method="post">
            <legend>Modifier l'article</legend>
            <div class="form-group">
                <label for="postToModifTitle">Titre du post</label>
                <input type="text" name="postToModifTitle" class="form-control" id="postToModifTitle" size="100" value="<?= $postToModify->post_title() ?>" required>
            </div>
            <div class="form-group">
                <label for="postToModifContent">Contenu de l'article</label>
                <textarea name="postToModifContent" class="form-control" id="postToModifContent" cols="100" required><?= $postToModify->post_content() ?></textarea>
            </div>
            <div class="form-group">
                <label for="postToModifDate">Date de l'article</label>
                <input type="datetime-local" name="postToModifDate" class="form-control" value="<?= $postToModify->post_creation_date() ?>" step="1">
            </div>
            <button type="submit" class="btn btn-default center-block">Modifier l'article</button>
        </form>
        
    </div>
</div>
