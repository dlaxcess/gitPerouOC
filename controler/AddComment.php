<?php

namespace perou\blog\model;

use perou\blog\model\CommentManager;

require_once('model/CommentManager.php');

class AddComment
{
	private $_newComment;

	public function __construct()
	{
		$this->_newComment = new CommentManager();
	}

	public function addComment($post_id, $comment_author, $comment)
	{
		$affectedLines = $this->_newComment->postComment($post_id, $comment_author, $comment);

		if ($affectedLines === false) {
			throw new Exception('Le commentaire ne peut être posté.');
			
		}
		else
		{
			header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
		}
	}
}