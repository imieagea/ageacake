<div class="fiches index">
	<h2><?php echo __('Fiches'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('prenom'); ?></th>
			<th><?php echo $this->Paginator->sort('adresse'); ?></th>
			<th><?php echo $this->Paginator->sort('code_postal'); ?></th>
			<th><?php echo $this->Paginator->sort('ville'); ?></th>
			<th><?php echo $this->Paginator->sort('portable'); ?></th>
			<th><?php echo $this->Paginator->sort('fixe'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('date_naissance'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('pdf'); ?></th>
			<th><?php echo $this->Paginator->sort('exp'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($fiches as $fich): ?>
	<tr>
		<td><?php echo h($fich['Fich']['id']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['nom']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['adresse']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['code_postal']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['ville']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['portable']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['fixe']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['email']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['date_naissance']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['message']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['pdf']); ?>&nbsp;</td>
		<td><?php echo h($fich['Fich']['exp']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fich['Fich']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fich['Fich']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fich['Fich']['id']), null, __('Are you sure you want to delete # %s?', $fich['Fich']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fich'), array('action' => 'add')); ?></li>
	</ul>
</div>
