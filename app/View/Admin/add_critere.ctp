<div class="criteres form">
<?php echo $this->Form->create('Critere'); ?>
	<fieldset>
		<legend><?php echo __('Add Critere'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('type');
		echo $this->Form->input('critere_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
