<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\frontend;

use perou\blog\framework\SecuredControler;
use perou\blog\model\PostManager;
use perou\blog\model\CommentManager;
use perou\blog\framework\View;
use perou\blog\framework\Paging;

class FrontendControler extends SecuredControler
{
    private $_posts;
    private $_comments;
    
    public function __construct()
    {
        $this->_posts = new PostManager();
        $this->_comments = new CommentManager();
    }
    
    public function index()
    {
        echo 'index fonction par default!';
    }


    public function listPosts()
    {
        $PageNumer ='';
        $posts ='';
        if ($this->request->existParameter('id')) {
            if (intval($this->request->getParameter('id')) !=0) {
                $PageNumer = intval($this->request->getParameter('id'));
                $posts= $this->_posts->getPosts($PageNumer);
            }
            else {
                throw new Exception('Paramètre id invalide');
            }
        }
        else {
            $PageNumer = 1;
            $posts = $this->_posts->getPosts();
        }
        /*$postsPaging = new Paging($this->_posts->countPosts(), $PageNumer);*/
        $postAmount = intval($this->_posts->countPosts());
        $pagesAmount = ceil(($postAmount)/5);
        $postsPaging = new View('paging');
        $postsPaging = $postsPaging->generateFile('view/frontend/paging/pagingView.php', array('postAmount' => $postAmount, 'pageId' => $PageNumer, 'pagesAmount' => $pagesAmount));
        $displayPosts = new View('listPosts');
        $displayPosts->generate(array('posts' => $posts, 'request' => $this->request, 'postsPaging' => $postsPaging));
    }
    
     public function post()
    {
        $reportValidationMsg = '';
        $post = $this->_posts->getPost($this->request->getParameter('id'));
        $comments = $this->_comments->getComments($this->request->getParameter('id'));
        $displayPost = new View('post');
        $displayPost->generate(array('post' => $post, 'comments' => $comments, 'request' => $this->request, 'reportValidationMsg' => $reportValidationMsg));
    }
}