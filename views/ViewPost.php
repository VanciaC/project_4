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