<h2 >Sélectionnez les ingrédiens nécessaires à votre recette.</h2>

<p>
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
	Si les cases ne sont pas cochées, l'ingrédient ne sera pas ajouté à la recette, même si la quantité et/ou l'unité est/sont cochée(s).
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
</p>

<form action="" method="post">
	<div class="table-responsive">
	  <table class="table">
		  <tr>
			  <th>#</th>
			  <th>Ingrédient</th>
			  <th>Quantité</th> 
			  <th>Unité</th>
		  </tr>
		  <?php foreach ($array_ing as $ing) { ?>
		  <tr>
			  <td>
				<input type="checkbox" name="checkbox[<?php echo $ing->getIdIngredient()?>]" value="<?php echo $ing->getIdIngredient()?>">
			  </td>
			  <td>
				<?php echo $ing->getNom()?>
			  </td>
			  <td>
				<input type="number" class="form-control" name="quantite[<?php echo $ing->getIdIngredient()?>]"  min="1" placeholder=" ">
			  </td>
			  <td>
				<select class="form-control selectpicker" data-live-search="true" name="unite[<?php echo $ing->getIdIngredient()?>]" title=" ">
				  <optgroup label="Standard">
					<option>mg</option>
					<option>g</option>
					<option>kg</option>
					<option>ml</option>
					<option>cl</option>
					<option>dl</option>
					<option>l</option>
				  <optgroup label="Volume">
					<option>tasse</option>
					<option>verre</option>
					<option>pot de yaourt</option>
					<option>sachet</option>
					<option>1/2 sachet</option>
					<option>pincée</option>
					<option>unité</option>
				  </optgroup>
				</select>
			  </td>
		  </tr>
		  <?php } ?>	
	  </table>
	</div>
  <button type="submit" class="btn btn-default" name="auxetapes">Suivant
	<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
  </button>
</form>
