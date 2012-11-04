<div class="Actualite form">

<?php
echo $this->Form->create('Contenu',array('url'=>'/admin/view_contenu')); ?>
	<fieldset>
		<legend><?php echo __('Modifier une page'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$contenu['Contenus']['titre']));
		echo $this->Form->input('corps',array('type'=>'textarea','value'=>$contenu['Contenus']['contenu']));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
