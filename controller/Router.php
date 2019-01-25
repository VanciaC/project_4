<?php

require_once('controller/ControllerHome.php');
require_once('controller/ControllerPost.php');
require_once('controller/ControllerAdmin.php');
require_once('views/View.php');

class Router{
	
	private $ctrlHome;
	private $ctrlPost;
	private $ctrlAdmin;

	public function __construct(){
		$this->ctrlHome = new ControllerHome();
		$this->ctrlPost = new ControllerPost();
		$this->ctrlAdmin = new ControllerAdmin();
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

				else if($_GET['action'] === 'admin'){
					if (!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['password']))){
						$pseudo = $this->getParam($_POST, 'pseudo');
						$password = sha1($this->getParam($_POST, 'password'));
						$user = $this->ctrlAdmin->user();
											
						if($user){
							if ($password === $user['password']){
								$this->ctrlAdmin->connection($pseudo, $password);
							}
							else{
								throw new Exception("Identifiants incorrects.");
							}
						}

						else{
							throw new Exception("Identifiants incorrect.");
						}
					}
					else{
						header('location: index.php');
					}
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
			throw new Exception("Paramètre '$name' absent.");
		}
	}
}

