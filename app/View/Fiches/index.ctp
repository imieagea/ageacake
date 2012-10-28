<div class="fiches index">
	<h2><?php echo __('Fiches'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('statut'); ?></th>
			<th><?php echo $this->Paginator->sort('auteur'); ?></th>
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
	foreach ($fiches as $fiche): ?>
	<tr>
		<td><?php echo h($fiche['Fiche']['id']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['statut']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['auteur']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['nom']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['adresse']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['code_postal']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['ville']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['portable']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['fixe']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['email']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['date_naissance']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['message']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['pdf']); ?>&nbsp;</td>
		<td><?php echo h($fiche['Fiche']['exp']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fiche['Fiche']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fiche['Fiche']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fiche['Fiche']['id']), null, __('Are you sure you want to delete # %s?', $fiche['Fiche']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Avis Fiches'), array('controller' => 'avis_fiches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avis Fiche'), array('controller' => 'avis_fiches', 'action' => 'add')); ?> </li>
	</ul>
</div>
