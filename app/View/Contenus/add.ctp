<div class="contenuses form">
<?php echo $this->Form->create('Contenus'); ?>
	<fieldset>
		<legend><?php echo __('Add Contenus'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('slug');
		echo $this->Form->input('contenu');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contenuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
