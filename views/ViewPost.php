<?php $this->title = "Mon blog - " . $post['title']; ?>

<article>
	<header>
		<h1 class="postTitle"><?= htmlspecialchars($post['title']); ?></h1>
		<time><?= $post['date_creation']; ?></time>
	</header>
	<p><?= htmlspecialchars($post['content']); ?></p>
</article>
<hr/>

<h2 class="comment">Commentaires</h2>
<?php foreach ($comments as $comment): ?>

  <p><?= htmlspecialchars($comment['author']); ?> dit :  <?= htmlspecialchars($comment['comment']) ?></p>
  <p><?= $comment['date_comment']; ?></p>

<?php endforeach; ?>
<br/>

<hr/>

<h3>Ajouter un commentaire</h3>
<form method="POST" action="index.php?action=comment">
	<p><label for="author">Votre pseudo</label> : <input type="text" name="author" id="author" required /></p>
	<p>
		<label for="comment">
		Votre commentaire :
		</label>
		<br />
		<textarea name="comment" id="comment" rows="10" cols="50" required></textarea>
	</p>
	 <input type="hidden" name="idPost" value="<?= $post['id'] ?>" />
	<p><input type="submit" value="Envoyer"/></p>  
</form>