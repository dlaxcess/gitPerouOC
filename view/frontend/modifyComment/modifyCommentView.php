<?php $this->_page_title = 'Modification du commentaire'; ?>

<a href="index.php?controler=frontend&action=post&post_id=<?= $post->post_id() ?>">Retour à l'article</a>

    <div class="news">
        <h3>
            <?= $post->post_title() ?>
            <em>le <?= $post->post_creation_date() ?></em>
        </h3>
        
        <p>
            <?= $post->post_content() ?>
            <br />
            <strong><?= $post->post_author() ?></strong> 
        </p>
    </div>

    <div>
        <h2>Modifier le commentaires</h2>
        <strong>Bienvenue <?= $toModifyComment->comment_author() ?></strong>
        <p>Entrez le nouveau commentaire :</p><br />
        <form action="index.php?controleur=frontend&action=modifyComment&amp;post_id=<?= $post->post_id() ?>&amp;comment_id=<?= $toModifyComment->comment_id() ?>" method="post">
            <label for="new_comment">Nouveau commentaire :</label><br /><textarea name="new_comment" id="new_comment" autofocus/><?= $toModifyComment->comment() ?></textarea><br />
            <input type="submit" value="Poster le nouveau commentaire">
        </form>
    </div>