<h2>Recherche de recettes</h2>
<br/>

<form action="" method="post">
  <label>Ingrédient</label>
	<div id="divIngr">
	<select title=" " name="selectIng[1]" class="selectpicker" data-live-search="true">
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
  <button type="button" id="plusEtape" class="btn btn-default" aria-label="Plus d'étapes" onclick="ajoutIngredient()">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	ingrédient
  </button>

  <br/>
  <br/>
  <button type="submit" class="btn btn-default" name="recherche">Recherche
	<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
  </button>
</form>

<script type="text/javascript">
	var i = 1;

	// Ajout d'un ingrédient pour la recherche
	function ajoutIngredient() {
			i++;

			var divIngr = document.getElementById("divIngr");

			var br = document.createElement("br");
			divIngr.appendChild(br);

			var select = document.createElement("select");
			select.title = " ";
			select.name = "selectIng["+i+"]";
			//select.setAttribute("multiple");
			select.className = "selectpicker";
			select.setAttribute("data-live-search", true);
			divIngr.appendChild(select);

			var foreach1 = document.createTextNode("<?php $i = 1; foreach ($array_ing as $ing) {?>");
			select.appendChild(foreach1);	

			var option = document.createElement("option");
			var foreach2 = document.createTextNode("<?php echo $ing->getNom()?>");
			option.appendChild(foreach2);
			select.appendChild(option);

			var foreach3 = document.createTextNode("<?php $i++;}?>");
			select.appendChild(foreach3);

			var script = document.createElement("script");
			//script.src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js";
			var ready = document.createTextNode(" $(document).ready()");
			script.appendChild(ready);
			document.getElementsByTagName('body')[0].appendChild(script);

	}
</script>
