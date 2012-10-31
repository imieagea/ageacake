<?php foreach ($pages as $page) {
	var_dump($page);
	//echo $this->base/admin/edit_page/$actu['Contenu']['id'];
} ?>
<h1>Page</h1>
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th><?php echo $this->Paginator->sort('corps'); ?></th>
		<th><?php echo $this->Paginator->sort('nom'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($actus[0])):?>	
	<?php foreach ($actus as $actu): ?>
		<tr>
		<td><?php echo h($actu['Post']['id']); ?>&nbsp;</td>
			<td><?php echo h($actu['Post']['titre']); ?>&nbsp;</td>
			<td><?php echo $rest = substr(h($actu['Post']['corps']), 0, 20).'[...]'; ?>&nbsp;</td>
			<td><?php echo h($actu['Category']['nom']); ?>&nbsp;</td>
			<td><a href="<?php echo $this->base ?>/admin/view_actualite/<?php echo $actu['Post']['id'] ?>">Voir</a></td>
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
</table>
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