<!-- Planning   -->
<div class="row">
	<form class="form-horizontal" method="POST">
		<legend>Ajout d'un planning :</legend>
		<fieldset>
			<div class="form-group non-empty">
				<label for="planning" class="col-md-2 control-label">Nouveau planning : </label>
				<div class="col-md-2">
					<input type="date" name="date" class="form-control" required>
				</div>
				<div class="col-md-4">
	 				<select name="recette" class="form-control selectpicker" data-live-search="true">
		  				<?php 
		  					foreach ($recettes as $rec) {
		  						printf("<option value=%d>%s</option>\n", $rec->getIdRecette(), $rec->getNom());
				  			} 
				  		?>
					</select>
				</div>
				<div class="col-md-3">
					<select name="type" class="form-control selectpicker">
		  				<option value='Petit-dejeuner'>Petit-dejeuner</option>
		  				<option value='Brunch'>Brunch</option>
		  				<option value='Midi'>Midi</option>
		  				<option value='Aperitif'>Aperitif</option>
		  				<option value='Gouter'>Gouter</option>
		  				<option value='Diner' selected>Diner</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-2">
					<button type="submit" class="btn btn-default" name="newplanning">Cuisine ça !
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

<script src="<?php echo $BASEURL ?>/js/inputchecks.js"></script>
