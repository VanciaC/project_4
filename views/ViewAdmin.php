<div class="container">
	<h3 class="text-white text-center">Bonjour <?= htmlspecialchars(ucfirst($_SESSION['admin'])); ?>,</h3> 
	<br/>
	<br/>
	<div class="accordion" id="accordion_id">
		<div class="card">
			<div class="card-header text-center col-12" id="headingOne">
				<h2 class=" mb-0">
					<button class="text-info text-uppercase font-weight-bold btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Ajouter un article
					</button>
				</h2>
			</div>
			 <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_id">
				<div class="card-body">
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
			</div>
			<div class="card">
				<div class="card-header text-center col-12" id="headingTwo">
					<h2 class=" mb-0">
						<button class="text-info text-uppercase font-weight-bold btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					 		Gestion des commentaires
					 	</button>
					</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_id">
     				<div class="card-body">
						<table class="table">
							<thead class="thead-dark">
								<tr>
								    <th scope="col">Pseudo</th>
								    <th scope="col">Commentaire</th>
								    <th scope="col">Réponse</th>
								</tr>
							</thead>
							<?php foreach ($reports as $report): ?>
							<tbody>
								<tr>
									<td><?= $report['pseudo']; ?></td>
									<td><?= $report['comment']; ?></td>
									<td>
										<a href="<?= "index.php?action=delete_report&id_comment=".$report['id_comment']; ?>">Supprimer</a>
										<br/>
										<a href="<?= "index.php?action=cancel_report&id_comment=".$report['id_comment']; ?>">Annuler</a>
									</td>
								</tr>
							</tbody>
							<?php endforeach; ?>
						</table>
					</div>
		 		</div>
			</div>
		</div>
	</div>
</div>