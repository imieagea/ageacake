<?php if (isset($message)): ?>
	<div>
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif ?>

<table>
	<th>Nom	</th>
	<th>Lien</th>
	<th>Position</th>
	<tbody>
		<?php foreach ($liens as $l): ?>
		<tr>
			<td>
				<?php echo $l['Lien']['nom']?>
			</td>
			<td>
				<?php echo $l['Lien']['lien']?>
			</td>
			<td>
				<?php echo $l['Lien']['position']?>
				<a href="<?php echo $this->base ?>/admin/menu/<?php echo $l['Lien']['id'] ?>">éditer</a>
				<a href="<?php echo $this->base ?>/admin/delete/Lien/<?php echo $l['Lien']['id'] ?>">Supprimer</a>
				<?php
				if ($l['Lien']['position'] != 0) {
				echo '<form style="width:auto;" method="post" action="'.$this->base.'/admin/menu">';
					echo '<input type="submit" value="+">';
					echo '<input type="hidden" name = "up" value="up">';
					echo '<input type="hidden" name="id" value="'.$l['Lien']['id'].'">';
					echo '<input type="hidden" name="position" value="'.$l['Lien']['position'].'">';
					echo '<input type="hidden" name="critere" value="critere">';
				echo '</form>';
				}
				if ($l['Lien']['position'] != count($liens)-1) {
				 	# code...
				 
				echo '<form style="width:auto;" method="post" action="'.$this->base.'/admin/menu">';
					echo '<input type="submit" value="-">';
					echo '<input type="hidden" name = "down" value="down">';
					echo '<input type="hidden" name="id" value="'.$l['Lien']['id'].'">';
					echo '<input type="hidden" name="position" value="'.$l['Lien']['position'].'">';
					echo '<input type="hidden" name="critere" value="critere">';
				echo '</form>';
				} 
				 ?>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div class="Lien form">
<?php echo $this->Form->create('Lien',array('url'=>'/admin/menu')); ?>
	<fieldset>
		<legend><?php echo __($action.' un lien au menu'); ?></legend>
	<?php
		echo $this->Form->input('nom',array('value'=>$editLien['Lien']['nom']));
	?>
	<div class="input select">
		<label for="manualLink">Lien vers un contenu spécifique</label>
	<select name="manualLink" >
		<option value="null"></option>
		<option value="<?php echo $this->base ?>">Accueil(www.ageaouest.fr)</option>
		<option value="<?php echo $this->base ?>/home/partenaires">Page partenaires</option>
		<option value="<?php echo $this->base ?>/home/actualites">Actualités</option>
		<option value="<?php echo $this->base ?>/home/actions">Actions</option>
		<?php $pages = Cache::read('contenus_slugs'); ?>
		<?php foreach ($pages as $key => $value): ?>
			<option value="<?php echo $key ?>"><?php echo $key ?></option>
		<?php endforeach ?>
		
	</select>
	</div>

	<?php echo $this->Form->input('lien',array('type'=>'text','label'=>'Autre lien','value'=>$editLien['Lien']['lien'])); ?>
	<small>Le lien doit être soit spécifique, soit entré par vos soins, si les deux sont séléctionnés, le lien entré manuellement sera pris en compte.</small>
	</fieldset>
	<input type="hidden" name="ajouter" value="1">
<?php echo $this->Form->end(__('Ajouter')); ?>
</div>

