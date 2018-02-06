<?php

namespace perou\blog\model;

use perou\blog\model\CommentManager;
use perou\blog\model\PostManager;
use perou\blog\model\View;

require_once('model/CommentManager.php');
require_once('model/PostManager.php');
require_once('view/frontend/View.php');

class ModifyComment
{
    private $_modifComment;
    private $_thePost;

    public function __construct()
    {
        $this->_modifComment = new CommentManager();
        $this->_thePost = new PostManager();
    }

    function modifyComment($post_id, $comment_id, $new_comment)
    {
        if (isset($new_comment))
        {
            $affectedLines = $this->_modifComment->setComment($comment_id, htmlspecialchars($new_comment));
               
            if ($affectedLines === false)
            {
                throw new Exception('le commentaire ne peut être modifié');	
            }
            else
            {
                header('Location: index.php?action=post&post_id=' . $post_id);
            }
        }
        elseif (isset($comment_id))
        {
            $toModifyComment = $this->_modifComment->getComment($comment_id);
            $post = $this->_thePost->getPost($post_id);

            $modifCommentView = new View('modifyComment');
            $modifCommentView->generer(array('toModifyComment' => $toModifyComment, 'post' => $post));
        }
    }
}