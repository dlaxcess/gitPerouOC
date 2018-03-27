<?php 
$this->_page_title = 'Mon Blog/article ' . $post->post_id();
?>

<p>Billets n° : <?= $post->post_id() ?></p>
<a href="index.php">Retour aux billets</a>

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
        <h2>Commentaires</h2>
        <p>Ajoutez un commentaire :</p>
        <form action="index.php?controler=frontend&action=addComment&amp;id=<?= $post->post_id() ?>" method="post">
            <label for="pseudo">Votre pseudo :</label><br />
            <input type="text" name="comment_author" id="pseudo" <?php
            if (isset($request)) {
                if ($request->existParameter('sessionMember')) {
                    echo 'value="' . $request->getParameter('sessionMember')->member_name() . '"';
                }
                if (!$request->existParameter('sessionMember') && $request->existParameter('cookieMember')){
                    $member = unserialize($request->getParameter('cookieMember'));
                    echo 'value="' . $member->member_name() . '"';
                }
            }
            ?>><br />
            <label for="comment">Commentaire</label><br />
            <textarea name="comment" id="comment"></textarea>
            <input type="submit" value="Poster le commentaire">
        </form>

        <?php
        foreach ($comments AS $comment)
        {
            echo '<p><strong>[' . $comment->comment_date() . '] ' . $comment->comment_author() . ' : </strong>(<a href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $post->post_id() . '">modifier</a>)<br />' . $comment->comment() . '</p>';
        }
        ?>
    </div>