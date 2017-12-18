<h2>Liste des recettes</h2>
<br/>
<p>Pour l'instant, les recettes ne s'affichent qu'avec une image par défaut.
Veuillez nous excuser du désagrément que cela peut causer.</p>
<br/>

<div class="row">
  <?php $i = 0; foreach ($array_rec as $rec) { ?>
	  <div class="col-md-4">
		<div class="thumbnail">
		  <a href="<?php echo $BASEURL?>/index.php/recette/recetteById/<?=$rec->getIdRecette()?>">
		  <img class="media-object img-rounded img-responsive embed-responsive" src="<?php echo $BASEURL?>/img/defaut.png" style="width:100%">
			<div class="caption">
				<li><strong><?php echo $rec->getNom()?></strong>
					<ul>
					<li><strong>Id de la Recette : </strong><?php echo $rec->getIdRecette()?></li>
					<li><strong>Nom : </strong><?php echo $rec->getNom()?></li>
					<!--<li><strong>Description : </strong><?php echo $rec->getDescription()?></li>-->
					<li><strong>Difficulté : </strong>
						<?php
							switch($rec->getDifficulte()) {
								case 1:
									echo "Inratable";
									break;
								case 2:
									echo "Facile";
									break;
								case 3:
									echo "Normal";
									break;
								case 4:
									echo "Difficile";
									break;
								case 5:
									echo "Héroïque";
									break;
							}
						?>
					</li>
					<li><strong>Prix : </strong>
						<?php
							switch($rec->getPrix()) {
							case 1:
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								break;
							case 2:
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								break;
							case 3:
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								break;
							case 4:
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								break;
							case 5:
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								echo "<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span>";
								break;
							}
						?>
					</li>
					<li><strong>Nombre de personnes : </strong><?php echo $rec->getNb_pers()?></li>
					<li><strong>Id Utlisateur : </strong><?php echo $rec->getIdUtilisateur()?></li>
				</ul>
			</div>
		  </a>
		</div>
	  </div>
  <?php $i++;} ?>	
</div>
