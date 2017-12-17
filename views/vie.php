<h2>Recherche de recettes</h2>
<br/>

<form action="" method="post">
  <label>Ingrédient</label>
	<div id="divIngr">
	<select title=" " name="selectIng" multiple class="selectpicker" data-live-search="true">
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
  <button type="button" id="plusIng" class="btn btn-default">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	ingrédient
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

<script type="text/javascript">
</script>
