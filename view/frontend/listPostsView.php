<?php $this->_page_title = 'Mon Blog'; ?>

        <p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['post_title']) ?>
            <em>le <?= $data['post_creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['post_content'])) ?>
            <br />
            <strong><?= htmlspecialchars($data['post_author']) ?></strong>
            <br />
            <em><a href="index.php?action=post&post_id=<?= $data['post_id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
   