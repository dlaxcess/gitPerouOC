<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

use perou\blog\framework\Request;
use perou\blog\view\frontend\View;

/**
 * Description of Controler
 *
 * @author minibee
 */
abstract class Controler {
    
    // Action to execute
    private $_action;
    // Entering request
    protected $request;
    
    public function setRequest(Request $request) {
        $this->request = $request;
    }
    
    // Execute action
    public function executeAction($action) {
        if (method_exists($this, $action)) {
            $this->_action = $action;
            $this->{$this->_action} ();
        }
        else {
            $controlerClass = get_class($this);
            throw new \Exception("Action '$action' non définie dans la classe '$controlerClass'");
        }
    }
    
    // Abstract default class
    public abstract function index();
    
    // Generate appropriate view for the current Controler
    /*protected function generateView($viewDatas = array()) {
        $controlerClass = get_class($this);
        $controler = str_replace("Controler", "", $controlerClass);
        $view = new View($this->_action, $controler);
        $view->generate($viewDatas);
    }*/
}
