<br/>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object img-responsive center-block" src="<?php echo $BASEURL?>/img/defaut2.png" style="width:75%">
    </a>
  </div>
</div>
<br/>


<h2 class="text-center"><?php echo $recette->getNom()?></h2>
<br/>
<br/>
<hr/>
<br/>
<div class="row" id="descr">
  <div class="col-md-12">
	<?php echo $recette->getDescription() ?>
  </div>
</div>
<br/>
<hr/>
<br/>
<div class="row">
  <div class="col-md-4">
	<h3>Informations</h3>
  </div>
  <div class="col-md-6">
	<h3>Étapes</h3>
  </div>
  <div class="col-md-2">
    <h3>Ingrédients</h3>
  </div>
</div>
<br/>
<hr/>
<br/>
<div class="row">
  <div class="col-md-2">
	<table class="table table-condensed table-responsive">
	  <tr>
		<th></th>
	  </tr>
	  <?php foreach ($ingredients as $ing) { ?>
	    <tr>
		  <td><strong><?php echo $ing->getNom()?></strong></td>
	    </tr>
	  <?php } ?>
	</table>
  </div>
  <div class="col-md-1">
	<table class="table table-condensed table-responsive">
	  <tr>
		<th></th>
	  </tr>
	  <?php foreach ($quantites as $quant) { ?>
	    <tr>
		  <td><strong><?php echo $quant?></strong></td>
	    </tr>
	  <?php } ?>	
	</table>
  </div>
  <div class="col-md-1">
	<table class="table table-condensed table-responsive">
	  <tr>
		<th></th>
	  </tr>
	  <?php foreach ($ingredients as $ing) { ?>
	    <tr>
		  <td><strong><?php echo $ing->getUnite()?></strong></td>
	    </tr>
	  <?php } ?>	
	</table>
  </div>
  <div class="col-md-6">
	<ol>
		<?php

		?>
	  <?php foreach ($etapes as $et) { ?>
		<li>
		  <?php echo $et->getDescription(); ?>
		  <br/>
		  <?php echo $et->getDuree(); ?> minutes
		</li>
	  <?php }?>
	</ol>
  </div>
  <div class="col-md-2">
	<table class="table table-condensed table-responsive">
	  <tr>
		<th></th>
	  </tr>
	  <tr>
		<td>
		  <?php
		  switch($recette->getDifficulte()) {
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
	    </td>
	  </tr>
	  <tr>
		<td>
	    <?php
		switch($recette->getPrix()) {
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
		</td>
	  </tr>
	  <tr>
		<td>Une recette du petit rat <strong><?php echo $utilisateur->getLogin()?>.</td>
	  </tr>
	</table>
  </div>
</div>
<br/>
<hr/>
<br/>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
	<button type="button" class="btn btn-default center-block" aria-label="Left Align">
	  <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Ajouter à un planning
	</button>
  </div>
</div>




