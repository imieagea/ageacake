<div class="fiches view">
<h2><?php  echo __('Fich'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statut'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['statut']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auteur'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['auteur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adresse'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['adresse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code Postal'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['code_postal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ville'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['ville']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portable'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['portable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixe'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['fixe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Naissance'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['date_naissance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pdf'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['pdf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exp'); ?></dt>
		<dd>
			<?php echo h($fiche['Fiche']['exp']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fich'), array('action' => 'edit', $fiche['Fiche']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fich'), array('action' => 'delete', $fiche['Fiche']['id']), null, __('Are you sure you want to delete # %s?', $fiche['Fiche']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fiches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fich'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avis Fiches'), array('controller' => 'avis_fiches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avis Fiche'), array('controller' => 'avis_fiches', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Avis Fiches'); ?></h3>
	<?php if (!empty($fiche['AvisFiche'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Texte'); ?></th>
		<th><?php echo __('Fiche Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($fiche['AvisFiche'] as $avisFiche): ?>
		<tr>
			<td><?php echo $avisFiche['id']; ?></td>
			<td><?php echo $avisFiche['texte']; ?></td>
			<td><?php echo $avisFiche['fiche_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'avis_fiches', 'action' => 'view', $avisFiche['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'avis_fiches', 'action' => 'edit', $avisFiche['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'avis_fiches', 'action' => 'delete', $avisFiche['id']), null, __('Are you sure you want to delete # %s?', $avisFiche['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Avis Fiche'), array('controller' => 'avis_fiches', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
