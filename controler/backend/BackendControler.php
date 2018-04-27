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
        $displayConnexion = new View('connexion');
        $displayConnexion->generate(array('request' => $this->request));
    }
    
    public function connect() {
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
            throw new Exception('Votre mot de passe est incorrect');
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
        $displayRegistration = new View('registration');
        $displayRegistration->generate(array('request' => $this->request));
    }
    
    public function addMember() {
        $hashed_password = password_hash($this->request->getParameter('memberPassword'), PASSWORD_DEFAULT);
        $newMember = new Member(['member_name' => $this->request->getParameter('memberName'), 'member_email' => $this->request->getParameter('memberEmail'), 'member_password' => $hashed_password]);
        $affectedLines = $this->memberManager->createMember($newMember);
        
        if ($affectedLines === FALSE) {
            throw new Exception('le membre ne peut être inscrit');
        }
        else {
            session_start();
            $_SESSION['sessionMember'] = $newMember;
            header('Location: index.php');
        }
    }
    
    public function profil() {
        $member = $this->memberManager->getMemberById($this->request->getParameter('id'));
        $displayProfil = new View('profil', 'backend');
        $displayProfil->generate(array('member' => $member, 'request' => $this->request));
    }
    
    public function newPost() {
        $newPost = new Post(['post_title' => $this->request->getParameter('newPostTitle'), 'post_content' => $this->request->getParameter('newPostContent'), 'post_author' => $this->request->getParameter('sessionMember')->member_name()]);
        $affectedLines = $this->postManager->addPost($newPost);
        
        if ($affectedLines === false) 
        {
            throw new Exception('L\'article ne peut être posté.');
        }
        else
        {
            header('Location: index.php');
        }
    }
    
    public function deletePost() {
        if ($this->request->existParameter('id')){
            $postId = intval($this->request->getParameter('id'));
            /*if ($this->commentManager->existComment($postId)) {
                $postComments = $this->commentManager->getComments($postId);
                foreach ($postComments as $comment) {
                    if ($this->reportManager->existReport($comment->comment_id()) != 0) {
                        $deletedLine = $this->reportManager->deleteReport($this->reportManager->existReport($comment->comment_id()));
                        if ($deletedLine === false) {
                            throw new Exception('Le report du commentaire ne peut être supprimé.');
                        } 
                    }
                    $deletedLine = $this->commentManager->eraseComment($comment->comment_id());
                
                    if ($deletedLine === false) {
                        throw new Exception('Le commentaire de l\'article ne peut être supprimé.');
                    }
                }  
            }*/
            $deletedLine = $this->postManager->erasePost($postId);
            if ($deletedLine === false) {
                throw new Exception('L\'article ne peut être supprimé.');
            }
            else {
                header('Location: index.php');
            }
        }
    }
    
    public function modifyPost() {
        $postToModify = $this->postManager->getPostSqlDate($this->request->getParameter('id'));
        $displayPostToModify = new View('modifyPost', 'backend');
        $displayPostToModify->generate(array('request' => $this->request, 'postToModify' => $postToModify));
    }
    
    public function updatePost() {
        if ($this->request->existParameter('id')) {
            $newPostId = $this->request->getParameter('id');
        }
        if ($this->request->existParameter('postToModifTitle')) {
            $newPostTitle = $this->request->getParameter('postToModifTitle');
        }
        if ($this->request->existParameter('postToModifContent')) {
            $newPostContent = $this->request->getParameter('postToModifContent');
        }
        if ($this->request->existParameter('postToModifDate')) {
            $newPostDate = $this->request->getParameter('postToModifDate');
            $newPostSqlDate = preg_replace('#[T].#', ' ', $newPostDate);
        }
        
        $newPost = new Post(['post_id' => $newPostId, 'post_title' => $newPostTitle, 'post_content' => $newPostContent, 'post_creation_date_fr' => $newPostSqlDate]);
        
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
    }
    
    public function addComment()
    {
        $newComment = new Comment(['post_id' => $this->request->getParameter('id'), 'comment_author' => $this->request->getParameter('comment_author'), 'comment' => $this->request->getParameter('comment')]);
        $affectedLines = $this->commentManager->postComment($newComment);

        if ($affectedLines === false) 
        {
            throw new Exception('Le commentaire ne peut être posté.');
        }
        else
        {
            header('Location: index.php?action=post&id=' . $_GET['id']);
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
                throw new Exception('L\'identifiant de commentaire n\'est pas valide');
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
                    header('Location: index.php?controler=frontend&action=post&id=' . $reportedComment->post_id());
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
                            throw new Exception('Le report ne peut être supprimé.');
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
                            throw new Exception('Le report ne peut être supprimé.');
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
                    throw new Exception('Le commentaire ne peut être supprimé.');
                }
                else {
                    /*if ($this->reportManager->existReport($commentId) != 0) {
                        $deletedLine = $this->reportManager->deleteReport($this->reportManager->existReport($commentId));
                        if ($deletedLine === false) {
                            throw new Exception('Le report ne peut être supprimé.');
                        } 
                    }*/
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
                    throw new Exception('Le commentaire ne peut être supprimé.');
                }
                else {
                    /*if ($this->reportManager->existReport($commentId) != 0) {
                        $deletedLine = $this->reportManager->deleteReport($this->reportManager->existReport($commentId));
                        if ($deletedLine === false) {
                            throw new Exception('Le report ne peut être supprimé.');
                        } 
                    }*/
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
