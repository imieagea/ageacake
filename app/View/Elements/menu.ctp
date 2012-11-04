<ul>
	<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'home', 'action' => 'index')); ?></li>
	<?php $i = 0; ?>
	<?php foreach($tabs as $t): ?>
		<?php if($i == 1): ?>
			<li><?php echo $this->Html->link(__('Actualités'), array('controller' => 'home', 'action' => 'actualites')); ?></li>
			<li><?php echo $this->Html->link(__('Actions'), array('controller' => 'home', 'action' => 'actions')); ?></li>
		<?php endif;?>
		<?php if($t['Contenus']['ordre']>=0){?>
		<li><a href="<?php echo $this->base."/".$t['Contenus']['slug'] ?>"><?php echo $t['Contenus']['titre'] ?></a></li>
		<?php } ?>
		<?php $i++; ?>
	<?php endforeach; ?>
	<li><?php echo $this->Html->link(__('Partenaires'), array('controller' => 'home', 'action' => 'partenaires')); ?></li>
	</ul>