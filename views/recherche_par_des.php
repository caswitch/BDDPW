<h2>Recherche de recettes par plusieurs ingrédients</h2>
<br/>

<form action="" method="post">
  <div class="table-responsive">
	<table class="table">
		<tr>
		  <th>#</th>
		  <th>Ingrédient</th>
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
	      </tr>
        <?php $i++; } ?>	
    </table>
  </div>
  <br/>
  <br/>
  <label>Triées par</label>
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

  <br/>
  <br/>
  <button type="submit" class="btn btn-default" name="recherchepardes">Recherche
	<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
  </button>
  <br/>
  <br/>
  <br/>
  <br/>
</form>
