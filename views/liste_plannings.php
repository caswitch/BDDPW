<h2>Listes de mes plannings</h2>
<br/>

<form action="" method="post">
<div class="row">
	  <select title="Aucun" name="triepar" class="selectpicker" data-live-search="true">
		<option value="1">- Expiration +</option>
		<option value="2">+ Expiration -</option>
	  </select>
</div>
<br/>
<hr/>
<br/>
<div class="row">
	<button type="submit" class="btn btn-default center-block" name="recherche">Recherche
	  <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
	</button>
</div>
<br/>
<br/>
<br/>
<br/>
</form>
<br/>
<br/>

<div class="list-group">
	<a href="#" class="list-group-item active">
	  Planning  +  Date d'expiration
    </a>
  <?php $i=0; foreach ($array_mes_plannings as $plan){ ?>
    <a class="list-group-item" href="<?php echo $BASEURL?>/index.php/planning/planningById/<?=$plan->getIdPlanning()?>">
	  Plannning : <?php echo $i; ?> Expiration : <?php echo $plan->getExpiration();?>
    </a>
  <?php $i++; } ?>	
</div>
<br/>
<br/>
<br/>
<br/>
