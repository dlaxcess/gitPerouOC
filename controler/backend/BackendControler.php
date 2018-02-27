<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\backend;

use perou\blog\framework\Controler;
use perou\blog\model\MemberManager;
use perou\blog\framework\View;
use perou\blog\entities\Member;

/**
 * Description of BackendControler
 *
 * @author dlaxc
 */
class BackendControler extends Controler {
    
    protected $registration,
                   $connexion,
                   $newMember;
    
    public function __construct() {
        $this->registration = new MemberManager();
        $this->connexion = new MemberManager();
        $this->newMember = new MemberManager();
    }
    
    public function index() {
        
    }
    
    public function connexion() {
        $displayConnexion = new View('connexion');
        $displayConnexion->generate(array('request' => $this->request));
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
}
