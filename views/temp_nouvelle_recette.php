<form action="" method="post">
	<label>Nom  
		<input type="text" name="nom"/>
	</label>
	<br/>
	<label>Description 
		<input type="text" name="desc"/>
	</label>
	<br/>
	<label>Difficulté  
		<div class="btn-group" role="group" aria-label="Difficulte">
		  <button type="button" name="diff" class="btn btn-default">Nourrisson</button>
		  <button type="button" name="diff" class="btn btn-default">Facile</button>
		  <button type="button" name="diff" class="btn btn-default">Normal</button>
		  <button type="button" name="diff" class="btn btn-default">Difficile</button>
		  <button type="button" name="diff" class="btn btn-default">Héroïque</button>
		</div>
	</label>
	<br/>
	<label>Prix
		<select class="selectpicker show-tick" data-width="fit" name="prix">
		  <option>Image</option>
		  <option>Vidéo</option>
		  <option>Gif</option>
		</select>
	</label>
	<label>Prix 
		<div class="btn-group" name="prix" role="group" aria-label="Prix">
		  <button type="button" name="prix" class="btn btn-default" value="1">Quasiment rien</button>
		  <button type="button" name="prix" class="btn btn-default" value="2">Tellement pas cher</button>
		  <button type="button" name="prix" class="btn btn-default" value="3">Ça passe</button>
		  <button type="button" name="prix" class="btn btn-default" value="4">Ça commence à se discuter</button>
		  <button type="button" name="prix" class="btn btn-default" value="5">HOULALA</button>
		</div>
	</label>
	<br/>
	<label>Pour combien de personnes ? 
		<input type="number" name="nb_pers" min="1" max="100">
	</label>
	<br/>
	<label>Illustration de la recette (optionnel)
		<br/>
		<label>Type
			<select class="selectpicker show-tick" data-live-search="true" data-width="fit" name="typ">
			  <option>Image</option>
			  <option data-icon="glyphicon glyphicon-film">Vidéo</option>
			  <option data-icon="glyphicon glyphicon-thumbs-up">Gif</option>
			</select>
		</label>
		<br/>
		<label>Url  
			<input type="text" name="url"/>
		</label>
		<br/>
		<label>Légende
			<input type="text" name="leg"/>
		</label>
		<br/>
	</label>
	<br/>

	<input type="submit" name="cuisineca" value="Cuisine ça ! 😋"/>

</form>

