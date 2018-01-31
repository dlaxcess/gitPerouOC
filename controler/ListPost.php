<?php

namespace perou\blog\model;

use perou\blog\model\PostManager;
use perou\blog\model\View;

require_once('model/PostManager.php');
require_once('view/frontend/View.php');

class ListPost
{
	private $_billets;

	public function __construct()
	{
		$this->_billets = new PostManager;
	}

	public function listPosts()
	{
		$billets = $this->_billets->getPosts();
		$affichePosts = new View('listPosts');
		$affichePosts->generer(array('posts' => $billets));
	}
}