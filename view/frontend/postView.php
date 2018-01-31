<?php $this->_page_title = 'Mon Blog/article ' . $post['post_id']; ?>

<p>Billets n° : <?= $post['post_id'] ?></p>
<a href="index.php">Retour aux billets</a>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['post_title']) ?>
            <em>le <?= $post['post_creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['post_content'])) ?>
            <br />
            <strong><?= htmlspecialchars($post['post_author']) ?></strong> 
        </p>
    </div>

    <div>
        <h2>Commentaires</h2>
        <p>Ajoutez un commentaire :</p>
        <form action="index.php?action=addComment&amp;post_id=<?= $post['post_id'] ?>" method="post">
            <label for="pseudo">Votre pseudo :</label><br />
            <input type="text" name="comment_author" id="pseudo"><br />
            <label for="comment">Commentaire</label><br />
            <textarea name="comment" id="comment"></textarea>
            <input type="submit" value="Poster le commentaire">
        </form>

        <?php
        while ($comment = $comments->fetch())
        {
            echo '<p><strong>[' . $comment['comment_date_fr'] . '] ' . htmlspecialchars($comment['comment_author']) . ' : </strong>(<a href="index.php?action=modifyComment&comment_id=' . $comment['comment_id'] . '&post_id=' . $post['post_id'] . '">modifier</a>)<br />' . nl2br(htmlspecialchars($comment['comment'])) . '</p>';
        }
        $comments->closeCursor();
        ?>
    </div>