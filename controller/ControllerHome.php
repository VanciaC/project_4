<?php

require_once('model/Post.php');
require_once('views/View.php');

class ControllerHome{

	private $post;

	public function __construct(){
		$this->post = new Post();
	}

	public function home(){
		$posts = $this->post->getPosts();
		$view = new View("Home");
		$view->generate(array('posts' => $posts));
	}

}