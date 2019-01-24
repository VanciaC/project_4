<html>
	<head>
		<meta charset="UTF-8"/>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	    <link rel="stylesheet" href="public/style.css">
	    <meta name="viewport" content="width=device-width, user-scalable=no">
		<title><?= $title?></title>
	</head>
	<body>
		<div id="all">
			<header>
				<div class="collapse bg-dark" id="navbarHeader">
					<div class="container">
						<div class="row">
							<div class="col-sm-8 col-md-7 py-4">
								<h4 class="text-white">A propos de moi</h4>
								<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat turpis sit amet lacus consectetur dapibus. Fusce metus nisl, iaculis a nulla sit amet, finibus fringilla elit. Suspendisse potenti. Phasellus ac ex tortor.</p>
								</div>
							<div class="col-sm-4 offset-md-1 py-4">
								<h4 class="text-white">Connexion</h4>
								<form class="form-inline" method="POST" action="index.php?action=admin">
									<input class="form-control mr-sm-2 mb-2" type="text" name="pseudo" placeholder="Votre pseudo" aria-label="Pseudo" required>
									<input class="form-control mr-sm-2 mt-2 " type="password" name="password" placeholder="Votre mot de passe" aria-label="Password" required>
									<button class="btn btn-info mt-2" type="submit">Connexion</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="navbar navbar-dark bg-dark shadow-sm">
					<div class="container d-flex justify-content-between">
						<a href="index.php" class="navbar-brand d-flex align-items-center">
						<strong>Mon blog</strong>
						</a>
						<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
				</div>
			</header>
			<!--Section 1-->
			<section>
				<div class="p-5" id="content">
					<?= $content; ?>
				</div>
			</section>
			<footer class="bg-light text-info p-2">
				<p>Blog réalisé avec PHP, HTML5 et CSS.</p>
			</footer>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
</html>