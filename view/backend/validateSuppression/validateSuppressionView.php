<?php $this->_page_title = 'Validation de suppression'; ?>


        <?php
        $oldAction = '';
        $deleteAction = '';
        $controler = '';
        if ($request->existParameter('oldAction')){
            if ($request->getParameter('oldAction') == 'showReportedComments' OR $request->getParameter('oldAction') == 'showModeratedComments') {
                $oldAction = $request->getParameter('oldAction');
                $deleteAction = 'deleteCommentFromList';
                $controler = 'backend';
            }
            elseif ($request->getParameter('oldAction') == 'post') {
                $oldAction = $request->getParameter('oldAction');
                $deleteAction = 'deleteComment';
                $controler = 'frontend';
            }
        }
        ?>

<a href="index.php?controler=<?= $controler ?>&action=<?= $oldAction ?>&post_id=<?php
                                                                                                                    if ($oldAction == 'post') {
                                                                                                                        echo '&id=' . $commentToDelete->post_id();
                                                                                                                    }
                                                                                                                    ?>"><?php
                                                                                                                            if ($oldAction == 'post') {
                                                                                                                                echo 'Retour à l\'article';
                                                                                                                            }
                                                                                                                            else {
                                                                                                                                echo 'Retour à la liste';
                                                                                                                            }
                                                                                                                            ?></a>

    <div>
        <h2>Êtes vous sur de vouloir supprimer ce 
        <?php
        if (!isset($postToDelete)) {
            echo ' commentaire ? :';
        }
        else {
            echo 't article ? :';
        }
        ?></h2>

        <a href="index.php?controler=backend&AMP;action=<?= $deleteAction ?>&AMP;id=<?= $commentToDelete->post_id() ?>&AMP;comment_id=<?= $commentToDelete->comment_id() ?>&AMP;oldAction=<?= $oldAction ?>">[ Supprimer ]</a>
        <a href="index.php?controler=<?= $controler ?>&action=<?php
                                                                                        echo $oldAction;
                                                                                        if ($oldAction == 'post') {
                                                                                            echo '&id=' . $commentToDelete->post_id();
                                                                                        }
                                                                                        ?>
                                                                                        "> [ Annuler ]</a>