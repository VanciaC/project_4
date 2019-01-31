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
					session_start();
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
					session_start();
					$author = $this->getParam($_POST, 'author');
					$comment = $this->getParam($_POST, 'comment');
					$idPost = $this->getParam($_POST, 'idPost');
					$this->ctrlPost->comment($author, $comment, $idPost);
				}

				else if($_GET['action'] === 'admin'){
					if (isset($_POST['pseudo'])){
						if (!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['password']))){
							$pseudo = $this->getParam($_POST, 'pseudo');
							$password = ($this->getParam($_POST, 'password'));
						}
						$password_hash = password_hash($password, PASSWORD_DEFAULT);
						$user = $this->ctrlAdmin->user($pseudo);
											
						if($user){
							$correctPassword = password_verify($password, $user['password']);
							if ($correctPassword){
								session_start();
								$_SESSION['admin'] = $pseudo;
								$this->ctrlAdmin->connection($_SESSION['admin']);
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
						session_start();
						if($_SESSION['admin']){
							$this->ctrlAdmin->connection($_SESSION['admin']);
						}
						else{
							header('location: index.php');
						}
						
					}
				}	

				else if($_GET['action'] === 'add_page'){
					$title = $this->getParam($_POST, 'title');
					$content = $this->getParam($_POST, 'content');
					$this->ctrlPost->addPost($title, $content);
					header('location: index.php');
				}

				else if($_GET['action'] === 'update_page'){
					session_start();
					if($_SESSION['admin']){
						if (isset($_GET['id'])) {
							$idPost = intval($_GET['id']);
							if($idPost != 0){
								$this->ctrlPost->pageUpdate($idPost);
							}
							else {
								header('location: index.php');
							}
						}	
					}
					else{
						header('location: index.php');
					}
				}
				else if($_GET['action'] === 'update'){
					$title = $this->getParam($_POST, 'title');
					$content = $this->getParam($_POST, 'content');
					$idPost = $this->getParam($_POST, 'idPost');
					$this->ctrlPost->update($idPost, $title, $content);
				}

				else if($_GET['action'] === 'delete'){
					session_start();
					if($_SESSION['admin']){
						if (isset($_GET['id'])) {
							$idPost = intval($_GET['id']);
							if($idPost != 0){
								$this->ctrlPost->deletePost($idPost); 
								header('location: index.php');
							}
							else {
								header('location: index.php');
							}
						}
					}
					else{
						header('location: index.php');
					}
				}

				else if($_GET['action'] === 'delete_comment'){
					session_start();
					if($_SESSION['admin']){
						if (isset($_GET['id_comment']) AND isset($_GET['id'])) {
							$idComment = intval($_GET['id_comment']);
							$idPost = intval($_GET['id']);
							if($idComment != 0 AND $idPost != 0){
								$this->ctrlPost->deleteComment($idComment);
								$this->ctrlPost->post($idPost);
							}
							else {
								header('location: index.php');
							}
						}
					}
					else{
						header('location: index.php');
					}
				}

				else if($_GET['action'] === 'deconnexion'){
					session_start();
					session_destroy();
					header('Location: index.php');
					exit();
				}

				else {
					throw new Exception("Action non valide");
				}
			}
			else{
				session_start();
				$this->ctrlHome->home();
			}
		}
		catch (Exception $e){
			session_start();
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

