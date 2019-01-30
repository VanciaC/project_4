<?php
require_once('model/Model.php');

class Admin extends Model{

	public function getUser($pseudo){
		$sql = 'SELECT id, password FROM admin WHERE pseudo = ?';
		$req = $this->execReq($sql, array($pseudo));
		$result = $req->fetch();
		return $result;
	}

	public function getPseudo($pseudo){
		$sql = 'SELECT pseudo FROM admin WHERE pseudo = ?';
		$req = $this->execReq($sql, array($pseudo));
		$result = $req->fetch();
		return $result;
	}

	public function updatePost($idPost, $title, $content){
		$sql ='UPDATE post SET title = :title, content = :content WHERE id = :id';
		$req = $this->execReq($sql, array('title' => $title, 'content' => $content, 'id' => $idPost));
	}

	public function deletePost($idPost){
		$sql = 'DELETE FROM post WHERE id = ?';
		$req = $this->execReq($sql, array($idPost));
	}

	public function deleteComment($idComment){
		$sql = 'DELETE FROM comment WHERE id = ?';
		$req = $this->execReq($sql, array($idComment));
	}
}