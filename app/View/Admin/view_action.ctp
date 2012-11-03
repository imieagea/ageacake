<div class="Actualite form">

<?php 
echo $this->Form->create('Post',array('url'=>'/admin/view_action/'.$action['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une actualité'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$action['Post']['titre']));
		echo $this->Form->input('corps',array('type'=>'textarea','value'=>$action['Post']['corps']));
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'actualité ','empty'=>false,'name'=>'data[Post][category_id]','value'=>$action['Category']['nom']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
