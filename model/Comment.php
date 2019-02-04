<?php

class Comment extends Model{

	private $commentPerPage = 5;

	public function getComments($idPost, $currentPage){
		$startPage = ceil($currentPage-1)*$this->commentPerPage;
		$sql = 'SELECT id, comment, author, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment FROM comment WHERE id_post=? ORDER BY date_comment DESC LIMIT '.$startPage.', '.$this->commentPerPage.'';
		$comments = $this->execReq($sql, array($idPost));
		return $comments;
	}

	//add comments
	public function addComments($author, $comment, $idPost){
		$sql = 'INSERT INTO comment(date_comment, comment, author, id_post) VALUES (?, ?, ?, ?)';
			date_default_timezone_set('Europe/Paris');
			$date = date("Y-m-d H:i:s");
			$addComments = $this->execReq($sql, array($date, $comment, $author, $idPost));
	}

	public function totalPages($idPost){
		$sql = 'SELECT id FROM comment WHERE id_post = ?';
		$req = $this->execReq($sql, array($idPost));
		$totalComments = $req->rowCount();
		$totalPages = ceil($totalComments/$this->commentPerPage);
		return $totalPages;
	}
}