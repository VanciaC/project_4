<?php

require_once('controller/ControllerHome.php');
require_once('views/View.php');

class Router{
	
	private $ctrlHome;

	public function __construct(){
		$this->ctrlHome = new ControllerHome();
	}

	public function routerReq(){
		try{
			$this->ctrlHome->home();
		}
		catch (Exception $e){
			$this->error($e->getMessage());
		}
	}

	private function error($msgError){
		$view = new View("Error");
		$view->generate(array('msgError'=> $msgError));
	}
}

