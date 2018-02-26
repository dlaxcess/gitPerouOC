<?php $this->_page_title = 'Mon Blog'; ?>
<?php $this->_personalBar = new perou\blog\view\PersonalBar(); ?>

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
            <em><a href="index.php?controler=frontend&action=post&post_id=<?= $data->post_id() ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}

?>
   