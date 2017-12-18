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

<div class="list-group">
  <?php $i=0; foreach ($arrary_mes_plannings as $plan){ ?>
    <a href="#" class="list-group-item active">Planning  +  Date d'expiration </a>
    <a href="<?=BASEURL?>/index.php/planning/planningById<?=$plan->getIdPlanning?>" class="list-group-item">Plannning <?php echo $1; ?> : <?php echo $plan->getExiration(); ?></a>
  <?php $i++; } ?>	
</div>
