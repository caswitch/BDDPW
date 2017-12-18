<br/>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object img-responsive center-block" src="<?php echo $BASEURL?>/img/inspiration.png" style="width:75%">
    </a>
  </div>
</div>
<br/>


<h2 class="text-center">Planning</h2>
<br/>
<br/>
<hr/>
<br/>
<div class="list-group">
	<a href="#" class="list-group-item active">
	  Menu  +  Type
    </a>
  <?php foreach ($array_menus as $menu){ ?>
    <a class="list-group-item" href="<?php echo $BASEURL?>/index.php/planning/menuById/<?=$menu->getIdMenu()?>">
	  Id menu : <?php echo $menu->getIdMenu(); ?> Type : <?php echo $menu->getTyp();?>
    </a>
  <?php } ?>	
</div>
<br/>
<br/>
<br/>
<br/>
