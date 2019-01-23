<?php

require_once('model/Post.php');
require_once('model/Comment.php');
require_once('views/View.php');

class ControllerPost{

	private $post;
	private $comment;

	public function __construct(){
		$this->post = new Post();
		$this->comment = new Comment();
	}

	public function post($idPost){
		$post = $this->post->getPost($idPost);
		$comments = $this->comment->getComments($idPost);
		$view = new View("Post");
		$view->generate(array('post' => $post, 'comments' => $comments));
	}
}