<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=BASEURL?>/index.php">La cuisine de Ratatouille</a>
		<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav nav">
		<li class=" active">
		  <a class="nav-link" href="<?=BASEURL?>/index.php">Home
			<span class="sr-only">(current)</span>
		  </a>
		</li>
		<li class="">
		  <a class="nav-link" href="<?=BASEURL?>/mon_espace">Mon espace</a>
		</li>
		<li class="dropdown">
		  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#">Recettes
			<span class="caret"></span>
		  </a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="<?=BASEURL?>/nouvelle_recette">Nouvelle recette</a></li>
					<li><a href="<?=BASEURL?>/listes_des_recettes">Liste des recettes</a></li>
				</ul>
		</li>

		<?php if (!isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="/index.php/utilisateur/connexion">Connexion</a>
		</li>
		<?php } ?>
		<?php if (isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="<?=BASEURL?>/index.php/utilisateur/deconnexion">Déconnexion</a>
		</li>
		<?php } ?>
		<?php if (!isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="<?=BASEURL?>/controllers/inscription.php">Inscription</a>
		</li>
		<?php } ?>
	  </ul>
	</div>
  </div>
</nav>
