<h1>Actions</h1>
<form style="width:100%" action="<?php echo $this->base ?>/admin/delete/Post" method="POST">	
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th><?php echo $this->Paginator->sort('corps'); ?></th>
		<th><?php echo $this->Paginator->sort('Category.nom','Nom de la catégorie'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($actions[0])):?>
	<?php foreach ($actions as $action): ?>
		<tr>
			<td><input type = "checkbox" name="data[ids][]" value = "<?php echo h($action['Post']['id']); ?>"></td>
			<td><?php echo h($action['Post']['titre']); ?>&nbsp;</td>
			<td><?php echo $rest = substr(h($action['Post']['corps']), 0, 20).'[...]'; ?>&nbsp;</td>
			<td><?php echo h($action['Category']['nom']); ?>&nbsp;</td>
			<td><a href="<?php echo $this->base ?>/admin/view_action/<?php echo $action['Post']['id'] ?>">Voir</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>
<h2> Supprimer <input type="submit" value="Ok" onclick="if (confirm('Êtes-vous sûr de vouloir le supprimer ces actions ?')) { return true; } event.returnValue = false; return false;"></h2>	
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