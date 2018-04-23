<?php $this->_page_title = 'Jean Forteroche - Billet simple pour l\'Alaska'; ?>

<p>Parutions pour <a data-toggle="tooltip" href="index.php" title="Un roman de Jean Forteroche">Billet simple pour l'Alaska</a> :</p>
        

        <div>
            <?= $postsPaging ?>
        </div>
        
<?php
foreach ( $posts as $post)
{
?>
    <div class="news">
        <h3>
            <?= $post->post_title() ?>
            <em>le <?= $post->post_creation_date() ?></em>
        </h3>
        
        <p>
            <?= $post->post_content() ?>
            <br />
            <strong><?= $post->post_author() ?></strong>
            <br />
            <em><a href="index.php?controler=frontend&action=post&id=<?= $post->post_id() ?>">Commentaires</a></em>
        </p>
        <?php
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
                echo '<p><a href="index.php?controler=backend&action=modifyPost&id=' . $post->post_id() . '">[ Modifier]</a> <a href="index.php?controler=backend&action=validateSupression&id=' . $post->post_id() . '">[ Supprimer ]</a></p>';
            }
        }
        ?>
    </div>
<?php
}
?>
        <div>
            <?= $postsPaging ?>
        </div>
 <div>
    <?php
    $memberAcces = '';
    if ($request->existParameter('sessionMember') && $request->getParameter('sessionMember')->member_acces() == 'admin') {
        $memberAcces = $request->getParameter('sessionMember')->member_acces();
    }
    if ($request->existParameter('cookieMember') && unserialize($request->getParameter('cookieMember'))->member_acces() == 'admin') {
        $memberAcces = unserialize($request->getParameter('cookieMember'))->member_acces();
    }
    if ($memberAcces == 'admin') {
        ?>
     <div class="modal" id="newPost">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Nouvelle parution</h4>
                </div>
                <div class="modal-body">
                    <form action="index.php?controler=backend&action=newPost" method="post">
                        <label for="newPostTitle">Titre :</label><br />
                        <input type="text" name="newPostTitle" id="newPostTitle" required><br />
                        <label for="newPostContent">Contenu de l'article :</label><br />
                        <textarea name="newPostContent" id="newPostContent" required>Entrez le texte ici</textarea><br />
                        <input type="submit" value="Poster l'article">
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php
    }
    ?>
    </div>
   