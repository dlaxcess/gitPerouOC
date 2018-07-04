<?php

namespace perou\blog\framework;

/*use perou\blog\view\PersonalBar;*/
use perou\blog\model\CommentManager;

class View
{
    private $_file;
    private $_title;
    private $_personalBar;
    private $_action;

    public function __construct($action, $controler ="")
    {
        $this->_action = $action;
        $file = "view/";
        if ($controler != "")
        {
            $file =$file . $controler . "/";
        }
        else
        {
            $file = $file . 'frontend/';
        }
        $this->_file = $file . $action . "/" . $action . 'View.php';
    }

    public function generate($datas)
    {
        $this->_personalBar = $this->generatePersonalBar($datas);
        
        $page_content = $this->generateFile($this->_file, $datas);
        
        $racineWeb = \perou\blog\framework\Configuration::get("racineWeb", "/");

        $view = $this->generateFile('view/template.php', array('page_title' =>$this->_title, 'personalBar' => $this->_personalBar, 'page_content' =>$page_content, 'racineWeb' => $racineWeb));
        echo $view;
    }

    public function generateFile($_file, $datas)
    {
        if (file_exists($_file))
        {
            extract($datas);

            ob_start();
            require($_file);

            return ob_get_clean();
        }
        else
        {
            throw new \Exception("Fichier : '$_file' introuvable");
        }
    }
    
    public function generatePersonalBar($datas) {
        $commentModeration = new CommentManager();
        $reportedComments = $commentModeration->countReportedComment();
        $moderatedComments = $commentModeration->countModeratedComment();
        $datas = array_merge($datas + ['reportedComments' => $reportedComments, 'moderatedComments' => $moderatedComments]);
        $personalBar = $this->generateFile('view/frontend/personalBAr/personalBarView.php', $datas);

        return $personalBar;
    }
}