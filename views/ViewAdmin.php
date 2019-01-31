<div class="container">
	<h3 class="text-white text-center">Bonjour <?= htmlspecialchars(ucfirst($_SESSION['admin'])); ?>,</h3> 
	<br/>
	<br/>
	<div class="badge badge-light text-wrap col-12 p-5 mb-5">
		<h3 class="text-info text-uppercase font-weight-bold">Ajouter un article</h3>
		<br/>
		<form action="index.php?action=add_page" method="POST">
			<div class="form-group">
				<h5  class="text-info text-center"><label for="title">Titre : </label></h5>
				<input type="text" class="form-control text-center" name="title" id="title" value="Titre..." required />
			</div>
			<br/>
			<hr/>
			<div class="form-group">
				<h5  class="text-info text-center"><label for="content">Contenu : </label></h5>
				<textarea type="text" class="form-control editme" name="content" id="content"  rows="15" cols="50"></textarea> 
			</div>
			<br/>
			<hr/>
			<button type="submit" class="btn btn-info btn-lg btn-block">Ajouter</button>
			<br/>
			<br/>
		</form>
	</div>
	<div class="badge badge-light text-wrap col-12 p-5 mb-5">
		<h3 class="text-info text-uppercase font-weight-bold">Gestion des commentaires</h3>
	</div>
</div>