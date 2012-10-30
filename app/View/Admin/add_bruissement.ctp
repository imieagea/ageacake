<div class="Actualite form">
<?php echo $this->Form->create('Post',array('url'=>'/admin/add_bruissement')); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un bruissement'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('corps',array('type'=>'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ajouter')); ?>
</div>
