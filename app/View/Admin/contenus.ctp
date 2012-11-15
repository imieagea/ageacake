<h1>Pages de contenu</h1>
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('titre'); ?></th>
		<th>Actions</th>
	</tr>
<?php if(isset($pages[0])):?>	
	<?php foreach ($pages as $page): ?>
		<tr>
		<td><?php echo h($page['Contenus']['id']); ?>&nbsp;</td>
		<td><?php echo h($page['Contenus']['titre']); ?>&nbsp;</td>		
		<td><a href="<?php echo $this->base ?>/admin/view_contenu/<?php echo $page['Contenus']['id'] ?>">Voir</a></td>
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