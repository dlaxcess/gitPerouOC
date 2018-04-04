<?php $this->_page_title = 'Liste des commentaires signalés'; ?>

<?php
        foreach ($comments AS $comment) {
            
            echo '<p><strong>[' . $comment->comment_date() . '] ' . $comment->comment_author() . ' : </strong> ';
            echo '(<a href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $comment->post_id() . '&oldAction=showReportedComments">modifier</a>)';
            echo ' <a href="index.php?controler=backend&action=deleteCommentFromList&id=' . $comment->post_id() . '&comment_id=' . $comment->comment_id() . '&oldAction=showReportedComments">[ Supprimer ]</a>';
            echo ' <a href="index.php?controler=backend&action=moderateCommentFromList&commentId=' . $comment->comment_id() . '&oldAction=showReportedComments">[ Modérer ]</a>';
            echo ' <a href="index.php?controler=backend&action=acceptCommentFromList&commentId=' . $comment->comment_id() . '&oldAction=showReportedComments">[ Valider ]</a>';
            echo '<br />' . $comment->comment() . '</p>';
            
            foreach ($reports AS $report) {
                if ($report->comment_id() == $comment->comment_id()) {
                    echo 'Raison du signalement :<br />' . $report->report_content();
                }
            }
            echo '<br /><a href="index.php?controler=frontend&action=post&id=' . $comment->post_id() . '">[ voir le post d\'origine n°: ' . $comment->post_id() . ' ]</a>';
        }