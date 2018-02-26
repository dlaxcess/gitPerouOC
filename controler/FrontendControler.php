<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler;

use perou\blog\framework\Controler;
use perou\blog\entities\Comment;
use perou\blog\model\PostManager;
use perou\blog\model\CommentManager;
use perou\blog\framework\View;

class FrontendControler extends Controler
{
    private $_posts;
    private $_post;
    private $_comments;
    private $_newComment;
    private $_modifComment;
    
    public function __construct()
    {
        $this->_posts = new PostManager();
        $this->_post = new PostManager();
        $this->_comments = new CommentManager();
        $this->_newComment = new CommentManager();
        $this->_modifComment = new CommentManager();
    }
    
    public function index()
    {
        echo 'index fonction par default!';
    }


    public function listPosts()
    {
        $posts = $this->_posts->getPosts();
        $displayPosts = new View('listPosts');
        $displayPosts->generate(array('posts' => $posts));
    }
    
     public function post()
    {
        $post = $this->_post->getPost($this->request->getParameter('post_id'));
        $comments = $this->_comments->getComments($this->request->getParameter('post_id'));
        $displayPost = new View('post');
        $displayPost->generate(array('post' => $post, 'comments' => $comments));
    }
    
    public function addComment()
    {
        $newComment = new Comment(['post_id' => $this->request->getParameter('post_id'), 'comment_author' => $this->request->getParameter('comment_author'), 'comment' => $this->request->getParameter('comment')]);
        $affectedLines = $this->_newComment->postComment($newComment);

        if ($affectedLines === false) 
        {
            throw new Exception('Le commentaire ne peut être posté.');
        }
        else
        {
            header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
        }
    }
    
    public function enterNewComment()
    {
        $post_id = $this->request->getParameter('post_id');
        $comment_id = $this->request->getParameter('comment_id');
         if ( isset($post_id) && isset($comment_id) && $post_id > 0 && $comment_id > 0)
         {
            $toModifyComment = $this->_modifComment->getComment($comment_id);
            $post = $this->_post->getPost($post_id);

            $modifCommentView = new View('modifyComment');
            $modifCommentView->generate(array('toModifyComment' => $toModifyComment, 'post' => $post));
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
            $affectedLines = $this->_modifComment->setComment($newComment);
               
            if ($affectedLines === false)
            {
                throw new \Exception('le commentaire ne peut être modifié');	
            }
            else
            {
                header('Location: index.php?controleur=frontend&action=post&post_id=' . $newComment->post_id());
            }
        }
    }
}