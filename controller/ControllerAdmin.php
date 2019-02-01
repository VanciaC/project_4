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
		$reports = $this->admin->getReports();
		$view = new View("Admin");
		$view->generate(array('admin' => $admin, 'reports' => $reports));
	}

	public function user($pseudo){
		return $this->admin->getUser($pseudo);
	}
}