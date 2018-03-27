<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\backend;

use perou\blog\entities\Post;
use perou\blog\model\PostManager;
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
    
    protected $registration,
                   $newMember,
                   $connexion,
                   $connect,
                   $profil,
                   $newPost,
                   $postSuppression,
                   $postModification;
    
    public function __construct() {
        $this->registration = new MemberManager();
        $this->newMember = new MemberManager();
        $this->connexion = new MemberManager();
        $this->connect = new MemberManager();
        $this->profil = new MemberManager();
        $this->newPost = new PostManager();
        $this->postSuppression = new PostManager();
        $this->postModification = new PostManager();
    }
    
    public function index() {
        
    }
    
    public function connexion() {
        $displayConnexion = new View('connexion');
        $displayConnexion->generate(array('request' => $this->request));
    }
    
    public function connect() {
        $memberToConnect = $this->connect->getMemberByEmail($this->request->getParameter('memberEmail'));
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
        $affectedLines = $this->newMember->createMember($newMember);
        
        if ($affectedLines === FALSE) {
            throw new Exception('le membre ne peut être inscrit');
        }
        else {
            header('Location: index.php');
        }
    }
    
    public function profil() {
        $member = $this->profil->getMemberById($this->request->getParameter('id'));
        $displayProfil = new View('profil', 'backend');
        $displayProfil->generate(array('member' => $member, 'request' => $this->request));
    }
    
    public function newPost() {
        $newPost = new Post(['post_title' => $this->request->getParameter('newPostTitle'), 'post_content' => $this->request->getParameter('newPostContent'), 'post_author' => $this->request->getParameter('sessionMember')->member_name()]);
        $affectedLines = $this->newPost->addPost($newPost);
        
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
        $deletedLine = $this->postSuppression->erasePost($this->request->getParameter('id'));
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
        $postToModify = $this->postModification->getPostSqlDate($this->request->getParameter('id'));
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
            $affectedLines = $this->postModification->setPost($newPost);
            
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
}
