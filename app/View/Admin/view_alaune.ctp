<div class="Actualite form">

<?php
echo $this->Form->create('Post',array('url'=>'/admin/view_alaune/'.$recrut['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier la une'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$recrut['Post']['titre']));
		echo $this->Form->input('corps',array('type'=>'textarea','value'=>$recrut['Post']['corps']));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
