<div class="Actualite form">

<?php
echo $this->Form->create('Post',array('url'=>'/admin/view_alaune/'.$recrut['Post']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Modifier la une'); ?></legend>
	<?php
		echo $this->Form->input('titre',array('value'=>$recrut['Post']['titre']));
		 echo $this->Form->textarea('corps',array('value'=>$recrut['Post']['corps']));  
		echo $this->Ck->replace('PostCorps');
		
		echo $this->Form->input('video',array('value'=>$recrut['Post']['video']));
		echo $this->Form->input('type_video',array('value'=>$recrut['Post']['type_video'],'options'=>array('youtube'=>'Youtube','dailymotion'=>'Dailymotion'),'empty'=>true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
