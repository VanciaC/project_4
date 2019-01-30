<?php
require_once('model/Admin.php');
require_once('views/View.php');

class ControllerAdmin{

	private $admin;
	private $post;

	public function __construct(){
		$this->admin = new Admin();
		$this->post = new Post();

	}
	public function connection($pseudo){
		$admin = $this->admin->getPseudo($pseudo);
		$view = new View("Admin");
		$view->generate(array('admin' => $admin));
	}

	public function user($pseudo){
		return $this->admin->getUser($pseudo);
	}
}