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

use perou\blog\model\Manager;
use perou\blog\entities\Comment;

Class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $sql = 'SELECT comment_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, comment_moderation FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        $comments = $this->executeRequest($sql, array($postId));
        $commentsTab = array();
        
        while ($commentData = $comments->fetch(\PDO::FETCH_ASSOC))
        {
            $commentsTab[] = new Comment($commentData);
        }
        
        return $commentsTab;
    }

    public function postComment(Comment $newComment)
    {
        $sql = 'INSERT INTO comments(post_id, comment_author, comment, comment_date) VALUES(:id, :author, :comment, NOW())';
        $affectedLines = $this->executeRequest($sql, array('id' => $newComment->post_id(),
                                                                                    'author' => $newComment->comment_author(),
                                                                                    'comment' => $newComment->comment()
                                                                                    ));

        return $affectedLines;
    }

    public function getComment($comment_id)
    {
        $sql = 'SELECT comment_id, post_id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, comment_moderation FROM comments WHERE comment_id = ?';
        $req = $this->executeRequest($sql, array($comment_id));
        $comment = new Comment($req->fetch(\PDO::FETCH_ASSOC));
        $req->closeCursor();

        return $comment;
    }

    public function setComment(Comment $newComment)
    {
        $sql = 'UPDATE comments SET comment = :new_comment, comment_date = NOW() WHERE comment_id = :id';
        $affectedLines = $this->executeRequest($sql, array('new_comment' => $newComment->comment(),
                                                                                                    'id' => $newComment->comment_id()
                                                                                                   ));

            return $affectedLines;
    }
    
    public function eraseComment($commentId) {
        $sql = 'DELETE FROM comments WHERE comment_id=:id';
        $deletedLines = $this->executeRequest($sql, array('id' => $commentId));
        
        return $deletedLines;
    }
    
    public function setCommentModeration($commentId, $moderation) {
        $sql = 'UPDATE comments SET comment_moderation = :moderation WHERE comment_id = :id';
        $affectedLines = $this->executeRequest($sql, array('moderation' => $moderation,
                                                                              'id' => $commentId
                                                                                ));

        return $affectedLines;
    }
}