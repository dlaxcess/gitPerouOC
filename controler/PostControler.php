<?php

namespace perou\blog\model;

use perou\blog\model\PostManager;
use perou\blog\model\CommentManager;
use perou\blog\model\View;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/View.php');

class PostController
{
	private $_billet;
	private $_comments;

	public function __construct()
	{
		$this->_billet = new PostManager;
		$this->_comments = new CommentManager;
	}

	public function post()
	{
		$billet = $this->_billet->getPost($_GET['post_id']);
		$comments = $this->_comments->getComments($_GET['post_id']);
		$affichePost = new View('post');
		$affichePost->generer(array('post' => $billet, 'comments' => $comments));
	}
}