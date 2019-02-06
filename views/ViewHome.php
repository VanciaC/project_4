<?php $this->title = "Mon blog"; ?>
<div class="row">
	<div class="col-lg-3">
		<aside>
			<div class="card p-2">
				<img src="public/img/alaska.jpg" class="card img-fluid" alt="Alaska image">
				<div class="card-body">
				    <h4 class="card-title text-info text-center">Billet simple pour l'Alaska</h4>
				    <hr/>
				    <br/>
				    <h6 class="card-subtitle mb-2 text-muted">Résumé :</h6>
				    <br/>
				    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam laoreet feugiat placerat. Integer ac sollicitudin sem. Curabitur convallis ornare mi nec consequat. Vestibulum et interdum tellus. Aliquam ut auctor diam, eu venenatis mauris. Sed vitae dapibus augue, sit amet convallis est. Phasellus ornare justo id egestas mattis. Donec in eleifend nisi. Sed ac posuere turpis, et interdum enim. Donec non elementum nisi, a cursus erat. Vivamus ut felis tempus felis iaculis convallis. Nulla ultricies vestibulum lectus. Donec mollis tristique nibh, nec hendrerit lacus tempus id. Phasellus pellentesque erat vel purus posuere, sed molestie velit egestas. Curabitur elementum, quam vel tristique cursus, tellus neque imperdiet nisi, ac egestas nisl ipsum vel tellus.</p>
				   <footer class="blockquote-footer">Jean Forteroche - <cite title="Source Title">Prologue</cite></footer>
				   <br/>
				 </div>
			</div>
		</aside>
		<br/>
		<br/>
	</div>
	<div class="col-lg-9">
		<?php foreach ($posts as $post) : ?>
			<article class="card shadow-lg p-3 mb-5 bg-white rounded">
				<div class="card-body">
					<a href="<?= "index.php?action=post&id=".$post['id']; ?>">
					<h3 class="card-title text-info text-center"><?= htmlspecialchars($post['title']); ?></h3>
					</a>
					<br/>
					<p class="card-text text-justify"><?= substr($post['content'], 0, 500); ?>... <br/><br/></p> 
					<a href="<?= "index.php?action=post&id=".$post['id'] ?>">Lire la suite</a>
					<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
						<br/><br/>
						<a href="<?= "index.php?action=update_page&id=".$post['id']; ?>" class="font-italic">Modifier</a>
						&nbsp;&nbsp;				
						<a href="<?= "index.php?action=delete&id=".$post['id']; ?>" onclick="return confirm('Voulez-vous supprimer cet article?');" class="font-italic">Supprimer</a>
					<?php endif; ?>
					<br/>
					<br/>
					<p><time><?= $post['date_creation']; ?></time></p>
				</div>
			</article>
		<br/>
		<?php endforeach; ?>
		<hr/>
		<ul class="pagination justify-content-center">
			<?php for($i=1; $i<=$totalPages; $i++){
				echo '<li class="page-item shadow-lg bg-white rounded"><a class="page-link" href="index.php?page='.$i.'">Page '.$i.' </a></li>';
			}
			?>
		</ul>
		<hr/>
		<br/>
	</div>
</div>