<div class="Categories form">
<?php echo $this->Form->create('Category',array('url'=>'/admin/view_action_category/'.$cat['Category']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une Categorie d\'actions'); ?></legend>
	<?php
		echo $this->Form->input('nom',array('value'=>$cat['Category']['nom']));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
