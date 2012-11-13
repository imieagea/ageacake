<div class="critereCategories form">
<?php echo $this->Form->create('Critere',array('url'=>'/admin/view_critere/'.$cat['Critere']['id'])); ?>
	<fieldset>
		<h1><?php echo __('Modifier un critère'); ?></h1>
	<?php
		echo $this->Form->input('nom',array('value'=>$cat['Critere']['nom']));
	?>
	<label for="data[Critere][type]">Type</label>
	<select name="data[Critere][type]">
	<?php if($cat['Critere']['type']=="checkbox") {?>
		<option value="checkbox" selected>Case à cocher</option>
	<?php }else{ ?>
			<option value="checkbox">Case à cocher</option>
	<?php } ?>
	
	<?php if($cat['Critere']['type']=="textarea") {?>
		<option value="textarea" selected>Zone de texte</option>
	<?php }else{ ?>
			<option value="textarea">Zone de texte</option>
	<?php } ?>
	</select>
	<?php echo $this->Form->input('critere_category_id',array('empty'=>true,'value'=>$cat['Critere']['critere_category_id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>