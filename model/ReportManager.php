<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\model;

use perou\blog\model\Manager;
use perou\blog\entities\Report;

/**
 * Description of ReportManager
 *
 * @author Administrateur
 */
class ReportManager extends Manager {
    
    public function postReport(Report $report) {
        $sql = 'INSERT INTO reports(comment_id, report_content, report_date) VALUES(:id, :content, NOW())';
        $affectedLines = $this->executeRequest($sql, array('id' => $report->comment_id(),
                                                                              'content' => $report->report_content()
                                                                              ));

        return $affectedLines;
    }
}
