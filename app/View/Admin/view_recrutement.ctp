<div class="Actualite form">

<?php
echo $this->Form->create('Post',array('url'=>'/admin/view_recrutement/'.$recrut['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier le texte de recrutement'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$recrut['Post']['titre']));
	 echo $this->Form->textarea('corps',array('value'=>$recrut['Post']['corps']));  
		echo $this->Ck->replace('PostCorps');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
