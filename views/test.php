<h2>Recherche de recettes</h2>
<br/>

<form action="" method="post">
  <label>Ingrédient</label>
	<div id="divIngr">
-----------------------------------------------------------------
	<div class="btn-group bootstrap-select show-tick">
	  <button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="">
		<span class="filter-option pull-left"> </span>
		&nbsp;
		<span class="bs-caret">
			<span class="caret"></span>
		</span>
	  </button>
	  <div class="dropdown-menu open" role="combobox">
		<div class="bs-searchbox">
		  <input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search">
		</div>
		<ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
		  <li data-original-index="0">
			<a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">
				<span class="text">
					oeuf
				</span>
				<span class="glyphicon glyphicon-ok check-mark"></span>
			</a>
		  </li>
		  <li data-original-index="1">
			<a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">
			  <span class="text">
				  farine
			  </span>
			  <span class="glyphicon glyphicon-ok check-mark"></span>
			</a>
		  </li>
	    </ul>
	  </div>
      <select title=" " name="selectIng" multiple="" class="selectpicker" data-live-search="true" tabindex="-98">
	    <option>oeuf</option>
	    <option>farine</option>
	  </select>
     </div>
-----------------------------------------
  </div>

  <br>
  <button type="button" id="plusIng" class="btn btn-default">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	ingrédient
  </button>

  <br>
  <br>
  <br>
  <br>
  <button type="submit" class="btn btn-default" name="recherche">Recherche
	<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
  </button>
  <br>
  <br>
  <br>
  <br>
</form>
