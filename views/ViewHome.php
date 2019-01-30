<?php session_start(); ?>
<?php $this->title = "Mon blog"; ?>

<?php foreach ($posts as $post) : ?>
<div class="container">
	<article class="card shadow-lg p-3 mb-5 bg-white rounded">
		<div class="card-body">
			<a href="<?= "index.php?action=post&id=".$post['id']; ?>">
			<h3 class="card-title text-info text-center"><?= htmlspecialchars($post['title']); ?></h3>
			</a>
			<br/>

			<p class="card-text text-justify"><?= htmlspecialchars(substr($post['content'], 0, 350)); ?>... <br/><br/><a href="<?= "index.php?action=post&id=".$post['id'] ?>">Lire la suite</a></p> 

			<time><?= $post['date_creation']; ?></time>
			<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
				<br/><br/>
				<a href="<?= "index.php?action=update_page&id=".$post['id']; ?>"><i>Modifier</i></a>
				&nbsp;&nbsp;				
				<a href="<?= "index.php?action=delete&id=".$post['id']; ?>" onclick="return confirm('Voulez-vous supprimer cet article?');"><i>Supprimer</i></a>
			<?php endif; ?>
		</div>
	</article>
</div>
<hr/>
<?php endforeach; ?>