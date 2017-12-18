<h2>Recherche de recettes par un ingrédient</h2>
<br/>
<hr/>
<br/>

<form action="" method="post">
<div class="row" id="descr">
  <div class="col-md-2">
	  <label>Ingrédient</label>
  </div>
  <div class="col-md-3">
	<div id="divIngr">
	  <select title=" " name="selectIng" class="selectpicker" data-live-search="true">
		  <?php $i = 1; foreach ($array_ing as $ing) { ?>
			<option><?php echo $ing->getNom()?></option>
		  <?php $i++; } ?>	
	  </select>
	</div>
  </div>
  <div class="col-md-2">
	<label>Triées par</label>
  </div>
  <div class="col-md-3">
	<div id="divIngr">
	  <select title="Aucun" name="triepar" class="selectpicker" data-live-search="true">
		<option value="1">- Titre +</option>
		<option value="2">+ Titre -</option>
		<option value="3">- Nombre de personnes +</option>
		<option value="4">+ Nombre de personnes -</option>
		<option value="5">- Prix +</option>
		<option value="6">+ Prix -</option>
		<option value="7">- Difficulté +</option>
		<option value="8">+ Difficulté -</option>
	  </select>
	</div>
  </div>
</div>
<br/>
<hr/>
<br/>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
	<button type="submit" class="btn btn-default center-block" name="recherche">Recherche
	  <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
	</button>
  </div>
</div>
<br/>
<br/>
<br/>
<br/>
</form>

<script type="text/javascript">
/* NE MARCHE PAS
	var i = 1;
	var index = 0;

	// Ajout d'un ingrédient pour la recherche
	function ajoutIngredient() {
			i++;
			index++;

			var divIngr = document.getElementById("divIngr");

			var br = document.createElement("br");
			divIngr.appendChild(br);

			var divselect = document.createElement("div");
			divselect.className = "btn-group bootstrap-select show-tick";
			divIngr.appendChild(divselect);


			var buttonDrop = document.createElement("button");
			buttonDrop.type = "button";
			buttonDrop.className = "btn dropdown-toggle bs-placeholder btn-default";
			buttonDrop.setAttribute("data-toggle", "dropdown");
			buttonDrop.setAttribute("role", "button");
			buttonDrop.title = "";
			divselect.appendChild(buttonDrop);

			var spanFilter = document.createElement("span");
			spanFilter.className = "filter-option pull-left";
			buttonDrop.appendChild(spanFilter);

			var txt = document.createTextNode("&nbsp;");
			buttonDrop.appendChild(txt);

			var spanBsCaret = document.createElement("span");
			spanBsCaret.className = "bs-caret";
			buttonDrop.appendChild(spanBsCaret);

			var spanCaret = document.createElement("span");
			spanCaret.class = "caret";
			spanBsCaret.appendChild(spanCaret);

			var divDrop = document.createElement("div");
			divDrop.className = "dropdown-menu open";
			divDrop.setAttribute("role", "listbox");
			divDrop.setAttribute("aria-expanded", false);
			divselect.appendChild(divDrop);

			var divBsSearchbox = document.createElement("div");
			divBsSearchbox.className = "bs-searchbox";
			divDrop.appendChild(divBsSearchbox);

			var inputText = document.createElement("input");
			inputText.type ="text";
			inputText.className = "form-control";
			inputText.setAttribute("autocomplete", "off");
			inputText.setAttribute("role", "textbox");
			inputText.setAttribute("aria-label", "Search");
			divBsSearchbox.appendChild(inputText);

			var ulDrop = document.createElement("ul");
			ulDrop.className = "dropdown-menu inner";
			ulDrop.setAttribute("role", "listbox");
			ulDrop.setAttribute("aria-expanded", false);
			divDrop.appendChild(ulDrop);

			var foreach1_begin = document.createTextNode("<?php foreach ($array_ing as $ing) { ?>");
			ulDrop.appendChild(foreach1_begin);

			//var php = 
			// for begin
			var liData = document.createElement("li");
			liData.setAttribute("data-original-index", index);
			ulDrop.appendChild(liData);

			var aData = document.createElement("a");
			aData.setAttribute("tabindex", $index);
			aData.className = "";
			aData.setAttribute("data-tokens", null);
			aData.setAttribute("role", "option");
			aData.setAttribute("aria-disabled", false);
			aData.setAttribute("aria-selected", false);
			liData.appendChild(aData);

			var spanText = document.createElement("span");
			spanText.className = "text";
			aData.appendChild(spanText);

			var spanTextIng = document.createTextNode("<?php echo $ing->getNom()?>");
			spanText.appendChild(spanTextIng);

			var spanGlyph = document.createElement("span");
			spanGlyph.className = "glyphicon glyphicon-ok check-mark";
			aData.appendChild(spanGlyph);

			var foreach1_end = document.createTextNode("<?php } ?>");
			ulDrop.appendChild(foreach1_end);

			var select = document.createElement("select");
			select.title = " ";
			select.name = "selectIng["+i+"]";
			select.className = "selectpicker";
			select.setAttribute("data-live-search", true);
			select.setAttribute("tabindex", -98);
			divselect.appendChild(select);

			var option1 = document.createElement("option");
			option1.className = "bs-title-option";
			otion1.value = "";
			select.appendChild(option1);

			var foreach2_begin = document.createTextNode("<?php foreach ($array_ing as $ing) { ?>");

			select.appendChild(foreach2_begin);

			var optionIng = document.createElement("option");
			select.appendChild(optionIng);

			var optionText = document.createTextNode("<?php echo $ing->getNom()?>");
			optionIng.appendChild(optionText);

			var foreach2_end = document.createTextNode("<?php } ?>");
			select.appendChild(foreach2_end);
 */
	}
</script>
