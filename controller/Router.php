<?php

require_once('controller/ControllerHome.php');
require_once('controller/ControllerPost.php');
require_once('views/View.php');

class Router{
	
	private $ctrlHome;
	private $ctrlPost;

	public function __construct(){
		$this->ctrlHome = new ControllerHome();
		$this->ctrlPost = new ControllerPost();
	}

	public function routerReq(){
		try{
			if (isset($_GET['action'])){
				if($_GET['action'] === 'post'){
					if (isset($_GET['id'])) {
						$idPost = intval($_GET['id']);
						if($idPost != 0) {
							$this->ctrlPost->post($idPost);
						}
						else {
							throw new Exception("Identifiant de billet non valide");
						}
					}
				}
				else if($_GET['action'] === 'comment'){
					$author = $this->getParam($_POST, 'author');
					$comment = $this->getParam($_POST, 'comment');
					$idPost = $this->getParam($_POST, 'idPost');
					$this->ctrlPost->comment($author, $comment, $idPost);
				}
				else {
					throw new Exception("Action non valide");
				}
			}
			else{
				$this->ctrlHome->home();
			}
		}
		catch (Exception $e){
			$this->error($e->getMessage());
		}
	}

	private function error($msgError){
		$view = new View("Error");
		$view->generate(array('msgError'=> $msgError));
	}

	private function getParam($array, $name){
		if(isset($array[$name])) {
			return $array[$name];
		}
		else{
			throw new Exception("Paramètre '$name' absent");
		}
	}
}

