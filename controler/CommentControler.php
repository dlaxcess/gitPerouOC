<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\controler;

use perou\blog\entities\Comment;
use perou\blog\model\CommentManager;
use perou\blog\model\PostManager;
use perou\blog\model\View;

require_once('model/CommentManager.php');
require_once('model/PostManager.php');
require_once('view/frontend/View.php');
require_once 'entities\Comment.php';

class CommentControler
{
    private $_newComment;
    private $_modifComment;
    private $_thePost;

    public function __construct()
    {
        $this->_newComment = new CommentManager();
        $this->_modifComment = new CommentManager();
        $this->_thePost = new PostManager();
    }
    
    public function addComment($post_id, $comment_author, $comment)
    {
        $newComment = new Comment(['post_id' => $post_id, 'comment_author' => $comment_author, 'comment' => $comment]);
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
    
    public function enterNewComment($post_id, $comment_id)
    {
         if ( isset($post_id) && isset($comment_id) && $post_id > 0 && $comment_id > 0)
        {
            $toModifyComment = $this->_modifComment->getComment($comment_id);
            $post = $this->_thePost->getPost($post_id);

            $modifCommentView = new View('modifyComment');
            $modifCommentView->generer(array('toModifyComment' => $toModifyComment, 'post' => $post));
        }
    }

    function modifyComment($post_id, $comment_id, $new_content)
    {
        if (isset($new_content))
        {
            $newComment = new Comment(['post_id' => $post_id, 'comment_id' => $comment_id, 'comment' => $new_content]);
            $affectedLines = $this->_modifComment->setComment($newComment);
               
            if ($affectedLines === false)
            {
                throw new Exception('le commentaire ne peut être modifié');	
            }
            else
            {
                header('Location: index.php?action=post&post_id=' . $newComment->post_id());
            }
        }
    }
}