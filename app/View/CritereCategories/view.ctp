<div class="critereCategories view">
<h2><?php  echo __('Critere Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($critereCategory['CritereCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($critereCategory['CritereCategory']['nom']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Critere Category'), array('action' => 'edit', $critereCategory['CritereCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Critere Category'), array('action' => 'delete', $critereCategory['CritereCategory']['id']), null, __('Are you sure you want to delete # %s?', $critereCategory['CritereCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Critere Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Criteres'), array('controller' => 'criteres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Critere'), array('controller' => 'criteres', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Criteres'); ?></h3>
	<?php if (!empty($critereCategory['Critere'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Critere Category Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($critereCategory['Critere'] as $critere): ?>
		<tr>
			<td><?php echo $critere['id']; ?></td>
			<td><?php echo $critere['nom']; ?></td>
			<td><?php echo $critere['critere_category_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'criteres', 'action' => 'view', $critere['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'criteres', 'action' => 'edit', $critere['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'criteres', 'action' => 'delete', $critere['id']), null, __('Are you sure you want to delete # %s?', $critere['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Critere'), array('controller' => 'criteres', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
