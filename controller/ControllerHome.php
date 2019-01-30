<?php

require_once('model/Post.php');
require_once('model/Admin.php');
require_once('views/View.php');

class ControllerHome{

	private $post;
	private $admin;

	public function __construct(){
		$this->post = new Post();
		$this->admin = new Admin();
	}

	public function home(){
		$posts = $this->post->getPosts();
		$view = new View("Home");
		$view->generate(array('posts' => $posts));
	}

	public function delete($idPost){
		$delete = $this->admin->deletePost($idPost);
	}
}