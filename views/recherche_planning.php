<h2>Listes de mes plannings</h2>
<br/>

<form action="" method="post">
<div class="row">
  <div class="col-md-3 col-md-offset-4">
	<div id="divIngr">
	  <select title="Aucun" name="triepar" class="selectpicker" data-live-search="true">
		<option value="1">- Expiration +</option>
		<option value="2">+ Expiration -</option>
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

<ul class="list-group">
<?php foreach ($arrary_mes_plannings as $plan){ ?>
<a href="<?=BASEURL?>/index.php/planning/planningById<?=$plan->getIdPlanning?>">	
	<li class="list-group-item"></li>
	<li>Recette : <?=$rec->nom()?>
		<ul>
		<li>Id : <?=$rec->id()?></li>
		<li>difficulté : <?=$rec->difficulte()?></li>
		<li>Date ajout : <?= $rec->dateAjout()?></li>
	</ul></li>
	</a>
<?php  } ?>	
  <li class="list-group-item">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
