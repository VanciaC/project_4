<?php

class Comment extends Model{

	public function getComments($idPost){
		$sql = 'SELECT comment, author, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment FROM comment WHERE id_post=? ORDER BY date_comment DESC LIMIT 0, 5';
		$comments = $this->execReq($sql, array($idPost));
		return $comments;
	}
}