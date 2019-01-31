<?php

class Comment extends Model{

	public function getComments($idPost){
		$sql = 'SELECT id, comment, author, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment FROM comment WHERE id_post=? ORDER BY date_comment DESC LIMIT 0, 5';
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
}