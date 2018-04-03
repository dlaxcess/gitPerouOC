<?php $this->_page_title = 'Liste des commentaires signalés'; ?>

<?php
        foreach ($comments AS $comment) {
            
            echo '<p><strong>[' . $comment->comment_date() . '] ' . $comment->comment_author() . ' : </strong> ';
            echo '(<a href="index.php?controler=frontend&action=enterNewComment&comment_id=' . $comment->comment_id() . '&id=' . $comment->post_id() . '">modifier</a>)';
            echo ' <a href="index.php?controler=backend&action=deleteComment&id=' . $comment->post_id() . '&comment_id=' . $comment->comment_id() . '">[ Supprimer ]</a>';
            echo '<br />' . $comment->comment() . '</p>';
        }