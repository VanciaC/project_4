<?php
require_once('model/Admin.php');
require_once('views/View.php');

class ControllerAdmin{

	private $admin;

	public function __construct(){
		$this->admin = new Admin();
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