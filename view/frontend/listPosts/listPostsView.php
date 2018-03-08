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
    </div>
<?php
}

?>
   