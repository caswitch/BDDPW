<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Ratatouille </title>

	<!-- Custom styles for this template -->
	<link href="css/shop-homepage.css" rel="stylesheet">

	<!--favicons-->
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta name="msapplication-config" content="img/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
	<?php
	 include 'views/nav.php';
	?>

	<p class="text-center">
	<?php
	 if (isset($_SESSION['message'])) { 
		 echo $_SESSION['message'];
		 unset($_SESSION['message']);
	 }
	?>
	</p>

	<h2>views/recettes.php</h2>

    <!-- Page Content -->
    <div class="container">
		<?php
		 include 'views/header.php';
		?>

			<div class="row justify-content-end-center">
				<div class="col-md-8 col-md-offset-2">
					<form action="<?=BASEURL?>/index.php/recette/recette_create" method="post">
						<label for="act_recette">Recette : </label><input type="text" name="nom_recette" id="act_recette" />
						<label for="act_description">Description : </label><input type="text" name="description" id="act_description" />
						<label for="act_difficulte">Difficulté : </label><input type="text" name="difficulte" id="act_difficulte" />
						<label for="act_description">Description : </label><input type="text" name="description" id="act_description" />
						<label for="act_prix">Prix : </label><input type="text" name="prix" id="act_prix" />
						<label for="act_nb_pers">Nombre de personnes : </label><input type="text" name="nb_pers" id="act_nb_pers" />
						<input type="submit" value="Envoyer">
					</form>
				</div>
			</div>

	<?php
	 include 'views/footer.php';
	?>
	 <script
	   src="https://code.jquery.com/jquery-3.2.1.min.js"
		     integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			   crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>>

</body>
</html>


