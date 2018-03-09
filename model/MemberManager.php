<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\model;

use perou\blog\model\Manager;
use perou\blog\entities\Member;
/**
 * Description of MemberManager
 *
 * @author dlaxc
 */
class MemberManager extends Manager {
    
    public function createMember(Member $newMember) {
        $sql = 'INSERT INTO members(member_name, member_email, member_password) VALUES(:name, :email, :password)';
        $affectedLines = $this->executeRequest($sql, array('name' => $newMember->member_name(),
                                                                                    'email' => $newMember->member_email(),
                                                                                    'password' => $newMember->member_password()
                                                                                    ));
        
        return $affectedLines;
    }
    
    public function getMemberByEmail($email) {
        $sql = 'SELECT Member_id, member_name, member_email, member_password, member_acces FROM members WHERE member_email = ?';
        $req = $this->executeRequest($sql, array($email));
        $member = new Member($req->fetch(\PDO::FETCH_ASSOC));
        
        return $member;
    }
    
    public function getMemberById($id) {
        $sql = 'SELECT Member_id, member_name, member_email, member_password, member_acces FROM members WHERE member_id = ?';
        $req = $this->executeRequest($sql, array($id));
        $member = new Member($req->fetch(\PDO::FETCH_ASSOC));
        
        return $member;
    }
}
