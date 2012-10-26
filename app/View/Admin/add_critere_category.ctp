<div class="critereCategories form">
<?php echo $this->Form->create('CritereCategory',array('url'=>'/admin/add_critere_category')); ?>
	<fieldset>
		<legend><?php echo __('Add Critere Category'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('parent_category_id',array('label'=>'Catégorie parente','empty'=>true,'name'=>'data[CritereCategory][parent_id]'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
