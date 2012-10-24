<ul>
	<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'home', 'action' => 'index')); ?></li>
	<?php foreach($tabs as $t): ?>
		<li><a href="<?php echo $this->base."/".$t['Contenus']['slug'] ?>"><?php echo $t['Contenus']['titre'] ?></a></li>
	<?php endforeach; ?>
	<?php if(isset($session) && $session->check('Auth.User.id')): ?>
		<li><a href="<?php echo $this->base."/users/logout"?>">Se déconnecter</a></li>
	<?php endif; ?>
</ul>