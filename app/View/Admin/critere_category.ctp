<div class="criteres index">

	<h1><?php echo __('Catégories de critères'); ?></h1>
	<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('New Critere Category'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
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
		<td></td>
	</tr>
<?php endforeach; ?>
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
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

