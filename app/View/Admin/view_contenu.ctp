<div class="Actualite form">

<?php
echo $this->Form->create('Contenus',array('url'=>'/admin/view_contenu/'.$contenu['Contenus']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier une page'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$contenu['Contenus']['titre']));
		echo $this->Form->input('contenu',array('type'=>'textarea','value'=>$contenu['Contenus']['contenu']));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
