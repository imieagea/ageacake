<div class="criteres form">
<?php echo $this->Form->create('Critere'); ?>
	<fieldset>
		<legend><?php echo __('Add Critere'); ?></legend>
	<?php
		echo $this->Form->input('nom');
	?>
	<label for="data[Critere][type]">Type</label>
	<select name="data[Critere][type]">
		<option value="text">Case à cocher</option>
		<option value="textarea">Zone de texte</option>
	</select>
	<?php echo $this->Form->input('critere_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
