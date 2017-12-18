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

				<div id="menudiv" class="col-md-7">

				</div>
			</div>

			<div class="form-group">
				<div class="col-md-1">
					<button type="button" id="plus" class="btn btn-default" aria-label="Plus d'étapes">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					Menu
					</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-default" name="newplanning">Cuisine ça !
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

<script src="<?php echo $BASEURL ?>/js/inputchecks.js"></script>

<script type="text/javascript">
	function ajoutEtape(i) {
		var BIGSRC = "<div class='col-md-4'><select title='Aucun' name='recette##_N_##' class='form-control selectpicker' data-live-search='true'><?php foreach ($recettes as $rec) {printf('<option value=%d>%s</option>', $rec->getIdRecette(), $rec->getNom());}?></select></div><div class='col-md-3'><select name='type##_N_##' class='form-control selectpicker'><option value='Petit-dejeuner'>Petit-dejeuner</option><option value='Brunch'>Brunch</option><option value='Midi'>Midi</option><option value='Aperitif'>Aperitif</option><option value='Gouter'>Gouter</option><option value='Diner' selected>Diner</option></select></div>";
		var div = document.createElement("div");
		console.log(i);
		div.innerHTML = BIGSRC.replace(/##_N_##/g, i);
		div.className = 'form-group';

		var inp = document.getElementById("menudiv");
		inp.appendChild(div);
		i++;

		return div;
	}

	var j = 1;
	var t = [];
	function revealEtape() {
		if (t[j])
			t[j].style.display = "";
		j++;
	}

	t[0] = ajoutEtape(1);
	for (var i = 2; i < 7; i++) {
		t[i] = ajoutEtape(i);
		t[i].style.display = "none";
	}
	
	var btn = document.getElementById("plus");
	btn.onclick = revealEtape;
</script>
