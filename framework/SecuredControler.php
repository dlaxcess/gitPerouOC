<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

use perou\blog\framework\Controler;

/**
 * Description of PersonalControler
 *
 * @author Administrateur
 */
class SecuredControler extends Controler {
    
    public function index() {
        echo 'yo!';
    }
    
    protected function generateView($viewDatas = array()) {
        if ($this->request->existParameter('sessionMember')) {
            $connectedMember = $this->request->getParameter('sessionMember'); 
        }
        if ($this->request->existParameter('cookieMember')) {
            $connectedMember = $this->request->getParameter('cookieMember');
        }
        parent::generateView($viewDatas + array('connectedMember' => $connectedMember));
    }
}
