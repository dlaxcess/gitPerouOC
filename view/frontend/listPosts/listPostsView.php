<?php $this->_page_title = 'Jean Forteroche - Billet simple pour l\'Alaska'; ?>

<p>Parutions pour <a data-toggle="tooltip" href="index.php" title="Un roman de Jean Forteroche">Billet simple pour l'Alaska</a> :</p>
        
<div class="container-fluid">
        <div class="center-block">
            <?= $postsPaging ?>
        </div>
        
<?php
foreach ( $posts as $post)
{
?>
    <div class="panel panel-default"<?php if ($request->existParameter('connectedMember')) {
                                                            if ($request->getParameter('connectedMember')->member_acces() == 'admin') {
                                                                echo ' style="margin-bottom:3px"';
                                                            }
                                                        }
                                                    ?>>
        <div class="panel-heading">
            <h3 class="panel-title">
                <?= $post->post_title() ?>
                <em>le <?= $post->post_creation_date() ?></em>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <?= $post->post_content() ?>
                </div>
            </div>
            <small class="pull-right"><strong><?= $post->post_author() ?></strong></small>
        </div>
        <div class="panel-footer">
            <em><a href="index.php?controler=frontend&action=post&id=<?= $post->post_id() ?>">Commentaires</a></em>
        </div>
    </div>
        
        
        <?php
        if ($request->existParameter('connectedMember')) {
            $memberAcces = $request->getParameter('connectedMember')->member_acces();
            
            if ($memberAcces == 'admin') {
                echo '<p style="margin-bottom:20px"><a class="btn btn-default" href="index.php?controler=backend&action=modifyPost&id=' . $post->post_id() . '">Modifier</a> <a class="btn btn-default" href="index.php?controler=backend&action=validateSupression&id=' . $post->post_id() . '">Supprimer</a></p>';
            }
        }
}
?>
        <div>
            <?= $postsPaging ?>
        </div>
 <div>
    <?php
    $memberAcces = '';
    if ($request->existParameter('connectedMember')) {
        if ($request->getParameter('connectedMember')->member_acces() == 'admin') {
            $memberAcces = $request->getParameter('connectedMember')->member_acces();
        }
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
                    <form class="well" action="index.php?controler=backend&action=newPost" method="post">
                        <div class="form-group">
                            <label for="newPostTitle">Entrez le titre de la parution</label>
                            <input type="text" class="form-control" name="newPostTitle" id="newPostTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="newPostContent">Entrez le contenu de la parution</label>
                            <textarea name="newPostContent" class="form-control" id="newPostContent" required>Entrez le texte ici</textarea>
                        </div>
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
   