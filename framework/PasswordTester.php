<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

use perou\blog\framework\Request;
use perou\blog\entities\Member;

/**
 * Description of TestConnexion
 *
 * @author dlaxc
 */
class PasswordTester {
    
    
    public static function testConnexion(Request $request, Member $member) {
        if ($request->existParameter('memberPassword')) {
            $passTest = password_verify($request->getParameter('memberPassword'), $member->member_password());
        }
        
        return $passTest;
    }
    
    public static function testEquality(Requete $request) {
        if ($request->existParameter('memberPassword') & $request->existParameter('memberPasswordConfirm')) {
            if ($request->getParameter('memberPassword') == $request->getParameter('memberPasswordConfirm')) {
                return TRUE;
            }
            else {
                return False;
            }
        }
    }
}
