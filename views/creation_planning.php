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
					<button type="submit" class="btn btn-default" name="newplanning">Valider

						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

<script type="text/javascript">
	function __checkEmpty(elem, style){
		var affected = affectedByClass(elem, "non-empty");
		var undef = (!style.borderColor || style.borderColor == "#CCC");
		// console.log(elem);
		// console.log('affected: ' + affected);
		// console.log('defined : ' + !undef);
		// console.log('border  : ' + style.borderColor);
		// console.log('empty   : ' + !elem.value);
		// console.log("=========");

		if (!affected){
			if (undef == false){
				style.borderColor="#CCC";
			}
			return false;
		}

		if (!elem.value){
			style.borderColor="red";
			return true;
		}

		if (elem.value){
			style.borderColor="#CCC";
			return false;
		}
	}

	var j = 2;
	var t = [];

	t[0] = ajoutEtape(1);

	for (var i = 2; i < 51; i++) {
		t[i] = ajoutEtape(i);
		t[i].style.display = "none";
	}

	function ajoutEtape(i) {
		var BIGSRC = "<div class='col-md-4'><select title='Recette' id='recette[##_N_##]' name='recette[##_N_##]' class='form-control selectpicker' data-live-search='true'><?php foreach ($recettes as $rec) {printf('<option value=%d>%s</option>', $rec->getIdRecette(), $rec->getNom());}?></select></div><div class='col-md-3'><select title='Type' id='type[##_N_##]' name='type[##_N_##]' class='form-control selectpicker'><option value='Petit-dejeuner'>Petit-dejeuner</option><option value='Brunch'>Brunch</option><option value='Midi'>Midi</option><option value='Aperitif'>Aperitif</option><option value='Gouter'>Gouter</option><option value='Diner'>Diner</option></select></div>";
		var div = document.createElement("div");
		// console.log(i);
		div.innerHTML = BIGSRC.replace(/##_N_##/g, i);
		div.className = 'form-group';

		var inp = document.getElementById("menudiv");
		inp.appendChild(div);
		i++;

		return div;
	}

	function revealEtape() {
		var borderRec = document.getElementsByClassName("btn dropdown-toggle btn-default")[j-2];
		var borderTyp = document.getElementsByClassName("btn dropdown-toggle btn-default")[j-1];

		var rec = document.getElementById("recette["+ (j-1) +"]");
		// console.log(rec);
		// console.log(borderRec);
		var typ = document.getElementById("type["+ (j-1) +"]");
		// console.log(typ);
		// console.log(borderTyp);

		if (__checkEmpty(rec, borderRec.style) == false && __checkEmpty(typ, borderTyp.style) == false){
			if (t[j]){
				t[j].style.display = "";
			}
			j++;
		}
	}
	
	var btn = document.getElementById("plus");
	btn.onclick = revealEtape;
</script>

<script src="<?php echo $BASEURL ?>/js/inputchecks.js"></script>
