<div class="criteres form">
<?php echo $this->Form->create('Critere'); ?>
	<fieldset>
		<h1><?php echo __('Ajouter un critère'); ?></h1>
	<?php
		echo $this->Form->input('nom');
	?>
	<label for="data[Critere][type]">Type</label>
	<select name="data[Critere][type]">
		<option value="checkbox">Case à cocher</option>
		<option value="textarea">Zone de texte</option>
	</select>
	<?php echo $this->Form->input('critere_category_id',array('empty'=>true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
