<h2>Listes de mes plannings</h2>
<br/>

<div class="list-group">
	<a href="#" class="list-group-item active">
	  Planning  +  Date d'expiration
    </a>
  <?php foreach ($array_mes_plannings as $plan){ ?>
    <a class="list-group-item" href="<?php echo $BASEURL?>/index.php/planning/planningById/<?=$plan->getIdPlanning()?>">
	  Id plannning : <?php echo $plan->getIdPlanning(); ?> Expiration : <?php echo $plan->getExpiration();?>
    </a>
  <?php ; } ?>	
</div>
<br/>
<br/>
<br/>
<br/>
