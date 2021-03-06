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
        $sql = 'INSERT INTO ocp3reports(comment_id, report_content, report_date) VALUES(:id, :content, NOW())';
        $affectedLines = $this->executeRequest($sql, array('id' => $report->comment_id(),
                                                                              'content' => $report->report_content()
                                                                              ));

        return $affectedLines;
    }
    
    public function getReports() {
        $sql = 'SELECT report_id, comment_id, report_content, DATE_FORMAT(report_date, \'%d/%m/%Y à %Hh%imin%ss\') AS report_date_fr FROM ocp3reports ORDER BY report_date DESC';
        $reports = $this->executeRequest($sql);
        $reportsTab = array();
        
        while ($reportData = $reports->fetch(\PDO::FETCH_ASSOC))
        {
            $reportsTab[] = new Report($reportData);
        }
        
        return $reportsTab;
    }
    
    public function existReport($commentId) {
        $commentId = intval($commentId);
        if ($commentId > 0) {
            $sql = 'SELECT count(*) AS reportAmount FROM ocp3reports WHERE comment_id = :id';
            $req = $this->executeRequest($sql, array('id' => $commentId));
            $reportAmount = $req->fetch(\PDO::FETCH_ASSOC)['reportAmount'];
            
            if ($reportAmount != 0) {
                $sql = 'SELECT report_id, comment_id, report_content, report_date FROM ocp3reports WHERE comment_id = :id';
                $affectedLine = $this->executeRequest($sql, array('id' => $commentId));
                
                $report = new Report($affectedLine->fetch(\PDO::FETCH_ASSOC));
                
                return $report->report_id();
            }
            else {
                return 0;
            }
        }
    }
    
    public function deleteReport($reportId) {
        $sql = 'DELETE FROM ocp3reports WHERE report_id=:id';
        $deletedLines = $this->executeRequest($sql, array('id' => $reportId));
        
        return $deletedLines;
    }
}
