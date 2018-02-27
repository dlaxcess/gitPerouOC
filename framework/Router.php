<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\framework;

use perou\blog\framework\Request;
use perou\blog\controler\frontend\FrontendControler;
use perou\blog\controler\backend\BackendControler;
use perou\blog\framework\View;
/*require_once 'controler/frontend/FrontendControler.php';
require_once 'framework/Controler.php';*/

/**
 * Description of Router
 *
 * @author minibee
 */
class Router
{
    //Rout an entering Request : execute associate action
    public function routRequest()
    {
        try
        {
        //Mix $_GET & $_POST parameters
        $request = new Request(array_merge($_GET, $_POST));
        
        $controler =$this->createControler($request);
        $action = $this->createAction($request);
        
        $controler->executeAction($action);
        }
        catch (Exception $exception)
            {
            echo $exception->getTraceAsString();
            }
    }
    
    public function createControler(Request $request)
    {
        $controler = "frontend";
        if ($request->existParameter('controler'))
        {
            $controler = $request->getParameter('controler');
        }
        $controlerUC = ucfirst(strtolower($controler));
        //Name of controler file creation
        $controlerClassNameNSpace = "perou\\blog\\controler\\" . $controler ."\\" . $controlerUC . "Controler";
        $controlerClassName = $controlerUC . "Controler";
        $controlerFileName = "controler/". $controler . "/" . $controlerClassName . ".php";
        if (file_exists($controlerFileName))
        {  //instantiation of the request adapted controler
            //require ($controlerFileName);
            $controler = new $controlerClassNameNSpace();
            /*var_dump($controler);*/
            $controler->setRequest($request);
            
            return $controler;
        }
        else
        {
            throw new \Exception("Fichier '$controlerFileName' introuvable");
        }
    }
    
    private function createAction(Request $request)
    {
        $action = "listPosts";
        if ($request->existParameter('action'))
        {
            $action = $request->getParameter('action');
        }
        
        return $action;
    }
    
    private function manageError(\Exception $exception)
    {
        $view = new View('error');
        $view->generate(array('ErrorMsg' => $exception->getMessage()));
    }
}
