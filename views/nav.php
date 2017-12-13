<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
	<a class="navbar-brand" href="#">La cuisine de Ratatouille</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav ml-auto">
		<li class="nav-item active">
		  <a class="nav-link" href="<?=BASEURL?>/index.php">Home
			<span class="sr-only">(current)</span>
		  </a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="<?=BASEURL?>/index.php/recette/mon_espace">Mon espace</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  href="<?=BASEURL?>/index.php/recette/recettes">Recettes</a>
		</li>
		<?php if (!isset($_SESSION['connect'])) { ?> 
		<li class="nav-item">
		  <a class="nav-link" href="#">Connexion</a>
		</li>
		<?php } ?>
		<?php if (isset($_SESSION['connect'])) { ?> 
		<li class="nav-item">
		  <a class="nav-link" href="<?=BASEURL?>/index.php/user/deconnexion">Déconnexion</a>
		</li>
		<?php } ?>
	  </ul>
	</div>
  </div>
</nav>
