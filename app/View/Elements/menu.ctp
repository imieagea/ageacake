<ul>
	<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'home', 'action' => 'index')); ?></li>
	<?php $i = 0; ?>
	<?php foreach($tabs as $t): ?>
		<?php if($i == 1): ?>
			<li><?php echo $this->Html->link(__('Actualités'), array('controller' => 'home', 'action' => 'actualites')); ?></li>
			<li><?php echo $this->Html->link(__('Actions'), array('controller' => 'home', 'action' => 'actions')); ?></li>
		<?php endif;?>
		<li><a href="<?php echo $this->base."/".$t['Contenus']['slug'] ?>"><?php echo $t['Contenus']['titre'] ?></a></li>
		<?php $i++; ?>
	<?php endforeach; ?>
	</ul>