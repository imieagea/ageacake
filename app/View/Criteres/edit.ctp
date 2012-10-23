<div class="criteres form">
<?php echo $this->Form->create('Critere'); ?>
	<fieldset>
		<legend><?php echo __('Edit Critere'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('critere_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Critere.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Critere.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Criteres'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Critere Categories'), array('controller' => 'critere_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Category'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Critere Values'), array('controller' => 'critere_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Value'), array('controller' => 'critere_values', 'action' => 'add')); ?> </li>
	</ul>
</div>
