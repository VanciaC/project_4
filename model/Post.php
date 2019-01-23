<?php
	
	require_once('model/Model.php');

	class Post extends Model {

		public function getPosts(){
			$sql = 'SELECT id, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') as date_creation, title, content FROM post ORDER BY id DESC';
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
	}