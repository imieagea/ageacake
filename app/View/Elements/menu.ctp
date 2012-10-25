<ul>
	<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'home', 'action' => 'index')); ?></li>
	<?php foreach($tabs as $t): ?>
		<li><a href="<?php echo $this->base."/".$t['Contenus']['slug'] ?>"><?php echo $t['Contenus']['titre'] ?></a></li>
	<?php endforeach; ?>
	</ul>