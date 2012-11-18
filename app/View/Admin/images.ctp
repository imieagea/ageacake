<?php if (isset($message)): ?>
	<div>
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif ?>

<table>
	<th>Image</th>
	<th>Acfions</th>
	<tbody>
		<?php foreach ($images as $l): ?>
		<tr>
			<td>
				<img src="<?php echo $this->base ?>/app/webroot/img/<?php echo $l['Image']['src']?>">
			</td>
			<td>
				<a href="<?php echo $this->base ?>/admin/delete/Image/<?php echo $l['Image']['id'] ?>">Supprimer</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div class="Image form">
<?php echo $this->Form->create('Image',array('url'=>'/admin/images','type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une image au bandeau'); ?></legend>
	<?php
		echo $this->Form->input('src',array('type'=>'file'));
	?>
	<small>Pour un meilleur affichage, les images doivent être de format 280px / 140px.</small>
	</fieldset>
	<input type="hidden" name="ajouter" value="1">
<?php echo $this->Form->end(__('Ajouter')); ?>
</div>

