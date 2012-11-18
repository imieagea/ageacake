<div class="Actualite form">

<?php
echo $this->Form->create('Post',array('url'=>'/admin/contact/')); ?>
	<fieldset>
		<legend><?php echo __('Modifier l\'encart de contact '); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$recrut['Post']['titre']));
		 echo $this->Form->textarea('corps',array('value'=>$recrut['Post']['corps']));  
		echo $this->Ck->replace('PostCorps');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
