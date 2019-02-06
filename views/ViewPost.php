<?php $this->title = "Mon blog - " . $post['title']; ?>

<article class="card text-center shadow">
	<div class="card-body">
		<h1 class="card-title text-info"><?= htmlspecialchars($post['title']); ?></h1>
		<p class="card-text"><?= $post['content']; ?></p>
	</div>
	<div class="card-footer bg-light text-mutes">
		<div class="row justify-content-end">
			<div class="col-4">
				<time><?= $post['date_creation']; ?></time>
				<br/>
			</div>
			<div class="col-4">
				<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
					<a href="<?= "index.php?action=update_page&id=".$post['id']; ?>" class="font-italic">Modifier</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?= "index.php?action=delete&id=".$post['id']; ?>" onclick="return confirm('Voulez-vous supprimer cet article?');" class="font-italic">Supprimer</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
<hr/>

<h4 class="text-center font-weight-bold text-info">Commentaires</h4>
<br/>
<?php foreach ($comments as $comment): ?>
<div class="container">
	<p class="shadow-lg p-3 mb-5 bg-white rounded text-info"><span class="font-weight-bold text-info"><?= htmlspecialchars($comment['author']); ?> :</span>
		<br/><?= htmlspecialchars($comment['comment']); ?>
		<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
			<br/>
			<a href="<?= "index.php?action=delete_comment&id=".$post['id']."&id_comment=".$comment['id']; ?>" onclick="return confirm('Voulez-vous supprimer ce commentaire?');" class="font-italic">Supprimer</a>
		<?php else : ?>
			<br/>
			<a href="<?= "index.php?action=report&id=".$post['id']."&id_comment=".$comment['id']."&pseudo=".$comment['author']."&comment=".$comment['comment']; ?>" onclick="return confirm('Voulez-vous signaler ce commentaire?');" class="font-italic">Signaler</a>
		<?php endif; ?>
	</p>
	<hr/>
</div>
<?php endforeach; ?>
<ul class="pagination justify-content-center">
	<?php for($i=1; $i<=$totalPages; $i++){
		echo '<li class="page-item"><a class="page-link" href="index.php?action=post&id='.$post['id'].'&page='.$i.'">'.$i.' </a></li>';
	}
	?>
</ul>
<hr/>
<br/>
<div class="container">
	<h4 class="text-center font-weight-bold text-info">Ajouter un commentaire</h4>
<br/>
	<form method="POST" action="index.php?action=comment">
		<div class="form-group">
			<label for="author" class="shadow-lg p-2 bg-light rounded text-info">Votre pseudo</label><input type="text" class="form-control" name="author" id="author" required />
		</div>
		<div class="form-group">
			<label for="comment" class="shadow-lg p-2 bg-light rounded text-info">Votre commentaire</label>
			<textarea class="form-control" name="comment" id="comment" rows="2" cols="50" required></textarea>
		</div>
		<input type="hidden" name="idPost" value="<?= $post['id'] ?>" />
		<button type="submit" class="btn btn-info">Envoyer</button>
	</form>
</div>
<br/>