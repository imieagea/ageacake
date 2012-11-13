<div class="criteres index">
	<h1><?php echo __('Criteres'); ?></h1>
	<!--<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter un critère'), array('action' => 'add')); ?></li>
	<li><?php echo $this->Html->link(__('Gérer les Catégories de critère'), array('controller' => 'critere_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter une Catégorie de critère'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('List Critere Values'), array('controller' => 'critere_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Value'), array('controller' => 'critere_values', 'action' => 'add')); ?> </li> -->
	<!--</ul>
</div>-->
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('critere_category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($criteres as $critere): ?>
	<tr>
	
		<td><?php echo h($critere['Critere']['type']); ?>&nbsp;</td>
		<td><?php echo h($critere['Critere']['nom']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($critere['CritereCategory']['nom'], array('controller' => 'admin', 'action' => 'view_critere_category', $critere['CritereCategory']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Voir'), array('action' => 'view_critere/', $critere['Critere']['id'])); ?>			
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete/Critere/'.$critere['Critere']['id']), null, __('Êtes-vous sûr de vouloir le supprimer # %s?', $critere['Critere']['id'])); ?>
		</td>
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
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next(__('Suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

