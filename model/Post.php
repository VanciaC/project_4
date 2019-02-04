<?php
	
require_once('model/Model.php');

class Post extends Model {
	private $postPerPage = 3;

	public function getPosts($currentPage){
		$startPage = ceil($currentPage - 1)*$this->postPerPage;
		$sql = 'SELECT id, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') as date_creation, title, content FROM post ORDER BY date_creation DESC LIMIT '.$startPage.','.$this->postPerPage.'';
		$posts = $this->execReq($sql);
		return $posts;
	}

	public function getPost($idPost){
		$sql = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') as date_creation FROM post WHERE id=?';
		$post = $this->execReq($sql, array($idPost));
		if($post->rowCount() == 1){
			return $post->fetch();
		}
		else{
			throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
		}
	}

	public function addReport($idComment, $pseudo, $comment){
		$sql = 'INSERT INTO report(id_comment, pseudo, comment) VALUES (?, ?, ?)';
		$req = $this->execReq($sql, array($idComment, $pseudo, $comment));
	}

	public function totalPages(){
		$sql ='SELECT id FROM post'; 
		$req = $this->execReq($sql);
		$totalPosts = $req->rowCount();
		$totalPages = ceil($totalPosts/$this->postPerPage);
		return $totalPages;
	}
}