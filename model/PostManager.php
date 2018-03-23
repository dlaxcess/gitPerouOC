<?php

/**
 * Manager for the posts.
 *
 * This method will get all the posts in the database or only 1.
 *
 * @param void | int $post_id : id of the post to catch.
 *
 * @return object $req | object $post
 *	$req : all posts in database
 *	$post : post catched
 */

namespace perou\blog\model;

use perou\blog\model\Manager;
use perou\blog\entities\Post;

Class PostManager extends Manager
{
    public function getPosts()
    {
        $sql = 'SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y &agrave; %Hh%imin%ss\') AS post_creation_date_fr FROM posts ORDER BY post_creation_date DESC LIMIT 0, 5';
        $req = $this->executeRequest($sql);
        
       $postsTab = array();
        while ($newPostDatas = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $postsTab[] = new Post($newPostDatas);
        }
        return $postsTab;
    }

    public function getPost($postId)
    {
            $sql = 'SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y &agrave; %Hh%imin%ss\') AS post_creation_date_fr FROM posts WHERE post_id = ?';
            $req = $this->executeRequest($sql, array($postId));
            $post = new Post($req->fetch(\PDO::FETCH_ASSOC));

        return $post;
    }
    
    public function addPost(Post $newPost) {
        $sql = 'INSERT INTO posts(post_title, post_content, post_creation_date, post_author) VALUES(:title, :content, NOW(), :author)';
        $affectedLines = $this->executeRequest($sql, array('title' => $newPost->post_title(),
                                                                              'content' => $newPost->post_content(),
                                                                              'author' => $newPost->post_author()
                                                                                ));
        
        return $affectedLines;
    }
    
    public function erasePost($postID) {
        $sql = 'DELETE FROM posts WHERE post_id=:id';
        $deletedLines = $this->executeRequest($sql, array('id' => $postID));
        
        return $deletedLines;
    }
}