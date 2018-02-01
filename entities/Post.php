<?php

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
		
	}
}