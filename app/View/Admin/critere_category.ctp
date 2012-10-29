<div class="criteres index">
	<h2><?php echo __('Catégories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th>Catégories enfants</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($categories as $categorie): ?>
	<tr>
		<td><?php echo h($categorie['CritereCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($categorie['CritereCategory']['nom']); ?>&nbsp;</td>
		<td><ul><?php foreach ($categorie['ChildCategory'] as $cat) { ?>
			<li><?php echo $cat['nom'] ?></li>
		<?php } ?><ul></td>
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
