<p class="text-left">Liste des recettes :</p>
<ul>
<?php foreach ($array_rec as $rec) { ?>
<a href="<?php echo $BASEURL?>/index.php/recette/recetteById/<?=$rec->getIdRecette()?>">
	<li>Recette : <?php echo $rec->getNom()?>
		<ul>
		<li>Id de la Recette : <?php echo $rec->getIdRecette()?></li>
		<li>Nom : <?php echo $rec->getNom()?></li>
		<li>Description : <?php echo $rec->getDescription()?></li>
		<li>Difficulté : <?php echo $rec->getDifficulte()?></li>
		<li>Prix : <?php echo $rec->getPrix()?></li>
		<li>Nombre de personnes : <?php echo $rec->getNb_pers()?></li>
		<li>Id Utlisateur : <?php echo $rec->getIdUtilisateur()?></li>
	</ul>
	</a>
<?php  } ?>	
</ul>

