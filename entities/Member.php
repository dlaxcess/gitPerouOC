<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\entities;

/**
 * Description of Member
 *
 * @author dlaxc
 */
class Member {
    Protected $member_id,
                   $member_name,
                   $member_email,
                   $member_password,
                   $member_acces;
    
    public function __construct(array $donnees) {
        $this->hydratate($donnees);
    }
    
    public function hydratate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

        // GETTERS
    public function member_id() {
        return $this->member_id;
    }
    
    public function member_name() {
        return $this->member_name;
    }
    
    public function member_email() {
        return $this->member_email;
    }
    
    public function member_password() {
        return $this->member_password;
    }
    
    public function member_acces() {
        return $this->member_acces;
    }
    
    //SETTERS
    public function setMember_id ($id) {
        $id = intval($id);
        if ($id > 0) {
            $this->member_id = $id;
        }
    }
    
    public function setMember_name($name) {
        if (is_string($name)) {
            $this->member_name = htmlspecialchars($name);
        }
    }
    
    public function setMember_email($email) {
        if (is_string($email)) {
            $this->member_email = htmlspecialchars($email);
        }
    }
    
    public function setMember_password($password) {
        if (is_string($password)) {
            $this->member_password = htmlspecialchars($password);
        }
    }
    
    public function setMember_acces($access) {
        $this->member_acces = $access;
    }
}
