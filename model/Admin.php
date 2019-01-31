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

	public function addPost($title, $content){
		$sql = 'INSERT INTO post(date_creation, title, content) VALUES (?, ?, ?)';
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d H:i:s");
		$req = $this->execReq($sql, array($date, $title, $content));
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