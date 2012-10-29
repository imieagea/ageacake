<div class="Actualite form">
<?php echo $this->Form->create('Post',array('url'=>'/admin/add_actualite')); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un article'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('corps',array('type'=>'textarea'));
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'article ','empty'=>true,'name'=>'data[Category][category_id]'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
