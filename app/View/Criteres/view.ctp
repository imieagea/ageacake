<div class="criteres view">
<h2><?php  echo __('Critere'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($critere['Critere']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($critere['Critere']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Critere Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($critere['CritereCategory']['nom'], array('controller' => 'critere_categories', 'action' => 'view', $critere['CritereCategory']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Critere'), array('action' => 'edit', $critere['Critere']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Critere'), array('action' => 'delete', $critere['Critere']['id']), null, __('Are you sure you want to delete # %s?', $critere['Critere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Criteres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Critere Categories'), array('controller' => 'critere_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Category'), array('controller' => 'critere_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Critere Values'), array('controller' => 'critere_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Value'), array('controller' => 'critere_values', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Critere Values'); ?></h3>
	<?php if (!empty($critere['CritereValue'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Critere Id'); ?></th>
		<th><?php echo __('Fiche Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($critere['CritereValue'] as $critereValue): ?>
		<tr>
			<td><?php echo $critereValue['id']; ?></td>
			<td><?php echo $critereValue['critere_id']; ?></td>
			<td><?php echo $critereValue['fiche_id']; ?></td>
			<td><?php echo $critereValue['value']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'critere_values', 'action' => 'view', $critereValue['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'critere_values', 'action' => 'edit', $critereValue['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'critere_values', 'action' => 'delete', $critereValue['id']), null, __('Are you sure you want to delete # %s?', $critereValue['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Critere Value'), array('controller' => 'critere_values', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
