<?php $this->_page_title = 'Liste des commentaires modérés'; ?>

<?php
        foreach ($comments AS $comment) {
            
            echo '<a class="btn btn-info btn-xs" href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $comment->post_id() . '&oldAction=showModeratedComments">modifier</a>';
            echo ' <a class="btn btn-danger btn-xs" href="index.php?controler=backend&action=validateSupression&id=' . $comment->post_id() . '&comment_id=' . $comment->comment_id() . '&oldAction=showModeratedComments">Supprimer</a>';
            echo ' <a class="btn btn-success btn-xs" href="index.php?controler=backend&action=acceptCommentFromList&commentId=' . $comment->comment_id() . '&oldAction=showModeratedComments">Valider</a>';
            echo '<p><strong>' . $comment->comment_author() . '</strong><small class="pull-right">' . $comment->comment_date() . '</small>';
            echo '<br />' . $comment->comment() . '</p>';
            
            if (isset($reports)) {
                foreach ($reports AS $report) {
                    if ($report->comment_id() == $comment->comment_id()) {
                    echo 'Raison du signalement :<br />' . $report->report_content();
                    }
                }
            }
            echo '<br /><a href="index.php?controler=frontend&action=post&id=' . $comment->post_id() . '">[ voir le post d\'origine n°: ' . $comment->post_id() . ' ]</a><br /><br />';
        }