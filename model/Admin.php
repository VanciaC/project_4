<?php

require_once('model/Model.php');

class Admin extends Model{

	public function getAdmin($pseudo, $password){

		$sql = 'SELECT * FROM admin WHERE pseudo = ? AND password = ?';
		$req = $this->execReq($sql, array($pseudo, $password));
		$result = $req->fetch();
		return $result;
	}

	public function getUser(){
		$sql = 'SELECT * FROM admin';
		$req = $this->execReq($sql);
		$result = $req->fetch();
		return $result;
	}

}