<div class="Actualite form">

<?php 
echo $this->Form->create('Post',array('url'=>'/admin/view_actualite/'.$actu['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier une actualité'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$actu['Post']['titre']));
		echo $this->Form->input('corps',array('type'=>'textarea','value'=>$actu['Post']['corps'], 'class' => 'tinymce'));
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'actualité ','empty'=>false,'name'=>'data[Post][category_id]','value'=>$actu['Category']['nom']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
