<?php $this->_page_title = 'Mon Blog'; ?>

        <p>Derniers billets du blog :</p>

<?php
foreach ( $posts as $data)
{
?>
    <div class="news">
        <h3>
            <?= $data->post_title() ?>
            <em>le <?= $data->post_creation_date() ?></em>
        </h3>
        
        <p>
            <?= $data->post_content() ?>
            <br />
            <strong><?= $data->post_author() ?></strong>
            <br />
            <em><a href="index.php?controler=frontend&action=post&id=<?= $data->post_id() ?>">Commentaires</a></em>
        </p>
        <?php
        if ($request->existParameter('sessionMember') OR $request->existParameter('cookieMember')) {
            echo '<p>[ Modifier] <a href="index.php?controler=backend&action=deletePost&id=' . $data->post_id() . '">[ Supprimer ]</a></p>';
        }
        ?>
    </div>
<?php
}
?>
 <div>
    <?php
    if ($request->existParameter('sessionMember') OR $request->existParameter('cookieMember')) {
        ?>
     <p>Nouvel article :</p>
     <form action="index.php?controler=backend&action=newPost" method="post">
         <label for="newPostTitle">Titre :</label><br />
         <input type="text" name="newPostTitle" id="newPostTitle" required><br />
         <label for="newPostContent">Contenu de l'article :</label><br />
         <textarea name="newPostContent" id="newPostContent" required>Entrez le texte ici</textarea><br />
         <input type="submit" value="Poster le commentaire">
     </form>
        <?php
    }
    ?>
    </div>
   