<h2 class="text-center">Menus de mon planning <?php echo $pIdPlanning;?></h2>
<br/>
<br/>
<hr/>
<br/>
<div class="row">
  <div class="col-md-6">
	<h3>Menu</h3>
  </div>
  <div class="col-md-6">
    <h3>Recette</h3>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <ul class="list-group">
	  <?php foreach ($array_menus as $menu){ ?>

	    <li class="list-group-item">Id menu : <?php echo $menu->getIdMenu(); ?>               Type : <?php echo $menu->getTyp();?></li>
	  <?php } ?>
		</ul>
  </div>
  <div class="col-md-4">
  <div class="list-group">
    <?php foreach ($array_recettes as $rec){ ?>
	  <a href="<?php echo $BASEURL?>/index.php/recette/recetteById/<?=$rec->getIdRecette()?>" class="list-group-item"><?php echo $rec->getNom(); ?></a>
	<?php } ?>
</div>
  </div>
</div>
