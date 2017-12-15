<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo $BASEURL ?>/index.php">La cuisine de Ratatouille</a>
		<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav nav">
		<li class=" active">
		  <a class="nav-link" href="<?php echo $BASEURL ?>/index.php">Home
			<span class="sr-only">(current)</span>
		  </a>
		</li>
		<li class="">
		  <a class="nav-link" href="<?php echo $BASEURL ?>/index.php/mon_espace">Mon espace</a>
		</li>
		<li class="dropdown">
		  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="">Recettes
			<span class="caret"></span>
		  </a>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="<?php echo $BASEURL ?>/index.php/recette/nouvelle_recette">Nouvelle recette</a></li>
					<li><a href="<?php echo $BASEURL ?>/index.php/recette/listes_des_recettes">Liste des recettes</a></li>
				</ul>
		</li>

		<?php if (!isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="<?php echo $BASEURL ?>/index.php/utilisateur/connexion">Connexion</a>
		</li>
		<?php } ?>
		<?php if (isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="<?php echo $BASEURL ?>/index.php/utilisateur/deconnexion">Déconnexion</a>
		</li>
		<?php } ?>
		<?php if (!isset($_SESSION['connect'])) { ?> 
		<li class="">
		  <a class="nav-link" href="<?php echo $BASEURL ?>/index.php/utilisateur/inscription">Inscription</a>
		</li>
		<?php } ?>
	  </ul>
	</div>
  </div>
</nav>
