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

use perou\blog\entities\Autoloader;
use \perou\blog\model\Manager;
use \perou\blog\entities\Post;

require_once('entities/Autoloader.php');
Autoloader::register();
/*require_once("model/Manager.php");
require_once("entities/Post.php");*/

Class PostManager extends Manager
{
    public function getPosts()
    {
        $sql = 'SELECT post_id, post_title, post_content, post_author, DATE_FORMAT(post_creation_date, \'%d/%m/%Y &agrave; %Hh%imin%ss\') AS post_creation_date_fr FROM posts ORDER BY post_creation_date DESC LIMIT 0, 5';
        $req = $this->executerRequete($sql);
        
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
            $req = $this->executerRequete($sql, array($postId));
            $post = new Post($req->fetch(\PDO::FETCH_ASSOC));

        return $post;
    }
}