<h2>Recherche de recettes</h2>
<br/>

<form action="" method="post">
  <label>Ingrédient</label>
	<div id="divIngr">
	<select title=" " name="selectIng1" class="selectpicker" data-live-search="true">
	  <?php 
		$i = 1;
		foreach ($array_ing as $ing) { 
	  ?>
		<option>
		  <?php echo $ing->getNom()?>
		</option>
      <?php 
		  $i++;
		} 
	  ?>	
	</select>
  </div>

  <br/>
  <button type="button" id="plusIng" class="btn btn-default" onclick="ajoutIngredient()">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	étape
  </button>

  <br/>
  <br/>
  <br/>
  <br/>
  <button type="submit" class="btn btn-default" name="recherche">Recherche
	<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
  </button>
  <br/>
  <br/>
  <br/>
  <br/>
</form>

<!--
<script type="text/javascript">
	var i = 1;

	// Ajout d'un ingrédient
	function ajoutIngredient() {
		var duEt = document.getElementById("dureeEtape["+i+"]");
		var deEt = document.getElementById("descrEtape["+i+"]");
		// L'utilisateur ne peut générer une étape que si celle précédente 
		// est correctement renseignée (durée et description).
		if (duEt.value.length > 0 && deEt.value.length > 0) {
			duEt.style.borderColor = '#ccc';	
			deEt.style.borderColor = '#ccc';	

			i++;
			//var idLabelEtape = 'etape'+i;
			//var textEtape = "Etape "+i;
			//var textLabelEtape = document.createTextNode(textEtape);
			//labelEtape.setAttribute("id", idLabelEtape);
			var labelEtape = document.createElement("label");
			labelEtape.id = "etape"+i;
			labelEtape.innerHTML = "Etape "+i;
			document.getElementById("etapes").appendChild(labelEtape);

			var divRow = document.createElement("div");
			divRow.className = "row";
			document.getElementById("etapes").appendChild(divRow);

			var divDuree = document.createElement("div");
			divDuree.className = "col-md-2";
			divRow.appendChild(divDuree);

			var inputDuree = document.createElement("input");
			inputDuree.type = "number";
			inputDuree.className = "form-control";
			inputDuree.name = "dureeEtape["+i+"]";
			inputDuree.id = "dureeEtape["+i+"]";
			inputDuree.setAttribute("min", 1);
			inputDuree.setAttribute("placeholder", "Durée de l'étape");
			divDuree.appendChild(inputDuree);

			var divDescr = document.createElement("div");
			divDescr.className = "col-md-10";
			divRow.appendChild(divDescr);

			var textareaDescr = document.createElement("textarea");
			textareaDescr.className = "form-control";
			textareaDescr.name = "descrEtape["+i+"]";
			textareaDescr.id = "descrEtape["+i+"]";
			textareaDescr.setAttribute("rows", 6);
			textareaDescr.setAttribute("placeholder", "Description de l'étape")
			divDescr.appendChild(textareaDescr);

			var br = document.createElement("br");
			document.getElementById("etapes").appendChild(br);
		}
		else {
			if (duEt.value.length == 0 && deEt.value.length == 0) {
				duEt.style.borderColor = 'red';	
				deEt.style.borderColor = 'red';	
			}
			else if (duEt.value.length == 0) {
				duEt.style.borderColor = 'red';	
			}
			else {
				deEt.style.borderColor = 'red';	
			}
		}
	}
</script>
-->
