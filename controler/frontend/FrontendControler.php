<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler\frontend;

use perou\blog\framework\SecuredControler;
use perou\blog\entities\Comment;
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
        if ($this->request->existParameter('id')) {
            $PageNumer = intval($this->request->getParameter('id'));
            $posts= $this->_posts->getPosts($PageNumer);
        }
        else {
            $posts = $this->_posts->getPosts();
        }
        $postsPaging = new Paging($this->_posts->countPosts());
        $displayPosts = new View('listPosts');
        $displayPosts->generate(array('posts' => $posts, 'request' => $this->request, 'postsPaging' => $postsPaging));
    }
    
     public function post()
    {
        $post = $this->_posts->getPost($this->request->getParameter('id'));
        $comments = $this->_comments->getComments($this->request->getParameter('id'));
        $displayPost = new View('post');
        $displayPost->generate(array('post' => $post, 'comments' => $comments, 'request' => $this->request));
    }
    
    public function addComment()
    {
        $newComment = new Comment(['post_id' => $this->request->getParameter('id'), 'comment_author' => $this->request->getParameter('comment_author'), 'comment' => $this->request->getParameter('comment')]);
        $affectedLines = $this->_comments->postComment($newComment);

        if ($affectedLines === false) 
        {
            throw new Exception('Le commentaire ne peut être posté.');
        }
        else
        {
            header('Location: index.php?action=post&id=' . $_GET['id']);
        }
    }
    
    public function enterNewComment()
    {
        //$oldAction is used when the comment is modified from showReportedCommentView or showModeratedCommentView
        $oldAction = NULL;
        if ($this->request->existParameter('oldAction')) {
            if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                $oldAction = $this->request->getParameter('oldAction');
            }
        }
        $post_id = $this->request->getParameter('id');
        $comment_id = $this->request->getParameter('comment_id');
         if ( isset($post_id) && isset($comment_id) && $post_id > 0 && $comment_id > 0)
         {
            $toModifyComment = $this->_comments->getComment($comment_id);
            $post = $this->_posts->getPost($post_id);

            $modifCommentView = new View('modifyComment');
            $modifCommentView->generate(array('toModifyComment' => $toModifyComment, 'post' => $post, 'request' => $this->request, 'oldAction' => $oldAction));
        }
    }

    function modifyComment()
    {
        $post_id = $this->request->getParameter('post_id');
        $comment_id = $this->request->getParameter('comment_id');
        $new_content = $this->request->getParameter('new_comment');
        
        if (isset($new_content))
        {
            $newComment = new Comment(['post_id' => $post_id, 'comment_id' => $comment_id, 'comment' => $new_content]);
            $affectedLines = $this->_comments->setComment($newComment);
               
            if ($affectedLines === false)
            {
                throw new \Exception('le commentaire ne peut être modifié');	
            }
            else
            {
                if ($this->request->existParameter('oldAction')) {
                    if ($this->request->getParameter('oldAction') == 'showReportedComments' OR $this->request->getParameter('oldAction') == 'showModeratedComments') {
                        header('Location: index.php?controler=backend&action=' . $this->request->getParameter('oldAction'));
                    }
                }
                else {
                    header('Location: index.php?controleur=frontend&action=post&id=' . $newComment->post_id());
                }
            }
        }
    }
}