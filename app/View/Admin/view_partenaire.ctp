<div class="partenaires form">
<?php echo $this->Form->create('Partenaire',array('url'=>'/admin/view_partenaire/'.$partenaire['Partenaire']['id'],'type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Partenaire'); ?></legend>
	<?php
		echo $this->Form->input('nom',array('value'=>$partenaire['Partenaire']['nom']));
		echo $this->Form->input('link',array('value'=>$partenaire['Partenaire']['link'],'label'=>'Lien'));
		if (!empty($partenaire['Partenaire']['pdf'])) {
		?>
			<label><a href="<?php echo $this->base ?>/app/webroot/partenaires/<?php echo $partenaire['Partenaire']['pdf'] ?>">Pdf Actuel</a></label>		
		<?php
		}
		echo $this->Form->input('pdf',array('type'=>'file'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Sauvegarder')); ?>
</div>
