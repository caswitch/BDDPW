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
  <button type="submit" class="btn btn-default" name="recherchepardes">Recherche
	<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
  </button>
  <br/>
  <br/>
  <br/>
  <br/>
</form>
