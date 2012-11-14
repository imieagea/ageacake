<div class="Actualite form">

<?php 
echo $this->Form->create('Post',array('url'=>'/admin/view_actualite/'.$actu['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier une actualité'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$actu['Post']['titre']));
		//echo $this->Form->input('corps',array('type'=>'textarea','value'=>$actu['Post']['corps'], 'class' => 'ckeditor'));
		 echo $this->Form->textarea('corps',array('value'=>$actu['Post']['corps']));  
		echo $this->Ck->replace('PostCorps');
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'actualité ','empty'=>false,'name'=>'data[Post][category_id]','value'=>$actu['Category']['nom']));
		echo $this->Form->input('video',array('value'=>$action['Post']['video']));
		echo $this->Form->input('type_video',array('value'=>$action['Post']['type_video'],'options'=>array('youtube'=>'Youtube','dailymotion'=>'Dailymotion'),'empty'=>true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
