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

use \perou\blog\model\Manager;
use \perou\blog\entities\Post;

require_once("model/Manager.php");
require_once("entities/Post.php");

Class PostManager extends Manager
{
    public function getPosts()
    {
        /*$db = $this->dbConnect();*/
        $sql = 'SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_creation_date_fr FROM posts ORDER BY post_creation_date DESC LIMIT 0, 5';
        $req = $this->executerRequete($sql);
        /*$req = $db->query('SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_creation_date_fr FROM posts ORDER BY post_creation_date DESC LIMIT 0, 5');*/
       $postsTab = array();
        while ($newPostDatas = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $postsTab[] = new Post($newPostDatas);
        }
        return $postsTab;
    }

    public function getPost($postId)
    {
            $sql = 'SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_creation_date_fr FROM posts WHERE post_id = ?';
            $req = $this->executerRequete($sql, array($postId));
            $post = $req->fetch();
            $req->closeCursor();

        /*$db = $this->dbConnect();
        $req = $db->prepare('SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_creation_date_fr FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        $req->closeCursor();*/

        return $post;
    }
}