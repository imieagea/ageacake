<div class="critereCategories form">
<?php echo $this->Form->create('CritereCategory',array('url'=>'/admin/view_critere_category/'.$cat['CritereCategory']['id'])); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une catégorie de critère'); ?></legend>
	<?php
		echo $this->Form->input('nom',array('value'=>$cat['CritereCategory']['nom']));
		$checked="";
		if($cat['CritereCategory']['public']==1){
			$checked="checked";
		}
		echo $this->Form->input('public',array('checked'=>$checked));
				echo $this->Form->input('parent_category_id',array('label'=>'Catégorie parente','empty'=>true,'name'=>'data[CritereCategory][parent_id]','value'=>$cat['CritereCategory']['parent_id']));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>