<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\backend;

use perou\blog\entities\Post;
use perou\blog\entities\Comment;
use perou\blog\model\PostManager;
use perou\blog\model\CommentManager;
use perou\blog\framework\SecuredControler;
use perou\blog\model\MemberManager;
use perou\blog\framework\View;
use perou\blog\entities\Member;
use perou\blog\framework\PasswordTester;
use perou\blog\entities\Report;
use perou\blog\model\ReportManager;

/**
 * Description of BackendControler
 *
 * @author dlaxc
 */

class BackendControler extends SecuredControler {
    
    protected $memberManager,
                  $postManager,
                  $commentManager,
                  $reportManager;
    
    public function __construct() {
        $this->memberManager = new MemberManager();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->reportManager = new ReportManager();
    }
    
    public function index() {
        
    }
    
    public function connexion() {
        $connexionMsg = '';
        $displayConnexion = new View('connexion');
        $displayConnexion->generate(array('request' => $this->request, 'connexionMsg' => $connexionMsg));
    }
    
    public function connect() {
        if ($this->request->existParameter('memberEmail') && $this->request->existParameter('memberPassword')) {
            if ($this->memberManager->existMemberByEmail($this->request->getParameter('memberEmail')) == 1) {
                $memberToConnect = $this->memberManager->getMemberByEmail($this->request->getParameter('memberEmail'));
                if (PasswordTester::testConnexion($this->request, $memberToConnect)) {
                    session_start();
                    $_SESSION['sessionMember'] = $memberToConnect;
                    if ($this->request->existParameter('autoconnect')) {
                        setcookie('cookieMember', serialize($memberToConnect), time() + 365*24*3600, null, null, false, true);
                    }
                    header('Location: index.php');
                }
                else {
                    $connexionMsg = 'Le mot de passe entré est incorrect';
                    $displayConnexion = new View('connexion');
                    $displayConnexion->generate(array('request' => $this->request, 'connexionMsg' => $connexionMsg));
                }
            }
            else {
                $connexionMsg = 'Ce membre n\'existe pas';
                $displayConnexion = new View('connexion');
                $displayConnexion->generate(array('request' => $this->request, 'connexionMsg' => $connexionMsg));
            }
        }
        else {
            $connexionMsg = 'Veuillez renseigner votre email ainsi que votre mot de passe';
            $displayConnexion = new View('connexion');
            $displayConnexion->generate(array('request' => $this->request, 'connexionMsg' => $connexionMsg));
        }
    }
    
    public function logout() {
        session_start();
        
        $_SESSION = array();
        session_destroy();
        
        setcookie('cookieMember', '');
        
        header('Location: index.php');
    }

    public function registration() {
        $registrationMsg = '';
        $displayRegistration = new View('registration');
        $displayRegistration->generate(array('request' => $this->request, 'registrationMsg' => $registrationMsg));
    }
    
    public function addMember() {
        if ($this->request->existParameter('memberName')) {
            if ($this->request->getParameter('memberName') != '') {
                if ($this->memberManager->existMemberByName($this->request->getParameter('memberName')) == 0) {
                    if ($this->request->existParameter('memberEmail') && $this->request->existParameter('memberEmailConfirm')) {
                        if ($this->request->getParameter('memberEmail') == $this->request->getParameter('memberEmailConfirm')) {
                            if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$#', $this->request->getParameter('memberEmail'))) {
                                if ($this->memberManager->existMemberByEmail($this->request->getParameter('memberEmail')) == 0) {
                                    if ($this->request->existParameter('memberPassword') && $this->request->existParameter('memberPasswordConfirm')) {
                                        if (strlen($this->request->getParameter('memberPassword')) >= 6) {
                                            if ($this->request->getParameter('memberPassword') == $this->request->getParameter('memberPasswordConfirm')) {
                                                $hashed_password = password_hash($this->request->getParameter('memberPassword'), PASSWORD_DEFAULT);
                                                $newMember = new Member(['member_name' => $this->request->getParameter('memberName'), 'member_email' => $this->request->getParameter('memberEmail'), 'member_password' => $hashed_password]);
                                                $affectedLines = $this->memberManager->createMember($newMember);

                                                if ($affectedLines === FALSE) {
                                                    throw new \Exception('le membre ne peut être inscrit');
                                                }
                                                else {
                                                    session_start();
                                                    $connectedMember = $this->memberManager->getMemberByEmail($this->request->getParameter('memberEmail'));
                                                    $_SESSION['sessionMember'] = $connectedMember;
                                                    header('Location: index.php');
                                                }
                                            }
                                            else {
                                                throw new \Exception('Veuillez entrer deux fois le même mot de passe');
                                            }
                                        }
                                        else {
                                            throw new \Exception('Votre mot de passe doit faire au moins 6 caractères');
                                        }
                                    }
                                    else {
                                        throw new \Exception('Veuillez entrer un mot de passe');
                                    }
                                }
                                else {
                                    $registrationMsg = 'Cet E-mail est déjà enregistré, veuillez entrez une nouvelle adresse';
                                    $displayRegistration = new View('registration');
                                    $displayRegistration->generate(array('request' => $this->request, 'registrationMsg' => $registrationMsg));
                                }
                            }
                            else {
                                throw new \Exception('Veuillez renseigner une adresse Email valide');
                            }
                        }
                        else {
                            throw new \Exception('Veuillez renseigner deux fois la même adresse Email');
                        }
                    }
                    else {
                        throw new \Exception('Pas d\'email renseignée, veuillez renseigner votre adresse');
                    }
                }
                else {
                    $registrationMsg = 'Ce nom existe déjà, veuillez entrez un nouveau nom';
                    $displayRegistration = new View('registration');
                    $displayRegistration->generate(array('request' => $this->request, 'registrationMsg' => $registrationMsg));
                }
            }
            else {
                throw new \Exception('Vous devez entrer un nom');
            }
        }
        else {
            throw new \Exception('Paramètre de nom absent de la requete, veuillez entrer un nom');
        }
    }
    
    public function profil() {
        if ($this->request->existParameter('connectedMember')) {
            $member = $this->request->getParameter('connectedMember');
            $displayProfil = new View('profil', 'backend');
            $displayProfil->generate(array('member' => $member, 'request' => $this->request));
        }
        else {
            throw new \Exception('Vous ne pouvez afficher le profil car vous n\'êtes pas connecté');
        }
    }
    
    public function newPost() {
        if ($this->request->existParameter('connectedMember')) {
            if ($this->request->existParameter('newPostTitle') && $this->request->existParameter('newPostContent')) {
                $newPost = new Post(['post_title' => $this->request->getParameter('newPostTitle'), 'post_content' => $this->request->getParameter('newPostContent'), 'post_author' => $this->request->getParameter('connectedMember')->member_name()]);
                $affectedLines = $this->postManager->addPost($newPost);

                if ($affectedLines === false) 
                {
                    throw new \Exception('L\'article ne peut être posté.');
                }
                else
                {
                    header('Location: index.php');
                }
            }
            else {
                throw new \Exception('Le titre de l\'article ou son contenu n\'ont pas été renseignés.');
            }
        }
        else {
            throw new \Exception('Veuillez vous connecter avant de poster un article.');
        }
    }
    
    public function deletePost() {
        if ($this->request->existParameter('connectedMember')) {
            if ($this->request->existParameter('id')){
                $postId = intval($this->request->getParameter('id'));
                if ($postId > 0) {
                    $deletedLine = $this->postManager->erasePost($postId);
                    if ($deletedLine === false) {
                        throw new \Exception('L\'article ne peut être supprimé.');
                    }
                    else {
                        header('Location: index.php');
                    }
                }
                else {
                    throw new \Exception('Paramètre id invalide');
                }
            }
        }
        else {
            throw new \Exception('Veuillez vous connecter avant de supprimer un article.');
        }
    }
    
    public function modifyPost() {
        if ($this->request->existParameter('connectedMember')) {
            if ($this->request->existParameter('id')){
                $postId = intval($this->request->getParameter('id'));
                if ($postId > 0) {
                    $postToModify = $this->postManager->getPostSqlDate($postId);
                    $displayPostToModify = new View('modifyPost', 'backend');
                    $displayPostToModify->generate(array('request' => $this->request, 'postToModify' => $postToModify));
                }
                else {
                    throw new \Exception('Paramètre id invalide');
                }
            }
        }
        else {
            throw new \Exception('Veuillez vous connecter avant de modifier un article.');
        }
    }
    
    public function updatePost() {
        if ($this->request->existParameter('connectedMember')) {
            if ($this->request->existParameter('id')) {
                $postId = intval($this->request->getParameter('id'));
                if ($postId > 0) {
                    if ($this->request->existParameter('postToModifTitle') && $this->request->existParameter('postToModifContent') && $this->request->existParameter('postToModifDate')) {
                        $newPostTitle = $this->request->getParameter('postToModifTitle');
                        $newPostContent = $this->request->getParameter('postToModifContent');
                        $newPostDate = $this->request->getParameter('postToModifDate');
                        $newPostSqlDate = preg_replace('#[T]#', ' ', $newPostDate);

                        $newPost = new Post(['post_id' => $postId, 'post_title' => $newPostTitle, 'post_content' => $newPostContent, 'post_creation_date_fr' => $newPostSqlDate]);

                        if (isset($newPost)) {
                            $affectedLines = $this->postManager->setPost($newPost);

                            if ($affectedLines === false)
                            {
                                throw new \Exception('l\'article ne peut être modifié');	
                            }
                            else
                            {
                                header('Location: index.php?');
                            }
                        }
                        else {
                            throw new \Exception('Le nouveau post n\'est pas paramètré.');
                        }
                    }
                    else {
                        throw new \Exception('Vous devez remplir tous les champs.');
                    }
                }
                else {
                        throw new \Exception('Paramètre id invalide');
                    }
            }
            else {
                throw new \Exception('Paramètre id absent de la requete.');
            }
        }
        else {
            throw new \Exception('Veuillez vous connecter avant de modifier un article.');
        }
    }
    
    public function addComment() {
        if ($this->request->existParameter('connectedMember')) {
            if ($this->request->existParameter('id') && $this->request->existParameter('comment_author') && $this->request->existParameter('comment')) {
                $postId = intval($this->request->getParameter('id'));
                if ($postId > 0) {
                    $newComment = new Comment(['post_id' => $postId, 'comment_author' => $this->request->getParameter('comment_author'), 'comment' => $this->request->getParameter('comment')]);
                    $affectedLines = $this->commentManager->postComment($newComment);

                    if ($affectedLines === false) 
                    {
                        throw new \Exception('Le commentaire ne peut être posté.');
                    }
                    else
                    {
                        header('Location: index.php?action=post&id=' . $postId);
                    }
                }
                else {
                    throw new \Exception('Paramètre id invalide');
                }
            }
            else {
                throw new \Exception('Paramètre non renseigné');
            }
        }
        else {
            throw new \Exception('Veuillez vous connecter avant de poster un commentaire.');
        }
    }
    
    public function enterNewComment()
    {
        //$oldAction is used when the comment is modified from showReportedCommentView or showModeratedCommentView
        $oldAction = NULL;
        if ($this->request->existParameter('oldAction')) {
            if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                $oldAction = $this->request->getParameter('oldAction');
            }
        }
        $post_id = $this->request->getParameter('id');
        $comment_id = $this->request->getParameter('comment_id');
         if ( isset($post_id) && isset($comment_id) && $post_id > 0 && $comment_id > 0)
         {
            $toModifyComment = $this->commentManager->getComment($comment_id);
            $post = $this->postManager->getPost($post_id);

            $modifCommentView = new View('modifyComment', 'backend');
            $modifCommentView->generate(array('toModifyComment' => $toModifyComment, 'post' => $post, 'request' => $this->request, 'oldAction' => $oldAction));
        }
    }

    function modifyComment()
    {
        $post_id = $this->request->getParameter('post_id');
        $comment_id = $this->request->getParameter('comment_id');
        $new_content = $this->request->getParameter('new_comment');
        
        if (isset($new_content))
        {
            $newComment = new Comment(['post_id' => $post_id, 'comment_id' => $comment_id, 'comment' => $new_content]);
            $affectedLines = $this->commentManager->setComment($newComment);
               
            if ($affectedLines === false)
            {
                throw new \Exception('le commentaire ne peut être modifié');	
            }
            else
            {
                if ($this->request->existParameter('oldAction')) {
                    if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                        header('Location: index.php?controler=backend&action=' . $this->request->getParameter('oldAction'));
                    }
                }
                else {
                    header('Location: index.php?controleur=frontend&action=post&id=' . $newComment->post_id());
                }
            }
        }
    }
    
    public function reportComment() {
        if ($this->request->existParameter('commentId')) {
            $commentId = $this->request->getParameter('commentId');
            $commentId = intval($commentId);
            if ($commentId >0) {
                $commentToReport = $this->commentManager->getComment($commentId);
                if ($commentToReport->comment_moderation() == 'reported' OR $commentToReport->comment_moderation() == 'moderated') {
                    $displayAlreadyReported = new View('alreadyReportedComment', 'backend');
                    $displayAlreadyReported->generate(array('request' => $this->request, 'commentToReport' => $commentToReport));
                }
                else {
                    $displayCommentToReport = new View('reportComment', 'backend');
                    $displayCommentToReport->generate(array('request' => $this->request, 'commentToReport' => $commentToReport));
                }
            }
            else {
                throw new \Exception('L\'identifiant de commentaire n\'est pas valide');
            }
        }
    }
    
    public function sendCommentedReport() {
        if ($this->request->existParameter('commentId')) {
            $reportContent = '( Pas de raison donnée )';
            if ($this->request->existParameter('reportContent')) {
                $reportContent = $this->request->getParameter('reportContent');
            }
            $newReport = new Report(array('comment_id' => $this->request->getParameter('commentId'), 'report_content' => $reportContent));
            $reportedComment = $this->commentManager->getComment($this->request->getParameter('commentId'));
            if (isset($newReport)){
                $newLine = $this->reportManager->postReport($newReport);
                
                if ($newLine === FALSE) {
                    throw new \Exception('le commentaire ne peut être signalé');
                }
                else {
                    $this->commentManager->setCommentModeration($reportedComment->comment_id(), 'reported');
                    mail('flipiste@free.fr', 'Commentaire signalé', 'Un nouveau commentaire a été signalé', 'monblog@free.fr');
                    $reportValidationMsg = 'Le commentaire a été signalé au modérateur';
                    $post = $this->postManager->getPost($reportedComment->post_id());
                    $comments = $this->commentManager->getComments($reportedComment->post_id());
                    $displayPost = new View('post');
                    $displayPost->generate(array('post' => $post, 'comments' => $comments, 'request' => $this->request, 'reportValidationMsg' => $reportValidationMsg));
                }
            }
        } 
    }
    
    public function moderateCommentFromList() {
        if ($this->request->existParameter('commentId')) {
            $commentId = intval($this->request->getParameter('commentId'));
            if ($commentId > 0) {
                $affectedLine = $this->commentManager->setCommentModeration($commentId, 'moderated');
                
                if ($affectedLine === FALSE) {
                    throw new \Exception('Le commentaire ne peut être moderé.');
                }
                else {
                        header('Location: index.php?controler=backend&action=showReportedComments');
                }
            }
        }
    }
    
    public function moderateCommentFromPost() {
        if ($this->request->existParameter('id') && $this->request->existParameter('commentId')) {
            $postId = intval($this->request->getParameter('id'));
            $commentId = intval($this->request->getParameter('commentId'));
            if ($postId > 0 && $commentId > 0) {
                $affectedLine = $this->commentManager->setCommentModeration($commentId, 'moderated');
                
                if ($affectedLine === FALSE) {
                    throw new \Exception('Le commentaire ne peut être moderé.');
                }
                else {
                    header('Location: index.php?controler=frontend&action=post&id=' . $postId);
                }
            }
        }
    }
    
    public function acceptCommentFromList() {
        if ($this->request->existParameter('commentId')) {
            $commentId = intval($this->request->getParameter('commentId'));
            if ($commentId > 0) {
                $affectedLine = $this->commentManager->setCommentModeration($commentId, 'accepted');
                
                if ($affectedLine === FALSE) {
                    throw new \Exception('Le commentaire ne peut être moderé.');
                }
                else {
                    if ($this->reportManager->existReport($commentId) != 0) {
                        $deletedLine = $this->reportManager->deleteReport($this->reportManager->existReport($commentId));
                        if ($deletedLine === false) {
                            throw new \Exception('Le report ne peut être supprimé.');
                        }
                    }
                    if ($this->request->existParameter('oldAction')) {
                        if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                            header('Location: index.php?controler=backend&action=' . $this->request->getParameter('oldAction'));
                        }
                        else {
                            header('Location: index.php?controler=frontend&action=listPost');
                        }
                    }
                }
            }
        }
    }
    
    public function acceptCommentFromPost() {
        if ($this->request->existParameter('id') && $this->request->existParameter('commentId')) {
            $postId = intval($this->request->getParameter('id'));
            $commentId = intval($this->request->getParameter('commentId'));
            if ($postId > 0 && $commentId > 0) {
                $affectedLine = $this->commentManager->setCommentModeration($commentId, 'accepted');
                
                if ($affectedLine === FALSE) {
                    throw new \Exception('Le commentaire ne peut être moderé.');
                }
                else {
                    if ($this->reportManager->existReport($commentId) != 0) {
                        $deletedLine = $this->reportManager->deleteReport($this->reportManager->existReport($commentId));
                        if ($deletedLine === false) {
                            throw new \Exception('Le report ne peut être supprimé.');
                        }
                    }
                    header('Location: index.php?controler=frontend&action=post&id=' . $postId);
                }
            }
        }
    }
    
    public function validateSupression() {
        if ($this->request->existParameter('id')) {
            $postId = intval($this->request->getParameter('id'));
            $concernedPost = $this->postManager->getPost($postId);
            if ($this->request->existParameter('comment_id')) {
                $commentId = intval($this->request->getParameter('comment_id'));
                $commentToDelete = $this->commentManager->getComment($commentId);
            }
        }
        if (isset($commentToDelete)) {
            $displaySuppressionValidation = new View('validateSuppression', 'backend');
            $displaySuppressionValidation->generate(array('request' => $this->request, 'concernedPost' => $concernedPost,  'commentToDelete' => $commentToDelete));
        }
        else {
            $displaySuppressionValidation = new View('validateSuppression', 'backend');
            $displaySuppressionValidation->generate(array('request' => $this->request, 'concernedPost' => $concernedPost));
        }
    }

    public function deleteComment() {
        if ($this->request->existParameter('comment_id') && $this->request->existParameter('id')) {
            $commentId = intval($this->request->getParameter('comment_id'));
            $postId = intval($this->request->getParameter('id'));
            if ($commentId > 0 && $postId > 0) {
                $deletedLine = $this->commentManager->eraseComment($this->request->getParameter('comment_id'));
                
                if ($deletedLine === false) 
                {
                    throw new \Exception('Le commentaire ne peut être supprimé.');
                }
                else {
                    header('Location: index.php?controler=frontend&action=post&id=' . $this->request->getParameter('id'));
                }
            }
        }
    }
    
    public function deleteCommentFromList() {
        if ($this->request->existParameter('comment_id') && $this->request->existParameter('id')) {
            $commentId = intval($this->request->getParameter('comment_id'));
            $postId = intval($this->request->getParameter('id'));
            if ($commentId > 0 && $postId > 0) {
                $deletedLine = $this->commentManager->eraseComment($this->request->getParameter('comment_id'));
                
                if ($deletedLine === false) 
                {
                    throw new \Exception('Le commentaire ne peut être supprimé.');
                }
                else {
                    if ($this->request->existParameter('oldAction')) {
                        if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                            header('Location: index.php?controler=backend&action=' . $this->request->getParameter('oldAction'));
                        }
                        else {
                            header('Location: index.php?controler=frontend&action=listPost');
                        }
                    }
                }
            }
        }
    }
    
    public function showReportedComments() {
        $comments = $this->commentManager->getReportedComments();
        $reports = $this->reportManager->getReports();
        $displayReportedComment = new View('showreportedComments', 'backend');
        $displayReportedComment->generate(array('request' => $this->request, 'comments' => $comments, 'reports' => $reports));
    }
    
    public function showModeratedComments() {
        $comments = $this->commentManager->getModeratedComments();
        $reports = $this->reportManager->getReports();
        $displayModeratedComment = new View('showModeratedComments', 'backend');
        $displayModeratedComment->generate(array('request' => $this->request, 'comments' => $comments, 'reports' => $reports));
    }
}
