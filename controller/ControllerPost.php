<?php

require_once('model/Post.php');
require_once('model/Comment.php');
require_once('model/Admin.php');
require_once('views/View.php');

class ControllerPost{

	private $post;
	private $comment;
	private $admin;

	public function __construct(){
		$this->post = new Post();
		$this->comment = new Comment();
		$this->admin = new Admin();
	}
	//methods for post
	public function post($idPost, $currentPage){
		$post = $this->post->getPost($idPost);
		$comments = $this->comment->getComments($idPost, $currentPage);
		$totalPages = $this->comment->totalPages($idPost);
		$view = new View("Post");
		$view->generate(array('post' => $post, 'comments' => $comments, 'totalPages' => $totalPages));
	}
	public function pageUpdate($idPost){
		$posts = $this->post->getPost($idPost);
		$view = new View("Update");
		$view->generate(array('posts' => $posts));
	}

	public function update($idPost, $title, $content, $currentPage){
		$this->admin->updatePost($idPost, $title, $content);
		$this->post($idPost, $currentPage);
	}

	public function deletePost($idPost){
		$this->admin->deletePost($idPost);
	}

	public function addPost($title, $content){
		$this->admin->addPost($title, $content);
	}

	//methods for comments
	public function comment($author, $comment, $idPost, $currentPage){
		$this->comment->addComments($author, $comment, $idPost);
		$this->post($idPost, $currentPage);
	}

	public function deleteComment($idComment){
		$this->admin->deleteComment($idComment);
	}

	public function report($idPost, $idComment, $pseudo, $comment, $currentPage){
		$this->post->addReport($idComment, $pseudo, $comment);
		$this->post($idPost, $currentPage);
	}

	public function deleteReport($idComment){
		$this->admin->deleteReport($idComment);
	}
}