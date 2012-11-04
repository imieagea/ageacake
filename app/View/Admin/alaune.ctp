<h1>A la une</h1>

<form style="width:100%" action="<?php echo $this->base ?>/admin/delete/Post" method="POST">	
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th><?php echo $this->Paginator->sort('corps'); ?></th>
		<th><?php echo $this->Paginator->sort('Category.nom','Nom de la catégorie'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($alaune[0])):?>	
	<?php foreach ($alaune as $une): ?>
		<tr>
			<td><input type = "checkbox" name="data[ids][]" value = "<?php echo h($une['Post']['id']); ?>"></td>
			<td><?php echo h($une['Post']['titre']); ?>&nbsp;</td>
			<td><?php echo $rest = substr(h($une['Post']['corps']), 0, 20).'[...]'; ?>&nbsp;</td>
			<td><?php echo h($une['Category']['nom']); ?>&nbsp;</td>
			<td><a href="<?php echo $this->base ?>/admin/view_alaune/<?php echo $une['Post']['id'] ?>">Voir</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>

<h2> Supprimer <input type="submit" value="Ok" onclick="if (confirm('Êtes-vous sûr de vouloir le supprimer cette Une ?')) { return true; } event.returnValue = false; return false;"></h2>
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