<div class="Actualite form">

<?php 
echo $this->Form->create('Post',array('url'=>'/admin/view_action/'.$action['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une actualité'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$action['Post']['titre']));
		echo $this->Form->textarea('corps',array('value'=>$action['Post']['corps']));  
		echo $this->Ck->replace('PostCorps');
		echo $this->Form->input('category_id',array('label'=>'Catégorie de l\'actualité ','empty'=>false,'name'=>'data[Post][category_id]','value'=>$action['Category']['nom']));
		echo $this->Form->input('video',array('value'=>$action['Post']['video'],'label'=>"Code de la vidéo"));
		echo $this->Form->input('type_video',array('value'=>$action['Post']['type_video'],'type'=>'select','options'=>array('youtube'=>'Youtube','dailymotion'=>'Dailymotion'),'empty'=>true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
