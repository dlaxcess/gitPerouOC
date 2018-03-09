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
    
    public function setRequest(Request $request) {
        $newRequest = $request;
        $oldRequestTab = $request->getAllParam();
        if ($request->existParameter('sessionMember')) {
            $connectedMember = $request->getParameter('sessionMember');
            $newRequest = new Request($oldRequestTab + array('connectedMember' => $connectedMember));
        }
        if ($request->existParameter('cookieMember')) {
            $connectedMember = $request->getParameter('cookieMember');
            $newRequest = new Request($oldRequestTab + array('connectedMember' => $connectedMember));
        }
        
        parent::setRequest($newRequest);
    }
}
