<div class="Actualite form">
<?php echo $this->Form->create('Post',array('url'=>'/admin/add_actualite')); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une action'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->textarea('corps');  
		echo $this->Ck->replace('PostCorps');
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'article ','empty'=>true,'name'=>'data[Post][category_id]'));
		echo $this->Form->input('video');
		echo $this->Form->input('type_video',array('options'=>array('youtube'=>'Youtube','dailymotion'=>'Dailymotion'),'empty'=>true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
