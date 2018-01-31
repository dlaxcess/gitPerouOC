<?php

namespace perou\blog\model;

use \perou\blog\model\ListPost;
use \perou\blog\model\Post;
use \perou\blog\model\AddComment;
use \perou\blog\model\ModifyComment;
use perou\blog\model\View;

require_once('controler/ListPost.php');
require_once('controler/Post.php');
require_once('controler/AddComment.php');
require_once('controler/ModifyComment.php');
require_once('view/frontend/View.php');

class Router
{
	private $_listPostCtrl;
	private $_postCtrl;
	private $_commentPostCtrl;
	private $_modifCommentCtrl;

	public function __construct()
	{
		$this->_listPostCtrl = new ListPost();
		$this->_postCtrl = new Post();
		$this->_commentPostCtrl = new AddComment();
		$this->__modifCommentCtrl = new ModifyComment();

	}

	public function routerRequete()
	{
		try {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'listPosts') {
					$this->_listPostCtrl->listPosts();
				}
				elseif ($_GET['action'] == 'post') {
					if (isset($_GET['post_id']) AND $_GET['post_id'] > 0) {
						$this->_postCtrl->post();
					}
					else{
						throw new \Exception('Pas d\'identifiant d\'article envoyé');
						
					}
				}
				elseif ($_GET['action'] == 'addComment') {
					if (isset($_GET['post_id']) AND $_GET['post_id'] > 0) {
						if (!empty($_POST['comment_author']) AND !empty($_POST['comment'])) {
							$this->_commentPostCtrl->addComment($_GET['post_id'], $_POST['comment_author'], $_POST['comment']);
						}
						else {
							throw new \Exception('Tous les champs ne sont pas remplis');
							
						}
					}
					else {
						throw new \Exception('Pas d\'id d\' article envoyé');
						
					}
				}
				elseif ($_GET['action'] == 'modifyComment') {
					if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0) {
							if (!empty($_POST['new_comment'])) {
								$this->__modifCommentCtrl->modifyComment($_GET['post_id'], $_GET['comment_id'], $_POST['new_comment']);
							}
							else
							{
								$this->__modifCommentCtrl->modifyComment($_GET['post_id'], $_GET['comment_id'], null);
							}
							
					}
					else
					{
						throw new \Exception('Le commentaire ou le post n\'existe pas.');
						
					}
				}
			}
			else
			{
				$this->_listPostCtrl->listPosts();
			}
		} catch (\Exception $e) {
			$errorMessage = 'Erreur : ' . $e->getMessage();
			$afficheError = new View('error');
			$afficheError->generer(array('errorMessage' => $errorMessage));
		}
	}
}