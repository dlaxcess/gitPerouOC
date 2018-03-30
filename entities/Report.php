<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\entities;

/**
 * Description of Report
 *
 * @author Administrateur
 */
class Report {
    Protected $report_id,
                   $comment_id,
                   $report_content,
                   $report_date;
    
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
    public function report_id() {
        return $this->report_id;
    }
    
    public function comment_id() {
        return $this->comment_id;
    }
    
    public function report_content() {
        return $this->report_content;
    }
    
    public function report_date() {
        return $this->report_date;
    }
    
    //SETTERS
    public function setReport_id ($id) {
        $id = intval($id);
        if ($id > 0) {
            $this->report_id = $id;
        }
    }
    
    public function setComment_id ($id) {
        $id = intval($id);
        if ($id > 0) {
            $this->comment_id = $id;
        }
    }
    
    public function setReport_content($content) {
        if (is_string($content)) {
            $this->report_content = htmlspecialchars(nl2br($content));
        }
    }
    
    public function setReport_date($date) {
        $this->report_date = $date;
    }
}