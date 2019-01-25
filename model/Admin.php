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
}