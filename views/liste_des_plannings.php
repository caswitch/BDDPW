<h2>Listes de mes plannings</h2>
<br/>

<div class="list-group">
  <?php foreach ($array_planning as $pla) { ?>
  <a href="#" class="list-group-item"><?php echo $pla->getExpiration()?></a>
  <?php } ?>	
</div>
