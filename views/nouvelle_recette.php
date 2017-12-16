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
  <div class="form-group">
    <label for="ing">Ingrédients</label>
	<select class="form-control selectpicker" multiple data-live-search="true">
	  <option>1</option>
	  <option>2</option>
	  <option>3</option>
	  <option>4</option>
	  <option>5</option>
	</select>
  </div>

  <button type="submit" class="btn btn-default" name="cuisineca">En cusine !
	<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
  </button>
</form>

