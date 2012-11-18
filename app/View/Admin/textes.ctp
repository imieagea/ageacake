<?php if (isset($message)): ?>
	<div>
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif ?>

<table>
	<th>Idendifiant	</th>
	<th>Contenu</th>
	<th>Actions</th>
	<tbody>
		<?php foreach ($liens as $l): ?>
		<tr>
			<td>
				<?php echo $l['Texte']['slug']?>
			</td>
			<td>
				<?php echo h(substr($l['Texte']['contenu'], 0,40)).'[...]'?>
			</td>
			<td>
				<a href="<?php echo $this->base ?>/admin/textes/<?php echo $l['Texte']['id'] ?>">éditer</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div class="Texte form">
<?php echo $this->Form->create('Texte',array('url'=>'/admin/textes')); ?>
	<fieldset>
		<legend><?php echo __($action.' un texte'); ?></legend>
	<?php
		echo $this->Form->input('contenu',array('value'=>$editLien['Texte']['contenu'],'label'=>''));
		echo $this->Ck->replace('TexteContenu');
	?>
	</fieldset>
	<input type="hidden" name="ajouter" value="1">
<?php echo $this->Form->end(__('Ajouter')); ?>
</div>

