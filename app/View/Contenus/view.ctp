<div class="contenuses view">
<h2><?php  echo __('Contenus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contenus['Contenus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($contenus['Contenus']['titre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($contenus['Contenus']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenu'); ?></dt>
		<dd>
			<?php echo h($contenus['Contenus']['contenu']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contenus'), array('action' => 'edit', $contenus['Contenus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contenus'), array('action' => 'delete', $contenus['Contenus']['id']), null, __('Are you sure you want to delete # %s?', $contenus['Contenus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenus'), array('action' => 'add')); ?> </li>
	</ul>
</div>
