<?php $this->_page_title = 'Modifier un post'; ?>

        <p>Modifier l'article :</p>

<?php
//$postSqlDate = $postToModify->post_creation_date();
//$postSqlDate = preg_replace('#[ ].#', 'T', $postSqlDate);
?>
        
        <form action="" method="post">
            <label for="postToModifTitle">Titre du post</label><br />
            <input type="text" name="postToModifTitle" id="postToModifTitle" size="100" value="<?= $postToModify->post_title() ?>" required><br />
            <label for="postToModifContent">Contenu de l'article</label><br />
            <textarea name="postToModifContent" id="postToModifContent" cols="100" required><?= $postToModify->post_content() ?></textarea><br />
            <label for="postToModifDate">Date de l'article</label><br />
            <input type="datetime-local" name="postToModifDate" value="<?= $postToModify->post_creation_date() ?>" step="1"><br />
            <input type="submit" value="Modifier l'article">
        </form>
<?php
echo $request->getParameter('sessionMember')->member_name();
echo $postToModify->post_title();
echo $postToModify->post_creation_date();
?>
