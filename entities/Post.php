<?php

namespace perou\blog\entities;

class Post
{
    protected $post_id,
                      $post_title,
                      $post_content,
                      $post_creation_date,
                      $post_author;

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
    public function post_id()
    {
        return $this->post_id;
    }

    public function post_title()
    {
        return $this->post_title;
    }

    public function post_content()
    {
        return $this->post_content;
    }

    public function post_creation_date()
    {
        return $this->post_creation_date;
    }

    public function post_author()
    {
        return $this->post_author;
    }

// SETTERS
    public function setPost_id($id)
    {
        $id = intval($id);
        if ($id > 0)
        {
            $this->post_id = $id;
        }
    }

    public function setPost_title($title)
    {
        if (is_string($title))
        {
            $this->post_title = htmlspecialchars($title);
        }
    }

    public function setPost_content($content)
    {
        if (is_string($content))
        {
            $this->post_content = htmlspecialchars(nl2br($content));
        }
    }

    public function setPost_creation_date_fr($dateTime)
    {
        $this->post_creation_date = $dateTime;
    }

    public function setPost_author($author)
    {
        if (is_string($author))
        {
            $this->post_author = htmlspecialchars($author);
        }
    }
}