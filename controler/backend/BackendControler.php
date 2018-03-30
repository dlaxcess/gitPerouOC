<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\backend;

use perou\blog\entities\Post;
use perou\blog\model\PostManager;
use perou\blog\model\CommentManager;
use perou\blog\framework\SecuredControler;
use perou\blog\model\MemberManager;
use perou\blog\framework\View;
use perou\blog\entities\Member;
use perou\blog\framework\PasswordTester;

/**
 * Description of BackendControler
 *
 * @author dlaxc
 */
class BackendControler extends SecuredControler {
    
    protected $memberManager,
                  $postManager,
                  $commentManager;
    
    public function __construct() {
        $this->memberManager = new MemberManager();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
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
        $deletedLine = $this->postManager->erasePost($this->request->getParameter('id'));
        if ($deletedLine === false) 
        {
            throw new Exception('L\'article ne peut être supprimé.');
        }
        else
        {
            header('Location: index.php');
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
    
    public function reportComment() {
        if ($this->request->existParameter('commentId')) {
            $commentId = $this->request->getParameter('commentId');
            $commentId = intval($commentId);
            if ($commentId >0) {
                $commentToReport = $this->commentManager->getComment($commentId);
                $displayCommentToReport = new View('reportComment', 'backend');
                $displayCommentToReport->generate(array('request' => $this->request, 'commentToReport' => $commentToReport));
            }
            else {
                throw new Exception('L\'identifiant de commentaire n\'est pas valide');
            }
        }
    }
    
    public function sendCommentedReport() {
        
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
                else
                {
                    header('Location: index.php?controler=frontend&action=post&id=' . $this->request->getParameter('id'));
                }
            }
        }
    }
}
