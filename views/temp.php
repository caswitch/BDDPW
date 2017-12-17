<h2>Informations générales de la recette</h2>
<br/>

<p>
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
	Si le formulaire est mal rempli au moment de soumettre votre recette, le formulaire entier doit être réécris.
	Nous vous prions de nous excuser pour le désagrément que cela peut causer.
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
</p>

<form action="" method="post">
  <div class="form-group">
    <label for="nomNR">Nom de la nouvelle recette</label>
    <input type="text" class="form-control" name="nomNR" id="nomNR" placeholder="Ratatouille">
  </div>
  <div class="form-group">
    <label for="descNR">Description de la recette</label>
	<textarea class="form-control" name="descNR" rows="5" id="descNR" placeholder="La ratatouille est un plat typique du Sud qui se compose de légumes variés qui ont longuement mijoté.
La recette est idéale pour l'été.
À consommer chaude ou froide.

Faite ressurgir le souvenir de la ratatouille de votre enfance !">
	</textarea>
  </div>
  <div class="form-group">
    <label for="diffNR">Difficulté</label>
	<br/>
	<label class="radio-inline">
	  <input type="radio" name="diffNR" id="diffNR" value="1"> Inratable
	</label>
	<label class="radio-inline">
	  <input type="radio" name="diffNR" id="diffNR" value="2"> Facile
	</label>
	<label class="radio-inline">
	  <input type="radio" name="diffNR" id="diffNR" value="3"> Normal
	</label>
	<label class="radio-inline">
	  <input type="radio" name="diffNR" id="diffNR" value="4"> Difficile
	</label>
	<label class="radio-inline">
	  <input type="radio" name="diffNR" id="diffNR" value="5"> Héroïque
	</label>
  </div>
  <div class="form-group">
    <label for="prixNR">Prix</label>
	<br/>
	<label class="radio-inline">
	  <input type="radio" name="prixNR" id="prixNR" value="1">
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
	</label>
	<label class="radio-inline">
	  <input type="radio" name="prixNR" id="prixNR" value="2">
		<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
	</label>
	<label class="radio-inline">
	  <input type="radio" name="prixNR" id="prixNR" value="3">
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
	</label>
	<label class="radio-inline">
	  <input type="radio" name="prixNR" id="prixNR" value="4">
		<span class="glyphicon glyphicon-glass" aria-hidden="true"></span>
	</label>
	<label class="radio-inline">
	  <input type="radio" name="prixNR" id="prixNR" value="5">
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
		<span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
	</label>
  </div>
  <div class="form-group">
    <label for="nb_persNR">Pour combien de personne ?</label>
    <input type="number" class="form-control" name="nb_persNR" id="nb_persNR" min="1" max="100" placeholder="4">
  </div>
  <div class="form-group">
    <label for="urlM">Photo de la recette</label>
    <input type="file" id="urlM" name="urlM">
    <p class="help-block">Une image par défaut illustrera votre recette en l'absence de sélection d'une photo. 😉</p>
  </div>
  <div class="form-group">
    <label for="legM">Légende de l'image (optionnel)</label>
    <input type="text" class="form-control" name="legM" id="legM" placeholder="Photo de ratatouille.">
  </div>

  <br/>
  <hr/>
  <br/>

  <h2 >Ingrédients</h2>
  <br/>

  <p>
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
		Si la case correspondant à un ingrédient n'est pas cochée, l'ingrédient ne sera pas ajouté à la recette, même si la quantité a été renseignée.
	<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
  </p>

  <div class="table-responsive">
	<table class="table">
		<tr>
		  <th>#</th>
		  <th>Ingrédient</th>
		  <th>Quantité</th> 
		  <th>Unité</th>
	    </tr>
		<?php 
			$i = 1;
			foreach ($array_ing as $ing) { 
		?>
	      <tr>
		    <td>
			  <input type="checkbox" name="checkbox[<?php echo $i?>]" value="<?php echo $i ?>">
		    </td>
		    <td>
			  <?php echo $ing->getNom()?>
		    </td>
		    <td>
			  <input type="number" class="form-control" name="quantite[<?php echo $i ?>]"  min="0.001" placeholder=" " step=".001">
		    </td>
		    <td>
			  <?php echo $ing->getUnite() ?>
		    </td>
	    </tr>
		<?php $i++;
		} 
		?>	
    </table>
  </div>

  <br/>
  <hr/>
  <br/>

  <h2 >Etapes</h2>

  <br/>
  <p>La durée de l'étape est renseignée en minutes.</p>
  <p>Vous ne pouvez créer une nouvelle étape qu'une fois avoir remplis la précédente.</p>

  <div id="etapes">
    <label id="etape1">Etape 1</label>
    <div class="row">
	  <div class="col-md-2">
	  	<input type="number" class="form-control" id="dureeEtape[1]" name="dureeEtape[1]" min="1" placeholder="Durée de l'étape">
      </div>
	  <div class="col-md-10">
	    <textarea class="form-control" id="descrEtape[1]" name="descrEtape[1]" rows="6" placeholder="Description de l'étape"></textarea>
      </div>
    </div>
	<br/>
  </div>

  <br/>
  <button type="button" id="plusEtape" class="btn btn-default" aria-label="Plus d'étapes" onclick="ajoutEtape()">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	étape
  </button>

  <br/>
  <br/>
  <button type="submit" class="btn btn-default" name="cuisineca">Cuisine ça !
	<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
  </button>
</form>

<script type="text/javascript">
	var i = 1;

	// Ajout d'une étape à remplir
	function ajoutEtape() {
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
