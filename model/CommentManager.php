<?php

/**
 * Manager for the comments.
 *
 * This method will get all the comments in the database or only 1.
 * It will also post or modify a comment.
 *
 * @param int $postId | string comment_author | string $comment_c | int $comment_id | string $new_comment.
 *
 * @return object $comments | int $affectedLines | array $comment
 *	$comments : all comments in database
 *	$affectedLines : number of lines affected at the creation or modification of a comment
 *	$comment : 1 comment
 */

namespace perou\blog\model;

use \perou\blog\model\Manager;

/*require_once("model/Manager.php");*/

Class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$sql = 'SELECT comment_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
		$comments = $this->executerRequete($sql, array($postId));

	    /*$db = $this->dbConnect();
	    $comments = $db->prepare('SELECT comment_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	    $comments->execute(array($postId));*/

	    return $comments;
	}

	public function postComment($post_id, $comment_author, $comment_c)
	{
		$sql = 'INSERT INTO comments(post_id, comment_author, comment, comment_date) VALUES(:id, :author, :comment, NOW())';
		$affectedLines = $this->executerRequete($sql, array('id' => $post_id,
													        'author' => htmlspecialchars($comment_author),
													        'comment' => nl2br(htmlspecialchars($comment_c))
													    	));

	    /*$db = $this->dbConnect();
	    $comment = $db->prepare('INSERT INTO comments(post_id, comment_author, comment, comment_date) VALUES(:id, :author, :comment, NOW())');
	    $affectedLines = $comment->execute(array(
	        'id' => $post_id,
	        'author' => htmlspecialchars($comment_author),
	        'comment' => nl2br(htmlspecialchars($comment_c))
	    ));*/

	    return $affectedLines;
	}

	public function getComment($comment_id)
	{
		$sql = 'SELECT comment_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_id = ?';
		$req = $this->executerRequete($sql, array($comment_id));
		$comment = $req->fetch();
	    $req->closeCursor();

		/*$db = $this->dbConnect();
	    $req = $db->prepare('SELECT comment_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_id = ?');
	    $req->execute(array($comment_id));
	    $comment = $req->fetch();
	    $req->closeCursor();*/

	    return $comment;
	}

	public function setComment($comment_id, $new_comment)
	{
		$sql = 'UPDATE comments SET comment = :new_comment, comment_date = NOW() WHERE comment_id = :id';
		$affectedLines = $this->executerRequete($sql, array('new_comment' => $new_comment,
															'id' => $comment_id
															));

		/*$db = $this->dbConnect();
		$comment = $db->prepare('UPDATE comments SET comment = :new_comment, comment_date = NOW() WHERE comment_id = :id');
		$affectedLines = $comment->execute(array(
									'new_comment' => $new_comment,
									'id' => $comment_id
									));*/
		return $affectedLines;
	}
}