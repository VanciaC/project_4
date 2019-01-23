<?php $this->title = "Mon blog - " . $post['title']; ?>

<article class="card text-center shadow">
	<div class="card-body">
		<h1 class="card-title text-info"><?= htmlspecialchars($post['title']); ?></h1>
		<p class="card-text"><?= htmlspecialchars($post['content']); ?></p>
	</div>
	<div class="card-footer text-mutes">
		<time><?= $post['date_creation']; ?></time>
	</div>
</article>
<hr/>

<h5 class="text-center text-white">Commentaires</h5>
<?php foreach ($comments as $comment): ?>
<div class="container">
	<p class="text-light"><span class="font-weight-bold text-white"><?= htmlspecialchars($comment['author']); ?> :</span>
		<br/><?= htmlspecialchars($comment['comment']); ?>
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