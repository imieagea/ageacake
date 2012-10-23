<div class="fiches form">
<?php echo $this->Form->create('Fich'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fich'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('adresse');
		echo $this->Form->input('code_postal');
		echo $this->Form->input('ville');
		echo $this->Form->input('portable');
		echo $this->Form->input('fixe');
		echo $this->Form->input('email');
		echo $this->Form->input('date_naissance');
		echo $this->Form->input('message');
		echo $this->Form->input('pdf');
		echo $this->Form->input('exp');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fich.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fich.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fiches'), array('action' => 'index')); ?></li>
	</ul>
</div>
