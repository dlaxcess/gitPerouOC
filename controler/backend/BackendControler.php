<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\backend;

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
                   $profil;
    
    public function __construct() {
        $this->registration = new MemberManager();
        $this->newMember = new MemberManager();
        $this->connexion = new MemberManager();
        $this->connect = new MemberManager();
        $this->profil = new MemberManager();
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
                setcookie('cookieMember', $memberToConnect, time() + 365*24*3600, null, null, false, true);
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
}
