<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">	    
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	    <meta name="viewport" content="width=device-width, user-scalable=no">
	    <link rel="stylesheet" href="public/style.css">
		<title><?= $title?></title>
		<meta name="description" content="Blog de Jean Forteroche : Billet simple pour l'Alaska. Projet OpenClassrooms - Developpeur junior." />
		<script src=https://cloud.tinymce.com/5-testing/tinymce.min.js></script>
  		<script>tinymce.init({ selector: "textarea.editme"});</script>
	</head>
	<body>
		<div id="all">
			<header>
				<div class="collapse bg-dark" id="navbarHeader">
					<div class="container">
						<div class="row">
							<div class="col-sm-8 col-md-7 py-4">
								<h4 class="text-white"> Jean Forteroche</h4>
								<p class="text-muted">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie, elit sed sodales dapibus, turpis lectus consectetur metus, eget fringilla ante tortor et purus. Maecenas ac hendrerit dolor, ut interdum dui. In eleifend pellentesque justo, sit amet consectetur justo dignissim eget. Phasellus pulvinar, massa at pretium cursus, metus nulla placerat ante, id aliquet elit orci id leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi ut gravida metus, accumsan hendrerit mauris. 
								</p>
								</div>
							<?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) :?>
								<div class="col-sm-4 offset-md-1 py-4">
									<h4 class="text-white"><?= ucfirst($_SESSION['admin']); ?></h4>
									<a href="index.php?action=admin"><button class="btn btn-info mt-2" type="submit">Administration</button></a>
									<a href="index.php?action=deconnexion"><button class="btn btn-info mt-2" type="submit">Déconnexion</button></a>
								</div>
							<?php else : ?>
								<div class="col-sm-4 offset-md-1 py-4">
									<h4 class="text-white">Connexion</h4>
									<form class="form-inline" method="POST" action="index.php?action=admin">
										<input class="form-control mr-sm-2 mb-2" type="text" name="pseudo" placeholder="Votre pseudo" aria-label="Pseudo" required>
										<input class="form-control mr-sm-2 mt-2 " type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" required>
										<button class="btn btn-info mt-2" type="submit">Connexion</button>
									</form>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="navbar navbar-dark bg-dark shadow-sm">
					<div class="container d-flex justify-content-between">
						<a href="index.php" class="navbar-brand d-flex align-items-center">
						<strong>Billet simple pour l'Alaska</strong>
						</a>
						<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
				</div>
			</header>
			<section>
				<?= $content; ?>
			</section>
			<footer class="bg-light text-info p-2">
				<p>Blog réalisé avec PHP, HTML5 et CSS - Projet 4 OpenClassrooms - Developpeur web junior</p>
			</footer>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		</div>
	</body>
</html>