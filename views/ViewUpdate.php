<div class="col-md-12 p-5">
	<div class="container">
	<h4 class="text-white text-center">Modifier l'article :&nbsp; <span class="font-italic">"<?= $posts['title']; ?>"</span></h4>
	<br/>
	<br/>
	<br/>

	<form action="index.php?action=update" method="POST">
		<div class="form-group">
			<h5  class="text-white text-center"><label for="title">Titre : </label></h5>
			<input type="text" class="form-control text-center" name="title" id="title_update" value="<?= $posts['title']; ?>" required />
		</div>
		<br/>
		<hr/>
		<div class="form-group">
			<h5  class="text-white text-center"><label for="content">Contenu : </label></h5>
			<textarea type="text" class="form-control editme" name="content" id="content"  rows="15" cols="50" required>
				<?= $posts['content']; ?>
			</textarea> 
		</div>
		<br/>
		<hr/>
		<input type="hidden" name="idPost" value="<?= $posts['id']; ?>" />
		<button type="submit" class="btn btn-info btn-lg btn-block">Modifier</button>
		<br/>
		<br/>
	</form>
</div>