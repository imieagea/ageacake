<div class="Actualite form">
<?php echo $this->Form->create('Post',array('url'=>'/admin/add_actualite')); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une actualité'); ?></legend>
	<?php
		echo $this->Form->input('titre');
	echo $this->Form->textarea('corps');  
		echo $this->Ck->replace('PostCorps');
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'actualité ','empty'=>true,'name'=>'data[Post][category_id]'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
