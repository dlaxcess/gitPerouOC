<?php 
$this->_page_title = 'Mon Blog/article ' . $post->post_id();
?>

<p>Billet n° : <?= $post->post_id() ?></p>
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
        <?php
        if ($request->existParameter('sessionMember') OR $request->existParameter('cookieMember')) {
        ?>
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
        }
        ?>

        <?php
        foreach ($comments AS $comment)
        {
            echo '<p';
            $reportedClass = '';
            if ($comment->comment_moderation() == 'reported') {
                if ($request->existParameter('sessionMember') && $request->getParameter('sessionMember')->member_acces() == 'admin') {
                    $reportedClass = ' class="reportedComment"';
                }
                if ($request->existParameter('cookieMember') && unserialize($request->getParameter('cookieMember'))->member_acces() == 'admin') {
                    $reportedClass = ' class="reportedComment"';
                }
            }
            if ($comment->comment_moderation() == 'moderated') {
                $reportedClass = ' class="moderatedComment"';
            }
            if ($reportedClass != ' class="moderatedComment"') {
                echo $reportedClass . '><strong>[' . $comment->comment_date() . '] ' . $comment->comment_author() . ' : </strong><a href="index.php?controler=backend&action=reportComment&commentId=' . $comment->comment_id() . '">"Signaler"</a> ';
            }
            else {
                echo $reportedClass . '>Ce Commentaire a été modéré';
            }
            
            if ($request->existParameter('sessionMember') OR $request->existParameter('cookieMember')) {
                    if ($request->existParameter('sessionMember')) {
                        $connectedMemberName = $request->getParameter('sessionMember')->member_name();
                        $memberAcces = $request->getParameter('sessionMember')->member_acces();
                    }
                    if ($request->existParameter('cookieMember')) {
                        $connectedMemberName = unserialize($request->getParameter('cookieMember'))->member_name();
                        $memberAcces = unserialize($request->getParameter('cookieMember'))->member_acces();
                    }
                    if ($memberAcces == 'admin') {
                        echo '(<a href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $post->post_id() . '">modifier</a>)';
                        echo ' <a href="index.php?controler=backend&action=validateSupression&id=' . $post->post_id() . '&comment_id=' . $comment->comment_id() . '&oldAction=post">[ Supprimer ]</a>';
                        echo ' <a href="index.php?controler=backend&action=moderateCommentFromPost&id=' . $post->post_id() . '&commentId=' . $comment->comment_id() . '">[ Modérer ]</a>';
                        echo ' <a href="index.php?controler=backend&action=acceptCommentFromPost&id=' . $post->post_id() . '&commentId=' . $comment->comment_id() . '">[ Valider ]</a>';
                    }
                    else {
                        if($comment->comment_author() == $connectedMemberName){
                            echo '(<a href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $post->post_id() . '">modifier</a>)';
                        }
                    }
            }
            echo '<br />';
            if ($reportedClass != ' class="moderatedComment"') {
                echo $comment->comment() . '</p>';
            }
            else {
                echo 'Modéré';
            }
        }
        ?>
    </div>