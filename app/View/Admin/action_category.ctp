<h1>Catégories d'actions</h1>
<table>
	<tr>
	<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
		<th><?php echo $this->Paginator->sort('nom'); ?></th>	
		<th>Actions</th>
	</tr>
<?php if(isset($categories[0])):?>	
	<?php foreach ($categories as $action): ?>
		<tr>
		<td><?php echo h($action['Category']['id']); ?>&nbsp;</td>
			<td><?php echo h($action['Category']['nom']); ?>&nbsp;</td>		
			<td><a href="<?php echo $this->base ?>/admin/view_action_category/<?php echo $action['Category']['id'] ?>">Voir</a></td>
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