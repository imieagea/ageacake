<h1>Partenaires</h1>

<form style="width:100%" action="<?php echo $this->base ?>/admin/delete/Partenaire" method="POST">	
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th><?php echo $this->Paginator->sort('link'); ?></th>
		<th>PDF</th>
		
		<th>Actions</th>
	</tr>
<?php if(isset($partenaires[0])):?>	
	<?php foreach ($partenaires as $une): ?>
		<tr>
			<td><input type = "checkbox" name="data[ids][]" value = "<?php echo h($une['Partenaire']['id']); ?>"></td>
			<td><?php echo h($une['Partenaire']['nom']); ?>&nbsp;</td>
			<td><?php echo h($une['Partenaire']['link']); ?>&nbsp;</td>		
			<td><a href="<?php echo $this->base ?>/app/webroot/partenaires/<?php echo $une['Partenaire']['pdf'] ?>">Pdf Actuel</a></td>		
			<td><a href="<?php echo $this->base ?>/admin/view_partenaire/<?php echo $une['Partenaire']['id'] ?>">Voir</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>

<h2> Supprimer <input type="submit" value="Ok" onclick="if (confirm('Êtes-vous sûr de vouloir supprimer ces partenaires ?')) { return true; } event.returnValue = false; return false;"></h2>
</form>
<p class="paging_counter">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} sur {:pages}')
	));
	?>	</p>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Précédent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>