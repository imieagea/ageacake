<div class="criteres index">
	<h2><?php echo __('Criteres'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('critere_category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($criteres as $critere): ?>
	<tr>
		<td><?php echo h($critere['Critere']['id']); ?>&nbsp;</td>
		<td><?php echo h($critere['Critere']['type']); ?>&nbsp;</td>
		<td><?php echo h($critere['Critere']['nom']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($critere['CritereCategory']['nom'], array('controller' => 'critere_categories', 'action' => 'view', $critere['CritereCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $critere['Critere']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $critere['Critere']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $critere['Critere']['id']), null, __('Are you sure you want to delete # %s?', $critere['Critere']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Critere'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Critere Categories'), array('controller' => 'critere_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Category'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('List Critere Values'), array('controller' => 'critere_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Value'), array('controller' => 'critere_values', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
