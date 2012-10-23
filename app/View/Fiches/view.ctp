<div class="fiches view">
<h2><?php  echo __('Fich'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['nom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prenom'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adresse'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['adresse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code Postal'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['code_postal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ville'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['ville']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portable'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['portable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixe'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['fixe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Naissance'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['date_naissance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pdf'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['pdf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exp'); ?></dt>
		<dd>
			<?php echo h($fich['Fich']['exp']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fich'), array('action' => 'edit', $fich['Fich']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fich'), array('action' => 'delete', $fich['Fich']['id']), null, __('Are you sure you want to delete # %s?', $fich['Fich']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fiches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fich'), array('action' => 'add')); ?> </li>
	</ul>
</div>
