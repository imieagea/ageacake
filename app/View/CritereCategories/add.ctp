<div class="critereCategories form">
<?php echo $this->Form->create('CritereCategory'); ?>
	<fieldset>
		<legend><?php echo __('Add Critere Category'); ?></legend>
	<?php
		echo $this->Form->input('nom');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Critere Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Criteres'), array('controller' => 'criteres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere'), array('controller' => 'criteres', 'action' => 'add')); ?> </li>
	</ul>
</div>
