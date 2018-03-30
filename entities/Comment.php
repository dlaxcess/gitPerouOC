<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace perou\blog\entities;

class Comment
{
    protected $comment_id,
                  $post_id,
                  $comment_author,
                  $comment,
                  $comment_date,
                  $comment_moderation;

    public function __construct(array $donnees)
    {
        $this->hydratate($donnees);
    }

    public function hydratate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

// GETTERS
    public function comment_id()
    {
        return $this->comment_id;
    }

    public function post_id()
    {
        return $this->post_id;
    }

    public function comment_author()
    {
        return $this->comment_author;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function comment_date()
    {
        return $this->comment_date;
    }
    
    public function comment_moderation()
    {
        return $this->comment_moderation();
    }

// SETTERS
    public function setComment_id($id)
    {
        $id = intval($id);
        if ($id > 0)
        {
            $this->comment_id = $id;
        }
    }

    public function setPost_id($id)
    {
       $id = intval($id);
        if ($id > 0)
        {
            $this->post_id = $id;
        }
    }

    public function setComment_author($author)
    {
        if (is_string($author))
        {
            $this->comment_author = htmlspecialchars($author);
        }
    }

    public function setComment($comment)
    {
        if (is_string($comment))
        {
            $this->comment = htmlspecialchars(nl2br($comment));
        }
    }

    public function setComment_date_fr($dateTime)
    {
        $this->comment_date = $dateTime;
    }
    
    public function setComment_moderation($commentModeration)
    {
        $this->comment_moderation = $commentModeration;
    }
}

