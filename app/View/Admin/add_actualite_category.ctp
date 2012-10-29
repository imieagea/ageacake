<div class="Categories form">
<?php echo $this->Form->create('Category',array('url'=>'/admin/add_actualite_category')); ?>
	<fieldset>
		<legend><?php echo __('Add Critere Category'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('parent_category_id',array('label'=>'Catégorie parente','empty'=>true,'name'=>'data[Category][id]'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Créer')); ?>
</div>
