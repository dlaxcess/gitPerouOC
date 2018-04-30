<?php $this->_page_title = 'Jean Forteroche - Billet simple pour l\'Alaska - parutions'; ?>

<p>parution n° : <?= $post->post_id() ?></p>
<a href="index.php">Retour aux billets</a>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?= $post->post_title() ?>
                <em>le <?= $post->post_creation_date() ?></em>
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
        <div  id="reportValidationMsg">
            <span class="label label-success center-block"><?= $reportValidationMsg ?></span>
        </div>
    </div>

    <div class="row">
        <h3>Commentaires</h3>
        <?php
        if ($request->existParameter('connectedMember')) {
        ?>
        <form class="col-sm-6 well" id="addCommentForm" action="index.php?controler=backend&action=addComment&amp;id=<?= $post->post_id() ?>" method="post">
            <legend>Ajoutez un commentaire</legend>
            <div class="form-group" id="divCommentPseudo">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" name="comment_author" id="pseudo" <?php echo 'value="' . $request->getParameter('connectedMember')->member_name() . '"'; ?>>
            </div>
            <div class="alert alert-block alert-danger" id="addCommentAuthor" style="display:none">
                <h4>Erreur !</h4>
                Vous devez entrer un nom ! 
            </div>
            <div class="form-group" id="divCommentContent">
                <label for="comment">Commentaire</label>
                <textarea class="form-control" name="comment" id="comment"></textarea>
            </div>
            <div class="alert alert-block alert-danger" id="addCommentContent" style="display:none">
                <h4>Erreur !</h4>
                Vous devez entrer un commentaire ! 
            </div>
            <button type="submit" class="btn btn-default center-block">Poster le commentaire</button>
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
                if ($request->existParameter('connectedMember') && $request->getParameter('connectedMember')->member_acces() == 'admin') {
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
            
            if ($request->existParameter('connectedMember')) {
                    $connectedMemberName = $request->getParameter('connectedMember')->member_name();
                    $memberAcces = $request->getParameter('connectedMember')->member_acces();
                    
                    if ($memberAcces == 'admin') {
                        echo '(<a href="index.php?controler=backend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $post->post_id() . '">modifier</a>)';
                        echo ' <a href="index.php?controler=backend&action=validateSupression&id=' . $post->post_id() . '&comment_id=' . $comment->comment_id() . '&oldAction=post">[ Supprimer ]</a>';
                        echo ' <a href="index.php?controler=backend&action=moderateCommentFromPost&id=' . $post->post_id() . '&commentId=' . $comment->comment_id() . '">[ Modérer ]</a>';
                        echo ' <a href="index.php?controler=backend&action=acceptCommentFromPost&id=' . $post->post_id() . '&commentId=' . $comment->comment_id() . '">[ Valider ]</a>';
                    }
                    else {
                        if($comment->comment_author() == $connectedMemberName){
                            echo '(<a href="index.php?controler=backend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $post->post_id() . '">modifier</a>)';
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
</div>