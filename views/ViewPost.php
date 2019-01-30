<?php session_start(); ?>
<?php $this->title = "Mon blog - " . $post['title']; ?>

<article class="card text-center shadow">
	<div class="card-body">
		<h1 class="card-title text-info"><?= htmlspecialchars($post['title']); ?></h1>
		<p class="card-text"><?= htmlspecialchars($post['content']); ?></p>
	</div>
	<div class="card-footer text-mutes">
		<div class="row justify-content-end">
			<div class="col-4">
				<time><?= $post['date_creation']; ?></time>
				<br/>
			</div>
			<div class="col-4">
				<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
					<a href="<?= "index.php?action=update_page&id=".$post['id']; ?>"><i>Modifier</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?= "index.php?action=delete&id=".$post['id']; ?>" onclick="return confirm('Voulez-vous supprimer cet article?');"><i>Supprimer</i></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
<hr/>

<h5 class="text-center text-white">Commentaires</h5>
<?php foreach ($comments as $comment): ?>
<div class="container">
	<p class="text-light"><span class="font-weight-bold text-white"><?= htmlspecialchars($comment['author']); ?> :</span>
		<br/><?= htmlspecialchars($comment['comment']); ?>
		<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
			<br/>
			<a href=""><i>Supprimer</i></a>
		<?php else : ?>
			<br/>
			<a href=""><i>Signaler</i></a>
		<?php endif; ?>
	</p>
	<hr/>
</div>
<?php endforeach; ?>
<br/>
<div class="container">
	<h5 class="text-center text-white">Ajouter un commentaire</h5>
<br/>
	<form method="POST" action="index.php?action=comment">
		<div class="form-group">
			<label for="author" class="text-white">Votre pseudo</label><input type="text" class="form-control" name="author" id="author" required />
		</div>
		<div class="form-group">
			<label for="comment" class="text-white">Votre commentaire</label>
			<textarea class="form-control" name="comment" id="comment" rows="10" cols="50" required></textarea>
		</div>
		<input type="hidden" name="idPost" value="<?= $post['id'] ?>" />
		<button type="submit" class="btn btn-info">Envoyer</button>
	</form>
</div>
<br/>