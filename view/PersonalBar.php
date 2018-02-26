<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\view;

/**
 * Description of PersonalBar
 *
 * @author dlaxc
 */
class PersonalBar {
    public function get() {
        ob_start();
        
        echo 'hello!';
        
        return ob_get_clean();
    }
}
